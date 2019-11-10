<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}?>

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
        <?php foreach ($arResult["ITEMS"] as $item) { ?>
            <?php $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
        <figure class="product_item" id="<?= $this->GetEditAreaId($item["ID"]); ?>">
            <div class="product_item_pict">
                <a href="<?= $item['DETAIL_PAGE_URL']; ?>/">
                    <img 
                        src="<?= $item['PREVIEW_PICTURE']['SRC']; ?>"
                        width="<?= $item['PREVIEW_PICTURE']['WIDTH']; ?>"
                        height="<?= $item['PREVIEW_PICTURE']['HEIGHT'];?>"
                        alt="<?= $item['PREVIEW_PICTURE']['ALT'];?>"
                        title="<?= $item['PREVIEW_PICTURE']['TITLE'];?>"/>
                </a>
            </div>     
            <figcaption>
                <h3>
                    <a href="<?= $item['DETAIL_PAGE_URL']; ?>"><?= $item['NAME']; ?></a>
                </h3>
                <?php if ($item['ITEM_PRICES']['0']['DISCOUNT'] != 0) {?>
                    <span class="product_item_price dark_grey old_price">
                        <?= $item['ITEM_PRICES']['0']['PRINT_BASE_PRICE']; ?>
                    </span>
                    <p class="product_item_price dark_grey">
                        <?= $item['ITEM_PRICES']['0']['PRINT_PRICE']; ?>
                    </p>
                <?php } else { ?>
                    <p class="product_item_price dark_grey">
                        <?= $item['ITEM_PRICES']['0']['PRINT_PRICE']; ?>
                    </p> 
                <?php } ?>
                <?php if ($item['CATALOG_QUANTITY'] != 0) {?>
                    <a class="buy_button inverse inline-block pie" href="<?= $item["ADD_URL"]; ?>" rel="modal:open">
                        <?= $arResult['ORIGINAL_PARAMETERS']['MESS_BTN_ADD_TO_BASKET']; ?>
                    </a>
                <?php } else { ?>
                    <p class="out_of_stock inverse inline-block pie">
                        <?= $arResult['ORIGINAL_PARAMETERS']['MESS_NOT_AVAILABLE']; ?>
                    </p>
                <?php } ?>
            </figcaption>
            <?php if ($item["PROPERTIES"]["SALE"]["VALUE"]) { ?>
                <div class="product_item_label sale"></div>
            <?php } elseif ($item["PROPERTIES"]["NEW"]["VALUE"]) { ?>
                <div class="product_item_label new"></div>
            <?php } ?>
        </figure>
        <?php } ?>
    </div>
    <div class="clear"></div>
    <?=$arResult["NAV_STRING"]?>
</section>