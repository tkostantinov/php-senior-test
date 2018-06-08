<?php declare(strict_types = 1);

namespace Searchmetrics\SeniorTest\Network;

use Searchmetrics\SeniorTest\Cache\Cache;

final class OtherUrlIdGenerator extends AbstractUrlIdGenerator
{
    private $urlIds = [];

    protected function generateId(string $url) : string
    {
        return $this->generateUniqueId($url);
    }
}
