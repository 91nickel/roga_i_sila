<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Наши салоны");
?>

        <? $APPLICATION->IncludeComponent(
	"qsoft:stores.list", 
	"stores_full", 
	array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "stores_full",
		"DETAIL_URL" => "/company/stores/",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"FRAMES_COUNT" => "10",
		"IBLOCKS" => "",
		"IBLOCK_ID" => "4",
		"IBLOCK_PROP" => "44",
		"IBLOCK_TYPE" => "s1",
		"PARENT_SECTION" => "",
		"SHOW_MAP" => "Y"
	),
	false
);?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php") ?>