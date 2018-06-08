<?php declare(strict_types = 1);

namespace Searchmetrics\SeniorTest\Network;

use Searchmetrics\SeniorTest\Cache\Cache;

final class PhpUrlIdGenerator extends AbstractUrlIdGenerator
{
    private $urlIds = [];

    public function __construct()
    {
        $urlIdsKey = 'url-hash-map';
        $this->urlIds = Cache::get($urlIdsKey);

        if ($this->urlIds === null) {
            $this->urlIds = $this->getUrlIds(__DIR__ . '/../../db/db.txt');
            Cache::set($urlIdsKey, $this->urlIds);
        }
    }

    protected function generateId(string $url) : string
    {
        $urlId = $this->getUrlIdEntity($url);

        if ($urlId !== null)
            return $urlId[1];

        return $this->generateUniqueId($url);
    }

    private function getUrlIdEntity(string $url)
    {
        foreach($this->urlIds as $i => $urlId)
        {
            if($url === $this->normalizeUrl($urlId[0])) {
                return $this->urlIds[$i];
            }
        }

        return null;
    }


    /**
     * @return mixed[]
     */
    private function getUrlIds($path) : array
    {
        $urlIds = [];

        $file = \fopen($path, 'r');

        if (false !== $file) {
            while (($line = \fgets($file)) !== false) {
                $urlIds[] = \explode("\t|\t", \trim($line));
            }

            \fclose($file);
        }

        return $urlIds;
    }

    private function isUnique(string $url) : bool
    {
        return !isset($this->urlIds[$url]);
    }
}
