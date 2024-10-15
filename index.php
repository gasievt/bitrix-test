<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Test");
CJSCore::Init(array('ajax'));
?>
<div class="index-incareas-container">
	<?php
	for ($i = 0; $i < 3; $i++)
	{
		$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"grey_incarea",
			[
				"AREA_FILE_SHOW" => "page",
				"AREA_FILE_SUFFIX" => "inc" . $i, 
				"AREA_FILE_RECURSIVE" => "N",
			]
		);
	}
	?>
</div>
<?$APPLICATION->IncludeComponent('my_news', 'news_single', [
	'IBLOCK_ID' => 22, 
	'arNavStartParams' => ['nTopCount' => 3, 'nOffset' => 0],
]	
);?>
<div class="form_add-container">
	<form class="form_add" name="iblock_add" action="/formhandler.php" method="post">
		<div class="form_add-header">Форма обратной связи</div>
		<div class="form_add-inputs">
			<input id="form_add-name" type="text" name="name" maxlength="60" placeholder="Введите имя" required>
			<input id="form_add-phone" type="tel" name="phone" maxlength="12" placeholder="+7(___)___-__-__" required>
		</div>
		<div id="form_add-button">Отправить</div>
	</form>
</div>
<div class="form_add-container-success hidden">
	<div class="form_add">
		<div class="form_add-header">Форма успешно отправлена</div>
	</div>
</div>

<script>
    nameInput = BX('form_add-name');
    phoneInput = BX('form_add-phone');
    button = BX('form_add-button');
    form = document.querySelector('.form_add-container');
    formSuccess = document.querySelector('.form_add-container-success');
    BX.bind(button, 'click', () => {
      BX.ajax({
        url: '/ajax/formhandler.php',
        data: {
          name: nameInput.value,
          phone: phoneInput.value,
        },
        method: 'POST',
        dataType: 'json',
        timeout: 10,
        onsuccess: function( res ) {
			if (res.isSuccess === 'true'){
				form.classList.add('hidden');
				formSuccess.classList.remove('hidden');
			}
			else{
				if(res.error['phone'] === 'true'){
					phoneInput.classList.add('form_add-error');
				}
				if(res.error['name'] === 'true'){
					nameInput.classList.add('form_add-error');
				}
			}
        },
        onfailure: e => {
          console.error( e );
        }
      })
    })
</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>