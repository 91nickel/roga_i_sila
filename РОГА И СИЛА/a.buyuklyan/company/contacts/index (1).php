<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контактная информация");
?><?php $APPLICATION->IncludeComponent(
    "bitrix:main.feedback",
    "",
    array()
);?><?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
