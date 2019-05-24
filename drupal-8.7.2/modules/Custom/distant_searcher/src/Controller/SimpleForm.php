<?php
/**
 * @file
 * Contains \Drupal\hello_world\Controller\HelloController.
 */
namespace Drupal\distant_searcher\Controller;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

include 'Requester.php';

/**
 * Our simple form class.
 */

class SimpleForm extends FormBase {

    public function getFormId() {
        return 'drupalup_simple_form';
      }

      /**
       * {@inheritdoc}
       */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['search'] = [
      '#type' => 'textfield',
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Rechercher'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

      $res = $form_state->getValue('search');
      //send to requester the data typed by the user
      requester($res);

     // drupal_set_message($response.'wsh' ) ;
  }
}