<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resultado extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		
		
		$this->layout = LAYOUT_DASHBOARD_ADMINISTRATIVO;
		
		$this->load->model('Aplicacao_Model', 'AplicacaoModel');
		$this->load->model('Area_Model', 'AreaModel');
		$this->load->model('Meta_Model', 'MetaModel');
		
	}
	
	public function index($cod_aplicacao) {
		$dados = array();
		


		$dados['BLC_DADOS']  = array();
		$dados['NIVEL'] = $this->AplicacaoModel->getAplicacao($cod_aplicacao)->niveiapl;
		$dados['DATA_APLICACAO'] = $this->AplicacaoModel->getAplicacao($cod_aplicacao)->datadapl;
		
		$this->carregarDados($dados,$cod_aplicacao);
		
		$this->parser->parse('resultado_detalhado_view', $dados);
	}
	
	
	
	
	
	
	
	
	private function carregarDados(&$dados,$cod_aplicacao) {
	$area ='';
	$meta = '';
	$area_aux = '';
	$meta_aux = '';	
	$texto_aux = '';
	$cabecalho_melhores_praticas= '';
	$cabecalho_exemplos_produtos='';
	$cabecalho_resultado_esperado='';
	$trinicio = '';
	$tr_fim = '';
	$h3_inicio ='';
	$h3_fim = '';
	$h4_inicio= '';
	$h4_fim='';
	$rowspan='';
	
         $resultado = $this->db->query("select distinct(codgimet) from questao_aplicacao".
		" left outer join questao on questao.codgiqes = questao_aplicacao.cqesiqap ".
		"left outer join meta on meta.codgimet = questao.cmetiqes where questao_aplicacao.capliqap =".$cod_aplicacao.
		" and questao_aplicacao.respiqap in (1,2) ")->result();
		
		
	
		
		if (!empty($resultado)) {
			foreach ($resultado as $registro) 
			{
				$dados_area_meta = $this->AreaModel->getDadosAreaMeta($registro->codgimet);	
				$resultados_meta = $this->MetaModel->getResultadosMeta($registro->codgimet);
				if (!empty($resultados_meta)) {
					
					foreach ($resultados_meta as $registro_resultados) 
				         {	

				                $cabecalho_melhores_praticas = '<th>Melhores Práticas</th>';
				                $cabecalho_exemplos_produtos = '<th> Exemplos de Produto de Trabalho</th>';
				                $cabecalho_resultado_esperado = '<th> Resultado Esperado </th>';
				                $trinicio = '<tr>';
				                $trfim = '</tr>';
				                $h3_inicio = '<h3>';
				                $h3_fim = '</h3>';
				                $h4_inicio = '<h4>';
				                $h4_fim = '</h4>';

						
          					$melhores_praticas = $this->carregarMelhoresPraticas($registro_resultados->codgires);
          					$qtdmelhores_praticas =$this->MetaModel->getQtdMelhoresPraticasResultado($registro_resultados->codgires);
    				                $rowspan = 'rowspan="".$qtd_melhores_praticas.""';
          					if(!empty($melhores_praticas )) {
          					foreach($melhores_praticas as $registro_melhores_praticas)
          					{
          					$texto = $registro_resultados->desccres;
						$texto = $this->substituirCaracteres($texto);
          					
				                $exemplos_produtos = $this->carregarExemplosProdutos($registro_melhores_praticas->codgimpa);
				                $melhor_pratica = $registro_melhores_praticas->desccmpa;
				                
				         	if($area_aux != $dados_area_meta->desccare.'('.$dados_area_meta->siglcare.')')
				         	{
				         	       	$area = $dados_area_meta->desccare.'('.$dados_area_meta->siglcare.')';
				         	       	$area_aux = $area;
				         	}
				         	else
				         	{
				         	        $area = null;
				         	}
				         	if($meta_aux != 'META: '.$dados_area_meta->siglcare.'.'.$dados_area_meta->desccmet)
				         	{			         
				                        $meta = 'META: '.$dados_area_meta->siglcare.'.'.$dados_area_meta->desccmet;
				                        $meta_aux = $meta;
				                }
				                else
				                {
				                         $meta = null;
				                }    
				                
				                if($texto_aux != $texto)
				         	{			         
				                       $texto = $registro_resultados->desccres;
							$texto = $this->substituirCaracteres($texto);
				                        $texto_aux = $texto;
				                }
				                else
				                {
				                         $texto = null;
				                }        
				         
				$dados['BLC_DADOS'][] = array(
								
				                                "AREA" =>  $area,
					                        "META" =>  $meta,
				                                "RESULTADO_ESPERADO" => $texto,
				                                "MELHORES_PRATICAS" => $melhor_pratica,
                                				"EXEMPLOS_PRODUTO" => $exemplos_produtos,
                                				"CABECALHO_MELHORES_PRATICAS" => $cabecalho_melhores_praticas,
                                				"CABECALHO_EXEMPLOS_PRODUTO" => $cabecalho_exemplos_produtos,
                                				"CABECALHO_RESULTADO_ESPERADO" => $cabecalho_resultado_esperado,
                                				"TRINICIO" => $trinicio,
                                				"TRFIM" => $trfim,
                                				"H3_INICIO" => $h3_inicio,
                                				"H3_FIM" => $h3_fim,
                                				"H4_INICIO" => $h4_inicio,
                                				"H4_FIM" => $h4_fim,
                                				"QTD_MELHORES_PRATICAS" => $qtdmelhores_praticas

	
				
							      );
				         
				         
				         $cabecalho_melhores_praticas ='';
				         $cabecalho_exemplos_produtos = '';
				         $cabecalho_resultado_esperado = '';
				         $trinicio = '';
				         $trfim = '';
				         $h3_inicio='';
				         $h3_fim='';
				         $h4_inicio='';
				         $h4_fim='';
				         $qtdmelhores_praticas=0;
				         } 
				           
 
				         
				         
								}
								}
								}
								
			 
				         
				         
								}
					
		
	}
	}
	
	
	
	private function carregarMelhoresPraticas($codgires)
	{
                  $texto = '';
	          $melhores_praticas = $this->MetaModel->getMelhoresPraticasResultado($codgires);
		 
		  return $melhores_praticas;
        }
        
        private function carregarExemplosProdutos($codgimpa)
        {
               $texto = '';              
               $exemplos_produtos = $this->MetaModel->getExemploProdutoResultado($codgimpa);
		if (!empty($exemplos_produtos)) {
          					
						
						
							foreach ($exemplos_produtos as $registro_produtos) 						
				         		{
								
								$texto = $texto.$registro_produtos->desccexp;
								$texto = $this->substituirCaracteres($texto);
				         		        $texto = $texto."<br>";
				         		      
				         		}
				         					}
              return $texto;	

        
        }
        
        function substituirCaracteres($texto)
	{
		$characteres = array(
				'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
				'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
				'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
				'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
				'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
				'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
				'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f'
		);
		
		$retorno   = strtr($texto, $characteres);
		return $retorno;
	
	}
	
	
	
	
	
	
}