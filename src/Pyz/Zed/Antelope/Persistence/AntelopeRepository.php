<?php

namespace Pyz\Zed\Antelope\Persistence;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;
use Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException;

/**
 * @method \Pyz\Zed\Antelope\Persistence\AntelopePersistenceFactory getFactory()
 */
class AntelopeRepository extends AbstractRepository implements AntelopeRepositoryInterface
{

    /**
     * @throws AmbiguousComparisonException
     */
    public function getAntelope(AntelopeCriteriaTransfer $antelopeCriteria): ?AntelopeTransfer
    {
        $antelopeEntity = $this->getFactory()
            ->createAntelopeQuery()
            ->filterByName($antelopeCriteria->getName())
            ->findOne();

        if (!$antelopeEntity) {
            return null;
        }

        $antelopeTransfer = new AntelopeTransfer();
        return $antelopeTransfer->fromArray($antelopeEntity->toArray(), true);
    }

    /**
     * @throws AmbiguousComparisonException
     */
    public function getAntelopeByLocation(AntelopeLocationCriteriaTransfer $antelopeLocationCriteria): ?AntelopeTransfer
    {
        $antelopeEntity = $this->getFactory()
            ->createAntelopeQuery()
            ->filterByIdLocation($antelopeLocationCriteria->getIdAntelopeLocation())
            ->findOne();

        $antelopeTransfer = new AntelopeTransfer();
        return $antelopeTransfer->fromArray($antelopeEntity->toArray(), true);
    }

    /**
     * @throws AmbiguousComparisonException
     */
    public function getAntelopeLocation(AntelopeLocationCriteriaTransfer $antelopeLocationCriteria): ?AntelopeLocationTransfer
    {
        $antelopeEntity = $this->getFactory()
            ->createAntelopeLocationQuery()
            ->filterByLocationName($antelopeLocationCriteria->getLocationName())
            ->findOne();

        if (!$antelopeEntity) {
            return null;
        }

        $antelopeTransfer = new AntelopeLocationTransfer();
        return $antelopeTransfer->fromArray($antelopeEntity->toArray(), true);
    }
}
