<?php
/*
 * Bitrix vars
 *
 * @var CBitrixComponentTemplate $this
 * @var array                    $arParams
 * @var array                    $arResult
 *
 * @var CDatabase                $DB
 * @var CUser                    $USER
 * @var CMain                    $APPLICATION
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$defPic = array('SRC' => DEFPIC);

foreach ($arResult["ITEMS"] as $key => $arItem) {
    if (!is_array($arItem["PREVIEW_PICTURE"])) {
        $arResult["ITEMS"][$key]["PREVIEW_PICTURE"] = $defPic;
    }
}
