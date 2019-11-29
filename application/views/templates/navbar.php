<?php $user = $this->db->get_where('users', ['login_token' => $this->session->userdata('login_token')])->row_array(); ?>
<?php $this->db->order_by('id', 'desc'); $notifications = $this->db->get('notifications')->result_array(); ?>
<header class="main-header">
  <a href="<?php echo base_url('home'); ?>" class="logo">
    <span class="logo-mini">
      <img src="<?php echo base_url('assets/img/image_dinusa.png'); ?>" style="width: 40px;" alt="logo app" />
    </span>

    <span class="logo-lg">
      <img src="<?php echo base_url('assets/img/image_dinusa.png'); ?>" style="width: 70px;" alt="logo app" />
    </span>
  </a>

  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications Menu -->
        <li class="dropdown notifications-menu">
          <!-- Menu toggle button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning"><?php echo count($notifications); ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have <?php echo count($notifications); ?> notifications</li>
            <li>
              <!-- Inner Menu: contains the notifications -->
              <ul class="menu">
                <li><!-- start notification -->
                  <?php foreach ($notifications as $k) : ?>
                    <a href="<?php echo base_url('notification'); ?>">
                      <i class="fa fa-users text-aqua"></i> <?php echo $k['title']; ?>
                    </a>
                  <?php endforeach; ?>
                </li>
                <!-- end notification -->
              </ul>
            </li>
            <li class="footer"><a href="<?php echo base_url('notification'); ?>">View all</a></li>
          </ul>
        </li>
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="<?php echo base_url('assets/img/default_image.jpg'); ?>" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?php echo $user['username']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="<?php echo base_url('assets/img/default_image.jpg'); ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $user['username']; ?> - Admin
                <small>Member since <?php echo date('M. Y', strtotime($user['created_at'])); ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-center">
                <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>