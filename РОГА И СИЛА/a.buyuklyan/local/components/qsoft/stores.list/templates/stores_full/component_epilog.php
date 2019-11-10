<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}?>

<div class="yams" style="clear:both; margin: 0 0 0 15px;">
    <?php if ($arParams["SET_SHOW_MAP"] == "Y") {
            $APPLICATION->IncludeComponent(
                "bitrix:map.yandex.view",
                "",
                array(
                "CONTROLS" => array("ZOOM","TYPECONTROL"),
                "INIT_MAP_TYPE" => "MAP",
                "MAP_DATA" => $arResult["YAMSMASS"],
                "MAP_HEIGHT" => "300",
                "MAP_ID" => "",
                "MAP_WIDTH" => "300",
                "OPTIONS" => array("ENABLE_SCROLL_ZOOM")
                )
            );
    }?>
</div>
