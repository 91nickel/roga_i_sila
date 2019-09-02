<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule("iblock"))
	return;

//Получение списка инфоблоков и их ключей
$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock = array(
	"-" => GetMessage("IBLOCK_ANY"),
);
//Получает список инфоблоков
$rsIBlock = CIBlock::GetList(array("sort" => "asc"), array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE" => "Y"));
//Fetch по очереди фозвращает каждый инфоблок
while ($arr = $rsIBlock->Fetch()) // Переборка и составления списка инфоблоков для визуального редактора
{
	$arIBlock[$arr["ID"]] = "[" . $arr["ID"] . "] " . $arr["NAME"];
}
//Получение значений свойств инфоблоков
$arProperties = array();
$properties = CIBlockProperty::GetList(array("sort" => "asc", "name" => "asc"), array("ACTIVE" => "Y", "IBLOCK_ID" => $arCurrentValues["IBLOCK_ID"]));
//Переборка значений и составление списка для визуального редактора
while ($prop_fields = $properties->GetNext()) {
	$arProperties[$prop_fields['ID']] = $prop_fields['CODE'] . " " . $prop_fields['NAME'];
}

$arComponentParameters = array(
	"GROUPS" => array(),
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		),
		//Массив ID инфоблоков
		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_IBLOCK"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlock,
			"REFRESH" => "Y",
		),
		"DETAIL_URL" => CIBlockParameters::GetPathTemplateParam(
			"DETAIL",
			"DETAIL_URL",
			GetMessage("IBLOCK_DETAIL_URL"),
			"",
			"URL_TEMPLATES"
		),
		"CACHE_TIME"  =>  array("DEFAULT" => 3600),
		"CACHE_GROUPS" => array(
			"PARENT" => "CACHE_SETTINGS",
			"NAME" => GetMessage("CP_BPR_CACHE_GROUPS"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
		),
		"SHOW_MAP" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_SHOW_MAP"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
		),
		"FRAMES_COUNT" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("FRAMES_COUNT"),
			"TYPE" => "STRING",
			"DEFAULT" => "2"
		)
	),
);
