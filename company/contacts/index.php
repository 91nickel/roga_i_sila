<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<div>
	Text here....
</div>
<div>
	<? $APPLICATION->IncludeComponent(
		"qsoft:main.banner",
		"",
		array(
			"CACHE_TIME" => "0",
			"CACHE_TYPE" => "A",
			"NOINDEX" => "N",
			"QUANTITY" => "1",
			"TYPE" => "MAIN"
		)
	); ?>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>