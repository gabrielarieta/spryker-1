<?php

namespace Pyz\Zed\Antelope\Persistence;

use Generated\Shared\Transfer\AntelopeLocationCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Generated\Shared\Transfer\PyzAntelopeLocationEntityTransfer;

interface AntelopeEntityManagerInterface
{
    public function createOrUpdateAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer;

    public function createOrUpdateAntelopeLocation(AntelopeLocationCriteriaTransfer $antelopeLocationTransfer): AntelopeLocationCriteriaTransfer;

}
