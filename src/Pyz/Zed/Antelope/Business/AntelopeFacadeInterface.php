<?php

namespace Pyz\Zed\Antelope\Business;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationResponseTransfer;
use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Generated\Shared\Transfer\AntelopeResponseTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;

interface AntelopeFacadeInterface
{
    /**
     * Specification:
     * - Creates a new antelope into the database
     *
     * @api
     *
     * @param AntelopeTransfer $antelopeTransfer
     *
     * @return AntelopeTransfer
     */
    public function createAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer;
    public function getAntelope(AntelopeCriteriaTransfer $antelopeCriteria): AntelopeResponseTransfer;
    public function getAntelopeLocation(AntelopeLocationCriteriaTransfer $antelopeCriteria): AntelopeLocationResponseTransfer;
    public function getAntelopeByLocation(AntelopeLocationCriteriaTransfer $antelopeCriteria): AntelopeResponseTransfer;
    public function createAntelopeLocation(AntelopeLocationTransfer $antelopeTransfer): AntelopeLocationTransfer;
}
