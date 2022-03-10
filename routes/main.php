<?php
Route::group(['as' => 'analytics::', 'prefix' => 'public-api', 'namespace' => '\\BoneCreative\\FacebookConversionsApi', 'middleware' => ['cors', 'api']], function ()
{

	Route::match(['options', 'post'], 'analytics', [
		'as'   => 'fb',
		'uses' => 'Controller'
	]);
});