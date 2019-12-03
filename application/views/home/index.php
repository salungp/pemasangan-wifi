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

              <p>Pembayaran H - 3</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('bayar'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count($stock); ?></h3>

              <p>Stock barang</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
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

              <p>Pengguna</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
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

              <p>Pemasangan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
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
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title">Pembagian wilayah pemasangan wifi</h2>
            </div>
            <div class="box-body">
              <div id="map" style="width: 100%;height: 400px;"></div>
            </div>
          </div>
        </div>
      </div>
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
            zoom: 14,
          }

          const geo = LatLng().split('|');
          const container = new google.maps.Map(document.getElementById('map'), properties);

          var markerAll = [];
          var infoWindowAll = [];

          for (let i = 0; i < geo.length; i++) {
            const id = eachData()[i].id;
            var koordinat = geo[i].split(',');
            var mapping = new google.maps.LatLng(parseFloat(koordinat[0]), parseFloat(koordinat[1]));
            var marker = new google.maps.Marker({
              position: mapping,
              map: container
            });

            var infoWindow = new google.maps.InfoWindow({
              content: `<h3 style="margin: 0;padding: 0;margin-bottom: 5px;">${eachData()[i].name}</h3>
                        <small style="display: block;margin-bottom: 5px;">${eachData()[i].address}</small>
                        <b>${eachData()[i].ip_address}</b>`,
              position: {lat: parseFloat(eachSingle(id)['titik_koordinat'].split(',')[0]), lng: parseFloat(eachSingle(id)['titik_koordinat'].split(',')[1])}
            });

            markerAll.push(marker);
            infoWindowAll.push(infoWindow);

            markerAll[i].addListener('click', function() {
              infoWindowAll[i].open(map, this);
            });
          }
        }

        google.maps.event.addDomListener(window, 'load', initialize);
      </script>;
  </section>
  <!-- /.content -->
</div>