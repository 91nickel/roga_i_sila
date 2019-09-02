<!DOCTYPE>

<head>
    <meta charset="utf-8" />
    <title><? $APPLICATION->ShowTitle() ?></title>

    <?php
    $APPLICATION->ShowHead();

    use Bitrix\Main\Page\Asset;

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/base.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/bxslider/jquery.bxslider.css");

    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-1.9.1.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/s/jquery.placeholder.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/bxslider/jquery.bxslider.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/default_script.js");

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.core.css\" rel=\"stylesheet");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.theme.css\" rel=\"stylesheet");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.selectmenu.css\" rel=\"stylesheet");

    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.core.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.widget.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.position.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.selectmenu.js");
    ?>
</head>

<body>
    <? $APPLICATION->ShowPanel(); ?>
    <div class="wrapper">
        <div class="base_layer"></div>
        <header class="header">
            <div class="width_960">
                <div class="inline-block">
                    <a href="<?= SITE_DIR ?>"><span class="logo inline-block"></span></a>
                </div>
                <nav class="top_menu grey inline-block">
                    <a href="/auth/?register=yes" class="register"><?= GetMessage('HEADER_REGISTER') ?></a>
                    <a href="/auth/" class="auth"><?= GetMessage('HEADER_AUTHORISATION') ?></a>
                </nav>

                <div class="basket_block inline-block">

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:sale.basket.basket.line",
                        "basket.line.top",
                        array(
                            "COMPONENT_TEMPLATE" => "basket.line.top",
                            "HIDE_ON_BASKET_PAGES" => "Y",
                            "PATH_TO_AUTHORIZE" => "",
                            "PATH_TO_BASKET" => SITE_DIR . "personal/cart/",
                            "PATH_TO_ORDER" => SITE_DIR . "personal/order/make/",
                            "PATH_TO_PERSONAL" => SITE_DIR . "personal/",
                            "PATH_TO_PROFILE" => SITE_DIR . "personal/",
                            "PATH_TO_REGISTER" => SITE_DIR . "login/",
                            "POSITION_FIXED" => "N",
                            "SHOW_AUTHOR" => "N",
                            "SHOW_DELAY" => "N",
                            "SHOW_EMPTY_VALUES" => "Y",
                            "SHOW_IMAGE" => "Y",
                            "SHOW_NOTAVAIL" => "N",
                            "SHOW_NUM_PRODUCTS" => "Y",
                            "SHOW_PERSONAL_LINK" => "N",
                            "SHOW_PRICE" => "Y",
                            "SHOW_PRODUCTS" => "N",
                            "SHOW_REGISTRATION" => "N",
                            "SHOW_SUMMARY" => "Y",
                            "SHOW_TOTAL_PRICE" => "Y"
                        )
                    ); ?>
                </div>

            </div>
        </header>
        <section class="fixed_block">
            <div class="width_960">
                <form name="search_form" class="search_form pie">
                    <div class="search_form_wrapper">
                        <input type="text" placeholder="Поиск по сайту" />
                        <input type="submit" value="" />
                    </div>
                </form>

                <?php $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "catalog_nav",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "2",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "top",
                        "USE_EXT" => "Y",
                        "COMPONENT_TEMPLATE" => "catalog_nav"
                    )
                ); ?>

            </div>

        </section>

        <section class="content">
            <div class="work_area width_960">

                <? $APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    ".default",
                    array(
                        "PATH" => "",
                        "SITE_ID" => "s1",
                        "START_FROM" => "0",
                        "COMPONENT_TEMPLATE" => ".default"
                    ),
                    false
                ); ?>

                <section class="content_area">

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "left_menu",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(),
                            "MENU_CACHE_TIME" => "",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "left",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "left_menu"
                        ),
                        false
                    ); ?>

                    <h1><? $APPLICATION->ShowTitle() ?></h1>