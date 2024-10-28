<?php

namespace Pyz\Zed\AntelopeGui\Communication\Table;

use Orm\Zed\Antelope\Persistence\Map\PyzAntelopeTableMap;
use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Orm\Zed\AntelopeLocation\Persistence\Map\PyzAntelopeLocationTableMap;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class AntelopeTable extends AbstractTable
{

    public const COL_ID_ANTELOPE = 'id_antelope';

    public const COL_NAME = 'name';
    public const COL_COLOR = 'color';
    public const COL_LOCATION_NAME = 'location_name';

    private PyzAntelopeQuery $antelopeQuery;

    public function __construct(PyzAntelopeQuery $antelopeQuery)
    {
        $this->antelopeQuery = $antelopeQuery;
    }

    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            static::COL_ID_ANTELOPE => 'Antelope ID',
            static::COL_NAME => 'Name',
            static::COL_COLOR => 'Color',
            static::COL_LOCATION_NAME => 'Location',
        ]);

        $config->setSortable([
            static::COL_ID_ANTELOPE,
            static::COL_NAME,
            static::COL_COLOR,
            static::COL_LOCATION_NAME,
        ]);

        $config->setSearchable([
            PyzAntelopeTableMap::COL_NAME,
            PyzAntelopeTableMap::COL_COLOR,
            PyzAntelopeLocationTableMap::COL_LOCATION_NAME,
        ]);

        return $config;
    }

    protected function prepareData(TableConfiguration $config): array
    {
        $antelopeEntityCollection = $this->runQuery(
            $this->antelopeQuery,
            $config,
            true
        );

        if (!$antelopeEntityCollection->count()) {
            return [];
        }

        return $this->mapReturns($antelopeEntityCollection);
    }

    /**
     * @param ObjectCollection $antelopeEntityCollection
     *
     * @return array
     */
    protected function mapReturns(ObjectCollection $antelopeEntityCollection): array
    {
        foreach ($antelopeEntityCollection as $antelopeEntity) {
            $location = $antelopeEntity->getPyzAntelopeLocation();
            $data[static::COL_ID_ANTELOPE] = $antelopeEntity->getIdAntelope();
            $data[static::COL_NAME] = $antelopeEntity->getName();
            $data[static::COL_COLOR] = $antelopeEntity->getColor();
            $data[static::COL_LOCATION_NAME] = $location->getLocationName();
            $returns[] = $data;
        }

        return $returns;
    }

}
