<?php
$personas_decode = json_decode(file_get_contents('personas.json'), true);
$proyectos_decode = json_decode(file_get_contents('proyectos.json'), true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio Evaluación ANDDES</title>
</head>
<body>
  <h3>Ejercicio Evaluación ANDDES</h3>
  <table border="1">
    <thead>
      <tr>
        <th></th>
        <?php foreach ($personas_decode as $persona) { ?>
        <th><?=$persona['nombres']?></th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($proyectos_decode as $proyecto) { ?>
      <tr>
        <td><?=$proyecto['descripcion']?></td>
        <?php
        foreach ($personas_decode as $persona) {
          $dato = '';
          foreach ($proyecto['equipo'] as $equipo) {
            if ($equipo['id'] == $persona['id']) {
              $dato = $equipo['cargo'];
            }
          } ?>
          <td><?=$dato?></td>
        <?php
        } ?>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>