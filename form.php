<?php include 'add.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>TP : Mini jeu de combat</title>
    
    <meta charset="utf-8">
  </head>
  <body>
    <p>Nombre de personnages créés : <?= $manager->count() ?></p>
<?php
if (isset($message)) // On a un message à afficher ?
{
  echo '<p>', $message, '</p>'; // Si oui, on l'affiche.
}
// Si on utilise un personnage (nouveau ou pas)
if (isset($perso)) {
?>
    <p><a href="?deconnexion=1">Déconnexion</a></p>
    
    <fieldset>
      <legend>Mes informations</legend>
      <p>
        Nom : <?= htmlspecialchars($perso->nom()) ?><br>
        Dégâts : <?= $perso->degats() ?>
      </p>
    </fieldset>
    
    <fieldset>
      <legend>Qui frapper ?</legend>
      <p>
<?php
$persos = $manager->getList($perso->nom());

if (empty($persos)) {
  echo 'Personne à frapper !';
}

else
{
  foreach ($persos as $unPerso)
  {
    echo '<a href="?frapper=', $unPerso->id(), '">', htmlspecialchars($unPerso->nom()), '</a> (dégâts : ', $unPerso->degats(), ')<br>';
  }
}
?>
      </p>
    </fieldset>
<?php
}
else
{
?>
    <form action="" method="post">
      <p>
        Nom : <input type="text" name="nom" maxlength="50">
        <input type="submit" value="Créer ce personnage" name="creer">
        <input type="submit" value="Utiliser ce personnage" name="utiliser">
      </p>
    </form>
<?php
}
?>
  </body>
</html>
<?php
 // Si on a créé un personnage, on le stocke dans une variable session afin d'économiser une requête SQL.
if (isset($perso)) {
  $_SESSION['perso'] = $perso;
}