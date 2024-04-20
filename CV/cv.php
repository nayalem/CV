<?php
// Incluir el archivo de conexión a la base de datos
require("index.php");

// Recuperar los datos del usuario de la base de datos
$consulta = "SELECT * FROM datos ORDER BY id DESC LIMIT 1";
$resultado = mysqli_query($enlace, $consulta);

// Verificar si la consulta fue exitosa
if($resultado) {
    // Obtener la fila de resultados
    $fila = mysqli_fetch_assoc($resultado);

    // Asignar los datos a variables para usar en el CV
    $Nombre = $fila['Nombre'];
    $Nacimiento = $fila['Nacimiento'];
    $Ocupacion = $fila['Ocupacion'];
    $Contacto = $fila['Contacto'];
    $Nacionalidad = $fila['Nacionalidad'];
    $Nivel = $fila['Nivel'];
    $Lenguajes = $fila['Lenguajes'];
    $Aptitudes = $fila['Aptitudes'];
    $Habilidades = $fila['Habilidades'];
    $Perfil = $fila['Perfil'];
} else {
    // Si la consulta falló, mostrar un mensaje de error
    echo "Error al ejecutar la consulta: " . mysqli_error($enlace);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="fondo">
        <div id="nombre" class="areas">
            <div class="img1">
                <img src="img.jpg" alt="Imagen">
            </div>
            <div class="text">
                <h1><?php echo isset($Nombre) ? $Nombre : ''; ?></h1>
                <h3><?php echo isset($Ocupacion) ? $Ocupacion : ''; ?></h3>
            </div>
        </div>
        <div id="perfil" class="text">
            <h2 class="subtitle">Perfil</h2>
            <p><?php echo isset($Perfil) ? $Perfil : ''; ?></p>
        </div>
        <div id="contacto" class="externas">
            <h2 class="title">CONTACTO</h2>
            <ul>
                <li>
                    <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <span class="texts"><?php echo isset($Contacto) ? $Contacto : ''; ?></span>
                </li>
            </ul>
            <!-- Agregar el resto de la información de contacto -->
            <h2 class="title">INFORMACIÓN PERSONAL</h2>
            <ul>
                <li><span class="texts">Fecha de Nacimiento: <?php echo isset($Nacimiento) ? $Nacimiento : ''; ?></span></li>
                <li><span class="texts">Nacionalidad: <?php echo isset($Nacionalidad) ? $Nacionalidad : ''; ?></span></li>
            </ul>
            <h2 class="title">NIVEL DE INGLÉS</h2>
            <ul>
                <li><span class="texts">Nivel de inglés: <?php echo isset($Nivel) ? $Nivel : ''; ?></span></li>
            </ul>
            <h2 class="title">LENGUAJES DE PROGRAMACIÓN</h2>
            <ul>
                <li><span class="texts">Lenguajes de programación: <?php echo isset($Lenguajes) ? $Lenguajes : ''; ?></span></li>
            </ul>
            <h2 class="title">APTITUDES</h2>
            <ul>
                <li><span class="texts">Aptitudes: <?php echo isset($Aptitudes) ? $Aptitudes : ''; ?></span></li>
            </ul>
            <h2 class="title">HABILIDADES</h2>
            <ul>
                <li><span class="texts">Habilidades: <?php echo isset($Habilidades) ? $Habilidades : ''; ?></span></li>
            </ul>
        </div>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
mysqli_close($enlace);
?>






    
    