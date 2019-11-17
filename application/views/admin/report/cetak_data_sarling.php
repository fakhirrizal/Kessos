<?php 
date_default_timezone_set('Asia/Jakarta');
?>
<div class='entry'>
  <table border='1' align='left'>
  <tr>
    <td colspan='6'>Tanggal perubahan terakhir : <font color='red'><?php echo $this->Main_model->convert_tanggal(date('Y-m-d'))?> | <?php echo date('H:i');?> WIB</font></td>
  </tr>
  <tr>
    <td colspan='6' style="text-align: center;">Rekap Data Sarling</td>
  </tr>
  <tr>
    <td bgcolor='gren' style="text-align: center;" width='10px'>No</td>
    <td bgcolor='gren' style="text-align: center;">Nama Kelompok</td>
    <td bgcolor='gren' style="text-align: center;">Realisasi Fisik</td>
    <td bgcolor='gren' style="text-align: center;">Rencana Keuangan</td>
    <td bgcolor='gren' style="text-align: center;">Realisasi Keuangan</td>
    <td bgcolor='gren' style="text-align: center;">Realisasi Keuangan</td>
  </tr>
  <?php
  $n=1;
  foreach ($data_cetak as $key => $value) {
    echo'
    <tr>
      <td style="text-align: center;">'.$n.'</td>
      <td style="text-align: center;">'.$value->nama_tim.'</td>
      <td style="text-align: center;">'.number_format($value->persentase_fisik,2).'%</td>
      <td style="text-align: center;">Rp '.number_format($value->rencana_anggaran,2).'</td>
      <td style="text-align: center;">Rp '.number_format($value->anggaran,2).'</td>
      <td style="text-align: center;">'.number_format($value->persentase_anggaran,2).'%</td>
    </tr>
    ';
    $n++;
  }

  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=rekap_data_sarling.xls");
  ?>
  </table>
</div>