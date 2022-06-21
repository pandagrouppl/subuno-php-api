<?php declare(strict_types=1);

namespace PandaGroup\SubunoApi\Contract;

interface DataObjectInterface
{
    /**
     * Getter for every property in the class.
     * @param string $property
     * @return mixed|null
     */
    public function get(string $property);

    /**
     * The map method aims to return an array of property names and the corresponding fields in the Subuno API
     * For example: ["transactionId" => "t_id"]
     * @return array
     */
    public function map(): array;

    /**
     * Return array of all API fields that class handles
     * @return array
     */
    public function apiFields(): array;
}