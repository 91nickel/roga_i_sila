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
<div>
    <? foreach ($arResult['ITEMS'] as $arItem) : ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <figure style="width: 100%; margin: 1rem;" class="shops_block_item"
                id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

            <? if ($arItem["PREVIEW_PICTURE"]['SRC']) : ?>

                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                    <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" width="<?= $arItem["PICTURE"]["WIDTH"] ?>"
                         height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>" alt="<?= $arItem["PICTURE"]["ALT"] ?>"
                         title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>">
                </a>

            <? else : ?>

                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                    <img src="<?= NO_IMAGE_PATH ?>" width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
                         height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                         title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>">
                </a>

            <? endif ?>

            <figcaption class="shops_block_item_description">
                <h3 class="shops_block_item_name"><a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem["NAME"] ?></a>
                </h3>
                <p class="dark_grey"><?= $arItem['PROPERTIES']['ADDRESS']['VALUE'] ?></p>
                <p class="black"><?= $arItem['PROPERTIES']['PHONE']['VALUE'] ?></p>
                <p><?= GetMessage('STORES_IBLOCK_WORKING_HOURS_HEADER') ?>
                    <br/> <?= $arItem['PROPERTIES']['WORK_HOURS']['VALUE'] ?> </p>
            </figcaption>

        </figure>

    <? endforeach; ?>

    <!--        Блок навигации-->
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?>
    <? endif; ?>

</div>