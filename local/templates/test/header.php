<!DOCTYPE html>
<html lang="en">
<head>
<?$APPLICATION->ShowHead();?>
<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>
<?$APPLICATION->ShowPanel()?>
<header>
	<div class="header-items">
	<div class="header-image">
		<img src="<?=SITE_TEMPLATE_PATH?>/images/o2logo.jpg" alt="logo">
	</div>
	<div class="header-item">
	<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"grey_tabs",
	Array(
	"ROOT_MENU_TYPE" => "top", 
	"USE_EXT" => "Y", 
	"MENU_CACHE_TYPE" => "A",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => Array()
	)
);?> 
	</div>
	</div>
</header>