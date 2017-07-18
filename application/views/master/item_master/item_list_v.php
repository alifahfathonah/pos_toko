

<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class="page-bar">
			<?php echo $title_page ?>
		</div>
	  <div class="row">
			<div class="col-md-12">
				<div class="portlet light bordered">
					<button class="btn sbold dark" data-toggle="modal" onclick="openFormPrintbBarcode()">
						<i class="fa fa-print"></i>&nbsp; Print Barcode
					</button>
						<div class="portlet-body">
							<table id="example2" class="table table-bordered table-hover">
									<thead>
										<tr>
										  <th class="text-center" style="width:5%;">No.</th>
											<th class="text-center">Kode Item</th>
										  <th class="text-center">Nama Item</th>
										  <th class="text-center">Harga Item</th>
										  <th class="text-center">Config.</th>
										</tr>
									</thead>
									<tbody>
									  <?php
									  $no = 1;
									  foreach ($items->result() as $row) {?>
										<tr>
										  <td class="text-center"><?php echo $no?></td>
										  <td class="text-center"><?php echo $row->item_code ?></td>
											<td><?php echo $row->item_name?></td>
										  <td class="text-center"></td>
										  <td class="text-center">
												<input type="hidden" id="parambar_<?php echo $row->item_id?>" value="0">
												<button class="btn blue-soft" type="button" id="btnprintbar<?php echo $row->item_id; ?>"
						 						data-btn-print="#printbarcheckbox_<?php echo $row->item_id; ?>" onclick="addPrintBarcode(<?php echo $row->item_id; ?>);"
						 						title="Print Barcode" data-id="<?php echo $row->item_id?>">
												<label class="mt-checkbox mt-checkbox-outline">
		                        <input type="checkbox" id="printbarcheckbox_<?php echo $row->item_id?>">
		                        <span style="background-color: #fff;"></span>
		                    </label>
												<i class="icon-plus text-center"></i>
												Add Print
											 </button>
												<a href="<?php echo base_url('Item/edit_item/'.$row->item_id)?>" class="btn btn-success">
												  <i class="fa fa-edit"></i> Edit
												</a>
												<a href="javascript:void(0)" class="btn btn-danger"
												onclick="confirm_delete(<?php echo $row->item_id?>, 'Item/delete_item/')">
												  <i class="fa fa-trash-o"></i> Delete
												</a>
										  </td>
										</tr>
									  <?php $no++;}?>
								  </tbody>
								  <tfoot>
										<tr>
										  <td colspan="5">
											<a href="<?php echo base_url($action)?>" class="btn btn-primary">
											  Tambah Item
											</a>
										  </td>
										</tr>
								  </tfoot>
							</table>
						</div>
					</div>
		</div>
	  </div>

		<div  id="modal_print_bar" class="modal fade bs-example-modal-sm" tabindex="-1"
    role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

        </div>
      </div>
    </div>

		<script type="text/javascript">
// prinpricetag end
	var barang_idprintbar = [];
	function addPrintBarcode(id){
		var print_id = $('#btnprintbar'+id).attr('data-btn-print');
		var parambar = $('#parambar_'+id).val();
		if (parambar==1) {
			$(print_id).prop('checked', false);
			$('#parambar_'+id).val(0);
			barunchecked(id)
		} else {
			$(print_id).prop('checked', true);
			$('#parambar_'+id).val(1);
			barchecked(id);
		}
	}

	function barchecked(id){
		var checkbox = {id:id};
		barang_idprintbar.push(checkbox);
	}

	function barunchecked(id){
		for (var i = 0; i < barang_idprintbar.length; i++) {
			var itemid = barang_idprintbar[i].id;
			if (itemid==id) {
				barang_idprintbar.splice(i, 1);
			}
		}
	}
// prinbar end

						function openFormPrintbBarcode(id)
						{
							var item_id = [];
							for (var i = 0; i < barang_idprintbar.length; i++) {
								item_id.push(barang_idprintbar[i].id);
							}
							$.ajax({
								type : 'POST',
								url  : $('body').data('baseurl')+'Item/printpricetagbarcode',
								data : { id : item_id},
								dataType : "html",
								success:function(data){
									$("#modal_print_bar .modal-content").html();
									$("#modal_print_bar .modal-content").html(data);
									$('#modal_print_bar').modal('show');
								}
							});
						}

		</script>
