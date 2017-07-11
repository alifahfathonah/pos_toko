<div id="medium_modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    </div>
  </div>
</div>
<div id="large_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

    </div>
  </div>
</div>
<div id="small_modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

    </div>
  </div>
</div>

      <script type="text/javascript">
      $(function () {
        if(typeof $.fn.DataTable !== 'undefined'){
          $("#datatable_1").DataTable();

          $("#example2").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
          });
        }

        if(typeof $.fn.timepicker !== 'undefined'){
          $('#timepicker3').timepicker({
             defaultTime: 'value',
             minuteStep: 1,
             disableFocus: true,
             template: 'dropdown',
             showMeridian:false
          });
          $('#timepicker4').timepicker({
              defaultTime: 'value',
              minuteStep: 1,
              disableFocus: true,
              template: 'dropdown',
              showMeridian:false
          });
        }
      });

        if(typeof $.fn.datepicker !== 'undefined'){
          $('#i_tanggal').datepicker({
              format: 'dd-mm-yyyy',
          });
        }

      </script>
    </body>
</html>
