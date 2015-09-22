<?php

namespace Hitmeister\Component\Api\Tests\Endpoints\Items;

use Hitmeister\Component\Api\Endpoints\Items\Get;
use Hitmeister\Component\Api\Tests\TransportAwareTestCase;

class GetTest extends TransportAwareTestCase
{
	public function testInstance()
	{
		$get = new Get($this->transport);
		$get->setId(10);
		$this->assertEquals(10, $get->getId());
		$this->assertEquals(['embedded'], $get->getParamWhiteList());
		$this->assertEquals('GET', $get->getMethod());
		$this->assertEquals('items/10/', $get->getURI());
	}

	/**
	 * @expectedException \Hitmeister\Component\Api\Exceptions\RuntimeException
	 * @expectedExceptionMessage Required params id is not set
	 */
	public function testExceptionOnEmptyId()
	{
		$get = new Get($this->transport);
		$get->getURI();
	}
}