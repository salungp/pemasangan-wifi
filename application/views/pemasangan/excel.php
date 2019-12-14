<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pemasangan-".date('d-m-Y-').uniqid().".xls");
?>
<table border="1">
  <thead>
  <tr>
    <th>NO</th>
    <th>PENGGUNA</th>
    <th>LOKASI</th>
    <th>WAKTU</th>
    <th>BAHAN</th>
    <th>JUMLAH BAHAN</th>
    <th>SATUAN BAHAN</th>
    <th>KOORDINAT</th>
    <th>TGL PEMASANGAN</th>
  </tr>
  </thead>
  <?php $i = 1; ?>
  <tbody>
  <?php foreach ($data as $key) : ?>
    <?php $user = $this->db->get_where('pengguna', ['id' => $key['pengguna_id']])->row_array(); ?>
    <?php
      $bahan = [];
      foreach (explode(',', $key['stock_id']) as $k => $value) {
        array_push($bahan, $this->db->get_where('stocks', ['id' => $value])->row_array());
      }
    ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td><?php echo $user['name']; ?></td>
      <td><?php echo $user['address']; ?></td>
      <td><?php echo $key['waktu']; ?></td>
      <td>
        <ul style="margin: 0;padding-left: 15px;">
          <?php
            foreach ($bahan as $indicator => $value) {
              echo '<li>'.$value['nama_barang'].'</li>';
            }
          ?>
        </ul>
      </td>
      <td>
        <ul style="margin: 0;padding-left: 15px;">
          <?php
            foreach ($bahan as $indicator => $value) {
              echo '<li>'.$value['jumlah'].'</li>';
            }
          ?>
        </ul>
      </td>
      <td>
        <ul style="margin: 0;padding-left: 15px;">
          <?php
            foreach ($bahan as $indicator => $value) {
              echo '<li>'.$value['satuan'].'</li>';
            }
          ?>
        </ul>
      </td>
      <td><?php echo $key['titik_koordinat']; ?></td>
      <td><?php echo date('d M Y', strtotime($user['tgl_pasang'])); ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody> 
</table>