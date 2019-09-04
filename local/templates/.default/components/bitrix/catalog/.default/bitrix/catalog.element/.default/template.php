<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);

?>

<!--<pre>-->
<!--    --><?// print_r($arResult); ?>
<!--</pre>-->

<h1 class="push_right"><?= $arResult['NAME'] ?></h1>
<figure class="product_detail">
    <figcaption>
        <?
        $this->AddEditAction($arResult['ID'], $arResult['EDIT_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arResult['ID'], $arResult['DELETE_LINK'], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div class="b-product-photo">


            <ul class="b-product-photo__list">

                <? if ($arResult['DETAIL_PICTURE'] || $arResult['PROPERTIES']['ADDITIONAL_PICTURES']['VALUE']) : ?>

                    <? if ($arResult['DETAIL_PICTURE']) : ?>

                        <li class="b-product-photo__list-item">
                            <img class="b-product-photo__list-item__content"
                                 src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>"
                                 alt="<?= $arResult['DETAIL_PICTURE']['ALT'] ?>">
                        </li>

                    <? endif ?>

                    <? if (count($arResult['PROPERTIES']['ADDITIONAL_PICTURES']['VALUE']) > 0) : ?>

                        <? foreach ($arResult['PROPERTIES']['ADDITIONAL_PICTURES']['VALUE'] as $imageId) : ?>

                            <? $pic = CFile::GetFileArray($imageId); ?>

                            <? if (is_array($pic)) : ?>

                                <li class="b-product-photo__list-item">
                                    <img class="b-product-photo__list-item__content" src="<?= $pic['SRC'] ?>"
                                         alt="<?= $arResult['NAME'] ?>">
                                </li>

                            <? endif ?>

                        <? endforeach ?>

                    <? endif ?>

                <? else : ?>

                    <li class="b-product-photo__list-item">

                        <img class="b-product-photo__list-item__content" src="<?= NO_IMAGE_PATH ?>"
                             alt="<?= $arResult['DETAIL_PICTURE']['ALT'] ?>">

                    </li>

                <? endif ?>

            </ul>

            <? if (count($arResult['PROPERTIES']['ADDITIONAL_PICTURES']['VALUE']) > 1) : ?>

                <div class="b-product-photo__thumbnail">
                    <a data-slide-index="0" href="" class="b-product-photo__thumbnail-item">
                        <img class="b-product-photo__thumbnail-item__content"
                             src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>"
                             alt="<?= $arResult['DETAIL_PICTURE']['ALT'] ?>">
                    </a>
                    <? $i = 1 ?>

                    <? foreach ($arResult['PROPERTIES']['ADDITIONAL_PICTURES']['VALUE'] as $imageId) : ?>

                        <? $pic = CFile::GetFileArray($imageId); ?>

                        <? if (is_array($pic)) : ?>

                            <a data-slide-index="<?= $i ?>" href="" class="b-product-photo__thumbnail-item">
                                <img class="b-product-photo__thumbnail-item__content" src="<?= $pic['SRC'] ?>"
                                     alt="<?= $arResult['NAME'] ?>">
                            </a>
                            <? $i++ ?>

                        <? endif ?>

                    <? endforeach ?>

                </div>

            <? endif ?>

        </div>
        <div class="price_block">

            <? if ($arResult['PRICES']['BASE']['DISCOUNT_DIFF'] > 0) : ?>

                <span class="old_price"><?= $arResult['PRICES']['BASE']['PRINT_VALUE'] ?></span>

            <? endif ?>

            <p class="current_price dark_grey"><b
                        class="orange"><?= implode(' ', explode(' ', $arResult['ITEM_PRICES'][0]['PRINT_PRICE'], -1)) ?></b>
                руб.</p>

            <? if ($arResult['CATALOG_QUANTITY'] > 1) : ?>
                <a class="buy_button inverse"
                   href="<?= explode('#', $arResult['ADD_URL_TEMPLATE'])[0] . $arResult['ID'] ?>"><?= $arResult['ORIGINAL_PARAMETERS']['MESS_BTN_ADD_TO_BASKET'] ?></a>

            <? else : ?>

                <p style="color:black;"
                   class="inverse"><?= $arResult['ORIGINAL_PARAMETERS']['MESS_NOT_AVAILABLE'] ?></p>

            <? endif ?>

        </div>
        <div class="slide_box">
            <h3 class=" slide_panel show"><?= GetMessage('CT_BCE_CATALOG_HEADER_SECTION_PARAMS') ?>
                <div class="slide_button"></div>
            </h3>
            <div class="slide_block" style="display:block">
                <table class="features">

                    <? foreach ($arResult['DISPLAY_PROPERTIES'] as $item) : ?>

                        <tr>
                            <td>
                                <div><span><?= $item['NAME'] ?></span></div>
                            </td>
                            <td><?= $item['VALUE'] ?></td>
                        </tr>

                    <? endforeach ?>

                </table>
            </div>
        </div>

        <? if (count($arResult['DETAIL_TEXT']) > 1) : ?>

            <div class="slide_box">
                <div class="slide_button"></div>
                <h3 class="slide_panel"><?= GetMessage('CT_BCE_CATALOG_HEADER_SECTION_DESCRIPTION') ?></h3>
                <div class="slide_block">

                    <?= $arResult['DETAIL_TEXT'] ?>

                </div>
            </div>

        <? endif ?>

    </figcaption>
</figure>