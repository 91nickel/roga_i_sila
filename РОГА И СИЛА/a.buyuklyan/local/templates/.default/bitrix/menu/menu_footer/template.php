<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}?>

<?php if (!empty($arResult)) :?>
<section class="info_block left_block_shadow">
    <h2><?= GetMessage('T_INFORMATION'); ?></h2>
    <nav class="grey">
        <ul>

    <?php
    foreach ($arResult as $arItem) :
        if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) {
            continue;
        }
        ?>
        <?php if ($arItem["SELECTED"]) :?>
        <li><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
        <?php else :?>
        <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
        <?php endif?>
    
    <?php endforeach?>

        </ul>
    </nav>
</section>
<?php endif?>
