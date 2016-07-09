<?php

if ($_GET) {
    $id_imagem = $_GET['id'];

    $mysqli = new mysqli('localhost', 'felipe', 'felipe', 'imagens_devmedia');

    if (mysqli_connect_errno()) {
        echo 'Erro: ' . mysqli_connect_error();
    } else {
        $query = "SELECT codigo, imagem FROM tabela_imagens WHERE codigo = $id_imagem";
        $result = $mysqli->query($query);
        $value = $result->fetch_assoc();
        Header("Content-type: image/gif");
        echo $value['imagem'];
    }
}
?>