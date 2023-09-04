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
    // include('redimensionarImagen.php');
        if (isset($_POST['usuario'])) {
            $user = $_POST['usuario'];
            $pass = $_POST['contrasenia'];
            $foto = $_FILES["imagen"]['tmp_name'];
            echo '
            usuario: '.$user.'
            pass: '.$pass.'
            ';
            // if(is_uploaded_file($_FILES['imagen']["tmp_name"])){
            //     move_uploaded_file($_FILES["imagen"]["tmp_name"],'imagenes/'.$_FILES["imagen"]["name"]);
            // }
            // $foto = 'imagenes/'.$_FILES["imagen"]["name"];
            // echo ($foto);
            // $Nimg = redimensionarImagen($foto, 200, 200);
            // unlink($_FILES["imagen"]["name"]); //borra la imagen original guardada en la raiz del proyecto 
            $sql = "INSERT INTO usuarios (Nbr_u, Pass_u) VALUES ('.$user.', '.$pass.')";
            $registrar= mysqli_query($conexxion, $sql)? print("<script>alert('usuario creado'); window.location='form_registro.html';</script>"): print('error al crear');
        }
    ?>
</body>
</html>