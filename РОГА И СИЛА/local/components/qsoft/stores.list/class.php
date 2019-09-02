<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main;
use \Bitrix\Main\Loader;
use \Bitrix\Main\Error;
use \Bitrix\Main\Type\DateTime;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Iblock;
use \Bitrix\Iblock\Component\ElementList;

/**
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global CIntranetToolbar $INTRANET_TOOLBAR
 */

Loc::loadMessages(__FILE__);

if (!\Bitrix\Main\Loader::includeModule('iblock')) {
    ShowError(Loc::getMessage('IBLOCK_MODULE_NOT_INSTALLED'));
    return;
}

class QSoftStoresList extends ElementList
{
    public function __construct($component = null)
    {
        parent::__construct($component);
        $this->setExtendedMode(false)->setMultiIblockMode(false)->setPaginationMode(true);
    }

    protected $errors = array();

    public function onPrepareComponentParams($arParams)
    {
        if (!isset($arParams["CACHE_TIME"])) {
            $arParams["CACHE_TIME"] = 3600;
        }

        $arParams['IBLOCK_ID'] = intval($arParams['IBLOCK_ID']);
        $arParams['FRAMES_COUNT'] = intval($arParams['FRAMES_COUNT']);
        $arParams['SHOW_MAP'] = $arParams['SHOW_MAP'] === 'N' ? false : true;

        if (!is_array($arParams["IBLOCKS"])) {
            $arParams["IBLOCKS"] = array($arParams["IBLOCKS"]);
        }

        $arIBlockFilter = array();

        foreach ($arParams["IBLOCKS"] as $IBLOCK_ID) {
            $IBLOCK_ID = intval($IBLOCK_ID);
            if ($IBLOCK_ID > 0) {
                $arIBlockFilter[] = $IBLOCK_ID;
            }
        }

        if (empty($arIBlockFilter)) {
            if (!CModule::IncludeModule("iblock")) {
                ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
                return;
            }
            $rsIBlocks = CIBlock::GetList(array("sort" => "asc"), array(
                "type" => $arParams["IBLOCK_TYPE"],
                "LID" => SITE_ID,
                "ACTIVE" => "Y",
            ));
            if ($arIBlock = $rsIBlocks->Fetch()) {
                $arIBlockFilter[] = $arIBlock["ID"];
            }
        }

        return $arParams;
    }

    protected function getResult()
    {
        global $APPLICATION, $USER;

        if ($this->errors) {
            throw new SystemException(current($this->errors));
        }

        $arParams = $this->arParams;
        $arResult = array();
        if ($this->startResultCache(false, array($arParams["CACHE_GROUPS"] === "N" ? false : $USER->GetGroups()))) {
            //SELECT
            $arSelect = array(
                "ID",
                "IBLOCK_ID",
                "IBLOCK_SECTION_ID",
                "CODE",
                "NAME",
                "PREVIEW_PICTURE",
                "DETAIL_PAGE_URL"
            );
            //WHERE
            $arFilter = array(
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "ACTIVE_DATE" => "Y",
                "ACTIVE" => "Y",
                "CHECK_PERMISSIONS" => "Y"
            );
            if ($arParams["PARENT_SECTION"] > 0) {
                $arFilter["SECTION_ID"] = $arParams["PARENT_SECTION"];
                $arFilter["INCLUDE_SUBSECTIONS"] = "Y";
            }
            //ORDER BY
            $arSort = array(
                "RAND" => "ASC",
            );
            //Параметры пагинации

            $arNavStartParams = array(
                'nTopCount' => $arParams['FRAMES_COUNT']
            );
            /*
            $arNavParams = array(
                "nPageSize" => $arParams["NEWS_COUNT"],
                "bDescPageNumbering" => $arParams["PAGER_DESC_NUMBERING"],
                "bShowAll" => $arParams["PAGER_SHOW_ALL"],
            );
            $arNavigation = CDBResult::GetNavParams($arNavParams);
            if ($arNavigation["PAGEN"] == 0 && $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"] > 0)
                $arParams["CACHE_TIME"] = $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"];
*/
            //EXECUTE
            $rsIBlockElement = CIBlockElement::GetList($arSort, $arFilter, false, $arNavStartParams, $arSelect);

            $i = 0;
            $placemarks = [];
            while ($row = $rsIBlockElement->GetNextElement()) {

                $fields = $row->GetFields();
                $properties = $row->GetProperties();

                $arResult[$i]['NAME'] = $fields['NAME'];
                $arResult[$i]['ID'] = $fields['ID'];
                $arResult[$i]['IBLOCK_ID'] = $fields['IBLOCK_ID'];

                $arButtons = CIBlock::GetPanelButtons(
                    $arResult[$i]["IBLOCK_ID"],
                    $arResult[$i]["ID"]
                );

                if ($APPLICATION->GetShowIncludeAreas())
                    $this->addIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), CIBlock::GetPanelButtons($arResult[$i]["IBLOCK_ID"])));

                $arResult[$i]['EDIT_LINK'] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
                $arResult[$i]['DELETE_LINK'] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

                $arResult[$i]['DETAIL_PAGE_URL'] = $fields['DETAIL_PAGE_URL'];

                $arResult[$i]['DISPLAY_PROPERTIES']['ADDRESS'] = $properties['ADDRESS']['VALUE'];
                $arResult[$i]['DISPLAY_PROPERTIES']['PHONE'] = $properties['PHONE']['VALUE'];
                $arResult[$i]['DISPLAY_PROPERTIES']['WORK_HOURS'] = $properties['WORK_HOURS']['VALUE'];
                $arResult[$i]['PICTURE'] = CFile::ResizeImageGet($fields['PREVIEW_PICTURE'], array('width' => 120, 'height' => 90), BX_RESIZE_IMAGE_PROPORTIONAL, true);

                if ($arParams['SHOW_MAP']) {
                    $placemarks[] = $arResult[$i]['PLACEMARK'] = $this->getCoordinates($properties['MAP'], $properties['ADDRESS']['VALUE']);
                }
                $i++;
            }
            /*
            $arResult["NAV_STRING"] = $rsIBlockElement->GetPageNavStringEx(
                $navComponentObject,
                $arParams["PAGER_TITLE"],
                $arParams["PAGER_TEMPLATE"],
                $arParams["PAGER_SHOW_ALWAYS"],
                $this
            );
            $arResult["NAV_CACHED_DATA"] = null;
            $arResult["NAV_RESULT"] = $rsIBlockElement;
*/

            if ($arParams['SHOW_MAP']) {
                $this->arParams['MAP_CENTER']['yandex_lat'] = '55.73370903771494';
                $this->arParams['MAP_CENTER']['yandex_lon'] = '37.61981338262558';
                $this->arParams['MAP_CENTER']['yandex_scale'] = '10';
                $this->arParams['MAP_CENTER']['PLACEMARKS'] = $placemarks;
            }
            $this->arResult = $arResult;
        }
    }

    public function executeComponent()
    {
        try {
            $this->checkModules();
            $this->getResult();
            $this->setResultCacheKeys(array());
            $this->includeComponentTemplate();
        } catch (SystemException $e) {
            ShowError($e->getMessage());
        }
    }

    public function onIncludeComponentLang()
    {
        Loc::loadMessages(__FILE__);
    }

    protected function checkModules()
    {
        if (!Loader::includeModule('iblock')) {
            throw new SystemException(Loc::getMessage('CPS_MODULE_NOT_INSTALLED', array('#NAME#' => 'iblock')));
        }
    }

    protected function getCoordinates($map, $name)
    {
        $map = explode(',', $map['VALUE']);

        $result['LON'] = $map[1];
        $result['LAT'] = $map[0];
        $result['TEXT'] = $name;
        return $result;
    }
}
