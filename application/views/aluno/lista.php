
<div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Escola/</span> Alunos</h4>
              <div class="row">                
                <?php
                 $msg = $this->session->flashdata('msg'); 
                if(isset($msg)){
                  echo ' <div class="alert alert-success"><h5>'.$msg.'</h5></div>';
                }
                ?>   
              </div>            
 <div class="card">
    <div class="row">
        <div class="col">
            <h5 class="card-header">Turmas</h5>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Adicionar Turma
            </button>          
        </div>
      </div>
      <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Quant. Alunos</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>                     
        <?php foreach ($data["listagem"] as $item) {?>        
          <tr>
            <td><?php echo ucwords(mb_strtoupper($item["turma_nome"]))?></td>    
            <td><?php echo count($item["alunos"])?></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                  <button type="button" class="dropdown-item btn-edit" onclick="funcao1(this)" 
                  data-nome="<?php echo $item["turma_nome"]?>" 
                  data-id="<?php echo $item["turma_id"]?>"
                  data-bs-toggle="modal" data-bs-target="#modalCenterEdit">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                  </button>
                  <a href="#" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir o produto?')) { document.getElementById('delete-form-<?php echo $item['turma_id']?>').submit(); }" 
                  
                  class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</a>                  
                  <a class="nav-link" href="<?php echo base_url("turma/relatorio/{$item["turma_id"]}")?>" target="_blank">
                  <i class="bx bx-search me-1"></i>Relatório
							  </a>
                  <form id="delete-form-<?php echo $item["turma_id"]?>" action="<?php echo base_url("turma/destroy")?>" method="POST" style="display: none;">
                  <input type="hidden" name="id" value='<?php echo $item["turma_id"]?>' >              
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
            <th>Quant. Alunos</th>
            <th>Ações</th>
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
            <form method="POST" action="<?php echo base_url("turma/salvar")?>">
            <div class="col mb-3">
              <label for="nameWithTitle" class="form-label">Nome</label>
              <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite nome">
              <p>            
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
          <form method="POST" action="<?php echo base_url("turma/atualizar")?>">
            <div class="col mb-3">
              <label for="nameWithTitle" class="form-label">Nome</label>
              <input type="hidden" id="id" name="id" class="form-control" placeholder="Enter Name">
              <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite nome">
              <p>
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
        
        
        
        $('#modalCenterEdit #id').val(id);
        $('#modalCenterEdit #nome').val(nome);
        
      }
  </script>

           