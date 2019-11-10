<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/constants.php');
// скрипт в файле /bitrix/php_interface/init.php
use Bitrix\Main\Mail\Event;

AddEventHandler("main", "OnAfterUserLogin", array("AfterLoginClass", "AfterLogin"));
class AfterLoginClass
{
    public function AfterLogin(&$arFields)
    {
        $rsUser = CUser::GetByID($arFields['USER_ID']);
        $arUser = $rsUser->Fetch();

        Event::send(array(
            "EVENT_NAME" => "USER_LOGIN",
            "LID" => $arUser['LID'],
            "C_FIELDS" => array(
                "USER_ID" => $arUser['ID'],
                'LOGIN' => $arUser['LOGIN'],
                'NAME' => $arUser['NAME'],
                'LAST_NAME' => $arUser['LAST_NAME'],
                "EMAIL" => $arUser['EMAIL'],
                'LAST_LOGIN' => $arUser['LAST_LOGIN']
            ),
        ));
    }
}
