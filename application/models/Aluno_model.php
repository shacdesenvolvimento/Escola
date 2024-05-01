<?php

class Aluno_model extends CI_Model {


	public function listAll() {		
		$this->db->select("aluno.*, 
						   aluno.turma_id,
						   turma.nome as turma_nome
						");
		$this->db->from("aluno");
		$this->db->join('turma', 'turma.id = aluno.turma_id', 'left');
		$this->db->order_by("turma.nome, aluno.nome", "ASC");
		$dados = $this->db->get()->result();
		if(!empty($dados)){
			foreach($dados as $indice => $data) {			
				if(strlen($data->turma_nome)<=0) {
					$dados[$indice]->turma_id = 0;
					$dados[$indice]->turma_nome = 'Sem Turma';
				}
			}
		}
		return $dados; 		
	}

	public function load_alunos() {		
		$dados = self::listAll();
		$response = array();
		$controle = null;
		if(!empty($dados)){
			foreach($dados as $indice => $data){
				if($controle != $data->turma_id){
					$controle = $data->turma_id;
					$totalAluno = 0;
					$response[$data->turma_id]["turma_id"] = $data->turma_id;
					$response[$data->turma_id]["turma_nome"] = $data->turma_nome;
				}
				$response[$data->turma_id]["alunos"][] = $data->nome;				
			}
		}		
		return $response;
	}
	public function listar_alunos() {
		$dados = self::listAll();		
		$response = array();
		$controle = null;
		return $dados;
	}

	public function findByName($name) {
		$this->db->select("aluno.*");
		$this->db->from("aluno");
		$this->db->where_in("nome", $name);
		$this->db->order_by("aluno.nome", "ASC");		
		return $this->db->get()->result(); 
	}

	public function findByTurma($turma_id) {		
		$this->db->select("aluno.*");
		$this->db->from("aluno");
		$this->db->where("turma_id", $turma_id);
		$this->db->order_by("aluno.nome", "ASC");		
		return $this->db->get()->result(); 
	}

	public function insert($params) {
		$this->db->insert("aluno", $params);
		return $this->db->insert_id();
	}

	public function update($id, $params) {
		$this->db->where("id", $id);
		$this->db->update("aluno", $params);
	}

	public function save() {				
		$params = array(
			"nome" => $this->input->post("nome"),
			"nascimento" => $this->input->post("nascimento"),
			"turma_id" =>  $this->input->post("turma")
		);
		
		if ($params["nome"] != "") {
			//Verifica se existe o cliente na base de dados. Caso não exista, iremos salvar no banco.
			$dados = self::findByName($params["nome"]);
			if (empty($dados)) {
				$aluno_id = self::insert($params);
			} else {
				$aluno_id = $dados[0]->id;
				self::update($aluno_id, $params);	
			}			
			return $aluno_id;
		} else {
			$status = 400;
			$msg = "<b>Atenção:</b> Verifique CNS e nome do paciene.";
		}
	}
	public function delete($id) {
		$this->db->where("id", $id);
		$this->db->delete("aluno");
	}

}

?>
