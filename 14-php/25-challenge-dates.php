<?php 
    $title       = '25 -challengue-dates';
    $description = 'Calculate the age in years.';

    include 'template/header.php';
    echo "<section>";
?>
   <form action="" method="POST">
    <div class="row">
        <label>Fecha de nacimiento:</label>
        <input type="date" class="form-control" name="birthdate" required>
    </div>
    <br>
    <div class="row">
        <input type="submit" value="Calcular Edad" class="btn btn-success">
    </div>
</form>

<?php 
    if ($_POST) {
        function calcularEdad($fechaNacimiento) {
            $fechaNac = new DateTime($fechaNacimiento);
            $hoy = new DateTime();
            $edad = $hoy->diff($fechaNac);
            return $edad->y; 
        }

        $fecha = $_POST['birthdate'];
        $edad = calcularEdad($fecha);

        echo '<div class="msg">
                Tu edad es: <strong>'.$edad.' años</strong>
              </div>';
    }
?>
    
 <?php include 'template/footer.php' ?>