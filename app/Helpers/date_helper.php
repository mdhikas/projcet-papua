<?php
   function changeDateFormatToID($date) {
      $months = [
         'Januari',
         'Februari',
         'Maret',
         'April',
         'Mei',
         'Juni',
         'Juli',
         'Agustus',
         'September',
         'Oktober',
         'November',
         'Desember'
      ];

      $tmp = explode("-", $date);
      return $tmp[2] . " " . $months[(int)$tmp[1] - 1] . " " . $tmp[0];
   }
?>