<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pembayaran-".date('d-m-Y-').uniqid().".xls");
?>
<table border="1">
  <tr>
    <th style="width: 10px">#</th>
    <th>NAMA</th>
    <th>ALAMAT</th>
    <th>TGL PASANG</th>
  </tr>
  <?php $i = 1; ?>
  <?php foreach ($data as $key) : ?>
  <?php $user = $this->db->get_where('pengguna', ['id' => $key['user']])->row_array(); ?>
    <tr>
      <td><?php echo $i++.'.'; ?></td>
      <td><?php echo $user['name']; ?></td>
      <td><?php echo $user['address']; ?></td>
      <td><?php echo date('d M Y', strtotime($user['tgl_pasang'])); ?></td>
    </tr>
  <?php endforeach; ?>
</table>