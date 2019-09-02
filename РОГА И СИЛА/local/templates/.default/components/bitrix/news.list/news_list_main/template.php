<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
?>


<h2 class="inline-block"><?= GetMessage('NEWS_BLOCK_HEADER'); ?></h2>
<span class="all_list">&nbsp;/&nbsp;<a href="<?= $arResult['ITEMS'][0]['LIST_PAGE_URL'] ?>" class="text_decor_none"><b><?= GetMessage('NEWS_BLOCK_TEXT_ALL'); ?></b></a></span>

<? foreach ($arResult["ITEMS"] as $arItem) : ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>

<div id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
    <figure class="news_item">

        <? if ($arItem['PREVIEW_PICTURE']) : ?>
        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>" height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"></a>
        <? else : ?>
        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><img src="<?= SITE_TEMPLATE_PATH . '/images/no-image.jpg' ?>" width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>" height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"></a>
        <? endif ?>
        <figcaption class="news_item_description">
            <h3><a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><? echo $arItem["NAME"] ?></a></h3>
            <div class="news_item_anons">
                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="text_decor_none">
                    <?= $arItem["PREVIEW_TEXT"] ?>
                </a>
            </div>
            <div class="news_item_date grey">
                <? echo $arItem["DISPLAY_ACTIVE_FROM"] ?>
            </div>
        </figcaption>
    </figure>
</div>
<? endforeach; ?>