<?php
$titre = "Acceuil";
require('./elements/header.php');
require_once('./function/function.php');

$results = null;
if(isset($_POST['afficher']) && isset($_POST['id_afficher'])){
    $id = $_POST['id_afficher'];
    $results = informationPersonnelleUtilisateur($connexion, $id);
}
if(isset($_POST['edit']) && isset($_POST['id_edit'])){
  $id = $_POST['id_edit'];
  header("Location: pages/update.php?id=$id");
  exit;
}

if(isset($_POST['supprimer'])){
    supprimerUser($connexion, $_POST['id_supprimer']);
}

$utilisateurs = listUtilisateur($connexion);
?>
<div class="row">
    <div class="col-7">
        <h1>Liste de utilisateurs</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $utilisateur) { ?>
                    <tr class="table-active">
                        <th scope="row"><img src="./assests/img/<?= $utilisateur['photo'] ?>" alt="" class="profil"></th>
                        <td><?= $utilisateur['nom'] ?></td>
                        <td><?= $utilisateur['prenom'] ?></td>
                        <td>
                            <div class="action">
                                <form method="post" action="">
                                    <input type="hidden" name="id_supprimer" value="<?= $utilisateur['id'] ?>">
                                    <button type="submit" name="afficher"><i class="bi bi-cast"></i></button>
                                    <input type="hidden" name="id_afficher" value="<?= $utilisateur['id'] ?>">
                                    <button type="submit" name="supprimer"><i class="bi bi-trash3" alt="suppression"></i></button>
                                    <input type="hidden" name="id_edit" value="<?= $utilisateur['id'] ?>">
                                    <button type="submit" name="edit"><i class="bi bi-pencil-square"></i></button>  
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-5">
        <h1>Information personnel</h1>
        <?php 
            if($results != null) {
                echo "<p>Nom : " . $results['nom'] . "</p>";
                echo "<p>Prénom : " . $results['prenom'] . "</p>";
            } else {
                echo "Aucune information disponible.";
            }
        ?>
    </div>
</div>
<?php require('./elements/footer.php'); ?>
