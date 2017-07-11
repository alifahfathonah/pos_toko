
<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class="page-bar">
			<?php echo $title_page ?>
		</div>
	  <div class="row">
			<div class="col-md-12">
				<div class="portlet light bordered">
						<div class="portlet-body">
              <table id="datatable_1" class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_2">
                <thead>
                  <tr>
                    <th class="text-center" style="width:5%;">No.</th>
                    <th class="text-center">customer Name</th>
                    <th class="text-center">customer Phone</th>
                    <th class="text-center">customer Address</th>
                    <th class="text-center">Config.</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($customers->result() as $row) {?>
                    <tr>
                      <td><?php echo $no?></td>
                      <td><?php echo $row->customer_name?></td>
                      <td class="text-center"><?php echo $row->customer_phone?></td>
                      <td class="text-center"><?php echo $row->customer_address?></td>
                      <td class="text-center">
                        <a href="<?php echo base_url('Customer/edit_customer/'.$row->customer_id)?>" class="btn btn-success">
                          <i class="fa fa-edit"></i> Edit
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger"
                        onclick="confirm_delete(<?php echo $row->customer_id?>, 'Customer/delete_customer/')">
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
                      Tambah customer
                    </a>
                    </td>
                  </tr>
                  </tfoot>
							</table>
						</div>
					</div>
		  </div>
	  </div>
