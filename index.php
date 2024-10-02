<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Test");
?>
<div class="index-incareas-container">
<?for($i = 0; $i < 3; $i++){?>
<?$APPLICATION->IncludeComponent("bitrix:main.include","grey_incarea",Array(
	"AREA_FILE_SHOW" => "page", 
	"AREA_FILE_SUFFIX" => "inc" . $i, 
	"AREA_FILE_RECURSIVE" => "N",
)
);?>
<?}?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>