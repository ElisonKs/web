<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equipe_Model extends CI_Model {
	
	public function get() {
		$this->db->from('equipe');
		$this->db->order_by('nome_equipe');
		return $this->db->get()->result();
	}
	
	public function getEquipe($id_equipe) {
		$this->db->where('id_equipe', $id_equipe, FALSE);
		$this->db->from('equipe');
		return $this->db->get()->first_row();
	}

	public function getEquipes() {
		$this->db->from('equipe');
		$this->db->order_by('nome_equipe');
		return $this->db->get()->result();
	}
	
	public function insert($equipe) {
		$res = $this->db->insert('equipe', $equipe);
		
		if ($res) {
			return $this->db->insert_id();
		} else {
			return FALSE;
		}		
	}
	
	public function update($equipe, $id_equipe) {
		$this->db->where('id_equipe', $id_equipe, FALSE);
		$res = $this->db->update('equipe', $equipe);
	
		if ($res) {
			return $id_equipe;
		} else {
			return FALSE;
		}
	}
	
	
	public function delete($id_equipe) {
		$this->db->where('id_equipe', $id_equipe, FALSE);
		return $this->db->delete('equipe');
	}
	
}