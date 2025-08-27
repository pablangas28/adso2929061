<?php
include '../config/app.php';
include '../config/database.php';
include '../config/security.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Edit</title>
    <link rel="stylesheet" href="<?= $css ?>stylee.css">
</head>

<body>
    <main class="edit">
        <header>
            <h2>Modificar Mascota</h2>
            <a href="dashboard.php" class="back"></a>
            <a href="index.php" class="close"></a>
        </header>
        <?php
        $pet = editPets($_GET['id'], $conx);
        ?>
        <figure class="photo-preview">
            <img id="preview" src="../uploads/<?= $pet['photo'] ?>" alt="">
        </figure>
        <form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Nombre" value="<?= $pet['name'] ?>">
    
    <div class="select">
        <select name="breed_id">
            <option value="">Seleccione Raza...</option>
            <?php $breeds = listBreeds($conx) ?>
            <?php foreach ($breeds as $breed): ?>
                <option value="<?= $breed['id'] ?>" 
                    <?php if ($pet['breed'] == $breed['name']) echo "selected"; ?>>
                    <?= $breed['name'] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="select">
        <select name="specie_id">
            <option value="">Seleccione Categoría...</option>
            <?php $species = listSpecies($conx) ?>
            <?php foreach ($species as $specie): ?>
                <option value="<?= $specie['id'] ?>" 
                    <?php if ($pet['specie'] == $specie['name']) echo "selected"; ?>>
                    <?= $specie['name'] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <!-- Input oculto real para foto -->
    <input type="file" name="photo" id="photo" style="display:none">

    <button type="button" class="upload">Subir Foto</button>

    <div class="select">
        <select name="sex_id">
            <option value="">Seleccione Género...</option>
            <?php $sexes = listSexes($conx) ?>
            <?php foreach ($sexes as $sex): ?>
                <option value="<?= $sex['id'] ?>" 
                    <?php if ($pet['sex'] == $sex['name']) echo "selected"; ?>>
                    <?= $sex['name'] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <button type="submit" class="update">Modificar</button>
</form>

        <?php
        if ($_POST) {
    $errors = 0;

    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            $errors++;
        }
    }

    $photo = $pet['photo']; // foto actual por defecto

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = time() . '.' . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['photo']['tmp_name'], '../uploads/' . $photo);
    }

    if ($errors == 0) {
        $name      = $_POST['name'];
        $specie_id = $_POST['specie_id'];
        $breed_id  = $_POST['breed_id'];
        $sex_id    = $_POST['sex_id'];

        if (updatePet($id, $name, $specie_id, $breed_id, $sex_id, $photo, $conx)) {
            $_SESSION['message'] = "La mascota fue modificada con éxito!";
            echo "<script>window.location.replace('dashboard.php')</script>";
        }
    } else {
        $_SESSION['error'] = "Todos los campos son requeridos!";
    }
}

        ?>
    </main>
    <script>
        const preview = document.querySelector('#preview');
        const upload = document.querySelector('.upload');
        const photo = document.querySelector('#photo');

        upload.addEventListener('click', function(e) {
            photo.click()
        })

        photo.addEventListener('change', function(e) {
            preview.src = window.URL.createObjectURL(this.files[0])
        })
    </script>
</body>

</html>