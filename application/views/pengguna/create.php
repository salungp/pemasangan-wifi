<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah pengguna
      <small>Tambah data pengguna</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url('pengguna'); ?>"> Pengguna</a></li></li>
      <li class="active">Create</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content container-fluid">
    <?php echo $this->session->flashdata('message'); ?>
  	<div class="box box-primary">
      <div class="box-header with-border">
        <a href="<?php echo base_url('pengguna'); ?>" class="btn btn-danger ">Kembali</a>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?php echo base_url('pengguna/store'); ?>" method="POST">
        <div class="box-body">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama pengguna" required>
          </div>

          <div class="form-group">
            <label for="adress">Alamat</label>
            <input type="text" name="adress" class="form-control" id="adress" placeholder="Masukkan alamat pengguna" required>
          </div>

          <div class="form-group">
            <label for="phone_number">No HP</label>
            <input type="number" name="phone_number" class="form-control" id="phone_number" placeholder="Masukkan no HP" required>
          </div>

          <div class="form-group">
            <label for="brandwith">Brandwith</label>
            <input type="text" name="brandwith" class="form-control" id="brandwith" placeholder="Masukkan brandwith" required>
          </div>

          <div class="form-group">
            <label for="tgl_pasang">Tanggal pasang</label>
            <input type="date" name="tgl_pasang" class="form-control" id="tgl_pasang" placeholder="Masukkan tanggal pasang" required>
          </div>

          <div class="form-group">
            <label for="ip_address">IP adress</label>
            <input type="text" name="ip_address" class="form-control" id="ip_address" placeholder="Masukkan ip address" required>
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