
<div class="page-content">
  <h3 class="page-title"> Payment Form
      <small>save transactions</small>
  </h3>
  <div class="row">
    <div class="col-md-12">
      <div class="portlet light bordered">
        <div class="portlet-body form">
          <div class="portlet-body form">
            <div class="row">
              <div class="portlet-title">
                <form id="formbookpayment" class="form-horizontal" action="" method="post">
                  <div class="col-md-8 col-md-offset-2">
                    <div class="form-body">
                      <div class="form-group">
                        <label class="col-md-3 control-label">Cabang</label>
                        <div class="col-md-9">
                          <select id="i_branch" name="i_branch" class="form-control select2" required></select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Tanggal</label>
                        <div class="col-md-9">
                          <input type="text" id="i_tanggal" name="i_tanggal" class="form-control" value="<?php echo date("d-m-Y")?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Kode</label>
                        <div class="col-md-9">
                          <div class="col-md-10" style="padding-left: 0px;">
                            <div class="input-icon right">
                              <select id="i_code" name="i_code" class="form-control"></select>
                            </div>
                          </div>
                          <div class="col-md-2">
                              <button type="button" id="btnAddBarang" class="btn sbold dark" onclick="addBooking()">
                                <i class="icon-plus"></i>
                              </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-md-12" style="display: none;">
                         <table class="table table-striped table-bordered table-hover table-checkable order-column"
                         id="default-table2">
                             <thead>
                                 <tr>
                                     <th class="text-center"> No </th>
                                     <th class="text-center"> GOR </th>
                                     <th class="text-center"> Field </th>
                                     <th class="text-center"> Harga </th>
                                     <th class="text-center"> Tanggal Transaksi </th>
                                     <th class="text-center"> Tanggal Booking </th>
                                     <th class="text-center"> Jam start </th>
                                     <th class="text-center"> Jam Akhir </th>
                                 </tr>
                             </thead>
                             <tbody>
                             </tbody>
                             <tfoot>
                               <tr>
                                   <td style="font-size: 18px;text-align: right;padding-right: 10px;" colspan="5"><b> TOTAL </b></td>
                                   <td style="font-size: 18px;text-align: right;padding-right: 10px;" colspan="3">
                                     <div class="" id="divtotal">
                                       <input type="hidden" id="i_total" name="i_total" value="">
                                     </div>
                                   </td>
                               </tr>
                               <tr>
                                   <td style="font-size: 18px;text-align: right;padding-right: 10px;" colspan="5"><b> BAYAR </b></td>
                                   <td style="font-size: 18px;text-align: right;padding-right: 10px;" colspan="3">
                                     <div class="" id="divbayar">
                                       <input type="textarea" id="i_bayar_currency" name="i_bayar_currency" class="number_only text-right"
                                       value="0" onkeyup="number_currency(this);getChange()" style="border: none;">
                                       <input type="hidden" id="i_bayar" name="i_bayar" value="">
                                     </div>
                                   </td>
                               </tr>
                               <tr>
                                   <td style="font-size: 18px;text-align: right;padding-right: 10px;" colspan="5"><b> KEMBALIAN </b></td>
                                   <td style="font-size: 18px;text-align: right;padding-right: 10px;" colspan="3">
                                     <div class="" id="divchange">
                                       <input type="textarea" id="i_change_currency" name="i_change_currency" class="number_only text-right"
                                       value="0" onkeyup="number_currency(this);" style="border: none;" readonly="true">
                                       <input type="hidden" id="i_change" name="i_change" value="">
                                     </div>
                                   </td>
                               </tr>
                               <tr>
                                 <td colspan="8" style="text-align: right;">
                                   <button type="submit" name="button" class="btn btn-primary">Simpan</button>
                                   <a href="<?php echo base_url($action_close)?>" class="btn btn-danger">Keluar</a>
                                 </td>
                               </tr>
                             </tfoot>
                         </table>
                     </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  $(document).ready(function() {
    var base_url = '<?php echo base_url();?>';
    var branch_selected = '<?php echo $branch_active;?>';
    // $('#i_code').select2('destroy');
    $.ajax({
      type      : "get",
      dataType  : "json",
      url       : base_url+"Ruangan_c/get_branch",
      success   : function(data){
        $('#i_branch').empty();
        $('#i_branch').select2('destroy');
        $('#i_branch').append('\
          <option value="0"> </option>');

        for (var i = 0; i < data.length; i++) {
          var selected = '';
          if (branch_selected==data[i].branch_id) {
            selected = 'selected';
          }
          $('#i_branch').append('\
            <option value="'+data[i].branch_id+'" '+selected+'>'+data[i].branch_name+'</option>\
          ');
        }
        $('#i_branch').select2();
        $('#i_code').select2();

      },
      error     : function(data){
        alert('error');
      }
    });
  });

  $(function(){

    $('#i_branch').on("select2:select", function(e) {
      var branch = $(this).val();
      select2Kode(branch);
    });

  });

  function FormatResult(data) {
    markup = '<div>'+data.text+'</div>';
    return markup;
  }

  function FormatSelection(data) {
    return data.text;
  }

  function select2Kode(branch) {
    // $('#i_code').select2('destroy');
    $('#i_code').select2({
      placeholder: 'Pilih Kode',
      multiple: false,
      allowClear: true,
      ajax: {
        url     : "<?php echo base_url();?>Payment_c/getCodePembayaran",
        dataType: 'json',
        delay: 100,
        cache: true,
        data: function (params) {
          return {
            q       : params.term, // search term
            page    : params.page,
            branch  : branch
          };
        },
        processResults: function (data, params) {
          // parse the results into the format expected by Select2
          // since we are using custom formatting functions we do not need to
          // alter the remote JSON data, except to indicate that infinite
          // scrolling can be used
          params.page = params.page || 1;

          return {
            results: data.items,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        }
      },
      escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
      minimumInputLength: 1,
      templateResult: FormatResult,
      templateSelection: FormatSelection,
    });
    // $('#i_code').select2();
  }


  function addBooking()
  {
    var kode = $('#i_code').val();
    var branch = $('#i_branch').val();

    $.ajax({
      type      : "POST",
      dataType  : "json",
      data      : {kode:kode, branch:branch},
      url       : "<?php echo base_url();?>/Payment_c/getDatabooking",
      success   : function(data){

        var table_parent = $("#default-table2").parent();
        table_parent.css('display', 'block');

        $('#default-table2 tbody').empty();
        switch (data.status) {
          case '200':
            getBookingdetail(data);
            break;
          case '204':
            geterror();
            break;
          default:

        }
      }
    });

  }

  function getBookingdetail(data)
  {
    // console.log(data.bookingDetail);
    $('#default-table2 tbody').html('');
    var no = 1;
    var total = 0;
    var totaljam = 0;
    for (var i = 0; i < data.bookingDetail.length; i++) {
      totaljam = totaljam+data.bookingDetail[i].building_booking_time_2-data.bookingDetail[i].building_booking_time_1;
      total    = total+data.bookingDetail[i].building_price*totaljam/data.bookingDetail[i].building_hour_book;
      // console.log(total);
      // console.log(data.bookingDetail[i].building_booking_code);
      $('#default-table2 tbody').html('\
      <tr>\
        <td>'+no+'</td>\
        <td class="text-center">'+data.bookingDetail[i].building_booking_code+'</td>\
        <td class="text-left">'+data.bookingDetail[i].building_bookingBuildingName+'\
        <input type="hidden" name="i_bookingcode" value="'+data.bookingDetail[i].building_booking_code+'"/>\
        <input type="hidden" name="i_building" value="'+data.bookingDetail[i].building_booking_building+'"/>\
        <input type="hidden" name="i_branch" value="'+data.bookingDetail[i].building_booking_branch+'"/>\
        </td>\
        <td class="text-left">'+data.bookingDetail[i].building_price+'</td>\
        <td class="text-center">'+data.bookingDetail[i].building_booking_date+'\
        <input type="hidden" name="tanggaltransaksi" value="'+data.bookingDetail[i].building_booking_date+'"/></td>\
        <td class="text-center">'+data.bookingDetail[i].building_booking_date_for+'</td>\
        <td class="text-center">'+data.bookingDetail[i].building_booking_time_1+':00</td>\
        <td class="text-center">'+data.bookingDetail[i].building_booking_time_2+':00</td>\
      </tr>\
      ');

      no++;
    }
    // divtotal
    // i_total
    $('#i_bayar_currency').focus();
    $('#divtotal').append(toRp(total));
    $('#i_total').val(total);

  }

  function getChange()
  {
    var total     = $('#i_total').val();
    var bayar     = $('#i_bayar').val();
    var kembalian = bayar-total;
    setTimeout(function(){
      $('#i_change').val(kembalian);
      $('#i_change_currency').val(toRp(kembalian));
    }, 500);
  }

  function geterror()
  {

  }

  $("#formbookpayment").submit(function(e) {

    var url = "<?php echo base_url()?>Payment_c/saveBookpayment"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#formbookpayment").serialize(), // serializes the form's elements.
           dataType : 'json',
           success: function(data)
           {
            //  console.log(data.id);
               window.open("<?php base_url()?>Payment_c/printbookpayment/"+data.id+"/"+data.building+"/"+data.branch);
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

</script>
