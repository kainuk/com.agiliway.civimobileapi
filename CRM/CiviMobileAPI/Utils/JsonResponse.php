<?php

/**
 * Sends JSON response
 */
class CRM_CiviMobileAPI_Utils_JsonResponse
{
  /**
   * Sends JSON response
   * @param $http_code
   * @param $data
   */
  public static function sendResponse($http_code, $data)
  {
    http_response_code($http_code);
    CRM_Utils_JSON::output($data);
  }

  /**
   * Prepares success JSON response
   * @param $data
   */
  public static function sendSuccessResponse($data = [])
  {
    $data['is_error'] = 0;
    self::sendResponse(200, $data);
  }

  /**
   * Prepares wrong JSON response
   * @param $message
   * @param null $field
   */
  public static function sendErrorResponse($message, $field = NULL)
  {
    $data = [
      'is_error' => 1,
      'error_message' => $message
    ];
    if ($field)
      $data['error_field'] = $field;

    self::sendResponse(404, $data);
  }

}
