<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Form Login</h4>
</div>
<form id="formloginCust" class="" action="index.html" method="post">
  <div class="modal-body">
    <div class="form-group">
      <label for="">Nama</label>
      <input type="text" class="form-control" name="i_username" value="">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" name="i_email" value="">
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" name="button" class="btn btn-primary" onclick="loginCustomer()">Log In</button>
    <button type="button" name="button" class="btn btn-danger"  data-dismiss="modal">Batal</button>
  </div>
</form>
<script type="text/javascript">
  function loginCustomer()
  {
    var url = "<?php echo base_url()?>Customer_interface_c/checkcustomerlogin";
    $.ajax({
          type      : "POST",
          url       : url,
          data      : $("#formloginCust").serialize(), // serializes the form's elements.
          dataType  : "json",
          success: function(data)
          {
            if (data.status = '200') {
              window.open("<?php echo base_url()?>customerformdetail/"+data.customer_id);
              $('#logincustomer_popmodal').modal('hide');
            } else {
              alert();
            }
          }
        });
  }
</script>
