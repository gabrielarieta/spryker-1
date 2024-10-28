<?php

namespace Pyz\Zed\AntelopeLocationGui;

use Orm\Zed\AntelopeLocation\Persistence\PyzAntelopeLocationQuery;
use Spryker\Service\Container\Exception\ContainerException;
use Spryker\Service\Container\Exception\FrozenServiceException;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AntelopeLocationGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PROPEL_QUERY_ANTELOPE_LOCATION = 'PROPEL_QUERY_ANTELOPE_LOCATION';
    public const FACADE_ANTELOPE_LOCATION = 'FACADE_ANTELOPE';

    /**
     * @throws FrozenServiceException
     * @throws ContainerException
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container = $this->addAntelopeLocationFacade($container);
        return $this->addAntelopeLocationPropelQuery($container);
    }

    /**
     * @throws FrozenServiceException
     */
    protected function addAntelopeLocationFacade(Container $container): Container
    {
        $container->set(static::FACADE_ANTELOPE_LOCATION, function (Container $container) {
            return $container->getLocator()->antelope()->facade();
        });

        return $container;
    }

    /**
     * @throws FrozenServiceException
     * @throws ContainerException
     */
    protected function addAntelopeLocationPropelQuery(Container $container): Container
    {
        $container->set(static::PROPEL_QUERY_ANTELOPE_LOCATION, $container->factory(function () {
            return PyzAntelopeLocationQuery::create();
        }));

        return $container;
    }
}
