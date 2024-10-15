<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="detailed-news-container">
	<a class="back" href="/news">Назад</a>
	<div class="detailed-news">
		<div class="detailed-news-name"><?=$arResult['newsDetailed']['NAME']?></div>
		<div class="detailed-news-date"><?=$arResult['newsDetailed']['TIMESTAMP_X']?></div>
		<div class="detailed-news-body"><?=$arResult['newsDetailed']['DETAIL_TEXT']?></div>
	</div>
</div>