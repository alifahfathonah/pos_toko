<html>
  <head>
  <style type="text/css">
    table > thead > th
    {
      border: 1px solid;
    }
  </style>
  <title><?php echo $title[0]['title_page'].' - '.$title[0]['title_page2'] ?></title>
  </head>
  <body>
    <!-- <img src='".base_url()."assets/img/b-field.png' /> -->
    <img src="<?php echo base_url()?>assets/img/b-field.png" alt="">
    <table style="width: 100%;">
      <tr>
        <td>Nama : <?php echo $val['building_bookingCustomerName'];?></td>
      </tr>
    </table>
  </body>
</html>
