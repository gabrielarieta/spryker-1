<?php

namespace Pyz\Zed\Antelope\Communication\Controller;

use Generated\Shared\Transfer\AntelopeLocationCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * @method AntelopeFacadeInterface getFacade()
 */class AddLocationController extends AbstractController
{
    public function indexAction(): array
    {
        $antelopeTransfer = new AntelopeLocationTransfer();
        $antelopeTransfer->setLocationName('Austria');

        $antelopeResponseTransfer = $this->getFacade()
            ->getAntelopeLocation((new AntelopeLocationCriteriaTransfer())->setLocationName($antelopeTransfer->getLocationName()));

        if (!$antelopeResponseTransfer->getAntelopeLocation()) {
            $antelopeTransfer = $this->getFacade()
                ->createAntelopeLocation($antelopeTransfer);
        }

        return $this->viewResponse([
            'antelopeLocation' => $antelopeTransfer,
        ]);
    }
}
