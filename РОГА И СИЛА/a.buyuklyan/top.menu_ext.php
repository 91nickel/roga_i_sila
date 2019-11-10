<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections",
	"",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DEPTH_LEVEL" => "3",
		"DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_ID#/",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "products",
		"IS_SEF" => "Y",
		"SECTION_PAGE_URL" => "#SECTION_CODE#/",
		"SEF_BASE_URL" => "/catalog/"
	)
);

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
