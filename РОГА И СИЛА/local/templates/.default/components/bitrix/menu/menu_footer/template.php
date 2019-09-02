<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<h2><?= GetMessage('MENU_BLOCK_HEADER') ?></h2>
<nav class="grey">
    <ul>
        <? foreach ($arResult as $item) : ?>
            <? if ($item['SELECTED'] != 1) : ?>
        <li><a href="<?= $item['LINK'] ?>"><?= $item['TEXT'] ?></a></li>

            <? endif ?>

        <? endforeach ?>
    </ul>
</nav>