<?php

/**
 * Created by PhpStorm.
 * User: Mederic
 * Date: 2017-10-03
 * Time: 11:32
 */

require_once('include/header.inc.php');
require_once('include/nav.inc.php');
if (isset($_GET['id'])) {
  $dataproject = file_get_contents('https://jsonplaceholder.typicode.com/todos?id=' . $_GET['id']);
  $projets = json_decode($dataproject, true);
  $userdata = file_get_contents('https://jsonplaceholder.typicode.com/users?id=' . $projets[0]['userId']);
  $user = json_decode($userdata, true);
}
?>
  <ol class="breadcrumb">
    <div class="container">
      <li class="breadcrumb-item"><a href="indexcrm.php">Accueil</a></li>
      <li class="breadcrumb-item"><a href="projets.php">Projets</a></li>
      <li class="breadcrumb-item"><?php echo $projets[0]['title']; ?></li>
    </div>
  </ol>
  <div class="container">
    <h2><?php echo $projets[0]['title']; ?></h2>
    <p ><span class="font-weight-bold">État :</span>

      <?php
      if ($projets[0]['completed'] === true){
        ?><span class="badge badge-success">Complété</span><?php
      }else{
        ?><span class="badge badge-danger">Non-complété</span><?php
      }
    ?>
    </p>
    <p class=""><span class="font-weight-bold">Client :</span> <?php echo $user[0]['name']; ?></p>
    <p class="font-weight-bold">Description du projet</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores cumque debitis eaque esse incidunt magni maxime molestias nisi officiis omnis optio perferendis quas quis, repellat sed sequi, soluta vel voluptate!</p>
      <p class="font-weight-bold">Échéancier</p>
      <div class="chartcontainer">
          <div id="chart" class="chart"></div>
      </div>
  </div>


<?php

require_once('include/footer.inc.php');

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['timeline']});
    google.charts.setOnLoadCallback(drawChart);
    $(window).resize(function(){
        drawChart();
    });
    function drawChart() {
        var container = document.getElementById('chart');
        var chart = new google.visualization.Timeline(container);
        var dataTable = new google.visualization.DataTable();

        dataTable.addColumn({ type: 'string', id: 'President' });
        dataTable.addColumn({ type: 'date', id: 'Start' });
        dataTable.addColumn({ type: 'date', id: 'End' });
        dataTable.addRows([
            [ 'Analyse', new Date(2017, 3, 30), new Date(2017, 7, 4) ],
            [ 'Wireframes',      new Date(2017, 2, 4),  new Date(2017, 4, 4) ],
            [ 'Design',      new Date(2017, 2, 4),  new Date(2017, 6, 4) ],
            [ 'Frontend',      new Date(2017, 2, 4),  new Date(2017, 4, 4) ],
            [ 'Backend',  new Date(2017, 2, 4),  new Date(2017, 5, 4) ]]);
        var options = {
            curveType: 'function',
            legend: {position: 'bottom'},
            width: '100%',
            height: '100%'
        };
        chart.draw(dataTable,options);
    }
</script>
