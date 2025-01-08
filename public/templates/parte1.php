<?php include("head.php");?>

            <!-- Navigation Bar-->
            <?php include("header.php");?>
                <!-- End Navigation Bar-->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                             <?php if(isset($item_active)){
                                                    if($item_active!=""){ ?>                    
                                                     <li class="breadcrumb-item active"><?php echo $item_active;?></li>
                                                <?php }}?>
                                      
                                            
                                            
                                            <?php 
                                            
                                            if(isset($numitem)){
                                            for($i=1;$i<=$numitem;$i++){
                                            
                                                if((isset(${"item".$i})) and (isset(${"itemhref".$i}))){            
                                                    ?>
                                            <li class="breadcrumb-item"><a href="<?php echo baseUrl().${"itemhref".$i};?>"><?php echo ${"item".$i};?></a></li>
                                            <?php 
                                                }
                                            }
                                            }
                                            ?>
                                       
                                           
                                        </ol>
                                    </div>
                                    <?php if(isset($titulo)){
                                            if($titulo!=""){ ?>                    
                                    <h4 class="page-title"><?php echo $titulo;?></h4>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 