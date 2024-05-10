<?php require('../elements/header.php');
require_once('../function/function.php');

$id = $_GET['id'];
$results = informationPersonnelleUtilisateur($connexion, $id);
if(isset($_POST['submit'])){
    update($connexion, $id);
}

?>

<h1>Modifications des Information</h1>
<?php   if($results != null) { ?>
<form action="" method="post" enctype="multipart/form-data">
  <fieldset>
    <div>
      <label for="exampleInput" class="form-label mt-4">Nom</label>
      <input type="text" class="form-control" id="exampleInput" placeholder="Enter nom" name="nom" value="<?= $results['nom']  ?>">
    </div>
    <div>
      <label for="exampleInput" class="form-label mt-4">Prenoom</label>
      <input type="text" class="form-control" id="exampleInput" placeholder="Enter prenom" name="prenom" value="<?= $results['prenom']  ?>">
    </div>
    <div>
      <label for="exampleInput" class="form-label mt-4">Address</label>
      <input type="text" class="form-control" id="exampleInput" placeholder="Enter address" name="adresse" value="<?= $results['adresse']  ?>">
    </div>
    <div>
      <label for="exampleInputEmail1" class="form-label mt-4">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="mail" value="<?= $results['mail']  ?>">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
  </fieldset>
</form>
<?php }?>
<?php require('../elements/footer.php') ?>
