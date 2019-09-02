<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<section class="news_block inverse">
    <pre>
        <? //print_r($arResult) ?>
    </pre>
    <h2 class="inline-block"><?= $arResult["NAME"] ?></h2>
    <span class="all_list">&nbsp;/&nbsp;
        <a href="<?= $arResult["LIST_PAGE_URL"] ?>" class="text_decor_none">
            <b>Все</b>
        </a>
    </span>
    <div>
        <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
            <?= $arResult["NAV_STRING"] ?>
        <? endif; ?>
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>

            <figure class="news_item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

                <!--Блок фото-->

                <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                    <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>

                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img
                                    src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                    alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                    title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                            /></a>

                    <? else: ?>

                        <img
                                src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                        />

                    <? endif; ?>
                <? endif ?>

                <figcaption class="news_item_description">

                    <!--Блок названия-->

                    <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                        <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                            <h3><a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a></h3>
                        <? else: ?>
                            <h3><? echo $arItem["NAME"] ?></h3>
                        <? endif; ?>
                    <? endif; ?>

                    <!--Блок анонса-->

                    <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                        <div class="news_item_anons">
                            <a href="#" class="text_decor_none">
                                <?= $arItem["PREVIEW_TEXT"] ?>
                            </a>
                        </div>
                    <? endif; ?>

                    <!--Блок даты-->

                    <? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
                        <div class="news_item_date grey"><?=$arItem["DISPLAY_ACTIVE_FROM"] ?></div>
                    <? endif ?>

            </figure>

        <? endforeach; ?>
        <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
            <?= $arResult["NAV_STRING"] ?>
        <? endif; ?>
        </figcaption>
    </div>
</section>
