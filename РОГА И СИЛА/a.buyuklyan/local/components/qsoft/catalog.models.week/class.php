<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

use Bitrix\Main\Loader;

class QSoftModelOfTheWeek extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        if (!isset($arParams["CACHE_TIME"])) {
            $arParams["CACHE_TIME"] = 3600;
        }

        if (!is_array($arParams["PRICE_CODE"])) {
            $arParams["PRICE_CODE"] = array();
        }

        $arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
        if (strlen($arParams["IBLOCK_TYPE"])<=0) {
            $arParams["IBLOCK_TYPE"] = "products";
        }
        $arParams["IBLOCK_ID"] = trim($arParams["IBLOCK_ID"]);
        $arParams["SORT_BY"] = trim($arParams["SORT_BY"]);
        if (strlen($arParams["SORT_BY"])<=0) {
            $arParams["SORT_BY"] = "RAND";
        }
        if (!preg_match('/^(asc|desc|nulls)(,asc|,desc|,nulls){0,1}$/i', $arParams["SORT_ORDER"])) {
            $arParams["SORT_ORDER"]="DESC";
        }
        $arParams["CHECK_DATES"] = $arParams["CHECK_DATES"]!="N";
        $arParams["DETAIL_URL"]=trim($arParams["DETAIL_URL"]);
        $arParams["BASKET_URL"]=trim($arParams["BASKET_URL"]);
        if (strlen($arParams["BASKET_URL"])<=0) {
            $arParams["BASKET_URL"] = "/personal/basket.php";
        }

        $arParams["ACTION_VARIABLE"]=trim($arParams["ACTION_VARIABLE"]);
        if (strlen($arParams["ACTION_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["ACTION_VARIABLE"])) {
            $arParams["ACTION_VARIABLE"] = "action";
        }

        $arParams["PRODUCT_ID_VARIABLE"]=trim($arParams["PRODUCT_ID_VARIABLE"]);
        if (strlen($arParams["PRODUCT_ID_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["PRODUCT_ID_VARIABLE"])) {
            $arParams["PRODUCT_ID_VARIABLE"] = "id";
        }

        $arParams["PRODUCT_QUANTITY_VARIABLE"]=trim($arParams["PRODUCT_QUANTITY_VARIABLE"]);
        if (strlen($arParams["PRODUCT_QUANTITY_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["PRODUCT_QUANTITY_VARIABLE"])) {
            $arParams["PRODUCT_QUANTITY_VARIABLE"] = "quantity";
        }

        $arParams["PRODUCTS_COUNT"] = intval($arParams["PRODUCTS_COUNT"]);

        return $arParams;
    }

    public function executeComponent()
    {
        global $INTRANET_TOOLBAR;
        global $APPLICATION;
        global $USER;

        $strError = "";
        if (array_key_exists($this->arParams["ACTION_VARIABLE"], $_REQUEST) && array_key_exists($this->arParams["PRODUCT_ID_VARIABLE"], $_REQUEST)) {
            if (array_key_exists($this->arParams["ACTION_VARIABLE"]."BUY", $_REQUEST)) {
                $action = "BUY";
            } elseif (array_key_exists($this->arParams["ACTION_VARIABLE"]."ADD2BASKET", $_REQUEST)) {
                $action = "ADD2BASKET";
            } else {
                $action = strtoupper($_REQUEST[$this->arParams["ACTION_VARIABLE"]]);
            }

            $productID = intval($_REQUEST[$this->arParams["PRODUCT_ID_VARIABLE"]]);
            if (($action == "ADD2BASKET" || $action == "BUY") && $productID > 0) {
                if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) {
                    $QUANTITY = 0;
                    $product_properties = array();
                    if (!empty($this->arParams["PRODUCT_PROPERTIES"])) {
                        if (is_array($_REQUEST[$this->arParams["PRODUCT_PROPS_VARIABLE"]])) {
                            $product_properties = CIBlockPriceTools::CheckProductProperties(
                                $this->arParams["IBLOCK_ID"],
                                $productID,
                                $this->arParams["PRODUCT_PROPERTIES"],
                                $_REQUEST[$this->arParams["PRODUCT_PROPS_VARIABLE"]]
                            );
                            if (!is_array($product_properties)) {
                                $strError = GetMessage("CATALOG_ERROR2BASKET").".";
                            }
                        } else {
                            $strError = GetMessage("CATALOG_ERROR2BASKET").".";
                        }
                    }
                    if ($this->arParams["USE_PRODUCT_QUANTITY"]) {
                        if (isset($_REQUEST[$this->arParams["PRODUCT_QUANTITY_VARIABLE"]])) {
                            $QUANTITY = doubleval($_REQUEST[$this->arParams["PRODUCT_QUANTITY_VARIABLE"]]);
                        }
                    }

                    if (!$strError && Add2BasketByProductID($productID, $QUANTITY, $product_properties)) {
                        if ($action == "BUY") {
                            LocalRedirect($this->arParams["BASKET_URL"]);
                        } else {
                            LocalRedirect($APPLICATION->GetCurPageParam("", array($this->arParams["PRODUCT_ID_VARIABLE"], $this->arParams["ACTION_VARIABLE"])));
                        }
                    } else {
                        if ($ex = $APPLICATION->GetException()) {
                            $strError = $ex->GetString();
                        } else {
                            $strError = GetMessage("CATALOG_ERROR2BASKET").".";
                        }
                    }
                }
            }
        }
        if (strlen($strError)>0) {
            ShowError($strError);
            return;
        }

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
                    trim($this->arParams["MESSAGE_404"]) ?: GetMessage("T_MODELS_OF_THE_WEEK_NA"),
                    true,
                    $this->arParams["SET_STATUS_404"] === "Y",
                    $this->arParams["SHOW_404"] === "Y",
                    $this->arParams["FILE_404"]
                );
                return;
            }

            $arSelect = array(
                "ID",
                "IBLOCK_ID",
                "NAME",
                "DETAIL_PAGE_URL",
                "PREVIEW_PICTURE",
                "PRICE",
                "PROPERTY_NEW",
                "PROPERTY_SALE",
            );

            //WHERE
            $arFilter = array (
                "IBLOCK_ID" => $this->arResult["ID"],
                "IBLOCK_LID" => SITE_ID,
                "ACTIVE" => "Y",
                "PROPERTY_MODEL_WEEKS_VALUE" => "Да"
            );

            if ($this->arParams["CHECK_DATES"]) {
                $arFilter["ACTIVE_DATE"] = "Y";
            }

            $this->arResult["PRICES"] = CIBlockPriceTools::GetCatalogPrices($this->arParams["IBLOCK_ID"], array('BASE'));

            foreach ($this->arResult["PRICES"] as &$value) {
                if (!$value['CAN_VIEW'] && !$value['CAN_BUY']) {
                    continue;
                }
                $arSelect[] = $value["SELECT"];
            }
            if (isset($value)) {
                unset($value);
            }

            //ORDER BY
            $arSort = array(
                $this->arParams["SORT_BY"]=>$this->arParams["SORT_ORDER"],
            );
            if (!array_key_exists("ID", $arSort)) {
                $arSort["ID"] = "RAND";
            }

            if (!$this->arParams["PRODUCTS_COUNT"] <= 0) {
                $arNavParams = array(
                    "nTopCount" => $this->arParams["PRODUCTS_COUNT"],
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


                $arItem["PRICES"] = CIBlockPriceTools::GetItemPrices($this->arParams["IBLOCK_ID"], $this->arResult["PRICES"], $arItem, false);

                $arItem["BUY_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam($this->arParams["ACTION_VARIABLE"]."=BUY&".$this->arParams["PRODUCT_ID_VARIABLE"]."=".$arItem["ID"], array($this->arParams["PRODUCT_ID_VARIABLE"], $this->arParams["ACTION_VARIABLE"])));
                $arItem["ADD_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam($this->arParams["ACTION_VARIABLE"]."=ADD2BASKET&".$this->arParams["PRODUCT_ID_VARIABLE"]."=".$arItem["ID"], array($this->arParams["PRODUCT_ID_VARIABLE"], $this->arParams["ACTION_VARIABLE"])));

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

            $this->setResultCacheKeys(array(
                "ID",
                "IBLOCK_TYPE_ID",
                "NAME"
            ));

            $this->includeComponentTemplate();
        }

        if (isset($this->arResult["ID"])) {
            $arTitleOptions = null;
            if ($USER->IsAuthorized()) {
                if (Loader::includeModule("iblock")) {
                    $arButtons = CIBlock::GetPanelButtons(
                        $this->arResult["ID"],
                        0,
                        $this->arParams["PARENT_SECTION"],
                        array("SECTION_BUTTONS"=>false)
                    );
                    if ($APPLICATION->GetShowIncludeAreas()) {
                        $this->addIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));
                    }
                    if (is_array($arButtons["intranet"])
                        && is_object($INTRANET_TOOLBAR)
                        && $this->arParams["INTRANET_TOOLBAR"]!=="N"
                    ) {
                        $APPLICATION->AddHeadScript('/bitrix/js/main/utils.js');
                        foreach ($arButtons["intranet"] as $arButton) {
                            $INTRANET_TOOLBAR->AddButton($arButton);
                        }
                    }
                }
            }
        }
    }
}
