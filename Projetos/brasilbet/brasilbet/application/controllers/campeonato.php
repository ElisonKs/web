<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campeonato extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		if ($this->session->userdata('admin_cambista') != 1) {redirect('');}
		
		$this->layout = LAYOUT_DASHBOARD_ADMINISTRATIVO;
		
		$this->load->model('Campeonato_Model', 'CampeonatoModel');

	}
	
	public function index() {
		$dados = array();
		
		$dados['ATUALIZAR']     = site_url('campeonato');
		$dados['NOVO_CAMPEONATO'] = site_url('campeonato/novo');
		$dados['BLC_DADOS']     = array();
		
		$this->carregarDados($dados);
		
		$this->parser->parse('campeonato_consulta', $dados);
	}
	
	public function novo() {
		$dados = array();
		
		$dados['id_campeonato']        = 0;
		$dados['nome_campeonato'] = '';
		
		$dados['ACAO'] = 'Novo';
		$this->setarURL($dados);
		
		$this->carregarDadosFlash($dados);
		
		$this->parser->parse('campeonato_cadastro', $dados);
	}
	
	public function editar($id_campeonato) {
		$id_campeonato = base64_decode($id_campeonato);
		$dados = array();
		
		$this->carregarCampeonato($id_campeonato, $dados);
		
		$dados['ACAO'] = 'Editar';
		$this->setarURL($dados);
		
		$this->carregarDadosFlash($dados);
		
		$this->parser->parse('campeonato_cadastro', $dados);
	}
	
	public function salvar() {
		global $id_campeonato;
		global $nome_campeonato;
		
		$id_campeonato        = $this->input->post('id_campeonato');
		$nome_campeonato = $this->input->post('nome_campeonato');
		
		
		if ($this->testarDados()) {
			$campeonato = array(
				"nome_campeonato" => $nome_campeonato
			);
			
			if (!$id_campeonato) {
				$id_campeonato= $this->CampeonatoModel->insert($campeonato);
			} else {
				$id_campeonato= $this->CampeonatoModel->update($campeonato, $id_campeonato);
			}

			if (is_numeric($id_campeonato)) {
				$this->session->set_flashdata('sucesso', 'Campeonato salvo com sucesso.');
				redirect('campeonato');
			} else {
				$this->session->set_flashdata('erro', $id_campeonato);
				redirect('campeonato');
			}
		} else {
			if (!$id_campeonato) {
				redirect('campeonato/novo/');
			} else {
				redirect('campeonato/editar/'.base64_encode($id_campeonato));
			}			
		}
	}
	
	public function apagar($id_campeonato) {
		if ($this->testarApagar(base64_decode($id_campeonato))) {
			$res = $this->CampeonatoModel->delete(base64_decode($id_campeonato));
	
			if ($res) {
				$this->session->set_flashdata('sucesso', 'Campeonato apagado com sucesso.');
			} else {
				$this->session->set_flashdata('erro', 'Não foi possível apagar o Campeonato.');
			}
		}
		
		redirect('campeonato');
	}
	
	private function setarURL(&$dados) {
		$dados['CONSULTA_CAMPEONATO'] = site_url('campeonato');
		$dados['ACAO_FORM']         = site_url('campeonato/salvar');
	}
	
	private function carregarDados(&$dados) {
		$resultado = $this->CampeonatoModel->get();
		
		foreach ($resultado as $registro) {
			$dados['BLC_DADOS'][] = array(
				"ID_CAMPEONATO"        => $registro->id_campeonato,
				"NOME_CAMPEONATO" => $registro->nome_campeonato,
				"EDITAR_CAMPEONATO"   => site_url('campeonato/editar/'.base64_encode($registro->id_campeonato)),
				"APAGAR_CAMPEONATO"   => "abrirConfirmacao('".base64_encode($registro->id_campeonato)."')"
			);
		}
	}
	
	private function carregarCampeonato($id_campeonato, &$dados) {
		$resultado = $this->CampeonatoModel->getCampeonato($id_campeonato);
		
		if ($resultado) {
			foreach ($resultado as $chave => $valor) {
				$dados[$chave] = $valor;
			}
					
		} else {
			show_error('Não foram encontrados dados.', 500, 'Ops, erro encontrado');			
		}
	}
	
	private function testarDados() {
		global $nome_campeonato;
		
		$erros    = FALSE;
		$mensagem = null;
		
		
		if (empty($nome_campeonato)) {
			$erros    = TRUE;
			$mensagem .= "- Nome não preenchido.\n";
			$this->session->set_flashdata('ERRO_NOME_CAMPEONATO', 'has-error');
		}
		
		if ($erros) {
			$this->session->set_flashdata('titulo_erro', 'Para continuar corrija os seguintes erros:');
			$this->session->set_flashdata('erro', nl2br($mensagem));
			
			$this->session->set_flashdata('ERRO_CAMPEONATO', TRUE);
			$this->session->set_flashdata('nome_campeonato', $nome_campeonato);
		}
		
		return !$erros;
	}
	
	private function testarApagar($id_campeonato) {
		$erros    = FALSE;
		$mensagem = null;
	
//		$resultado = $this->EmpresaSegmentoModel->getEmpresas($dlv_id_seg);
//
//		if ($resultado) {
//			$erros    = TRUE;
//			$mensagem .= "- Um ou mais empresas mar este segmento.\n";
//		}
	
		if ($erros) {
			$this->session->set_flashdata('titulo_erro', 'Não foi possível apagar o campeonato:');
			$this->session->set_flashdata('erro', nl2br($mensagem));
		}
	
		return !$erros;
	}
	
	
	private function carregarDadosFlash(&$dados) {
		$ERRO_CAMPEONATO           = $this->session->flashdata('ERRO_CAMPEONATO');
		$ERRO_NOME_CAMPEONATO = $this->session->flashdata('ERRO_NOME_CAMPEONATO');
		$nome_campeonato      = $this->session->flashdata('nome_campeonato');
		
		if ($ERRO_CAMPEONATO) {
			$dados['nome_campeonato']      = $nome_campeonato;
			
			$dados['ERRO_NOME_CAMPEONATO'] = $ERRO_NOME_CAMPEONATO;
		}
	}
}