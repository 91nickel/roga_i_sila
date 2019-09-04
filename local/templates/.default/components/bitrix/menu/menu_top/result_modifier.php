<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResultSort = [];
foreach ($arResult as $key => $item) {
    if ($item['DEPTH_LEVEL'] == 1) {
        $arResultSort[] = $item;
    }
    if ($item['DEPTH_LEVEL'] != 1) {
        $arResultSort[count($arResultSort) - 1]['CHILDREN'][] = $item;
    }
}

$arResult = $arResultSort;