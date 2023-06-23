<?php 
$this->extend('dashboard/layout/dashboard-layout');
$this->section('content');
?>


<!-- Main content -->


<div class="col-12 col-sm-12">
  <div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
      <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active " id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-four-disciplinas-tab" data-toggle="pill" href="#custom-tabs-four-disciplinas" role="tab" aria-controls="custom-tabs-four-disciplinas" aria-selected="false">Disciplinas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " id="custom-tabs-four-alunos-tab" data-toggle="pill" href="#custom-tabs-four-alunos" role="tab" aria-controls="custom-tabs-four-alunos" aria-selected="false">Alunos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-four-avaliacao-tab" data-toggle="pill" href="#custom-tabs-four-avaliacao" role="tab" aria-controls="custom-tabs-four-avaliacao" aria-selected="false">Avaliação</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " id="custom-tabs-four-PES-tab" data-toggle="pill" href="#custom-tabs-four-PES" role="tab" aria-controls="custom-tabs-four-PES" aria-selected="false">PES</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="custom-tabs-four-tabContent">
        <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
          Conteudos Home preenchidos via ajax  
        </div>
        <div class="tab-pane fade" id="custom-tabs-four-disciplinas" role="tabpanel" aria-labelledby="custom-tabs-four-disciplinas-tab">
          Conteudos das disciplinas preenchidos via ajax             
        </div>
        <div class="tab-pane fade" id="custom-tabs-four-alunos" role="tabpanel" aria-labelledby="custom-tabs-four-alunos-tab">
          Conteudos dos alunos preenchidos via ajax               
        </div>

        <!-- PANE AVALIAÇÃO -->
        <div class="tab-pane fade" id="custom-tabs-four-avaliacao" role="tabpanel" aria-labelledby="custom-tabs-four-avaliacao-tab">
          <!-- Default box -->
          <div class="row">

            <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                Aluno 1
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Nicole Pearson</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                      </ul>
                      </div>
                    <div class="col-5 text-center">
                      <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Aluno 2
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Nicole Pearson</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../../dist/img/user2-160x160.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
               <!-- /.card-body -->
           </div>  
          </div>


                  <!-- PANE PES  -->
        <div class="tab-pane fade" id="custom-tabs-four-PES" role="tabpanel" aria-labelledby="custom-tabs-four-PES-tab">
          <!-- Default box -->
          <div class="row">

           PANE PES
               <!-- /.card-body -->
           </div>  
          </div>
        <!-- FIM PANE PES -->



        </div>
        <!-- /.card -->
      </div>
  </div>

  <div id="card-container"></div>




  <!-- /Main content -->
  <!-- PROFILE ALUNO modal content -->
  <div id="PerfilAluno" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">        
        <div class="modal-header text-center bg-info p-3 " id="model-header-aluno">
          <h4 class="modal-title text-white" id="info-header-aluno">TITULO</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="container-fluid">
           <div class="row">
             <div class="col-md-3">
            <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                      src="../../img/alunos/default.png"
                      alt="User profile picture" id="foto_aluno">
                  </div>

                    <h3 class="profile-username text-center" id="username">SEM NOME</h3>
                    <p class="text-muted text-center" id="alterar">SEM DADOS</p>
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Data de Nascimento</b> <a class="float-right" id="data_nascimento" >SEM DADOS</a>
                      </li>
                      <li class="list-group-item">
                        <b>Telemóvel</b> <a class="float-right" id="telemovel" >SEM DADOS</a>
                      </li>
                      <li class="list-group-item">
                        <b>NIF</b> <a class="float-right" id="NIF">SEM DADOS </a>
                      </li>
                    </ul>

                      <a href="mailto:" class="btn btn-primary btn-block" id="email_aluno" target="_blank"><b><?= (isset($email_aluno))?$email_aluno:'SEM Email';?></h3></b></a>
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
                <strong><i class="fas fa-book mr-1"></i> Turma</strong>

                <p class="text-muted">
                  Sou da turma <?= (isset($nomedaturma))?$nomedaturma:'SEM TURMA';?>
                </p>

                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Morada</strong>

                <p class="text-muted">Nova, Morada</p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i> Obs</strong>

                <p class="text-muted">Colocar notas aqui.</p>
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
                  <li class="nav-item"><a class="nav-link" href="#DL54" data-toggle="tab">DL54</a></li>
                  <li class="nav-item"><a class="nav-link" href="#EE_tab" data-toggle="tab">Enc. Educação</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Aval_tab" data-toggle="tab">Avaliações</a></li>
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

                  <div class="tab-pane" id="DL54">   
                    <div class="col-sm-12">

                      <div class="form-group">
                        <input type="hidden" id="aluno_id" name="aluno_id" value="" class="form-control" placeholder="Id aluno" maxlength="11" required>
                        <label class="col-form-label"><i class="fas fa-check"></i> Medidas Universais [U] </label>
                        <div class="custom-control custom-checkbox">                       
                        <input class="custom-control-input" type="checkbox" id="medidasCheckbox1" value="1">
                          <label for="medidasCheckbox1" class="custom-control-label">a) A diferenciação pedagógica.</label>
                        </div>
                        <div class="custom-control custom-checkbox">                        
                        <input class="custom-control-input" type="checkbox" id="medidasCheckbox1" value="1">
                          <label for="customCheckbox1" class="custom-control-label"></label>
                        </div>
                        <div class="custom-control custom-checkbox">                       
                        <input class="custom-control-input" type="checkbox" id="medidasCheckbox2" value="2">
                          <label for="medidasCheckbox2" class="custom-control-label">b) As acomodações curriculares.</label>
                        </div>
                        <div class="custom-control custom-checkbox">                       
                        <input class="custom-control-input" type="checkbox" id="medidasCheckbox3" value="3">
                          <label for="medidasCheckbox3" class="custom-control-label">c) O enriquecimento curricular.</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="medidasCheckbox4" value="4">
                          <label for="medidasCheckbox4" class="custom-control-label">d) A promoção do comportamento pró-social.</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="medidasCheckbox5" value="5"> 
                          <label for="medidasCheckbox5" class="custom-control-label">e) A intervenção com foco académico ou comportamental em pequenos grupos.</label>
                        </div>
                        <label class="col-form-label"><i class="fas fa-check"></i> Medidas Seletivas [S] </label>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="medidasCheckbox6" value="6">
                          <label for="medidasCheckbox6" class="custom-control-label">a) Os percursos curriculares diferenciados.</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="medidasCheckbox7" value="7">
                          <label for="medidasCheckbox7" class="custom-control-label">b) As adaptações curriculares não significativas.</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="medidasCheckbox8" value="8">
                          <label for="medidasCheckbox8" class="custom-control-label">c) O apoio psicopedagógico.</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="medidasCheckbox9" value="9">
                          <label for="medidasCheckbox9" class="custom-control-label">d) A antecipação e o reforço das aprendizagens.</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="medidasCheckbox10" value="10">
                          <label for="medidasCheckbox10" class="custom-control-label">e) O apoio tutorial.</label>
                        </div>
                        <label class="col-form-label"><i class="fas fa-check"></i> Medidas Adicionais [A] </label>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="medidasCheckbox11" value="11">
                          <label for="medidasCheckbox11" class="custom-control-label">a) A frequência do ano de escolaridade por disciplinas.</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="medidasCheckbox12" value="12">
                          <label for="medidasCheckbox12" class="custom-control-label">b) As adaptações curriculares significativas.</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="medidasCheckbox13" value="13">
                          <label for="medidasCheckbox13" class="custom-control-label">c) O plano individual de transição.</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="medidasCheckbox14" value="14">
                          <label for="medidasCheckbox14" class="custom-control-label">d) O desenvolvimento de metodologias e estratégias de ensino estruturado.</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="medidasCheckbox15" value="15">
                          <label for="medidasCheckbox15" class="custom-control-label">e) O desenvolvimento de competências de autonomia pessoal e social.</label>
                        </div>                     

                  

                      </div>
                    </div>          
                  </div>


                  <div class="tab-pane" id="EE_tab" >
                    <!-- Conteudos tab EE -->

                    <?= (isset($ee_id))?$ee_id:'SEM idee';?>                                      
                  </div>
                  <div class="tab-pane" id="Aval_tab">



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

        </div><!-- /.modal-body -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!---/PROFILE ALUNO  content -->



  <!-- ADD modal content ALUNO -->
  <div id="data-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="text-center bg-info p-3" id="model-header">
          <h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
        </div>
        <div class="modal-body">
          <form id="data-form" class="pl-3 pr-3">
            <div class="row">
            <input type="hidden" id="id_turmaaluno" name="id_turmaaluno" class="form-control" placeholder="Id turmaaluno" maxlength="11" required>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group mb-3">
                    <label for="anoletivo_id" class="col-form-label"> Anoletivo: </label>
                    <input type="hidden" value="1" id="anoletivo_id" name="anoletivo_id" class="form-control" placeholder="Anoletivo id" minlength="0"  maxlength="11" >
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group mb-3">
                    <label for="turma_id" class="col-form-label"> Turma: <span class="text-danger"><?php echo $nomedaturma;?></span> </label>
                    <input type="hidden" value="<?php echo $idturma;?>" id="turma_id" name="turma_id" class="form-control" placeholder="Turma id" minlength="0"  maxlength="11" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group mb-3">
                    <label for="num_interno" class="col-form-label"> Num interno: <span class="text-danger">*</span> </label>
                    <input type="number" id="num_interno" name="num_interno" class="form-control" placeholder="Num interno" minlength="0"  maxlength="11" required>
                  </div>
                </div>
              </div>

            <div class="form-group text-center">
              <div class="btn-group">
                <button type="submit" class="btn btn-success mr-2" id="form-btn"><?= lang("App.save") ?></button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
              </div>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- /ADD modal content -->



<!----- ADD modal content Disciplinas-->
<div id="data-modal-disciplina" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="text-center bg-info p-3" id="model-header-disciplina">
        <h4 class="modal-title text-white" id="info-header-disciplina"></h4>
      </div>
      <div class="modal-body">
        <form id="data-form-disciplina" class="pl-3 pr-3">
          <div class="row">
          <input type="hidden" id="id_turmadisciplina" name="id_turmadisciplina" class="form-control" placeholder="Id turmadisciplina" maxlength="11" required>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="turma_id" class="col-form-label"> Turma: <?=$nomedaturma?> </label>
									<input type="hidden" id="turma_id" name="turma_id" class="form-control" placeholder="Turma id" minlength="0"  maxlength="11" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="disciplina_id" id="nome_disciplina" class="col-form-label"> </label>
									<input type="hidden" id="disciplina_id" name="disciplina_id" class="form-control" placeholder="Disciplina id" minlength="0"  maxlength="11" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="user_id" class="col-form-label"> User id do professor: </label>
									<select type="text" id="user_id" name="user_id" class="form-control" placeholder="User id" minlength="0"  maxlength="11" >
                  </select>
                </div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="carga_horaria" class="col-form-label"> Carga horaria: </label>
									<input type="number" id="carga_horaria" name="carga_horaria" class="form-control" placeholder="Carga horaria" minlength="0"  maxlength="11" >
								</div>
							</div>
						</div>

          <div class="form-group text-center">
            <div class="btn-group">
              <button type="submit" class="btn btn-success mr-2" id="form-btn"><?= lang("App.save") ?></button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= lang("App.cancel") ?></button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!----- /ADD modal content Disciplinas -->




  <?= $this->endSection() ?>
   <!-- /.content -->

  <!-- page script -->
  <?= $this->section("pageScript") ?>
  <script>
  // seleciona a lista existente a adiciona dinamicamente um novo item
  let lista = document.querySelector('ul[name="itemturmaprofissinal"]');
  // cria um novo elemento li
  let novoItem = document.createElement('li');
  novoItem.classList.add('nav-item');
  // cria um novo elemento a
  let novoLink = document.createElement('a');
  novoLink.classList.add('nav-link');
  novoLink.setAttribute('href', window.location.href);
  // cria um novo elemento i
  let novoIcon = document.createElement('i');
  novoIcon.classList.add('fas', 'fa-dot-circle', 'nav-icon');
  novoIcon.style.paddingLeft = '1em';
  // cria um novo elemento p
  let novoTexto = document.createElement('p');
  novoTexto.innerText = 'Detalhes da turma '+'<?=$nomedaturma?>';
  novoTexto.style.paddingLeft= '1em';

  // adiciona o elemento i ao elemento a
  novoLink.appendChild(novoIcon);
  // adiciona o elemento p ao elemento a
  novoLink.appendChild(novoTexto);
  // adiciona o elemento a ao elemento li
  novoItem.appendChild(novoLink);
  // adiciona o novo elemento li à lista existente
  lista.appendChild(novoItem);    


 ///////////////////////////////////////PREENCHIMENTO SEPARADOR DISCIPLINAS

  function loadTabDisciplinas() {
    var id_turma = "<?php echo $idturma; ?>";
    $.ajax({
      url: "/turmadisciplina/getDisciplinaDetalhes/" + id_turma,
      type: "POST",
      dataType: "json",
      success: function(data) {
        var cards = '<div class="row">';
        data.forEach(function(turmaDisciplina) {
          if (turmaDisciplina.nomeprof == null)
            turmaDisciplina.nomeprof = "Sem professor";

          cards += '<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">';
          cards += '<div class="card bg-light d-flex flex-fill">';

          cards += '<div class="card-header text-muted border-bottom-0">Disciplina: ' + turmaDisciplina.nomedisc + '</div>';
          cards += '<div class="card-body pt-0">';

          cards += '<div class="row">';
          cards += '<div class="col-7">';
          cards += '<h2 class="lead"><b>' + turmaDisciplina.nomeprof + '</b></h2><h6> <i class="fa fa-pencil" aria-hidden="true" onclick="saveprof(' + turmaDisciplina.id_turmadisciplina + ',\'' + turmaDisciplina.nomedisc + '\')"></i></h6>';

          cards += '<p class="card-text">Carga Horária: ' + turmaDisciplina.carga_horaria + '</p>';
          cards += '</div>';

          cards += '<div class="col-5 text-center">';
          cards += '<img src="../../dist/img/user2-160x160.jpg" alt="user-avatar" class="img-circle img-fluid">';
          cards += '</div>';

          cards += '</div>';
          cards += '</div>';
          cards += '</div>';
          cards += '</div>';
        });

        $('#custom-tabs-four-disciplinas').html(cards);
      }
    });
  }
  $(document).ready(function() {
  loadTabDisciplinas();
  // Exemplo de uso: chamar a função loadTabDisciplinas() novamente para atualizar o conteúdo
  // loadCustomTabs();
});

  function saveprof(id_turmadisciplina,nome_disciplina) {
    console.log(id_turmadisciplina);
    urlController = '<?= base_url($controller . "/edit") ?>';
    submitText = '<?= lang("App.update") ?>';
    $.ajax({
      url: '<?php echo base_url($controller . "/getOne") ?>',
      type: 'post',
      data: {
        id_turmadisciplina: id_turmadisciplina
      },
      dataType: 'json',
      success: function(response) {
        $('#model-header-disciplina').removeClass('bg-success').addClass('bg-info');
        $("#info-header-disciplina").text('<?= lang("App.edit") ?>');
        $("#form-btn").text(submitText);
        $('#data-modal-disciplina').modal('show');
      
        //insert data to form 36114
        $("#data-form-disciplina #id_turmadisciplina").val(response.id_turmadisciplina);
        $("#data-form-disciplina #turma_id").val(response.turma_id);
        $("#data-form-disciplina #disciplina_id").val(response.disciplina_id);
        $("#data-form-disciplina #nome_disciplina").text(nome_disciplina);

        //$("#data-form-disciplina #user_id").val(response.user_id);
              $.ajax({
                  url: '/user/getAllArrayNomes',
                  type: 'post',
                  dataType: 'json',
                  success: function(users) {
                    // Limpa o campo user_id
                    $("#data-form-disciplina #user_id").empty();

                    // Preenche o campo user_id com os valores obtidos
                    users.forEach(function(user) {
                      var option = $("<option>").val(user.id_360).text(user.name);
                      $("#data-form-disciplina #user_id").append(option);
                    });
                  },
                  error: function(xhr, status, error) {
                    console.error(error);
                  }
                });

        $("#data-form-disciplina #carga_horaria").val(response.carga_horaria);

          }
        });


      $.validator.setDefaults({
        highlight: function(element) {
          $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element) {
          $(element).removeClass('is-invalid').addClass('is-valid');
        },
        errorElement: 'div ',
        errorClass: 'invalid-feedback',
        errorPlacement: function(error, element) {
          if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
          } else if ($(element).is('.select')) {
            element.next().after(error);
          } else if (element.hasClass('select2')) {
            //error.insertAfter(element);
            error.insertAfter(element.next());
          } else if (element.hasClass('selectpicker')) {
            error.insertAfter(element.next());
          } else {
            error.insertAfter(element);
          }
        },
        submitHandler: function(form) {
          var form = $('#data-form-disciplina');
          $(".text-danger").remove();
          $.ajax({
            // fixBug get url from global function only
            // get global variable is bug!
            url: getUrl(),
            type: 'post',
            data: form.serialize(),
            cache: false,
            dataType: 'json',
            beforeSend: function() {
              $('#form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
            },
            success: function(response) {
              if (response.success === true) {
                Swal.fire({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  title: response.messages,
                  showConfirmButton: false,
                  timer: 1500
                }).then(function() {
                //  $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                  $('#data-modal-disciplina').modal('hide');
                  loadTabDisciplinas(); // reload the data
                  
                })
              } else {
                if (response.messages instanceof Object) {
                  $.each(response.messages, function(index, value) {
                    var ele = $("#" + index);
                    ele.closest('.form-control')
                      .removeClass('is-invalid')
                      .removeClass('is-valid')
                      .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
                    ele.after('<div class="invalid-feedback">' + response.messages[index] + '</div>');
                  });
                } else {
                  Swal.fire({
                    toast: false,
                    position: 'bottom-end',
                    icon: 'error',
                    title: response.messages,
                    showConfirmButton: false,
                    timer: 3000
                  })

                }
              }
              $('#form-btn').html(getSubmitText());
            }
          });
          return false;
        }
      });

      $('#data-form-disciplina').validate({

    //insert data-form-disciplina to database

  });
}


 ///////////////////////////////////////PREENCHIMENTO SEPARADOR ALUNOS
  $(document).ready(function() {
      var id_turma = "<?php echo $idturma; ?>";
      $.ajax({
          url: "/turmaluno/getTurmaDetalhes/" + id_turma,
          type: "POST",
          dataType: "json",
          success: function(data) {
              var cards = '<div class="row">';
              data.forEach(function(turmaluno) {            
                    cards += '<div class="col-12 col-sm-4 col-md-4 d-flex align-items-stretch flex-column">';
                      cards += '<div class="card bg-light d-flex flex-fill">';
                        
                          cards += '<div class="card-header border-bottom-0"><b>' + turmaluno.nome_aluno + '</b></div>';
                          cards += '<div class="card-body pt-0">';
                      
                            cards += '<div class="row">';
                              cards += '<div class="col-7">';
                                cards += '<h2 class="lead"><b>' + turmaluno.telemovel + '</b></h2>';
                                cards += '<p class="card-text"> '+turmaluno.id_aluno+'</p>';
                                cards += '<p class="card-text"> ' + turmaluno.data_nasci + '</p>';
                              cards += '</div>';
                            cards += '<div class="col-5 text-center">';  
                              cards += '<img src="../../img/alunos/'+ turmaluno.num_E360 +' " onerror="this.src=\'../../img/alunos/default.png\'" alt="user-avatar"  class=" img-fluid rounded-circle" style="width: 100px; height: 100px;">';
                            cards += '</div>';
                            cards += '</div>';
                        cards += '</div>';
                        cards += '<div class="card-footer">';
                          cards += '<div class="text-right">';                        
                          cards += '   <a onClick="removealunodaturma('+turmaluno.id_turmaaluno+')" class="btn btn-sm btn-danger" >';
                          cards += '   <i class="fas fa-trash"></i> Remover</a>';
                          cards += '   <a href="mailto:' + turmaluno.email + '" class="btn btn-sm bg-teal" target="_blank">';
                          cards += '     <i class="fas fa-envelope"></i> Email';
                          cards += '   </a>';
                          // cards += '    <a href="/aluno/profilealuno/'+turmaluno.id_aluno+'" class="btn btn-sm btn-primary">';
                          cards += '   <button type="button" data-toggle="modal" onclick="Aluno('+turmaluno.id_aluno+')" class="btn btn-sm btn-primary">';                          
                          cards += '      <i class="fas fa-user"></i> Perfil</button>';
                         // cards += '   </a>';
                          cards += '  </div>';
                        cards += ' </div>';
                      cards += '</div>';  
                        
                    cards += '</div>';
              });
                  cards += '<div class="col-12 col-sm-4 col-md-4 d-flex align-items-stretch flex-column">';
                      cards += '<div class="card bg-success d-flex flex-fill">';
                          cards += '<div class="card-header border-bottom-0 text-center"><b>Adicionar Aluno</b></div>';                 
                          cards += '<div class="card-body  d-flex justify-content-center align-items-center">';                   
                            cards += '<div class="row">';
                              cards += '<div class="col-12 d-flex justify-content-center algn-items-center">';
                                cards += '<i class=" fas fa-plus-circle fa-5x text-light" onclick="save()" ></i>';
                                cards += '</div>';                              
                              cards += '</div>';
                            cards += '</div>';
                          cards += '</div>';
                        cards += '</div>';     

                    cards += '</div>';   //da row 

                    // Adicione o código de substituição de imagem
              $('#custom-tabs-four-alunos').html(cards);
          }
      });
  });
  ///////////////////////////////////////PREENCHIMENTO SEPARADOR HOME
  $(document).ready(function() {
      var id_turma = "<?php echo $idturma; ?>";
      $.ajax({
          url: "/turmas/getTurmaDetalhes/" + id_turma,
          type: "POST",
          dataType: "json",
          success: function(data) {
              var cards = "";           
                  cards += '<div class="card">';
                  cards += '<div class="card-header">' + data[0].nome + '</div>';
                  cards += '<div class="card-body">';
                  cards += '<h5 class="card-title">' + data[0].nome_tipologia + '</h5>';
                  cards += '<p class="card-text">' + data[0].nomedt + '</p>';
                  cards += '<p class="card-text">' + data[0].email + '</p>';
                  cards += '<p class="card-text">' + data[0].profile_img + '</p>';
                  cards += '<p class="card-text">' + data[0].num_disciplinas + '</p>';
                  cards += '</div>';
                  cards += '</div>';            
              $('#custom-tabs-four-home').html(cards);
          }
      });
  });


  //////////////////////////////////////// APAGAR ALUNO INSCRITO

function removealunodaturma(id_turmaaluno) {
  Swal.fire({
    title: "<?= lang("App.remove-title") ?>",
    text: "<?= lang("App.remove-text") ?>",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '<?= lang("App.confirm") ?>',
    cancelButtonText: '<?= lang("App.cancel") ?>'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: '<?php echo base_url("turmaluno/remove") ?>',
        type: 'post',
        data: {
          id_turmaaluno : id_turmaaluno
        },
        dataType: 'json',
        success: function(response) {
          if (response.success === true) {
            Swal.fire({
              toast:true,
              position: 'top-end',
              icon: 'success',
              title: response.messages,
              showConfirmButton: false,
              timer: 1500
            }).then(function() {
              //$('#data_table').DataTable().ajax.reload(null, false).draw(false);
              location.reload(); //Reload após edição
            })
          } else {
            Swal.fire({
              toast:false,
              position: 'bottom-end',
              icon: 'error',
              title: response.messages,
              showConfirmButton: false,
              timer: 3000
            })
          }
        }
      });
    }
  })      
}


    var urlController = '';
    var submitText = '';
    function getUrl() {
      return urlController;
    }
    function getSubmitText() {
      return submitText;
    }


//////////////////////////////FUNCTION VER PERFIL ALUNO ///////////////////////////////////////////////7
     

function Aluno(id_aluno) {
  $('#PerfilAluno').modal('show');
  console.log(id_aluno); //Controlo (apagar)


  $(document).on('change', 'input[type="checkbox"]', function () {
  var medidaId = $(this).attr('id').replace('medidasCheckbox', '');
  var alunoId = id_aluno; // 

  if (!$(this).is(':checked')) {
      // Desmarcou a checkbox, enviar solicitação Ajax para remover o registro correspondente
      $.ajax({
          url: '/medidas_alunos/delete',
          type: 'POST',
          dataType: 'json',
          data: {
              medidaId: medidaId,
              alunoId: alunoId
          },
          success: function (response) {
              console.log('Medida removida da base de dados com sucesso');
          },
          error: function (xhr, status, error) {
              console.error(error);
          }
      });
    }
  });




  $.ajax({       
    url: '/aluno/profilealunoModal/' + id_aluno,
      type: 'post',
      dataType: 'json',
      success: function(data){
        console.log(data);
        // Crie as cards com os dados recebidos
        var html = '';   
        html += '<div class="card bg-light d-flex flex-fill">';
        html += '<div class="card-body">';
        html += '<h5 class="card-title">' + data.nome_aluno+ '</h5>';
        html += '<p class="card-text"><strong>Numero Interno</strong> ' + data.id_aluno+ '</p>';
        html += '<p class="card-text"><strong>Data Nascimento:</strong> ' + data.data_nasci + '</p>';
        html += '</div>';
        html += '</div>';
        // Adicione as cards à div da tab
        $('#dados').empty().append(html);
     
        $.ajax({
          url: '/aluno/EEdetalhes/'+ data.ee_id,   
          type: 'post',
          dataType: 'json',
          success: function(dataee){
            console.log(dataee);
            // Crie as cards com os dados recebidos
            var htmlEE = '';   
            htmlEE += '<div class="card bg-light d-flex flex-fill">';
            htmlEE += '<div class="card-body">';
            htmlEE += '<h5 class="card-title">' + dataee.nome_ee+ '</h5>';
            htmlEE += '<p class="card-text"><strong>ID:</strong> ' + dataee.id_ee + '</p>';
            htmlEE += '<p class="card-text"><strong>Email:</strong> ' + dataee.email_ee + '</p>';
            htmlEE += '<p class="card-text"><strong>Telemóvel:</strong> ' + dataee.telemovel_ee + '</p>';
            htmlEE += '<p class="card-text"><strong>Contribuinte:</strong> ' + dataee.NIF_ee + '</p>';
            if(dataee.representante==null)
              htmlEE += '<p class="card-text"><strong>Representante:</strong> Não</p>';
            else
              htmlEE += '<p class="card-text"><strong>Representante:</strong> Sim</p>';
            htmlEE += '</div>';
            htmlEE += '</div>';
            // Adicione as cards à div da tab
            $('#EE_tab').empty().append(htmlEE);            
          }    
        });
        
      // Desmarcar todas as checkboxes Medidas
      $('input[type="checkbox"]').prop('checked', false);
        $.ajax({
      url: '/medidas_alunos/index/' + data.id_aluno,
      type: 'GET',
      dataType: 'json',
      success: function (response) {
        // Marque as checkboxes correspondentes aos registros retornados
        response.registros.forEach(function (registro) {
            $('#medidasCheckbox' + registro.medidaDL54_id).prop('checked', true);
        });
      },
      error: function (xhr, status, error) {
        console.error(error);
        }
      });


             
      // Desmarcar todas as checkboxes Dificuldades
      $('input[type="checkbox"]').prop('checked', false);
        $.ajax({
      url: '/alunodisciplina/index/' + data.id_aluno,
      type: 'GET',
      dataType: 'json',
      success: function (response) {
        // Marque as checkboxes correspondentes aos registros retornados
        response.registros.forEach(function (registro) {
            $('#customSwitch' + registro.disciplina_id).prop('checked', true);
        });
      },
      error: function (xhr, status, error) {
        console.error(error);
        }
      });


      $("#foto_aluno").attr("src", "../../img/alunos/"+data.num_E360);
      $("#username").text(data.id_aluno);
      $("#alterar").text(data.num_E360);
      $("#data_nascimento").text(data.data_nasci);
      $("#telemovel").text(data.telemovel);
      $("#NIF").text(data.NIF);
      $("#email_aluno").text(data.email).href = "mailto:"+data.email;
      $('#aluno_id').val(data.id_aluno);
      $("#info-header-aluno").text(data.nome_aluno);  
    }    
  }); 



  var id_turma = "<?php echo $idturma; ?>";
    $.ajax({
      url: "/turmadisciplina/getDisciplinaDetalhes/" + id_turma,
      type: "POST",
      dataType: "json",
      success: function(data) {
        var cards = '<div class="row">';
        cards += '<div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column">';
        cards += '<p class="text-center ">Disciplinas em que o aluno tem dificuldades:</p>';
        
        
        data.forEach(function(turmaDisciplina) {
          cards += '<div class="form-group">'; 
            cards += '<div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">';
              cards += '<div class="card bg-light d-flex flex-fill">';
                cards += '<div class="card-header text-muted border-bottom-0">Disciplina: ' + turmaDisciplina.nomedisc+turmaDisciplina.id_disciplina+ '</div>';
                cards += '<div class="card-body pt-0">';
                                                                    
                    cards += '<div class="custom-control custom-switch">';
                    cards += '<input class="custom-control-input" type="checkbox"  id="customSwitch'+turmaDisciplina.id_disciplina+'" onclick=updateDisciplina('+turmaDisciplina.id_disciplina+')>'; 
                    cards += '<label class="custom-control-label" for="customSwitch'+turmaDisciplina.id_disciplina+'">Ative para assinalar</label>';                    
                    cards += '</div>';                                   
                cards += '</div>';              
              
            cards += '</div>';
            cards += '</div>';
          cards += '</div>';  
        });
        
        cards += '</div>';
        cards += '</div>';
        $('#Aval_tab').html(cards);
      }
    }); 




}

///////////////////////////////FUNCTION INSERIR DIFICULDADES

function updateDisciplina(checkbox) {
        var disciplinaId = checkbox; //
        console.log($(this));
        var alunoId = $('#aluno_id').val(); // Substitua pelo valor correto do ID do aluno

        if ($('#customSwitch'+checkbox).is(':checked')) {
          
            // Se a checkbox estiver marcada, inserir o registro
            $.ajax({
                url: '<?= base_url('alunodisciplina/atualizar') ?>',
                method: 'POST',
                data: {
                    idalunodisciplina: 0, // Deixe 0 para inserção
                    disciplina_id: disciplinaId,
                    aluno_id: alunoId
                },
                success: function (response) {
                    console.log(response);
                    console.log('Dificuldade inserida com sucesso');
                    // Tratar a resposta do servidor (opcional)
                }
            });
        } else {
          //  Se a checkbox estiver desmarcada, excluir o registro
            $.ajax({
                url: '<?= base_url('alunodisciplina/delete') ?>',
                method: 'POST',
                data: {
                    aluno_id: alunoId,
                    disciplina_id: disciplinaId
                },
                success: function (response) {
                    console.log(response);
                    console.log('Dificuldade removida com sucesso');
                    // Tratar a resposta do servidor (opcional)
                }
            });
        }
    }



 ///////////////////////////////FUNCTION INSERIR MEDIDAS SELETIVAS

// Seletor para os checkboxes das medidas
var checkboxes = $('input[type="checkbox"]');
console.log(checkboxes);
// Manipulador do evento de alteração dos checkboxes
checkboxes.change(function () {
    // Verifique se o checkbox está marcado
    if ($(this).is(':checked')) {
        var idMedidaAluno = $(this).attr('id').replace('medidasCheckbox', '');
        var medidaDL54Id = $(this).val();
        var alunoId = $('#aluno_id').val();

        // Faça a chamada Ajax para atualizar/adicionar os registros
        $.ajax({
            url: '/medidas_alunos/atualizar',
            type: 'POST',
            dataType: 'json',
            data: {
                id_medidaaluno: idMedidaAluno,
                medidaDL54_id: medidaDL54Id,
                aluno_id: alunoId
            },
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
});




      ////////////////FUNCTION INSERIR ALUNO NA TURMA
    function save(id_turmaaluno) {
      // reset the form 
      $("#data-form")[0].reset();
      $(".form-control").removeClass('is-invalid').removeClass('is-valid');
      if (typeof id_turmaaluno === 'undefined' || id_turmaaluno < 1) { //add
        urlController = '<?= base_url("turmaluno/add") ?>';
        submitText = '<?= lang("App.save") ?>';
        $('#model-header').removeClass('bg-info').addClass('bg-success');
        $("#info-header-modalLabel").text('<?= lang("App.add") ?>');
        $("#form-btn").text(submitText);
        $('#data-modal').modal('show');
      
      } else { //edit
        urlController = '<?= base_url($controller . "/edit") ?>';
        submitText = '<?= lang("App.update") ?>';
        $.ajax({
          url: '<?php echo base_url($controller . "/getOne") ?>',
          type: 'post',
          data: {
            id_turmaaluno: id_turmaaluno
          },
          dataType: 'json',
          success: function(response) {
            $('#model-header').removeClass('bg-success').addClass('bg-info');
            $("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
            $("#form-btn").text(submitText);
            $('#data-modal').modal('show');
            //insert data to form
            $("#data-form #id_turmaaluno").val(response.id_turmaaluno);
            $("#data-form #anoletivo_id").val(response.anoletivo_id);
            $("#data-form #turma_id").val(response.turma_id);
            $("#data-form #num_interno").val(response.id_aluno);

          }
        });
      }
      $.validator.setDefaults({
        highlight: function(element) {
          $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element) {
          $(element).removeClass('is-invalid').addClass('is-valid');
        },
        errorElement: 'div ',
        errorClass: 'invalid-feedback',
        errorPlacement: function(error, element) {
          if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
          } else if ($(element).is('.select')) {
            element.next().after(error);
          } else if (element.hasClass('select2')) {
            //error.insertAfter(element);
            error.insertAfter(element.next());
          } else if (element.hasClass('selectpicker')) {
            error.insertAfter(element.next());
          } else {
            error.insertAfter(element);
          }
        },
        submitHandler: function(form) {
          var form = $('#data-form');
          $(".text-danger").remove();
          $.ajax({
            // fixBug get url from global function only
            // get global variable is bug!
            url: getUrl(),
            type: 'post',
            data: form.serialize(),
            cache: false,
            dataType: 'json',
            beforeSend: function() {
              $('#form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
            },
            success: function(response) {
              if (response.success === true) {
                Swal.fire({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  title: response.messages,
                  showConfirmButton: false,
                  timer: 1500
                }).then(function() {
                  $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                  $('#data-modal').modal('hide');
                })
              } else {
                if (response.messages instanceof Object) {
                  $.each(response.messages, function(index, value) {
                    var ele = $("#" + index);
                    ele.closest('.form-control')
                      .removeClass('is-invalid')
                      .removeClass('is-valid')
                      .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
                    ele.after('<div class="invalid-feedback">' + response.messages[index] + '</div>');
                  });
                } else {
                  Swal.fire({
                    toast: false,
                    position: 'bottom-end',
                    icon: 'error',
                    title: response.messages,
                    showConfirmButton: false,
                    timer: 3000
                  })

                }
              }
              $('#form-btn').html(getSubmitText());
              location.reload(); //Reload após edição
            }
            
          });
          return false;
        }
      });

      $('#data-form').validate({

        //insert data-form to database

      });
    }
        ////////////////////APAGAR  ////////////////REMOVER ALUNO DA TURMA

    function remove(id_turmaprofessor) {
      Swal.fire({
        title: "<?= lang("App.remove-title") ?>",
        text: "<?= lang("App.remove-text") ?>",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<?= lang("App.confirm") ?>',
        cancelButtonText: '<?= lang("App.cancel") ?>'
      }).then((result) => {

        if (result.value) {
          $.ajax({
            url: '<?php echo base_url($controller . "/remove") ?>',
            type: 'post',
            data: {
              id_turmaprofessor : id_turmaprofessor
            },
            dataType: 'json',
            success: function(response) {

              if (response.success === true) {
                Swal.fire({
                  toast:true,
                  position: 'top-end',
                  icon: 'success',
                  title: response.professores,
                  showConfirmButton: false,
                  timer: 1500
                }).then(function() {
                  $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                })
              } else {
                Swal.fire({
                  toast:false,
                  position: 'bottom-end',
                  icon: 'error',
                  title: response.professores,
                  showConfirmButton: false,
                  timer: 3000
                })
              }
            }
          });
        }
      })
    }
  </script>


<?= $this->endSection() ?>
