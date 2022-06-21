<?php declare(strict_types=1);

namespace PandaGroup\SubunoApi\Contract;

interface ConfigInterface
{
    /**
     * Fully qualified domain address with protocol, example: https://api.subuno.com
     * @return string
     */
    public function getBaseUri(): string;

    /**
     * API version of Subuno, example: v1
     * @return string
     */
    public function getApiVersion(): string;

    /**
     * Source name, only 'API' supported
     * @return string
     */
    public function getSource(): string;

    /**
     * Subuno API license key
     * @return string
     */
    public function getApiKey(): string;
}