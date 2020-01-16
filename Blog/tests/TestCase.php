<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Notification;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    protected function setUp():void
    {
    	parent::setUp();
    	Notification::fake();
		/*$this->markTestSkipped(
            'This test will be skipped when you run `php-unit`.'
        );*/
    }
}
