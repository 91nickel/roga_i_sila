<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
?>
    <h1><? $APPLICATION->ShowTitle(); ?></h1>

<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])) : ?>

    <img src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"
         width="<?= $arResult["DETAIL_PICTURE"]["WIDTH"] ?>"
         height="<?= $arResult["DETAIL_PICTURE"]["HEIGHT"] ?>"
         alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>"
         title="<?= $arResult["DETAIL_PICTURE"]["TITLE"] ?>"/>

<? endif ?>
<? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]) : ?>

    <span class="news-date-time">
    <p>

        <?= $arResult["DISPLAY_ACTIVE_FROM"] ?>

        <p>
</span>

<? endif; ?>

<? if (strlen($arResult["DETAIL_TEXT"]) > 0) : ?>

    <p style="color: black;">
        <?= $arResult["DETAIL_TEXT"]; ?>
    </p>

<? else : ?>

    <p style="color: black;">

        <?= $arResult["PREVIEW_TEXT"]; ?>

    </p>
<? endif ?>