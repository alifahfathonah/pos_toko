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
                        <input type="hidden" name="i_id" class="form-control"
                        value="<?php echo isset($item_details->item_id) ? $item_details->item_id : ""?>">
                        <input type="text" name="i_name" class="form-control"
                        value="<?php echo isset($item_details->item_name) ? $item_details->item_name : ""?>">
                      </div>
                      <div class="form-group">
                        <label for="">Kategori</label>
                        <select class="form-control js-example-basic-single" name="i_kategori">
                          <option value="0"></option>
                          <?php foreach ($kategori_item->result() as $r_kategori): ?>
                            <option value="<?php echo $r_kategori->kategori_id?>"
                              <?php if (isset($item_details->item_kategori) ? $item_details->item_kategori : "" ==$r_kategori->kategori_id)
                              {echo 'selected';}?>>
                              <?php echo  $r_kategori->kategori_name?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Satuan Utama</label>
                        <select class="form-control js-example-basic-single" id="i_satuan" name="i_satuan">
                          <option value="0"></option>
                          <?php foreach ($satuan_item->result() as $r_satuan): ?>
                            <option value=""></option>
                            <option value="<?php echo $r_satuan->satuan_id?>"
                              <?php if (isset($item_details->item_satuan) ? $item_details->item_satuan : "" ==$r_satuan->satuan_id){echo 'selected';}?>>
                              <?php echo  $r_satuan->satuan_name?>
                            </option>
                          <?php endforeach; ?>
                        </select>
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
              <table class="table table-striped table-bordered table-hover dt-responsive" width="100%">
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
                  <tr>
                    <td style="text-align:center;width:5%;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="5">
                      <button type="button" id="button_konversi" name="button_konversi" class="btn btn-primary">Tambah Konversi</button>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="medium_modal" class="modal fade" tabindex="-1" role="dialog" style="z-index:4">
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

    // $(document).ready(function () {
    //   var number_only = $('.number_only').val();
    //   var elem_id = '#'+$('.number_only').attr('id');
    //   $(elem_id).val(toRp(number_only));
    // });

    $('#button_konversi').on('click', function(){
      $('#medium_modal').modal();
        var url = 'Item_c/popmodal_item_konversi/<?php echo $item_details->item_satuan?>';
      $('#medium_modal_content').load(url,function(result){});
    });
</script>
