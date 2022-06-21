<?php declare(strict_types=1);

namespace PandaGroup\SubunoApi\Contract;

interface FactoryInterface
{
    public function create(string $dataObject, array $arguments = []): DataObjectInterface;
}