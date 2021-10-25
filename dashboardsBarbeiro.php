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
                    <a href="">
                        <span class="ti-clipboard"></span>
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
                <div>
                <form style="display:flex; justify-content: center;" action="<?php echo $_SERVER ['PHP_SELF']; ?>">
                    <input style="border-radius: 15px; padding:10px;" type="text" name="parametro" placeholder="Barbeiro">
                    <button class="submit" type="submit">Buscar</button>
                </form>
                
                    <div class="activity-card">
                        <h3>Clientes Agendados</h3>

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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $parametro = filter_input(INPUT_GET, "parametro");
                                        $result = $conn->query("SELECT * from agenda where barbeiro like '%$parametro%'");
                                        while ($row = $result->fetch_object()) {
                                            if($parametro){
                                                echo '
                                                <form action="php/finalizarCorte.php" method="POST">
                                                <tr>
                                                    <th>' . $row->id_agenda . '</th>
                                                    <th>' . $row->nome_cliente . '</th>
                                                    <th>' . $row->datacorte . '</th>
                                                    <th>' . $row->hora . '</th>
                                                    <th>' . $row->telefone . '</th>
                                                    <th>' . $row->barbeiro . '</th>
                                                </tr>
                                                </form>
                                            ';
                                            } else {
                                                echo '
                                                <form action="php/finalizarCorte.php" method="POST">
                                                <tr>
                                                    <th>' . $row->id_agenda . '</th>
                                                    <th>' . $row->nome_cliente . '</th>
                                                    <th>' . $row->datacorte . '</th>
                                                    <th>' . $row->hora . '</th>
                                                    <th>' . $row->telefone . '</th>
                                                    <th>' . $row->barbeiro . '</th>
                                                </tr>
                                                </form>
                                            ';
                                            }
                                            
                                        }
                                       ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>
    </section>
            
        </main>
        
    </div>
    
</body>
</html>