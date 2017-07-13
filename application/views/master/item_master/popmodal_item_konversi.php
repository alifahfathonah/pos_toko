<div class="modal-header">
  <h4 class="modal-title" id="gridSystemModalLabel">Form Konversi Item</h4>
</div>
<form id="formAdd" class="form-horizontal">
  <div class="modal-body">
      <div class="form-body">
        <input type="hidden" id="item_id" name="item_id" value="">
        <input type="hidden" id="item_konversi_id" name="item_konversi_id" value="">
        <input type="hidden" id="item_satuan_utama" name="item_satuan_utama" value="">
        <input type="hidden" id="i_action" name="" value="<?php echo $action?>">
        <div class="form-group">
          <label class="control-label col-md-4">Satuan utama
          </label>
          <div class="col-md-8">
            <div class="input-icon right">
              <i class="fa"></i>
              <input type="text" id="item_satuan_utama_nama" name="" class="form-control" value="" disabled/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4">Jumlah Satuan Utama
          </label>
          <div class="col-md-8">
            <div class="input-icon right">
              <i class="fa"></i>
              <input type="text" id="item_satuan_utama_jml" name="item_satuan_utama_jml" class="form-control" required/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4">Satuan Konversi
          </label>
          <div class="col-md-8">
            <div class="input-icon right">
              <i class="fa"></i>
              <select id="item_satuan" name="item_satuan" class="form-control select2"></select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4">Jumlah Konversi
          </label>
          <div class="col-md-8">
            <div class="input-icon right">
              <i class="fa"></i>
              <input type="text" id="item_konversi_jml" name="item_konversi_jml" class="form-control" required/>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="modal-footer">
    <button type="submit" name="button" class="btn btn-primary"> Simpan </button>
    <button type="button" name="button" class="btn btn-danger" data-dismiss="modal"> Batal </button>
  </div>
</form>
<script type="text/javascript">
</script>
