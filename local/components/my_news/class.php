<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
class MyNewsComponent extends CBitrixComponent{
	public function onPrepareComponentParams($arParams){
		if(empty($arParams['IBLOCK_ID'])){
			ShowError('ERROR: NO IBLOCK_ID');
			exit();
		}
		return $arParams;
	}
	public function executeComponent(){
		if (!CModule::IncludeModule("iblock")){
			ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
			return;
		}
		if(!empty($this->arParams['arNavStartParams'])){
			$limit = $arNavStartParams['nTopCount'];
			$offset = $arNavStartParams['offset'];
		}
		$filter = ["IBLOCK_ID"=>$this->arParams['IBLOCK_ID']];
		$nav = new \Bitrix\Main\UI\PageNavigation("nav");
		$nav->allowAllRecords(true)
			->setPageSize(4)
			->initFromUri();
		$limit = empty($limit) ? $nav->getOffset() : $limit;
		$offset = empty($offset) ? $nav->getOffset() : $offset;
		$news = \Bitrix\Iblock\ElementTable::getList(
			[
				"filter" => $filter,
				"offset" => $offset,
				"limit" => $limit,
				'count_total' => true,
			]
		);
		$resultCount = 0;
		while ($el = $news->Fetch()){
			array_push($this->arResult, $el);
			$curElHref = &$this->arResult[count($this->arResult)-1]['href'];
			$curElTimestamp_x = &$this->arResult[count($this->arResult)-1]['TIMESTAMP_X'];
			$this->addHref($curElHref, '/news/detailed/', $el);
			$curElTimestamp_x =  $this->formatToWordTime($curElTimestamp_x);
			$resultCount++;
		}
		$nav->setRecordCount($news->getCount());
		$this->arResult['NAV_OBJECT'] = $nav;
		$this->arResult['resultCount'] = $resultCount;
		$this->includeComponentTemplate();
	}
	private function addHref(&$elHref, $page, $el){
		$elHref = '"//' . $_SERVER['SERVER_NAME'] . $page . $el['CODE'].'"';
	}
	private function formatToWordTime($timestamp_x){
		$dateTime = new \Bitrix\Main\Type\DateTime($timestamp_x);
		$dateTime = $dateTime->getTimeStamp();
		$dateTime = FormatDate('j F Y', $dateTime, time());
		return $dateTime;
	}
}