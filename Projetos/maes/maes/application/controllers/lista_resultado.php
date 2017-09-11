<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lista_Resultado extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		
		
		$this->layout = LAYOUT_DASHBOARD_ADMINISTRATIVO;
		
		$this->load->model('Aplicacao_Model', 'AplicacaoModel');
		
	}
	
	public function index() {
		$dados = array();
		


		$dados['BLC_DADOS']  = array();
		$dados['URL_NOVA'] = site_url('aplicacao');
		
		$this->carregarDados($dados);
		
		$this->parser->parse('lista_resultado_view', $dados);
	}
	
	
	
	
	
	
	
	
	
	
	
	private function carregarDados(&$dados) {
		$resultado = $this->AplicacaoModel->get($this->session->userdata('cnpjcemp'));
		
		foreach ($resultado as $registro) {
			$data = strtotime($registro->datadapl);
			$dados['BLC_DADOS'][] = array(
			        "COD_APLICACAO" => $registro->codgiapl, 
				"DATA"         => date('d/m/Y H:i:s', $data),
				"NIVEL"    => $registro->niveiapl,
				"VER_RESULTADO" => site_url('resultado/index/')
			);
		}
	}
	
	
	
	
	
	
}