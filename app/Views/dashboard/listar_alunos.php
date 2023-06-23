<?php 
$this->extend('dashboard/layout/dashboard-layout');
$this->section('content');
?>


<!-- Main content -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-10 mt-2">
              <h3 class="card-title">aluno</h3>
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
              <th>N aluno</th>
                <th>Num interno</th>
                <th>Nome aluno</th>
                <th>Genero</th>
                <th>Telemovel</th>
                <th>Email</th>
                <th>Foto aluno</th>
                <th>Data nasci</th>
                <th>NIF</th>
                <th>NEE</th>
                <th>Delegado</th>

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
          <div class="col-md-12">
          <div class="form-group mb-3">
            <label for="id_aluno" class="col-form-label"> N Interno: </label>
            <input type="number" id="id_aluno" name="id_aluno" class="form-control" placeholder="Número Interno" minlength="0" maxlength="11" required>
          </div>    
          </div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="num_E360" class="col-form-label"> Num E360: </label>
									<input type="number" id="num_E360" name="num_E360" class="form-control" placeholder="Num E360" minlength="0"  maxlength="11" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="nome_aluno" class="col-form-label"> Nome aluno: </label>
									<textarea cols="40" rows="5" id="nome_aluno" name="nome_aluno" class="form-control" placeholder="Nome aluno" minlength="0"  ></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="genero" class="col-form-label"> Genero: </label>
									<input type="text" id="genero" name="genero" class="form-control" placeholder="Genero" minlength="0"  maxlength="50" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="telemovel" class="col-form-label"> Telemovel: </label>
									<input type="number" id="telemovel" name="telemovel" class="form-control" placeholder="Telemovel" minlength="0"  maxlength="11" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="email" class="col-form-label"> Email: </label>
									<input type="email" id="email" name="email" class="form-control" placeholder="Email" minlength="0"  >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="foto_aluno" class="col-form-label"> Foto aluno: </label>
									<textarea cols="40" rows="5" id="foto_aluno" name="foto_aluno" class="form-control" placeholder="Foto aluno" minlength="0"  ></textarea>
								</div>
							</div>
            <div class="col-md-12">
								<div class="form-group mb-3">
									<label for="data_nasci" class="col-form-label"> Data nasci: </label>
									<input type="date" id="data_nasci" name="data_nasci" class="form-control" dateISO="true" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="NIF" class="col-form-label"> NIF: </label>
									<input type="number" id="NIF" name="NIF" class="form-control" placeholder="NIF" minlength="0"  maxlength="11" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="ee_id" class="col-form-label"> Ee id: </label>
									<input type="number" id="ee_id" name="ee_id" class="form-control" placeholder="Ee id" minlength="0"  maxlength="11" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="NEE" class="col-form-label"> NEE: </label>
									<input type="number" id="NEE" name="NEE" class="form-control" placeholder="NEE" minlength="0"  maxlength="1" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="delegado" class="col-form-label"> Delegado: </label>
									<input type="number" id="delegado" name="delegado" class="form-control" placeholder="Delegado" minlength="0"  maxlength="1" >
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group mb-3">
									<label for="status" class="col-form-label"> Status: </label>
									<input type="number" id="status" name="status" class="form-control" placeholder="Status" minlength="0"  maxlength="11" >
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
  // dataTables
  $(function() {
    var table = $('#data_table').removeAttr('width').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "scrollY": '45vh',
      "scrollX": true,
      "scrollCollapse": false,
      "responsive": false,
      "ajax": {
        "url": '<?php echo base_url($controller . "/getAll") ?>',
        "type": "POST",
        "dataType": "json",
        async: "true"
      }
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

  function save(id_aluno) {
    // reset the form 
    $("#data-form")[0].reset();
    $(".form-control").removeClass('is-invalid').removeClass('is-valid');
    if (typeof id_aluno === 'undefined' || id_aluno < 1) { //add
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
          id_aluno: id_aluno
        },
        dataType: 'json',
        success: function(response) {
          $('#model-header').removeClass('bg-success').addClass('bg-info');
          $("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
          $("#form-btn").text(submitText);
          $('#data-modal').modal('show');
          //insert data to form
          $("#data-form #id_aluno").val(response.id_aluno);
          $("#data-form #num_E360").val(response.num_E360);
          $("#data-form #nome_aluno").val(response.nome_aluno);
          $("#data-form #genero").val(response.genero);
          $("#data-form #telemovel").val(response.telemovel);
          $("#data-form #email").val(response.email);
          $("#data-form #foto_aluno").val(response.foto_aluno);
          $("#data-form #data_nasci").val(response.data_nasci);
          $("#data-form #NIF").val(response.NIF);
          $("#data-form #ee_id").val(response.ee_id);
          $("#data-form #NEE").val(response.NEE);
          $("#data-form #delegado").val(response.delegado);
          $("#data-form #status").val(response.status);

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
          }
        });
        return false;
      }
    });

    $('#data-form').validate({

      //insert data-form to database

    });
  }



  function remove(id_aluno) {
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
            id_aluno : id_aluno
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
