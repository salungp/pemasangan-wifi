<?php $user = $this->User->loggedIn(); ?>
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
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
      <li><a href="<?php echo base_url('stock'); ?>"><i class="fa fa-archive"></i> <span>Stok</span></a></li>
      <li><a href="<?php echo base_url('pengguna'); ?>"><i class="fa fa-group"></i> <span>Customers</span></a></li>
      <li><a href="<?php echo base_url('pemasangan'); ?>"><i class="fa fa-gear"></i> <span>Pemasangan</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-gears"></i> <span>App setings</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('general/maps_api_setting'); ?>"><i class="fa fa-circle-o"></i> Maps API setting</a></li>
          <li><a href="<?php echo base_url('general/logo_setting'); ?>"><i class="fa fa-circle-o"></i> Logo site</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>