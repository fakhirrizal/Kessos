<?php 
date_default_timezone_set('Asia/Jakarta');
?>
<div class='entry'>
  <table border='1' align='left'>
  <tr>
    <td colspan='10'>Tanggal perubahan terakhir : <font color='red'><?php echo $this->Main_model->convert_tanggal(date('Y-m-d'))?> | <?php echo date('H:i');?> WIB</font></td>
  </tr>
  <tr>
    <td colspan='10' style="text-align: center;">Rekap Data Sarling</td>
  </tr>
  <tr>
    <td bgcolor='gren' style="text-align: center;" width='10px'>No</td>
    <td bgcolor='gren' style="text-align: center;">Jenis Sarling</td>
    <td bgcolor='gren' style="text-align: center;">Tahun Program</td>
    <td bgcolor='gren' style="text-align: center;">Tahap</td>
    <td bgcolor='gren' style="text-align: center;">Nama Tim</td>
    <td bgcolor='gren' style="text-align: center;">Alamat Sarling</td>
    <td bgcolor='gren' style="text-align: center;">Rencana Anggaran</td>
    <td bgcolor='gren' style="text-align: center;">Provinsi</td>
    <td bgcolor='gren' style="text-align: center;">Kabupaten</td>
    <td bgcolor='gren' style="text-align: center;">Kecamatan</td>
    <td bgcolor='gren' style="text-align: center;">Desa</td>
  </tr>
  <?php
  $n=1;
  foreach ($data_cetak as $key => $value) {
    echo'
    <tr>
      <td style="text-align: center;">'.$n.'</td>
      <td style="text-align: center;">'.$value->jenis_sarling.'</td>
      <td style="text-align: center;">'.$value->tahun.'</td>
      <td style="text-align: center;">'.$value->tahap.'</td>
      <td style="text-align: center;">'.$value->nama_tim.'</td>
      <td style="text-align: center;">'.$value->alamat.'</td>
      <td style="text-align: center;">Rp '.number_format($value->rencana_anggaran,2).'</td>
      <td style="text-align: center;">'.$value->nm_provinsi.'</td>
      <td style="text-align: center;">'.$value->nm_kabupaten.'</td>
      <td style="text-align: center;">'.$value->nm_kecamatan.'</td>
      <td style="text-align: center;">'.$value->nm_desa.'</td>
    </tr>
    ';
    $n++;
  }

  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=rekap_data_sarling.xls");
  ?>
  </table>
</div>