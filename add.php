<?php

require('sensitive_data.php');

try
{
  $bdd = new PDO("mysql:host=localhost;dbname={$db};charset=utf8", "{$user}", "{$psw}");
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}

$msg = htmlspecialchars($_GET["msg"]);
$cat = intval(htmlspecialchars($_GET["value"]))+1;

$sqlQuery = "SELECT * FROM waiting_list WHERE word=\"{$msg}\"";
$recipesStatement = $bdd->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

if($recipes!=NULL) {
  echo "2";
  die();
}

$sqlQuery = "SELECT * FROM bad_words WHERE word=\"{$msg}\"";
$recipesStatement = $bdd->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

if($recipes!=NULL) {
  echo "3";
  die();
}

$sqlQuery = "INSERT INTO `waiting_list`(`word`,`category`) VALUES ('{$msg}','{$cat}')";
$recipesStatement = $bdd->prepare($sqlQuery);
$recipesStatement->execute();

echo "1";

?>