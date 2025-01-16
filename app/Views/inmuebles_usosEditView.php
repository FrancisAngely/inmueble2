
<?php include("templates/parte1.php");?>
<div class="row">
    <div class="col-12">
 <?= validation_list_errors();
$errors=validation_errors();
        
        //SELECT `id`, `id_inmuebles`, `fecha_apertura`, `fecha_cierre`, `comentario`, `created_at`, `updated_at` FROM `inmuebles_usos` WHERE 1
?>
        
        <form action="<?php echo baseUrl();?>/inmuebles_usos/actualizar" method="post" enctype="multipart/form-data" id="form1">
            
     <input type="hidden" class="form-control" id="id" name="id"  value="<?= $datos["id"];?>"> 
        <div class="mb-3 mt-5">
        <label for="id_inmuebles" class="form-label">Inmueble</label>
            
            
            <?php
        if(isset($errors["id_inmuebles"])) 
            $valor=$datos["id_inmuebles"]; 
        else { 
        if(set_value("id_inmuebles")!="")  $valor=set_value("id_inmuebles");
        else  $valor=$datos["id_inmuebles"]; 
        }
        ?>
            
            
      <?php echo form_dropdown('id_inmuebles',$optionsInmuebles,$valor,'class="form-control" id="id_inmuebles" ');?>
            <?php
          if(isset($errors["id_inmuebles"])) echo validation_show_error('id_inmuebles');  
        ?> 
        </div>    
            
            
        <div class="mb-3">
        <label for="fecha_apertura" class="form-label">fecha_apertura</label>
        <?php
        if(isset($errors["fecha_apertura"])) 
            $valor=$datos["fecha_apertura"]; 
        else { 
        if(set_value("fecha_apertura")!="")  $valor=set_value("fecha_apertura");
        else  $valor=$datos["fecha_apertura"]; 
        }
        ?>
        <input type="date" class="form-control" id="fecha_apertura" name="fecha_apertura" placeholder="fecha_apertura" value="<?= $valor;?>">
        <?php
          if(isset($errors["fecha_apertura"])) echo validation_show_error('fecha_apertura');  
        ?>
            
            </div>
            
    <div class="mb-3">
        <label for="fecha_cierre" class="form-label">fecha_cierre</label>
      <?php
        if(isset($errors["fecha_cierre"])) 
            $valor=$datos["fecha_cierre"]; 
        else { 
        if(set_value("fecha_cierre")!="")  $valor=set_value("fecha_cierre");
        else  $valor=$datos["fecha_cierre"]; 
        }
        ?>
        <input type="date" class="form-control" id="fecha_cierre" name="fecha_cierre" placeholder="fecha_cierre" value="<?= $valor;?>">
         <?php
          if(isset($errors["fecha_cierre"])) echo validation_show_error('fecha_cierre');  
        ?>
        </div>

            
            <div class="mb-3">
        <label for="comentario" class="form-label">comentario</label>
      <?php
        if(isset($errors["comentario"])) 
            $valor=$datos["comentario"]; 
        else { 
        if(set_value("comentario")!="")  $valor=set_value("comentario");
        else  $valor=$datos["comentario"]; 
        }
        ?>
        <textarea  class="form-control" id="comentario" name="comentario"><?= $valor;?></textarea>
    <?php
          if(isset($errors["comentario"])) echo validation_show_error('comentario');  
        ?>
        </div>
            
        


        <div class="mb-3"> 
        <input type="submit" class="form-control" value="Aceptar" id="btnform11">
        </div>

    </form>
        
         </div>
</div>
<?php include("templates/parte2.php");?>