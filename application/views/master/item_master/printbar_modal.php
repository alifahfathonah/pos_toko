<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title"></h4>
</div>
  <div class="modal-body">
    <center>
      <label for="">Jumlah Print Bar</label>
      <input type="number" id="print_qtybar" class="form-control" name="" value="">
    </center>
  </div>
  <div class="modal-footer">
    <button id="btn-print" type="button" class="btn btn-primary">Print</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
  </div>

<script type="text/javascript">

  $('#btn-print').on('click', function(){
    var barang_id = "<?php echo $barang?>";
    var barang_id = encodeURI(barang_id);
    var print_qty = $('#print_qtybar').val();
    window.open("<?php echo base_url()?>Item/printBarcode/"+barang_id+"/"+print_qty);
    $('#modal_print_bar').modal('hide');
    var barang_idarr = barang_id.split(".");
    for (var i = 0; i < barang_idarr.length; i++) {
      var print_id = $('#btnprintbar'+barang_idarr[i]).attr('data-btn-print');
      var parambar = $('#parambar_'+barang_idarr[i]).val();
      $(print_id).prop('checked', false);
			$('#parambar_'+id).val(0);
      barunchecked(barang_idarr[i]);
    }
  });
</script>
