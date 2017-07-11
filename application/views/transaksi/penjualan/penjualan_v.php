<style media="screen">
  #item_detail > .box-body{
    height: 600px;
    margin: 10px;
  }
  h2 {
      font-family: cursive;
  }
  .item_img{
    width: 100%;
    padding: 20px;
    border: 2px solid;
    max-height: 200px;
    border-color: rgba(183, 189, 188, 0.41);
  }
  #item_detail_form{
    display: none;
  }
</style>
<section class="content" id="input_content">
  <div class="row">
    <div class="col-md-6">
      <form class="" action="index.html" method="post">
        <div class="box">
          <div class="row">
            <div class="box-body">
              <div class="col-md-6">
                <label for="">Tanggal</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" value="<?php echo $tanggal?>">
                </div>
                <div class="form-group">
                  <label for="">Nama Item</label>
                  <select class="form-control js-example-basic-single" id="i_item_id" name="i_item_id" onchange="item_detail()">
                    <option value="0"></option>
                    <?php foreach ($items->result() as $r_item): ?>
                      <option value="<?php echo $r_item->item_id?>">
                        <?php echo $r_item->item_name?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="box" id="item_detail">
        <div class="box-body">

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box">
        <div class="box-body">
          <table id="tb_widget" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width:5%;text-align:center;">No.</th>
                <th>Nama Item</th>
                <th>Harga Item</th>
                <th>Qty.</th>
                <th>Total Harga Item</th>
              </tr>
            </thead>
            <tbody id="tb_widget-tbody">
              <tr>
                <td colspan="5" style="text-align:center;">Kosong</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  function item_detail(){
    var i_item_id = $('#i_item_id').val();
    var url        = "Penjualan_c/item_detail";
    var site_url   = "<?php echo site_url()?>"+url;

    $.ajax({
          type: "POST",
          url: site_url,
          data: {i_item_id:i_item_id},
          dataType: "json",
          cache:false,
          success:
               function(data){
                 item_detail_form(data);
               },
           error:
            function(){
              alert("Stock Item Error !!!");
              $('#item_detail').html('\
              <div class="box-body">\
                  <div class="col-md-8 col-md-offset-2">\
                  </div>\
              </div>\
                ');
            }
          })
  }

  function item_detail_form(data){
    var path = "<?php echo base_url('assets/img/items/')?>";
    $('#item_detail').empty();
    $('#item_detail').append('\
    <div class="box-body">\
      <form id="add_item">\
        <div class="col-md-8 col-md-offset-2">\
          <center id="item_detail_form">\
            <h2>'+data.item_name+'</h2>\
            <img src="'+path+'/'+data.item_img+'" class="item_img"/>\
            <div class="form-group">\
              <h2>'+format_rupiah(data.item_harga_jual)+',00</h2>\
            </div>\
            <div class="form-group">\
              <h2>Qty.</h2>\
              <input type="hidden" name="i_item_id" value="'+data.item_id+'"/>\
              <input type="hidden" name="i_item_harga_jual" value="'+data.item_harga_jual+'"/>\
              <input type="textarea" class="form-control number_only" id="i_qty_currency" name="i_qty_currency" onkeyup="number_currency(this);"/>\
              <input type="hidden" class="form-control" id="i_qty" name="i_qty"/>\
              <button type="button" class="btn btn-primary" onclick="add_item()">Simpan</button>\
            </div>\
          <center>\
        </div>\
      </div>\
    </div>\
    ');
    animate_show();
  }

  function animate_show(){
    $( "#item_detail_form" ).first().show( 500, function showNext() {
      $( this ).next( "#item_detail_form" ).show( 500, showNext );
    });
  }

  function add_item(){

    var url        = "Penjualan_c/save_penjualan_tmp";
    var site_url   = "<?php echo site_url()?>"+url;
		$.ajax({
					 type    : "POST",
					 url     : site_url,
					 data    : $("#add_item").serialize(),
					 success : function(data)
					 {
             $('#item_detail_form').empty();
             add_widget_item();
           }
				 });
  }

  function add_widget_item(){
    $('#tb_widget').append('adadasdasd');
  }

</script>
