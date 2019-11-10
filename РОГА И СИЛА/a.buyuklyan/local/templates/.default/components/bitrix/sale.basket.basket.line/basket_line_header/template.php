<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}?>
<div class="basket_block inline-block">
    <a href="<?= $arParams["PATH_TO_BASKET"] ?>" class="basket_product_count inline-block">
        <?= $arResult["NUM_PRODUCTS"] ?>
    </a>
    <?php if ($arResult["NUM_PRODUCTS"]>0) : ?>
        <a href="<?= $arParams["PATH_TO_ORDER"] ?>" class="order_button pie active"><?= $arParams["MAKE_ORDER_NAME"] ?></a>
    <?php else : ?>
        <a href="<?= $arParams["PATH_TO_ORDER"] ?>" class="order_button pie"><?= $arParams["MAKE_ORDER_NAME"] ?></a>
    <?php endif ?>
</div>