<?php

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

Loc::loadMessages(__FILE__);

try {
    if (!\Bitrix\Main\Loader::includeModule('iblock')) {
        ShowError(Loc::getMessage('IBLOCK_MODULE_NOT_INSTALLED'));
        return;
    }
} catch (Main\LoaderException $e) {
}

CBitrixComponent::includeComponentClass("bitrix:advertising.banner");

class QSoftAdvertisingBanner extends AdvertisingBanner
{

}