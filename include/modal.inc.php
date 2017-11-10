<!--Modal de connection aux CRM-->
<div class="modal fade" id="connectionModal" tabindex="-1" role="dialog" aria-labelledby="connectionModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ce connecter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="login" class="form-control-label">Identifiant:</label>
            <input type="text" class="form-control" id="login">
          </div>
          <div class="form-group">
            <label for="mdp" class="form-control-label">Mot de passe:</label>
            <input class="form-control" id="mdp" type="password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="">
                Enregistrer mon mot de passe
              </label>
            </div>
          </div>
          <div class="form-group">
            <a href="indexcrm.php" class="btn btn-primary">Connexion</a>
          </div>

          <div class="card w-100">
            <div class="card-body">
              <h4 class="card-title">Mot de passe oublié?</h4>
              <div class="form-group">
                <label for="lostlogin" class="form-control-label">Courriel:</label>
                <input type="text" class="form-control" id="lostlogin">
              </div>
              <a href="#" class="btn btn-primary">Envoyer</a>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!--Fin du modal connection aux CRM-->

<!--Modal pour le register aux CRM-->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="connectionModal"
     aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Création de compte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                     value="option1">Madame
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                     value="option1">Monsieur
            </label>
          </div>


          <div class="form-group">
            <label for="name" class="form-control-label">Nom:</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="prenom" class="form-control-label">prénom:</label>
            <input type="text" class="form-control" id="prenom">
          </div>
          <div class="form-group">
            <label for="identif" class="form-control-label">identifiant:</label>
            <input type="text" class="form-control" id="identif">
          </div>
          <div class="form-group">
            <label for="mdp" class="form-control-label">Mot de passe:</label>
            <input class="form-control" id="mdp" type="password">
          </div>
          <div class="form-group">
            <label for="mdp2" class="form-control-label">Répétez le mot de passe:</label>
            <input class="form-control" id="mdp2" type="password">
          </div>
          <div class="form-group">
            <label for="entreprise">Type d'entreprise</label>
            <select class="form-control" id="entreprise">
              <option>Solo</option>
              <option>PME</option>
              <option>500+</option>
              <option>1000+</option>
              <option>8000+</option>
            </select>
          </div>
          <div class="form-group">
            <div class="form-check">
              <a href="#">Je donne mon âme à satan</a>
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="">
                j'ai lu et j'accepte les conditions d'utilisation
              </label>
            </div>
          </div>


        </form>
      </div>
      <div class="modal-footer">
        <a href="indexcrm.php" class="btn btn-primary">Créer mon compte</a>
      </div>
    </div>
  </div>
</div>
<!--Fin du model pour le register CRM-->





<!--Modal dajout dune note aux client-->
<div class="modal fade" id="addnote" tabindex="-1" role="dialog" aria-labelledby="addnote" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title" class="form-control-label">Titre:</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="mdp" class="form-control-label">Description:</label>
                        <textarea class="form-control" name="desc" id="desc" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-primary" data-dismiss="modal">Envoyer</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--Fin du modal Ajout dune note-->