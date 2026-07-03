<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Orientador</title>

<style>

body{
    font-family:Poppins;
    margin:0;
    background:#0f5e2e;
}

.header{
    background:#083b1b;
    color:white;
    padding:20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

button{
    padding:10px 15px;
    border:none;
    cursor:pointer;
    border-radius:8px;
}

.volver{
    background:#d62828;
    color:white;
}

.container{
    padding:20px;
}

.form{
    background:white;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
}

.form input, .form select{
    width:100%;
    padding:10px;
    margin:6px 0;
    border:1px solid #ccc;
    border-radius:8px;
}

.guardar{
    width:100%;
    background:#0f5e2e;
    color:white;
    font-weight:bold;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
    background:white;
}

th,td{
    padding:10px;
    border:1px solid #ddd;
    text-align:center;
}

th{
    background:#0f5e2e;
    color:white;
}

</style>
</head>

<body>

<div class="header">
    <h2>🧑‍🏫 Panel Orientador</h2>

    <button class="volver" onclick="window.location.href='principal.php'">
        Volver al menú
    </button>
</div>

<div class="container">

<!-- FORMULARIO REAL (PHP) -->
<div class="form">

<form action="procesar_orientador.php" method="POST">

    <h3>📝 Nuevo Caso</h3>

    <input type="text" name="alumno" placeholder="Nombre del alumno" required>

    <input type="text" name="grupo" placeholder="Grupo" required>

    <input type="text" name="motivo" placeholder="Motivo del reporte" required>

    <select name="estado">
        <option>Pendiente</option>
        <option>En proceso</option>
        <option>Atendido</option>
    </select>

    <button type="submit" class="guardar">
        Guardar y agregar
    </button>

</form>

</div>

<h3>📋 Seguimiento de Casos</h3>

<table>

<thead>
<tr>
    <th>Alumno</th>
    <th>Grupo</th>
    <th>Motivo</th>
    <th>Estado</th>
</tr>
</thead>

<tbody>

<?php
$sql = "SELECT * FROM casos ORDER BY id DESC";
$resultado = mysqli_query($conexion, $sql);

while($fila = mysqli_fetch_assoc($resultado)){
?>

<tr>
    <td><?php echo $fila['alumno']; ?></td>
    <td><?php echo $fila['grupo']; ?></td>
    <td><?php echo $fila['motivo']; ?></td>
    <td><?php echo $fila['estado']; ?></td>
</tr>

<?php } ?>

</tbody>

</table>

</div>

</body>
</html>