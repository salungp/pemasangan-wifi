<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Notifikasi
      <small>Pemberitahuan yang masuk</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Notification</li>
    </ol>
  </section>

  <section class="content container-fluid">
  <?php echo $this->session->flashdata('message'); ?>
    <div class="box">
      <div class="box-header">
        <a href="<?php echo base_url('home'); ?>" class="btn btn-primary">Kembali</a>
        <a href="<?php echo base_url('notification/clear'); ?>" class="btn btn-danger" onclick="return window.confirm('Hapus semua notifikasi?');">Clear all</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-condensed">
          <tr>
            <th style="width: 10px">#</th>
            <th>JUDUL</th>
            <th>DESKRIPSI</th>
            <th>WAKTU</th>
          </tr>
          <?php $i = 1; ?>
          <?php foreach ($data as $key) : ?>
            <tr>
              <td><?php echo $i++.'.'; ?></td>
              <td><?php echo $key['title']; ?></td>
              <td><?php echo $key['description']; ?></td>
              <td><?php echo date('d M Y', strtotime($key['created_at'])); ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
</div>