<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Посмотреть историю заказов");
?><div>
     Text here.... <br>
</div>
<div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:sale.personal.order",
            "",
            array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ALLOW_INNER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "3600",
            "CACHE_TYPE" => "A",
            "CUSTOM_SELECT_PROPS" => array(""),
            "DETAIL_HIDE_USER_INFO" => array("0"),
            "HISTORIC_STATUSES" => array("F"),
            "NAV_TEMPLATE" => "",
            "ONLY_INNER_FULL" => "N",
            "ORDERS_PER_PAGE" => "20",
            "ORDER_DEFAULT_SORT" => "STATUS",
            "PATH_TO_BASKET" => "/personal/cart",
            "PATH_TO_CATALOG" => "/catalog/",
            "PATH_TO_PAYMENT" => "/personal/order/payment/",
            "PROP_1" => array(""),
            "PROP_2" => array(""),
            "REFRESH_PRICES" => "N",
            "RESTRICT_CHANGE_PAYSYSTEM" => array("0"),
            "SAVE_IN_SESSION" => "Y",
            "SEF_MODE" => "N",
            "SET_TITLE" => "Y",
            "STATUS_COLOR_F" => "gray",
            "STATUS_COLOR_N" => "green",
            "STATUS_COLOR_P" => "yellow",
            "STATUS_COLOR_PSEUDO_CANCELLED" => "red"
            )
);?><br>
</div><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>