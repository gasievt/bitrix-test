<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
class MyDetailedNewsComponent extends CBitrixComponent{
	public function onPrepareComponentParams($arParams){
		if(empty($arParams['pageCode']))
			$arParams['pageCode'] = false;
		return $arParams;
	}
	public function executeComponent(){
		if (!CModule::IncludeModule("iblock")){
			ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
			return;
		}
		// if($this->arParams['CODE']){
		// 	$this->arResult['notFound'] = 'Такой новости нет';
		// 	return;
		// }
		$filter = ['IBLOCK_ID'=>$this->arParams['IBLOCK_ID'], 'CODE' => $this->arParams['pageCode']];
		$newsDetailed = \Bitrix\Iblock\ElementTable::getList(
			[
				"filter" => $filter,
			]
		);
		if(!$this->arResult['newsDetailed'] = $newsDetailed->Fetch()){
			$this->arResult['notFound'] = 'Такой новости нет';
			return;
		}
		$this->arResult['newsDetailed']['TIMESTAMP_X'] = $this->formatToWordTime($this->arResult['newsDetailed']['TIMESTAMP_X']);
		$this->IncludeComponentTemplate();
	}
	private function formatToWordTime($timestamp_x){
		$dateTime = new \Bitrix\Main\Type\DateTime($timestamp_x);
		$dateTime = $dateTime->getTimeStamp();
		$dateTime = FormatDate('j F Y', $dateTime, time());
		return $dateTime;
	}
}