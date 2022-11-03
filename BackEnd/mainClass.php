
<?php

class mainClass{


    function saveInformation($info){ 

        $c = new \MongoDB\Driver\Manager('mongodb://localhost:27017');
        $bulk = new MongoDB\Driver\BulkWrite;
        $new = [
            '_id' => $info['CODIGO'],
            'NOMBRE_PRODUCTO' => $info['NOMBREPRODUCTO'],
            'PROVEEDOR' => $info['PROVEEDOR'],
            'CATEGORIA' => $info['CATEGORIA'],
            'UNIDADES_EXISTENTES' => $info['UNIDADES_EXISTENTES'],
            'SUSPENDIDO' => $info['SUSPENDIDO']
        ];  
        $bulk->insert($new);
        $result = $c->executeBulkWrite('store.test', $bulk);
        
        return $result;
    }

    function getAllData(){

        $c = new \MongoDB\Driver\Manager('mongodb://localhost:27017');

        $query = new MongoDB\Driver\Query([]);
        $rows = $c->executeQuery('store.test', $query); // $mongo contains the connection object to MongoDB

        return $rows;
    }

    function getCollection($codigo){

        $c = new \MongoDB\Driver\Manager('mongodb://localhost:27017');
        $filter=['_id'=> $codigo];
        $query = new MongoDB\Driver\Query($filter);
        $rows = $c->executeQuery('store.test', $query); 
        
        return  $rows;  

    }


    function updateProduct($info){
        
        $c = new \MongoDB\Driver\Manager('mongodb://localhost:27017');
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(['_id' => $info['CODIGO']], ['$set' => ['NOMBRE_PRODUCTO' => $info['NOMBREPRODUCTO'], 'PROVEEDOR' => $info['PROVEEDOR'],'CATEGORIA' => $info['CATEGORIA'],'UNIDADES_EXISTENTES' => $info['UNIDADES_EXISTENTES'],'SUSPENDIDO' => $info['SUSPENDIDO']]]);
        $update=$c->executeBulkWrite('store.test', $bulk);

        return $update;
    }

    function deleteProduct($codigo){

        $c = new \MongoDB\Driver\Manager('mongodb://localhost:27017');
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->delete(['_id' => $codigo]);
        $deleted = $c->executeBulkWrite('store.test', $bulk);
        // var_dump($deleted);

        return $deleted; 

    }


}


// try {

//     $c = new \MongoDB\Driver\Manager('mongodb://localhost:27017');
//     //--------------------------------- ESTO ES PARA AGREGAR UNA NUEVA DATA A UNA COLLECTION SEA QUE EXISTA O NO-------------------------------------
//     $bulk = new MongoDB\Driver\BulkWrite;
//     $new = [
//         '_id' => 2,
//         'ID_PRODUCTO' => 21,
//         'NOMBRE_PRODUCTO' => 'REXONA',
//         'PROVEEDOR' => 'NOSOTROS',
//         'CATEGORIA' => 'CUIDADO PERSONAL',
//         'UNIDADES_EXISTENTES' => 30,
//         'SUSPENDIDO' => FALSE
//     ];
//     $bulk->insert($new);
//     $result = $c->executeBulkWrite('store.test', $bulk);

//     if ($result) {
//         echo "Todo bien";
//     } else {
//         echo "We have some issues";
//     }
    // exit();
    // ---------------------------------------------------------------------------------------------------------------------

    // ---------------------------------------------retrieve  all data from collection products-------------------------------------------------------

    // $query = new MongoDB\Driver\Query([]);
    // $rows = $c->executeQuery('store.products', $query); // $mongo contains the connection obje ct to MongoDB

    // foreach ($rows as $row) {

    //     echo '<pre>';
    //         var_dump($row);
    //     echo '</pre>';

    // }

    //------------------------------------------------------------------------------------------------------------------- consultar todas las bases de datos que hay

    // $listdatabases = new MongoDB\Driver\Command(["listDatabases" => 10]);
    // $res = $c->executeCommand("admin", $listdatabases);

    // $databases = current($res->toArray());
    // echo '<pre>';
    // var_export($databases);
    // echo '</pre>'; 

    // ---------------------------------------------------------------------------------retrieve one product por id

    // $filter=['ID_PRODUCTO'=> "19"];
    // $options=['limit' => 1];
    // $query = new MongoDB\Driver\Query($filter);
    // $rows = $c->executeQuery('store.products', $query); 
    // $m=array($rows);
    // var_dump($m);
    // foreach ($rows as $key => $v) {
    // echo '<pre>';
    //     var_dump($v);
    // echo '</pre>';

    // }        

    // ------------------------------------------------------------ UPDATE ----------------------------

    // $bulk = new MongoDB\Driver\BulkWrite;
    // $bulk->update(['ID_PRODUCTO' => '5'], ['$set' => ['SUSPENDIDO' => 'FALSE', 'ID_PRODUCTO' => '5','ARTICULO' => 'NUEVO']]);
    // $update=$c->executeBulkWrite('store.products', $bulk);
    // echo '<pre>';
    // var_dump($update);
    // echo '</pre>';
    // exit();  

    // --------------------------------------------DELETE-----------------------------------

//     $bulk = new MongoDB\Driver\BulkWrite;
//     $bulk->delete(['ID_PRODUCTO' => 21]);
//     $deleted = $c->executeBulkWrite('store.products', $bulk);

//     return $deleted;

//     exit();
// } catch (Throwable $e) {

//     // catch throwables when the connection is not a success
//     echo "Captured Throwable for connection : " . $e->getMessage() . PHP_EOL;
// }


?>   