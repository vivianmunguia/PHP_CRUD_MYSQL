<?php
    include("db.php");

    if (isset($_GET['id'])) { //Si existe un id
        $id = $_GET['id']; //Se guarda en una variable
        $query = "SELECT * FROM task WHERE id = $id"; //Consulta, se deben de traer los datos para despues editarlos
        $result = mysqli_query($conn, $query); //Se guarda el resultado
        if (mysqli_num_rows($result) == 1) { //Si hay una sola fila en el resultado
            $row = mysqli_fetch_array($result); //El resultado se guarda en una variable
            $title = $row['title']; //Se guarda el titulo de lo que se selecciono en una variable
            $description = $row['description']; //Se guarda la descripcion
        }
    }   

    if (isset($_POST['update'])) { //Si existe el nombre del boton update a traves del metodo POST
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Task Updated Successfully';
        $_SESSION['message_type'] = 'warning';
        header("Location: index.php");
    }
?>

<?php include("includes/header.php") ?> <!-- Se agrega el header -->
<!-- Se agrega un formulario para ver los datos que se van a editar-->
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST"><!-- Se envian los datos a edit.php con el id -->
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Update Description"><?php echo $description; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?> <!-- Se agrega el footer -->