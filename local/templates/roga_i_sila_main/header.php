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
            <? if ($USER->IsAuthorized()) : ?>
                <nav class="top_menu grey inline-block authorize">
                    <span>Здравствуйте,</span>
                    <a href="#"><b class="user_name"><?= $USER->GetFirstName() . ' ' . $USER->GetParam('SECOND_NAME') ?></b></a>
                    <a href="/personal/">Личный кабинет</a>
                    <a class="logout" href="/personal/account/?logout=yes">Выйти</a>
                </nav>
            <? else : ?>
                <nav class="top_menu grey inline-block">
                    <a href="/login/" class="register">Регистрация</a>
                    <a href="/auth/" class="auth">Авторизация</a>
                </nav>
            <? endif ?>
            <div class="basket_block inline-block">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:sale.basket.basket.line",
                    "basket.line.top",
                    array(
                        "COMPONENT_TEMPLATE" => "basket.line.top",
                        "HIDE_ON_BASKET_PAGES" => "Y",
                        "PATH_TO_AUTHORIZE" => "",
                        "PATH_TO_BASKET" => "/personal/cart/",
                        "PATH_TO_ORDER" => "/personal/order/make/",
                        "PATH_TO_PERSONAL" => "/personal/",
                        "PATH_TO_PROFILE" => "/personal/",
                        "PATH_TO_REGISTER" => "/login/",
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

