<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var string $templateFolder
 * @var string $templateName
 * @var CMain $APPLICATION
 * @var CBitrixBasketComponent $component
 * @var CBitrixComponentTemplate $this
 * @var array $giftParameters
 */

$documentRoot = Main\Application::getDocumentRoot();

$this->addExternalJs($templateFolder.'/js/mustache.js');
$this->addExternalJs($templateFolder.'/js/action-pool.js');
$this->addExternalJs($templateFolder.'/js/filter.js');
$this->addExternalJs($templateFolder.'/js/component.js');

$jsTemplates = new Main\IO\Directory($documentRoot.$templateFolder.'/js-templates');
/** @var Main\IO\File $jsTemplate */
foreach ($jsTemplates->getChildren() as $jsTemplate) {
    include($jsTemplate->getPath());
}
?>

<?php
if (empty($arResult['ERROR_MESSAGE'])) {?>
    <div id="basket-root" class="bx-basket bx-<?=$arParams['TEMPLATE_THEME']?> bx-step-opacity" style="opacity: 0;">
        <div style="margin-left: 30px;">
            <?= Loc::getMessage('SBB_BASKET_DO_ORDER_MESS'); ?>
        </div>
        <div style="margin-left: 30px;">
            <?= Loc::getMessage('SBB_BASKET_CONTINUE_BUING'); ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="basket-items-list-wrapper basket-items-list-wrapper-height-fixed basket-items-list-wrapper-light<?=$displayModeClass?>"
                    id="basket-items-list-wrapper">

                    <div class="basket-items-list-container" id="basket-items-list-container">

                        <div class="basket-items-list" id="basket-item-list">
                            <table class="basket-items-list-table" id="basket-item-table"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12" data-entity="basket-total-block"></div>
        </div>

    </div>
    <?php
    $signer = new \Bitrix\Main\Security\Sign\Signer;
    $signedTemplate = $signer->sign($templateName, 'sale.basket.basket');
    $signedParams = $signer->sign(base64_encode(serialize($arParams)), 'sale.basket.basket');
    $messages = Loc::loadLanguageFile(__FILE__);
    ?>
    <script>
        BX.message(<?=CUtil::PhpToJSObject($messages)?>);
        BX.Sale.BasketComponent.init({
            result: <?=CUtil::PhpToJSObject($arResult, false, false, true)?>,
            params: <?=CUtil::PhpToJSObject($arParams)?>,
            template: '<?=CUtil::JSEscape($signedTemplate)?>',
            signedParamsString: '<?=CUtil::JSEscape($signedParams)?>',
            siteId: '<?=$component->getSiteId()?>',
            ajaxUrl: '<?=CUtil::JSEscape($component->getPath().'/ajax.php')?>',
            templateFolder: '<?=CUtil::JSEscape($templateFolder)?>'
        });
    </script>
    <?php
} else {
    ShowError($arResult['ERROR_MESSAGE']);
}