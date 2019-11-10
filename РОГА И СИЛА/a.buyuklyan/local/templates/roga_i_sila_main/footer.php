                </div>
            </section>

        <div class="d_footer width_960"></div>
        <div class="clear"></div>
        </div>
        <footer class="footer width_960">
            <section class="float_inner bottom_block">
                <?php $APPLICATION->IncludeComponent(
                    "qsoft:stores.list",
                    "stores_short",
                    array(
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "Y",
                    "COMPONENT_TEMPLATE" => "stores_short",
                    "DETAIL_URL" => "/company/stores/#ELEMENT_CODE#/",
                    "IBLOCK_ID" => "4",
                    "IBLOCK_TYPE" => "salons",
                    "SALONS_COUNT" => "2",
                    "SET_LINK_SHOW_ALL" => "/company/stores/",
                    "SET_SHOW_MAP" => "N",
                    "SET_STATUS_404" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY" => "RAND",
                    "SORT_ORDER" => "DESC",
                    "URL_SHOW_ALL" => "/company/stores/",
                    "MESSAGE_404" => "",
                    "SET_TITLE" => "N"
                    ),
                    false
);?>
                <?php $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "menu_footer",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "bottom",
                        "USE_EXT" => "N",
                        "COMPONENT_TEMPLATE" => "menu_footer"
                    ),
                    false
                );?>
            </section>
            <div class="footer_inner">
                <a href="http://www.qsoft.ru" target="_blank" class="qsoft grey inline-block">
                    <?=GetMessage('MADE_IN')?>
                </a>
                <div class="copy">
                    <?=GetMessage('COPYRIGHT')?>
                </div>
            </div>
        </footer>
    </body>
</html>