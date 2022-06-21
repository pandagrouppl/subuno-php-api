<?php declare(strict_types=1);

namespace PandaGroup\SubunoApi\DataObject;

use PandaGroup\SubunoApi\Contract\DataObjectInterface;

abstract class AbstractDataObject implements DataObjectInterface
{
    public function __construct(array $data)
    {
        foreach ($this->map() as $property => $apiName) {
            if (isset($data[$property])) {
                $this->{$property} = $data[$property];
            }
        }
    }
}