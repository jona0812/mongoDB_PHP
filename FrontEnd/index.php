<?php include "header.php";
?>

<div class="row">
    <h3 class="title"> CRUD MONGO-PHP </h3>
</div>

<div class="row">

    <div class="col-3"></div>
    <div class="col-6 border rounded splitElements">
        <div class="row title">
            <h5>Buscar producto</h5>
        </div>
        <form action="../BackEnd/updateProduct.php" method="post">
            <div class="input-group splitSearch">
                <input type="search" class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="codigoproduct" />
                <button type="submit" class="btn btn-outline-primary">search</button>
            </div>
        </form>

        <div class="row title">
            <h5>Guardar producto</h5>
        </div>
        <form method="post" action="../BackEnd/controller.php">

            <div class="row">

                <div class="col">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="numeric" id="form5Example1" class="form-control" name="codigo" />
                        <label class="form-label" for="form5Example1">Código</label>
                    </div>

                </div>
                <div class="col">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="nombre" class="form-control" name="nombre" />
                        <label class="form-label" for="nombre">Name</label>
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form5Example1" class="form-control" name="proveedor" />
                        <label class="form-label" for="form5Example1">proveedor</label>
                    </div>

                </div>
                <div class="col">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="categoria" class="form-control" name="categoria" />
                        <label class="form-label" for="categoria">Categoria</label>
                    </div>

                </div>

            </div>

            <div class="form-outline mb-4">
                <input type="numeric" id="unidades" class="form-control" name="unidadesExistentes" />
                <label class="form-label" for="unidades">Unidades existentes</label>
            </div>


            <!-- Checkbox -->
            <div class="form-check d-flex mb-4">
                <input class="form-check-input me-2" type="checkbox" id="form5Example3" name="suspendido" />
                <label class="form-check-label" for="form5Example3">
                    Suspendido?
                </label>
            </div>

            <input type="hidden" name="guardar">
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Guardar</button>
        </form>
        <?php if (isset($_GET['msg'])) {
            
            ?>
                <div class="alert alert-success" role="alert">
                 <h6> <?php echo $_GET['msg']; ?> </h6>
                </div>

            <?php


        } ?>

    </div>
    <div class="col-3"></div>
</div>

<div class="row">
    <h3 class="title"> ALL DATA </h3>
</div>

<div class="row">
    <div class="col-2"></div>
    <div class="col-8">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">CODIGO</th>
                    <th scope="col">PRODUCTO</th>
                    <th scope="col">PROVEEDOR</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">UNIDADES_EXISTENTES</th>
                    <th scope="col">¿SUSPENDIDO?</th>
                    <th scope="col">¿DELETE?</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($val as $key => $value) {

                ?>
                    <tr>
                        <td> <?php echo $value->_id; ?></td>
                        <td> <?php echo $value->NOMBRE_PRODUCTO; ?></td>
                        <td> <?php echo $value->PROVEEDOR; ?></td>
                        <td> <?php echo $value->CATEGORIA; ?></td>
                        <td> <?php echo $value->UNIDADES_EXISTENTES; ?></td>
                        <td> <?php echo $value->SUSPENDIDO; ?></td>
                        <td> 
                            <form action="../BackEnd/controller.php" method="post">    
                                <input type="hidden" name="eliminar">
                                <input type="hidden" name="codigo" value="<?php echo $value->_id;?>">
                                <button type="submit" >     <i class="fa-solid fa-trash"></i></button>


                            </form>
                            
                        </td>
                    </tr>
                <?php


                }

                ?>


            </tbody>
        </table>
    </div>
    <div class="col-2"></div>

</div>


<?php include("footer.php"); ?>