<?php

namespace Drupal\distant_searcher\Controller;

include 'Displayer.php';


function requester($data)
{
  include 'Config_distant_searcher.php';

  $total_json = array();
  /*$urls = array();
  foreach ($sources as $key => $value) {
    array_push($urls , $value) ;
  }*/
  $max = count($sources)-1; //récupère le nombre total de sources

  for ($i=0 ; $i<=$max ; $i++){ //pour chacune des sources

    //on choisit l'URL à requeter en fonction de la recherche à effectuer
    if ($data == null) {
      $url = $sources[$i] ;
    }
    else{
      $url = $sources[$i].'?recherche=' . t($data) ;
    }

    //on récupère les données
    $response = file_get_contents($url);
    $parsed_json = json_decode($response, true);
    $parsed_json = $parsed_json['records'];

    foreach ($parsed_json as $key => $value) {
        array_push($total_json , $value) ;
    }
  }

  //on affiche les données
  display('experience', $total_json );

}
