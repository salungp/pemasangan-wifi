<?php $user = $this->db->get_where('users', ['login_token' => $this->session->userdata('login_token')])->row_array(); ?>
<aside class="main-sidebar">
  <section class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/img/default_image.jpg'); ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['username']; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN MENU</li>
      <!-- Optionally, you can add icons to the links -->
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
      <li><a href="<?php echo base_url('stock'); ?>"><i class="fa fa-archive"></i> <span>Stock</span></a></li>
      <li><a href="<?php echo base_url('pengguna'); ?>"><i class="fa fa-group"></i> <span>Pengguna</span></a></li>
      <li><a href="<?php echo base_url('pemasangan'); ?>"><i class="fa fa-gear"></i> <span>Pemasangan</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>