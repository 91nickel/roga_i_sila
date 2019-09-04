<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<div class="slider">
    <ul class="bxslider">
        <?php $frame = $this->createFrame()->begin(""); ?>
        <?php foreach ($arResult["BANNERS"] as $k => $banner) : ?>
            <li>
                <div class="banner">
                    <?= $banner ?>
                </div>
            </li>
        <?php endforeach; ?>
        <?php $frame->end(); ?>
    </ul>
</div>