
<?php include("templates/parte1.php");?>
<div class="row">
    <div class="col-12">
 <?= validation_list_errors();
$errors=validation_errors();
        
    
?>
    
       <div class="col-lg-6 mt-2">
        <div class="demo-box">
            <h4 class="header-title">Line Chart</h4>
            <p class="sub-header">
                Pie and doughnut charts are probably the most commonly used chart there are. They are divided into segments, the arc of each segment shows the proportional value of each piece of data.
            </p>

          <div id="myChart" style="max-width:700px; height:400px"></div>

        </div>
    </div>
        <?php var_dump($datos);?>
         </div>
</div>
<?php include("templates/parte2.php");?>

<script>
function drawChart() {
// Set Data
const data = google.visualization.arrayToDataTable([
  ['Price', 'Size'],
  [50,7],[60,8],[70,8],[80,9],[90,9],[100,9],
  [110,10],[120,11],[130,14],[140,14],[150,15]
  ]);
// Set Options
const options = {
  title: 'House Prices vs Size',
  hAxis: {title: 'Square Meters'},
  vAxis: {title: 'Price in Millions'},
  legend: 'none'
};
// Draw Chart
const chart = new google.visualization.LineChart(document.getElementById('myChart'));
chart.draw(data, options);
}
 google.charts.load('current',{packages:['corechart']});

google.charts.setOnLoadCallback(drawChart);


</script>