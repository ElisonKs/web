<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa_Model extends CI_Model {
	
	public function get() {
		$this->db->from('empresa');
		return $this->db->get()->result();
	}
	
	public function getEmpresa($mailcemp,$chavcemp) {
		
	

	
		$this->db->where('mailcemp',$mailcemp);
		$this->db->where('chavcemp',$chavcemp);
		$this->db->from('empresa');
		return $this->db->get()->first_row();
	}
	
	public function getEmpresaAtiva($mailcemp,$chavcemp) {
		
	

		$this->db->where('ativiemp',1);
		$this->db->where('mailcemp',$mailcemp);
		$this->db->where('chavcemp',$chavcemp);
		$this->db->from('empresa');
		return $this->db->get()->first_row();
	}
	
	public function getEmpresaCpfCnpj($bus_id_emp, $bus_cpfcnpj_emp) {
		$this->db->from('bus_emp');
		$this->db->where('bus_id_emp !=', $bus_id_emp, FALSE);
		$this->db->where('bus_cpfcnpj_emp', $bus_cpfcnpj_emp);
		return $this->db->get()->first_row();
	}
	
	public function getCpfCnpj($bus_tipopessoa_emp, $bus_cpfcnpj_emp) {
		$this->db->from('bus_emp');
		$this->db->where('bus_tipopessoa_emp', $bus_tipopessoa_emp);
		$this->db->where('bus_cpfcnpj_emp', $bus_cpfcnpj_emp);
		return $this->db->get()->first_row();
	}
	
	public function getEmpresasResponsabuss($bus_busres_emp) {
		$this->db->where('bus_busres_emp', $bus_busres_emp, FALSE);
		$this->db->from('bus_emp');
		return $this->db->get()->result();
	}
	
	
	
	
	
	
	public function insert($empresa) {
		$res = $this->db->insert('empresa', $empresa);
	
		if ($res) {
			return $this->db->insert_id();
		} else {
			return FALSE;
		}
	}
	
	public function update($empresa, $cnpj) {
		$this->db->where('cnpjcemp', $cnpj, FALSE);
		$res = $this->db->update('empresa', $empresa);
	
		if ($res) {
			return $cnpj;
		} else {
			return FALSE;
		}
	}
	
	public function delete($bus_id_emp) {
		$this->db->where('bus_id_emp', $bus_id_emp, FALSE);
		return $this->db->delete('bus_emp');
	}	
	
}