<?php

namespace Pyz\Zed\Antelope\Business;

use Generated\Shared\Transfer\AntelopeCriteriaTransfer;
use Generated\Shared\Transfer\AntelopeResponseTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method AntelopeBusinessFactory getFactory()
 */
class AntelopeFacade extends AbstractFacade implements AntelopeFacadeInterface
{

    /**
     * @inheritDoc
     *
     * @param AntelopeTransfer $antelopeTransfer
     *
     * @return AntelopeTransfer
     * /
     * @api
     *
     */
    public function createAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer
    {
        return $this->getFactory()
            ->createAntelopeWriter()
            ->create($antelopeTransfer);
    }

    public function getAntelope(AntelopeCriteriaTransfer $antelopeCriteria): AntelopeResponseTransfer
    {
        return $this->getFactory()
            ->createAntelopeReader()
            ->getAntelope($antelopeCriteria);

    }
}
