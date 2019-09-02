<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<? if ($arParams['SHOW_MAP']) : ?>
<figure class="shops_block_item" style="margin-top: 1rem; margin-bottom: -2rem;">
    <? $APPLICATION->IncludeComponent(
            "bitrix:map.yandex.view",
            "",
            array(
                "CONTROLS" => array("ZOOM", "MINIMAP", "TYPECONTROL", "SCALELINE"),
                "INIT_MAP_TYPE" => "MAP",
                "MAP_DATA" => serialize($arParams['MAP_CENTER']),
                "MAP_HEIGHT" => "500",
                "MAP_ID" => "salon",
                "MAP_WIDTH" => "600",
                "OPTIONS" => array("ENABLE_SCROLL_ZOOM")
            )
        ); ?>
</figure>
<div style="clear:both;"></div>

<? endif ?>