<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends CI_Controller {

	public function __construct() {
		parent::__construct();        
		$this->load->model("turma_model", "turma"); 
	}
	
	public function index()
	{
		$this->load->model("aluno_model", "aluno");
		$this->load->model("turma_model", "turma");
		$turno= array();
		$data = array();
		$data["listagem"] = $this->turma->load_turmas();		
		$this->load->view("menuNew");		
		$this->load->view('aluno/lista', array("data"=>$data));
		$this->load->view("rodapeNew");
	}

	public function findById($id) {		
		$dadosTurma = $this->turma->loadTurma($id);
		$data = array("dadosTurma" => $dadosTurma["dados"], "dadosAlunos" => $dadosTurma["alunos"]);
		$this->load->view("topo");
		$this->load->view("menu");
		$this->load->view('turma/detalhe', $data);
		$this->load->view("rodape");
		
	}

	public function loadPDF($turma_id) {
		$this->turma->turmaPDF($turma_id);
	}

	public function salvar()
	{	
		$this->load->model("turma_model", "turma");
		$status = 200;		
		$msg = "Turma inserido com sucesso.";
		$this->session->set_flashdata('msg', $msg);	
		$aluno_id= $this->turma->save();
		redirect(base_url("turma"));
	}
	public function atualizar(){
		$id= $this->input->post("id");
		$params_turma = array(
			"nome"  => $this->input->post("nome")
		); 

		$this->load->model("turma_model", "turma");
		$this->turma->update($id, $params_turma );
		$msg = "Turma alterado com sucesso.";
		redirect(base_url("turma"));
	}
	public function destroy(){
		$this->load->model("turma_model", "turma");
		$id= $this->input->post("id");
		$this->turma->delete($id);
		redirect(base_url("turma"));
	}
}
