
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
                            <span data-counter="counterup" data-value="1349" id="dataBookToday">0</span>
                        </div>
                        <div class="desc"> Booking Today</div>
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
                            <span data-counter="counterup" data-value="12,5" id="dataBookTodayconfirm">0</span></div>
                        <div class="desc">Get Confirm </div>
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
                            <span data-counter="counterup" data-value="549" id="dataBookTodayunconfirm">0</span>
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
                            <span class="caption-subject font-dark bold uppercase">Booking List</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_actions_pending" data-toggle="tab"> Wait Confirm </a>
                            </li>
                            <li>
                                <a href="#tab_actions_completed" data-toggle="tab"> Completed </a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab_actions_pending">
                            <div class="scrolling tab-pane active" id="bookinglistpending" style="height: 500px;">
                                <!-- BEGIN: Actions -->
                                <!-- END: Actions -->
                            </div>
                          </div>
                          <div class="tab-pane" id="tab_actions_completed">
                            <div class="scrolling tab-pane" id="bookinglistcompleted" style="height: 500px;">
                                <!-- BEGIN: Actions -->
                                <!-- END: Actions -->
                            </div>
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
var branch_id_active = '<?php echo $this->branch_id; ?>';
  $(document).ready(function(){

    $.fn.getDataBook = function(branch_id){
      $.ajax({
        cache   : false,
        url     : "<?php echo base_url('admin/getDataBook')?>",
        type    : "POST",
        data    : {branch_id:branch_id},
        dataType: "json",
        success : function(data){
          // no
          $('#bookinglistpending').empty();
          $('#bookinglistcompleted').empty();
          var html = [];
          var htmlconfirm = [];
          for (var i = 0; i < data.length; i++) {
            if (data[i].building_booking_status == 1 || data[i].building_booking_status == 2) {
              html +='<a><div class="mt-actions">';
              html +='<div class="mt-action">';
              html +='<div class="mt-action-img">';
              html +='</div>';
              html +='<div class="mt-action-body">';
              html +='<div class="mt-action-row">';
              html +='<div class="mt-action-info ">';
              html +='<div class="mt-action-icon ">';
              html +='<i class="icon-magnet"></i>';
              html +='</div>';
              html +='<div class="mt-action-details ">';
              html +='<span class="mt-action-author">'+data[i].customer_name+'</span>';
              if (data[i].building_booking_status == 2) {
                html +='<p class="mt-action-desc">Sudah Ada komfirmasi</p>';
              } else {
                html +='<p class="mt-action-desc">Dummy text of the printing</p>';
              }
              html +='</div>';
              html +='</div>';
              html +='<div class="mt-action-datetime ">';
              html +='<span class="mt-action-date">'+data[i].building_booking_date_for+'</span>';
              html +='<span class="mt-action-dot bg-green"></span>';
              html +='<span class="mt=action-time">'+data[i].building_booking_time_1+'.00';
              html +='- '+data[i].building_booking_time_2+'.00</span>';
              html +='</div>';
              html +='<div class="mt-action-buttons">';
              html +='<div class="btn-group btn-group-circle" style="width:300px; left: 120px;">';
              html +='<button type="button" data-building-booking-id="'+data[i].building_booking_id+'"';
              html +='class="btn btn-outline red btn-sm" onclick="btn_remove(this);">Reject</button>';
              html +='<button type="button" data-building-booking-id="'+data[i].building_booking_id+'"';
              if (data[i].building_booking_status == 2 || data[i].building_booking_status == 3){
                enabled = "";
                html +='class="btn btn-outline red btn-sm" onclick="btn_view(this);" '+enabled+'>view</button>';
              } else {
                enabled = "disabled";
                html +='class="btn btn-outline red btn-sm" onclick="btn_view(this);" '+enabled+'>view</button>';
              }
              html +='<button type="button" data-building-booking-id="'+data[i].building_booking_id+'"';
              if (data[i].building_booking_status == 3){
                enabled = "";
                html +='class="btn btn-outline green btn-sm btn-approve" onclick="btn_approve(this);" '+enabled+'>Appove</button>';
              } else {
                enabled = "disabled";
                html +='class="btn btn-outline green btn-sm btn-approve" onclick="btn_approve(this);" '+enabled+'>Appove</button>';
              }
              html +='</div>';
              html +='</div>';
              html +='</div>';
              html +='</div>';
              html +='</div>';
              html +='</div>';
              $('#bookinglistpending').append(html);
            } else if (data[i].building_booking_status == 4) {
              htmlconfirm += '<div class="mt-actions">';
              htmlconfirm += '<div class="mt-action">';
              htmlconfirm += '<div class="mt-action-img">';
              htmlconfirm += '</div>';
              htmlconfirm += '<div class="mt-action-body">';
              htmlconfirm += '<div class="mt-action-row">';
              htmlconfirm += '<div class="mt-action-info ">';
              htmlconfirm += '<div class="mt-action-icon ">';
              htmlconfirm += '<i class="icon-magnet"></i>';
              htmlconfirm += '</div>';
              htmlconfirm += '<div class="mt-action-details ">';
              htmlconfirm += '<span class="mt-action-author">'+data[i].customer_name+'</span>';
              htmlconfirm += '<p class="mt-action-desc">Dummy text of the printing</p>';
              htmlconfirm += '</div>';
              htmlconfirm += '</div>';
              htmlconfirm += '<div class="mt-action-datetime ">';
              htmlconfirm += '<span class="mt-action-date">'+data[i].building_booking_date_for+'</span>';
              htmlconfirm += '<span class="mt-action-dot bg-green"></span>';
              htmlconfirm += '<span class="mt=action-time">'+data[i].building_booking_time_1+'.00';
              htmlconfirm += '- '+data[i].building_booking_time_2+'.00</span>';
              htmlconfirm += '</div>';
              htmlconfirm += '<div class="mt-action-buttons ">';
              htmlconfirm += '<div class="btn-group btn-group-circle">';
              htmlconfirm += '</div>';
              htmlconfirm += '</div>';
              htmlconfirm += '</div>';
              htmlconfirm += '</div>';
              htmlconfirm += '</div>';
              htmlconfirm += '</div>';
              $('#bookinglistcompleted').append(htmlconfirm);
            }
          }
        }
      });
    };

    $.fn.dataBookToday = function(branch_id)
    {
      $.ajax({
        cache   : false,
        url     : "<?php echo base_url('admin/getDataBooktoday')?>",
        type    : "POST",
        data    : {branch_id:branch_id},
        dataType: "json",
        success : function(data){

          $('#dataBookToday').empty();
          $('#dataBookTodayconfirm').empty();
          $('#dataBookTodayunconfirm').empty();
          // $.each(data, function(key, value) {

              $('#dataBookToday').html(data.databooktoday);
              $('#dataBookTodayconfirm').html(data.databooktodayC);
              $('#dataBookTodayunconfirm').html(data.databooktodayunC);

          // });
        }

      });
    }

      $.fn.getDataBook(branch_id_active);
      $.fn.dataBookToday(branch_id_active);

  });

  function btn_approve(elem)
  {
    var booking_id = $(elem).attr('data-building-booking-id');
    $.post('admin/updateDataBook', { booking_id : booking_id }, function(data, status){
      if (status=='success') {
        var mt_actionsclass = $(elem).parent().parent().parent().parent().parent().parent();
        mt_actionsclass.hide("slide", { direction: "right" }, 500);
      }
      setTimeout(function(){
        $.fn.getDataBook(branch_id_active);
      }, 500);
    });
  }

  function btn_view(elem){
    var booking_id = $(elem).attr('data-building-booking-id');
    var url = "admin/viewDatabook/"+booking_id;
    $('#medium_modal').modal('show').find('.modal-content').load(url);
  }

  function btn_remove(elem)
  {
    var booking_id = $(elem).attr('data-building-booking-id');
    $.post('admin/deleteDataBook', { booking_id : booking_id }, function(data, status){
      if (status=='success') {
        var mt_actionsclass = $(elem).parent().parent().parent().parent().parent().parent();
        mt_actionsclass.hide("slide", { direction: "left" }, 500);
      }
      setTimeout(function(){
        $.fn.getDataBook(branch_id_active);
      }, 500);
    });
  }

  $(document).ready(function(){
  setInterval(function()
          {
              // $.fn.getDataBook(branch_id_active);
          }, 1000);
    });
</script>
