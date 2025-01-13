
<?php include("templates/parte1.php");?>
<div class="row">
    <div class="col-12">

        
        <table class="table datatable" id="tabla">
          <thead>
    <tr>
        <th>Id</th> 
        <th>Usuario</th>
        <th>Acciones</th>
   </tr>
              </thead>
          <tbody>
        <?php
        
        
         if(count($usuarios)>0){
             foreach($usuarios as $r){
                 ?>
                    <tr>
                    <td><?php echo $r["id"];?></td> 
                    <td><?php echo $r["usuario"];?></td>  
                    <td><a href="<?php echo baseUrl();?>/usuarios/editar?id=<?php echo $r["id"];?>"><i class="fa-solid fa-pen-to-square fa-2
                        x"></i></a>
                    &nbsp;&nbsp;
                     <a href="<?php echo baseUrl();?>/usuarios/eliminar?id=<?php echo $r["id"];?>" data-id="<?php echo $r["id"];?>" class="borrar"><i class="fa-solid fa-trash text-danger"></i>
                        
                <a href="modulo_usuarios_print.php?id=<?php echo $r["id"];?>"><i class="fa-solid fa-print"></i></a>
                    &nbsp;&nbsp;        
                </a>    
                    </td>
                    </tr>
                <?php
                 
                 
             }
         }
        ?>
          </tbody>
          <tfooter>
    <tr>
        <th>Id</th> 
        <th>Usuario</th>
      <th>Acciones</th>
   </tr>
              </tfooter>
    </table>
        
         </div>
</div>
<?php include("templates/parte2.php");?>

<script>
  $(document).ready(function() {
    $("#exportar").click(function() {
      $("#formExportar").submit();
    });

    $(".borrar").click(function() {
      let id = $(this).attr('data-id');
      let padre = $(this).parent().parent();
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
        title: "Desea eliminar al usuario?",
        text: "no hay vuelta atrás!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, borrar!",
        cancelButtonText: "No, mantener!",
        reverseButtons: true
      }).then((result) => {

        if (result.isConfirmed) {

          $.ajax({
            data: {
              id: id
            },
            method: "POST",
            url: "modulo_usuarios_delete.php",
            success: function(result) {
              if (result == 1) {
                swalWithBootstrapButtons.fire({
                  title: "Eliminado!",
                  text: "Usuario dado de baja",
                  icon: "success"
                });
                padre.hide();
              } else {
                swalWithBootstrapButtons.fire({
                  title: "No Eliminado!",
                  text: "Usuario NO dado de baja",
                  icon: "error"
                });
              }
            }
          });

        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {

        }
      });
    });

    });
</script>