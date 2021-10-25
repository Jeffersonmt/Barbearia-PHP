<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['faturamento', 'valor gasto'],
          
          <?php

          include 'conexao.php';
          $sql = "SELECT * from cortes";
          $buscar = mysqli_query($conn, $sql);

          while ($dados = mysqli_fetch_array($buscar)){
            $nome = $dados['valorCorte'];
            $valor = $dados['valorCompra']; ?>
          
          ['<?php echo $nome ?>',<?php echo $valor ?>],
          <?php } ?>
        ]);

        var options = {
          chart: {
            title: 'Tabela de gastos',
            subtitle: 'Desde 2021',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>

    <input type="text" class="telefone" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script>
$(document).ready(function(){
     $('.telefone').mask("(99) 99999-9999");
});
</script>
  </body>
</html>
