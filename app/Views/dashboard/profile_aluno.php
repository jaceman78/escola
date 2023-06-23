<?php 
$this->extend('dashboard/layout/dashboard-layout');
$this->section('content');
?>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= (isset($foto_aluno))?$foto_aluno:'SEM FOTO';?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= (isset($nome_aluno))?$nome_aluno:'SEM NOME';?></h3>

                <p class="text-muted text-center"><?= (isset($n_aluno))?$n_aluno:'SEM DADOS';?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Data de Nascimento</b> <a class="float-right"><?= (isset($data_nasci))?$data_nasci:'SEM DADOS';?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Telemóvel</b> <a class="float-right"><?= (isset($telemovel))?$telemovel:'SEM DADOS';?></a>
                  </li>
                  <li class="list-group-item">
                    <b>NIF</b> <a class="float-right"><?= (isset($NIF))?$NIF:'SEM DADOS';?> </a>
                  </li>
                </ul>

                <a href="mailto:<?= (isset($email_aluno))?$email_aluno:'SEM Email';?>" class="btn btn-primary btn-block"><b><?= (isset($email_aluno))?$email_aluno:'SEM Email';?></h3></b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sobre mim  </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#dados" data-toggle="tab">Dados</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                  <li class="nav-item"><a class="nav-link" href="#EE_tab" data-toggle="tab" onclick="getEEdetalhes()">Enc. Educação</a></li>
                </ul>                
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="dados">
                  

              

             
                  </div>
                  <!-- /.tab-pane -->




                  <div class="tab-pane" id="timeline">
         
                  </div>
                  <!-- /.tab-pane -->



                  <div class="tab-pane" id="settings">
                
                  </div>


                  <div class="tab-pane" id="EE_tab" >
                    <!-- Conteudos tab EE -->

                    <?= (isset($ee_id))?$ee_id:'SEM idee';?>
                    
                  
                  </div>


                  <!-- /.tab-pane -->
                </div>


                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<script>
		// "id_ee": "77",
		// "nome_ee": "LOUELL VIEGAS GOMES LIMA",
		// "telemovel_ee": "961215200",
		// "email_ee": "gomeslima86@gmail.com",
		// "NIF_ee": "2147483647",
		// "representante": null,
		// "status": null
  function getEEdetalhes() {
  var ee_id = <?= (isset($ee_id))?$ee_id:'3';?>; // Substitua pelo ID necessário
  $.ajax({
    url: '/aluno/EEdetalhes/' + ee_id,
    method: 'POST',
    dataType: 'json',
    success: function(data) {
      // Crie as cards com os dados recebidos
      var html = '';
   
        html += '<div class="card bg-light d-flex flex-fill">';
        html += '<div class="card-body">';
        html += '<h5 class="card-title">' + data.telemovel_ee + '</h5>';
        html += '<p class="card-text"><strong>ID:</strong> ' + data.id_ee + '</p>';
        html += '<p class="card-text"><strong>Email:</strong> ' + data.email_ee + '</p>';
        html += '</div>';
        html += '</div>';
     

      // Adicione as cards à div da tab
      $('#EE_tab').empty().append(html);
    }
  });
}

</script>
<?php
$this->endSection();

?>


