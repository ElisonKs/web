<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cambista extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		if ($this->session->userdata('admin_cambista') != 1) {redirect('');}
		
		$this->layout = LAYOUT_DASHBOARD_ADMINISTRATIVO;
		
		$this->load->model('Cambista_Model', 'CambistaModel');
		
	}
	
	public function index() {
		$dados = array();
		
		$dados['ATUALIZAR']  = site_url('cambista');
		$dados['NOVO_CAMBISTA'] = site_url('cambista/novo');
		$dados['BLC_DADOS']  = array();
		
		$this->carregarDados($dados);
		
		$this->parser->parse('cambista_consulta', $dados);
	}
	
	public function novo() {
		$dados = array();
		
		$dados['id_cambista']              = 0;		
		$dados['login_cambista']            = '';
		$dados['senha_cambista']           = '';
		$dados['senha_cambista_confirmar'] = '';
		$dados['pin_cambista']           = '';
		$dados['pin_cambista_confirmar'] = '';
		$dados['ativo_cambista']           = 'checked';
		
		$dados['LOGIN_CAMBISTA_DISABLED']  = '';
		$dados['DIV_SENHAS']              = '';
		
		$dados['ACAO'] = 'Novo';
		$this->setarURL($dados);

		$this->carregarDadosFlash($dados);

		
		
		$this->parser->parse('cambista_cadastro', $dados);
	}
	
	public function editar($id_cambista) {
		$id_cambista = base64_decode($id_cambista);
		$dados = array();
		
		
		
		$this->carregarCambista($id_cambista, $dados);
		
		$dados['ACAO'] = 'Editar';
		$this->setarURL($dados);
		
		$this->carregarDadosFlash($dados);
		
		
		
		$this->parser->parse('cambista_cadastro', $dados);	
	}
	
	public function salvar() {
		global $id_cambista;
		global $login_cambista;
		global $senha_cambista;
		global $senha_cambista_confirmar;
		global $ativo_cambista;
		global $pin_cambista;
		global $pin_cambista_confirmar;
		
		$id_cambista     	     = $this->input->post('id_cambista');			
		$login_cambista   		 = $this->input->post('login_cambista');
		$senha_cambista 			 = $this->input->post('senha_cambista');
		$senha_cambista_confirmar = $this->input->post('senha_cambista_confirmar');
		$ativo_cambista           = $this->input->post('ativo_cambista');
		$pin_cambista 			 = $this->input->post('pin_cambista');
		$pin_cambista_confirmar = $this->input->post('pin_cambista_confirmar');
		
		
		if ($this->testarDados()) {
			$cambista = array(
				"login_cambista"    	  => $login_cambista,
				"senha_cambista"      => $senha_cambista,
     				"pin_cambista"        => $pin_cambista,
				"ativo_cambista"       => ($ativo_cambista)?'1':'0',
				"admin_cambista"    => 0						
			);
			
			if (!$id_cambista) {	
				$cambista['login_cambista'] = $login_cambista;
				$cambista['senha_cambista'] = $senha_cambista;
				
				$id_cambista = $this->CambistaModel->insert($cambista);
			} else {
				$id_cambista = $this->CambistaModel->update($cambista, $id_cambista);
			}

			if (is_numeric($id_cambista)) {
				$this->session->set_flashdata('sucesso', 'Cambista salvo com sucesso.');
				redirect('cambista');
			} else {
				$this->session->set_flashdata('erro', $id_cambista);	
				redirect('cambista');
			}
		} else {
			if (!$id_cambista) {
				redirect('cambista/novo/');
			} else {
				redirect('cambista/editar/'.base64_encode($id_cambista));
			}			
		}
	}
	
	public function apagar($id_cambista) {
		if ($this->testarApagar(base64_decode($id_cambista))) {
			$res = $this->CambistaModel->delete(base64_decode($id_cambista));
	
			if ($res) {
				$this->session->set_flashdata('sucesso', 'Cambista apagado com sucesso.');
			} else {
				$this->session->set_flashdata('erro', 'Não foi possível apagar cambista.');				
			}
		}
		
		redirect('cambista');
	}
	
	private function setarURL(&$dados) {
		$dados['CONSULTA_CAMBISTA'] = site_url('cambista');
		$dados['ACAO_FORM']        = site_url('cambista/salvar');
	}
	
	private function carregarDados(&$dados) {
		$resultado = $this->CambistaModel->getCambistasNaoAdmin();
		
		foreach ($resultado as $registro) {
			$dados['BLC_DADOS'][] = array(
				"LOGIN_CAMBISTA"         => $registro->login_cambista,
				"SENHA_CAMBISTA"    => $registro->senha_cambista,
				"PIN_CAMBISTA"    => $registro->pin_cambista,
				"ATIVO_CAMBISTA"        => ($registro->ativo_cambista == 1)?'checked':'',
				"EDITAR_CAMBISTA"       => site_url('cambista/editar/'.base64_encode($registro->id_cambista)),
				"APAGAR_CAMBISTA"       => "abrirConfirmacao('".base64_encode($registro->id_cambista)."')"
			);
		}
	}
	
	
	
	
	private function carregarCambista($id_cambista, &$dados) {
		$resultado = $this->CambistaModel->getCambistaChave($id_cambista);
		
		if ($resultado) {
			foreach ($resultado as $chave => $valor) {
				$dados[$chave] = $valor;
			}
			
			$dados['senha_cambista']           = $resultado->senha_cambista;
			$dados['senha_cambista_confirmar'] = $resultado->senha_cambista;
			$dados['pin_cambista']           = $resultado->pin_cambista;
			$dados['pin_cambista_confirmar'] = $resultado->pin_cambista;
			$dados['ativo_cambista']           = ($resultado->ativo_cambista == 1)?'checked':'';
		} else {
			show_error('Não foram encontrados dados.', 500, 'Ops, erro encontrado');			
		}
	}
	
	private function testarDados() {
		global $id_cambista;
		global $login_cambista;
		global $senha_cambista;
		global $senha_cambista_confirmar;
		global $pin_cambista;
		global $pin_cambista_confirmar;
		global $ativo_cambista;
				
		$erros    = FALSE;
		$mensagem = null;
		
		
		if (empty($login_cambista)) {
			$erros    = TRUE;
			$mensagem .= "- Login não preenchido.\n";
			$this->session->set_flashdata('ERRO_LOGIN_CAMBISTA', 'has-error');				
		}
		
		if (empty($senha_cambista)) {
			$erros    = TRUE;
			$mensagem .= "- Senha não preenchida.\n";
			$this->session->set_flashdata('ERRO_SENHA_CAMBISTA', 'has-error');
		} 
		
				
		
		if ($erros) {
			$this->session->set_flashdata('titulo_erro', 'Para continuar corrija os seguintes erros:');
			$this->session->set_flashdata('erro', nl2br($mensagem));
			
			$this->session->set_flashdata('ERRO_LOGIN_CAMBISTA', TRUE);				
			$this->session->set_flashdata('login_cambista', $login_cambista);				
			$this->session->set_flashdata('senha_cambisa', $senha_cambista);
			$this->session->set_flashdata('pin_cambisa', $pin_cambista);					
			$this->session->set_flashdata('ativo_cambista', $ativo_cambista);				
		}
		
		return !$erros;
	}
	
	private function testarApagar($id_cambista) {
		$erros    = FALSE;
		$mensagem = null;
		
		if ($erros) {
			$this->session->set_flashdata('titulo_erro', 'Não foi possível apagar o cambista:');
			$this->session->set_flashdata('erro', nl2br($mensagem));
		}
		
		return !$erros;
	}
	
	
	private function carregarDadosFlash(&$dados) {
		$ERRO_CAMBISTA                  = $this->session->flashdata('ERRO_CAMBISTA');
		$ERRO_LOGIN_CAMBISTA            = $this->session->flashdata('ERRO_LOGIN_CAMBISTA');
		
		
		$ERRO_SENHA_CAMBISTA            = $this->session->flashdata('ERRO_SENHA_CAMBISTA');
		$ERRO_SENHA_CAMBISTA_CONFIRMAR  = $this->session->flashdata('ERRO_SENHA_CAMBISTA_CONFIRMAR');
		$ERRO_PIN_CAMBISTA            = $this->session->flashdata('ERRO_PIN_CAMBISTA');
		$ERRO_PIN_CAMBISTA_CONFIRMAR  = $this->session->flashdata('ERRO_PIN_CAMBISTA_CONFIRMAR');
		
		$login_cambista        = $this->session->flashdata('login_cambista');
		$senha_cambista      = $this->session->flashdata('senha_cambista');
		$pin_cambista       = $this->session->flashdata('pin_cambista');
		$ativo_cambista       = $this->session->flashdata('ativo_cambista');
		
		if ($ERRO_CAMBISTA) {
			$dados['login_cambista']   = $login_cambista;
			$dados['senha_cambista'] = $senha_cambista;
			$dados['pin_cambista']  = $pin_cambista;
			$dados['ativo_cambista']  = ($ativo_cambista == 1)?'checked':'';
				
			$dados['ERRO_LOGIN_CAMBISTA']             = $ERRO_LOGIN_CAMBISTA;
			$dados['ERRO_SENHA_CAMBISTA']           = $ERRO_SENHA_CAMBISTA;
			$dados['ERRO_SENHA_CAMBISTA_CONFIRMAR']            = $ERRO_SENHA_CAMBISTA_CONFIRMAR;
			$dados['ERRO_PIN_CAMBISTA']            = $ERRO_PIN_CAMBISTA;
			$dados['ERRO_PIN_CAMBISTA_CONFIRMAR']  = $ERRO_PIN_CAMBISTA_CONFIRMAR;
		}
	}
}