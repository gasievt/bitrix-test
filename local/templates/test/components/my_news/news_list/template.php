<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="newslist">
	<?for ($i = 0; $i < $arResult['resultCount']; $i++){?>
	<?='<div class="newslist-single">'?>
	<?='<a' . ' href=' . $arResult[$i]['href'] . ' class="newslist-name">'?><?=$arResult[$i]['NAME']?><?='</a>'?>
	<?='<div class="newslist-body">'?><?=$arResult[$i]['DETAIL_TEXT']?><?='</div>'?>
	<?='<div class="newslist-date">'?><?=$arResult[$i]['TIMESTAMP_X']?><?='</div>'?>
	<?='</div>'?>
	<?}?>
</div>
<?
$APPLICATION->IncludeComponent(
	'bitrix:main.pagenavigation',
	'',
	[
		'NAV_OBJECT' => $arResult['NAV_OBJECT'],
		'SEF_MODE' => 'Y',
	],
);
?>