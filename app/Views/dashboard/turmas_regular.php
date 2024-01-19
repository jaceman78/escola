<?php

use App\Controllers\Anoletivo;

$this->extend('dashboard/layout/dashboard-layout');
$this->section('content');
?>


<!-- Main content -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-8 mt-2">
              <h3 class="card-title">Turmas</h3>
            </div>
            <div class="col-2">
              <select id="anoletivofiltro_id" name="anoletivo_id" class="form-select float-left" required>   </select>
              </div>
               <div class="col-2">
              <button type="button" class="btn float-right btn-success" onclick="save()" title="<?= lang("App.new") ?>"> <i class="fa fa-plus"></i>   <?= lang('App.new') ?></button>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="data_table" class="table table-bordered table-striped">
            <thead>
              <tr>
              <th>Id turma</th>
              <th>Ano Escolar</th>
              <th>Nome</th>
              <th>Ano Letivo</th>
              <th>Tipologia</th>
			        <th></th>
              </tr>
            </thead>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
     



<!-- /Main content -->

<!-- ADD modal content -->
<div id="data-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="text-center bg-info p-3" id="model-header">
        <h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
      </div>
      <div class="modal-body">
        <form id="data-form" class="pl-3 pr-3">
          <div class="row">
          <input type="hidden" id="id_turma" name="id_turma" class="form-control" placeholder="Id turma" maxlength="11" required>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="ano" class="col-form-label"> Ano Escolar: </label>
									<input type="number" id="ano" name="ano" class="form-control" placeholder="Ano Escolar" minlength="0"  maxlength="11" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="nome" class="col-form-label"> Nome: </label>
									<input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" minlength="0"  maxlength="63" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="anoletivo_id" class="col-form-label"> Ano Letivo: <span class="text-danger">*</span> </label>
									<select id="anoletivo_id" name="anoletivo_id" class="form-select" required>

                                    
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="tipologia_id" class="col-form-label"> Tipologia: <span class="text-danger">*</span> </label>
									<select id="tipologia_id" name="tipologia_id" class="form-select" required>
										<option value="select1">select1</option>
										<option value="select2">select2</option>
										<option value="select3">select3</option>
									</select>
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



<?= $this->endSection() ?>
<!-- /.content -->


<!-- page script -->
<?= $this->section("pageScript") ?>
<script>

// Inicio - preenchimento dos selects
$.get('/obter-dados-anoletivo', function (data) {
  var options = '';
  
    $.each(data, function (i, item) {          
      options += data[i] + '">' + data[i+1] ;
                    i++;
    });

    $('#anoletivofiltro_id').html(options);
});


$.get('/obter-dados-anoletivo', function (data) {
  var options = '';  
    $.each(data, function (i, item) {          
      options += data[i] + '">' + data[i+1] ;
                    i++;
    });

    $('#anoletivo_id').html(options);
});

$.get('/obter-dados-tipologia', function (data) {
    var options =  '<option value="1">Regular</option>';
  
    // $.each(data, function (i, item) {     
    //   options += data[i] + '">' + data[i+1] ;
    //                 i++;
    // });

    $('#tipologia_id').html(options);
});

// Fim - preenchimento dos selects


  // dataTables
  $(function() {
    var table = $('#data_table').removeAttr('width').DataTable({
      "language":{
        "url": "https://cdn.datatables.net/plug-ins/1.13.2/i18n/pt-PT.json"
      },
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "scrollY": '45vh',
      "scrollX": true,
      "scrollCollapse": false,
      "responsive": true,
      "ajax": {
        "url": '<?php echo base_url($controller . "/getAllregular") ?>',
        "type": "POST",
        "dataType": "json",
        async: "true"
      }
    });


    $("#anoletivofiltro_id").on("change", function(){ 
      $myurl ='<?php echo base_url($controller . "/getAllporAnoletivo") ?>/'
       $myurl +=$(this).val();
       $myurl+='/<?=$tipologia?>';

      table.ajax.url($myurl).load();
    });
  });

  var urlController = '';
  var submitText = '';

  function getUrl() {
    return urlController;
  }

  function getSubmitText() {
    return submitText;
  }

  function save(id_turma) {
    // reset the form 
    $("#data-form")[0].reset();
    $(".form-control").removeClass('is-invalid').removeClass('is-valid');
    if (typeof id_turma === 'undefined' || id_turma < 1) { //add
      urlController = '<?= base_url($controller . "/add") ?>';
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
          id_turma: id_turma
        },
        dataType: 'json',
        success: function(response) {
          $('#model-header').removeClass('bg-success').addClass('bg-info');
          $("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
          $("#form-btn").text(submitText);
          $('#data-modal').modal('show');
          //insert data to form
          $("#data-form #id_turma").val(response.id_turma);
          $("#data-form #ano").val(response.ano);
          $("#data-form #nome").val(response.nome);
          $("#data-form #anoletivo_id").val(response.anoletivo_id);
          $("#data-form #tipologia_id").val(response.tipologia_id);

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
                  position: 'top-center',
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

    $('#data-form').validate({

      //insert data-form to database

    });
  }

  
function exportar(id_turma){

  Swal.fire({
      title: "Exportar dados da turma",
      text: 'Vai exportar os dados da turma para o ano letivo seguinte. Deseja continuar?' <?php $id_turma?> ,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',

      confirmButtonText: '<?= lang("App.confirm") ?>',
      cancelButtonText: '<?= lang("App.cancel") ?>'
    }).then((result) => {

      if (result.value) {
        $.ajax({
          url: '<?php echo base_url($controller . "/exportar") ?>',
          type: 'post',
          data: {
            id_turma : id_turma
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
                timer: 3000
              }).then(function() {
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
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

  function remove(id_turma) {
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
            id_turma : id_turma
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
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
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
</script>


<?= $this->endSection() ?>
