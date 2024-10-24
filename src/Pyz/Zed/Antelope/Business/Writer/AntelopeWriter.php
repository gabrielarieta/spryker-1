<?php

namespace Pyz\Zed\Antelope\Business\Writer;

use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Persistence\AntelopeEntityManagerInterface;

class AntelopeWriter
{
    protected AntelopeEntityManagerInterface $antelopeEntityManager;

    public function __construct(AntelopeEntityManagerInterface $antelopeEntityManager)
    {
        $this->antelopeEntityManager = $antelopeEntityManager;
    }

    public function create(AntelopeTransfer $antelopeTransfer): AntelopeTransfer
    {
        return $this->antelopeEntityManager->createAntelope($antelopeTransfer);
    }
}
