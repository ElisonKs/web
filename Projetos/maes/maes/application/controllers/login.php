<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		
		$this->load->model('Empresa_Model', 'EmpresaModel');
		
		
		if (!isset($_SESSION)) {
			session_start();
		}		
		
		if ($this->session->userdata('logado')) {$this->session->destroy();}		
	}
	
	public function index() {
		$dados = array();
		
		
		
		
		$dados['mailcemp']        = '';
		$dados['chavcemp']        = '';
		
		
		$dados['ACAO_FORM'] = site_url('login/entrar');
		
		$this->carregarDadosFlash($dados);
		
		$this->parser->parse('login_view', $dados);
	}
	
	public function entrar() {
		global $mailcemp;
		global $chavcemp;
		global $empresa;
		
		
		$mailcemp  	= $this->input->post('mailcemp');	
		$chavcemp  	= $this->input->post('chavcemp');

		
		
		if ($this->testarDados()) {
			$this->session->set_userdata(array('logado' => TRUE));
			$this->session->set_userdata($empresa);
			
			redirect('');
		} else {
			redirect('login/');
		}
	}
	
	private function testarDados() {
		
		global $mailcemp;
		global $chavcemp;
		
		global $empresa;
		
		
		$erros    = FALSE;
		$mensagem = null;
		
		


			

		if (empty($mailcemp)) {
			$erros    = TRUE;
			$mensagem .= "- Email não informado.\n";

			$this->session->set_flashdata('ERRO_EMAIL_EMPRESA', 'has-error');
		}

		if (empty($chavcemp)) {
			$erros    = TRUE;
			$mensagem .= "- Senha não informada.\n";

			$this->session->set_flashdata('ERRO_SENHA_EMPRESA', 'has-error');
		}

                if ((!empty($mailcemp)) and (!empty($chavcemp))) {
						$empresa = $this->EmpresaModel->getEmpresa($mailcemp, $chavcemp);
						if (!$empresa)
						 {
							$erros    = TRUE;
							$mensagem .= "- Email ou senha incorretos.\n";
							
							
							
							$this->session->set_flashdata('ERRO_EMAIL_EMPRESA', 'has-error');
							$this->session->set_flashdata('ERRO_SENHA_EMPRESA', 'has-error');
						}
						else
						{
							if($empresa->ativiemp==0)
							{
								$erros    = TRUE;
							        $mensagem .= "- Valide seu cadastro pelo link enviado no email.\n";
							        $this->session->set_flashdata('ERRO_EMAIL_EMPRESA', 'has-error');
    							        $this->session->set_flashdata('ERRO_SENHA_EMPRESA', 'has-error');
							        
							}
							
						}
						 
						                     }
			
		if ($erros) {
			$this->session->set_flashdata('titulo_erro', 'Para entrar corrija os seguintes erros:');
			$this->session->set_flashdata('erro', nl2br($mensagem));
				
			$this->session->set_flashdata('ERRO_LOGIN', TRUE);
			
			$this->session->set_flashdata('mailcemp', $mailcemp);
		}
	
		return !$erros;
	}
	
	private function carregarDadosFlash(&$dados) {
		$ERRO_LOGIN           = $this->session->flashdata('ERRO_LOGIN');
		
		$ERRO_EMAIL_EMPRESA   = $this->session->flashdata('ERRO_EMAIL_EMPRESA');
		$ERRO_SENHA_EMPRESA   = $this->session->flashdata('ERRO_SENHA_EMPRESA');
		
		
		$mailcemp      = $this->session->flashdata('mailcemp');
		
		$titulo_erro = $this->session->flashdata('titulo_erro');
		$erro        = $this->session->flashdata('erro');
		
		if ($ERRO_LOGIN) {
			
			$dados['mailcemp']        = $mailcemp;
				
			
			
			
			$dados['ERRO_EMAIL_EMPRESA']   = $ERRO_EMAIL_EMPRESA;
			$dados['ERRO_SENHA_EMPRESA']   = $ERRO_SENHA_EMPRESA;
				
			
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