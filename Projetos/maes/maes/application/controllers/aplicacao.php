<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aplicacao extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
				
		$this->layout = LAYOUT_DASHBOARD_ADMINISTRATIVO;
		
		$this->load->model('Questao_Model', 'QuestaoModel');
		$this->load->model('Meta_Model', 'MetaModel');
		$this->load->model('Area_Model', 'AreaModel');
		$this->load->model('Aplicacao_Model', 'AplicacaoModel');

	}
	
	public function index($cod_aplicacao = NULL,$meta = NULL) {
		$dados = array();
		
		if(!$cod_aplicacao)
		   {
		   	$this->novo();
		    }
		$dados['BLC_DADOS']     = array();
		$dados['URL_RESULTADO'] = site_url('resultado/index/');
		$dados['COD_APLICACAO'] = $cod_aplicacao;
		
		if(!$meta)
		{
			$meta = 1;
		}
		
		if (($meta == 8) && ($this->AplicacaoModel->getResultadosNegativos($cod_aplicacao)))
		       {	
		       			//aqui vai travar  e informar que atingiu nivel 2 e a opção de ver os resultados
					$dados['NIVEL'] = '1';
					$this->gravarNivel($cod_aplicacao,1);
		       			$this->parser->parse('nivel_atingido', $dados);
		       } 
		       else if (($meta == 14) && ($this->AplicacaoModel->getResultadosNegativos($cod_aplicacao)))
		             {
		       			//aqui vai travar  e informar que atingiu nivel 3 e a opção de ver os resultados
		       			$dados['NIVEL'] = '2';
					$this->gravarNivel($cod_aplicacao,2);
		       			$this->parser->parse('nivel_atingido', $dados);
		              }
		       else if  (($meta == 15) && ($this->AplicacaoModel->getResultadosNegativos($cod_aplicacao)))
		             {
		       			//aqui vai travar  e informar que atingiu nivel 4 e a opção de ver os resultados
		       			$dados['NIVEL'] = '3';
					$this->gravarNivel($cod_aplicacao,3);
		       			$this->parser->parse('nivel_atingido', $dados);
		              }
		              else if  ($meta == 15) 
		             		{
		       				//aqui vai travar  e informar que atingiu nivel 4 e a opção de ver os resultados
		       				$dados['NIVEL'] = '4';
						$this->gravarNivel($cod_aplicacao,4);
		       				$this->parser->parse('nivel_atingido', $dados);
		              		}
		              		else 
		              		{
		       
					$resultado_meta = $this->MetaModel->getMeta($meta);
					$dados['META'] = $resultado_meta->desccmet;
					$dados['AREA'] = $this->AreaModel->getAreaMeta($resultado_meta->careimet)->siglcare;
					$dados['AREA_DESC'] = $this->AreaModel->getAreaMeta($resultado_meta->careimet)->desccare;
					$proxima_meta = $meta + 1;
					$dados['PROXIMO'] = site_url('aplicacao/carregarMeta/'.$cod_aplicacao.'/'.$proxima_meta);
					$dados['COD_APLICACAO'] = $cod_aplicacao;
					$dados['URL_GRAVAR_QUESTAO'] = site_url('aplicacao/gravarQuestaoAplicacao');
				
			
					$this->carregarDados($dados,$meta);
		
					$this->parser->parse('nova_aplicacao', $dados);
				}
	}
	
	public function carregarMeta($cod,$meta) {						
		
	
		redirect('aplicacao/index/'.$cod.'/'.$meta);
	}
	
	public function gravarQuestaoAplicacao($cod_aplicacao,$questao,$resposta) {
		  $questao_aplicacao = array(
        				'capliqap'            => $cod_aplicacao,
    					'cqesiqap'            => $questao,
        				'respiqap'            =>  $resposta
        				
    				  );
    		
    		 $this->AplicacaoModel->gravarQuestao($questao_aplicacao);
	}
	
	
	public function novo() {
		$dados = array();
		
		$dados['cempcapl']        =  $this->session->userdata('cnpjcemp');

		$cod = $this->AplicacaoModel->insert($dados);
		redirect('aplicacao/index/'.$cod.'/');
	}
	
	public function gravarNivel($codigo,$nivel) {
		$dados = array();
		
		$dados['niveiapl']        =  $nivel;

		$cod = $this->AplicacaoModel->update($dados,$codigo);

	}
	
	
	
	
	
	
	
	private function carregarDados(&$dados,$meta) {
		$resultado = $this->QuestaoModel->getQuestoesMeta($meta);
		
		foreach ($resultado as $registro) {
			$dados['BLC_DADOS'][] = array(
				"CODGIQES"        => $registro->codgiqes,
				"QUESCQES" => $registro->quescqes
//				"EDITAR_CAMBIO"    => site_url('cambio/editar/'.base64_encode($registro->vei_id_cam)),
//				"APAGAR_CAMBIO"    => "abrirConfirmacao('".base64_encode($registro->vei_id_cam)."')"
			);
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}