<?php 
$this->extend('dashboard/layout/dashboard-layout');
$this->section('content');
?>

<!-- Main content -->

<div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Disciplina da turma <?php echo( $ano.'º '.$nomedaturma);?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                


                  <form method="post"  id="formlist" >
                  <input type="hidden" name="turma_id" value="<?php echo($idturma); ?>">
                    <select class="duallistbox" multiple="multiple" id="duallistbox"  size="10" name="duallistbox[]">   
                     <!-- Lista das disciplinas -->
                    </select>                    
                    <button type="submit" class="btn btn-success mr-2" id="form-btn"><?= lang("App.save") ?></button>
                  </form>


                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->



<!-- /Main content -->

<script>
            // var demo1 = $('select[name="duallistbox[]"]').bootstrapDualListbox();
            // $("#formlist").submit(function() {
            //   alert($('[name="duallistbox[]"]').val());
            //   return false;
            // });
          </script>

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
novoTexto.innerText = 'Addicionar Disciplina';
novoTexto.style.paddingLeft= '1em';
// adiciona o elemento i ao elemento a
novoLink.appendChild(novoIcon);
// adiciona o elemento p ao elemento a
novoLink.appendChild(novoTexto);
// adiciona o elemento a ao elemento li
novoItem.appendChild(novoLink);
// adiciona o novo elemento li à lista existente
lista.appendChild(novoItem);    



//https://www.virtuosoft.eu/code/bootstrap-duallistbox/
$(document).ready(function() {
  var list = $('#duallistbox');
  $.ajax({
    "url": '<?php echo base_url("/disciplinas/getAllDisciplinas/".$tipo.'/'.$idturma) ?>',
    "type": "POST",
    "dataType": "json",
    "async": true,
    "success": function(data) {
      var options = '';
      $.each(data.data, function(index, value) {
        options += '<option value="' + value[0] + '">' + value[1] ;
      });
      $(list).append(options);
      $(list).bootstrapDualListbox({
        nonSelectedListLabel: 'Disciplinas disponíveis',
        selectedListLabel: 'Disciplinas selecionadas',
        //preserveSelectionOnMove: 'moved',       
        moveOnSelect: false
      });
      $(list).bootstrapDualListbox('refresh');
    },
    "error": function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus + ': ' + errorThrown);
    }
  });
});



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
        "url": '<?php echo base_url($controller . "/getAllTurmadisciplina/".$idturma) ?>',
        "type": "POST",
        "dataType": "json",
        async: "true"
      }
    });
  });

  var urlController = '';
  var submitText = '<?= lang("App.save") ?>';;

  function getUrl() {
    return urlController;
  }

  function getSubmitText() {
    return submitText;
  }


$(document).ready(function() {
  $('#formlist').submit(function(e) {
    // selectedItems = $('#duallistbox').find(':selected'); // seleciona os itens selecionados
    // var serializedData = selectedItems.serialize(); // serializa os itens selecionados

    e.preventDefault();
    $.ajax({
      url: '<?php echo base_url($controller . "/add"); ?>',
      type: 'POST',
      data: $(this).serialize(),
      //data: $(this).serialize(),
      beforeSend: function() 
            {
              $('#form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
            },
      success: function(response)
       {
        console.log(response);//ver resultados no log
        if (response.success === true)
             {
              Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              })
            }
          
             else
             {
              if (response.messages instanceof Object)
               {
                  $.each(response.messages, function(index, value) {
                  ele.after('<div class="invalid-feedback">' + response.messages[index] + '</div>');  });
              
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
  });
});


  



  function remove(id_turmadisciplina) {
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
            id_turmadisciplina : id_turmadisciplina
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
