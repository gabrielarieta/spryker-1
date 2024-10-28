<?php

namespace Pyz\Zed\AntelopeGui\Communication\Form;

use Pyz\Zed\AntelopeGui\Communication\AntelopeGuiCommunicationFactory;
use Spryker\Zed\Gui\Communication\Form\Type\Select2ComboBoxType;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @method AntelopeGuiCommunicationFactory getFactory()
 */
class AntelopeCreateForm extends AbstractType
{
    public const FIELD_NAME = 'name';
    public const FIELD_COLOR = 'color';
    public const FIELD_LOCATION = 'id_location';

    public function getBlockPrefix(): string
    {
        return 'antelope';
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addNameField($builder)
            ->addColorField($builder)
            ->addLocationField($builder);
    }

    protected function addNameField(FormBuilderInterface $builder): static
    {
        $builder->add(static::FIELD_NAME, TextType::class, [
            'label' => 'Name',
            'constraints' => [
                $this->createNotBlankConstraint(),
            ],
        ]);

        return $this;
    }

    protected function addColorField(FormBuilderInterface $builder): static
    {
        $builder->add(static::FIELD_COLOR, TextType::class, [
            'constraints' => [
                $this->createNotBlankConstraint(),
            ],
        ]);

        return $this;
    }

    /**
     * @throws ContainerKeyNotFoundException
     */
    protected function addLocationField(FormBuilderInterface $builder): static
    {
        $choices = $this->getAntelopeLocations();
        $builder->add(static::FIELD_LOCATION, Select2ComboBoxType::class, [
                'label' => 'Location',
                'placeholder' => 'Choose a location',
                'choices' => array_flip($choices),
            ]);
        return $this;
    }
    protected function createNotBlankConstraint(): NotBlank
    {
        return new NotBlank();
    }

    /**
     * @throws ContainerKeyNotFoundException
     */
    protected function getAntelopeLocations(): array
    {
        $res = [];
        $result = $this->getFactory()->getAntelopeLocationPropelQuery()
            ->orderBy('location_name')->find();
        foreach ($result as $location) {
            $res[$location->getIdAntelopeLocation()] = $location->getLocationName();
        }
        return $res;
    }
}
