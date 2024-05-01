<?php

class Turma_model extends CI_Model {

	public function __construct() {
		parent::__construct();        
		$this->load->model("aluno_model", "aluno"); 
	}
	public function listAll() {
		$this->db->select("*");
		$this->db->from("turma");
		$this->db->order_by("turma.nome", "ASC");		
		return $this->db->get()->result(); 
	}
	
	public function listAllComp() {
		$this->db->select("turma.id as turma_id,
						   turma.nome as turma_nome,
						   aluno.nome as aluno_nome");
		$this->db->from("turma");
		$this->db->join("aluno", "aluno.turma_id = turma.id", "left");
		$this->db->order_by("turma.id, aluno.nome", "ASC");
		return $this->db->get()->result();
	}

	public function load_turmas() {
		$dados = self::listAllComp();
		$response = array();
		foreach($dados as $data) {
			$turma_id = $data->turma_id;
			if(!isset($response[$turma_id])) {
				$response[$turma_id] = array(
					"turma_id" => $data->turma_id,
					"turma_nome" => $data->turma_nome,
					"alunos" => array()
				);
			}
			if(!empty($data->aluno_nome)) {
				$response[$turma_id]["alunos"][] = $data->aluno_nome;
			}
		}
		return $response;
	}
	
	public function loadTurma($turma_id) {		
		$response = array();
		if ($turma_id > 0){
			$dados_turma = self::findById($turma_id);
			$response["dados"] = $dados_turma[0];
			if (!empty($dados_turma)) {
				$dados_alunos = $this->aluno->findByTurma($turma_id);
				$response["alunos"] = $dados_alunos;
			}			
		}
		return $response;
	}

	public function findById($turma_id) {
		$this->db->select("turma.*");
		$this->db->from("turma");
		$this->db->where("id", $turma_id);
		$this->db->order_by("turma.nome", "ASC");		
		return $this->db->get()->result(); 
	}
	public function insert($params) {		
		$this->db->insert("turma", $params);
		return $this->db->insert_id();
	}
	public function save() {		
		$params = array(
			"nome" => $this->input->post("nome")
		);		
		if ($params["nome"] != "") {			
			$turma_id = self::insert($params);
			return $turma_id;
		} else {
			$status = 400;
			$msg = "<b>Atenção:</b> Verifique CNS e nome do paciene.";
		}
	}
	public function update($id, $params) {
		$this->db->where("id", $id);
		$this->db->update("turma", $params);
	}
	public function delete($id) {
		$this->db->where("id", $id);
		$this->db->delete("turma");
	}

	public function turmaPDF($turma_id){		
		$dados = self::loadTurma($turma_id);
		$dadosTurma = $dados["dados"];
		$dadosALuno = $dados["alunos"];

		$nomeRelatorio = utf8_decode('Relatório de Turma '.$dadosTurma->nome);
		$totalAlunos = "Total de Alunos: ".count($dadosALuno);

		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(195,10,$nomeRelatorio,1,1,'C');
		$pdf->Cell(195,10,$totalAlunos,1,1,'C');
		$pdf->Cell(15,10,'#',1,0,'C');
		$pdf->Cell(105,10, 'Nome ALuno' ,1,0,'C');
		$pdf->Cell(75,10,'Nascimento',1,1,'C');
		$slno = 1;
		
		foreach($dadosALuno as $d){
			$nascimento = new DateTime($d->nascimento);
			$nascimento = $nascimento->format("d/m/Y");

			$pdf->SetFont('Arial','',10);
			$pdf->Cell(15,10,$slno,1,0,'C');
			$pdf->Cell(105,10, utf8_decode($d->nome),1,0,'C');
			$pdf->Cell(75,10, $nascimento,1,1,'C');
			$slno = $slno+1;
		}
		
		$pdf->SetY(-25);
		$pdf->Image(base_url("assets/img/logo.png"), 10, $pdf->GetY(), 0, 15);
		$pdf->Cell(0, -8, utf8_decode("Página") . $pdf->PageNo(), 0, 0, 'C');
		$curdate = date('d-m-Y His');
		$pdf->Output('relatorio_tuuma_'.$nomeRelatorio.'_'.$curdate.'.pdf', "I");
		
	}

}

?>
