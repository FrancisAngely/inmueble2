

<div id="<?= $idGrafBarra;?>" style="height: 320px;"></div>
 <script src="<?php echo baseUrl();?>/templates/assets/js/vendor.min.js"></script>

        <script src="<?php echo baseUrl();?>/templates/assets/libs/morris-js/morris.min.js"></script>
        <script src="<?php echo baseUrl();?>/templates/assets/libs/raphael/raphael.min.js"></script>

        <script src="<?php echo baseUrl();?>/templates/assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="<?php echo baseUrl();?>/templates/assets/js/app.min.js"></script>

<script src="<?php echo baseUrl();?>/templates/assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo baseUrl();?>/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

  

        <script src="<?php echo baseUrl();?>/assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="<?php echo baseUrl();?>/assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="<?php echo baseUrl();?>/assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo baseUrl();?>/assets/libs/flot-charts/jquery.flot.resize.js"></script>
        <script src="<?php echo baseUrl();?>/assets/libs/flot-charts/jquery.flot.pie.js"></script>
        <script src="<?php echo baseUrl();?>/assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="<?php echo baseUrl();?>/assets/libs/flot-charts/jquery.flot.stack.js"></script>
        <script src="<?php echo baseUrl();?>/assets/libs/flot-charts/jquery.flot.orderBars.js"></script>
        <script src="<?php echo baseUrl();?>/assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
        <script src="<?php echo baseUrl();?>/assets/libs/flot-charts/jquery.flot.axislabels.js"></script>
  <!-- Chart JS -->
        <script src="<?php echo baseUrl();?>/assets/libs/chart-js/Chart.bundle.min.js"></script>
 <!-- Google Charts js -->
   <script src="https://www.gstatic.com/charts/loader.js"></script>
<script>

$(function () {
    var css_id = "#<?= $idGrafBarra;?>";
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