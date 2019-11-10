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
<?php if ($arResult["NavPageCount"] != 1) {?>
<div class="page_nav">
    <nav>
        <font class="text">
            <?php if ($arResult["NavPageNomer"] > 1) :?>
                    <?php if ($arResult["NavPageNomer"] > 2) :?>
                        <a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?><?=($arResult['NavQueryString'])?'&'.$arResult['NavQueryString']:''?>" class="prev"></a>
                    <?php else :?>
                        <a href="<?=$arResult["sUrlPath"]?>" class="prev"></a>
                    <?php endif?>
            <?php endif?>
            <?php while ($arResult["nStartPage"] <= $arResult["nEndPage"]) :?>
                <?php if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) :?>
                    <span class="current"><?=$arResult["nStartPage"]?></span>
                <?php else :?>
                    <a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?><?=($arResult['NavQueryString'])?'&'.$arResult['NavQueryString']:''?>"><?=$arResult["nStartPage"]?></a>
                <?php endif?>
                <?php $arResult["nStartPage"]++?>
            <?php endwhile?>
            <?php if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) :?>
                <a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?><?=($arResult['NavQueryString'])?'&'.$arResult['NavQueryString']:''?>" class="next"></a>
            <?php endif?>
        </font>
    </nav>
</div>
<?php } ?>