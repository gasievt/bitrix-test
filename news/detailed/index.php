<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Test");
?>
<?$APPLICATION->IncludeComponent('detailed_news', 'detailed', [
	'IBLOCK_ID' => 22,
	'pageCode' => $_REQUEST['CODE'],
])?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>