<?PHP
require_once('include/header.inc.php');
require_once('include/nav.inc.php');
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 infobox">
            <h2>Bienvenue dans ZeCRM</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt dolores ducimus earum explicabo
                incidunt
                quisquam sed? Atque deserunt doloremque error iure, iusto, laudantium perspiciatis, praesentium quod
                similique
                tempora vel voluptatibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi autem distinctio et exercitationem explicabo illum ipsam nam nisi omnis optio perspiciatis repellendus rerum sed sint sunt vel velit vitae, voluptatem? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, asperiores atque aut doloribus dolorum eaque est eveniet illo impedit in iusto nam neque placeat quia saepe soluta suscipit voluptatem voluptates.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <h4>Profit par mois</h4>
            <div class="chartcontainer">
                <div id="piechart" class="chart"></div>
            </div>

        </div>
        <div class="col-lg-6 col-sm-12">
            <h4>Projets en cours</h4>
            <div class="chartcontainer">
                <div id="piechart2" class="chart"></div>
            </div>
        </div>
    </div>
</div>
<!--//TODO: ajouter les deux graphique dintro-->

<?php
require_once('include/footer.inc.php');
$projectComplet = count(json_decode(file_get_contents('https://jsonplaceholder.typicode.com/todos?completed=true')));
$projectinComplet = count(json_decode(file_get_contents('https://jsonplaceholder.typicode.com/todos?completed=false')));
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  $('document').ready(function(){
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Mois', 'Profit'],
        ['Jan', 1000,],
        ['Mar', 700,],
        ['Mai', 1000,],
        ['Jui', 750,],
        ['Sep', 1000,],
        ['Nov', 720,]
      ]);
      var data2 = google.visualization.arrayToDataTable([
        ['Task', 'Projet'],
        ['complet', <?php echo $projectComplet?> ],
        ['incomplet',<?php echo $projectinComplet?>]
      ]);

      var options = {
        curveType: 'function',
        legend: {position: 'bottom'},
          width: '100%',
          height: '100%'
      };

      var chart = new google.visualization.LineChart(document.getElementById('piechart'));
      var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));

      chart.draw(data, options);
      chart2.draw(data2, options);

    }
    $(window).resize(function(){
      drawChart();
    });
  });


</script>