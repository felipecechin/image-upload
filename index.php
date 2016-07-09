<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Cadastre um novo evento e sua foto</h2>
        <form enctype="multipart/form-data" action="upload.php" method="post">
            <div><input name="nome_evento" type="text" placeholder="Nome do evento" required=""></div>
            <div><input name="descricao_evento" type="text" placeholder="Descrição do evento" required=""></div>    
            <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
            <div><input name="imagem" type="file" required=""></div>
            <div><input type="submit" value="Salvar"/></div>
        </form>

        <br>
        <table border="1">
            <tr>
                <td align="center">
                    Código
                </td>
                <td align="center">
                    Evento
                </td>
                <td align="center">
                    Descrição
                </td>
                <td align="center">
                    Nome da imagem
                </td>
                <td align="center">
                    Tamanho
                </td>
                <td align="center">
                    Visualizar imagem
                </td>
                <td align="center">
                    Excluir imagem
                </td>
            </tr>
            <?php
            $mysqli = new mysqli('localhost', 'felipe', 'felipe', 'imagens_devmedia');

            if (mysqli_connect_errno()) {
                echo 'Erro: ' . mysqli_connect_error();
            } else {
                $query = "SELECT codigo, evento, descricao, nome_imagem, tamanho_imagem, imagem FROM tabela_imagens";
                $result = $mysqli->query($query);
                while ($aquivos = $result->fetch_assoc()) {
                    ?>
                    <tr> 
                        <td align="center">
                            <?php echo $aquivos['codigo']; ?>
                        </td>
                        <td align="center">
                            <?php echo $aquivos['evento']; ?>
                        </td>
                        <td align="center">
                            <?php echo $aquivos['descricao']; ?>
                        </td>
                        <td align="center">
                            <?php echo $aquivos['nome_imagem']; ?>
                        </td>
                        <td align="center">
                            <?php echo $aquivos['tamanho_imagem']; ?>
                        </td>
                        <td align="center">
                            <?php echo '<a href="ver_imagem.php?id=' . $aquivos['codigo'] . '">Imagem ' . $aquivos['codigo'] . ' </a>'; ?>
                        </td>
                        <td align="center">
                            <?php echo '<a href = "excluir_imagem.php?id=' . $aquivos['codigo'] . '">Imagem ' . $aquivos['codigo'] . '</a>'; ?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </body>
</html>
