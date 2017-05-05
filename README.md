# Site API Key Module

## This module needs to alter the existing Drupal "Site Information" form. Specifics:

1. A new form text field named "Site API Key" needs to be added to the "Site Information" form with the default value of “No API Key yet”.

2. When this form is submitted, the value that the user entered for this field should be saved as the system variable named "siteapikey".

3. A Drupal message should inform the user that the Site API Key has been saved with that value.

4. When this form is visited after the "Site API Key" is saved, the field should be populated with the correct value.

5. The text of the "Save configuration" button should change to "Update Configuration".

6. This module also provides a URL that responds with a JSON representation of a given node with the content type "page" only if the previously submitted API Key and a node id (nid) of an appropriate node are present, otherwise it will respond with "access denied".

## Example URL

1. http://localhost/page_json/FOOBAR12345/1

### References

- [Drupal 8 Form API](https://www.drupal.org/docs/8/api/form-api/introduction-to-form-api)
- [Drupal 8 Configuration API](https://www.drupal.org/docs/8/api/configuration-api/configuration-api-overview)
- [Drupal 8 JsonResponse](https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21JsonResponse.php/class/JsonResponse/8.2.x)
- [Drupal 8 entityTypeManager](https://api.drupal.org/api/drupal/core%21lib%21Drupal.php/function/Drupal%3A%3AentityTypeManager/8.2.x)

  Development time: 1.5 Hours
