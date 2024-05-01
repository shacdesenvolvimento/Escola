<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          
          <h2>Turma: <?php echo $dadosTurma->nome?></h2>
          
					<br/>
					<h3>Alunos</h3>
         <button type="button" onclick="history.go(-1)">Retornar</button>
					<div class="table-responsive">
            <table class="table table-striped table-sm ">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Aniversário</th>
                </tr>
              </thead>
              <tbody>
                <?php 
					foreach($dadosAlunos as $aluno) :
						$nascimento = new DateTime($aluno->nascimento);
						$nascimento = $nascimento->format("d/m/Y");
				?>
					<tr>
						<td><?php echo ucwords(mb_strtoupper($aluno->nome))?></td>
						<td><?php echo $nascimento?></td>
					</tr>
				<?php 
					endforeach
				?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
</div>