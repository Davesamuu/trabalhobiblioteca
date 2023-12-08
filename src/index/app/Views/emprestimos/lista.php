<!DOCTYPE html>
<html>

<head>
    <title>Lista de Visitantes</title>
</head>

<body>
    <fieldset>
        <legend>
            <h1>Lista de Emprestimos</h1>
        </legend>
        <table border="1">
            <thead>
                <tr>
                    <th>ID do emprestimo</th>
                    <th>ID do livro</th>
                    <th>ID do usuario</th>
                    <th>Data do empestimo</th>
                </tr>
            </thead>
            <?php if (count($emprestimos) > 0) {
                foreach ($emprestimos as $emprestimo) : ?>
                    <tbody>
                        <tr>
                            <td><?php echo $emprestimo['id_emprestimo']; ?></td>
                            <td><?php echo $emprestimo['id_livro']; ?></td>
                            <td><?php echo $emprestimo['id_usuario']; ?></td>
                            <td><?php echo $emprestimo['data_emprestimo']; ?></td>
                        </tr>
                <?php endforeach;
            } else {
                echo "<div style='background-color:blue;'>Não existem emprestimos cadastrados!</div>";
            } ?>
                    <tbody>
        </table>
    </fieldset>
</body>

</html>