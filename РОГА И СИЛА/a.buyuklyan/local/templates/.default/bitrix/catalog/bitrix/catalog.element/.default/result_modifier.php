<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$defPic = array('SRC' => DEFPIC);

if (!is_array($arResult["PREVIEW_PICTURE"])) {
    $arResult["PREVIEW_PICTURE"] = $defPic;
}
if (!is_array($arResult["DETAIL_PICTURE"])) {
    $arResult["DETAIL_PICTURE"] = $defPic;
}
