<?php
session_start();
//vider le variables de session
session_unset();
//supprimer la session;
session_destroy();
//redirection vers la page d'acceuil
header('location:index.php');
?>