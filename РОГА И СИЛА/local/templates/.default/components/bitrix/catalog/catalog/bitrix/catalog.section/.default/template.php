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

<h1 class="push_right"><? $APPLICATION->ShowTitle() ?></h1>
<div class="filter pie">
    <div class="b-trans-type">
        <h3>Коробка:</h3>
        <div class="b-trans-type__wrapper">
            <input id="checkbox1" class="filter-type" type="checkbox">
            <label class="filter-type-label" for="checkbox1">АКПП</label>
        </div>
        <div class="b-trans-type__wrapper">
            <input id="checkbox2" class="filter-type" type="checkbox">
            <label class="filter-type-label" for="checkbox2">МКПП</label>
        </div>
    </div>
    <div class="b-slider">
        <h3>Цена:</h3>
        <div>
            <input type="text" id="price-start" placeholder="от 0 руб." class="pie" />
            <input type="text" id="price-end" placeholder="до 10 000 000 руб." class="pie" />
        </div>
        <div id="slider-range"></div>
    </div>
    <div class="b-color">
        <h3>Цвет:</h3>
        <div class="b-color__wrapper">
            <input id="color1" class="filter-type" type="checkbox">
            <label class="filter-type-label" for="color1">Красный</label>
        </div>
        <div class="b-color__wrapper">
            <input id="color2" class="filter-type" type="checkbox">
            <label class="filter-type-label" for="color2">Зелёный</label>
        </div>
        <div class="b-color__wrapper">
            <input id="color3" class="filter-type" type="checkbox">
            <label class="filter-type-label" for="color3">Зелёный</label>
        </div>
        <div class="b-color__wrapper">
            <input id="color4" class="filter-type" type="checkbox">
            <label class="filter-type-label" for="color4">Зелёный</label>
        </div>
    </div>
</div>

<section>
    <div id="catalog">
        <? foreach ($arResult['ITEMS'] as $item) : ?>
        <? if ($item['ACTIVE'] != 'N' && $item['PRICES']['BASE']['VALUE'] != 0) : ?>
        <?
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>

        <figure class="product_item" id="<?= $this->GetEditAreaId($item["ID"]); ?>">

            <div class="product_item_pict">

                <a href="<?= $item['DETAIL_PAGE_URL'] ?>">

                    <img src="<?= $item['PREVIEW_PICTURE'] ? $item['PREVIEW_PICTURE']['SRC'] : NO_IMAGE_PATH ?>" alt="<?= $item['NAME'] ?>" title="<?= $item['NAME'] ?>" />

                </a>

            </div>
            <figcaption>

                <h3><a href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $item['NAME'] ?></a></h3>

                <? if ($item['PRICES']['BASE']['DISCOUNT_DIFF'] != 0) : ?>

                <span class="product_item_price dark_grey old_price"><?= $item['PRICES']['BASE']['PRINT_VALUE'] ?></span>

                <? endif ?>

                <p class="product_item_price dark_grey"><?= $item['PRICES']['BASE']['PRINT_DISCOUNT_VALUE'] ?></p>


                <? if ($item['CATALOG_QUANTITY'] != 0) : ?>

                <a class="buy_button inverse inline-block pie" href="<?= SITE_DIR . '?action=addToCart&element=' . $item['ID'] ?>" rel=" modal:open"><?= $arParams['MESS_BTN_ADD_TO_BASKET'] ?></a>

                <? else : ?>

                <p style="color:black" class="inverse inline-block pie"><?= $arParams['MESS_NOT_AVAILABLE'] ?></a>

                    <? endif ?>

            </figcaption>

            <? if ($item["PROPERTIES"]["SALE"]["VALUE"]) : ?>

            <div class="product_item_label sale"></div>

            <? endif ?>

            <? if ($item["PROPERTIES"]["NEW"]["VALUE"] && !$item["PROPERTIES"]["SALE"]["VALUE"]) : ?>

            <div class="product_item_label new"></div>

            <? endif ?>

        </figure>

        <? endif ?>

        <? endforeach ?>

    </div>

    <div class="clear"></div>

    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>

    <?= $arResult["NAV_STRING"] ?>

    <? endif; ?>

</section>