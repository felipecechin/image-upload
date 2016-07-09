<meta charset="utf-8">
<?php
if ($_POST) {
    if (!empty($_POST['nome_evento']) && !empty($_POST['descricao_evento']) && !empty($_FILES['imagem']['name'])) {
        $nomeEvento = $_POST['nome_evento'];
        $descricaoEvento = $_POST['descricao_evento'];
        if ($_FILES['imagem']['error'] != 0) {
            echo 'Imagem inválida. Selecione outra.';
            die();
        }
        $imagem = $_FILES['imagem']['tmp_name'];
        $tamanho = $_FILES['imagem']['size'];
        $tipo = $_FILES['imagem']['type'];
        $nome = $_FILES['imagem']['name'];

        if ($imagem != 'none') {
            $fp = fopen($imagem, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);
            fclose($fp);

            $mysqli = new mysqli('localhost', 'felipe', 'felipe', 'imagens_devmedia');

            if (mysqli_connect_errno()) {
                echo 'Erro: ' . mysqli_connect_error();
            } else {
                $query = "INSERT INTO tabela_imagens (evento, descricao, nome_imagem, tamanho_imagem, tipo_imagem, imagem) VALUES ('$nomeEvento', '$descricaoEvento','$nome','$tamanho', '$tipo','$conteudo')";
                if ($mysqli->query($query)) {
                    echo "A imagem foi salva na base de dados.";
                } else {
                    echo $mysqli->error;
                }
            }
        } else {
            echo "Não foi possível carregar a imagem.";
        }
    } else {
        echo 'Preencha todos os campos.';
    }
    header('refresh:3;url=index.php', true, 300);
}
?>
