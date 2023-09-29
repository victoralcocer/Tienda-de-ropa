<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primera practica</title>
</head>
<body>
    
<h1>PRIMAX</h1>

Bienvenido: <br><br>

<form method="post"> 

	<p>Nombre: <input type="text" name="n" required></p>
    <p>Pantalones 10,49€/u: <input type="number" name="p" min="0"></p>
    <p>Camisetas 4,99€/u: <input type="number" name="c" min="0"></p>
    <p>Zapatos 12,99€/u: <input type="number" name="z" min="0"></p>

	<input type="submit" name="ok" value="Comprar">

</form>

<br><br>

<?php

if(isset($_REQUEST['ok'])){

$nombre = ($_REQUEST['n']);
if(!empty($_REQUEST['p']))
{
    $numerop = $_REQUEST['p'];


}else{
    $numerop=0;
}

if(!empty($_REQUEST['c']))
{
    $numeroc = $_REQUEST['c'];


}else{
    $numeroc=0;
}

if(!empty($_REQUEST['z']))
{
    $numeroz = $_REQUEST['z'];


}else{
    $numeroz=0;
}


$nombre=($_REQUEST['n']);
$preciop = $numerop*10.49;
$precioc = $numeroc*4.99;
$precioz = $numeroz*12.99;
$subtotal = $preciop + $precioc + $precioz;

 if((isset($_REQUEST['ok'])) && $subtotal!=0){

    echo "<p><a href='$nombre.txt'download>Descargar ticket de compra</a></p>";

    $archivo = fopen($nombre.'.txt','w');

    fputs($archivo, "Primax");
    fputs($archivo,"\n"."\n");
    fputs($archivo,"Cliente: ".$nombre);
	fputs($archivo,"\n"."\n");
    if(($numerop>0)){
        fputs($archivo, $numerop." Pantalones ".$preciop."€");
        fputs($archivo,"\n");
    }
    if(($numeroc>0)){
        fputs($archivo, $numeroc." Camisetas ".$precioc."€");
        fputs($archivo,"\n");
    }
    if(($numeroz>0)){
        fputs($archivo, $numeroz." Zapatos ".$precioz."€");
        fputs($archivo,"\n");
    }
    fputs($archivo, "Total: ".$subtotal."€");
    fputs($archivo,"\n"."\n");
    fputs($archivo,"Gracias por su compra");



 }


}




?>



</body>
</html>