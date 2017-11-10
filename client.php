<?php
/**
 * User: Mederic Bellemare
 * Date: 2017-10-03
 * Time: 11:32
 */

require_once('include/header.inc.php');
require_once('include/nav.inc.php');
require_once('include/modal.inc.php');
if (isset($_GET['id'])) {
  $data = file_get_contents('https://jsonplaceholder.typicode.com/users?id=' . $_GET['id']);
  $datanotes = file_get_contents('https://jsonplaceholder.typicode.com/posts?userId=' . $_GET['id']);
  $dataproject = file_get_contents('https://jsonplaceholder.typicode.com/todos?userId=' . $_GET['id']);
  $client = json_decode($data, true);
  $notes = json_decode($datanotes, true);
  $projets = json_decode($dataproject, true);
}
?>
<ol class="breadcrumb">
  <div class="container">
    <li class="breadcrumb-item"><a href="indexcrm.php">Accueil</a></li>
    <li class="breadcrumb-item"><a href="clients.php">Clients</a></li>
    <li class="breadcrumb-item"><?php echo $client[0]['name'] ?></li>
  </div>
</ol>
<div class="container">
  <div class="row">
    <div class="col-lg-2 col-sm-6 col-xs-12"><img class="figure-img img-fluid"
                                        src="http://i.pravatar.cc/150?img=<?php echo $client[0]["id"] ?>"
                                        alt="Image de <?php echo $client[0]['name'] ?>">
    </div>
    <div class="col-lg-6 col-sm-6 col-xs-12"><h2><?php echo $client[0]["name"] ?></h2>
      <p>Courriel : <?php echo $client[0]["email"] ?></p>
      <p>Compagnie : <?php echo $client[0]["company"]['name'] ?></p>
      <p>Téléphone : <?php echo $client[0]["phone"] ?></p>
      <a type="button" class="btn btn-danger" href="tel:<?php echo $client[0]["phone"] ?>">Appeler</a>
    </div>
    <div class="col-lg-4 col-xs-12">
      <div class="maps">
        <b>Adresse</b>
        <div id="map"></div>
      </div>
    </div>
  </div>
  <div class="notes">
    <h2>Notes</h2>
    <button type="button" data-toggle="modal" data-target="#addnote">Ajouter une note
    </button>
    <div class="flex-carte" data-user="<?php echo $client[0]["id"] ?>">

    </div>
  </div>
  <div class="projet">
    <h2>Projets du client</h2>
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
</div>

<?php
require_once('include/footer.inc.php');
?>
<script src="js/googlemap.js"></script>
<script src="js/loadnotes.js"></script>
<script type="text/javascript">
  function getMarker() {
    return [
      ['<?php echo $client[0]["name"] ?>', <?php echo $client[0]["address"]["geo"]["lng"] ?>, <?php echo $client[0]["address"]["geo"]["lat"] ?>]

    ];
  }
</script>
