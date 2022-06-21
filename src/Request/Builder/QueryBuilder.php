<?php declare(strict_types=1);

namespace PandaGroup\SubunoApi\Request\Builder;

use PandaGroup\SubunoApi\Contract\DataObjectInterface;

class QueryBuilder
{
    /**
     * @var DataObjectInterface[]
     */
    private array $dataObjects;

    public function __construct(array $dataObjects = [])
    {
        $this->dataObjects = $dataObjects;
    }

    public function add(DataObjectInterface $dataObject): void
    {
        $this->dataObjects[] = $dataObject;
    }

    public function build(): array
    {
        $query = [];
        foreach ($this->dataObjects as $dataObject) {
            foreach ($dataObject->map() as $property => $param) {
                $query[$param] = $dataObject->get($property);
            }
        }

        return $query;
    }
}