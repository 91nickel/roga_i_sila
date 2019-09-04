<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

foreach ($arResult['ITEMS'] as $arItem) {
    if (!$arItem['PREVIEW_PICTURE']['SRC']) {
        $arItem['PREVIEW_PICTURE']['SRC'] = NO_IMAGE_PATH;
    }
}

