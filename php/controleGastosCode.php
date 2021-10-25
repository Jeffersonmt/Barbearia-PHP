<?php 

include 'php/conexao.php';

$nomeC = $_POST['nomeC'];
$nome = $_POST['produto'];
$valor = $_POST['valorCompra'];

$sql = ("INSERT into cortes(produto,valorProduto, comprador) values ('$nome', '$valor', '$nomeC')");
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_affected_rows($conn);
    if($rows > 0){
        echo "<script>alert('Gasto cadastrado!');window.location.href='http://localhost/barbeariaOn/site/public_html/controleGastos.php'</script>";

    }else{
        echo "ERRO AO CADASTRAR GASTO";
    }