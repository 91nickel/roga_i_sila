<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Автосалон РОГА и СИЛА");
?>

<section class="content">
    <div class="work_area width_960">
        <div class="slider">
            <ul class="bxslider">
                <li>
                    <div class="banner">
                        <img src="<?= SITE_TEMPLATE_PATH . '/images/test_slider_1.png'; ?>" alt="" title="">
                        <div class="banner_content">
                            <h1><?= GetMessage('INDEX_SLIDER_HEADER_FIRST') ?></h1>
                            <h2><?= GetMessage('INDEX_SLIDER_TEXT_FIRST') ?><a href="#1" class="detail_link"><?= GetMessage('INDEX_SLIDER_DETAILS_TEXT') ?></a></h2>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="banner">
                        <img src="<?= SITE_TEMPLATE_PATH . '/images/test_slider_2.png'; ?>" alt="" title="">
                        <div class="banner_content">
                            <h1><?= GetMessage('INDEX_SLIDER_HEADER_SECOND') ?></h1>
                            <h2><?= GetMessage('INDEX_SLIDER_TEXT_SECOND') ?><a href="#2" class="detail_link"><?= GetMessage('INDEX_SLIDER_DETAILS_TEXT') ?></a></h2>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="banner">
                        <img src="<?= SITE_TEMPLATE_PATH . '/images/test_slider_3.png'; ?>" alt="" title="">
                        <div class="banner_content">
                            <h1><?= GetMessage('INDEX_SLIDER_HEADER_THIRD') ?></h1>
                            <h2><?= GetMessage('INDEX_SLIDER_TEXT_THIRD') ?><a href="#3" class="detail_link"><?= GetMessage('INDEX_SLIDER_DETAILS_TEXT') ?></a></h2>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <? $APPLICATION->IncludeComponent(
            "qsoft:catalog.models.week",
            "models_main",
            array(
                "ACTION_VARIABLE" => "action",
                "ADD_PICT_PROP" => "-",
                "ADD_PROPERTIES_TO_BASKET" => "Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "ADD_TO_BASKET_ACTION" => "ADD",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "BACKGROUND_IMAGE" => "-",
                "BASKET_URL" => "/personal/cart/",
                "BROWSER_TITLE" => "-",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "COMPARE_NAME" => "CATALOG_COMPARE_LIST",
                "COMPARE_PATH" => "",
                "COMPATIBLE_MODE" => "Y",
                "CONVERT_CURRENCY" => "N",
                "CUSTOM_FILTER" => "",
                "DETAIL_URL" => "",
                "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                "DISCOUNT_PERCENT_POSITION" => "bottom-right",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_COMPARE" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "ELEMENT_SORT_FIELD" => "RAND",
                "ELEMENT_SORT_FIELD2" => "id",
                "ELEMENT_SORT_ORDER" => "asc",
                "ELEMENT_SORT_ORDER2" => "desc",
                "ENLARGE_PRODUCT" => "STRICT",
                "FILTER_NAME" => "arrFilter",
                "HIDE_NOT_AVAILABLE" => "N",
                "HIDE_NOT_AVAILABLE_OFFERS" => "N",
                "IBLOCK_ID" => "5",
                "IBLOCK_TYPE" => "products",
                "INCLUDE_SUBSECTIONS" => "Y",
                "LABEL_PROP" => array(
                    0 => "MODEL_WEEKS",
                    1 => "NEW",
                    2 => "SALE",
                ),
                "LABEL_PROP_MOBILE" => array(
                    0 => "MODEL_WEEKS",
                    1 => "NEW",
                    2 => "SALE",
                ),
                "LABEL_PROP_POSITION" => "top-left",
                "LAZY_LOAD" => "N",
                "LINE_ELEMENT_COUNT" => "3",
                "LOAD_ON_SCROLL" => "N",
                "MESSAGE_404" => "",
                "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                "MESS_BTN_BUY" => "Купить",
                "MESS_BTN_COMPARE" => "Сравнить",
                "MESS_BTN_DETAIL" => "Подробнее",
                "MESS_BTN_SUBSCRIBE" => "Подписаться",
                "MESS_NOT_AVAILABLE" => "Нет в наличии",
                "META_DESCRIPTION" => "-",
                "META_KEYWORDS" => "-",
                "OFFERS_LIMIT" => "5",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Товары",
                "PAGE_ELEMENT_COUNT" => "4",
                "PARTIAL_PRODUCT_PROPERTIES" => "Y",
                "PRICE_CODE" => array(
                    0 => "BASE",
                ),
                "PRICE_VAT_INCLUDE" => "Y",
                "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                "PRODUCT_ID_VARIABLE" => "id",
                "PRODUCT_PROPERTIES" => array(),
                "PRODUCT_PROPS_VARIABLE" => "prop",
                "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false}]",
                "PRODUCT_SUBSCRIPTION" => "Y",
                "PROPERTY_CODE" => array(
                    0 => "BLOG_POST_ID",
                    1 => "YEAR",
                    2 => "ENGINE",
                    3 => "CLASS",
                    4 => "BLOG_COMMENTS_CNT",
                    5 => "KPP",
                    6 => "BODY",
                    7 => "MODEL_WEEKS",
                    8 => "NEW",
                    9 => "SALE",
                    10 => "SALON",
                    11 => "COLOR",
                    12 => "",
                ),
                "PROPERTY_CODE_MOBILE" => array(
                    0 => "BLOG_POST_ID",
                    1 => "YEAR",
                    2 => "ENGINE",
                    3 => "CLASS",
                    4 => "BLOG_COMMENTS_CNT",
                    5 => "KPP",
                    6 => "BODY",
                    7 => "MODEL_WEEKS",
                    8 => "NEW",
                    9 => "SALE",
                    10 => "SALON",
                    11 => "COLOR",
                ),
                "RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
                "RCM_TYPE" => "personal",
                "SECTION_CODE" => "",
                "SECTION_CODE_PATH" => "",
                "SECTION_ID" => $_REQUEST["SECTION_ID"],
                "SECTION_ID_VARIABLE" => "SECTION_ID",
                "SECTION_URL" => "",
                "SECTION_USER_FIELDS" => array(
                    0 => "",
                    1 => "",
                ),
                "SEF_MODE" => "Y",
                "SEF_RULE" => "",
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SHOW_ALL_WO_SECTION" => "Y",
                "SHOW_CLOSE_POPUP" => "N",
                "SHOW_DISCOUNT_PERCENT" => "Y",
                "SHOW_FROM_SECTION" => "N",
                "SHOW_MAX_QUANTITY" => "N",
                "SHOW_OLD_PRICE" => "Y",
                "SHOW_PRICE_COUNT" => "1",
                "SHOW_SLIDER" => "Y",
                "SLIDER_INTERVAL" => "3000",
                "SLIDER_PROGRESS" => "N",
                "TEMPLATE_THEME" => "blue",
                "USE_ENHANCED_ECOMMERCE" => "N",
                "USE_MAIN_ELEMENT_SECTION" => "N",
                "USE_PRICE_COUNT" => "N",
                "USE_PRODUCT_QUANTITY" => "N",
                "COMPONENT_TEMPLATE" => "models_main"
            ),
            false
        ); ?>

        <section class="news_block inverse">
            <? $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "news_list_main",
                array(
                    "ACTIVE_DATE_FORMAT" => "j M Y",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "Y",
                    "COMPONENT_TEMPLATE" => "news_list_main",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "FILTER_NAME" => "",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "1",
                    "IBLOCK_TYPE" => "news",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "3",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "Новости",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "150",
                    "PROPERTY_CODE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "DESC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N"
                ),
                false
            ); ?>
        </section>

    </div>
</section>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>