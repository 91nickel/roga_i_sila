<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
define("NEED_AUTH", true);
?>

<div class="work_area" style="text-align: center;">
    <?
    $APPLICATION->AuthForm('Пожалуйста авторизуйтесь');
    ?>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
