
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Escola/</span> Alunos</h4>
              <div class="row">              
            </div>
            
 <div class="card">
    <div class="row">
        <div class="col">
            <h5 class="card-header">Alunos</h5>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Adicionar Aluno
            </button>          
        </div>
    </div>
      <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Turma</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>               
        <?php foreach ($data["listagem"] as $item) {            
         ?>        
          <tr>
            <td><strong><?php echo $item->nome?></strong>           
          </td>
            <td><?php echo $item->turma_nome?></td>                        
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <button type="button" class="dropdown-item btn-edit" onclick="funcao1(this)" 
                  data-id="<?php echo $item->id?>" 
                  data-nome="<?php echo $item->nome?>" 
                  data-turma="<?php echo $item->turma_nome?>" 
                  data-turma_id="<?php echo $item->turma_id?>" 
                  data-nascimento="<?php echo $item->nascimento?>" 
                  data-bs-toggle="modal" data-bs-target="#modalCenterEdit">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                  </button>
                  <a href="#" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir o produto?')) { document.getElementById('delete-form-<?php echo $item->id?>').submit(); }" 
                  
                  class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</a>

                  <form id="delete-form-<?php echo $item->id?>" action="<?php echo base_url("aluno/destroy")?>" method="POST" style="display: none;">
                  <input type="hidden" name="id" value='<?php echo $item->id?>' >              
                </form>
                </div>
              </div>
            </td>
          </tr>
          <?php }?>
          </tbody>
        <tfoot class="table-border-bottom-0">
          <tr>
            <th>Nome</th>
            <th>Turma</th>
            <th>Ações </th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
   <!-- Modal -->
   <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">        
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">      
            Novo Aluno
          </h5>        
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <form method="POST" action="<?php echo base_url("aluno/salvar")?>">
            <div class="col mb-3">
              <label for="nameWithTitle" class="form-label">Nome</label>
              <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite nome">
              <label for="nameWithTitle" class="form-label">Nascimento</label>
              <input type="date" id="nascimento" name="nascimento" class="form-control" placeholder="Digite nascimento">
              <label for="nameWithTitle" class="form-label">Turma</label>
              <select name="turma" id="turma" class="form-control">
              <option value="">selecione a turma</option>
                <?php 
                    foreach ($turma["listagem"] as $item) {                    
                ?>
                <option value="<?php echo $item->id?>"><?php echo $item->nome?></option>
                <?php }?>
              </select>              
            </div>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </form>        
        </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>          
            <input type="hidden" name="_token" value="0O7hOSame2TqtG9cPRQdvX2ROugDlv2Ayfd4CxQz">     
        </div>
      </div>
    </div>    
  </div>
  

  <!-- Modal Edit -->
  <div class="modal fade" id="modalCenterEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">        
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">      
            Editar Cargo
          </h5>        
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <form method="POST" action="<?php echo base_url("aluno/atualizar")?>">             
            <div class="col mb-3">
            <label for="nameWithTitle" class="form-label">Nome</label>
              <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite nome">
              <label for="nameWithTitle" class="form-label">Nascimento</label>
              <input type="date" id="nascimento" name="nascimento" class="form-control" placeholder="Digite nascimento">
              <label for="nameWithTitle" class="form-label">Turma</label>
              <select name="turma" id="turma" class="form-control">
                <?php 
                    foreach ($turma["listagem"] as $item) {                    
                ?>
                <option value="<?php echo $item->id?>"><?php echo $item->nome?></option>
                <?php }?>
              </select>              
              <input type="hidden" id="id" name="id" class="form-control" placeholder="Enter Name">
            </div>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>    
  </div>

  <script>
      function funcao1(clickedButton)
      {
        var id = $(clickedButton).data('id');
        var nome = $(clickedButton).data('nome');
        var nascimento = $(clickedButton).data('nascimento');
        var turma = $(clickedButton).data('turma');
        var turma_id = $(clickedButton).data('turma_id');
                
        
        $('#modalCenterEdit #id').val(id);
        $('#modalCenterEdit #nome').val(nome);
        $('#modalCenterEdit #turma').val(turma_id);
        $('#modalCenterEdit #nascimento').val(nascimento);
        
      }
  </script>

           