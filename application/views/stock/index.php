<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Stock barang
      <small>Data stock barang</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Stock</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
  <?php echo $this->session->flashdata('message'); ?>
    <div class="box">
      <div class="box-header">
        <a href="<?php echo base_url('stock/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        <a href="<?php echo base_url('stock/excel'); ?>" class="btn btn-default"><i class="fa fa-file-excel-o"></i> Ekspor excel</a>
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
                <td>
                  <a href="<?php echo base_url('stock/'.$key['id'].'/edit'); ?>" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                  </a>
                </td>
                <td>                  
                  <a onclick="return window.confirm('Yakin mau dihapus?');" href="<?php echo base_url('stock/'.$key['id'].'/destroy'); ?>" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
                <td><?php echo $key['nama_barang']; ?></td>
                <td><?php echo $key['satuan']; ?></td>
                <td>Rp. <?php echo number_format($key['harga'], 2, ',', '.'); ?></td>
                <td><?php echo date('d M Y', strtotime($key['tgl_pembelian'])); ?></td>
                <td><?php echo $key['jumlah']; ?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>NO</th>
              <th>EDIT</th>
              <th>HAPUS</th>
              <th>NAMA BARANG</th>
              <th>SATUAN</th>
              <th>HARGA</th>
              <th>TANGGAL PEMBELIAN</th>
              <th>JUMLAH</th>
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