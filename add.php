<?php
// On enregistre notre autoload.
function chargerClasse($classname)
{
  require $classname.'.php';
}

spl_autoload_register('chargerClasse');

session_start(); // On appelle session_start() APRÈS avoir enregistré l'autoload.

if (isset($_GET['deconnexion']))
{
  session_destroy();
  header('Location: .');
  exit();
}

$db = new PDO('mysql:host=localhost;dbname=combat', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

$manager = new PersonnagesManager($db);

if (isset($_SESSION['perso'])) // Si la session perso existe, on restaure l'objet.
{
  $perso = $_SESSION['perso'];
}

if (isset($_POST['creer']) && isset($_POST['nom'])) // Si on a voulu créer un personnage. 
{
  $perso = new Personnage(['nom' => $_POST['nom']]); // On crée un nouveau personnage.
  
  if (!$perso->nomValide()) {
    $message = 'Le nom choisi est invalide.';
    unset($perso);
  }
  elseif ($manager->exists($perso->nom())) {
    $message = 'Le nom du personnage est déjà pris.';
    unset($perso);
  }
  else {
    $manager->add($perso);
  }
}

elseif (isset($_POST['utiliser']) && isset($_POST['nom'])) // Si on a voulu utiliser un personnage.
{
  if ($manager->exists($_POST['nom'])) {
    $perso = $manager->get($_POST['nom']);
  }
  else {
    $message = 'Ce personnage n\'existe pas !'; // S'il n'existe pas, on affichera ce message.
  }
}

elseif (isset($_GET['frapper'])) // Si on a cliqué sur un personnage pour le frapper.
{
  if (!isset($perso)) {
    $message = 'Merci de créer un personnage ou de vous identifier.';
  }
  
  else
  {
    if (!$manager->exists((int) $_GET['frapper'])) {
      $message = 'Le personnage que vous voulez frapper n\'existe pas !';
    }
    
    else {
      $persoAFrapper = $manager->get((int) $_GET['frapper']);
      
      $retour = $perso->frapper($persoAFrapper); // On stocke dans $retour les éventuelles erreurs ou messages que renvoie la méthode frapper.
      
      switch ($retour)
      {
        case Personnage::CEST_MOI :
          $message = 'Mais... pourquoi voulez-vous vous frapper ???';
          break;
        
        case Personnage::PERSONNAGE_FRAPPE :
          $message = 'Le personnage a bien été frappé !';
          
          $manager->update($perso);
          $manager->update($persoAFrapper);
          
          break;
        
        case Personnage::PERSONNAGE_TUE :
          $message = 'Vous avez tué ce personnage !';
          
          $manager->update($perso);
          $manager->delete($persoAFrapper);
          
          break;
      }
    }
  }
}
?>