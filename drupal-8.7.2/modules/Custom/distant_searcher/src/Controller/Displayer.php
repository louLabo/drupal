<?php

namespace Drupal\distant_searcher\Controller;

use Drupal\Core\TypedData\Plugin\DataType\StringData;
use Drupal\search_api\Plugin\DataType\Html;

function display($type, $results )
{

    if ($type === "experience") {

        foreach ($results as $key => $value) {
            drupal_set_message($value['ville'] . '<br>' . $value['latitude'] . '<br>' . html_entity_decode($value['body']));

            // etc
        }
        //drupal_set_message($results);
    }

}
