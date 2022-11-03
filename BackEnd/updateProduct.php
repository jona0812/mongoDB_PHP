<?php

include('mainClass.php');
// si tiene este parámetro hace la búsqueda
$collection = [];
$m = new mainClass();

if ($_REQUEST['codigoproduct']) {

    $val = $m->getCollection($_REQUEST['codigoproduct']);

    foreach ($val as  $v) {

        foreach ($v as $key => $value) {

            $collection[$key] = $value;
        }
    }
    if (empty($collection)) {
        header("Location: ../FrontEnd/index.php");
    }
} else {

    $_REQUEST['codigoproduct'] = "";
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MONGO CON PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="../FrontEnd/css/styles.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />

</head>

<body class="container-fluid">

    <div class="row title">
        <h1>MONGODB WITH PHP CRUD</h1>
    </div>

    <div class="row splitSection">

        <div class="col-3"></div>

        <div class="margin col-6 border-rounded">

            <div class="container">
                <a href="../FrontEnd/index.php">Home</a>

                <div class="subtitle">
                    <h5>UPDATE PRODUCT <?php echo $_REQUEST['codigoproduct']; ?></h5>
                </div>


                <form method="post" action="controller.php">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4 ">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="form6Example1" class="form-control" name="nombre" value="<?php if (isset($collection['NOMBRE_PRODUCTO'])) {
                                                                                                                    echo $collection['NOMBRE_PRODUCTO'];
                                                                                                                }  ?>" />
                                <label class="form-label" for="form6Example1">NOMBRE PRODUCTO</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="form6Example2" class="form-control" value="<?php if (isset($collection['_id'])) {
                                                                                                        echo $collection['_id'];
                                                                                                    }  ?>" disabled />
                                <label class="form-label" for="form6Example2">CÓDIGO</label>
                            </div>
                        </div>
                    </div>
                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form6Example3" class="form-control" name="categoria" value="<?php if (isset($collection['CATEGORIA'])) {
                                                                                                                echo $collection['CATEGORIA'];
                                                                                                            }  ?>" />
                        <label class="form-label" for="form6Example3">CATEGORIA</label>
                    </div>
                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form6Example3" class="form-control" name="proveedor" value="<?php if (isset($collection['PROVEEDOR'])) {
                                                                                                                echo $collection['PROVEEDOR'];
                                                                                                            }  ?>" />
                        <label class="form-label" for="form6Example3">PROVEEDOR</label>
                    </div>


                    <!-- Number input -->
                    <div class="form-outline mb-4">
                        <input type="number" id="form6Example6" class="form-control" name="unidadesExistentes" value="<?php if (isset($collection['UNIDADES_EXISTENTES'])) {
                                                                                                                            echo $collection['UNIDADES_EXISTENTES'];
                                                                                                                        }  ?>" />
                        <label class="form-label" for="form6Example6">UNIDADES EXISTENTES</label>
                    </div>
                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-left mb-4">
                        <input class="form-check-input me-2" type="checkbox" id="form6Example8" name="suspendido" <?php

                                                                                                                    if (isset($collection['SUSPENDIDO'])) {
                                                                                                                        if ($collection['SUSPENDIDO'] == "true") {
                                                                                                                    ?> checked <?php
                                                                                                                        }
                                                                                                                    }

                                            ?> />
                        <label class="form-check-label" for="form6Example8"> SUSPENDIDO? </label>
                    </div>
                    <input type="hidden" name="actualizar">
                    <input type="hidden" name="codigo" value="<?php if (isset($collection['_id'])) {
                                                                    echo $collection['_id'];
                                                                }  ?>">

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4 " name="save">UPDATE</button>
                </form>

                <?php if (isset($_GET['msg'])) {

                ?>
                    <div class="alert alert-success" role="alert">
                        <h6> <?php echo $_GET['msg']; ?> </h6>
                    </div>

                <?php


                } ?>
            </div>

        </div>
        <div class="col-3"></div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="../FrontEnd/js/custom.js"></script>

</body>

</html>