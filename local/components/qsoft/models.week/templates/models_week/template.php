<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<!--<pre>-->
<!--    --><?// print_r($arResult['ITEMS'][0]); ?>
<!--</pre>-->
<h2 class="push_right"><?=GetMessage('MODELS_WEEK_HEADER_NAME') ?></h2>
<section class="product_line">
        <? foreach ($arResult['ITEMS'] as $arItem) : ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>

            <figure style="width: 20%; height: 220px;" class="product_item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

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

    <div class="clear"></div>
</section>

