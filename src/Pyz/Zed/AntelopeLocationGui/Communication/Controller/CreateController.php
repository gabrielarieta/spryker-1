<?php

namespace Pyz\Zed\AntelopeLocationGui\Communication\Controller;

use Generated\Shared\Transfer\AntelopeLocationTransfer;
use Pyz\Zed\AntelopeLocationGui\Communication\AntelopeLocationGuiCommunicationFactory;
use Spryker\Service\UtilText\Model\Url\Url;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method AntelopeLocationGuiCommunicationFactory getFactory()
 */
class CreateController extends AbstractController
{

    protected const URL_ANTELOPE_OVERVIEW = '/antelope-location-gui';

    protected const MESSAGE_ANTELOPE_CREATED_SUCCESS = 'Antelope Location was successfully created.';

    /**
     * @throws ContainerKeyNotFoundException
     */
    public function indexAction(Request $request): array|RedirectResponse
    {
        $antelopeCreateForm = $this->getFactory()
            ->createAntelopeLocationCreateForm(new AntelopeLocationTransfer())
            ->handleRequest($request);

        if ($antelopeCreateForm->isSubmitted() && $antelopeCreateForm->isValid()) {
            return $this->createLocationAntelope($antelopeCreateForm);
        }

        return $this->viewResponse([
            'antelopeLocationCreateForm' => $antelopeCreateForm->createView(),
            'backUrl' => $this->getAntelopeLocationOverviewUrl(),
        ]);
    }

    /**
     * @throws ContainerKeyNotFoundException
     */
    protected function createLocationAntelope(FormInterface $antelopeCreateForm): RedirectResponse
    {
        /** @var AntelopeLocationTransfer|null $antelopeTransfer */
        $antelopeTransfer = $antelopeCreateForm->getData();

        $antelopeTransfer = $this->getFactory()
            ->getAntelopeLocationFacade()
            ->createAntelopeLocation($antelopeTransfer);

        $this->addSuccessMessage(static::MESSAGE_ANTELOPE_CREATED_SUCCESS);

        return $this->redirectResponse($this->getAntelopeLocationOverviewUrl());
    }

    protected function getAntelopeLocationOverviewUrl(): string
    {
        return (string)Url::generate(static::URL_ANTELOPE_OVERVIEW);
    }
}
