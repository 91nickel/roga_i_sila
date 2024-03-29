<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
?>

<div class="news-list">

    <? if ($arParams["DISPLAY_TOP_PAGER"]) : ?>
        <?= $arResult["NAV_STRING"] ?>
    <? endif; ?>

    <? foreach ($arResult["ITEMS"] as $arItem) : ?>

        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <figure class="news_item" id="<?= $this->GetEditAreaId($arItem['ID']) ?>">

            <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])) : ?>

                <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])) : ?>

                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                        <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                             alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                             title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"/>
                    </a>

                <? else : ?>

                    <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                         alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                         title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"/>

                <? endif; ?>

            <? else : ?>

                <img src="<?= NO_IMAGE_PATH ?>"/>

            <? endif ?>

            <figcaption class="news_item_description">
                <div class="news_item_anons">

                    <? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]) : ?>

                        <p class="news_item_date grey"><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></p>

                    <? endif ?>


                    <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]) : ?>

                        <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])) : ?>

                            <h3 class="dark_grey"><a
                                        href="<? echo $arItem["DETAIL_PAGE_URL"] ?>"><? echo $arItem["NAME"] ?></a></h3>

                        <? else : ?>

                            <h3 class="dark_grey"><? echo $arItem["NAME"] ?></h3>

                        <? endif; ?>

                    <? endif; ?>


                    <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]) : ?>

                        <p><? echo $arItem["PREVIEW_TEXT"]; ?></p>

                    <? endif; ?>

                </div>

            </figcaption>

        </figure>

        <div class="clear"></div>

    <? endforeach; ?>

    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>

        <?= $arResult["NAV_STRING"] ?>

    <? endif; ?>

</div>
