<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши салоны");
?><?php $APPLICATION->IncludeComponent(
    "qsoft:stores",
    ".default",
    array(
        "ADD_ELEMENT_CHAIN" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "COMPONENT_TEMPLATE" => ".default",
        "DETAIL_URL" => "",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "FIELD_CODE" => array(
            0 => "DATE_CREATE",
            1 => "",
        ),
        "IBLOCK_ID" => "4",
        "IBLOCK_TYPE" => "salons",
        "MESSAGE_404" => "",
        "PROPERTY_CODE" => array(
            0 => "ADDRESS",
            1 => "MAP",
            2 => "PHONE",
            3 => "WORK_HOURS",
            4 => "",
        ),
        "SALONS_COUNT" => "3",
        "SEF_FOLDER" => "/company/stores/",
        "SEF_MODE" => "Y",
        "SET_SHOW_MAP" => "Y",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "SORT_BY" => "ID",
        "SORT_ORDER" => "ASC",
        "URL_SHOW_ALL" => "/company/stores/",
        "SEF_URL_TEMPLATES" => array(
            "salons" => "",
            "detail" => "#ELEMENT_CODE#/",
        )
    ),
    false
);?><?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
