<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pemasangan
      <small>Data pemasangan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pemasangan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
  <?php echo $this->session->flashdata('message'); ?>
    <div class="box">
      <div class="box-header">
        <a href="<?php echo base_url('pemasangan/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        <a href="<?php echo base_url('pemasangan/excel'); ?>" class="btn btn-default"><i class="fa fa-file-excel-o"></i> Ekspor excel</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="box-table">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>NO</th>
              <th>EDIT</th>
              <th>HAPUS</th>
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
                <td>
                  <a href="<?php echo base_url('pemasangan/'.$key['id'].'/edit'); ?>" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                  </a>
                </td>
                <td>
                  <a onclick="return window.confirm('Yakin mau dihapus?');" href="<?php echo base_url('pemasangan/'.$key['id'].'/destroy'); ?>" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
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
            <tfoot>
            <tr>
              <th>NO</th>
              <th>EDIT</th>
              <th>HAPUS</th>
              <th>PENGGUNA</th>
              <th>LOKASI</th>
              <th>WAKTU</th>
              <th>BAHAN</th>
              <th>JUMLAH BAHAN</th>
              <th>SATUAN BAHAN</th>
              <th>KOORDINAT</th>
              <th>TGL PEMASANGAN</th>
            </tr>
            </tfoot>  
          </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->