<?php declare(strict_types = 1);

namespace Searchmetrics\SeniorTest\Tests\Network;

use PHPUnit\Framework\TestCase;
use Searchmetrics\SeniorTest\Network\OtherUrlIdGenerator;
use Searchmetrics\SeniorTest\Network\UrlIdGenerator;

final class OtherUrlIdGeneratorTest extends TestCase
{
    /**
     * @test
     */
    public function instantiation_works() : void
    {
        $generator = new OtherUrlIdGenerator();

        self::assertInstanceOf(OtherUrlIdGenerator::class, $generator);
        self::assertInstanceOf(UrlIdGenerator::class, $generator);
    }

    /**
     * @return mixed[]
     */
    public function provideGeneratorExpectations() : array
    {
        return [
            ['www.google.com', '13393432720800511574211132473380700160'],
            ['www.yahoo.com', '35906507393840668390183751778631155712'],
            ['www.facebook.com', '135597657065186435813402867854980677632']
        ];

        return $providers;
    }

    /**
     * @test
     * @dataProvider provideGeneratorExpectations
     */
    public function generate_withValidUrl_returnsUrlId(string $url, string $expectedId) : void
    {
        $generatedId = (new OtherUrlIdGenerator())->generate($url);

        self::assertSame(
            $expectedId,
            $generatedId,
            \sprintf('Expected URL ID generator to return ID [%s], got [%s] instead.', $expectedId, $generatedId)
        );
    }

}
