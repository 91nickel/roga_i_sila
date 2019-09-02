<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<aside class="left_block">
    <nav>
        <ul class="left_menu">
            <li>
                <span><?= GetMessage('MENU_BLOCK_HEADER') ?></span>
                <ul>
                    <? foreach ($arResult as $item) : ?>
                        <? if ($item['SELECTED'] != 1) : ?>
                    <li><a href="<?= $item['LINK'] ?>"><?= $item['TEXT'] ?></a></li>

                        <? endif ?>

                    <? endforeach ?>
                </ul>
            </li>
        </ul>
    </nav>
</aside>