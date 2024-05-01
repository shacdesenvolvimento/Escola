<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {

	public function salvar()
	{	
		$this->load->model("aluno_model", "aluno");
		$status = 200;		
		$msg = "Cadastro realizado com sucesso.";
		$this->session->set_flashdata('msg', $msg);		
		$aluno_id= $this->aluno->save();
		redirect(base_url("aluno"));
	}
	public function xpto(){
		$this->load->view("topo");
		$this->load->view("menu");		
		$this->load->view('aluno/novo');
		$this->load->view("rodape");
	}
	public function atualizar(){
		$id= $this->input->post("id");
		 $params_aluno = array(
			"nome"  => $this->input->post("nome"),
			"nascimento"  => $this->input->post("nascimento"),
			"turma_id"  => $this->input->post("turma")
		); 
		$this->load->model("aluno_model", "aluno");
		$this->aluno->update($id,$params_aluno );
		$msg = "Informações alterada com sucesso.";
		$this->session->set_flashdata('msg', $msg);
		redirect(base_url("aluno"));
	}

	public function menu(){
		$this->load->model("aluno_model", "aluno");
		$this->load->model("turma_model", "turma");
		$turma= array();
		$turma["listagem"] = $this->turma->listAll();
		$data = array();
		$data["listagem"] = $this->aluno->listar_alunos();		
		$this->load->view("menuNew");
		$this->load->view('aluno/lista_alunos', array("data"=>$data, "turma"=>$turma));
		$this->load->view("rodapeNew");
	}	
	public function destroy(){
		$this->load->model("aluno_model", "aluno");
		$id= $this->input->post("id");
		$this->aluno->delete($id);
		redirect(base_url("aluno"));
	}
}
