
<?php include("templates/parte1.php");?>
<div class="row">
    <div class="col-12">
 <?= validation_list_errors();
$errors=validation_errors();
        
        //SELECT `id`, `id_inmuebles`, `fecha_apertura`, `fecha_cierre`, `comentario`, `created_at`, `updated_at` FROM `inmuebles_usos` WHERE 1
?>
        
        <form action="<?php echo baseUrl();?>/inmuebles_usos/crear" method="post" enctype="multipart/form-data" id="form1">
            
    
        <div class="mb-3 mt-5">
        <label for="id_inmuebles" class="form-label">Inmueble</label>
      <?php echo form_dropdown('id_inmuebles',$optionsInmuebles,set_value('id_inmuebles'),'class="form-control" id="id_inmuebles" ');?>
            <?php
          if(isset($errors["id_inmuebles"])) echo validation_show_error('id_inmuebles');  
        ?> 
        </div>    
            
            
        <div class="mb-3">
        <label for="fecha_apertura" class="form-label">fecha_apertura</label>
       
        <input type="date" class="form-control" id="fecha_apertura" name="fecha_apertura" placeholder="fecha_apertura" value="<?= set_value('fecha_apertura');?>">
        <?php
          if(isset($errors["fecha_apertura"])) echo validation_show_error('fecha_apertura');  
        ?>
            
            </div>
            
    <div class="mb-3">
        <label for="fecha_cierre" class="form-label">fecha_cierre</label>
      
        <input type="date" class="form-control" id="fecha_cierre" name="fecha_cierre" placeholder="fecha_cierre" value="<?= set_value('fecha_cierre');?>">
         <?php
          if(isset($errors["fecha_cierre"])) echo validation_show_error('fecha_cierre');  
        ?>
        </div>

            
            <div class="mb-3">
        <label for="comentario" class="form-label">comentario</label>
      
        <textarea  class="form-control" id="comentario" name="comentario"><?= set_value('comentario');?></textarea>
    <?php
          if(isset($errors["comentario"])) echo validation_show_error('comentario');  
        ?>
        </div>
            
        <div class="mb-3">
        <label for="documento" class="form-label">Documento</label>
      
        <input type="file" class="form-control" id="documento" name="documento" >
    <?php
          if(isset($errors["documento"])) echo validation_show_error('documento');  
        ?>
        </div> 


        <div class="mb-3"> 
        <input type="submit" class="form-control" value="Aceptar" id="btnform11">
        </div>

    </form>
        
         </div>
</div>
<?php include("templates/parte2.php");?>