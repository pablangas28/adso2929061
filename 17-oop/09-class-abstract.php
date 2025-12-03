<?php
$title    = '09-class-abstract';
$description = 'A class that cannot be instantiated, only extended from.';

include_once 'class/pokemons.php';
include_once 'template/header.php';
echo "<section>";

$pokemon = new pokemons();
$res = $pokemon->listar();

?>
 <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Tipo</td>
                <td>Trainer</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $registro) { ?>
                <tr>
                    <td><?php echo $registro['name']; ?></td>
                    <td><?php echo $registro['tipo']; ?></td>
                    <td><?php echo $registro['trainer_id']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


<?php
include_once 'template/footer.php';
