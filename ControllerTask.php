<?php
include "./DB/DB-PDO.php";
$conPDO = new ConPDO();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sqlGetAllTask = "SELECT id ,name , description FROM task ORDER BY id asc";
    $resGetAllTask = $conPDO ->prepare($sqlGetAllTask);
    $resGetAllTask->execute();
    $resGetAllTask->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 SuccessAllTask");
    $data = json_encode($resGetAllTask->fetchAll());
    echo $data;
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dataTask = $_POST['datatask'];
    $name = $dataTask['name'];
    $description = $dataTask['description'];
    $sqlInsertTask = "INSERT INTO task (name , description) VALUES (:name , :description)";
    $resInsertTask = $conPDO -> prepare($sqlInsertTask);
    $resInsertTask -> bindValue(":name" , $name );
    $resInsertTask -> bindValue(":description" , $description);
    $resInsertTask -> execute();
    $idGenerado = $conPDO -> lastInsertId();
    if ($idGenerado) {
        header("HTTP/1.1 200 SaveSuccess");
        echo "Data Save Success";
    }else {
        echo "Error to insert Task";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) == true) {
    $id = $_POST['id'];
    $sqlTaskId = "SELECT  id, name , description FROM task WHERE id = :id";
    $resTaskId = $conPDO -> prepare($sqlTaskId);
    $resTaskId -> bindValue(":id" , $id );
    $resTaskId -> execute();
    $resTaskId->setFetchMode(PDO::FETCH_ASSOC);
    echo json_encode($resTaskId->fetch());
    // echo $dataFind = json_encode($resTaskId->fetch());
    //echo $dataFind = json_encode($resTaskId->fetchAll());
    // echo $resTaskId;

}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && $_GET['id'] == true && $_GET['typeaction'] == 'DELETE') {
    $id = $_GET['id'];

    $sqlDeleteTask = "DELETE FROM task WHERE id = :id";
    $resDelteTask = $conPDO-> prepare($sqlDeleteTask);
    $resDelteTask -> bindValue(":id", $id);
    $resDelteTask -> execute();

    if ($resDelteTask) {
        echo "Delete Task Success";
    }else{
        echo "Delete Task Error";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // $dataTask = $_GET['dataTask'];
    
    // foreach($_GET['dataTask'] as $clave => $valor) {
    //     echo "$clave => $valor\n";
    // }
    // echo "Access to PUT success : $dataTask";
    // echo get_object_vars($_GET['dataTask']);

    echo json_encode($_GET['dataTask']);
    
}



?>