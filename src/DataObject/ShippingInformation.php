<?php declare(strict_types=1);

namespace PandaGroup\SubunoApi\DataObject;

use Symfony\Component\Validator\Constraints as Assert;

class ShippingInformation extends AbstractDataObject
{
    /**
     * @Assert\NotBlank()
     */
    protected string $shipName;

    /**
     * @Assert\NotBlank()
     */
    protected string $shipPhone;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected string $shipEmail;

    /**
     * @Assert\NotBlank()
     */
    protected string $shipStreetOne;

    /**
     * @Assert\NotNull()
     */
    protected string $shipStreetTwo;

    /**
     * @Assert\NotBlank()
     */
    protected string $shipCity;

    /**
     * @Assert\NotNull()
     */
    protected string $shipState;

    /**
     * @Assert\NotBlank()
     * @Assert\Country()
     */
    protected string $shipCountry;

    /**
     * @Assert\NotBlank()
     */
    protected string $shipZip;

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
            'shipName' => 'ship_name',
            'shipPhone' => 'ship_phone',
            'shipEmail' => 'ship_email',
            'shipStreetOne' => 'ship_street1',
            'shipStreetTwo' => 'ship_street2',
            'shipCity' => 'ship_city',
            'shipState' => 'ship_state',
            'shipCountry' => 'ship_country',
            'shipZip' => 'ship_zip',
        ];
    }

    public function apiFields(): array
    {
        return array_values($this->map());
    }
}