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

$msg = htmlspecialchars($_GET['msg']);

$delimiter = ' ';

$words = explode($delimiter, $msg);

$value = 0;

foreach ($words as $word) {
  //check suspect word is in the data base
  $sqlQuery = "SELECT * FROM bad_words WHERE word=\"{$word}\"";
  $recipesStatement = $bdd->prepare($sqlQuery);
  $recipesStatement->execute();
  $recipes = $recipesStatement->fetchAll();

  if ($recipes!=NULL) {
    if(intval($recipes[0]["strength"])>$value) {
      $value = intval($recipes[0]["strength"]);
    }
  }
}

echo $value;
?>