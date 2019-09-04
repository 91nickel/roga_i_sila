<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResultItemsModified = [];
$i = 0;
foreach ($arResult['ITEMS'] as $arItem) {
    if ($i == 4) break;

    if ($arItem['PROPERTIES']['MODELS_WEEK']['VALUE'] && $arItem['CATALOG_QUANTITY'] > 0) {
        if (!$arItem['PREVIEW_PICTURE']['SRC']) {
            $arItem['PREVIEW_PICTURE']['SRC'] = NO_IMAGE_PATH;
        }
        $arResultItemsModified[] = $arItem;
        $i++;
    }
}
$arResult['ITEMS'] = $arResultItemsModified;
