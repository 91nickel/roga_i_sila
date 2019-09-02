<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<h2 class="inline-block"><?= GetMessage('GET_SALON_BLOCK_NAME') ?></h2>
<span class="dark_grey all_list">&nbsp;/&nbsp;<a href="<?= $arParams['DETAIL_URL'] ?>" class="text_decor_none"><b><?= GetMessage('STORES_IBLOCK_ALL_HREF') ?></b></a></span>

<div>
    <? foreach ($arResult as $arItem) : ?>
    <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

    <figure class="shops_block_item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

        <? if ($arItem["PICTURE"]['src']) : ?>

        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
            <img src="<?= $arItem["PICTURE"]["src"] ?>" width="<?= $arItem["PICTURE"]["width"] ?>" height="<?= $arItem["PICTURE"]["height"] ?>" alt="<?= $arItem["PICTURE"]["alt"] ?>" title="<?= $arItem["PICTURE"]["title"] ?>">
        </a>

        <? else : ?>

        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
            <img src="<?= NO_IMAGE_PATH ?>" width="<?= $arItem["PICTURE"]["width"] ?>" height="<?= $arItem["PICTURE"]["height"] ?>" alt="<?= $arItem["PICTURE"]["alt"] ?>" title="<?= $arItem["PICTURE"]["title"] ?>">
        </a>

        <? endif ?>

        <figcaption class="shops_block_item_description">
            <h3 class="shops_block_item_name"><a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem["NAME"] ?></a></h3>
            <p class="dark_grey"><?= $arItem['DISPLAY_PROPERTIES']['ADDRESS'] ?></p>
            <p class="black"><?= $arItem['DISPLAY_PROPERTIES']['PHONE'] ?></p>
            <p><?= GetMessage('STORES_IBLOCK_WORKING_HOURS_HEADER') ?><br /> <?= $arItem['DISPLAY_PROPERTIES']['WORK_HOURS'] ?> </p>
        </figcaption>
    </figure>

    <? endforeach; ?>
</div>