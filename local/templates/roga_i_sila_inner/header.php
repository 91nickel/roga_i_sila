<!DOCTYPE>

<head>
    <meta charset="utf-8"/>
    <title><? $APPLICATION->ShowTitle() ?></title>

    <?php
    $APPLICATION->ShowHead();

    use Bitrix\Main\Page\Asset;

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/base.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/bxslider/jquery.bxslider.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.core.css\" rel=\"stylesheet");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.theme.css\" rel=\"stylesheet");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.selectmenu.css\" rel=\"stylesheet");

    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-1.9.1.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.placeholder.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/bxslider/jquery.bxslider.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/default_script.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/masonry.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.core.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.widget.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.position.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.ui.selectmenu/jquery.ui.selectmenu.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-ui-1.10.3.custom.min.js");


    ?>
</head>

<body>

<? $APPLICATION->ShowPanel(); ?>

<div class="wrapper">
    <div class="base_layer"></div>
    <header class="header">
        <div class="width_960">
            <div class="inline-block">
                <a href="/"><span class="logo inline-block"></span></a>
            </div>
            <nav class="top_menu grey inline-block">
                <a href="#" class="register">Регистрация</a>
                <a href="#" class="auth">Авторизация</a>
            </nav>
            <div class="basket_block inline-block">
                <a href="#" class="basket_product_count inline-block">0</a>
                <a href="#" class="order_button pie">Оформить заказ</a>
            </div>
        </div>
    </header>
    <section class="fixed_block">
        <div class="width_960">
            <form name="search_form" class="search_form pie">
                <div class="search_form_wrapper">
                    <input type="text" placeholder="Поиск по сайту"/>
                    <input type="submit" value=""/>
                </div>
            </form>
            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "menu_top",
                array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "top",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "2",
                    "MENU_CACHE_GET_VARS" => array(),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "top",
                    "USE_EXT" => "Y",
                    "COMPONENT_TEMPLATE" => "menu_top"
                ),
                false
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
                    "menu_left",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "4",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "left",
                        "USE_EXT" => "N",
                        "COMPONENT_TEMPLATE" => "menu_left"
                    ),
                    false
                ); ?>



