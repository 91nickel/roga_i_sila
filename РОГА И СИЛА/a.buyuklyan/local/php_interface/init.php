<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/local/php_interface/vendor/autoload.php';
require_once($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/qsoft/const.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/qsoft/debug.php");
AddEventHandler("main", "OnAfterUserAuthorize", array("MyOnAfterUserAuthorizeHandler", "OnAfterUserAuthorizeHandler"));
class MyOnAfterUserAuthorizeHandler
{
    public function OnAfterUserAuthorizeHandler($arUser)
    {
        $arEventFields = array (
            'LOGIN' => $arUser["user_fields"]["LOGIN"],
            'NAME' => $arUser["user_fields"]["NAME"],
            'LAST_NAME' => $last_name = $arUser["user_fields"]["LAST_NAME"],
            'EMAIL' => $email = $arUser["user_fields"]["EMAIL"],
            'TIME' => date("Y.m.d H:i:s")
        );
        CEvent::Send("USER_AUTHORIZED", "s1", $arEventFields, "85");
    }
}

// регистрируем обработчик After
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("MyAfterIBlockElementUpdate", "OnAfterIBlockElementUpdateHandler"));

class MyAfterIBlockElementUpdate
{
    // создаем обработчик события "OnAfterIBlockElementUpdate"
    function OnAfterIBlockElementUpdateHandler(&$arFields)
    {
        if($arFields)
            debugfile($arFields, "AfterUpdate.dbg");
        else
            debugfile("пусто", "AfterUpdate.dbg");
    }
}

// регистрируем обработчик Before
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("MyBeforeIBlockElementUpdate", "OnBeforeIBlockElementUpdateHandler"));

class MyBeforeIBlockElementUpdate
{
    // создаем обработчик события "OnBeforeIBlockElementUpdate"
    function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
        if($arFields)
            debugfile($arFields, "BeforeUpdate.dbg");
        else
            debugfile("пусто", "BeforeUpdate.dbg");
    }
}