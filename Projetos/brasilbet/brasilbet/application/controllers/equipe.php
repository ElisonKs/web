<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equipe extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		if ($this->session->userdata('admin_cambista') != 1) {redirect('');}
		
		$this->layout = LAYOUT_DASHBOARD_ADMINISTRATIVO;
		
		$this->load->model('Equipe_Model', 'EquipeModel');

	}
	
	public function index() {
		$dados = array();
		
		$dados['ATUALIZAR']     = site_url('equipe');
		$dados['NOVA_EQUIPE'] = site_url('equipe/novo');
		$dados['BLC_DADOS']     = array();
		
		$this->carregarDados($dados);
		
		$this->parser->parse('equipe_consulta', $dados);
	}
	
	public function novo() {
		$dados = array();
		
		$dados['id_equipe']        = 0;
		$dados['nome_equipe'] = '';
		
		$dados['ACAO'] = 'Novo';
		$this->setarURL($dados);
		
		$this->carregarDadosFlash($dados);
		
		$this->parser->parse('equipe_cadastro', $dados);
	}
	
	public function editar($id_equipe) {
		$id_equipe = base64_decode($id_equipe);
		$dados = array();
		
		$this->carregarEquipe($id_equipe, $dados);
		
		$dados['ACAO'] = 'Editar';
		$this->setarURL($dados);
		
		$this->carregarDadosFlash($dados);
		
		$this->parser->parse('equipe_cadastro', $dados);
	}
	
	public function salvar() {
		global $id_equipe;
		global $nome_equipe;
		
		$id_equipe        = $this->input->post('id_equipe');
		$nome_equipe = $this->input->post('nome_equipe');
		
		
		if ($this->testarDados()) {
			$equipe = array(
				"nome_equipe" => $nome_equipe
			);
			
			if (!$id_equipe) {
				$id_equipe= $this->EquipeModel->insert($equipe);
			} else {
				$id_equipe= $this->EquipeModel->update($equipe, $id_equipe);
			}

			if (is_numeric($id_equipe)) {
				$this->session->set_flashdata('sucesso', 'Equipe salva com sucesso.');
				redirect('equipe');
			} else {
				$this->session->set_flashdata('erro', $id_equipe);
				redirect('equipe');
			}
		} else {
			if (!$id_equipe) {
				redirect('equipe/novo/');
			} else {
				redirect('equipe/editar/'.base64_encode($id_equipe));
			}			
		}
	}
	
	public function apagar($id_equipe) {
		if ($this->testarApagar(base64_decode($id_equipe))) {
			$res = $this->EquipeModel->delete(base64_decode($id_equipe));
	
			if ($res) {
				$this->session->set_flashdata('sucesso', 'Equipe apagada com sucesso.');
			} else {
				$this->session->set_flashdata('erro', 'Não foi possível apagar a Equipe.');
			}
		}
		
		redirect('equipe');
	}
	
	private function setarURL(&$dados) {
		$dados['CONSULTA_EQUIPE'] = site_url('equipe');
		$dados['ACAO_FORM']         = site_url('equipe/salvar');
	}
	
	private function carregarDados(&$dados) {
		$resultado = $this->EquipeModel->get();
		
		foreach ($resultado as $registro) {
			$dados['BLC_DADOS'][] = array(
				"ID_EQUIPE"        => $registro->id_equipe,
				"NOME_EQUIPE" => $registro->nome_equipe,
				"EDITAR_EQUIPE"   => site_url('equipe/editar/'.base64_encode($registro->id_equipe)),
				"APAGAR_EQUIPE"   => "abrirConfirmacao('".base64_encode($registro->id_equipe)."')"
			);
		}
	}
	
	private function carregarEquipe($id_equipe, &$dados) {
		$resultado = $this->EquipeModel->getEquipe($id_equipe);
		
		if ($resultado) {
			foreach ($resultado as $chave => $valor) {
				$dados[$chave] = $valor;
			}
					
		} else {
			show_error('Não foram encontrados dados.', 500, 'Ops, erro encontrado');			
		}
	}
	
	private function testarDados() {
		global $nome_equipe;
		
		$erros    = FALSE;
		$mensagem = null;
		
		
		if (empty($nome_equipe)) {
			$erros    = TRUE;
			$mensagem .= "- Nome não preenchido.\n";
			$this->session->set_flashdata('ERRO_NOME_EQUIPE', 'has-error');
		}
		
		if ($erros) {
			$this->session->set_flashdata('titulo_erro', 'Para continuar corrija os seguintes erros:');
			$this->session->set_flashdata('erro', nl2br($mensagem));
			
			$this->session->set_flashdata('ERRO_EQUIPE', TRUE);
			$this->session->set_flashdata('nome_equipe', $nome_equipe);
		}
		
		return !$erros;
	}
	
	private function testarApagar($id_equipe) {
		$erros    = FALSE;
		$mensagem = null;
	
//		$resultado = $this->EmpresaSegmentoModel->getEmpresas($dlv_id_seg);
//
//		if ($resultado) {
//			$erros    = TRUE;
//			$mensagem .= "- Um ou mais empresas mar este segmento.\n";
//		}
	
		if ($erros) {
			$this->session->set_flashdata('titulo_erro', 'Não foi possível apagar a equipe:');
			$this->session->set_flashdata('erro', nl2br($mensagem));
		}
	
		return !$erros;
	}
	
	
	private function carregarDadosFlash(&$dados) {
		$ERRO_EQUIPE           = $this->session->flashdata('ERRO_EQUIPE');
		$ERRO_NOME_EQUIPE = $this->session->flashdata('ERRO_NOME_EQUIPE');
		$nome_equipe      = $this->session->flashdata('nome_equipe');
		
		if ($ERRO_EQUIPE) {
			$dados['nome_equipe']      = $nome_equipe;
			
			$dados['ERRO_NOME_EQUIPE'] = $ERRO_NOME_EQUIPE;
		}
	}
}