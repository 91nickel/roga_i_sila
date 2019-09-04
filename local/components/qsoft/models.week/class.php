<?

use \Bitrix\Main;
use \Bitrix\Main\Loader;
use \Bitrix\Main\Error;
use \Bitrix\Main\Type\DateTime;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Iblock;
use \Bitrix\Iblock\Component\ElementList;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global CIntranetToolbar $INTRANET_TOOLBAR
 */

Loc::loadMessages(__FILE__);

try {
    if (!\Bitrix\Main\Loader::includeModule('iblock')) {
        ShowError(Loc::getMessage('IBLOCK_MODULE_NOT_INSTALLED'));
        return;
    }
} catch (Main\LoaderException $e) {
}

CBitrixComponent::includeComponentClass("bitrix:catalog.section");

class ModelsWeek extends CatalogSectionComponent
{

}