<?php
function terlambat($tgl_dateline, $tgl_kembali){
$selisih = strtotime($tgl_kembali) - strtotime($tgl_dateline);
$selisih = floor($selisih / (60 * 60 * 24));
if($selisih <= 0){
  return 0;
}else{
  return $selisih;
}
}
