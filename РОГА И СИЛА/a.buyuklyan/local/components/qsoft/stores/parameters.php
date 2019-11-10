<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arCurrentValues */

if(!CModule::IncludeModule("iblock"))
    return;

$arTypesEx = CIBlockParameters::GetIBlockTypes(array("-"=>" "));

$arIBlocks=array();
$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
    $arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];

$arSorts = array("ASC"=>GetMessage("T_IBLOCK_DESC_ASC"), "DESC"=>GetMessage("T_IBLOCK_DESC_DESC"));
$arSortFields = array(
        "ID"=>GetMessage("T_IBLOCK_DESC_FID"),
        "NAME"=>GetMessage("T_IBLOCK_DESC_FNAME"),
        "ACTIVE_FROM"=>GetMessage("T_IBLOCK_DESC_FACT"),
        "SORT"=>GetMessage("T_IBLOCK_DESC_FSORT")
    );

$arProperty_LNS = array();
$rsProp = CIBlockProperty::GetList(array("sort"=>"asc", "name"=>"asc"), array("ACTIVE"=>"Y", "IBLOCK_ID"=>(isset($arCurrentValues["IBLOCK_ID"])?$arCurrentValues["IBLOCK_ID"]:$arCurrentValues["ID"])));
while ($arr=$rsProp->Fetch())
{
    $arProperty[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
    if (in_array($arr["PROPERTY_TYPE"], array("L", "N", "S")))
    {
        $arProperty_LNS[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
    }
}

$arComponentParameters = array(
    "PARAMETERS" => array(
        "IBLOCK_TYPE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_LIST_TYPE"),
            "TYPE" => "LIST",
            "VALUES" => $arTypesEx,
            "DEFAULT" => "news",
            "REFRESH" => "Y",
        ),
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_LIST_ID"),
            "TYPE" => "LIST",
            "VALUES" => $arIBlocks,
            "DEFAULT" => '={$_REQUEST["ID"]}',
            "ADDITIONAL_VALUES" => "Y",
            "REFRESH" => "Y",
        ),
        "SALONS_COUNT" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_LIST_CONT"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "SET_SHOW_MAP" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_SET_SHOW_MAP"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
        ),
        "SORT_BY" => array(
            "PARENT" => "DATA_SOURCE",
            "NAME" => GetMessage("T_IBLOCK_DESC_IBORD"),
            "TYPE" => "LIST",
            "DEFAULT" => "ACTIVE_FROM",
            "VALUES" => $arSortFields,
            "ADDITIONAL_VALUES" => "Y",
        ),
        "SORT_ORDER" => array(
            "PARENT" => "DATA_SOURCE",
            "NAME" => GetMessage("T_IBLOCK_DESC_IBBY"),
            "TYPE" => "LIST",
            "DEFAULT" => "DESC",
            "VALUES" => $arSorts,
            "ADDITIONAL_VALUES" => "Y",
        ),
        "CHECK_DATES" => array(
            "PARENT" => "DATA_SOURCE",
            "NAME" => GetMessage("T_IBLOCK_DESC_CHECK_DATES"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
        ),
        "DETAIL_URL" => CIBlockParameters::GetPathTemplateParam(
            "DETAIL",
            "DETAIL_URL",
            GetMessage("T_IBLOCK_DESC_DETAIL_PAGE_URL"),
            "",
            "URL_TEMPLATES"
        ),
        "CACHE_TIME"  =>  array("DEFAULT"=>3600),
        "VARIABLE_ALIASES" => Array(
            "ELEMENT_ID" => Array("NAME" => GetMessage("SALONS_ELEMENT_ID_DESC")),
        ),
        "SEF_MODE" => Array(
            "salons" => array(
                "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_SALONS"),
                "DEFAULT" => "",
                "VARIABLES" => array(),
            ),
            "detail" => array(
                "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_SALON_DETAIL"),
                "DEFAULT" => "#ELEMENT_ID#/",
                "VARIABLES" => array("ELEMENT_ID"),
            ),
        ),
        "ADD_ELEMENT_CHAIN" => array(
            "PARENT" => "ADDITIONAL_SETTINGS",
            "NAME" => GetMessage("T_IBLOCK_DESC_ADD_ELEMENT_CHAIN"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N"
        ),
        "PROPERTY_CODE" => array(
            "PARENT" => "DATA_SOURCE",
            "NAME" => GetMessage("T_IBLOCK_PROPERTY"),
            "TYPE" => "LIST",
            "MULTIPLE" => "Y",
            "VALUES" => $arProperty_LNS,
            "ADDITIONAL_VALUES" => "Y",
        ),
    ),
);

CIBlockParameters::Add404Settings($arComponentParameters, $arCurrentValues);
