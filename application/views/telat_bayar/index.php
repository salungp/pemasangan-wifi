<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Daftar waktu bayar
      <small>Pengguna yang sudah waktunya untuk bayar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">telat bayar</li>
    </ol>
  </section>

  <section class="content container-fluid">
  <?php echo $this->session->flashdata('message'); ?>
    <div class="box">
      <div class="box-header">
        <a href="<?php echo $this->agent->referrer(); ?>" class="btn btn-danger">Kembali</a>
        <a href="<?php echo base_url('telat_bayar/excel'); ?>" class="btn btn-default"><i class="fa fa-file-excel-o"></i></a>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-condensed">
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
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
</div>