<?php

if ($_GET) {
    $id_imagem = $_GET['id'];

    $mysqli = new mysqli('localhost', 'felipe', 'felipe', 'imagens_devmedia');

    if (mysqli_connect_errno()) {
        echo 'Erro: ' . mysqli_connect_error();
    } else {
        $query = "DELETE FROM tabela_imagens WHERE codigo = $id_imagem";
        if ($result = $mysqli->query($query)) {
            echo 'Imagem excluída com sucesso!';
            header('Location: index.php');
        }
    }
}
?>