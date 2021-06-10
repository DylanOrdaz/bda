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
  <div class="container mt-3">
    <h3 class="font-weight-bold">Registro de pacientes</h3>
    <br>
      <div class="row col-md-12">
      <a href="index.html" class="btn btn-default btn-md">Regresar</a>
      </div>
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
        <tbody>
          <?php 
                include 'Database.php';
                include 'funcs.php';
                $pdo = Database::connect();
                //$sql = 'SELECT idPaciente, nombre, CONCAT (apellidoP," ", apellidoM) as apellidos, celular, email, localidad, fechaNacimiento from paciente order by idPaciente;';
                $sql = 'SELECT paciente_id, consultorio_nombre, CONCAT(paciente_nombre,' ',paciente_apellido) AS Nombre,paciente_telefono,paciente_fecha_nacimiento from pacientes p INNER JOIN consultorios c ON p.consultorio_id = c.consultorio_id;';
                foreach ($pdo->query($sql) as $row) {
                echo '<tr>';                  
                    echo '<td>'. $row['paciente_id'] . '</td>';
                    echo '<td>'. $row['consultorio_nombre'] . '</td>';
                    echo '<td>'. $row['paciente_nombre'] . '</td>';
                    echo '<td>'. $row['paciente_apellido'] . '</td>';
                    echo '<td>'. $row['paciente_telefono'] . '</td>';
                    echo '<td>'. calculaedad($row['paciente_fecha_nacimiento']) . '</td>';
                    echo '<td width=390>';
                    //echo '<div class="btn-toolbar" role="group">';
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

