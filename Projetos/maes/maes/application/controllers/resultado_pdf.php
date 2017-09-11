<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resultado_PDF extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		
		
		$this->layout = LAYOUT_DASHBOARD_ADMINISTRATIVO;
		
		$this->load->model('Area_Model', 'AreaModel');
		$this->load->model('Meta_Model', 'MetaModel');
	}
	
	public function index($cod_aplicacao) {
//		date_default_timezone_set("Brazil/East");
		date_default_timezone_set("America/Araguaina");

		$dados               = array();
		$dados['ACAO_FORM']  = site_url('imprimir_aposta/imprimir');		
		
			$this->imprimir($cod_aplicacao);	
		
	
		
		//$this->parser->parse('imprimir_aposta_view', $dados);
	}
	
	
	
	
	
	public function imprimir($cod_aplicacao) {
		$resultado = $this->db->query("select distinct(codgimet) from questao_aplicacao".
		" left outer join questao on questao.codgiqes = questao_aplicacao.cqesiqap ".
		"left outer join meta on meta.codgimet = questao.cmetiqes where questao_aplicacao.capliqap =".$cod_aplicacao.
		" and questao_aplicacao.respiqap in (1,2) ")->result();
		
		
		$altura = 85;		
		$params = array('orientation' => 'P', 'unit' => 'mm', 'size' => array(200, 200));
		$this->load->library('pdf', $params);
		$this->pdf->fontpath = 'font/';
		$this->pdf->AddPage();
		$this->pdf->SetFont('courier','BU',10);
		
		$this->pdf->Text(0, 3, $this->gerarCaracteresDireita(200, 'Nível da Organização 03 na Estratégia Incremental: Nível 1', ''));
		$posicaoY           = 0;
		$posicaoY           += 9;

		
		if (!empty($resultado)) {
			foreach ($resultado as $registro) 
			{
				$posicaoY           += 3;
								
				$dados_area_meta = $this->AreaModel->getDadosAreaMeta($registro->codgimet);
				$this->pdf->SetFont('courier','B',9);	
				$this->pdf->Text(0,$posicaoY, $this->gerarCaracteresEsquerda(80,$dados_area_meta->desccare.'('.$dados_area_meta->siglcare.')' , ''));
				$posicaoY           += 3;				
				$this->pdf->Text(0,$posicaoY, $this->gerarCaracteresDireita(40,'Meta: '.$dados_area_meta->siglcare.'.'.$dados_area_meta->desccmet , ''));
				$posicaoY           += 6;				
				
				$resultados_meta = $this->MetaModel->getResultadosMeta($registro->codgimet);
				if (!empty($resultados_meta)) {
					$this->pdf->Write(3,"\n");
					foreach ($resultados_meta as $registro_resultados) 
				         {	

				         	$this->pdf->SetFont('courier','B',9);	
						$posicaoY           += 3;
						$texto = 'Resultado Esperado: '.$registro_resultados->desccres;
						$texto = $this->substituirCaracteres($texto);
						$this->pdf->WordWrap($texto,150);
					
						$this->pdf->Write(3,"\n");				
						
						$this->pdf->Write(3,$texto);						         	
						
						
     					        $melhores_praticas = $this->MetaModel->getMelhoresPraticasResultado($registro_resultados->codgires);
						if (!empty($melhores_praticas)) {
          						 $this->pdf->Write(3,"\n\n\n");
						         $posicaoY += 6;
                			         	 $this->pdf->SetFont('courier','B',8);							         
	   						 $this->pdf->Text(0,$posicaoY, $this->gerarCaracteresDireita(40,'Melhores Praticas(M.P)' , ''));                			         	 
						 	 $this->pdf->SetFont('courier','',8);							                  
							foreach ($melhores_praticas as $registro_praticas) 						
				         		{
								$posicaoY           += 3;
								$texto = $registro_praticas->desccmpa;
								$texto = $this->substituirCaracteres($texto);
								$this->pdf->WordWrap($texto,150);
					
								$this->pdf->Write(3,"\n");				
						
								$this->pdf->Write(3,$texto);						         						         		      
				         		      
				         		      
				         		      
				         		      
				         		}
				         					}
				         
				         
				              
     					        $exemplos_produtos = $this->MetaModel->getExemploProdutoResultado($registro_resultados->codgires);
						if (!empty($exemplos_produtos)) {
          						 $this->pdf->Write(3,"\n\n");
						         $posicaoY += 9;
                			         	 $this->pdf->SetFont('courier','B',8);							         
	   						 $this->pdf->Text(0,$posicaoY, $this->gerarCaracteresDireita(40,'Exemplos de Produtos de Trabalho(P.T)' , ''));                			         	 
						 	 $this->pdf->SetFont('courier','',8);							                  
							foreach ($exemplos_produtos as $registro_produtos) 						
				         		{
								$posicaoY           += 3;
								$texto = $registro_produtos->desccexp;
								$texto = $this->substituirCaracteres($texto);
								$this->pdf->WordWrap($texto,150);
					
								$this->pdf->Write(3,"\n");				
						
								$this->pdf->Write(3,$texto);						         						         		      
				         		      
				         		      
				         		      
				         		      
				         		}
				         					}
				         
				         
				         
				         
				         
				         } 
				         
				         

				         
				         
				         
								}
								
				
  						$posicaoY           += 18;
			

			}
					}
		
		
		
			
		
		
	
	
		
		
		
		
		
		
		
		$this->pdf->Output();
		
	}
	
	
	public function retornarOpcao($codigo)
	{
		$opcao = 'Erro';
	
		switch ($codigo) 
		{
 		   case 1:
		        $opcao = 'Vitória da Casa';
        		break;
    		   case 2:
		       $opcao = 'Vitória do Visitante';
		        break;
		   case 3:
		        $opcao = 'Empate';
		        break;
		   case 4:
		        $opcao = 'Dupla Casa';
        		break;
    		   case 5:
		       $opcao = 'Dupla Fora';
		        break;
		   case 6:
		        $opcao = 'Gol e Meio Casa';
		        break;
       		   case 7:
		        $opcao = 'Gol e Meio Visitante';
        		break;
    		   case 8:
		       $opcao = 'Ambos Marcam';
		        break;
		   case 9:
		        $opcao = 'Ninguém Marca';
		        break;
       		   case 10:
		        $opcao = 'Mais Dois Gols e Meio';
        		break;
    		   case 11:
		       $opcao = 'Menos Dois Gols e Meio';
		        break;

	       }
	       
	       return $opcao;
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
	

	private function gerarCaracteresDireita($quantidade, $texto, $char) {
		$characteres = array(
				'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
				'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
				'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
				'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
				'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
				'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
				'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f'
		);
		
		$texto   = strtr($texto, $characteres);
		$texto   = substr($texto, 0, $quantidade - 1);
		$texto   = strtoupper($texto);
		$retorno = $texto;
		for ($i = 1; $i <= ($quantidade - strlen($texto)); $i++) {
			$retorno .= $char;
		}
		
		return $retorno;
	}
	
	private function gerarCaracteresEsquerda($quantidade, $texto, $char) {
		$characteres = array(
				'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
				'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
				'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
				'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
				'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
				'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
				'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f'
		);
		
		$texto   = strtr($texto, $characteres);
		$texto   = substr($texto, 0, $quantidade - 1);
		$texto   = strtoupper($texto);
		$retorno = '';
		for ($i = 1; $i <= ($quantidade - strlen($texto)); $i++) {
			$retorno .= $char;
		}
	
		return $retorno .= $texto;
	}
}