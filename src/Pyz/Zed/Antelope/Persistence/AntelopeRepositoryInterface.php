<?php

namespace Pyz\Zed\Antelope\Persistence;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Generated\Shared\Transfer\PyzAntelopeLocationEntityTransfer;

interface AntelopeRepositoryInterface
{
    public function getAntelope(AntelopeCriteriaTransfer $antelopeCriteria): ?AntelopeTransfer;

    public function getAntelopeByLocation(AntelopeLocationCriteriaTransfer $antelopeLocationCriteria): ?AntelopeLocationCriteriaTransfer;

}

