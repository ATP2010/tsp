<section class="content">
<div class="box">
<div class="box-body table-responsive padding">
<div class="box-header with-border">
<table class="table table-bordered table-striped table-hover" id="mytable">
  <thead>
    <tr>
      <th>Tiket</th>
      <th>Tanggal</th>
      <th>Pelapor</th>
      <th>No Telp</th>
      <th>Divisi</th>
      <th>Perangkat</th>
      <th>Problem</th>
      <th>Status</th>
      <!-- <th>Detail</th> -->
    </tr>
  </thead>  
</table>

<div class="box-footer">
<!-- <button id="btnExport" class="btn btn-info pull-left">Export to excel</button></div> -->
</div>
</div>
</section>

<?php $nm=date("YmdHis");?>

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    $('#mytable').dataTable( {
    "order": [[0, "desc"]],
    "processing": true,
    "serverSide": true,
    "ajax": "<?php echo site_url('user/ajax_assign'); ?>",
    } );
} );
</script>
    
<script type="text/javascript">
    $(document).ready(function () {
    $("#btnExport").click(function () {
    $("#mytable").btechco_excelexport({
    containerid: "mytable"
    , datatype: $datatype.Table
    , filename: 'export_<?php echo $nm;?>'
    });
    });
    });
</script>