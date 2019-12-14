<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah barang
      <small>Tambah stok barang</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url('stock'); ?>"> Stock</a></li></li>
      <li class="active">Create</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content container-fluid">
    <?php echo $this->session->flashdata('message'); ?>
  	<div class="box box-primary">
      <div class="box-header with-border">
        <a href="<?php echo base_url('stock'); ?>" class="btn btn-danger ">Kembali</a>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?php echo base_url('stock/store'); ?>" method="POST">
        <div class="box-body">
          <div class="form-group">
            <label for="nama_barang">Nama barang</label>
            <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Masukkan nama barang" required>
          </div>

          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga" value="" required>
          </div>

          <div class="form-group">
            <label for="tgl_pembelian">Tanggal pembelian</label>
            <input type="date" name="tgl_pembelian" class="form-control" id="tgl_pembelian" placeholder="Masukkan tanggal pembelian" required>
          </div>

          <div class="form-group">
            <label for="satuan">Satuan</label>
            <input type="text" name="satuan" class="form-control" id="satuan" placeholder="Masukkan satuan" required>
          </div>

          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Masukkan jumlah" required>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->