<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
?> <!--[if IE 7]>
    <html class="ie7">
<![endif]--> <!--[if IE 8]>
    <html class="ie8>
<![endif]--> <!--[if IE 9]>
    <html class="ie9">
<![endif]--> <!--[if gt IE 9]>
    <!--> <!--<![endif]-->
<?php $APPLICATION->ShowHead();?>
<?php
    use Bitrix\Main\Page\Asset;

    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/../.default/js/jquery-1.9.1.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/../.default/js/jquery.placeholder.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/../.default/js/bxslider/jquery.bxslider.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/../.default/js/default_script.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/../.default/js/jquery.ui.selectmenu/jquery.ui.core.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/../.default/js/jquery.ui.selectmenu/jquery.ui.widget.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/../.default/js/jquery.ui.selectmenu/jquery.ui.position.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/../.default/js/jquery.ui.selectmenu/jquery.ui.selectmenu.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/../.default/js/masonry.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/../.default/js/jquery-ui-1.10.3.custom.min.js');

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/../.default/css/base.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/../.default/js/bxslider/jquery.bxslider.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/template_styles.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/../.default/styles.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/../.default/js/jquery.ui.selectmenu/jquery.ui.core.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/../.default/js/jquery.ui.selectmenu/jquery.ui.theme.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/../.default/s/jquery.ui.selectmenu/jquery.ui.selectmenu.css');
?> <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
<![endif]-->
<?php $APPLICATION->ShowPanel();?>
<title><?php $APPLICATION->ShowTitle()?></title>
<div class="wrapper">
    <div class="base_layer">
    </div>
    <div class="header">
        <div class="width_960">
            <div class="inline-block">
                <span class="logo inline-block"></span>
            </div>
            <?php $APPLICATION->IncludeComponent(
                "bitrix:system.auth.form",
                "auth_form_header",
                array(
                    "COMPONENT_TEMPLATE" => "auth_form_header",
                    "FORGOT_PASSWORD_URL" => "",
                    "LK_URL" => "/personal/",
                    "PROFILE_URL" => "/personal/profile/",
                    "REGISTER_URL" => "/auth/",
                    "SHOW_ERRORS" => "N"
                )
            );?>
            <?php $APPLICATION->IncludeComponent(
                "bitrix:sale.basket.basket.line",
                "basket_line_header",
                array(
                    "HIDE_ON_BASKET_PAGES" => "Y",
                    "PATH_TO_AUTHORIZE" => "",
                    "PATH_TO_BASKET" => "/personal/cart/",
                    "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
                    "PATH_TO_PERSONAL" => "/personal/",
                    "PATH_TO_PROFILE" => SITE_DIR."personal/",
                    "PATH_TO_REGISTER" => SITE_DIR."login/",
                    "POSITION_FIXED" => "N",
                    "SHOW_AUTHOR" => "N",
                    "SHOW_EMPTY_VALUES" => "Y",
                    "SHOW_NUM_PRODUCTS" => "Y",
                    "SHOW_PERSONAL_LINK" => "N",
                    "SHOW_PRODUCTS" => "N",
                    "SHOW_REGISTRATION" => "N",
                    "SHOW_TOTAL_PRICE" => "Y",
                    "COMPONENT_TEMPLATE" => "basket_line_header",
                    "MAKE_ORDER_NAME" => "Оформить заказ"
                ),
                false
            );?>
        </div>
    </div>
 <section class="fixed_block">
    <div class="width_960">
        <?php $APPLICATION->IncludeComponent(
            "bitrix:search.form",
            "search_form_header",
            array(
                "COMPONENT_TEMPLATE" => "search_form_header",
                "PAGE" => "/search/",
                "SEARCH_PHRASE" => "Поиск по сайту",
                "USE_SUGGEST" => "N",
            ),
            false
        );?>
        <?php $APPLICATION->IncludeComponent(
            "bitrix:menu",
            "catalog_top",
            array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "left",
                "DELAY" => "N",
                "MAX_LEVEL" => "3",
                "MENU_CACHE_GET_VARS" => array(""),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "ROOT_MENU_TYPE" => "top",
                "USE_EXT" => "Y"
            )
        );?>
    </div>
 </section>
 <section class="content">
    <div class="work_area width_960">
        <?php if ($APPLICATION->GetCurPage() != "/") {?> 
            <?php $APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                ".default",
                array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "PATH" => "",
                    "SITE_ID" => "s1",
                    "START_FROM" => "0"
                )
            );?>
            
            <h1 class="push_right">
                <?php $APPLICATION->ShowTitle()?>
            </h1>
        <?php }?>
    