<?php

/**
 * Created by PhpStorm.
 * User: Mederic
 * Date: 2017-10-03
 * Time: 11:32
 */

require_once('include/header.inc.php');
require_once('include/nav.inc.php');

$dataproject = file_get_contents('https://jsonplaceholder.typicode.com/todos');
$projets = json_decode($dataproject, true);

?>
    <ol class="breadcrumb">
        <div class="container">
            <li class="breadcrumb-item"><a href="indexcrm.php">Accueil</a></li>
            <li class="breadcrumb-item"><a>Projets</a></li>
        </div>
    </ol>
    <div class="container">


        <!--      Systeme de tableau-->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tous-tab" data-toggle="tab" href="#tous" role="tab" aria-controls="home"
                   aria-expanded="true">Tous</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="complet-tab" data-toggle="tab" href="#complet" role="tab"
                   aria-controls="profile">Complétés</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="incomplet-tab" data-toggle="tab" href="#incomplet" role="tab"
                   aria-controls="profile">Non-Complétés</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane show active" id="tous">
                <table class="table table-condensed table-bordered table-striped volumes">
                    <thead>
                    <tr>
                        <th>Nom du projet</th>
                        <th>Statut</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($projets as $projet) {
//            var_dump($projet);
                      ?>
                        <tr>
                            <td><?php echo $projet["title"] ?></td>
                            <td><?php
                              if ($projet["completed"] === true) {
                                echo '<p class="green">Complété</p>';
                              } else {
                                echo '<p class="red">Non-complété</p>';
                              } ?>
                            </td>
                            <td>
                                <a href="projet.php?id=<?php echo $projet["id"] ?>" class="btn btn-secondary btn-sm"
                                >Voir le détail du projet</a>
                            </td>
                        </tr>
                      <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="complet">
                <table class="table table-condensed table-bordered table-striped volumes">
                    <thead>
                    <tr>
                        <th>Nom du projet</th>
                        <th>Statut</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($projets as $projet) {
                      if ($projet["completed"] === true) {
                        ?>
                          <tr>
                              <td><?php echo $projet["title"] ?></td>
                              <td><?php
                                if ($projet["completed"] === true) {
                                  echo '<p class="green">Complété</p>';
                                } else {
                                  echo '<p class="red">Non-complété</p>';
                                } ?>
                              </td>
                              <td>
                                  <a href="projet.php?id=<?php echo $projet["id"] ?>" class="btn btn-secondary btn-sm"
                                  >Voir le détail du projet</a>
                              </td>
                          </tr>
                        <?php
                      }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="incomplet">
                <table class="table table-condensed table-bordered table-striped volumes">
                    <thead>
                    <tr>
                        <th>Nom du projet</th>
                        <th>Statut</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($projets as $projet) {
                      if ($projet["completed"] === false) {
                        ?>
                          <tr>
                              <td><?php echo $projet["title"] ?></td>
                              <td><?php
                                if ($projet["completed"] === true) {
                                  echo '<p class="green">Complété</p>';
                                } else {
                                  echo '<p class="red">Non-complété</p>';
                                } ?>
                              </td>
                              <td>
                                  <a href="projet.php?id=<?php echo $projet["id"] ?>" class="btn btn-secondary btn-sm"
                                  >Voir le détail du projet</a>
                              </td>
                          </tr>
                        <?php
                      }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Fin du systeme de tableau-->
    </div>

<?php
//TODO: Ajouter google charts
require_once('include/footer.inc.php');

?>