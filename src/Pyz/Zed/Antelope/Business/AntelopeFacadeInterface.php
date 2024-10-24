<?php

namespace Pyz\Zed\Antelope\Business;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
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
}
