<?php

namespace Pyz\Zed\AntelopeLocationGui\Communication\Form;

use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class AntelopeLocationCreateForm extends AbstractType
{
    public const FIELD_LOCATION_NAME = 'location_name';

    public function getBlockPrefix(): string
    {
        return 'antelope-location';
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addNameField($builder);
    }

    protected function addNameField(FormBuilderInterface $builder): static
    {
        $builder->add(static::FIELD_LOCATION_NAME, TextType::class, [
            'label' => 'Name',
            'constraints' => [
                $this->createNotBlankConstraint(),
            ],
        ]);

        return $this;
    }

    protected function createNotBlankConstraint(): NotBlank
    {
        return new NotBlank();
    }
}
