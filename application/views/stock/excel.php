<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=stock-".date('d-m-Y-').uniqid().".xls");
?>
<table border="1">
  <thead>
  <tr>
    <th>NO</th>
    <th>NAMA BARANG</th>
    <th>SATUAN</th>
    <th>HARGA</th>
    <th>TANGGAL PEMBELIAN</th>
    <th>JUMLAH</th>
  </tr>
  </thead>
  <?php $i = 1; ?>
  <tbody>
  <?php foreach ($data as $key) : ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td><?php echo $key['nama_barang']; ?></td>
      <td><?php echo $key['satuan']; ?></td>
      <td>Rp. <?php echo number_format($key['harga'], 2, ',', '.'); ?></td>
      <td><?php echo date('d M Y', strtotime($key['tgl_pembelian'])); ?></td>
      <td><?php echo $key['jumlah']; ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody> 
</table>