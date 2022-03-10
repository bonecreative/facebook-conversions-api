<?php
// @see https://developers.facebook.com/docs/marketing-api/conversions-api/payload-helper
namespace Bone\Tests;

use BoneCreative\FacebookConversionsApi\Client;
use Tests\TestCase;

class ClientTest extends TestCase
{

	/**
	 * @see \BoneCreative\FacebookConversionsApi\Client::initiateCheckout
	 *
	 * @test
	 */
	public function can_initiateCheckout()
	{
		$result = Client::initiateCheckout('eamil@test.com');
		$this->assertTrue($result);
	}

	/**
	 * @see \BoneCreative\FacebookConversionsApi\Client::purchase
	 *
	 * @test
	 */
	public function can_purchase()
	{
		$result = Client::purchase(69.69);
		$this->assertTrue($result);
	}
}