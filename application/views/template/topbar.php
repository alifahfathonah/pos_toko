<style media="screen">
	.alert{
		display: none;
	}
</style>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" data-baseurl="<?php echo base_url()?>">
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner ">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="<?php echo base_url('admin')?>">
					<img src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/layouts/layout/img/logo.png')?>" alt="logo" class="logo-default" /> </a>
				<div class="menu-toggler sidebar-toggler">
					<span></span>
				</div>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
				<span></span>
			</a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
							<span class="badge badge-default"> 7 </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>
									<span class="bold">12 pending</span> notifications</h3>
								<a href="page_user_profile_1.html">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
									<li>
										<a href="javascript:;">
											<span class="time">just now</span>
											<span class="details">
												<span class="label label-sm label-icon label-success">
													<i class="fa fa-plus"></i>
												</span> New user registered. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">3 mins</span>
											<span class="details">
												<span class="label label-sm label-icon label-danger">
													<i class="fa fa-bolt"></i>
												</span> Server #12 overloaded. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">10 mins</span>
											<span class="details">
												<span class="label label-sm label-icon label-warning">
													<i class="fa fa-bell-o"></i>
												</span> Server #2 not responding. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">14 hrs</span>
											<span class="details">
												<span class="label label-sm label-icon label-info">
													<i class="fa fa-bullhorn"></i>
												</span> Application error. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">2 days</span>
											<span class="details">
												<span class="label label-sm label-icon label-danger">
													<i class="fa fa-bolt"></i>
												</span> Database overloaded 68%. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">3 days</span>
											<span class="details">
												<span class="label label-sm label-icon label-danger">
													<i class="fa fa-bolt"></i>
												</span> A user IP blocked. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">4 days</span>
											<span class="details">
												<span class="label label-sm label-icon label-warning">
													<i class="fa fa-bell-o"></i>
												</span> Storage Server #4 not responding dfdfdfd. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">5 days</span>
											<span class="details">
												<span class="label label-sm label-icon label-info">
													<i class="fa fa-bullhorn"></i>
												</span> System Error. </span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">9 days</span>
											<span class="details">
												<span class="label label-sm label-icon label-danger">
													<i class="fa fa-bolt"></i>
												</span> Storage server failed. </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN INBOX DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-envelope-open"></i>
							<span class="badge badge-default"> 4 </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have
									<span class="bold">7 New</span> Messages</h3>
								<a href="app_inbox.html">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="#">
											<span class="photo">
												<img src="" class="img-circle" alt=""> </span>
											<span class="subject">
												<span class="from"> Lisa Wong </span>
												<span class="time">Just Now </span>
											</span>
											<span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="photo">
												<img src="" class="img-circle" alt=""> </span>
											<span class="subject">
												<span class="from"> Richard Doe </span>
												<span class="time">16 mins </span>
											</span>
											<span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="photo">
												<img src="" class="img-circle" alt=""> </span>
											<span class="subject">
												<span class="from"> Bob Nilson </span>
												<span class="time">2 hrs </span>
											</span>
											<span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="photo">
												<img src="" class="img-circle" alt=""> </span>
											<span class="subject">
												<span class="from"> Lisa Wong </span>
												<span class="time">40 mins </span>
											</span>
											<span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="photo">
												<img src="" class="img-circle" alt=""> </span>
											<span class="subject">
												<span class="from"> Richard Doe </span>
												<span class="time">46 mins </span>
											</span>
											<span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN TODO DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-calendar"></i>
							<span class="badge badge-default"> 3 </span>
						</a>
						<ul class="dropdown-menu extended tasks">
							<li class="external">
								<h3>You have
									<span class="bold">12 pending</span> tasks</h3>
								<a href="app_todo.html">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="javascript:;">
											<span class="task">
												<span class="desc">New release v1.2 </span>
												<span class="percent">30%</span>
											</span>
											<span class="progress">
												<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">40% Complete</span>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="task">
												<span class="desc">Application deployment</span>
												<span class="percent">65%</span>
											</span>
											<span class="progress">
												<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">65% Complete</span>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="task">
												<span class="desc">Mobile app release</span>
												<span class="percent">98%</span>
											</span>
											<span class="progress">
												<span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">98% Complete</span>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="task">
												<span class="desc">Database migration</span>
												<span class="percent">10%</span>
											</span>
											<span class="progress">
												<span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">10% Complete</span>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="task">
												<span class="desc">Web server upgrade</span>
												<span class="percent">58%</span>
											</span>
											<span class="progress">
												<span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">58% Complete</span>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="task">
												<span class="desc">Mobile development</span>
												<span class="percent">85%</span>
											</span>
											<span class="progress">
												<span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">85% Complete</span>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="task">
												<span class="desc">New UI release</span>
												<span class="percent">38%</span>
											</span>
											<span class="progress progress-striped">
												<span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">38% Complete</span>
												</span>
											</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<img alt="" class="img-circle" src="<?php echo base_url('assets/metronic_v4.5.6/theme/assets/layouts/layout/img/avatar3_small.jpg')?>" />
							<span class="username username-hide-on-mobile"> Nick </span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<!-- <li>
								<a href="page_user_profile_1.html">
									<i class="icon-user"></i> My Profile </a>
							</li> -->
							<!-- <li>
								<a href="app_calendar.html">
									<i class="icon-calendar"></i> My Calendar </a>
							</li> -->
							<!-- <li>
								<a href="app_inbox.html">
									<i class="icon-envelope-open"></i> My Inbox
									<span class="badge badge-danger"> 3 </span>
								</a>
							</li> -->
							<li class="divider"> </li>
							<!-- <li>
								<a href="page_user_lock_1.html">
									<i class="icon-lock"></i> Lock Screen </a>
							</li> -->
							<li>
								<a id="#button_logout" data-toggle="modal" data-target="#myModal">
									<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- BEGIN QUICK SIDEBAR TOGGLER -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<!-- <li class="dropdown dropdown-quick-sidebar-toggler">
						<a href="javascript:;" class="dropdown-toggle">
							<i class="icon-logout"></i>
						</a>
					</li> -->
					<!-- END QUICK SIDEBAR TOGGLER -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END HEADER INNER -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                 <h4 class="modal-title">Modal title</h4>
	            </div>
							<form id="logout_form" class="" action="" method="post">
	            	<div class="modal-body">
									<div class="alert alert-danger">
	                  <strong>Info!</strong> Indicates a neutral informative change or action.
	                </div>
	                <div class="alert alert-info">
	                  <strong>Info!</strong> Indicates a neutral informative change or action.
	                </div>
									<div class="form-group">
										<label for="">User Name</label>
										<input type="text" id="username" name="username" value="" class="form-control">
									</div>
									<div class="form-group">
										<label for="">Password</label>
										<input type="password" id="password" name="password" value="" class="form-control">
									</div>
								</div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                <button type="submit" class="btn btn-primary">Submit</button>
		            </div>
							</form>
		        </div>
		        <!-- /.modal-content -->
		    </div>
		    <!-- /.modal-dialog -->
		</div>
	</div>
	<script type="text/javascript">
		$("#logout_form").submit(function(e) {

				var url = '<?php echo site_url('auth/check_login')?>'; // the script where you handle the form input.

				$.ajax({
							 type: "POST",
							 url: url,
							 data: $("#logout_form").serialize(), // serializes the form's elements.
							 success: function(data)
							 {
									 logout_response(data)
							 },
							 error : function (data) {
							 		 alert("Error !!");
							 }
						 });

				e.preventDefault(); // avoid to execute the actual submit of the form.
		});

		function logout_response(data)
		{
			if (data == 1) {
				$(".alert-danger").fadeOut();
				setTimeout(function(){ $(".alert-info").fadeIn(); }, 800);
				setTimeout(function(){ window.location.href = '<?php echo base_url('Auth/logout')?>'; }, 1500);
			} else {
				$(".alert-danger").fadeIn();
				$('#username').val('');
				$('#password').val('');
			}
		}

	</script>
