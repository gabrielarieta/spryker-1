<?php

namespace Pyz\Zed\Antelope\Persistence;

use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;

interface AntelopeEntityManagerInterface
{
    public function createOrUpdateAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer;

    public function createOrUpdateAntelopeLocation(AntelopeLocationTransfer $antelopeLocationTransfer): AntelopeLocationTransfer;

}
