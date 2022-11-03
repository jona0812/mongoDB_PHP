<?php
include("mainClass.php");
$class = new mainClass();
if (isset($_REQUEST['guardar'])) {
    
    if (isset($_REQUEST['suspendido'])) {
        $disponible = "true";
    } else {
        $disponible = "false";
    }
    $array = [
        'CODIGO' => $_REQUEST['codigo'],
        'NOMBREPRODUCTO' => $_REQUEST['nombre'],
        'PROVEEDOR' => $_REQUEST['proveedor'],
        'CATEGORIA' => $_REQUEST['categoria'],
        'UNIDADES_EXISTENTES' =>  $_REQUEST['unidadesExistentes'],
        'SUSPENDIDO' =>  $disponible
    ];

// var_dump($_REQUEST);
    $class->saveInformation($array);
    header('Location: ../FrontEnd/index.php?msg=Guardado satisfactoriamente');

}


if (isset($_REQUEST['actualizar'])) {

    // var_dump(($_REQUEST));
        
    if (isset($_REQUEST['suspendido'])) {
        $_REQUEST['suspendido'] = "true";
    } else {
        $_REQUEST['suspendido'] = "false";
    }
    $array = [
        'CODIGO' => $_REQUEST['codigo'],
        'NOMBREPRODUCTO' => $_REQUEST['nombre'],
        'PROVEEDOR' => $_REQUEST['proveedor'],
        'CATEGORIA' => $_REQUEST['categoria'],
        'UNIDADES_EXISTENTES' =>  $_REQUEST['unidadesExistentes'],
        'SUSPENDIDO' =>  $_REQUEST['suspendido']
    ];


    $class->updateProduct($array);
    header('Location: ../FrontEnd/index.php?msg=Actualizado satisfactoriamente');

}

if (isset($_REQUEST['eliminar'])) {

    $class->deleteProduct($_REQUEST['codigo']);
    header('Location: ../FrontEnd/index.php?msg=Producto eliminado');

}
