<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!CModule::IncludeModule("iblock")){
	echo json_encode(['isSucces' => 'false', 'error' => 'IBLOCK_MODULE_NOT_INSTALLED']);
	exit();
}
const IBLOCK_ID = 23;
$namePattern = '/^[A-Za-zА-Яа-яЁё]{3,16}$/u';
$phonePattern = '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/';
preg_match($namePattern, $_POST['name'], $nameMatches);
preg_match($phonePattern, $_POST['phone'], $phoneMatches);
if (empty($nameMatches) && empty($phoneMatches)) {
    $result = ['isSuccess' => 'false', 'error' => ['phone' => 'true', 'name' => 'true']];
} elseif (empty($nameMatches)) {
    $result = ['isSuccess' => 'false', 'error' => ['name' => 'true']];
} elseif (empty($phoneMatches)) {
    $result = ['isSuccess' => 'false', 'error' => ['phone' => 'true']];
} else {
    $el = new CIBlockElement;
    $arLoadProductArray = Array(
        "IBLOCK_ID"      => IBLOCK_ID,
        "NAME"           => $_POST['name'],
        "DETAIL_TEXT"    => $_POST['phone'],
    );
    if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
        $result = ['isSuccess' => 'true'];
    } else {
        $result = ['isSuccess' => 'false', 'error' => 'some error'];
    }
}
header("Content-type: application/json; charset=utf-8");
echo json_encode($result);
?>