<?php

namespace Pyz\Zed\Antelope\Communication\Controller;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Business\AntelopeFacadeInterface;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * @method AntelopeFacadeInterface getFacade()
 */
class AddController extends AbstractController
{
    public function indexAction(): array
    {
        $antelopeTransfer = new AntelopeTransfer();
        $antelopeTransfer->setName('Oskar');
        $antelopeTransfer->setColor('wheat');

        $antelopeResponseTransfer = $this->getFacade()
            ->getAntelope((new AntelopeCriteriaTransfer())->setName($antelopeTransfer->getName()));

        if (!$antelopeResponseTransfer->getAntelope()) {
            $antelopeTransfer = $this->getFacade()
                ->createAntelope($antelopeTransfer);
        }

        return $this->viewResponse([
            'antelope' => $antelopeTransfer,
        ]);
    }
}
