<?php declare(strict_types=1);

namespace PandaGroup\SubunoApi\DataObject;

use Symfony\Component\Validator\Constraints as Assert;

class BillingInformation extends AbstractDataObject
{
    /**
     * @Assert\NotBlank()
     */
    protected string $customerName;

    /**
     * @Assert\NotBlank()
     */
    protected string $phone;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected string $email;

    /**
     * @Assert\NotNull()
     */
    protected string $company;

    /**
     * @Assert\NotBlank()
     */
    protected string $billStreetOne;

    /**
     * @Assert\NotNull()
     */
    protected string $billStreetTwo;

    /**
     * @Assert\NotBlank()
     */
    protected string $billCity;

    /**
     * @Assert\NotNull()
     */
    protected string $billState;

    /**
     * @Assert\NotBlank()
     * @Assert\Country()
     */
    protected string $billCountry;

    /**
     * @Assert\NotBlank()
     */
    protected string $billZip;

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
            'customerName' => 'customer_name',
            'phone' => 'phone',
            'email' => 'email',
            'company' => 'company',
            'billStreetOne' => 'bill_street1',
            'billStreetTwo' => 'bill_street2',
            'billCity' => 'bill_city',
            'billState' => 'bill_state',
            'billCountry' => 'bill_country',
            'billZip' => 'bill_zip',
        ];
    }

    public function apiFields(): array
    {
        return array_values($this->map());
    }
}