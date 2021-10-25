<?php
    $serve_file = $_SERVER['DOCUMENT_ROOT']."/barbearia/";
    session_save_path($serve_file.'cache/temp');
    session_start();
    include_once($serve_file.'site/public_html/php/conexao.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link href="_css/servico.css" rel="stylesheet" type="text/css" />v
</head>
<style>
button {
    display: block;
    margin: 20px auto;
    padding: 10px 25px;
    border: 1px solid #34ADFF;
    background-color: #6262e2;
    border-radius: 40px;
    color: #fff;
}

button:hover {
    background-color: #34ADFF;
    border-color: #34ADFF;
    color: #FFF;
    cursor: pointer;
}
.finalizar {
    display: grid;
    grid-template-columns: 100%;
    grid-column-gap: 1.5rem;
}
</style>
<body>
    
<input type="checkbox" id="sidebar-toggle">
<div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <span>Federal 61</span>
            </h3>


            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="dashboards.php">
                        <span class="ti-home"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="equipe.php">
                        <span class="ti-face-smile"></span>
                        <span>Equipe</span>
                    </a>
                </li>
                <li>
                    <a href="controleGastos.php">
                        <span class="ti-money"></span>
                        <span>Controle de Gastos</span>
                    </a>
                </li>
                <li>
                    <a href="cadastrar.php">
                        <span class="ti-clipboard"></span>
                        <span>Cadastrar</span>
                    </a>
                </li>
                <li>
                    <a href="graficos.php">
                        <span class="ti-bar-chart-alt"></span>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="agenda.php">
                        <span class="ti-agenda"></span>
                        <span>Agenda</span>
                    </a>
                </li>
                <li>
                    <a href="index.php"><span style="display:flex; justify-content: center; background-color:black; padding: 10px; border-radius:15px; " class="ti-arrow-left"></span></span></a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="main-content">
        <main>   
            <section class="recent">
                <div class="activity-grid finalizar">
                    <div class="activity-card">
                        <h3>Finalizar Corte</h3>
                        
                        <div class="table-responsive">
                            <table>
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>id</th>
                                        <th>Nome</th>
                                        <th>data</th>
                                        <th>hora</th>
                                        <th>telefone</th>
                                        <th>barbeiro</th>
                                        <th>Valor do corte</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <?php

                    $id = $_POST['idPegar'];

                    $result = $conn->query("select * from agenda where id_agenda = '$id'");
                    echo '<form action="php/cortesFinalizados.php" method="POST">';
                    while ($row = $result->fetch_object()){
                        echo '
                                
                                    <th><input value="'.$row->id_agenda.'" name="id"></th>
                                    <th><input value="'.$row->nome_cliente.'" name="nome"></th>
                                    <th><input value="'.$row->datacorte.'" name="datacorte"></th>
                                    <th><input value="'.$row->hora.'" name="hora"></th>
                                    <th><input value="'.$row->telefone.'" name="telefone"></th>
                                    <th><input value="'.$row->barbeiro.'" name="barbeiro"></th>
                                    <th><input type="number" name="valorCorte" style="width:80px" value="'.$row->valorCorte.'"></th>
                                    <th><button class="submit" name="id" type="submit">finalizar Corte</button><</th>
                                    <input type="hidden" name="idPegar" value="' .$row->id_agenda.'">
                                  
                            ';
                    }
                    echo '</form>';
                ?>
                                </tr>   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            
        </main>
        
    </div>
    
</body>
</html>