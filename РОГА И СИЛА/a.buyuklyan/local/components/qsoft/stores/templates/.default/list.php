<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}?>

<?php $APPLICATION->IncludeComponent(
    "qsoft:stores.list",
    "stores_full",
    array(
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
        "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "MESSAGE_404" => $arParams["MESSAGE_404"],
        "PROPERTY_CODE" => $arParams["PROPERTY_CODE"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "SHOW_404" => $arParams["SHOW_404"],
        "SORT_BY" => $arParams["SORT_BY"],
        "SORT_ORDER" => $arParams["SORT_ORDER"],
        "SALONS_COUNT" => $arParams["SALONS_COUNT"],
        "SET_SHOW_MAP" => $arParams["SET_SHOW_MAP"],
    ),
    $component
);
