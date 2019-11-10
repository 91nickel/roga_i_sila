<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Моя корзина");
?><?php $APPLICATION->IncludeComponent(
    "bitrix:sale.basket.basket",
    "basket",
    array(
        "ACTION_VARIABLE" => "basketAction",
        "ADDITIONAL_PICT_PROP_6" => "-",
        "AUTO_CALCULATION" => "Y",
        "BASKET_IMAGES_SCALING" => "adaptive",
        "COLUMNS_LIST_EXT" => array(
            0 => "PREVIEW_PICTURE",
            1 => "DISCOUNT",
            2 => "DELETE",
            3 => "DELAY",
            4 => "TYPE",
            5 => "SUM",
        ),
        "COLUMNS_LIST_MOBILE" => array(
            0 => "PREVIEW_PICTURE",
            1 => "DISCOUNT",
            2 => "DELETE",
            3 => "DELAY",
            4 => "TYPE",
            5 => "SUM",
        ),
        "COMPATIBLE_MODE" => "Y",
        "CORRECT_RATIO" => "Y",
        "DEFERRED_REFRESH" => "N",
        "DISCOUNT_PERCENT_POSITION" => "bottom-right",
        "DISPLAY_MODE" => "extended",
        "HIDE_COUPON" => "Y",
        "LABEL_PROP" => "",
        "LABEL_PROP_MOBILE" => "",
        "LABEL_PROP_POSITION" => "",
        "PATH_TO_ORDER" => "/personal/order/make/",
        "PRICE_DISPLAY_MODE" => "Y",
        "PRICE_VAT_SHOW_VALUE" => "N",
        "PRODUCT_BLOCKS_ORDER" => "props,sku,columns",
        "QUANTITY_FLOAT" => "Y",
        "SET_TITLE" => "Y",
        "SHOW_DISCOUNT_PERCENT" => "Y",
        "SHOW_FILTER" => "N",
        "SHOW_RESTORE" => "Y",
        "TEMPLATE_THEME" => "blue",
        "TOTAL_BLOCK_DISPLAY" => array(
            0 => "top",
        ),
        "USE_DYNAMIC_SCROLL" => "Y",
        "USE_ENHANCED_ECOMMERCE" => "N",
        "USE_GIFTS" => "N",
        "USE_PREPAYMENT" => "N",
        "USE_PRICE_ANIMATION" => "Y",
        "COMPONENT_TEMPLATE" => "basket",
        "MAKE_ORDER_NAME" => "Оформить заказ"
    ),
    false
);?><?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
