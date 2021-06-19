<?php

include('../dbConect.php');

if (isset($_POST['guardar'])) {
    # code...
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $id = $_POST['id'];

    if ($id>0) {
        # code...
        $query = "UPDATE contactos SET nombre = '$nombre', telefono = '$telefono' WHERE id = $id ";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            # code...
            die('fallamos');

        }

        $_SESSION['message'] = 'Edit is succesfully';
        $_SESSION['color']= 'warning';

    }else{

    
   //echo $nombre.'->'.$telefono;
    $query = "INSERT INTO contactos(nombre, telefono) VALUES ('$nombre', '$telefono')";

    $result = mysqli_query($conn,$query);

    if (!$result) {
        # code...
        die ('no funciono');
    }

    $_SESSION['message'] = 'Save succesfully';
    $_SESSION['color']= 'success';

}

    header('location:../index.php' );
}


?>