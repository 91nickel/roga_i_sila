<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);?>

<figure class="product_detail">
    <figcaption>
        <div class="b-product-photo">
            <ul class="b-product-photo__list">
                <li class="b-product-photo__list-item">
                    <img class="b-product-photo__list-item__content" src="<?= $arResult["DETAIL_PICTURE"]["SRC"]; ?>" alt="<?= $arResult["NAME"]; ?>"/>
                </li>
                <?php $i = 1;
                foreach ($arResult["PROPERTIES"]["ADDITIONAL_PICTURES"]["VALUE"] as $valuePic) {
                    $filePic = CFile::GetFileArray($valuePic);
                    ?>
                    <li class="b-product-photo__list-item">
                        <img class="b-product-photo__list-item__content" src="<?= $filePic["SRC"]; ?>" alt="<?= $arResult["NAME"] . " " . $i; ?>"/>
                    </li>
                    <?php $i++;
                } ?>
            </ul>
            <?php if (is_array($arResult["PROPERTIES"]["ADDITIONAL_PICTURES"]["VALUE"])) { ?>
            <div class="b-product-photo__thumbnail">
                <a data-slide-index="0" href="" class="b-product-photo__thumbnail-item">
                    <img class="b-product-photo__thumbnail-item__content" src="<?= $arResult["DETAIL_PICTURE"]["SRC"]; ?>" alt="<?= $arResult["NAME"]; ?>">
                </a>
                <?php $i = 1;
                foreach ($arResult["PROPERTIES"]["ADDITIONAL_PICTURES"]["VALUE"] as $valuePic) {
                    $filePic = CFile::GetFileArray($valuePic);
                    ?>
                     <a data-slide-index="<?= $i ?>" href="" class="b-product-photo__thumbnail-item">
                        <img class="b-product-photo__thumbnail-item__content" src="<?= $filePic["SRC"]; ?>" alt="<?= $arResult["NAME"] . " " . $i . " Thumbnail"; ?>">
                    </a>
                    <?php $i++;
                } ?>
            </div>
            <?php } ?>
        </div>
        <div class="price_block">
            <?php if ($arResult['ITEM_PRICES']['0']['DISCOUNT'] != 0) {?>
            <span class="old_price"><?= $arResult['ITEM_PRICES']['0']['PRINT_BASE_PRICE']; ?></span>
            <p class="current_price dark_grey"><b class="orange"><?= number_format($arResult['ITEM_PRICES']['0']['PRICE'], 0, ",", " "); ?></b><?= GetMessage("RUB"); ?></p>
            <?php } else { ?>
            <p class="current_price dark_grey"><b class="orange"><?= number_format($arResult['ITEM_PRICES']['0']['PRICE'], 0, ",", " "); ?></b><?= GetMessage("RUB"); ?></p> 
            <?php } ?>
            <?php if ($arResult['CATALOG_QUANTITY'] != 0) {?>
            <a class="buy_button inverse inline-block pie" href="<?= $item["ADD_URL"]; ?>" rel="modal:open"><?= $arResult['ORIGINAL_PARAMETERS']['MESS_BTN_ADD_TO_BASKET']; ?></a>
            <?php } else { ?>
            <p class="out_of_stock inverse inline-block pie" href="#" rel="modal:open"><?= $arResult['ORIGINAL_PARAMETERS']['MESS_NOT_AVAILABLE']; ?></p>
            <?php } ?>
        </div>
        <?php if (is_array($arResult["DISPLAY_PROPERTIES"])) { ?>
        <div class="slide_box">
            <h3 class=" slide_panel show">
                <?= $arResult["ORIGINAL_PARAMETERS"]["MESS_PROPERTIES_TAB"]; ?>
                <div class="slide_button"></div>
            </h3>
            <div class="slide_block" style="display:block">
                <table class="features">
                    <?php foreach ($arResult["DISPLAY_PROPERTIES"] as $prop) {?>
                        <tr>
                            <td><div><span><?= $prop["NAME"]; ?>:</span></div></td>
                            <td><?= $prop["VALUE"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <?php } ?>
        <?php if (strlen($arResult["DETAIL_TEXT"]) != 0) { ?>
        <div class="slide_box">
            <h3 class="slide_panel">
                <?= $arResult["ORIGINAL_PARAMETERS"]["MESS_DESCRIPTION_TAB"]; ?>
                <div class="slide_button"></div>
            </h3>
            <div class="slide_block">
                <?= $arResult["DETAIL_TEXT"]; ?>
            </div>
        </div>
        <?php } ?>
    </figcaption>
</figure>