<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<a id="basket-container" href="<?= $arParams['PATH_TO_BASKET'] ?>" class="basket_product_count inline-block">
    <?= $arResult['NUM_PRODUCTS'] ?>
</a>
<a href="<?= $arParams['PATH_TO_ORDER'] ?>" class="order_button pie"><?= GetMessage('BLOCK_CART_MAKE_ORDER') ?></a>