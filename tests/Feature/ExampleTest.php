<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    public function testBasicTest()
    {
        use TestCaseTrait;

        public function getDataSet()
        {
            return $this->createMySQLXMLDataSet('/path/to/file.xml');
        }
    }
}
