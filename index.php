<?php include("dbConect.php"); 

if (isset( $_GET['id'])) {
    # editar code...
    $id = $_GET['id'];
    
    $query = "SELECT * FROM contactos WHERE id = $id";

    $result_query = mysqli_query($conn, $query);

    if(mysqli_num_rows($result_query) == 1){
        $row = mysqli_fetch_array($result_query);
        $nombre = $row['nombre'];
        $telefono = $row['telefono'];

        //echo $nombre.'->'.$telefono;

        
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud Simple</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- iconos -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

</head>


<body>

    <div class="container p-4">
        <div class="row">

            <div class="col-md-4">

                <?php if (isset($_SESSION['message'])) { ?>

                    <div class="alert alert-<?=$_SESSION['color']?> d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            <?= $_SESSION['message'] ?>
                        </div>
                    </div>
                <?php session_unset();
                } ?>



                <div class="card card-body">
                    <div class="card-header m-2">
                        Contactos
                    </div>

                    <form action="Consultadb/guardarContacto.php" method="post">

                    <input type="hidden" name="id" id="id" value="<?=$id?>">

                        <div class="input-group mb-3">
                            <input type="text" required name="nombre" value="<?=$nombre?>" id="nombre" class="form-control" autofocus placeholder="Nombre">
                        </div>

                        <div class="input-group mb-3">
                            <input type="number" required name="telefono" value="<?=$telefono?>" id="telefono" class="form-control" placeholder="Telefono">
                        </div>
                        <div class="d-grid">
                            <input type="submit" value="Guardar" name="guardar" id="guardar" class="btn btn-success">
                        </div>

                    </form>
                </div>

            </div>
            <div class="col-md-8">

            <table class="table table-dark table-striped">
            <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">TELEFONO</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $query = "SELECT * FROM contactos";

  $resultContact = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_array($resultContact)) {?>
      

  
    <tr>
      <th scope="row"><?=$row['id'] ?></th>
      <td><?=$row['nombre'] ?></td>
      <td><?=$row['telefono'] ?></td>
      <td> <a href="index.php?id=<?= $row['id']  ?>">edit</a> | <a href="Consultadb/deleteContact.php?id=<?= $row['id']  ?>">delete</a></td>
    </tr>

    <?php } ?>
  </tbody>
</table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>