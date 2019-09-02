<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php") ?>

<? $APPLICATION->SetTitle("Автосалон РОГА и СИЛА") ?>

    <div class="slider">
        <ul class="bxslider">
            <li>
                <div class="banner">
                    <img src="/include/images/test_slider_1.png"
                         alt="" title=""/>
                    <div class="banner_content">
                        <h1>Купи Роллс Ройс, получи Отчество к&nbsp;своему имени</h1>
                        <h2>Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием
                            истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном
                            мире <a href="#1" class="detail_link">подробнее</a></h2>
                    </div>
                </div>
            </li>
            <li>
                <div class="banner">
                    <img src="/include/images/test_slider_2.png" alt="" title=""/>
                    <div class="banner_content">
                        <h1>Купи Астон Мартин, получи секретное Задание</h1>
                        <h2>Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием
                            истинности необходимость и общезначимость, для которых нет никакой опоры в
                            объективном мире <a href="#2" class="detail_link">подробнее</a></h2>
                    </div>
                </div>
            </li>
            <li>
                <div class="banner">
                    <img src="/include/images/test_slider_3.png'" alt=""
                         title=""/>
                    <div class="banner_content">
                        <h1>Купи Бентли, получи бейсболку</h1>
                        <h2>Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием
                            истинности необходимость и общезначимость, для которых нет никакой опоры в
                            объективном мире <a href="#3" class="detail_link">подробнее</a></h2>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <h2 class="push_right">Модели недели</h2>
    <section class="product_line">
        <figure class="product_item">
            <div class="product_item_pict">
                <a href="#">
                    <img src="/include/images/test_top_week_1.png"
                         alt="BMW X3 2.0d" title="BMW X3 2.0d"/>
                </a>
            </div>
            <figcaption>
                <h3><a href="#">BMW X3 2.0d</a></h3>
                <span class="product_item_price dark_grey old_price">3 230 000 руб.</span>
                <p class="product_item_price dark_grey">2 230 000 руб.</p>
                <a class="buy_button inverse inline-block pie" href="#">В корзину</a>
            </figcaption>
        </figure>
        <figure class="product_item">
            <div class="product_item_label new"></div>
            <div class="product_item_pict">
                <a href="#">
                    <img src="/include/images/test_top_week_2.png"
                         alt="AUDI A6 3.0 TFSI" title="AUDI A6 3.0 TFSI"/>
                </a>
            </div>
            <figcaption>
                <h3><a href="#">AUDI A6 3.0 TFSI</a></h3>
                <p class="product_item_price dark_grey">2 870 000 руб.</p>
                <a class="buy_button inverse inline-block pie" href="#">В корзину</a>
            </figcaption>
        </figure>
        <figure class="product_item">
            <div class="product_item_label sale"></div>
            <div class="product_item_pict">
                <a href="#">
                    <img src="/include/images/test_top_week_3.png"
                         alt="Mercedes-Benz A200"
                         title="Mercedes-Benz A200"/>
                </a>
            </div>
            <figcaption>
                <h3><a href="#">Mercedes-Benz A200</a></h3>
                <p class="product_item_price dark_grey">1 310 000 руб.</p>
                <a class="buy_button inverse inline-block pie" href="#">В корзину</a>
            </figcaption>
        </figure>
        <figure class="product_item">
            <div class="product_item_pict">
                <a href="#">
                    <img src="/include/images/no-image.jpg" alt="BMW Z4 sDrive35i"
                         title="BMW Z4 sDrive35i"/>
                </a>
            </div>
            <figcaption>
                <h3><a href="#">BMW Z4 sDrive35i</a></h3>
                <p class="product_item_price">3 532 000 руб.</p>
                <a class="buy_button inverse inline-block pie" href="#">В корзину</a>
            </figcaption>
        </figure>
    </section>
<? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news_list_main", 
	array(
		"ACTIVE_DATE_FORMAT" => "j M Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "CODE",
			2 => "XML_ID",
			3 => "NAME",
			4 => "TAGS",
			5 => "SORT",
			6 => "PREVIEW_TEXT",
			7 => "PREVIEW_PICTURE",
			8 => "DETAIL_TEXT",
			9 => "DETAIL_PICTURE",
			10 => "DATE_ACTIVE_FROM",
			11 => "ACTIVE_FROM",
			12 => "DATE_ACTIVE_TO",
			13 => "ACTIVE_TO",
			14 => "SHOW_COUNTER",
			15 => "SHOW_COUNTER_START",
			16 => "IBLOCK_TYPE_ID",
			17 => "IBLOCK_ID",
			18 => "IBLOCK_CODE",
			19 => "IBLOCK_NAME",
			20 => "IBLOCK_EXTERNAL_ID",
			21 => "DATE_CREATE",
			22 => "CREATED_BY",
			23 => "CREATED_USER_NAME",
			24 => "TIMESTAMP_X",
			25 => "MODIFIED_BY",
			26 => "USER_NAME",
			27 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "3",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
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
		"SORT_BY1" => "TIMESTAMP_X",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "news_list_main"
	),
	false
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php") ?>