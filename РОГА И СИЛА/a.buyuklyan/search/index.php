<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?><?php $APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	"clearNew", 
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"NO_WORD_LOGIC" => "N",
		"PAGER_TEMPLATE" => "pagenavigation",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGE_RESULT_COUNT" => "10",
		"PATH_TO_USER_PROFILE" => "",
		"RESTART" => "N",
		"USE_LANGUAGE_GUESS" => "Y",
		"USE_SUGGEST" => "N",
		"arrWHERE" => array(
			0 => "iblock_news",
			1 => "iblock_salons",
			2 => "iblock_products",
		),
		"COMPONENT_TEMPLATE" => "clearNew",
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"arrFILTER" => array(
			0 => "main",
			1 => "iblock_news",
			2 => "iblock_salons",
			3 => "iblock_products",
		),
		"SHOW_WHERE" => "Y",
		"SHOW_WHEN" => "N",
		"SHOW_ORDER_BY" => "Y",
		"PAGER_SHOW_ALWAYS" => "Y",
		"arrFILTER_main" => array(
		),
		"arrFILTER_iblock_news" => array(
			0 => "all",
		),
		"arrFILTER_iblock_salons" => array(
			0 => "all",
		),
		"arrFILTER_iblock_products" => array(
			0 => "all",
		)
	),
	false
);?>
<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
