<?php
/**
 * @file
 * Contains \Drupal\hello_world\Controller\HelloController.
 */
namespace Drupal\distant_searcher\Controller;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

include 'Requester.php';    //include le fichier chargé de requêter les sources de données

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

      //la barre dans lequel on peut taper les mots-clé
      $form['search'] = [
        '#type' => 'textfield',
      ];

      // le bouton pour valider et lancer la recherche
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
      //lance la requete avec en paramètre ce qui a été tapé dans la barre de recherche par l'utilisateur
      requester($res);
  }
}
