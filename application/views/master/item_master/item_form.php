<style media="screen">
  #img_preview{
    width: 200px;
    height: auto;
  }
</style>
<div class="page-content">
  <div class="page-bar">
  <?php echo $title_page ?>
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Default Form</span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Actions
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-pencil"></i> Edit </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-trash-o"></i> Delete </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-ban"></i> Ban </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="javascript:;"> Make admin </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body form" id="input_content">
              <form class="" action="<?php echo base_url($action_add)?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-2 col-md-offset-2">
                      <div class="form-group">
                        <label for="">Gambar Item</label>
                        <br>
                        <?php $img = isset($item_details->item_img) ? $item_details->item_img : "img_not_found.png";?>
                        <img src="<?php echo base_url('assets/img/items/'.$img)?>" alt="" id="img_preview">
                        <input type="file" name="i_img" value="" onchange="readURL(this);">
                      </div>
                    </div>
                    <div class="col-md-8  col-md-offset-2">
                      <div class="form-group">
                        <label for="">Nama</label>
                        <input type="hidden" id="i_id" name="i_id" class="form-control"
                        value="<?php echo isset($item_details->item_id) ? $item_details->item_id : ""?>">
                        <input type="text" name="i_name" class="form-control"
                        value="<?php echo isset($item_details->item_name) ? $item_details->item_name : ""?>">
                      </div>
                      <div class="form-group">
                        <label for="">Kategori</label>
                        <select id="i_kategori" name="i_kategori" class="form-control select2"></select>
                      </div>
                      <div class="form-group">
                        <label for="">Satuan Utama</label>
                        <select id="i_satuan" name="i_satuan" class="form-control select2"></select>
                      </div>
                      <div class="form-group">
                        <label for="">Harga Pokok Produksi </label>
                        <input type="textarea" id="i_hpp_currency" name="i_hpp_currency" class="form-control number_only"
                        value="<?php echo isset($item_details->item_hpp) ? $item_details->item_hpp : "0"?>" onkeyup="number_currency(this);">
                        <input type="hidden" id="i_hpp" name="i_hpp" class="form-control" value="<?php echo isset($item_details->item_hpp) ? $item_details->item_id : ""?>">
                      </div>
                      <div class="form-group">
                        <label for="">Harga Jual</label>
                        <input type="textarea" id="i_harga_jual_currency" name="i_harga_jual_currency" class="form-control number_only"
                        value="<?php echo isset($item_details->item_harga_jual) ? $item_details->item_harga_jual : "0" ?>"  onkeyup="number_currency(this);">
                        <input type="hidden" id="i_harga_jual" name="i_harga_jual" class="form-control" value="<?php echo isset($item_details->item_harga_jual) ? $item_details->item_harga_jual : ""?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                      <button type="submit" name="button" class="btn btn-primary">Simpan</button>
                      <a href="<?php echo base_url($action_close)?>" class="btn btn-danger">Keluar</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
        <div class="portlet light bordered">
          <div class="portlet-title">
              <div class="caption font-red-sunglo">
                  <i class="icon-settings font-red-sunglo"></i>
                  <span class="caption-subject bold uppercase"> Item Convertion</span>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <table id="example2" class="table table-striped table-bordered table-hover dt-responsive" width="100%">
                <thead>
                  <tr>
                    <th style="text-align:center;width:5%;">No.</th>
                    <th style="text-align:center;">Satuan Utama</th>
                    <th style="text-align:center;">Qty</th>
                    <th style="text-align:center;">Satuan Konversi</th>
                    <th style="text-align:center;">Qty</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($qitem_konversi as $key => $value):
                ?>
                    <tr>
                      <td style="text-align:center;width:5%;"><?php echo $no ?></td>
                      <td style="text-align:center;"><?php echo $value->satuan_utama ?></td>
                      <td style="text-align:center;"></td>
                      <td style="text-align:center;"></td>
                      <td style="text-align:center;"></td>
                    </tr>
                <?php $no++; endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="5">
                      <button type="button" id="button_konversi" name="button_konversi"
                      class="btn btn-primary" onclick="addkonversi()">Tambah Konversi</button>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="medium_modal" class="modal fade" tabindex="-1" role="dialog" style="z-index:40; top: 40px;">
      <div class="modal-dialog" role="document">
        <div id="medium_modal_content" class="modal-content"  style="border-radius:0;">

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div>



<script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_preview').empty();
                $('#img_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(document).ready(function(){
      var kategori_selected = '<?php echo $item_details->item_satuan;?>';
      var item_kategori = '<?php echo $item_details->item_kategori?>';
      var item_satuan = '<?php echo $item_details->item_satuan?>';

      selectlist_global2('#i_satuan', 'Item/get_satuan', 'Pilih Satuan', item_satuan);
      selectlist_global2('#i_kategori', 'Item/get_kategori', 'Pilih Kategori', item_kategori);
    });

    function addkonversi(){
      var item_id   = document.getElementById('i_id').value;
      var paramArr  = [];
      paramArr.push( {name:'item_id', value:item_id } );
      getModalglobal(paramArr, 'Item/form_konversi', '#medium_modal');
    }

    function functionform(data){
      var item_id = document.getElementById('item_id').value = data[0].value;
      var item_satuan = document.getElementById('item_satuan_utama').value = '<?php echo $item_details->item_satuan?>';

      $('#formAdd').find('select').addClass('form-control').select2();

      var item_id   = document.getElementById('i_id').value;
      var paramArr  = [];
      paramArr.push( {name:'item_id', value:item_id }, {name:'item_satuan', value:item_satuan} );
      selectlist_global2('#item_satuan', 'Item/get_satuan', 'Pilih Satuan', null, paramArr);
      $('#item_satuan').css('width', '100%');
    }

</script>
