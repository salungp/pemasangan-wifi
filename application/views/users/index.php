<div class="content-wrapper">
  <?php $user = $this->User->loggedIn();
    if ($user['role_id'] !== 1) : ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Danger!</h4>
        Maaf anda tidak ada akses untuk halaman ini!
      </div>
  <?php endif; ?>
  <section class="content-header">
    <h1>
      Admin users
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Admin users</li>
    </ol>
  </section>

  <section class="content container-fluid">
    <div class="box">
      <div class="box-header with-border">
        <a href="<?php echo base_url('users'); ?>" class="btn btn-primary">
          <i class="fa fa-plus"></i>
          <span>Tambah</span>
        </a>
      </div>

      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th style="width: 10px">#</th>
            <th>Task</th>
            <th>Progress</th>
            <th style="width: 40px">Label</th>
          </tr>
          <tr>
            <td>1.</td>
            <td>Update software</td>
            <td>
              <div class="progress progress-xs">
                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
              </div>
            </td>
            <td><span class="badge bg-red">55%</span></td>
          </tr>
          <tr>
            <td>2.</td>
            <td>Clean database</td>
            <td>
              <div class="progress progress-xs">
                <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
              </div>
            </td>
            <td><span class="badge bg-yellow">70%</span></td>
          </tr>
          <tr>
            <td>3.</td>
            <td>Cron job running</td>
            <td>
              <div class="progress progress-xs progress-striped active">
                <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
              </div>
            </td>
            <td><span class="badge bg-light-blue">30%</span></td>
          </tr>
          <tr>
            <td>4.</td>
            <td>Fix and squish bugs</td>
            <td>
              <div class="progress progress-xs progress-striped active">
                <div class="progress-bar progress-bar-success" style="width: 90%"></div>
              </div>
            </td>
            <td><span class="badge bg-green">90%</span></td>
          </tr>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
    </div>
  </section>
</div>