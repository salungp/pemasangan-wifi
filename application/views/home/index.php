<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Beranda
      <small>Halaman utama</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count($telat_bayar); ?></h3>
              <b>UNPAID INVOICE</b>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="<?php echo base_url('bayar'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count($stock); ?></h3>
              <b>STOK</b>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="<?php echo base_url('stock'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count($pengguna); ?></h3>
              <b>CUSTOMERS</b>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo base_url('pengguna'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count($pemasangan); ?></h3>
              <b>PEMASANGAN</b>
            </div>
            <div class="icon">
              <i class="fa fa-gear"></i>
            </div>
            <a href="<?php echo base_url('pemasangan'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <!-- place all koordinat to variable koordinat -->
      <?php
        $koordinat = [];
        foreach($pemasangan as $key) {
          array_push($koordinat, $key['titik_koordinat']);
        }
      ?>
      <script src="https://maps.googleapis.com/maps/api/js"></script>
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Map</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div id="map" style="width: 100%;height: 380px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-tasks"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">WEB SERVER</span>
              <span class="info-box-number">
                <?php
                  $server = explode('/', @$_SERVER["SERVER_SOFTWARE"]);
                  echo strtoupper($server[0]);
                ?>
              </span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-file-code-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PHP ENGINE</span>
              <span class="info-box-number">PHP <?php echo phpversion(); ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-database"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">DATABASE</span>
              <span class="info-box-number">
                <?php
                  $link = mysqli_connect('localhost', 'root', '');
                  echo mysqli_get_server_info($link);
                  mysqli_close($link);
                ?>
              </span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </row>
      <script>
        function LatLng() {
          <?php
            echo 'return "'.implode('|', $koordinat).'";';
          ?>
        }

        function eachAll() {
          <?php
            echo 'return '.json_encode($pemasangan).';';
          ?>
        }

        function eachSingle(id) {
          var all = eachAll();
          var data;
          all.forEach(function(item){
            if (item.pengguna_id == id) {
              data = item;
            }
          });
          return data;
        }

        function eachData() {
          <?php
            $all = [];
            foreach ($pemasangan as $key) {
              $user = $this->db->get_where('pengguna', ['id' => $key['pengguna_id']])->row_array();
              $all[] = $user;
            }
            echo 'return '.json_encode($all, true).';';
          ?>
        }

        function initialize() {
          var map = new google.maps.LatLng(-6.740821, 111.035638);
          var properties = {
            center: map,
            zoom: 14
          }

          const geo = LatLng().split('|');
          const container = new google.maps.Map(document.getElementById('map'), properties);

          var markerAll = [];
          var infoWindowAll = [];

          for (let i = 0; i < geo.length; i++) {
            const id = eachData()[i].id;
            var koordinat = geo[i].split(',');
            var position = eachSingle(id)['titik_koordinat'].split(',');
            var mapping = new google.maps.LatLng(parseFloat(koordinat[0]), parseFloat(koordinat[1]));
            var marker = new google.maps.Marker({
              position: mapping,
              map: container
            });

            var infoWindow = new google.maps.InfoWindow({
              content: `<h3 style="margin: 0;padding: 0;margin-bottom: 5px;">${eachData()[i].name}</h3>
                        <small style="display: block;margin-bottom: 5px;">${eachData()[i].address}</small>
                        <b>${eachData()[i].ip_address}</b>`,
              position: {lat: parseFloat(position[0]), lng: parseFloat(eachSingle(id)['titik_koordinat'].split(',')[1])}
            });

            markerAll.push(marker);
            infoWindowAll.push(infoWindow);

            markerAll[i].addListener('click', function() {
              infoWindowAll[i].open(map, this);
            });
          }
        }

        google.maps.event.addDomListener(window, 'load', initialize);
      </script>
  </section>
  <!-- /.content -->
</div>
