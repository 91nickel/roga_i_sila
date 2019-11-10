<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

$APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "store",
    array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "PROPERTY_CODE" => $arParams["PROPERTY_CODE"],
        "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
        "BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "MESSAGE_404" => $arParams["MESSAGE_404"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "SHOW_404" => $arParams["SHOW_404"],
        "FILE_404" => $arParams["FILE_404"],
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
        "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
        "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
        "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["salons"],
        "ADD_ELEMENT_CHAIN" => $arParams["ADD_ELEMENT_CHAIN"],
    ),
    $component
);
