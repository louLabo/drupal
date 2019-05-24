<?php

namespace Drupal\distant_searcher\Controller;

use Drupal\Core\TypedData\Plugin\DataType\StringData;
use Drupal\search_api\Plugin\DataType\Html;

function display($type, $results )
{
    if ($type === "experience") { //si la donnée est une expérience

        foreach ($results as $key => $value) {  //pour chaque expérience
            drupal_set_message($value['ville'] . '<br>' . $value['latitude'] . '<br>' . html_entity_decode($value['body']));
        }
    }

}
