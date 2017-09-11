<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campeonato_Model extends CI_Model {
	
	public function get() {
		$this->db->from('campeonato');
		$this->db->order_by('nome_campeonato');
		return $this->db->get()->result();
	}
	
	public function getCampeonato($id_campeonato) {
		$this->db->where('id_campeonato', $id_campeonato, FALSE);
		$this->db->from('campeonato');
		return $this->db->get()->first_row();
	}

	public function getCampeonatos() {
		$this->db->from('campeonato');
		$this->db->order_by('nome_campeonato');
		return $this->db->get()->result();
	}
	
	public function insert($campeonato) {
		$res = $this->db->insert('campeonato', $campeonato);
		
		if ($res) {
			return $this->db->insert_id();
		} else {
			return FALSE;
		}		
	}
	
	public function update($campeonato, $id_campeonato) {
		$this->db->where('id_campeonato', $id_campeonato, FALSE);
		$res = $this->db->update('campeonato', $campeonato);
	
		if ($res) {
			return $id_campeonato;
		} else {
			return FALSE;
		}
	}
	
	
	public function delete($id_campeonato) {
		$this->db->where('id_campeonato', $id_campeonato, FALSE);
		return $this->db->delete('campeonato');
	}
	
}