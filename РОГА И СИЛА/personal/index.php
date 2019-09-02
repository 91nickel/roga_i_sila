<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Персональный раздел");
?>
<div class="work_area width_960">
    <? if (CUser::IsAuthorized()) : ?>
        <? $APPLICATION->IncludeComponent(
            "bitrix:main.profile",
            "",
            array(
                "CHECK_RIGHTS" => "N",
                "SEND_INFO" => "N",
                "SET_TITLE" => "Y",
                "USER_PROPERTY" => array(),
                "USER_PROPERTY_NAME" => ""
            )
        ); ?>
    <? else : ?>
    Вы не авторизованы <br>

    <? endif ?>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>