<?php

namespace Pyz\Zed\Antelope\Business\Reader;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationResponseTransfer;
use Generated\Shared\Transfer\AntelopeResponseTransfer;
use Pyz\Zed\Antelope\Persistence\AntelopeRepositoryInterface;

class AntelopeReader
{
    /**
     * @var AntelopeRepositoryInterface
     */
    protected AntelopeRepositoryInterface $trainingRepository;

    public function __construct(AntelopeRepositoryInterface $trainingRepository)
    {
        $this->trainingRepository = $trainingRepository;
    }

    public function getAntelope(AntelopeCriteriaTransfer $antelopeCriteria): AntelopeResponseTransfer
    {
        $antelopeTransfer = $this->trainingRepository
            ->getAntelope($antelopeCriteria);

        $antelopeResponseTransfer = new AntelopeResponseTransfer();
        $antelopeResponseTransfer
            ->setIsSuccessful(false);

        if ($antelopeTransfer) {
            $antelopeResponseTransfer
                ->setAntelope($antelopeTransfer)
                ->setIsSuccessful(true);
        }

        return $antelopeResponseTransfer;

    }

    public function getAntelopeLocation(AntelopeLocationCriteriaTransfer $antelopeCriteria): AntelopeLocationResponseTransfer {
        $antelopeTransfer = $this->trainingRepository
            ->getAntelopeLocation($antelopeCriteria);

        $antelopeResponseTransfer = new AntelopeLocationResponseTransfer();
        $antelopeResponseTransfer
            ->setIsSuccessful(false);

        if ($antelopeTransfer) {
            $antelopeResponseTransfer
                ->setAntelopeLocation($antelopeTransfer)
                ->setIsSuccessful(true);
        }

        return $antelopeResponseTransfer;
    }

    public function getAntelopeByLocation(AntelopeLocationCriteriaTransfer $antelopeCriteria): AntelopeResponseTransfer
    {
        $antelopeTransfer = $this->trainingRepository
            ->getAntelopeByLocation($antelopeCriteria);

        $antelopeResponseTransfer = new AntelopeResponseTransfer();
        $antelopeResponseTransfer
            ->setIsSuccessful(false);

        if ($antelopeTransfer) {
            $antelopeResponseTransfer
                ->setAntelope($antelopeTransfer)
                ->setIsSuccessful(true);
        }

        return $antelopeResponseTransfer;
    }
}
