<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nova_Empresa extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
				
		//$this->layout = LAYOUT_DASHBOARD_ADMINISTRATIVO;
		
		$this->load->model('Questao_Model', 'QuestaoModel');
		$this->load->model('Meta_Model', 'MetaModel');
		$this->load->model('Area_Model', 'AreaModel');
		$this->load->model('Aplicacao_Model', 'AplicacaoModel');
		$this->load->model('Empresa_Model', 'EmpresaModel');

	}
	
	public function debug_to_console( $data ) {
 	   $output = $data;
    		if ( is_array( $output ) )
        	$output = implode( ',', $output);

	    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
			}
	
	public function index($meta = NULL) {
		$dados = array();
		$dados['ACAO_FORM'] = 'nova_empresa/salvar';
		
		
	
		
		$this->parser->parse('nova_empresa_view', $dados);
	}
	
	
	
	
	
	
	
	public function salvar() {
		global $cnpjcemp;
		global $razscemp;
		global $mailcemp;
		global $chavcemp;		
		
		$cnpjcemp     =      $this->input->post('cnpjcemp');
		$razscemp     =      $this->input->post('razscemp');
		$mailcemp     =      $this->input->post('mailcemp');
		$chavcemp     =      $this->input->post('chavcemp');
		$ativiemp     =      0;
		
		
		if ($this->testarDados()) {
			$empresa = array(
				"cnpjcemp" => $cnpjcemp,
				"razscemp" => $razscemp,
				"mailcemp" => $mailcemp,
				"chavcemp" => $chavcemp,
				"ativiemp" => $ativiemp
			);
			
			
				$codigo =  $this->EmpresaModel->insert($empresa);
			
			
				$this->session->set_flashdata('sucesso', 'Empresa salvo com sucesso.');
				$this->enviarEmail($mailcemp,$cnpjcemp,$razscemp); 
				
				$this->parser->parse('empresa_cadastrada', $empresa);    
				

						
		}
	}
	
	public function ativar($cnpj)
	{
	
		$cnpj = base64_decode($cnpj);
		$dados = array();
		$dados['ativiemp'] = 1;
		
		
		$this->EmpresaModel->update($dados,$cnpj);
		
		$this->parser->parse('email_valido', $dados);
		
	}
	
	private function enviarEmail($destinatario,$cnpj,$empresa)
	{
	
		$to      =  $destinatario;
		$subject = "Cadastro Maes";

		$message = "
			<html>
			<head>
			<title>Valide seu cadastro</title>
			</head>
			<body>
			<p>Clique no link abaixo para validar o seu cadastro!</p>
			<table>
			<tr>
			<th></th>
			</tr>
			<tr>
			
			<td><a href ='www.softagil.com.br/maes/index.php/nova_empresa/ativar/".base64_encode($cnpj)."'>Validar Email</a></td>
			</tr>
			</table>
			</body>
			</html>
			";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <cadastro@maes.com.br>' . "\r\n";


mail($to,$subject,$message,$headers);

	
	}
	
	
	
	
	
	
	
	
	
	
	
	private function testarDados() {
		global $razscemp;
		global $mailcemp;
		global $chavcemp;
		global $cnpjcemp;				
		
		$erros    = FALSE;
		$mensagem = null;
		
		
		if (empty($razscemp)) {
			$erros    = TRUE;
			$mensagem .= "- Razão Social não preenchida.\n";
			$this->session->set_flashdata('ERRO_RAZSCEMP', 'has-error');
		
		}
		
		if (empty($mailcemp)) {
			$erros    = TRUE;
			$mensagem .= "- Email não preenchido.\n";
			$this->session->set_flashdata('ERRO_MAILCEMP', 'has-error');
		
		}

		if (empty($cnpjcemp)) {
			$erros    = TRUE;
			$mensagem .= "- CNPJ não preenchido.\n";
			$this->session->set_flashdata('ERRO_CNPJCEMP', 'has-error');
		
		}

		if (empty($chavcemp)) {
			$erros    = TRUE;
			$mensagem .= "- Senha não preenchida.\n";
			$this->session->set_flashdata('ERRO_CHAVCEMP', 'has-error');
		
		}

		if ($erros) {
				
			$this->session->set_flashdata('titulo_erro', 'Para continuar corrija os seguintes erros:');
			$this->session->set_flashdata('erro', nl2br($mensagem));
			
			$this->session->set_flashdata('ERRO_EMPRESA', TRUE);
			$this->session->set_flashdata('razscemp', $razscemp);
			$this->session->set_flashdata('mailcemp', $mailcemp);
			$this->session->set_flashdata('cnpjcemp', $cnpjcemp);
			
			redirect('nova_empresa');
		}
		
		return !$erros;
	}
	
	
	
	
	private function carregarDadosFlash(&$dados) {
		$ERRO_EMPRESA             = $this->session->flashdata('ERRO_EMPRESA');
		$ERRO_RAZSCEMP           = $this->session->flashdata('ERRO_RAZSCEMP');
		$ERRO_MAILCEMP           = $this->session->flashdata('ERRO_MAILCEMP');
		$ERRO_CNPJCEMP           = $this->session->flashdata('ERRO_CNPJCEMP');
		
		$razscemp                = $this->session->flashdata('RAZSCEMP');
		$mailcemp                = $this->session->flashdata('MAILCEMP');
		$cpnjcemp                = $this->session->flashdata('CNPJCEMP');
		
		if ($ERRO_EMPRESA) {
			$dados['razscemp']      = $razscemp;
			$dados['cnpjcemp']      = $cnpjcemp;
			$dados['mailcemp']      = $mailcemp;
			
			$dados['ERRO_MAILCEMP'] = $ERRO_MAILCEMP;
		}
	}
}