<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questao_Model extends CI_Model {
	
	public function get() {
		$this->db->from('questao');
		$this->db->order_by('codgiqes');
		return $this->db->get()->result();
	}
	
	
	public function getQuestoesMeta($meta) {
		$this->db->from('questao');
		$this->db->where('cmetiqes', $meta, FALSE);
		$this->db->order_by('codgiqes');
		return $this->db->get()->result();
	}
	
	public function getCambio($vei_id_cam) {
		$this->db->where('vei_id_cam', $vei_id_cam, FALSE);
		$this->db->from('vei_cam');
		return $this->db->get()->first_row();
	}
	
	public function insert($cambio) {
		$res = $this->db->insert('vei_cam', $cambio);
		
		if ($res) {
			return $this->db->insert_id();
		} else {
			return FALSE;
		}		
	}
	
	public function update($cambio, $vei_id_cam) {
		$this->db->where('vei_id_cam', $vei_id_cam, FALSE);
		$res = $this->db->update('vei_cam', $cambio);
	
		if ($res) {
			return $vei_id_cam;
		} else {
			return FALSE;
		}
	}
	
	
	public function delete($vei_id_cam) {
		$this->db->where('vei_id_cam', $vei_id_cam, FALSE);
		return $this->db->delete('vei_cam');
	}
	
}