<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}?>

<?php if (!empty($arResult)) : ?>
<nav class="main_menu">
    <ul>

    <?php $previousLevel = 0; ?>
    <?php foreach ($arResult as $arItem) : ?>
        <?php if ($arItem["DEPTH_LEVEL"] < $previousLevel) : ?>
                </ul>
            </li>

        <?php endif ?>

        <?php if ($arItem["DEPTH_LEVEL"] != 1) : ?>
            <li <?= ($arItem['SELECTED'])?'style="background-color: #fee2d2; border-bottom: 2px solid #ff7519; border-top: 2px solid #ff7519; border-radius: 7px;"':'' ?>><a href="<?= $arItem['LINK'] ?>"><?= $arItem["TEXT"] ?></a></li>
        <?php else : ?>
            <?php if ($arItem["IS_PARENT"]) : ?>
                <li class="submenu pie" <?= ($arItem['SELECTED'])?'style="background-color: #fee2d2; border-bottom: 2px solid #ff7519;  border-top: 2px solid #ff7519; border-radius: 7px;"':'' ?>>
                    <span ><?= $arItem["TEXT"] ?></span>
                    <div class="submenu_border"></div>
                    <ul>

            <?php else : ?>
                <li <?= ($arItem['SELECTED'])?'style="background-color: #fee2d2; border-bottom: 2px solid #ff7519;  border-top: 2px solid #ff7519; border-radius: 7px;"':'' ?>><a href="<?= $arItem['LINK'] ?>"><?= $arItem["TEXT"] ?></a></li>

            <?php endif ?>
        <?php endif ?>

        <?php $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
   
    <?php endforeach ?>

    <?php if ($previousLevel > 1) : ?>
            <?= str_repeat("</ul></li>", ($previousLevel-1)); ?>

    <?php endif ?>

    </ul>
</nav>

<?php endif ?>

