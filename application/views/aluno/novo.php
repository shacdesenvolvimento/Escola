<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          
          <h2>Turmas</h2>
          <div class="table-responsive">
           <form action="<?php echo base_url("aluno/salvar")?>" method="post">
					
		   <input type="text" class="form-control" placeholder="Digite seu nome" name="nome" id="nome">
		   <input type="date" class="form-control" placeholder="Digite seu aniversario" name="nascimento" id="nascimento">
		   <button type="submit">Salvar</button>
			</form>
          </div>
        </main>
      </div>
</div>
