<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

use Bitrix\Main\Loader;

class QSoftStoresList extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        if (!isset($arParams["CACHE_TIME"])) {
            $arParams["CACHE_TIME"] = 36000000;
        }
        $arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
        if (strlen($arParams["IBLOCK_TYPE"])<=0) {
            $arParams["IBLOCK_TYPE"] = "salons";
        }
        $arParams["IBLOCK_ID"] = trim($arParams["IBLOCK_ID"]);
        $arParams["SORT_BY"] = trim($arParams["SORT_BY"]);
        if (strlen($arParams["SORT_BY"])<=0) {
            $arParams["SORT_BY"] = "RAND";
        }
        if (!preg_match('/^(asc|desc|nulls)(,asc|,desc|,nulls){0,1}$/i', $arParams["SORT_ORDER"])) {
            $arParams["SORT_ORDER"]="DESC";
        }
        $arParams["URL_SHOW_ALL"] = trim($arParams["URL_SHOW_ALL"]);
        if (strlen($arParams["URL_SHOW_ALL"])<=0) {
            $arParams["URL_SHOW_ALL"] = "/company/stores";
        }
        $arParams["CHECK_DATES"] = $arParams["CHECK_DATES"]!="N";
        $arParams["DETAIL_URL"]=trim($arParams["DETAIL_URL"]);
        $arParams["SALONS_COUNT"] = intval($arParams["SALONS_COUNT"]);
        return $arParams;
    }

    public function executeComponent()
    {
        global $APPLICATION;
        global $USER;

        if ($this->startResultCache(false)) {
            if (!Loader::includeModule("iblock")) {
                $this->abortResultCache();
                ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
                return;
            }
            if (is_numeric($this->arParams["IBLOCK_ID"])) {
                $rsIBlock = CIBlock::GetList(array(), array(
                    "ACTIVE" => "Y",
                    "ID" => $this->arParams["IBLOCK_ID"],
                ));
            } else {
                $rsIBlock = CIBlock::GetList(array(), array(
                    "ACTIVE" => "Y",
                    "CODE" => $this->arParams["IBLOCK_ID"],
                    "SITE_ID" => SITE_ID,
                ));
            }

            $this->arResult = $rsIBlock->GetNext();
            if (!$this->arResult) {
                $this->abortResultCache();
                Iblock\Component\Tools::process404(
                    trim($this->arParams["MESSAGE_404"]) ?: GetMessage("T_SALONS_SALONS_NA"),
                    true,
                    $this->arParams["SET_STATUS_404"] === "Y",
                    $this->arParams["SHOW_404"] === "Y",
                    $this->arParams["FILE_404"]
                );
                return;
            }

            $this->arResult["USER_HAVE_ACCESS"] = $bUSER_HAVE_ACCESS;

            $arSelect = array(
                "ID",
                "IBLOCK_ID",
                "NAME",
                "DETAIL_PAGE_URL",
                "PREVIEW_PICTURE",
                "PROPERTY_ADDRESS",
                "PROPERTY_MAP",
                "PROPERTY_PHONE",
                "PROPERTY_WORK_HOURS"
            );

            //WHERE
            $arFilter = array (
                "IBLOCK_ID" => $this->arResult["ID"],
                "IBLOCK_LID" => SITE_ID,
                "ACTIVE" => "Y",
            );

            if ($this->arParams["CHECK_DATES"]) {
                $arFilter["ACTIVE_DATE"] = "Y";
            }
            //ORDER BY
            $arSort = array(
                $this->arParams["SORT_BY"]=>$this->arParams["SORT_ORDER"],
            );
            if (!array_key_exists("ID", $arSort)) {
                $arSort["ID"] = "DESC";
            }

            if (!$this->arParams["SALONS_COUNT"] <= 0) {
                $arNavParams = array(
                    "nTopCount" => $this->arParams["SALONS_COUNT"],
                );
            }

            $defPic = array('SRC' => DEFPIC);
            $getPic = array();

            $this->arResult["ITEMS"] = array();
            $rsElement = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, $arSelect);
            $rsElement->SetUrlTemplates($this->arParams["DETAIL_URL"], "", "");
            while ($arItem = $rsElement->GetNext()) {
                $arButtons = CIBlock::GetPanelButtons(
                    $arItem["IBLOCK_ID"],
                    $arItem["ID"],
                    0,
                    array("SECTION_BUTTONS"=>false, "SESSID"=>false)
                );
                
                if ($arItem["PREVIEW_PICTURE"]!="") {
                    $getPic[] = $arItem["PREVIEW_PICTURE"];
                } else {
                    $arItem["PREVIEW_PICTURE"] = $defPic;
                }
                
                $arItem["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
                $arItem["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

                list($placeItem["LAT"], $placeItem["LON"]) = explode(",", $arItem["PROPERTY_MAP_VALUE"]);
                $placeItem["TEXT"] = $arItem["NAME"] . ": " . $arItem["PROPERTY_ADDRESS_VALUE"];
                $placemarks["PLACEMARKS"][] = $placeItem;

                $this->arResult["ITEMS"][] = $arItem;
            }
            
            $pics = CFile::GetList(false, array("@ID" => $getPic));
            
            $uploaddir = COption::GetOptionString("main", "upload_dir");
            
            while ($resPic = $pics->GetNext()) {
                $resPicId[$resPic["ID"]] = array('SRC' => "/" . $uploaddir . "/" . $resPic["SUBDIR"] . "/" . $resPic["FILE_NAME"]);
            }
            
            foreach ($this->arResult["ITEMS"] as $key => $value) {
                if (!is_array($value["PREVIEW_PICTURE"])) {
                    $this->arResult["ITEMS"][$key]["PREVIEW_PICTURE"] = $resPicId[$this->arResult["ITEMS"][$key]["PREVIEW_PICTURE"]];
                }
            }

            $this->arResult["YAMSMASS"] = serialize($placemarks);

            $this->setResultCacheKeys(array(
                "ID",
                "IBLOCK_TYPE_ID",
                "NAME",
                "YAMSMASS"
            ));

            $this->includeComponentTemplate();
        }

        $arButtons = CIBlock::GetPanelButtons(
            $this->arResult["ID"],
            0,
            $this->arParams["PARENT_SECTION"],
            array("SECTION_BUTTONS"=>false)
        );
        if ($APPLICATION->GetShowIncludeAreas()) {
            $this->addIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));
        }
    }
}
