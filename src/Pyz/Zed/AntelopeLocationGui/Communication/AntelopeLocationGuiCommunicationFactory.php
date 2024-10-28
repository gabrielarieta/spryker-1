<?php

namespace Pyz\Zed\AntelopeLocationGui\Communication;

use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Orm\Zed\AntelopeLocation\Persistence\PyzAntelopeLocationQuery;
use Pyz\Zed\AntelopeLocationGui\AntelopeLocationGuiDependencyProvider;
use Pyz\Zed\AntelopeLocationGui\Communication\Form\AntelopeLocationCreateForm;
use Pyz\Zed\AntelopeLocationGui\Communication\Table\AntelopeLocationTable;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Symfony\Component\Form\FormInterface;

class AntelopeLocationGuiCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @throws ContainerKeyNotFoundException
     */
    public function createAntelopeLocationTable(): AntelopeLocationTable
    {
        return new AntelopeLocationTable($this->getAntelopeLocationPropelQuery());
    }

    public function createAntelopeLocationCreateForm(AntelopeLocationTransfer $antelopeTransfer, array $options = []): FormInterface
    {
        return $this->getFormFactory()->create(AntelopeLocationCreateForm::class, $antelopeTransfer, $options);
    }

    /**
     * @throws ContainerKeyNotFoundException
     */
    public function getAntelopeLocationFacade(): AntelopeFacadeInterface
    {
        return $this->getProvidedDependency(AntelopeLocationGuiDependencyProvider::FACADE_ANTELOPE_LOCATION);
    }

    /**
     * @throws ContainerKeyNotFoundException
     */
    public function getAntelopeLocationPropelQuery(): PyzAntelopeLocationQuery
    {
        return $this->getProvidedDependency(AntelopeLocationGuiDependencyProvider::PROPEL_QUERY_ANTELOPE_LOCATION);
    }
}
