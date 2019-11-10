<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

?>

<?php if (!isset($arResult["DETAIL_PICTURE"]) || !is_array($arResult["DETAIL_PICTURE"])) {?>
    <?php if (isset($arResult["PREVIEW_PICTURE"]) || is_array($arResult["PREVIEW_PICTURE"])) {?>
        <img 
            src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" 
            alt="<?=$arResult["PREVIEW_PICTURE"]["ALT"]?>" 
            title="<?=$arResult["PREVIEW_PICTURE"]["TITLE"]?>"
        />
    <?php }?>
<?php } else {?>
    <img 
        src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" 
        alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>" 
        title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
    />
<?php }?>
<?php if ($arResult["PREVIEW_TEXT"] != "") {?>
    <div class="quote drak_grey">
        <?=$arResult["PREVIEW_TEXT"]?>
    </div>
<?php }?>
<?php if ($arResult["DETAIL_TEXT"] != "") {?>
    <p>
        <?=$arResult["DETAIL_TEXT"]?>
    </p>
<?php }?>
                                        
<p class="dark_grey"><?= $arResult["DISPLAY_PROPERTIES"]["ADDRESS"]["DISPLAY_VALUE"]?></p>
<p class="black"><?= $arResult["DISPLAY_PROPERTIES"]["PHONE"]["DISPLAY_VALUE"]?></p>
<p><?=GetMessage("WORK_HOURS");?> <b><?= $arResult["DISPLAY_PROPERTIES"]["WORK_HOURS"]["DISPLAY_VALUE"]?></b></p>