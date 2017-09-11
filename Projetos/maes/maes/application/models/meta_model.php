<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meta_Model extends CI_Model {
	
	public function get() {
		$this->db->from('meta');
		$this->db->order_by('codgimet');
		return $this->db->get()->result();
	}
	
	
	public function getQuestoesMeta($meta) {
		$this->db->from('questao');
		$this->db->where('cmetiqes', $meta, FALSE);
		$this->db->order_by('codgiqes');
		return $this->db->get()->result();
	}
	
	public function getResultadosMeta($meta) {
		$this->db->from('resultado_esperado');
		$this->db->where('cmetires', $meta, FALSE);
		$this->db->order_by('codgires');
		return $this->db->get()->result();
	}
	
	public function getMelhoresPraticasResultado($resultado) {
		$this->db->from('melhor_pratica');
		$this->db->where('cresimpa', $resultado, FALSE);
		$this->db->order_by('codgimpa');
		return $this->db->get()->result();
	}
	
	public function getQtdMelhoresPraticasResultado($resultado) {
		$this->db->from('melhor_pratica');
		$this->db->where('cresimpa', $resultado, FALSE);
		$this->db->order_by('codgimpa');
		return $this->db->get()->num_rows();
	}
	
	public function getExemploProdutoResultado($melhor_pratica) {
		$this->db->from('exemplo_produto');
		$this->db->where('cmpaiexp', $melhor_pratica, FALSE);
		$this->db->order_by('codgiexp');
		return $this->db->get()->result();
	}
	
	public function getMeta($codgimet) {
		$this->db->where('codgimet', $codgimet, FALSE);
		$this->db->from('meta');
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