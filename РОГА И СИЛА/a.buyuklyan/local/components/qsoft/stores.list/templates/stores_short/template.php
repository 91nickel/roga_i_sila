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
<section class="shops_block">
    <h2 class="inline-block">
        <?=GetMessage("OUR_SALONS")?>
    </h2>
    <span class="dark_grey all_list">
        &nbsp;/&nbsp;
        <a href="<?= $arParams["SET_LINK_SHOW_ALL"]?>" class="text_decor_none">
            <b><?=GetMessage("SHOW_ALL_SALONS")?></b>
        </a>
    </span>
    <div>
        <?php foreach ($arResult["ITEMS"] as $arItem) :?>
            <?php
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <figure class="shops_block_item" id="<?= $this->GetEditAreaId($arItem["ID"]); ?>">
                <a href="<?= $arParams["SET_LINK_SHOW_ALL"]?>">
                    <img 
                        src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                        width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                        height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                        alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                        title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                        />
                </a>
                <figcaption class="shops_block_item_description">
                    <h3 class="shops_block_item_name">
                        <?= $arItem["NAME"]?>
                    </h3>
                    <p class="dark_grey">
                        <?= $arItem["PROPERTY_ADDRESS_VALUE"]?>
                    </p>
                    <p class="black">
                        <?= $arItem["PROPERTY_PHONE_VALUE"]?>
                    </p>
                    <p>
                        <?=GetMessage("WORK_HOURS")?>
                        <br/>
                        <?= $arItem["PROPERTY_WORK_HOURS_VALUE"]?>
                    </p>
                </figcaption>
            </figure>
        <?php endforeach;?>
    </div>
</section>