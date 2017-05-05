<?php

/**
 * @file
 * Contains \Drupal\site_api_key\Controller\NodeJSONController.
 */

namespace Drupal\site_api_key\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * NodeJSONController for the site_api_key module.
 */
class NodeJSONController extends ControllerBase {

  /**
   * Function to render a page node type as JSON.
   *
   * @param $site_api_key
   *   string: site api key value from request URL
   *
   * @param $nid
   *   integer: node ID value from request URL
   *
   * @return $res
   *
   * JSON response with node details or error.
   *
   */

  public function node_json($site_api_key, $nid) {

    // Get Site API Key from Drupal Configuration.
    $saved_key = \Drupal::config('siteapikey.settings')->get('key');

    // Check if API Key is Valid.
    if ( $site_api_key !== $saved_key ) {

      $res = array(
        'Access Denied',
        'Message : Invalid Site API Key.'
      );

      // Return the JSON Response.
      return new JsonResponse($res);

    }

    // Check if Node ID is numeric.
    if ( !is_numeric($nid) && $nid <= 0 ) {

      $res = array(
        'Access Denied',
        'Message : Please enter a numeric Node ID.'
      );

      // Return the JSON Response.
      return new JsonResponse($res);

    }

    // Get Node Information from NID.
    $node = Node::load($nid);
        
    // Check if the node is loaded and it is of type 'page'
    if( !empty($node) && $node->getType() === 'page' ){

      // Select Node Details.
      $n_title = $node->getTitle();
      $n_body = $node->body->getString();
      $n_type = $node->getType();

      // Prepare JSON response.
      $res = array(
        'Node ID' => $nid,
        'Title' => $n_title,
        'Body' => $n_body,
        'Type' => $n_type,
      );

      // Return the JSON Response.
      return new JsonResponse($res);
    }

    // If Node does not exist or is not of type 'Page'.
    else {

      $res = array(
        'Access Denied',
        'Message: No Node found with ID provided or Node is not page type.'
      );

      // Return the JSON Response.
      return new JsonResponse($res);
    }

  }

}
