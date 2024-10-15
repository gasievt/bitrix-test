<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Test");
?>
<?$APPLICATION->IncludeComponent('my_news', 'news_list', [
	'IBLOCK_ID' => 22,
	'back_href' => $_SERVER['REQUEST_URI']
])?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>	