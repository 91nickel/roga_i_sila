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
<section class="shops_block">
    <h2 class="inline-block">Наши салоны</h2>
    <span class="dark_grey all_list">&nbsp;/&nbsp;<a href="#" class="text_decor_none"><b>Все</b></a></span>
    <div>
        <!--Блок навигации-->
        <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
            <?= $arResult["NAV_STRING"] ?><br/>
        <? endif; ?>

        <!--Основной блок-->
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <figure class="shops_block_item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

                <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                    <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img
                                    class="preview_picture"
                                    src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                    width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
                                    height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
                                    alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                    title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                            /></a>
                    <? else: ?>
                        <img
                                class="preview_picture"
                                src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
                                height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
                                alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                        />
                    <? endif; ?>
                <? endif ?>

                <figcaption class="shops_block_item_description">
                    <!--Блок имени-->
                    <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                        <h3 class="shops_block_item_name"><? echo $arItem["NAME"] ?></h3>
                    <? endif; ?>

                    <p class="dark_grey"><?= $arItem["DISPLAY_PROPERTIES"]["ADRESS"]['VALUE'] ?></p>
                    <p class="black"><?= $arItem["DISPLAY_PROPERTIES"]["PHONE"]['VALUE']?></p>
                    <p><?= $arItem["DISPLAY_PROPERTIES"]["WORK_HOURS"]['NAME'] ?>:<br/> <?= $arItem["DISPLAY_PROPERTIES"]["WORK_HOURS"]['VALUE'] ?></p>

                </figcaption>
            </figure>

        <? endforeach; ?>
<!--        Блок навигации-->
        <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
            <br/><?= $arResult["NAV_STRING"] ?>
        <? endif; ?>
    </div>
</section>
