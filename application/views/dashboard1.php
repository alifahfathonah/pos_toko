
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="1349">0</span>
                        </div>
                        <div class="desc"> New Feedbacks </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="12,5">0</span>M$ </div>
                        <div class="desc"> Total Profit </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                    <div class="visual">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="549">0</span>
                        </div>
                        <div class="desc"> New Orders </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                    <div class="visual">
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="details">
                        <div class="number"> +
                            <span data-counter="counterup" data-value="89"></span>% </div>
                        <div class="desc"> Brand Popularity </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="portlet light bordered">
                    <div class="portlet-title tabbable-line">
                        <div class="caption">
                            <i class=" icon-social-twitter font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">Quick Actions</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_actions_pending" data-toggle="tab"> Pending </a>
                            </li>
                            <li>
                                <a href="#tab_actions_completed" data-toggle="tab"> Completed </a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="scrolling tab-pane active" id="bookinglist" style="height: 500px;">
                                <!-- BEGIN: Actions -->
                                <!-- END: Actions -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<script type="text/javascript">
// mt-comments
  $(document).ready(function(){
    var branch_id_active = '<?php echo $this->branch_id; ?>';

    $.fn.getDataBook = function(branch_id){
      $.ajax({
        url     : "<?php echo base_url('admin/getDataBook')?>",
        type    : "POST",
        data    : {branch_id:branch_id},
        dataType: "json",
        success : function(data){
          for (var i = 0; i < data.length; i++) {
            $('#bookinglist').append('\
            <div class="mt-actions">\
                <div class="mt-action">\
                    <div class="mt-action-img">\
                    </div>\
                    <div class="mt-action-body">\
                        <div class="mt-action-row">\
                            <div class="mt-action-info ">\
                                <div class="mt-action-icon ">\
                                    <i class="icon-magnet"></i>\
                                </div>\
                                <div class="mt-action-details ">\
                                    <span class="mt-action-author">'+data[i].customer_name+'</span>\
                                    <p class="mt-action-desc">Dummy text of the printing</p>\
                                </div>\
                            </div>\
                            <div class="mt-action-datetime ">\
                                <span class="mt-action-date">'+data[i].building_booking_date_for+'</span>\
                                <span class="mt-action-dot bg-green"></span>\
                                <span class="mt=action-time">'+data[i].building_booking_time_1+'.00\
                                 - '+data[i].building_booking_time_2+'.00</span>\
                            </div>\
                            <div class="mt-action-buttons ">\
                                <div class="btn-group btn-group-circle">\
                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>\
                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
            </div>\
            ');
          }
        }
      });
    };

    $.fn.getDataBook(branch_id_active);

  });


</script>