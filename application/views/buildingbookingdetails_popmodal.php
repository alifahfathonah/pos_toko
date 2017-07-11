<style media="screen">
  #img_preview {
    width: 200px;
    height: auto;
  }
</style>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Form Booking</h4>
</div>
<div class="modal-body">
  <div class="row">
      <div class="col-md-12">
          <div class="portlet light">
              <div class="portlet-title tabbable-line">
                  <div class="caption caption-md">
                      <i class="icon-globe theme-font hide"></i>
                      <span class="caption-subject font-blue-madison bold uppercase">Profile Booking</span>
                  </div>
              </div>
              <form id="formbookingdetail">
                <div class="portlet-body">
                  <div class="tab-content">
                      <!-- PERSONAL INFO TAB -->
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" placeholder="" class="form-control" value="<?php echo $building_booking_details->customer_name?>" readonly/>
                        <input type="hidden" name="customer_id" value="<?php echo $building_booking_details->customer_id?>"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" placeholder="" class="form-control" value="<?php echo $building_booking_details->customer_email?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <input type="text" placeholder="" class="form-control" value="<?php echo $building_booking_details->customer_address?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">GOR</label>
                        <input type="text"class="form-control" value="<?php echo $building_booking_details->branch_name?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Lapangan</label>
                        <input type="text" class="form-control" value="<?php echo $building_booking_details->building_name?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal</label>
                        <input type="text" class="form-control" value="<?php echo $building_booking_details->building_booking_date_for?>" readonly/>
                    </div>
                    <div class="form-group">
                      <label for="">Jam Booking</label>
                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" class="form-control" value="<?php echo $building_booking_details->building_booking_time_1?>.00" readonly/>
                        </div>
                        <div class="col-md-6">
                          <input type="text" class="form-control" value="<?php echo $building_booking_details->building_booking_time_2?>.00" readonly/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Upload Image Bukti Pembayaran</label>
                      <br>
                      <?php $img = isset($building_booking_details->building_bukti_img) ? $building_booking_details->building_bukti_img : "img_not_found.png";?>
                      <img src="<?php echo base_url('assets/img/bukti_booking/'.$img)?>" alt="" id="img_preview">
                      <input type="file" name="i_img" value="" onchange="readURL(this);">
                      <?php echo $img ?>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">ACCEPT</button>
</div>
</form>
