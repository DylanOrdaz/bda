<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Consulta de citas entre dos fechas</title>
  <link rel="icon" href="img/hospital.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/mdb.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg">
  <div class="d-flex justify-content-center align-items-center text-brown">
    <form class="mt-3 needs-validation" action="tablePacientesBusqueda.php" method="post" novalidate>
      <h3 class="font-weight-bold">Busqueda de pacientes</h3>
      <div class="mt-4">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="filtro">Selecciona el tipo de busqueda</label>
          <select class="browser-default custom-select" id="filtro" name="filtro" required>
            <option selected value="">Selecciona tipo de busqueda</option>
            <option value="idPaciente">Id</option>
            <option value="nombre">Nombre del paciente</option>
            <option value="apellidoP">Apellido Paterno</option>
            <option value="celular">Numero de celular</option>
            <option value="email">E-mail</option>
            <option value="localidad">Localidad</option>
            </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="valor">Valor</label>
          <input placeholder="Introduce el valor de tu busqueda" type="text" name="valor" id="valor" class="form-control" required>
        </div>
      </div>
       <div class="form-row col-md-12">
        <a href="index.html" class="btn btn-default btn-md">Regresar</a>
        <button type="submit" class="btn btn-primary btn-md ml-auto">Buscar</button>
       </div>
       </div>
     </form>
  </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript">
    (function() {
        'use strict';
        window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        }
        form.classList.add('was-validated');
        }, false);
        });
        }, false);
})();

  </script>

</body>
</html>
