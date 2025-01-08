
<?php include("templates/parte1.php");?>
<div class="row">
    <div class="col-12">
 <?= validation_list_errors();
$errors=validation_errors();
?>
        
        <form action="<?php echo baseUrl();?>/roles/crear" method="post" enctype="multipart/form-data" id="form1">
        <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <span id="role_error" class="text-danger"></span>
        <input type="text" class="form-control" id="role" name="role" placeholder="Role">
        </div>

        <div class="mb-3"> 
        <input type="submit" class="form-control" value="Aceptar" id="btnform11">
        </div>

    </form>
        
         </div>
</div>
<?php include("templates/parte2.php");?>