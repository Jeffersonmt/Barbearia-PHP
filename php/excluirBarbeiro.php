<?php
    $serve_file = $_SERVER['DOCUMENT_ROOT']."/barbearia/";
    session_save_path($serve_file.'cache/temp');
    session_start();
    include_once($serve_file.'site/public_html/php/conexao.php');

    $id = $_POST['id'];

    $sql = "DELETE from barbeiro where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_affected_rows($conn);
    if($rows > 0){
        echo "<script>alert('Barbeiro Excluido Com Sucesso!');window.location.href='/barbeariaOn/site/public_html/equipe.php';</script>";
    }else{
        echo "Erro ao excluir Barbeiro!";
    }
    ?>