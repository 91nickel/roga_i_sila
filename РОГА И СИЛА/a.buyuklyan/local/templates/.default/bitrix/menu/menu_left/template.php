<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}?>

<?php if (!empty($arResult)) :?>
    <aside class="left_block">
        <nav>
            <ul class="left_menu">
                <li>
                    <span><?= GetMessage('T_INFORMATION'); ?></span>
                    <ul>
                        <?php foreach ($arResult as $arItem) :
                            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) {
                                continue;
                            }   ?>
                            <?php if ($arItem["SELECTED"]) :?>
                            <li><a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
                            <?php else :?>
                            <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                            <?php endif?>
                        <?php endforeach?>
                </ul>
            </li>
        </ul>
    </nav>
    </aside>
<?php endif?>
