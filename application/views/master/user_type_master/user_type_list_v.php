
<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
	<div class="page-bar">
		<?php echo $title_page; ?>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet light bordered">
					<div class="portlet-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th class="text-center" style="width:5%;">No.</th>
                  <th class="text-center">User Type Name</th>
                  <th class="text-center">Config.</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($user_type->result() as $row) {?>
                    <tr>
                      <td class="text-center"><?php echo $no?></td>
                      <td><?php echo $row->user_type_name?></td>
                      <td class="text-center">
                        <a href="<?php echo base_url('User_type_c/user_type_edit/'.$row->user_type_id)?>" class="btn btn-success">
                          <i class="fa fa-edit"></i> Edit
                        </a>
                        <a href="javascript:void(0)" class="btn btn-danger"
                        onclick="confirm_delete(<?php echo $row->user_type_id?>, 'User_type_c/user_type_delete/')">
                          <i class="fa fa-trash-o"></i> Delete
                        </a>
                      </td>
                    </tr>
                  <?$no++;}?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3">
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
	</div>
