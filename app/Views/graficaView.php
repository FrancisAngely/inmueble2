
<?php include("templates/parte1.php");?>
<div class="row">
    <div class="col-12">
 <?= validation_list_errors();
$errors=validation_errors();
        
    
?>
    
       <div class="col-lg-6 mt-2">
    <div class="demo-box">
    <h4 class="header-title">Stacked Bar chart</h4>
        <p class="sub-header">
            With the stack plugin, you can have Flot stack the series. This is useful if you wish to display both a total and the constituents it is made of.
        </p>

    <div id="ordered-bars-chart" style="height: 320px;"></div>
    </div>
</div>
        <?php var_dump($datos);?>
         </div>
</div>
<?php include("templates/parte2.php");?>

<script>

$(function () {
    var css_id = "#ordered-bars-chart";
    var data = [
        {label: 'Num. usuarios', data: [<?= $datalabel;?>]},
    
    ];
    var options = {
        series: {stack: 0,
                 lines: {show: false, steps: false },
                 bars: {show: true, barWidth: 0.9, align: 'center',},},
        xaxis: {ticks: [<?= $ticks;?>]},
    };

    $.plot($(css_id), data, options);
});


</script>