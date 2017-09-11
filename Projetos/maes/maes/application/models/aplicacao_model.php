<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aplicacao_Model extends CI_Model {
	
	public function get($id_empresa) {
		$this->db->from('aplicacao');
		$this->db->where('cempcapl', $id_empresa, FALSE);
		$this->db->order_by('datadapl');
		return $this->db->get()->result();
	}
	
	public function getAplicacao($codgiapl) {
		$this->db->where('codgiapl', $codgiapl, FALSE);
		$this->db->from('aplicacao');
		return $this->db->get()->first_row();
	}
	
	public function insert($aplicacao) {
		$res = $this->db->insert('aplicacao', $aplicacao);
		
		if ($res) {
			return $this->db->insert_id();
		} else {
			return FALSE;
		}		
	}
	
	public function gravarQuestao($questao_aplicacao) {
		$res = $this->db->insert('questao_aplicacao', $questao_aplicacao);
		
		if ($res) {
			return $this->db->insert_id();
		} else {
			return FALSE;
		}		
	}
	public function getMelhoresPraticasMeta($meta)
	{
	  	$this->db->from('melhor_pratica');
	  	$this->db->join('resultado_esperado', 'resultado_esperado.codgires = melhor_pratica.cresimpa', 'left outer');
	  	$this->db->join('meta', ' meta.codgimet = resultado_esperado.cmetires', 'left outer');
	  	$this->db->where('meta.codgimet', $meta, FALSE);
	  	return $this->db->get()->result();
	  	
	  
	}
	
	public function getExemploProdutoMeta($meta)
	{
	  	$this->db->from('exemplo_produto');
	  	$this->db->join('resultado_esperado', 'resultado_esperado.codgires = exemplo_produto.cresiexp', 'left outer');
	  	$this->db->join('meta', ' meta.codgimet = resultado_esperado.cmetires', 'left outer');
	  	$this->db->where('meta.codgimet', $meta, FALSE);
	  	return $this->db->get()->result();
	  	
	  
	}
	
	public function update($aplicacao, $codgiapl) {
		$this->db->where('codgiapl', $codgiapl, FALSE);
		$res = $this->db->update('aplicacao', $aplicacao);
	
		if ($res) {
			return $codgiapl;
		} else {
			return FALSE;
		}
	}
	
	
	
	public function getResultadosNegativos($codgiapl)
	{
	  	$this->db->from('questao_aplicacao');
	  	$where_negativo = "(respiqap = 1 or respiqap = 2)";
	  	$this->db->where($where_negativo);
	  	$this->db->where('capliqap', $codgiapl, FALSE);
	  	return $this->db->get()->result();
	  	
	  
	}
	
	
	public function delete($vei_id_cam) {
		$this->db->where('vei_id_cam', $vei_id_cam, FALSE);
		return $this->db->delete('vei_cam');
	}
	
}