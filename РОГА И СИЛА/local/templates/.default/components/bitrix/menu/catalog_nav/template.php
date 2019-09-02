<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<? if (!empty($arResult)) : ?>
<?
    $arRes = [];

    foreach ($arResult as $item) {
        if ($item['DEPTH_LEVEL'] == 1) {
            if ($item['IS_PARENT']) {
                $item['CHILDREN'] = [];
            }
            $arRes[] = $item;
        } else {
            $arRes[count($arRes) - 1]['CHILDREN'][] = $item;
        }
    }
    ?>

<nav class="main_menu">

    <ul>

        <? foreach ($arRes as $item) : ?>

        <? if (isset($item['CHILDREN']) && is_array($item['CHILDREN'])) : ?>

        <li class="submenu pie">

            <span>

                <a href="<?= $item['LINK'] ?>">

                    <?= $item['TEXT'] ?>

                </a>

            </span>

            <div class="submenu_border"></div>

            <ul>

                <? foreach ($item['CHILDREN'] as $child) : ?>

                <? if ($child['DEPTH_LEVEL'] > 1) : ?>

                <li>

                    <a href="<?= $child['LINK']; ?>">

                        <?= $child['TEXT'] ?>

                    </a>

                </li>

                <? endif ?>

                <? endforeach ?>

            </ul>

        </li>

        <? else : ?>

        <li><a href="<?= $item['LINK']; ?>"><?= $item['TEXT']; ?></a></li>

        <? endif ?>

        <? endforeach ?>

    </ul>
</nav>

<? endif ?>