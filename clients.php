<?php
/**
 * Created by PhpStorm.
 * User: Mederic
 * Date: 2017-10-03
 * Time: 11:32
 */

require_once('include/header.inc.php');
require_once('include/nav.inc.php');
$data = file_get_contents('https://jsonplaceholder.typicode.com/users/');
$clients = json_decode($data, true);

?>
  <ol class="breadcrumb">
    <div class="container">
      <li class="breadcrumb-item"><a href="#">Accueil</a></li>
      <li class="breadcrumb-item">Clients</li>
    </div>
  </ol>
  <div class="container">
    <div class="d-flex justify-content-start">
      <div class="p-2"><h1>Clients</h1></div>
      <div class="ml-auto p-2"><a href="#" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Ajouter
          un client</a></div>
    </div>

    <div class="flex-carte">
      <?php
      foreach ($clients as $client) {
//var_dump($client);
        ?>

        <div class="carte">
          <img class="card-img-top" src="http://i.pravatar.cc/150?img=<?php echo $client["id"] ?>"
               alt="image de <?php echo $client["name"] ?>">
          <div class="card-body">
            <h4 class="card-title"><?php echo $client["name"] ?></h4>
            <p class="card-text"><?php echo $client["company"]['name'] ?></p>
            <p class="card-text">
              <small class="text-muted"><?php echo $client["email"] ?></small>
            </p>
            <a href="client.php?id=<?php echo $client["id"] ?>" class="btn btn-secondary btn-sm active"
               role="button" aria-pressed="true">Voir la fiche</a>
            <a href="tel:<?php echo $client["phone"] ?>" class="btn btn-secondary btn-sm active" role="button"
               aria-pressed="true">Appeler</a>
          </div>
        </div>


        <?php
      }
      ?>
      <div class="carte">
        <div class="card-text">
          <a href="#" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Ajouter un
            client</a>
        </div>
      </div>
    </div>
  </div>
  </div>

<?php
require_once('include/footer.inc.php');

?>