<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */

$this->setFrameMode(true);
$this->addExternalCss('/bitrix/css/main/bootstrap.css');
?>

<h2 class="push_right">Модели недели</h2>
<section class="product_line">

    <? foreach ($arResult['ITEMS'] as $item) : ?>
    <figure class="product_item">
        <? if ($item['PROPERTIES']['SALE']['VALUE']) : ?>
        <div class="product_item_label sale"></div>

        <? elseif ($item['PROPERTIES']['NEW']['VALUE']) : ?>
        <div class="product_item_label new"></div>

        <? endif ?>

        <div class="product_item_pict">
            <a href="<?= $item['DETAIL_PAGE_URL'] ?>">
                <img src="<?= $item['DETAIL_PICTURE']['SRC'] ?>" alt="<?= $item['DETAIL_PICTURE']['ALT'] ?>" title="<?= $item['DETAIL_PICTURE']['TITLE'] ?>" />
            </a>
        </div>
        <figcaption>

            <h3><a href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $item['NAME'] ?></a></h3>

            <? if ($item['PRICES']['BASE']['DISCOUNT_DIFF'] != 0) : ?>
            <span class="product_item_price dark_grey old_price"><?= $item['PRICES']['BASE']['PRINT_VALUE'] ?></span>

            <? endif ?>

            <p class="product_item_price dark_grey"><?= $item['PRICES']['BASE']['PRINT_DISCOUNT_VALUE'] ?></p>

            <? if ($item['CATALOG_QUANTITY'] > 0) : ?>
            <a class="buy_button inverse inline-block pie" href="?action=addToCart&element=<?= $item['ID'] ?>"><?= $arResult['ORIGINAL_PARAMETERS']['MESS_BTN_ADD_TO_BASKET'] ?></a>

            <? else : ?>
            <a class="buy_button inverse inline-block pie" href="#"><?= $arResult['ORIGINAL_PARAMETERS']['MESS_NOT_AVAILABLE'] ?></p>

            <? endif ?>

        </figcaption>
    </figure>

    <? endforeach ?>

    <?

    if (CModule::IncludeModule("catalog")) {
        if ($_GET['action'] == 'addToCart' && $_GET['element']) {
            Add2BasketByProductID(
                $_GET['element'],
                1,
                false
            );
            unset($_GET);
            LocalRedirect("/");
        }
    }
    ?>

</section>