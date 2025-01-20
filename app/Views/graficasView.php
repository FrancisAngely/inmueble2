
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

    <?php echo $grafica1;?>
    </div>
</div>
        
        <div class="col-lg-6 mt-2">
    <div class="demo-box">
    <h4 class="header-title">Stacked Bar chart</h4>
        <p class="sub-header">
            With the stack plugin, you can have Flot stack the series. This is useful if you wish to display both a total and the constituents it is made of.
        </p>

    <?php echo $grafica2;?>
    </div>
</div>
        
        <div class="col-lg-6 mt-2">
    <div class="demo-box">
    <h4 class="header-title">Stacked Bar chart</h4>
        <p class="sub-header">
            With the stack plugin, you can have Flot stack the series. This is useful if you wish to display both a total and the constituents it is made of.
        </p>

    <?php echo $grafica3;?>
    </div>
</div>
        
        <div class="col-lg-6 mt-2">
    <div class="demo-box">
    <h4 class="header-title">Stacked Bar chart</h4>
        <p class="sub-header">
            With the stack plugin, you can have Flot stack the series. This is useful if you wish to display both a total and the constituents it is made of.
        </p>

    <?php echo $grafica4;?>
    </div>
</div>
        
         </div>
</div>
<?php include("templates/parte2.php");?>

