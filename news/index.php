<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Test");
?>
<?$APPLICATION->IncludeComponent('my_news', 'news_list', [
	
])?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>