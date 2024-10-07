<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class MyNewsComponent extends CBitrixComponent{
	public function onPrepareComponentParams($arParams){
		if(!isset($arParams['arNavStartParams']))
			$arParams['arNavStartParams'] = false;
		return $arParams;
	}
	public function executeComponent(){
		if(!CModule::IncludeModule("iblock")){ 
			ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
			return;
		}
		$selectFields = ['ID', 'NAME', 'DETAIL_TEXT', 'IBLOCK_ID', 'TIMESTAMP_X', 'PREVIEW_TEXT', 'CODE'];
		$news = CIBlockElement::GetList(['SORT' => 'ASC'], 
		['IBLOCK_ID' => $this->arParams['IBLOCK_ID']], 
		false, 
		$this->arParams['arNavStartParams'], 
		$selectFields
	);
		while($el = $news->Fetch()){
			array_push($this->arResult, $el);
			$curElHref = &$this->arResult[count($this->arResult)-1]['href'];
			$this->addHref($curElHref, '/news/', $el);

		}
		$this->includeComponentTemplate();
	}
	private function addHref(&$elHref, $page, $el){
		$elHref = '"//' . $_SERVER['SERVER_NAME'] . $page . $el['CODE'].'"';
	}
}