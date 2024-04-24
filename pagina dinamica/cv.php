<?php
<<<<<<< HEAD

$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "CV";
$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);


if (!$enlace) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}


$query = "SELECT * FROM datos ORDER BY id DESC LIMIT 1"; // Obtener el último registro insertado
$resultado = mysqli_query($enlace, $query);


if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    
    $nombre = $fila['Nombre'];
    $nacimiento = $fila['Nacimiento'];
    $ocupacion = $fila['Ocupacion'];
    $contacto = $fila['Contacto'];
    $nacionalidad = $fila['Nacionalidad'];
    $nivel = $fila['Nivel'];
    $lenguajes = $fila['Lenguajes'];
    $aptitudes = $fila['Aptitudes'];
    $habilidades = $fila['Habilidades'];
    $perfil = $fila['Perfil'];
    // Decodificar el JSON para obtener los datos de experiencia laboral y formación
    $experienciaLaboral = isset($fila['experienciaLaboral']) ? json_decode($fila['experienciaLaboral']) : [];
    $formacion = isset($fila['formacion']) ? json_decode($fila['formacion']) : [];
} else {
    echo "No se encontraron datos del CV.";
}


mysqli_close($enlace);
?>
=======
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

>>>>>>> 98f9d21abd6594e924f15d9ec2f34be7fd895f67
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Currículum Vitae</title>
    <style> 
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
        }

        .section {
            background-color: #EADAF6;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
        }

        h1, h2, h3 {
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
        }

        strong {
            font-weight: bold;
        }

        .name-box {
            background-color: #D3B3EA;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
            grid-column: span 2;
        }

        .name-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .name-img img {
            width: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <div class="name-box">
        <img src="img.jpg" alt="Imagen de perfil" class="name-img">
        <h1><?php echo $nombre; ?></h1>
    </div>

    <div class="container">
        <div class="section">
            <h2>Datos Personales</h2>
            <p><strong>Fecha de Nacimiento:</strong> <?php echo $nacimiento; ?></p>
            <p><strong>Ocupación:</strong> <?php echo $ocupacion; ?></p>
            <p><strong>Contacto:</strong> <?php echo $contacto; ?></p>
            <p><strong>Nacionalidad:</strong> <?php echo $nacionalidad; ?></p>
        </div>
        <div class="section">
            <h2>Perfil, Experiencia Laboral y Formación</h2>
            <p><strong>Perfil:</strong> <?php echo $perfil; ?></p>
            <p><strong>Experiencia Laboral:</strong><br>
                <?php 
                foreach($experienciaLaboral as $experiencia) {
                    echo $experiencia . "<br> ";
                }
                ?>
            </p>
            <p><strong>Formación:</strong><br>
                <?php 
                foreach($formacion as $formacionItem) {
                    echo $formacionItem . "<br>";
                }
                ?>
            </p>
        </div>
    </div>

</body>
</html>







=======
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
>>>>>>> 98f9d21abd6594e924f15d9ec2f34be7fd895f67






    
    