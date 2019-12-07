<?php $user = $this->Customers->find($data['user']); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Detail
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <section class="content container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="box">
          <div class="box-header">
            <a href="<?php echo base_url('bayar'); ?>" class="btn btn-danger">Kembali</a>
          </div>
          <div class="box-body">
            <h2 class="unpaid">unpaid</h2>
            <form action="<?php echo base_url('bayar/update/'.$data['id']); ?>" method="post">
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>" class="form-control" disabled>
              </div>
              <div class="form-group">
                <label for="phone_number">No HP</label>
                <input type="number" name="phone_number" id="phone_number" value="<?php echo $user['phone_number']; ?>" class="form-control" disabled>
              </div>
              <div class="form-group">
                <label for="ip_address">Ip address</label>
                <input type="text" name="ip_address" id="ip_address" value="<?php echo $user['ip_address']; ?>" class="form-control" disabled>
              </div>
              <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" name="address" id="address" value="<?php echo $user['address']; ?>" class="form-control" disabled>
              </div>
              <a href="javascript:window.print();" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
