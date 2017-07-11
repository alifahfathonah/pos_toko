Field

<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
	<div class="page-bar">
		<?php echo $title_page ?>
	</div>
	  <div class="row">
			<div class="col-md-12">
				<div class="portlet light bordered">
						<div class="portlet-body">
							<table id="datatable_1" class="table table-striped table-bordered table-hover dt-responsive" width="100%">
									<thead>
										<tr>
										  <th class="text-center" style="width:5%;">No.</th>
										  <th class="text-center">Field Name</th>
										  <th class="text-center">Field Price</th>
										  <th class="text-center">Config.</th>
										</tr>
										</thead>
										<tbody>
										  <?php
										  $no = 1;
										  foreach ($buildings->result() as $row) {?>
											<tr>
											  <td><?php echo $no?></td>
											  <td><?php echo $row->building_name?></td>
											  <td class="text-center"><?php echo $row->building_status?></td>
											  <td class="text-center">
												<a href="<?php echo base_url('lapangan_edit/'.$row->building_id)?>" class="btn btn-success">
												  <i class="fa fa-edit"></i> Edit
												</a>
												<a href="javascript:void(0)" class="btn btn-danger"
												onclick="confirm_delete(<?php echo $row->building_id?>, 'Ruangan_c/delete_ruangan/ ')">
												  <i class="fa fa-trash-o"></i> Delete
												</a>
											  </td>
											</tr>
										  <?php $no++;}?>
									  </tbody>
									  <tfoot>
										<tr>
										  <td colspan="4">
											<a href="<?php echo base_url($action)?>" class="btn btn-primary">
											  Add Field
											</a>
										  </td>
										</tr>
									  </tfoot>
							</table>
						</div>
					</div>
		</div>
	  </div>
