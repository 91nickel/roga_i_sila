<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("T_IBLOCK_DESC_STORES_LIST"),
	"DESCRIPTION" => GetMessage("T_IBLOCK_DESC_STORES_LIST_DESC"),
	"SORT" => 20,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "salons",
			"NAME" => GetMessage("T_IBLOCK_DESC_STORES_NAME"),
			"SORT" => 10,
		),
	),
);

?>