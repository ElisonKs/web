<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		
		$this->load->model('Cambista_Model', 'CambistaModel');
		
		
		if (!isset($_SESSION)) {
			session_start();
		}		
		
		if ($this->session->userdata('logado')) {$this->session->destroy();}		
	}
	
	public function index() {
		$dados = array();
		
		
		
		
		$dados['login_cambista']        = '';
		$dados['senha_cambista']        = '';
		
		
		$dados['ACAO_FORM'] = site_url('login/entrar');
		
		$this->carregarDadosFlash($dados);
		
		$this->parser->parse('login_view', $dados);
	}
	
	public function entrar() {
		global $login_cambista;
		global $senha_cambista;
		global $cambista;
		
		
		$login_cambista  	= $this->input->post('login_cambista');	
		$senha_cambista  	= $this->input->post('senha_cambista');

		
		
		if ($this->testarDados()) {
			$this->session->set_userdata(array('logado' => TRUE));
			$this->session->set_userdata($cambista);
			
			redirect('');
		} else {
			redirect('login/');
		}
	}
	
	private function testarDados() {
		
		global $login_cambista;
		global $senha_cambista;
		
		global $cambista;
		
		
		$erros    = FALSE;
		$mensagem = null;
		
		


			

		if (empty($login_cambista)) {
			$erros    = TRUE;
			$mensagem .= "- Login não informado.\n";

			$this->session->set_flashdata('ERRO_LOGIN_CAMBISTA', 'has-error');
		}

		if (empty($senha_cambista)) {
			$erros    = TRUE;
			$mensagem .= "- Senha não informada.\n";

			$this->session->set_flashdata('ERRO_SENHA_CAMBISTA', 'has-error');
		}

                if ((!empty($login_cambista)) and (!empty($senha_cambista))) {
						$cambista = $this->CambistaModel->getCambista($login_cambista, $senha_cambista);
						if (!$cambista) {
							$erros    = TRUE;
							$mensagem .= "- Login ou senha incorretos.\n";
							
							$this->session->set_flashdata('ERRO_LOGIN_CAMBISTA', 'has-error');
							$this->session->set_flashdata('ERRO_SENHA_CAMBISTA', 'has-error');
						} else {
							if (!$cambista->ativo_cambista) {
								$erros    = TRUE;
								$mensagem .= "- Login inativo.\n";
								
								$this->session->set_flashdata('ERRO_LOGIN_CAMBISTA', 'has-error');
								$this->session->set_flashdata('ERRO_SENHA_CAMBISTA', 'has-error');
						                        	}
							}
						                        	}
			
		if ($erros) {
			$this->session->set_flashdata('titulo_erro', 'Para entrar corrija os seguintes erros:');
			$this->session->set_flashdata('erro', nl2br($mensagem));
				
			$this->session->set_flashdata('ERRO_LOGIN', TRUE);
			
			$this->session->set_flashdata('login_cambista', $login_cambista);
		}
	
		return !$erros;
	}
	
	private function carregarDadosFlash(&$dados) {
		$ERRO_LOGIN           = $this->session->flashdata('ERRO_LOGIN');
		
		$ERRO_LOGIN_CAMBISTA   = $this->session->flashdata('ERRO_LOGIN_CAMBISTA');
		$ERRO_SENHA_CAMBISTA   = $this->session->flashdata('ERRO_SENHA_CAMBISTA');
		
		
		$login_cambista      = $this->session->flashdata('login_cambista');
		
		$titulo_erro = $this->session->flashdata('titulo_erro');
		$erro        = $this->session->flashdata('erro');
		
		if ($ERRO_LOGIN) {
			
			$dados['login_cambista']        = $login_cambista;
				
			
			
			
			$dados['ERRO_LOGIN_CAMBISTA']   = $ERRO_LOGIN_CAMBISTA;
			$dados['ERRO_SENHA_CAMBISTA']   = $ERRO_SENHA_CAMBISTA;
				
			
			$dados['MENSAGEM_LOGIN_ERRO'] = $this->criarAlterta($titulo_erro, $erro);
		} else {
			$dados['MENSAGEM_LOGIN_ERRO'] = '';
		} 
	}
	
	
	private function criarAlterta($titulo, $mensagem) {
		$html = " <br/>
		<div class='alert alert-danger' role='alert' align='center' >
		<button type='button' class='close' data-dismiss='alert'>
		<span aria-hidden='true'>&times;</span>
		</button>
		<h4>
		<strong>{$titulo}</strong>
		</h4>";
	
		if (!empty($mensagem)) {
		$html .= "<div align='left'>
		<strong>{$mensagem}</strong>
		</div>";
		}
			
			
		$html .= "</div>";
	
		return $html;
	}
	
}