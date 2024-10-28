<?php

namespace Pyz\Zed\AntelopeLocationGui\Communication\Table;

use Orm\Zed\Antelope\Persistence\Map\PyzAntelopeTableMap;
use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Orm\Zed\AntelopeLocation\Persistence\Map\PyzAntelopeLocationTableMap;
use Orm\Zed\AntelopeLocation\Persistence\PyzAntelopeLocationQuery;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class AntelopeLocationTable extends AbstractTable
{

    public const COL_ID_ANTELOPE_LOCATION = 'id_antelope_location';

    public const COL_LOCATION_NAME = 'location_name';
    private PyzAntelopeLocationQuery $antelopeQuery;

    public function __construct(PyzAntelopeLocationQuery $antelopeQuery)
    {
        $this->antelopeQuery = $antelopeQuery;
    }

    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            static::COL_ID_ANTELOPE_LOCATION => 'ID',
            static::COL_LOCATION_NAME => 'Name',
        ]);

        $config->setSortable([
            static::COL_ID_ANTELOPE_LOCATION,
            static::COL_LOCATION_NAME,
        ]);

        $config->setSearchable([
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
        $returns = [];

        foreach ($antelopeEntityCollection as $antelopeEntity) {
            $returns[] = $antelopeEntity->toArray();
        }

        return $returns;
    }

}
