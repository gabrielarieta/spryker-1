<?php

namespace Pyz\Zed\AntelopeGui\Communication;

use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Orm\Zed\AntelopeLocation\Persistence\PyzAntelopeLocationQuery;
use Pyz\Zed\AntelopeGui\AntelopeGuiDependencyProvider;
use Pyz\Zed\AntelopeGui\Communication\Form\AntelopeCreateForm;
use Pyz\Zed\AntelopeGui\Communication\Table\AntelopeTable;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Symfony\Component\Form\FormInterface;

class AntelopeGuiCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @throws ContainerKeyNotFoundException
     */
    public function createAntelopeTable(): AntelopeTable
    {
        return new AntelopeTable($this->getAntelopePropelQuery());
    }

    public function createAntelopeCreateForm(AntelopeTransfer $antelopeTransfer, array $options = []): FormInterface
    {
        return $this->getFormFactory()->create(AntelopeCreateForm::class, $antelopeTransfer, $options);
    }

    /**
     * @throws ContainerKeyNotFoundException
     */
    public function getAntelopeFacade(): AntelopeFacadeInterface
    {
        return $this->getProvidedDependency(AntelopeGuiDependencyProvider::FACADE_ANTELOPE);
    }

    /**
     * @throws ContainerKeyNotFoundException
     */
    public function getAntelopePropelQuery(): PyzAntelopeQuery
    {
        return $this->getProvidedDependency(AntelopeGuiDependencyProvider::PROPEL_QUERY_ANTELOPE);
    }

    /**
     * @throws ContainerKeyNotFoundException
     */
    public function getAntelopeLocationPropelQuery(): PyzAntelopeLocationQuery
    {
        return $this->getProvidedDependency(AntelopeGuiDependencyProvider::PROPEL_QUERY_ANTELOPE_LOCATION);
    }
}
