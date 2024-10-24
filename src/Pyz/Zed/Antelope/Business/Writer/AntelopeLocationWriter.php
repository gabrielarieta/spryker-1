<?php

namespace Pyz\Zed\Antelope\Business\Writer;

use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Pyz\Zed\Antelope\Persistence\AntelopeEntityManagerInterface;

class AntelopeLocationWriter
{
    protected AntelopeEntityManagerInterface $antelopeEntityManager;

    public function __construct(AntelopeEntityManagerInterface $antelopeEntityManager)
    {
        $this->antelopeEntityManager = $antelopeEntityManager;
    }

    public function create(AntelopeLocationTransfer $antelopeLocationTransfer): AntelopeLocationTransfer
    {
        return $this->antelopeEntityManager->createOrUpdateAntelopeLocation($antelopeLocationTransfer);
    }
}
