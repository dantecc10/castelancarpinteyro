// Crea un input de HTML para cargar una imagen
$input = '<input type="file" name="imagen" id="imagen" accept="image/*" />';
//Ahora asumiendo que está en un form, crea el código para guardar la imagen en cierta ruta con PHP
$input.= '<input type="submit" name="submit" value="Subir imagen" />';
echo $input;
?>


<?php
?>