<?php declare(strict_types=1);

namespace PandaGroup\SubunoApi\DataObject\Factory;

use PandaGroup\SubunoApi\Contract\DataObjectInterface;
use PandaGroup\SubunoApi\Contract\FactoryInterface;
use PandaGroup\SubunoApi\Exception\DataObjectException;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Factory implements FactoryInterface
{
    private ?ValidatorInterface $validator = null;

    /**
     * @throws DataObjectException
     */
    public function create(string $dataObject, array $arguments = []): DataObjectInterface
    {
        $dataObject = new $dataObject($arguments);
        $this->validate($dataObject);

        return $dataObject;
    }

    /**
     * @throws DataObjectException
     */
    private function validate(DataObjectInterface $dataObject): void
    {
        $violations = $this->getValidator()->validate($dataObject);
        if (0 === $violations->count()) {
            return;
        }

        $offset = 0;
        $message = '';
        while ($offset < $violations->count()) {
            $message .= 'Field ' . $violations->get($offset)->getPropertyPath() . ': ' . $violations->get($offset)->getMessage() . PHP_EOL;
            ++$offset;
        }

        throw new DataObjectException($message);
    }

    private function getValidator(): ValidatorInterface
    {
        if (null === $this->validator) {
            $this->validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
        }

        return $this->validator;
    }
}