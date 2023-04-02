<?php
Route::group(['as' => 'analytics::', 'prefix' => 'public-api', 'namespace' => '\\BoneCreative\\FacebookConversionsApi', 'middleware' => ['cors', 'api']], function ()
{

	Route::match(['options', 'post'], 'analytics/fb', [
		'as'   => 'fb',
		'uses' => 'Controller'
	]);
});