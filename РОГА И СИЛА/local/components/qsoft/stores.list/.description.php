<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("T_IBLOCK_DESC_STORES_LIST"),
	"DESCRIPTION" => GetMessage("T_IBLOCK_DESC_STORES_DESC"),
	"CACHE_PATH" => "Y",
	"SORT" => 40,
	"PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "store",
			"NAME" => GetMessage("T_IBLOCK_STORES_PHOTO"),
			"SORT" => 20,
		)
	),
);
