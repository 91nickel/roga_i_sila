<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
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
<h2 class="push_right"><?= GetMessage('MODUL_NAME');?></h2>
<section class="product_line">
    <?php foreach ($arResult["ITEMS"] as $item) { ?>
        <?php $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
    <figure class="product_item" id="<?= $this->GetEditAreaId($item["ID"]); ?>">
        <div class="product_item_pict">
            <a href="<?= $item['DETAIL_PAGE_URL']; ?>/">
                <img 
                    src="<?= $item['PREVIEW_PICTURE']['SRC']; ?>"
                    alt="<?= $item["NAME"]?>"
                    title="<?= $item["NAME"]?>"
                    />
            </a>
        </div>     
        <figcaption>
            <h3>
                <a href="<?= $item['DETAIL_PAGE_URL']; ?>"><?= $item['NAME']; ?></a>
            </h3>
            <?php if ($item['PRICES']['BASE']['DISCOUNT_VALUE'] != $item['PRICES']['BASE']['VALUE']) {?>
                <span class="product_item_price dark_grey old_price">
                    <?= $item['PRICES']['BASE']['PRINT_VALUE']; ?>
                </span>
                <p class="product_item_price dark_grey">
                    <?= $item['PRICES']['BASE']['PRINT_DISCOUNT_VALUE']; ?>
                </p>
            <?php } else { ?>
                <p class="product_item_price dark_grey">
                    <?= $item['PRICES']['BASE']['PRINT_VALUE']; ?>
                </p>
            <?php } ?>
            <?php if ($item['CATALOG_QUANTITY'] != 0) {?>
                <a class="buy_button inverse inline-block pie" href="<?= $item["ADD_URL"]; ?>" rel="modal:open">
                    <?= GetMessage('MESS_BTN_ADD_TO_BASKET'); ?>
                </a>
            <?php } else { ?>
                <p class="out_of_stock inverse inline-block pie">
                    <?= GetMessage('MESS_NOT_AVAILABLE'); ?>
                </p>
            <?php } ?>
        </figcaption>
        <?php if ($item["PROPERTY_SALE_VALUE"]) { ?>
            <div class="product_item_label sale"></div>
        <?php } elseif ($item["PROPERTY_NEW_VALUE"]) { ?>
            <div class="product_item_label new"></div>
        <?php } ?>
    </figure>
    <?php } ?>
</section>