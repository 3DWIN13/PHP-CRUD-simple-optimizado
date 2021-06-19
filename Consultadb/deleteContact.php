<?php
include('../dbConect.php');

if (isset($_GET['id'])) {

    echo "entramos";
    # code...
    $id = $_GET['id'];
    $query = "DELETE FROM contactos WHERE id = $id";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        # code...
        die('fallamos');

    }

    $_SESSION['message'] = 'Delete contact succesfully';
    $_SESSION['color'] = 'danger';

    header('location:../index.php');

}
?>