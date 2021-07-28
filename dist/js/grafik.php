<script>

  $(window).on("load", function () {

    var $primary = '#7367F0';
    var $success = '#28C76F';
    var $danger = '#EA5455';
    var $warning = '#FF9F43';
    var $label_color = '#1E1E1E';
    var grid_line_color = '#dae1e7';
    var scatter_grid_color = '#f3f3f3';
    var $scatter_point_light = '#D1D4DB';
    var $scatter_point_dark = '#5175E0';
    var $white = '#fff';
    var $black = '#000';

    var themeColors = [$primary, $success, $danger, $warning, $label_color, $warning, $primary, $success, $danger, $warning, $label_color, $warning];
// Bar Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var barChartctx = $("#bar-chart");

  // Chart Options
  var barchartOptions = {
    // Elements options apply to all of the options unless overridden in a dataset
    // In this case, we are setting the border of each bar to be 2px wide
    elements: {
      rectangle: {
        borderWidth: 2,
        borderSkipped: 'left'
      }
    },
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration: 500,
    legend: { display: false },
    scales: {
      xAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }],
      yAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
        },
        ticks: {
          stepSize: 10
        },
      }],
    },
    title: {
      display: true,
      text: 'Grafik Pelaporan Bulanan'
    },

  };

  // Chart Data
  var barchartData = {
    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus', 'September', 'Oktober', 'November', 'Desember'],
    datasets: [{
      label: "Grafik Kunjungan Bulanan",
      data: [
      <?php 

      for ($i=1; $i <= date('m')+1; $i++) { 

        $total_kunjungan = $this->db->query(' SELECT * FROM tbl_pelaporan
         WHERE
         MONTH(tgl_pelaporan) = '.$i.' AND YEAR(tgl_pelaporan)');

        echo $total_kunjungan->num_rows()." ,";
      }?>
      ],
      backgroundColor: themeColors,
      borderColor: "transparent"
    }]
  };

  var barChartconfig = {
    type: 'bar',

    // Chart Options
    options: barchartOptions,

    data: barchartData
  };

  // Create the chart
  var barChart = new Chart(barChartctx, barChartconfig);
  


// Line Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var lineChartctx = $("#line-chart");

  // Chart Options
  var linechartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'top',
    },
    hover: {
      mode: 'label'
    },
    scales: {
      xAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }],
      yAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }]
    },
    title: {
      display: true,
      text: 'Grafik Pelaporan'
    }
  };

  // Chart Data
  var linechartData = {
    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus', 'September', 'Oktober', 'November', 'Desember'],
    datasets: [{
      label: "PELAPORAN MASUK",
      data: [
      <?php 
      for ($i=1; $i <= date('m'); $i++) { 

        $total_kunjungan = $this->db->query(' SELECT * FROM tbl_pelaporan
          WHERE
          MONTH(tgl_pelaporan) = '.$i.' AND YEAR(tgl_pelaporan)');

        echo $total_kunjungan->num_rows()." ,";
      }?>
      ],
      borderColor: $primary,
      fill: false
    }, {
      data: [
      <?php 
      for ($i=1; $i <= date('m'); $i++) { 

        $total_kunjungan = $this->db->query(' SELECT * FROM tbl_pelaporan
          WHERE hasil_swab = "POSITIF" AND
          (MONTH(tgl_pelaporan) = '.$i.' AND YEAR(tgl_pelaporan))');

        echo $total_kunjungan->num_rows()." ,";
      }?>
      ],
      label: "POSITIF",
      borderColor: $danger,
      fill: false
    }, {
      data: [
      <?php 
      for ($i=1; $i <= date('m'); $i++) { 

        $total_kunjungan = $this->db->query(' SELECT * FROM tbl_pelaporan
          WHERE hasil_swab = "NEGATIF" AND
          MONTH(tgl_pelaporan) = '.$i.' AND YEAR(tgl_pelaporan)');

        echo $total_kunjungan->num_rows()." ,";
      }?>
      ],
      label: "NEGATIF",
      borderColor: $success,
      fill: false
    }, {
      data: [
      <?php 
      for ($i=1; $i <= date('m'); $i++) { 

        $total_kunjungan = $this->db->query(' SELECT * FROM tbl_pelaporan
          WHERE status_pantau = "Meninggal" AND
          MONTH(tgl_selesai_pantau) = '.$i.' AND YEAR(tgl_selesai_pantau)');

        echo $total_kunjungan->num_rows()." ,";
      }?>
      ],
      label: "Meninggal",
      borderColor: $warning,
      fill: false
    }]
  };

  var lineChartconfig = {
    type: 'line',

    // Chart Options
    options: linechartOptions,

    data: linechartData
  };

  // Create the chart
  var lineChart = new Chart(lineChartctx, lineChartconfig);



 // Pie Chart
  // --------------------------------


  //Get the context of the Chart canvas element we want to select
  var pieChartctx = $("#wilayah-chart");

  // Chart Options
  var piechartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration: 500,
    title: {
      display: true,
      text: 'Grafik Positif Per Wilayah'
    }
  };

  // Chart Data
  var piechartData = {
    labels: ["Cempaka Putih Barat", "Cempaka Putih Timur", "Rawasari", "Luar Wilayah"],
    datasets: [{
      label: "My First dataset",
      data: [
      <?php 
      //$CI =& get_instance();
      $this->load->model('M_Dashboard');
      echo $this->db->query(
        'SELECT * 
        FROM
        tbl_sasaran
        RIGHT JOIN tbl_pelaporan ON tbl_sasaran.nik = tbl_pelaporan.nik WHERE tbl_sasaran.kel_domisili = "Cempaka Putih Barat"
        ORDER BY tbl_pelaporan.id desc')->num_rows()." ,";
      echo $this->db->query(
        'SELECT * 
        FROM
        tbl_sasaran
        RIGHT JOIN tbl_pelaporan ON tbl_sasaran.nik = tbl_pelaporan.nik WHERE tbl_sasaran.kel_domisili = "Cempaka Putih Timur"
        ORDER BY tbl_pelaporan.id desc')->num_rows()." ,";
      echo $this->db->query(
        'SELECT * 
        FROM
        tbl_sasaran
        RIGHT JOIN tbl_pelaporan ON tbl_sasaran.nik = tbl_pelaporan.nik WHERE tbl_sasaran.kel_domisili = "Rawasari"
        ORDER BY tbl_pelaporan.id desc')->num_rows()." ,";
      echo $this->db->query(
        'SELECT * 
        FROM
        tbl_sasaran
        RIGHT JOIN tbl_pelaporan ON tbl_sasaran.nik = tbl_pelaporan.nik WHERE tbl_sasaran.kec_domisili <> "Cempaka Putih"
        ORDER BY tbl_pelaporan.id desc')->num_rows()." ,";
      ?>
      ],
      backgroundColor: themeColors,
    }]
  };

  var pieChartconfig = {
    type: 'pie',

    // Chart Options
    options: piechartOptions,

    data: piechartData
  };

  // Create the chart
  var pieSimpleChart = new Chart(pieChartctx, pieChartconfig);


});
</script>