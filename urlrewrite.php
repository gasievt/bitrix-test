<?php
$arUrlRewrite=array (
	[
		'CONDITION' => '#^/news/nav/page-(\d+)/$#',
		'RULE' => '',
		'ID' =>'',
		'PATH' => '/news/index.php',
		'SORT' => 100
	],
	[
		'CONDITION' => '#^/news/detailed/([A-z-0-9_-]+)(/)?(\?.*)?$#',
		'ID' =>'',
		'RULE' => 'CODE=$1',
		'PATH' => '/news/detailed/index.php',
		'SORT' => 100
	],
);