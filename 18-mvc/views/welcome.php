<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC: Model | View | Controller</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-blue-900 min-h-[100dvh] text-white p-10">
    <h1 class="text-4xl text-center font-bold">MVC</h1>
    <small class="block text-center">Model | View | Controller</small>

    <h2 class="my-10 text-center text-xl font-bold border-b-1 pb-2">List Pokemons</h2>

    <a href="" class="btn btn-succes flex mx-auto w-[200px] my-4">Add Pokemon</a>

    <table class="table bg-white text-center">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Actions</th>
        </thead>
        <tbody class="tablee text-black text-center">
            <?php foreach($data as $pokemon):?>
            <tr>
                <td><?= htmlspecialchars($pokemon['id'])?></td>
                <td><?= htmlspecialchars($pokemon['name'])?></td>
                <td><?= htmlspecialchars($pokemon['tipo'])?></td>
                <td class="consultar">Consultar</td>
                <td class="editar">Editar</td>
                <td class="eliminar">Eliminar</td>
            </tr>
            <?php endForeach ?>
        </tbody>
    </table>
</body>

</html>