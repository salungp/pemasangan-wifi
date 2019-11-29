 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengguna
      <small>Data pengguna wifi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pengguna</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
  <?php echo $this->session->flashdata('message'); ?>
    <div class="box">
      <div class="box-header">
        <a href="<?php echo base_url('pengguna/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <a href="<?php echo base_url('pengguna/excel'); ?>" class="btn btn-default"><i class="fa fa-file-excel-o"></i></a>
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
              <th>NAMA</th>
              <th>ALAMAT</th>
              <th>NO HP</th>
              <th>BRANDWITH</th>
              <th>TGL PASANG</th>
              <th>IP ADDRESS</th>
            </tr>
            </thead>
            <?php $i = 1; ?>
            <tbody>
            <?php foreach ($data as $key) : ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td>
                  <a href="<?php echo base_url('pengguna/'.$key['id'].'/edit'); ?>" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                  </a>
                </td>
                <td>                 
                  <a onclick="return window.confirm('Yakin mau dihapus?');" href="<?php echo base_url('pengguna/'.$key['id'].'/destroy'); ?>" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
                <td><?php echo $key['name']; ?></td>
                <td><?php echo $key['address']; ?></td>
                <td><?php echo $key['phone_number']; ?></td>
                <td><?php echo $key['brandwith']; ?></td>
                <td><?php echo date('d M Y', strtotime($key['tgl_pasang'])); ?></td>
                <td><?php echo $key['ip_address']; ?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
              <th>NO</th>
              <th>EDIT</th>
              <th>HAPUS</th>
              <th>NAMA</th>
              <th>ALAMAT</th>
              <th>NO HP</th>
              <th>BRANDWITH</th>
              <th>TGL PASANG</th>
              <th>IP ADDRESS</th>
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