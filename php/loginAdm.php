<?php
    $serve_file = $_SERVER['DOCUMENT_ROOT']."/barbearia/";
    session_save_path($serve_file.'cache/temp');
    session_start();
    include_once('conexao.php');

    $n = $_POST['nome'];
    $s = $_POST['senha'];
   

    $sql = "SELECT * from empresa where nome_adm = '$n' and senha = '$s'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    if($row > 0){
        while($row2 = mysqli_fetch_assoc($result)){
            $nome = $row2['nome'];
            $id = $row2['id'];
            $_SESSION['nome'] = $nome;
            $_SESSION['id'] = $id;
        }
header('Location: /barbeariaOn/site/public_html/dashboards.php');
   }
    
   else{
    echo "<script>alert('Você não tem acesso!');window.location.href='http://localhost/barbeariaOn/site/public_html/index.php';</script>";
}

