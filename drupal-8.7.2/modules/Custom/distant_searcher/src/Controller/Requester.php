<?php

namespace Drupal\distant_searcher\Controller;

include 'Displayer.php';


function requester($data)
{
  include 'Config_distant_searcher.php'; //include du fichier dans lequel se trouve le tableau contenant les urls des sources.

  $total_json = array();  //création du tableau qui rassemblera les données de toutes les sources
  $max = count($sources)-1; //récupère le nombre total de sources

  for ($i=0 ; $i<=$max ; $i++){ //pour chacune des sources

    //on choisit l'URL à requeter en fonction de la recherche à effectuer (url basique ou avec des paramètres)
    //il faut bien faire attention à ce que l'argument soit passé par un paramètre qui ait le même nom ici et dans l'API
    //(par exemple ici le paramètre a pour nom "recherche", mais ce nom peut etre modifié tant que l'API est elle aussi modifiée pour correspondre)
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

    //ajoute les données récupérées dans le tableau qui rassemblera les données de toutes les sources
    foreach ($parsed_json as $key => $value) {
        array_push($total_json , $value) ;
    }
  }

  //on affiche les données
  display('experience', $total_json );

}
