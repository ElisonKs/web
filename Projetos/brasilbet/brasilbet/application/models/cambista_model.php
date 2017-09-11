<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cambista_Model extends CI_Model {
	
	
	
		
	public function getCambista($login_cambista, $senha_cambista) {
		$this->db->where('login_cambista', $login_cambista);
		$this->db->where('senha_cambista', $senha_cambista);
		$this->db->from('cambista');
		return $this->db->get()->first_row();
	}
	
	public function getCambistasNaoAdmin() {
		$this->db->from('cambista');
		$this->db->where('admin_cambista != ', 1, FALSE);
		
		return $this->db->get()->result();
	}
	
	public function getUsuarioLogin($bus_busemp_usu, $bus_login_usu) {
		$this->db->where('bus_busemp_usu', $bus_busemp_usu, FALSE);
		$this->db->where('bus_login_usu', $bus_login_usu);
		$this->db->from('bus_usu');
		return $this->db->get()->first_row();
	}
	
	
	public function getCambistaChave($id_cambista) {
		$this->db->where('id_cambista', $id_cambista, FALSE);
		$this->db->from('cambista');
		return $this->db->get()->first_row();
	}
	
	
	public function insert($cambista) {
		$res = $this->db->insert('cambista', $cambista);
	
		if ($res) {
			return $this->db->insert_id();
		} else {
			return FALSE;
		}
	}
	
	public function update($cambista, $id_cambista) {
		$this->db->where('id_cambista', $id_cambista, FALSE);
		$res = $this->db->update('cambista', $cambista);
	
		if ($res) {
			return $bus_id_usu;
		} else {
			return FALSE;
		}
	}
	
	public function delete($id_cambista) {
		$this->db->where('id_cambista', $id_cambista, FALSE);
		return $this->db->delete('cambista');
	}
		
}