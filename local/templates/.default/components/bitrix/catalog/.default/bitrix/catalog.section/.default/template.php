<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |    Attention!
 * |    The following comments are for system use
 * |    and are required for the component to work correctly in ajax mode:
 * |    <!-- items-container -->
 * |    <!-- pagination-container -->
 * |    <!-- component-end -->
 */

$this->setFrameMode(true);

?>
<!--<pre>-->
<!--    --><?//= 'Подключен шаблон catalog.section' ?>
<!--    --><?// print_r($arResult) ?>
<!--</pre>-->

<!--Начало контентной части-->

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
            <input type="text" id="price-start" placeholder="от 0 руб." class="pie"/>
            <input type="text" id="price-end" placeholder="до 10 000 000 руб." class="pie"/>
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
        <? foreach ($arResult['ITEMS'] as $arItem) : ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>

            <figure class="product_item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

                <? if ($arItem['PROPERTIES']['SALE']['VALUE']) : ?>

                    <div class="product_item_label sale"></div>

                <? elseif($arItem['PROPERTIES']['NEW']['VALUE']): ?>

                    <div class="product_item_label new"></div>

                <? endif ?>

                <div class="product_item_pict">
                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                        <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                             width="<?= $item['PREVIEW_PICTURE']['WIDTH']; ?>"
                             height="<?= $item['PREVIEW_PICTURE']['HEIGHT']; ?>"
                             alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                             title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"/>
                    </a>
                </div>

                <figcaption>

                    <h3><a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a></h3>


                    <? if ($arItem['ITEM_PRICES'][0]['DISCOUNT'] > 0) : ?>

                        <span class="product_item_price dark_grey old_price"><?= $arItem['ITEM_PRICES'][0]['PRINT_BASE_PRICE'] ?></span>

                    <? endif ?>

                    <p class="product_item_price dark_grey"><?= $arItem['ITEM_PRICES'][0]['PRINT_PRICE'] ?></p>

                    <? if ($arItem['CATALOG_QUANTITY'] > 0) : ?>

                        <a class="buy_button inverse inline-block pie" href="<?= explode('#', $arResult['ADD_URL_TEMPLATE'])[0].$arItem['ID'] ?>"
                           rel="modal:open"><?= $arResult['ORIGINAL_PARAMETERS']['MESS_BTN_ADD_TO_BASKET'] ?></a>

                    <? else : ?>

                        <a class="buy_button inverse inline-block pie" href="#"
                           rel="modal:open"><?= $arResult['ORIGINAL_PARAMETERS']['MESS_NOT_AVAILABLE'] ?></a>

                    <? endif ?>

                </figcaption>
            </figure>
        <? endforeach ?>

    </div>
    <div class="clear"></div>

    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>

        <?= $arResult["NAV_STRING"] ?>

    <? endif; ?>

</section>

<!--Конец контентной части-->


