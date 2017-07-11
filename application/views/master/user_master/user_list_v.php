<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
	<div class="page-bar">
		<?php echo $title_page;?>
	</div>
	  <div class="row">
			<div class="col-md-12">
				<div class="portlet light bordered">
						<div class="portlet-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center" style="width:5%;">No.</th>
                    <th class="text-center">User Name</th>
                    <th class="text-center">User Type</th>
                    <th class="text-center">Config.</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($users->result() as $row) {?>
                      <tr>
                        <td class="text-center"><?php echo $no; ?></td>
                        <td><?php echo $row->user_name; ?></td>
                        <td><?php echo $row->user_type_name; ?></td>
                        <td class="text-center">
                          <a href="<?php echo base_url('user_form_edit/'.$row->user_id)?>" class="btn btn-success">
                            <i class="fa fa-edit"></i> Edit
                          </a>
                          <a href="javascript:void(0)" class="btn btn-danger"
                          onclick="confirm_delete(<?php echo $row->user_id?>, 'User_c/user_delete/')">
                            <i class="fa fa-trash-o"></i> Delete
                          </a>
                        </td>
                      </tr>
                    <?php
										$no++;
									}?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="4">
                      <a href="<?php echo base_url($action)?>" class="btn btn-primary">
                        Tambah User
                      </a>
                    </td>
                  </tr>
                </tfoot>
              </table>
						</div>
					</div>
		</div>
	  </div>
