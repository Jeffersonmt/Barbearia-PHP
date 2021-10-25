<?php 

include 'conexao.php';

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$aniversario = $_POST['aniversario'];
$datainicio = $_POST['data'];

$sql = ("INSERT into empresa(nome_adm,senha,email,cpf,telefone,aniversario,datainicio) values ('$nome', '$senha', '$email', '$cpf', '$telefone', '$aniversario', '$datainicio')");
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_affected_rows($conn);
    if($rows > 0){
        echo "<script>alert('Administrador cadastrado!');window.location.href='http://localhost/barbeariaOn/site/public_html/cadastrar.php'</script>";

    }else{
        echo "ERRO AO AGENDAR";
    }