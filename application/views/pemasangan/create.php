<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah pemasangan
      <small>Tambah data pemasangan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url('pemasangan'); ?>"> Pemasangan</a></li></li>
      <li class="active">Create</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content container-fluid">
    <?php echo $this->session->flashdata('message'); ?>
  	<div class="box box-primary">
      <div class="box-header with-border">
        <a href="<?php echo base_url('pemasangan'); ?>" class="btn btn-danger ">Kembali</a>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?php echo base_url('pemasangan/store'); ?>" method="POST">
        <div class="box-body">
          <div class="form-group">
            <label for="waktu">Waktu</label>
            <div class="input-group" style="display: flex;width: 200px;">
              <input type="text" name="waktu_number" class="form-control" id="waktu" placeholder="Lama waktu" required>
              <select name="waktu_ket" class="form-control">
                <option>menit</option>
                <option>jam</option>
                <option>hari</option>
                <option>minggu</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="pengguna_id">Pengguna</label>
            <select name="pengguna_id" id="pengguna_id" class="form-control" required>
              <?php foreach($user as $key) : ?>
                <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="bahan">Bahan</label>
            <small>Tekan ctrl click untuk memilih lebih dari satu.</small>
            <select name="bahan[]" id="bahan" class="form-control" multiple="<?php echo count($stocks); ?>" required>
              <?php foreach($stocks as $key) : ?>
                <option value="<?php echo $key['id']; ?>"><?php echo $key['nama_barang']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="titik_koordinat">Koordinat</label>
            <input type="text" name="titik_koordinat" class="form-control" id="titik_koordinat" placeholder="Masukkan titik koordinat lokasi" required>
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