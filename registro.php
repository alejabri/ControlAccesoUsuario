<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Eval. de Git</title>
    <link rel="stylesheet" href="CSS/estilos_form.css">
</head>
<body>    
    <?php
    include('conexxion.php');
        if (isset($_POST['usuario'])) {
            $user = $_POST['usuario'];
            $pass = $_POST['contrasenia'];
            if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
                move_uploaded_file($_FILES["imagen"]["tmp_name"],$_FILES["imagen"]["name"]);
            }
            $img = $_FILES["imagen"]["name"];
            $img= redimensionarImg($img, 200, 200);
            unlink($_FILES["imagen"]["name"]); //borra la imagen original guardada en la raiz del proyecto 
            $sql = '';
            $registrar= mysqli_query($conexion, $sql)? print("<script>alert('borrado');</script>"): print('error al borrar');
        }
    ?>
    <div class="cont">
        <form action="" method="post">
            <input type="text" name="usuario" placeholder="Ingrese su nombre">
            <input type="password" name="contrasenia" placeholder="Ingrese su contraseña">
            <input type="file" name="imagen" placeholder="Ingrese su foto de perfil">                        
        </form>
    </div>
</body>
</html>