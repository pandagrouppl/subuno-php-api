<?php declare(strict_types=1);

namespace PandaGroup\SubunoApi\Config;

use PandaGroup\SubunoApi\Contract\ConfigInterface;

abstract class AbstractConfig implements ConfigInterface
{
    private const API_VERSION = 'v1';
    private const API_SOURCE = 'API';

    public function getApiVersion(): string
    {
        return self::API_VERSION;
    }

    final public function getSource(): string
    {
        return self::API_SOURCE;
    }
}