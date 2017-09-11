<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jogo_Json extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('Jogo_Model', 'JogoModel');
	}
	
	

	public function ativar_desativar($id_jogo, $ativarDesativar) {
		$jogo = array(
			"ativo_jogo"       => $ativarDesativar)
			
		);
	
		$dados['resposta'] = false;
		$atualizado        = $this->JogoModel->update($jogo, base64_decode($id_jogo));
	
		if ($atualizado) {
			$dados['resposta'] = true;
		}
	
		echo json_encode($dados);
	}	
}