
<?php include("templates/parte1.php");?>
<div class="row">
    <div class="col-12">
 <?= validation_list_errors();
$errors=validation_errors();
        
        //SELECT `id`, `id_roles`, `usuario`, `password`, `email`, `created_at`, `updated_at` FROM `usuarios` WHERE 1
?>
        
        <form action="<?php echo baseUrl();?>/usuarios/crear" method="post" enctype="multipart/form-data" id="form1">
        <div class="mb-3">
        <label for="usuario" class="form-label">usuario</label>
       
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" value="<?= set_value('usuario');?>">
        <?php
          if(isset($errors["usuario"])) echo validation_show_error('usuario');  
        ?>
            
            </div>
            
    <div class="mb-3">
        <label for="password" class="form-label">password</label>
      
        <input type="text" class="form-control" id="password" name="password" placeholder="password" value="<?= set_value('password');?>">
         <?php
          if(isset($errors["password"])) echo validation_show_error('password');  
        ?>
        </div>

            
            <div class="mb-3">
        <label for="email" class="form-label">email</label>
      
        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?= set_value('email');?>">
    <?php
          if(isset($errors["email"])) echo validation_show_error('email');  
        ?>
        </div>
            
        <div class="mb-3">
        <label for="id_roles" class="form-label">Role</label>
      <?php echo form_dropdown('id_roles',$optionsRoles,set_value('id_roles'),'class="form-control" id="id_roles" ');?>
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