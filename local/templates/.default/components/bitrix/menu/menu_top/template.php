<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<nav class="main_menu">
    <ul>
        <? foreach ($arResult as $item) : ?>

            <? if ($item['CHILDREN']) : ?>

                <li class="submenu pie">

                    <span><a href="<?= $item['LINK'] ?>"><?= $item['TEXT'] ?></a></span>

                    <div class="submenu_border"></div>
                    <ul>

                        <? foreach ($item['CHILDREN'] as $child) : ?>

                            <li><a href="<?= $child['LINK'] ?>"><?= $child['TEXT'] ?></a></li>

                        <? endforeach ?>

                    </ul>
                </li>

            <? else : ?>

                <li><a href="<?= $item['LINK'] ?>"><?= $item['TEXT'] ?></a></li>

            <? endif ?>
        <? endforeach ?>
    </ul>
</nav>
