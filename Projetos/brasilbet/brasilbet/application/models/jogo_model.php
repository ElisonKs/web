<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jogo_Model extends CI_Model {
	
	public function get() {
		$this->db->from('Jogo');
		$this->db->order_by('data_jogo');
		return $this->db->get()->result();
	}
	
	public function getJogo($id_jogo) {
		$this->db->where('id_jogo', $id_jogo, FALSE);
		$this->db->from('Jogo');
		return $this->db->get()->first_row();
	}
	public function getJogoCategoria($idcampeonato_jogo = NULL, $ativo_jogo = NULL) {
		
		
		if (($idcampeonato_jogo != NULL) && ($idcampeonato_jogo != 0)) {
			$this->db->where('idcampeonato_jogo', $idcampeonato_jogo, FALSE);
		}
		
		if (($ativo_jogo != NULL) && ($ativo_jogo != 2)) {
			$this->db->where('ativo_jogo', $ativo_jogo, FALSE);
		}
				
		$this->db->join('campeonato', 'id_campeonato = idcampeonato_jogo', 'LEFT');		
		$this->db->from('Jogo');
		return $this->db->get()->result();
	}
	

	public function getNomeEquipeJogo($id_equipe) {
		$this->db->select('nome_equipe');
	
		$this->db->from('equipe');
	        $this->db->where('id_equipe', $id_equipe, FALSE);
		$query = $this->db->get();
		$result = $query->row();
                return $result->nome_equipe; 
	}
	
	public function getNomeCampeonatoJogo($id_campeonato) {
		$this->db->select('nome_campeonato');
	
		$this->db->from('campeonato');
	        $this->db->where('id_campeonato', $id_campeonato, FALSE);
		$query = $this->db->get();
		$result = $query->row();
                return $result->nome_campeonato; 
	}
	
	public function insert($jogo) {
		$res = $this->db->insert('Jogo', $jogo);
		
		if ($res) {
			return $this->db->insert_id();
		} else {
			return FALSE;
		}		
	}
	
	public function update($jogo, $id_jogo) {
		$this->db->where('id_jogo', $id_jogo, FALSE);
		$res = $this->db->update('Jogo', $jogo);
	
		if ($res) {
			return $id_jogo;
		} else {
			return FALSE;
		}
	}
	
	
	public function delete($id_jogo) {
		$this->db->where('id_jogo', $id_jogo, FALSE);
		return $this->db->delete('Jogo');
	}
	
}