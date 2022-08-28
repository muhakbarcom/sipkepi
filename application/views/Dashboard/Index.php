<!-- Default box -->
<style type="text/css">
  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 360px;
    max-width: 800px;
    margin: 1em auto;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }

  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }
</style>

<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-aqua">
      <span class="info-box-icon"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Pegawai</span>
        <span class="info-box-number">100 orang</span>

        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
          Total Pegawai
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-green">
      <span class="info-box-icon"><i class="fa fa-cubes"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jobdesk</span>
        <span class="info-box-number">65 jobdesk</span>

        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
          Total Jobdesk
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-yellow">
      <span class="info-box-icon"><i class="fas fa-user-check"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Rata rata Penilaian Pegawai</span>
        <span class="info-box-number">90</span>

        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
          Penilaian Bulan Ini
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-red">
      <span class="info-box-icon"><i class="fab fa-dochub"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Laporan</span>
        <span class="info-box-number">Laporan jobdesk-</span>

        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
          Laporan per Jobdesk
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<div class="row">
  <?php if ($jumlah_jobdesk_belum_selesai > 0 and $this->ion_auth->in_group("Pegawai")) : ?>
    <div class="col-md-12">
      <div class="alert alert-danger">Ada <b><?= $jumlah_jobdesk_belum_selesai; ?></b> jobdesk yang belum diselesaikan! <a href="<?= base_url('Jobdesk/pegawai'); ?>" class="alert-link" style="color:white">Cek disini</a></div>
    </div>
  <?php endif ?>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        Chart Jobdesk
      </div>
      <div class="box-body">
        <div id="lineChart"></div>
      </div>
    </div>
  </div>
</div>
<!-- ChartJS -->
<script src="<?= base_url("assets/highchart/highcharts.js"); ?>"></script>
<script>
  Highcharts.chart('lineChart', {

    title: {
      text: ''
    },

    subtitle: {
      // text: 'Source: thesolarfoundation.com'
    },

    yAxis: {
      title: {
        text: ''
      }
    },

    xAxis: {
      type: 'datetime',
      crosshair: true,
      crosshair: {
        color: 'rgb(31 134 87 / 21%)',
        width: 100
      },
      gridLineWidth: 0,
      labels: {
        color: '#333'
      }
    },

    tooltip: {
      shared: true,
      crosshairs: true
    },



    plotOptions: {
      series: {
        label: {
          connectorAllowed: true
        },
        pointStart: Date.UTC(<?= $lineChartMonth; ?>, <?= $lineChartDay - 1; ?>, 1),
        pointIntervalUnit: 'month'
      }
    },

    series: [{
      name: 'Selesai',
      data: <?= json_encode($chartjs) ?>,
      color: '#0678d4'
    }, {
      name: 'Tidak selesai',
      data: <?= json_encode($chartjbs) ?>,
      color: '#efab58'
    }],

    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }]
    }

  });
</script>