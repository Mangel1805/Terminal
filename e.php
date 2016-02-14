<?php 
function generarClave ()  { 
    $letras =  '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ' ; 
    $letrasLength = strlen ( $letras ); 
    $clave =  '' ; 
    for  ( $i =  0 ; $i < 8 ; $i ++)  { 
        $clave .= $letras [ rand ( 0 , $letrasLength -  1 )]; 
    } 
    return $clave ; 
}


echo "Clave: ".generarClave();
 ?>