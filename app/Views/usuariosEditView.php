
<?php include("templates/parte1.php");?>
<div class="row">
    <div class="col-12">
 <?= validation_list_errors();
$errors=validation_errors();
       // var_dump(set_value("usuario"));
        //SELECT `id`, `id_roles`, `usuario`, `password`, `email`, `created_at`, `updated_at` FROM `usuarios` WHERE 1
?>
        
        <form action="<?php echo baseUrl();?>/usuarios/actualizar" method="post" enctype="multipart/form-data" id="form1">
            <input type="hidden" name="id" id="id" value="<?= $datos["id"];?>">
        <div class="mb-3">
        <label for="usuario" class="form-label">usuario</label>
        <?php
        if(isset($errors["usuario"])) 
            $valor=$datos["usuario"]; 
        else { 
        if(set_value("usuario")!="")  $valor=set_value("usuario");
        else  $valor=$datos["usuario"]; 
        }
        ?>
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" value="<?=rellenarDato($errors,$datos,"usuario");?>">
        <?php
          if(isset($errors["usuario"])) echo validation_show_error('usuario');  
        ?>
            
            </div>
            
    <div class="mb-3">
        <label for="password" class="form-label">password</label>
      
        
        
        <input type="text" class="form-control" id="password" name="password" placeholder="password" value="<?=rellenarDato($errors,$datos,"password");?>">
         <?php
          if(isset($errors["password"])) echo validation_show_error('password');  
        ?>
        </div>

            
            <div class="mb-3">
        <label for="email" class="form-label">email</label>
      
        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?=rellenarDato($errors,$datos,"email");?>">
    <?php
          if(isset($errors["email"])) echo validation_show_error('email');  
        ?>
        </div>
            
        <div class="mb-3">
        <label for="id_roles" class="form-label">Role</label>
      <?php echo form_dropdown('id_roles',$optionsRoles, rellenarDato($errors,$datos,"id_roles"),'class="form-control" id="id_roles" ');?>
            <?php
          if(isset($errors["id_roles"])) echo validation_show_error('id_roles');  
        ?> 
        </div>


        <div class="mb-3"> 
        <input type="submit" class="form-control" value="Aceptar" id="btnform11">
        </div>

    </form>
        
         </div>
</div>
<?php include("templates/parte2.php");?>