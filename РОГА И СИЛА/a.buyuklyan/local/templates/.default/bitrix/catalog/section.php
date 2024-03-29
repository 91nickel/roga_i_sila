<?php $APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "",
    array(
        "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "ADD_SECTIONS_CHAIN" => $arParams['ADD_SECTIONS_CHAIN'],
        "ADD_TO_BASKET_ACTION" => "ADD",
        "BASKET_URL" => $arParams["BASKET_URL"],
        "BROWSER_TITLE" => "-",
        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "COMPATIBLE_MODE" => "Y",
        "CONVERT_CURRENCY" => "N",
        "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
        "DETAIL_URL" => "",
        "DISABLE_INIT_JS_IN_COMPONENT" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_COMPARE" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
        "ELEMENT_SORT_FIELD2" => "id",
        "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
        "ELEMENT_SORT_ORDER2" => "desc",
        "ENLARGE_PRODUCT" => "STRICT",
        "FILTER_NAME" => "arrFilter",
        "HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
        "HIDE_NOT_AVAILABLE_OFFERS" => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "INCLUDE_SUBSECTIONS" => "Y",
        "LAZY_LOAD" => "N",
        "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
        "LOAD_ON_SCROLL" => "N",
        "MESSAGE_404" => "",
        "MESS_BTN_ADD_TO_BASKET" => $arParams["MESS_BTN_ADD_TO_BASKET"],
        "MESS_BTN_BUY" => $arParams["MESS_BTN_BUY"],
        "MESS_BTN_DETAIL" => $arParams["MESS_BTN_DETAIL"],
        "MESS_BTN_SUBSCRIBE" => "Подписаться",
        "MESS_NOT_AVAILABLE" => $arParams["MESS_NOT_AVAILABLE"],
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "OFFERS_LIMIT" => "5",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
        "PAGER_TITLE" => "Товары",
        "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "PRICE_CODE" => $arParams["PRICE_CODE"],
        "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
        "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
        "PRODUCT_PROPERTIES" => array(),
        "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
        "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
        "PROPERTY_CODE" => array("",""),
        "RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
        "RCM_TYPE" => "personal",
        "SECTION_CODE" => $arResult['VARIABLES']['SECTION_CODE'],
        "SECTION_ID" => $arResult['VARIABLES']['SECTION_ID'],
        "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
        "SECTION_URL" => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
        "SECTION_USER_FIELDS" => array("",""),
        "SEF_MODE" => $arParams["SEF_MODE"],
        "SEF_URL_TEMPLATES" => $arParams["SEF_URL_TEMPLATES"],
        "SET_BROWSER_TITLE" => $arParams["SET_BROWSER_TITLE"],
        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "SHOW_404" => $arParams["SHOW_404"],
        "SHOW_ALL_WO_SECTION" => "N",
        "SHOW_CLOSE_POPUP" => "N",
        "SHOW_DISCOUNT_PERCENT" => "N",
        "SHOW_FROM_SECTION" => "N",
        "SHOW_MAX_QUANTITY" => $arParams["SHOW_MAX_QUANTITY"],
        "SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
        "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
        "SHOW_SLIDER" => "Y",
        "SLIDER_INTERVAL" => "3000",
        "SLIDER_PROGRESS" => "N",
        "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
        "TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
        "USE_ENHANCED_ECOMMERCE" => $arParams["USE_ENHANCED_ECOMMERCE"],
        "USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
        "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
        "USE_PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"]
    ),
    $component
);
