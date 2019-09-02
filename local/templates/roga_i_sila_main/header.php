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
                <span class="logo inline-block"></span>
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
            <nav class="main_menu">
                <ul>
                    <li class="submenu pie">
                        <span>Легковые</span>
                        <div class="submenu_border"></div>
                        <ul>
                            <li><a href="#">Седаны</a></li>
                            <li><a href="#">Хетчбеки</a></li>
                            <li><a href="#">Универсалы</a></li>
                            <li><a href="#">Купе</a></li>
                            <li><a href="#">Родстеры</a></li>
                        </ul>
                    <li class="submenu pie">
                        <span>Внедорожники</span>
                        <div class="submenu_border"></div>
                        <ul>
                            <li><a href="#">Рамные</a></li>
                            <li><a href="#">Пикапы</a></li>
                            <li><a href="#">Кроссоверы</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Раритетные</a></li>
                    <li><a href="#">Распродажа</a></li>
                    <li><a href="#">Новинки</a></li>
                </ul>
            </nav>
        </div>
    </section>
