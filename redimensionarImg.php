<?php 
function redimensionarImagen($imagen, $ancho_final, $alto_final){
	
//Extraemos algunos atributos de la imagen
list($ancho_orig, $alto_orig, $nroTipo) = getimagesize($imagen);


//Creamos una variable imagen a partir de la imagen original según el tipo
switch ($nroTipo) {
	case 2: $img_original=imagecreatefromjpeg($imagen);
			break;
	case 3: $img_original=imagecreatefrompng($imagen);
			break;
	default:
		echo "tipo de archivo incorrecto";
		break;
	}


/* Calculamos los Ratios: proporción existente en entre dos magnitudes, en este caso la proporción entre los anchos(final y original) y entre los altos (final y original)*/
$ratio_ancho = $ancho_final / $ancho_orig; 
$ratio_alto = $alto_final / $alto_orig; 


// Obtenemos el mínimo entre los dos ratios
$ratio_min = min($ratio_ancho, $ratio_alto); 


/*Utilizamos los ratios calculados para determinar un nuevo ancho y alto para la imagen*/
$nuevo_ancho = $ancho_orig * $ratio_min; 
$nuevo_alto = $alto_orig * $ratio_min; 


//Creamos una imagen en blanco de tamaño $ancho_final  por $alto_final 
$nueva_img = imageCreateTrueColor($nuevo_ancho, $nuevo_alto);


//Copiamos $img_original sobre la imagen que acabamos de crear en blanco 
	 
imagecopyresampled($nueva_img, $img_original, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho_orig, $alto_orig);


//Se destruye variable $img_original para liberar memoria
imagedestroy($img_original);




//Definimos la calidad de la imagen final
$calidad=70;
	
//Definimos el nombre final de la imágen concatenando al nombre original un identificador único con la función time()
$nombre_imagen =time()."-".$imagen;


//Se crea la imágen final en el directorio indicado
imagejpeg($nueva_img,"imagenes/$nombre_imagen",$calidad);


//retornamos el nombre de la nueva imágen
return $nombre_imagen;
	
}


// Invocamos a la función
$nombre_imagen=redimensionarImagen("nature1.jpg", 400, 300);


//mostramos en pantalla la imágen resultante
echo '<img src="imagenes/'.$nombre_imagen.'"><br>';


 ?>
