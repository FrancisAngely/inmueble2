

<div id="<?= $idGrafLine;?>" style="max-width:700px; height:400px"></div>

        
    <script src="https://www.gstatic.com/charts/loader.js"></script>
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
const chart = new google.visualization.LineChart(document.getElementById('<?= $idGrafLine;?>'));
chart.draw(data, options);
}
 google.charts.load('current',{packages:['corechart']});

google.charts.setOnLoadCallback(drawChart);


</script>