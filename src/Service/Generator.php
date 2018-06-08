<?php declare(strict_types = 1);

namespace Searchmetrics\SeniorTest\Service;

use Searchmetrics\SeniorTest\Network\OtherUrlIdGenerator;

class Generator
{
    private $generator;

    public function __construct(OtherUrlIdGenerator $generator)
    {
        $this->generator = $generator;
    }

    protected function generate(string $url) : string
    {
        return $this->generator->generate($url);
    }
}
