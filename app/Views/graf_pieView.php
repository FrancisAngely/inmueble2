

<canvas id="<?= $idGrafPie;?>" height="260"></canvas>

<script src="<?php echo baseUrl();?>/templates/assets/js/vendor.min.js"></script>


  <script src="<?php echo baseUrl();?>/assets/libs/chart-js/Chart.bundle.min.js"></script>      
<script>
var xValues = [<?= $xValues;?>];
var yValues = [<?= $yValues;?>];
var barColors = [<?= $colores;?>];//"red", "green","blue","orange","brown"
new Chart("<?= $idGrafPie;?>", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "World Wide Wine Production"
    }
  }
});


</script>