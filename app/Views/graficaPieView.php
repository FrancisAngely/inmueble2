
<?php include("templates/parte1.php");?>
<div class="row">
    <div class="col-12">
 <?= validation_list_errors();
$errors=validation_errors();
        
    
?>
    
       <div class="col-lg-6 mt-2">
        <div class="demo-box">
            <h4 class="header-title">Pie Chart</h4>
            <p class="sub-header">
                Pie and doughnut charts are probably the most commonly used chart there are. They are divided into segments, the arc of each segment shows the proportional value of each piece of data.
            </p>

            <canvas id="myChart" height="260"></canvas>

        </div>
    </div>
        <?php var_dump($datos);?>
         </div>
</div>
<?php include("templates/parte2.php");?>

<script>
var xValues = [<?= $xValues;?>];
var yValues = [<?= $yValues;?>];
var barColors = [<?= $colores;?>];//"red", "green","blue","orange","brown"
new Chart("myChart", {
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