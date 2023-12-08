<!DOCTYPE html>
<html>
<head>
    <title>Lista de Livros</title>
</head>
<body>
    <fieldset>
        <legend><h1>Lista de livros</h1></legend>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Imagem</th>
                    </tr>
                </thead>
                <?php foreach ($livros as $livro): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $livro['livro_id']; ?></td>
                            <td><?php echo $livro['nome']; ?></td>
                            <td><?php echo $livro['categoria']; ?></td>
                            <td><?php echo $livro['imagem']; ?></td>
                        </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
    </fieldset>
</body>
</html>