<?php 
$this->extend('dashboard/layout/dashboard-layout');
$this->section('content');
?>


<!-- Main content -->
<div class="card">

        <!-- /.card-header -->
        <div class="card-body">
          <table id="data_table" class="table table-bordered table-striped">
            <thead>
              <tr>
              <th>Nome da disciplina</th>
              <th>Carga horária</th>
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





<?= $this->endSection() ?>
<!-- /.content -->


<!-- page script -->
<?= $this->section("pageScript") ?>
<script>


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
      "responsive": false,
      "ajax": {
        "url": '<?php echo base_url($controller . "/getAllprofissional") ?>',
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



</script>



<?= $this->endSection() ?>
