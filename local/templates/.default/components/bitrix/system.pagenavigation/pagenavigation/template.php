<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
?>

<? if ($arResult['NavRecordCount'] > $arResult['NavPageSize']) : ?>
<div class="page_nav">
    <nav>

        <? if ($arResult["NavPageNomer"] > 1) : ?>

        <a <?= 'class="prev" ' ?> href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"></a>

        <? endif ?>

        <? $firstNum = true ?>
        <? $i = $arResult["nStartPage"] ?>
        <? while ($i <= $arResult["nEndPage"]) : ?>

        <? if ($arResult["nStartPage"] > 2 && $firstNum) : ?>

        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1">1</a>
        <a href="#">...</a>
        <? $firstNum = false; ?>

        <? endif ?>

        <? if ($i == $arResult["NavPageNomer"]) : ?>

        <span class="current"><?= $i ?></span>

        <? else : ?>

        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $i ?>"><?= $i ?></a>

        <? endif ?>

        <? if ($i == $arResult["nEndPage"] && $arResult["nEndPage"] < $arResult["NavPageCount"] - 1) : ?>

        <a href="#">...</a>

        <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"><?= $arResult["NavPageCount"] ?></a>

        <? endif ?>

        <? $i++ ?>

        <? endwhile ?>

        <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) : ?>

        <a <?= 'class="next" ' ?> href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"></a>&nbsp;

        <? endif ?>

    </nav>

</div>

<? endif ?>