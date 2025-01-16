

<div class="col-lg-6 mt-2">
    <div class="demo-box">
    <h4 class="header-title">Stacked Bar chart</h4>
        <p class="sub-header">
            With the stack plugin, you can have Flot stack the series. This is useful if you wish to display both a total and the constituents it is made of.
        </p>

    <div id="ordered-bars-chart" style="height: 320px;"></div>
    </div>
</div>



 <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <script src="assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.resize.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.pie.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.stack.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.orderBars.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.axislabels.js"></script>

<script>

$(function () {
    var css_id = "#ordered-bars-chart";
    var data = [
        {label: 'foo', data: [[1,300], [2,300], [3,300], [4,300], [5,300]]},
        {label: 'bar', data: [[1,800], [2,600], [3,400], [4,200], [5,0]]},
        {label: 'baz', data: [[1,100], [2,200], [3,300], [4,400], [5,500]]},
    ];
    var options = {
        series: {stack: 0,
                 lines: {show: false, steps: false },
                 bars: {show: true, barWidth: 0.9, align: 'center',},},
        xaxis: {ticks: [[1,'One'], [2,'Two'], [3,'Three'], [4,'Four'], [5,'Five']]},
    };

    $.plot($(css_id), data, options);
});


</script>