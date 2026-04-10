<?php
require 'conexao.php';

$sql = "SELECT * FROM produtos";
$produtos = mysqli_query($conexao, $sql);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <div class="mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de produtos
                            <a href="produtos-create.php" class="btn btn-primary float-end">Adicionar produto</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>nome</th>
                                    <th>descrição</th>
                                    <th>preço</th>
                                    <th>ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (mysqli_num_rows($produtos) > 0) {  // Verifica se existem produtos no banco
                                
                                    foreach ($produtos as $produto) {// Percorre cada linha de resultado
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $produto['id']; ?>
                                            </td>
                                            <td>
                                                <?= $produto['nome']; ?>
                                            </td>
                                            <td>
                                                <?= $produto['descrição']; ?>
                                            </td>
                                            <td>
                                                <?= number_format($produto['preço'], 2, ',', '.'); ?>
                                            </td>
                                            <td>

                                                <form action="acoes.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_produto" value="<?= $produto['id']; ?>"
                                                        class="btn btn-danger btn-sm">
                                                        Excluir
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    // Se não houver nada no banco
                                    echo "<tr><td colspan='5' class='text-center'>Nenhum produto encontrado</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>