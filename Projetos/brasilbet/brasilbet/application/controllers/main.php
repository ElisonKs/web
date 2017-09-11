<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends CI_Controller {
 
function __construct()
{
        parent::__construct();
 
/* Standard Libraries of codeigniter are required */
$this->load->database();
$this->load->helper('url');
/* ------------------ */ 
 
$this->load->library('grocery_CRUD');
 
}
 
public function index()
{
echo "<h1>Welcome to the world of Codeigniter</h1>";//Just an example to ensure that we get into the function
die();
}
 
public function jogo()
{

$this->load->view('../templates/dashboard_gc.php');
//$this->load-> view('../views/jogo_consulta.php');
$crud = new grocery_CRUD();
$crud->set_table('Jogo');
$crud->fields('data_jogo','idequipefora_jogo','idequipecasa_jogo','idcampeonato_jogo');
$crud->set_relation('idequipefora_jogo','equipe','nome_equipe');
$crud->set_relation('idequipecasa_jogo','equipe','nome_equipe');
$crud->set_relation('idcampeonato_jogo','campeonato','nome_campeonato');
$crud->display_as('data_jogo','Data');
$crud->display_as('idcampeonato_jogo','Campeonato');
$crud->display_as('idequipecasa_jogo','Equipe da Casa');
$crud->display_as('idequipefora_jogo','Equipe de Fora');
$crud->columns('data_jogo','idequipefora_jogo','idequipecasa_jogo','idcampeonato_jogo');


 
$output = $crud->render();
 
$this->_example_output($output);        
}

public function secretaria()
{
$crud = new grocery_CRUD();
$crud->set_table('siqtbsec');
$crud->display_as('sig_nome_sec','Nome');
$crud->display_as('sig_pk_seq_sec','Sequencia');
$crud->fields('sig_nome_sec');

$output = $crud->render();
 
$this->_example_output($output);   

}

public function pessoa()
{
	$crud = new grocery_CRUD();
$crud->set_table('dd_goods');
$crud->set_relation('goods_country', 'dd_country', 'country_title');
$crud->set_relation('goods_state', 'dd_state', 'state_title');
$crud->set_relation('goods_city', 'dd_city', 'city_title');

$this->load->library('gc_dependent_select');
// settings

$fields = array(

// first field:
'goods_country' => array( // first dropdown name
'table_name' => 'dd_country', // table of country
'title' => 'country_title', // country title
'relate' => null // the first dropdown hasn't a relation
),
// second field
'goods_state' => array( // second dropdown name
'table_name' => 'dd_state', // table of state
'title' => 'state_title', // state title
'id_field' => 'state_id', // table of state: primary key
'relate' => 'country_ids', // table of state:
'data-placeholder' => 'select state' //dropdown's data-placeholder:

),
// third field. same settings
'goods_city' => array(
'table_name' => 'dd_city',
'order_by'=>"state_title DESC",  // string. It's an optional parameter.
'title' => 'id: {city_id} / city : {city_title}',  // now you can use this format )))
'id_field' => 'city_id',
'relate' => 'state_ids',
'data-placeholder' => 'select city'
)
);

$config = array(
'main_table' => 'dd_goods',
'main_table_primary' => 'goods_id',
"url" => base_url() . __CLASS__ . '/' . __FUNCTION__ . '/', 
'ajax_loader' => base_url() . 'ajax-loader.gif' // path to ajax-loader image. It's an optional parameter

);
$categories = new gc_dependent_select($crud, $fields, $config);

// first method:
//$output = $categories->render();

// the second method:
$js = $categories->get_js();
$output = $crud->render();
$output->output.= $js;
$this->_example_output($output);
}

public function login()
{
$this->load-> view('../views/login_view.php');
}

public function equipe()
{
$crud = new grocery_CRUD();
$crud->set_table('equipe');
$output = $crud->render();
 
$this->_example_output($output);        
}
 
function _example_output($output = null)
 
{
$this->load->view('our_template.php',$output);    
}
}
 
/* End of file Main.php */
/* Location: ./application/controllers/Main.php */
 