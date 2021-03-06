<?php

class CRM_CiviMobileAPI_PushNotification_SaveMessageHelper {

  /**
   * Save send message for contacts
   *
   * @param $listOfContactsID
   * @param $objID
   * @param $objType
   * @param $text
   * @param $title
   *
   * @return bool
   */
  public static function saveMessages($listOfContactsID, $objID, $objType, $title = NULL, $text = NULL) {
    foreach ($listOfContactsID as $contactId) {
      $paramsForInsert = [
        'contact_id' => $contactId,
        'message' => $text,
        'message_title' => $title,
        'entity_table' => $objType,
        'entity_id' => $objID,
        'invokeContactId' => CRM_Core_Session::singleton()->getLoggedInContactID(),
      ];

      CRM_CiviMobileAPI_BAO_PushNotificationMessages::create($paramsForInsert);
    }

    return TRUE;
  }

}
