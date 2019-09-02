</section>
<hr class="bottom_line">
</section>

<div class="d_footer width_960"></div>

<div class="clear"></div>

</div>

<footer class="footer width_960">
    <section class="float_inner bottom_block">
        <section class="shops_block">
            <div>
                <? $APPLICATION->IncludeComponent(
	"qsoft:stores.list", 
	"stores_short", 
	array(
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "stores_short",
		"DETAIL_URL" => "/company/stores/#CODE#",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"FRAMES_COUNT" => "2",
		"IBLOCKS" => "",
		"IBLOCK_ID" => "4",
		"IBLOCK_PROP" => "44",
		"IBLOCK_TYPE" => "s1",
		"PARENT_SECTION" => "",
		"SHOW_MAP" => "N"
	),
	false
); ?>
            </div>
        </section>
        <section class="info_block left_block_shadow">
            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "menu_footer",
                array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "bottom",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "bottom",
                    "USE_EXT" => "N",
                    "COMPONENT_TEMPLATE" => "menu_footer"
                ),
                false
            ); ?>
        </section>
    </section>
    <div class="footer_inner">
        <a href="http://www.qsoft.ru" target="_blank" class="qsoft grey inline-block">Сделано в</a>
        <div class="copy"><?= GetMessage('LEARNING_TEMPLATE_COPYRIGHT') ?></div>
    </div>
</footer>
</body>

</html>