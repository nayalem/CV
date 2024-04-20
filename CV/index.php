<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $baseDeDatos = "CV";
    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de CV</title>
</head>
<body>
<h1>Formulario de CV</h1>
    <form action="#" name="CV" method="POST">
        <label for="Nombre">Nombre y Apellidos:</label><br>
        <input type="text" id="Nombre" name="Nombre" required><br><br>

        <label for="Nacimiento">Fecha de Nacimiento:</label><br>
        <input type="date" id="Nacimiento" name="Nacimiento" required><br><br>

        <label for="Ocupacion">Ocupación:</label><br>
        <input type="text" id="Ocupacion" name="Ocupacion" required><br><br>

        <label for="Contacto">Contacto (teléfono, email):</label><br>
        <input type="text" id="Contacto" name="Contacto" required><br><br>

        <label for="Nacionalidad">Nacionalidad:</label><br>
        <select id="Nacionalidad" name="Nacionalidad" required>
            <option value="">Seleccione...</option>
            <option value="peruana">Peruana</option>
            <option value="española">Española</option>
            <option value="mexicana">Mexicana</option>
        
        </select><br><br>

        <label>Nivel de inglés:</label><br>
        <input type="radio" id="Basico" name="Nivel" value="Basico" required>
        <label for="Basico">Básico</label><br>
        <input type="radio" id="Intermedio" name="Nivel" value="Intermedio">
        <label for="Intermedio">Intermedio</label><br>
        <input type="radio" id="Avanzado" name="Nivel" value="Avanzado">
        <label for="Avanzado">Avanzado</label><br>
        <input type="radio" id="Fluido" name="Nivel" value="Fluido">
        <label for="Fluido">Fluido</label><br><br>

        <label for="Lenguajes">Lenguajes de programación:</label><br>
        <select id="Lenguajes" name="Lenguajes[]" multiple required>
            <option value="Java">Java</option>
            <option value="Python">Python</option>
            <option value="JavaScript">JavaScript</option>
            
        </select><br><br>

        <label for="Aptitudes">Aptitudes:</label><br>
        <input list="Aptitudes" id="Aptitudes" name="Aptitudes" required>
        <datalist id="Aptitudes">
            <option value="Trabajo en equipo">
            <option value="Comunicación efectiva">
            <option value="Resolución de problemas">
            
        </datalist><br><br>

        <label>Habilidades:</label><br>
        <input type="checkbox" id="Creatividad" name="Habilidades[]" value="Creatividad">
        <label for="Creatividad"> Creatividad</label><br>
        <input type="checkbox" id="Liderazgo" name="Habilidades[]" value="Liderazgo">
        <label for="Liderazgo"> Liderazgo</label><br>
        <input type="checkbox" id="Pensamiento_critico" name="Habilidades[]" value="Pensamiento crítico">
        <label for="Pensamiento_critico"> Pensamiento crítico</label><br>
    

        <br><br>
        <label for="Perfil">Perfil:</label><br>
        <textarea id="Perfil" name="Perfil" rows="4" required></textarea><br><br>

        <input type="submit" name="Enviar" value="Enviar">
        <input type="reset" value="Limpiar">
    </form>
</body>
</html>
    

<?php
    if(isset($_POST['Enviar'])){
        $Nombre = $_POST["Nombre"];
        $Nacimiento = $_POST["Nacimiento"];
        $Ocupacion = $_POST["Ocupacion"];
        $Contacto = $_POST["Contacto"];
        $Nacionalidad = $_POST["Nacionalidad"];
        $Nivel = $_POST["Nivel"];
        $Lenguajes = implode(", ", $_POST["Lenguajes"]);
        $Aptitudes = $_POST["Aptitudes"];
        $Habilidades = implode(", ", $_POST["Habilidades"]);
        $Perfil = $_POST["Perfil"];

        $insertarDatos = "INSERT INTO datos (Nombre, Nacimiento, Ocupacion, Contacto, Nacionalidad, Nivel, Lenguajes, Aptitudes, Habilidades, Perfil) 
        VALUES ('$Nombre','$Nacimiento','$Ocupacion','$Contacto','$Nacionalidad','$Nivel','$Lenguajes','$Aptitudes','$Habilidades','$Perfil')";

       
        if(mysqli_query($enlace, $insertarDatos)) {
            header("Location:cv.php");
            exit;
            
        } else {
            echo "Error al insertar datos: " . mysqli_error($enlace);
        }
    }
    
?>





