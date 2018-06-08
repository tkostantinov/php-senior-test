<?php declare(strict_types = 1);

namespace Searchmetrics\SeniorTest\Tests\Integration;

use PHPUnit\Framework\TestCase;

final class GeneratorServiceTest extends TestCase
{
    private $API_URL = "http://localhost:1349/url-id-generator.php";

    public function test404()
    {
        $resultRaw = file_get_contents($this->API_URL . "?q=");
        $result = json_decode($resultRaw);

        $this->assertEquals("", $result->data);
        $this->assertEquals("404", $result->status);
    }

    public function test200()
    {

        $resultRaw = file_get_contents($this->API_URL . "?q=www.google.com");

        $result = json_decode($resultRaw);

        $this->assertEquals("13393432720800511574211132473380700160", $result->data);
        $this->assertEquals("200", $result->status);
    }

}
