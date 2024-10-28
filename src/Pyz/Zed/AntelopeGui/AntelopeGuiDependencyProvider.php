<?php

namespace Pyz\Zed\AntelopeGui;

use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Orm\Zed\AntelopeLocation\Persistence\PyzAntelopeLocationQuery;
use Spryker\Service\Container\Exception\ContainerException;
use Spryker\Service\Container\Exception\FrozenServiceException;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AntelopeGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PROPEL_QUERY_ANTELOPE = 'PROPEL_QUERY_ANTELOPE';
    public const PROPEL_QUERY_ANTELOPE_LOCATION = 'PROPEL_QUERY_ANTELOPE_LOCATION';
    public const FACADE_ANTELOPE = 'FACADE_ANTELOPE';

    /**
     * @throws FrozenServiceException
     * @throws ContainerException
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container = $this->addAntelopeFacade($container);
        $container = $this->addAntelopeLocationPropelQuery($container);
        return $this->addAntelopePropelQuery($container);
    }

    /**
     * @throws FrozenServiceException
     */
    protected function addAntelopeFacade(Container $container): Container
    {
        $container->set(static::FACADE_ANTELOPE, function (Container $container) {
            return $container->getLocator()->antelope()->facade();
        });

        return $container;
    }

    /**
     * @throws FrozenServiceException
     * @throws ContainerException
     */
    protected function addAntelopePropelQuery(Container $container): Container
    {
        $container->set(static::PROPEL_QUERY_ANTELOPE, $container->factory(function () {
            return PyzAntelopeQuery::create();
        }));

        return $container;
    }

    /**
     * @throws FrozenServiceException
     * @throws ContainerException
     */
    protected function addAntelopeLocationPropelQuery(Container $container
    ): Container {
        $container->set(static::PROPEL_QUERY_ANTELOPE_LOCATION,
            $container->factory(function () {
                return PyzAntelopeLocationQuery::create();
            }));

        return $container;
    }
}
