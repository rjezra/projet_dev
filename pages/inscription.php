<?php require('../elements/header.php');
require_once('../function/function.php');

if(isset($_POST['submit'])){
  ajoutUtilisateur($connexion);
}

?>

<h1>Formulaire d'inscription</h1>
<form action="" method="post" enctype="multipart/form-data">
  <fieldset>
    <div>
      <label for="exampleInput" class="form-label mt-4">Nom</label>
      <input type="text" class="form-control" id="exampleInput" placeholder="Enter nom" name="nom">
    </div>
    <div>
      <label for="exampleInput" class="form-label mt-4">Prenoom</label>
      <input type="text" class="form-control" id="exampleInput" placeholder="Enter prenom" name="prenom">
    </div>
    <div>
      <label for="exampleInput" class="form-label mt-4">Address</label>
      <input type="text" class="form-control" id="exampleInput" placeholder="Enter address" name="adresse">
    </div>
    <div>
      <label for="exampleInputEmail1" class="form-label mt-4">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="mail">
    </div>
    <div>
      <label for="formFile" class="form-label mt-4">Default file input example</label>
      <input type="file" name="photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
  </fieldset>
</form>

<?php require('../elements/footer.php') ?>
