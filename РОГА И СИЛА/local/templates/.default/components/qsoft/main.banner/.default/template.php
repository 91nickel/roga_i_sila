<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>



<div class="slider">
    <ul class="bxslider">
        <? $frame = $this->createFrame()->begin(""); ?>
        <? foreach ($arResult['BANNERS'] as $banner) : ?>
        <li>
            <div class="banner">
                <?= $banner; ?>
            </div>
        </li>
        <? endforeach ?>
        <? $frame->end() ?>
    </ul>
</div>



<pre>
    <? print_r($arResult);
    ?>
</pre>