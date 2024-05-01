
<form name="<?php echo base_url("agendamento")?>" method="POST" id="cadastra_agendamento" style="margin-top:10%">
	<div class="row">
		<div class="col-md-12 titulo" >
			<h4>UNIDADE</h4>
		</div>
		
		<div class="col-md-4">
			<Label>AP</Label>
			<select name="ap" id="ap" class="form-select">
				<option value="33">33</option>
			</select>
		</div>
		<div class="col-md-8">
			<Label>Unidade Solicitante</Label>
			<select name="unidade_solicitante" id="unidade_solicitante" class="form-select">
				<option value="">Selecione</option>
				<?php foreach($unidades as $unidade): ?>
					<option value="<?php echo $unidade->id?>"><?php echo $unidade->nome?></option>
				<?php endforeach?>
					
			</select>
		</div>
		
	</div>

	<div class="row">
		<div class="col-md-12 titulo" >
			<h4>PACIENTE</h4>
		
		</div>
		
		<div class="col-md-4">
			<Label>CNS</Label>
			<input name="cns" maxlength="255" id="cns" class="form-control" placeholder="CNS" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CNS do Paciente" />
		</div>
		<div class="col-md-8">
			<Label>Nome</Label>
			<input name="nome" maxlength="255" id="nome" class="form-control" placeholder="Nome" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Nome do Paciente" />
		</div>
		
	</div>

	<div class="row">
		<div class="col-md-12 titulo" >
			<h4>AGENDAMENTO</h4>
		
		</div>
		<div class="col-md-4">
			<Label>Local do Raio X</Label>
			<select required name="unidade_raiox" id="unidade_raiox" class="form-select" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Local do Raio X">
				<option value="">Selecione</option>
				<?php foreach($raiox as $unidade): ?>
					<option value="<?php echo $unidade->id?>"><?php echo $unidade->nome?></option>
				<?php endforeach?>
			</select>
		</div>
		<div class="col-md-2">
			<Label>Dia Agendamento</Label>
			<input required type="date" name="data" id="data" class="form-control" placeholder="Dia Agendamento" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Dia Agendamento"/>
		</div>
		<div class="col-md-2">
			<Label>Horário Agendamento</Label>
			<input required type="time" name="hora" id="hora" class="form-control" placeholder="Paciente" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Paciente"/>
		</div>
		
		<div class="col-md-2">
			<Label>Radiologista</Label>
			<select name="radiologista" id="radiologista" class="form-select" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Radiologista Responsável">
				<option value="">Selecione</option>
			</select>
		</div>
		<div class="col-md-2">
			<Label>Data Emissão Laudo</Label>
			<input required type="date" name="data_emissao_laudo" id="data_emissao_laudo" class="form-control" placeholder="Data Emissão Laudo" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Data Emissão Laudo" />
		</div>
		<div class="col-md-12">
			<Label>Justificativa Para Emissão Laudo</Label>
			<textarea required rows="5" name="justificativa_emissao_laudo" id="justificativa_emissao_laudo" class="form-control jqte-test" placeholder="Justificativa Para Emissão Laudo" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Justificativa Para Emissão Laudo"></textarea>
		</div>
	</div>

	<div class="row" style="margin:10px;">
		<div class="col-md-12" style="text-align:right; padding-bottom: 3px;">
			<button type="resete" class="btn btn-danger">Apagar</button>  
			<button type="submit" class="btn btn-primary">Salvar</button>    
		</div>
	</div>
	
</form>
</div>
<script src="assets/js/agendamento.js?t=<?php echo date("his")?>"></script>
