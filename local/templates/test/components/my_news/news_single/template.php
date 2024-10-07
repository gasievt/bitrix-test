<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="index-news-container">
<?for ($i = 0; $i < count($arResult); $i++){?>
	<?='<div class="news-single">'?>
	<?='<a' . ' href=' . $arResult[$i]['href'] . ' class="news-single-header">'?><?=$arResult[$i]['NAME']?><?='</a>'?>
	<?='<div class="news-single-body">'?><?=$arResult[$i]['PREVIEW_TEXT']?><?='</div>'?>
	<?='<div class="news-single-time">'?><?=$arResult[$i]['TIMESTAMP_X']?><?='</div>'?>
<?='</div>'?>
<?}?>
</div>