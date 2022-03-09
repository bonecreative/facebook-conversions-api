<?php
namespace Bone\Tests;

use BoneCreative\FacebookConversionsApi\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

	/**
	 * @see \BoneCreative\CheckFront\Client::__call
	 *
	 * @test
	 */
	public function can_test()
	{
		$c = new Client();
	}
}