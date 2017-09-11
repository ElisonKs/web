<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jogo extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		if ($this->session->userdata('admin_cambista') != 1) {redirect('');}
		
		$this->layout = LAYOUT_DASHBOARD_ADMINISTRATIVO;
		
		$this->load->model('Jogo_Model', 'JogoModel');
		$this->load->model('Equipe_Model', 'EquipeModel');
		$this->load->model('Campeonato_Model', 'CampeonatoModel');
	}
	
	public function index($idcampeonato_jogo = NULL, $opcao_status = NULL) {
		$dados = array();
		
		$dados['ATUALIZAR']     = site_url('jogo');
		$dados['NOVO_JOGO'] = site_url('jogo/novo');
		$dados['ACAO_FORM']            = site_url('jogo/pesquisar');
		$dados['DATA_INICIAL'] = date('d/m/Y');
		$dados['DATA_FINAL']   = date('d/m/Y', strtotime("+1 day"));
		$dados['URL_ATIVAR_DESATIVAR'] = site_url('json/jogo_json/ativar_desativar');
		$dados['BLC_DADOS']     = array();
		$dados['idcampeonato_jogo'] = $idcampeonato_jogo;
		$dados['opcao_status']   = $opcao_status;
		$this->carregarDados($dados);
		$this->carregarCampeonatos($dados);
		$this->parser->parse('jogo_consulta', $dados);
	}
	
	public function novo() {
		$dados = array();
		
		$dados['id_jogo']        = 0;
		
		$dados['idequipefora_jogo'] = 0;
		$dados['idequipecasa_jogo'] = 0;
		$dados['idcampeonato_jogo'] = 0;
		$dados['data_jogo'] = '';
		$dados['ativo_jogo']     = 'checked';
		$dados['golsequipe1_jogo'] = 0;
		$dados['golsequipe2_jogo'] = 0;
		$dados['valorcasa_jogo'] = 0;
		$dados['valofora_jogo'] = 0;
		$dados['valorempate_jogo'] = 0;
		$dados['valorduplacasa_jogo'] = 0;
		$dados['valorduplafora_jogo'] = 0;
		$dados['valorgolmeiocasa_jogo'] = 0;
		$dados['valorgolmeiofora_jogo'] = 0;
		$dados['valorambosmarcam_jogo'] = 0;
		$dados['valornaoambos_jogo'] = 0;																				
		$dados['valormaisdoisgolsemeio_jogo'] = 0;																				
		$dados['valormenosdoisgolsemeio_jogo'] = 0;																						
		
		$dados['ACAO'] = 'Novo';
		$this->setarURL($dados);
		
	//	$this->carregarDadosFlash($dados);

		$this->carregarEquipesFora($dados);
		$this->carregarEquipesCasa($dados);
		$this->carregarCampeonatos($dados);
		
		$this->parser->parse('jogo_cadastro', $dados);
	}
	
	public function editar($id_jogo) {
		$id_jogo = base64_decode($id_jogo);
		$dados = array();
		
		$this->carregarJogo($id_jogo, $dados);
		
		$dados['ACAO'] = 'Editar';
		$this->setarURL($dados);
		
		$this->carregarDadosFlash($dados);

		$this->carregarEquipesFora($dados);
		$this->carregarEquipesCasa($dados);
		$this->carregarCampeonatos($dados);
		
		$this->parser->parse('jogo_cadastro', $dados);
	}
	
	public function pesquisar() {						
		$idcampeonato_jogo = $this->input->post('idcampeonato_jogo');
		$opcao_status  =  $this->input->post('opcao_status');
		
	
		redirect('jogo/index/'.$idcampeonato_jogo.'/'.$opcao_status);
	}
	public function salvar() {
		global $id_jogo;
		global $data_jogo;
		global $idequipefora_jogo;
		global $idequipecasa_jogo;
		global $idcampeonato_jogo;
		global $ativo_jogo;
		global $golsequipe1_jogo;
		global $golsequipe2_jogo;
		global $valorcasa_jogo;
		global $valorfora_jogo;
		global $valorempate_jogo;
		global $valorduplacasa_jogo;
		global $valorduplafora_jogo;
		global $valorgolmeiocasa_jogo;
		global $valorgolmeiofora_jogo;
		global $valorambosmarcam_jogo;
		global $valornaoambos_jogo;
		global $valormaisdoisgolsemeio_jogo;
		global $valormenosdoisgolsemeio_jogo;
		
		$id_jogo             		 = $this->input->post('id_jogo');
		$data_jogo            		 = $this->input->post('data_jogo');
		$idequipefora_jogo    		 = $this->input->post('idequipefora_jogo');
		$idequipecasa_jogo    		 = $this->input->post('idequipecasa_jogo');
		$idcampeonato_jogo    		 = $this->input->post('idcampeonato_jogo');
		$ativo_jogo		 	 = $this->input->post('ativo_jogo');
		$golsequipe1_jogo		 = $this->input->post('golsequipe1_jogo');
		$golsequipe2_jogo		 = $this->input->post('golsequipe2_jogo');
		$valorcasa_jogo		 	 = $this->input->post('valorcasa_jogo');
		$valorfora_jogo		   	 = $this->input->post('valorfora_jogo');
		$valorempate_jogo		 = $this->input->post('valorempate_jogo');
		$valorduplacasa_jogo		 = $this->input->post('valorduplacasa_jogo');
		$valorduplafora_jogo		 = $this->input->post('valorduplafora_jogo');
		$valorgolmeiocasa_jogo		 = $this->input->post('valorgolmeiocasa_jogo');
		$valorgolmeiofora_jogo		 = $this->input->post('valorgolmeiofora_jogo');
		$valorambosmarcam_jogo		 = $this->input->post('valorambosmarcam_jogo');
		$valornaoambos_jogo		 = $this->input->post('valornaoambos_jogo');
		$valormaisdoisgolsemeio_jogo	 = $this->input->post('valormaisdoisgolsemeio_jogo');
		$valormenosdoisgolsemeio_jogo	 = $this->input->post('valormenosdoisgolsemeio_jogo');
		
		
		if ($this->testarDados()) {
			$jogo = array(
				"data_jogo" 			=> $data_jogo,
				"idequipefora_jogo"    		=> $idequipefora_jogo,
				"idequipecasa_jogo"   		=> $idequipecasa_jogo,
				"idcampeonato_jogo"   		=> $idcampeonato_jogo,
				"ativo_jogo"     		=> $ativo_jogo,
				"golsequipe1_jogo"              => $golsequipe1_jogo,
				"golsequipe2_jogo"              => $golsequipe2_jogo,
				"valorcasa_jogo"                => $valorcasa_jogo,
				"valorfora_jogo"                => $valorfora_jogo,
				"valorempate_jogo"              => $valorempate_jogo,
				"valorduplacasa_jogo"           => $valorduplacasa_jogo,
				"valorduplafora_jogo"           => $valorduplafora_jogo,
				"valorgolmeiocasa_jogo"         => $valorgolmeiocasa_jogo,
				"valorgolmeiofora_jogo"         => $valorgolmeiofora_jogo,
				"valorambosmarcam_jogo"         => $valorambosmarcam_jogo,
				"valornaoambos_jogo"            => $valornaoambos_jogo,
				"valormaisdoisgolsemeio_jogo"   => $valormaisdoisgolsemeio_jogo,
				"valormenosdoisgolsemeio_jogo"  => $valormenosdoisgolsemeio_jogo
				
			);
			
			if (!$id_jogo) {
				$id_jogo = $this->JogoModel->insert($jogo);
			} else {
				$id_jogo = $this->JogoModel->update($jogo, $id_jogo);
			}

			if (is_numeric($id_jogo)) {
				$this->session->set_flashdata('sucesso', 'jogo salvo com sucesso.');
				redirect('jogo');
			} else {
				$this->session->set_flashdata('erro', $id_jogo);
				redirect('jogo');
			}
		} else {
			if (!$id_jogo) {
				redirect('jogo/novo/');
			} else {
				redirect('jogo/editar/'.base64_encode($id_jogo));
			}			
		}
	}
	
	public function apagar($id_jogo) {
		if ($this->testarApagar(base64_decode($id_jogo))) {
			$res = $this->JogoModel->delete(base64_decode($id_jogo));
	
			if ($res) {
				$this->session->set_flashdata('sucesso', 'Jogo apagado com sucesso.');
			} else {
				$this->session->set_flashdata('erro', 'Não foi possível apagar o jogo.');
			}
		}
		
		redirect('jogo');
	}
	
	private function setarURL(&$dados) {
		$dados['CONSULTA_JOGO'] = site_url('jogo');
		$dados['ACAO_FORM']         = site_url('jogo/salvar');
	}
	
	private function carregarDados(&$dados) {
		$resultado = $this->JogoModel->getJogoCategoria($dados['idcampeonato_jogo'], $dados['opcao_status']);
		
		foreach ($resultado as $registro) {
			$dados['BLC_DADOS'][] = array(
				"ID_JOGO"        => $registro->id_jogo,
				"DATA_JOGO" => $registro->data_jogo,
				"NOME_EQUIPECASA" => $this->JogoModel->getNomeEquipeJogo($registro->idequipecasa_jogo),
				"NOME_EQUIPEFORA" => $this->JogoModel->getNomeEquipeJogo($registro->idequipefora_jogo),
				"DISPLAY_ATIVAR"      => ($registro->ativo_jogo == 1)?'none':'',
				"DISPLAY_DESATIVAR"   => ($registro->ativo_jogo == 1)?'':'none',
				"ATIVAR_JOGO"    => "ativarJogo('".base64_encode($registro->id_jogo)."')",
				"DESATIVAR_JOGO" => "desativarJogo('".base64_encode($registro->id_jogo)."')",
				"HORA_JOGO" => $registro->hora_jogo,
				"GOLSEQUIPE1_JOGO" => $registro->golsequipe1_jogo,
				"GOLSEQUIPE2_JOGO" => $registro->golsequipe2_jogo,
				"VALORCASA_JOGO" => number_format($registro->valorcasa_jogo,  2, ',', '.'),
				"VALORFORA_JOGO" => number_format($registro->valorfora_jogo,  2, ',', '.'),
				"VALOREMPATE_JOGO" => number_format($registro->valorempate_jogo,  2, ',', '.'),
				"VALORDUPLACASA_JOGO" => number_format($registro->valorduplacasa_jogo,  2, ',', '.'),
				"VALORDUPLAFORA_JOGO" => number_format($registro->valorduplafora_jogo,  2, ',', '.'),
				"VALORGOLMEIOCASA_JOGO" => number_format($registro->valorgolmeiocasa_jogo,  2, ',', '.'),
				"VALORGOLMEIOFORA_JOGO" => number_format($registro->valorgolmeiofora_jogo,  2, ',', '.'),
				"VALORAMBOSMARCAM_JOGO" => number_format($registro->valorambosmarcam_jogo,  2, ',', '.'),
				"VALORNAOAMBOS_JOGO" => number_format($registro->valornaoambos_jogo,  2, ',', '.'),
				"VALORMAISDOISGOLSEMEIO_JOGO" => number_format($registro->valormaisdoisgolsemeio_jogo,  2, ',', '.'),
				"VALORMENOSDOISGOLSEMEIO_JOGO" => number_format($registro->valormenosdoisgolsemeio_jogo,  2, ',', '.'),
				"EDITAR_JOGO"   => site_url('jogo/editar/'.base64_encode($registro->id_jogo)),
				"APAGAR_JOGO"   => "abrirConfirmacao('".base64_encode($registro->id_jogo)."')"
			);
		}
	}
	
	private function carregarJogo($id_jogo, &$dados) {
		$resultado = $this->JogoModel->getJogo($id_jogo);
		
		if ($resultado) {
			foreach ($resultado as $chave => $valor) {
				$dados[$chave] = $valor;
			}
			$dados['ativo_jogo'] = ($resultado->ativo_jogo == 1)?'checked':'';
					
		} else {
			show_error('Não foram encontrados dados.', 500, 'Ops, erro encontrado');			
		}
	}
	

	private function carregarEquipesCasa(&$dados) {
		$resultado = $this->EquipeModel->get();

		$dados['BLC_EQUIPECASA'] = array();

		foreach ($resultado as $registro) {
			$dados['BLC_EQUIPECASA'][] = array(
				"ID_EQUIPE"          => $registro->id_equipe,
				"NOME_EQUIPE"   => $registro->nome_equipe,
				"SEL_ID_EQUIPECASA"      => ($dados['idequipecasa_jogo'] == $registro->id_equipe)?'selected':''
			);
		}
	}
	
	private function carregarEquipesFora(&$dados) {
		$resultado = $this->EquipeModel->get();

		$dados['BLC_EQUIPEFORA'] = array();

		foreach ($resultado as $registro) {
			$dados['BLC_EQUIPEFORA'][] = array(
				"ID_EQUIPE"          => $registro->id_equipe,
				"NOME_EQUIPE"   => $registro->nome_equipe,
				"SEL_ID_EQUIPEFORA"      => ($dados['idequipefora_jogo'] == $registro->id_equipe)?'selected':''
			);
		}
	}
	
	private function carregarCampeonatos(&$dados) {
		$resultado = $this->CampeonatoModel->get();

		$dados['BLC_CAMPEONATO'] = array();

		foreach ($resultado as $registro) {
			$dados['BLC_CAMPEONATO'][] = array(
				"ID_CAMPEONATO"          => $registro->id_campeonato,
				"NOME_CAMPEONATO"   => $registro->nome_campeonato,
				"SEL_ID_CAMPEONATO"      => ($dados['idcampeonato_jogo'] == $registro->id_campeonato)?'selected':''
			);
		}
	}

	private function testarDados() {
		global $data_jogo;
		global $idequipefora_jogo;
		global $idequipecasa_jogo;
		global $idcampeonato_jogo;
		global $ativo_jogo;
		
		$erros    = FALSE;
		$mensagem = null;
		
		
		if (empty($data_jogo)) {
			$erros    = TRUE;
			$mensagem .= "- Data não preenchida.\n";
			$this->session->set_flashdata('ERRO_DATA_JOGO', 'has-error');
		}

		if (empty($idcampeonato_jogo)) {
			$erros    = TRUE;
			$mensagem .= "- Selecione um  campeonato.\n";
			$this->session->set_flashdata('ERRO_IDCAMPEONATO_JOGO', 'has-error');
		} else {
			$resultado = $this->CampeonatoModel->getCampeonato($idcampeonato_jogo);
			if (!$resultado) {
				$erros = TRUE;
				$mensagem .= "- Campeonato não cadastrado.\n";
				$this->session->set_flashdata('ERRO_IDCAMPEONATO_JOGO', 'has-error');
			}
		}
		
		if (empty($idequipefora_jogo)) {
			$erros    = TRUE;
			$mensagem .= "- Selecione a equipe de fora.\n";
			$this->session->set_flashdata('ERRO_IDEQUIPEFORA_JOGO', 'has-error');
		} else {
			$resultado = $this->EquipeModel->getEquipe($idequipefora_jogo);
			if (!$resultado) {
				$erros = TRUE;
				$mensagem .= "- Equipe de fora não cadastrado.\n";
				$this->session->set_flashdata('ERRO_IDEQUIPEFORA_JOGO', 'has-error');
			}
		}

		if (empty($idequipecasa_jogo)) {
			$erros    = TRUE;
			$mensagem .= "- Selecione a equipe da casa.\n";
			$this->session->set_flashdata('ERRO_IDEQUIPECASA_JOGO', 'has-error');
		} else {
			$resultado = $this->EquipeModel->getEquipe($idequipecasa_jogo);
			if (!$resultado) {
				$erros = TRUE;
				$mensagem .= "- Equipe da casa não cadastrado.\n";
				$this->session->set_flashdata('ERRO_IDEQUIPECASA_JOGO', 'has-error');
			}
		}
		
		if($idequipecasa_jogo == $idequipefora_jogo)
		{
		       $erros = TRUE;
		       $mensagem.= "- Equipe da casa não pode ser igual a equipe de fora. \n";
		       $this->session->set_flashdata('ERRO_EQUIPESIGUAIS_JOGO','has-error');
		}
		
		if ($erros) {
			$this->session->set_flashdata('titulo_erro', 'Para continuar corrija os seguintes erros:');
			$this->session->set_flashdata('erro', nl2br($mensagem));
			
			$this->session->set_flashdata('ERRO_JOGO', TRUE);
			$this->session->set_flashdata('data_jogo', $data_jogo);
			$this->session->set_flashdata('idcampeonato_jogo', $idcampeonato_jogo);
			$this->session->set_flashdata('idequipecasa_jogo', $idequipecasa_jogo);
			$this->session->set_flashdata('idequipefora_jogo', $idequipefora_jogo);
			$this->session->set_flashdata('data_jogo',$data_jogo);
			$this->session->set_flashdata('ativo_jogo', $ativo_jogo);
		}
		
		return !$erros;
	}
	
	private function testarApagar($id_jogo) {
		$erros    = FALSE;
		$mensagem = null;
	
//		$resultado = $this->EmpresaTipoModel->getEmpresas($dlv_id_tip);
//
//		if ($resultado) {
//			$erros    = TRUE;
//			$mensagem .= "- Um ou mais empresas tip este tipo.\n";
//		}
	
		if ($erros) {
			$this->session->set_flashdata('titulo_erro', 'Não foi possível apagar o jogo:');
			$this->session->set_flashdata('erro', nl2br($mensagem));
		}
	
		return !$erros;
	}
	
	
	private function carregarDadosFlash(&$dados) {
		$ERRO_JOGO           = $this->session->flashdata('ERRO_JOGO');
		$ERRO_DATA_JOGO = $this->session->flashdata('ERRO_DATA_JOGO');
		$ERRO_IDEQUIPEFORA_JOGO = $this->session->flashdata('ERRO_IDEQUIPEFORA_JOGO');
		$ERRO_IDEQUIPECASA_JOGO = $this->session->flashdata('ERRO_IDEQUIPECASA_JOGO');
		$ERRO_IDCAMPEONATO_JOGO = $this->session->flashdata('ERRO_IDCAMPEONATO_JOGO');	
		$ERRO_EQUIPESIGUAIS_JOGO = $this->session->flashdata('ERRO_EQUIPESIGUAIS_JOGO');	
		$data_jogo      = $this->session->flashdata('data_jogo');
		$idequipefora_jogo         = $this->session->flashdata('idequipefora_jogo');
		$idequipecasa_jogo         = $this->session->flashdata('idequipecasa_jogo');
		$idcampeonato_jogo         = $this->session->flashdata('idcampeonato_jogo');
		$ativo_jogo       = $this->session->flashdata('ativo_jogo');				
		
		if ($ERRO_JOGO) {
			$dados['data_jogo']      = $data_jogo;
			$dados['idcampeonato_jogo']      = $idcampeonato_jogo;
			$dados['idequipefora_jogo']      = $idequipefora_jogo;
			$dados['idequipecasa_jogo']      = $idequipecasa_jogo;	
			$dados['ativo_jogo']     = ($ativo_jogo == 1)?'checked':'';					
			
			$dados['ERRO_DATA_JOGO'] = $ERRO_DATA_JOGO;
			$dados['ERRO_IDCAMPEONATO_JOGO'] = $ERRO_IDCAMPEONATO_JOGO;
			$dados['ERRO_IDEQUIPECASA_JOGO'] = $ERRO_IDEQUIPECASA_JOGO;
			$dados['ERRO_IDEQUIPEFORA_JOGO'] = $ERRO_IDEQUIPEFORA_JOGO;
			$dados['ERRO_EQUIPESIGUAIS_JOGO'] = $ERRO_EQUIPESIGUAIS_JOGO;			
		}
	}
}