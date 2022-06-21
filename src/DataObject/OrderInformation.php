<?php declare(strict_types=1);

namespace PandaGroup\SubunoApi\DataObject;

use Symfony\Component\Validator\Constraints as Assert;

class OrderInformation extends AbstractDataObject
{
    /**
     * @Assert\NotBlank()
     */
    protected string $transactionId;

    /**
     * @Assert\Ip()
     */
    protected string $ipAddr;

    /**
     * @Assert\GreaterThan(value="0.0")
     */
    protected float $price;

    /**
     * @Assert\Length(value="6", allowEmptyString="true")
     */
    protected string $iin;

    /**
     * @Assert\NotNull()
     */
    protected string $avsResponse;

    /**
     * @Assert\NotNull()
     */
    protected string $cvvResponse;

    /**
     * @Assert\NotNull()
     */
    protected string $issuerPhone;

    /**
     * @inheritdoc
     */
    public function get(string $property)
    {
        return $this->{$property} ?? null;
    }

    public function map(): array
    {
        return [
            'transactionId' => 't_id',
            'ipAddr' => 'ip_addr',
            'iin' => 'iin',
            'avsResponse' => 'avs_response',
            'cvvResponse' => 'cvv_response',
            'issuerPhone' => 'issuer_phone',
        ];
    }

    public function apiFields(): array
    {
        return array_values($this->map());
    }
}