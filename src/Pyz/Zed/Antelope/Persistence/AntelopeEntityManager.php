<?php

namespace Pyz\Zed\Antelope\Persistence;

use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Orm\Zed\Antelope\Persistence\PyzAntelope;
use Orm\Zed\AntelopeLocation\Persistence\PyzAntelopeLocation;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

class AntelopeEntityManager extends AbstractEntityManager implements AntelopeEntityManagerInterface
{
    /**
     * @throws PropelException
     */
    public function createOrUpdateAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer
    {
        $antelopeEntity = new PyzAntelope();
        $antelopeEntity->fromArray($antelopeTransfer->modifiedToArray());
        $antelopeEntity->save();

        return $antelopeTransfer->fromArray($antelopeEntity->toArray(), true);
    }

    /**
     * @throws PropelException
     */
    public function createOrUpdateAntelopeLocation(AntelopeLocationTransfer $antelopeLocationTransfer): AntelopeLocationTransfer
    {
        $antelopeLocationEntity = new PyzAntelopeLocation();
        $antelopeLocationEntity->fromArray($antelopeLocationTransfer->modifiedToArray());
        $antelopeLocationEntity->save();

        return $antelopeLocationTransfer->fromArray($antelopeLocationEntity->toArray(), true);
    }
}
