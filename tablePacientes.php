<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Registro de pacientes</title>
  <link rel="icon" href="img/hospital.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/mdb.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg">
<?php
            require_once "../UserPacientes.php";
            $db = new Database;
            $user = new User($db);
            $users = $user->get();        
        ?>
  <div class="container mt-3">
    <h3 class="font-weight-bold">Registro de pacientes</h3>
    <br>
      <div class="row col-md-12">
      <a href="index.html" class="btn btn-default btn-md">Regresar</a>
      </div>
        <tbody>
        <?php
                if( ! empty( $users ) ) {
                ?>
                <table class="table table-bordered table-light">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Paciente ID</th>
                    <th scope="col">Consultorio </th>
                    <th scope="col">Nombre (s)</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Edad</th>
                  </tr>
                </thead>
                    <?php foreach( $users as $user )
                    {
                    ?>
                        <tr>
                            <td><?php echo $user->id ?></td>
                            <td><?php echo $user->consultorio ?></td>
                            <td><?php echo $user->nompaciente ?></td>
                            <td><?php echo $user->apepaciente ?></td>
                            <td><?php echo $user->telefono ?></td>
                            <td><?php echo $user->fecha ?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo User::baseurl() ?>app/edit.php?user=<?php echo $user->id ?>">Edit</a> 
                                <a class="btn btn-info" href="<?php echo User::baseurl() ?>app/delete.php?user=<?php echo $user->id ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    echo '<a class="btn btn-outline-info btn-sm" onClick="loadDynamicContentModal('.$row['paciente_id'].')">Cuadro Clinico</a>';                    
                    echo '&nbsp;';
                    echo '<a class="btn btn-outline-light-green btn-sm" href="actPaciente.php?id='.$row['paciente_id'].'">Actualizar</a>';                    
                    echo '&nbsp;';
                    echo '<a class="btn btn-outline-danger btn-sm" href="deletePaciente.php?id='.$row['paciente_id'].'">Eliminar</a>';
                    //echo '</div>';
                    echo '</td>';
                echo '</tr>';
                }
                Database::disconnect();
                ?>                  
        </tbody>
      </table>
      <div class="row col-md-12">
      <a href="index.html" class="btn btn-default btn-md">Regresar</a>
      <a href="regPaciente.php" class="btn btn-default btn-md ml-auto">Registra un paciente</a>
      </div>
      <!-- Modal----------------------------------------------------------------------------------->
      <div class="modal fade" id="bootstrap-modal" role="dialog">
        <div class="modal-dialog" role="document"> 
          <!-- Modal contenido-->
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cuadro clinico del paciente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
              <div id="conte-modal"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-elegant" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    <!-- ------------------------------------------------------------------------------------>
  </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript">
    function loadDynamicContentModal(modal){
  var options = {
      modal: true,
      height:300,
      width:600
    };
  $('#conte-modal').load('datosModalPaciente.php?my_modal='+modal, function() {
    $('#bootstrap-modal').modal({show:true});
    });    
}
  </script>
</body>
</html>

