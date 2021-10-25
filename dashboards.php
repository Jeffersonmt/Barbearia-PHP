<?php
$serve_file = $_SERVER['DOCUMENT_ROOT'] . "/barbearia/";
session_save_path($serve_file . 'cache/temp');
session_start();
include_once($serve_file . 'site/public_html/php/conexao.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">

    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link href="_css/servico.css" rel="stylesheet" type="text/css" />
    
</head>

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

            <h2 class="dash-title">Resultados</h2>

            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-briefcase"></span>
                        <div>
                            <h5>Faturamento</h5>
                            <?php
                            $sql = "SELECT valorCorte from cortes";
                            $result = mysqli_query($conn, $sql);
                            $valor2 = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $valorCorte = $row['valorCorte'];
                                $valor2 += $valorCorte;
                            }
                            echo "<span style='color:orange;font-weight: bold'>R$ " . $valor2, "</span>";
                            ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="graficos.php">Visualizar</a>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-reload"></span>
                        <div>
                            <h5>Gastos</h5>
                            <?php
                            $sql = "SELECT valorProduto from cortes";
                            $result = mysqli_query($conn, $sql);
                            $valor2 = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $valorGasto = $row['valorProduto'];
                                $valor2 += $valorGasto;
                            }
                            echo "<span style='color:red;font-weight: bold'>R$ " . $valor2, "</span>";
                            ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="graficos.php">Visualizar</a>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-check-box"></span>
                        <div>
                            <h5>Lucro</h5>
                            <?php
                            $sql = "SELECT valorCorte, valorProduto from cortes";
                            $result = mysqli_query($conn, $sql);
                            $valor2 = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $valorGasto = $row['valorCorte'] - $row['valorProduto'];
                                $valor2 += $valorGasto;
                            }
                            if($valor2 > 0){
                                echo "<span style='color:green;font-weight: bold'>$valor2</span>";
                            }else{
                                echo "<span style='color:red;font-weight: bold'>$valor2</span>";
                            } 
                            ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="graficos.php">Visualizar</a>
                    </div>
                </div>
            </div>


            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <h3>Barbeiros</h3>

                        <div class="table-responsive">
                            <table>
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Quantidade em R$</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $result = $conn->query("select barbeiro, sum(valorCorte) as valorCorte from cortes where valorCorte > 0 group by barbeiro ;");
                                        while ($row = $result->fetch_object()) {
                                            echo '
                                <tr>
                                    <th>' . $row->barbeiro . '</th>
                                    <th>' . $row->valorCorte . '</th>
                                  </tr>
                            ';
                                        }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="summary">
                        <div class="summary-card">
                            <div class="summary-single">
                                <span class="ti-id-badge"></span>
                                <div>
                                    <?php
                                    $sql = "SELECT COUNT(barbeiro) as total from cortes";
                                    $result = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo "<h5><span style='color:green;font-weight: bold'>" . $data['total'], "</span></h5>";
                                    ?>
                                    <small>Cortes finalizados</small>
                                </div>
                            </div>
                            <div class="summary-single">
                                <span class="ti-calendar"></span>
                                <div>
                                    <?php
                                    $sql = "SELECT COUNT(*) as total from agenda";
                                    $result = mysqli_query($conn, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo "<h5><span style='color:red;font-weight: bold'>" . $data['total'], "</span></h5>";
                                    ?>
                                    <small>Número de Agenamentos</small>
                                </div>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

    </div>

</body>

</html>