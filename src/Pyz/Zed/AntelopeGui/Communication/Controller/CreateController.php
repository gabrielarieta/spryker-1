<?php

namespace Pyz\Zed\AntelopeGui\Communication\Controller;

use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\AntelopeGui\Communication\AntelopeGuiCommunicationFactory;
use Pyz\Zed\AntelopeGui\Communication\Form\AntelopeCreateForm;
use Spryker\Service\UtilText\Model\Url\Url;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method AntelopeGuiCommunicationFactory getFactory()
 */
class CreateController extends AbstractController
{

    protected const URL_ANTELOPE_OVERVIEW = '/antelope-gui';

    protected const MESSAGE_ANTELOPE_CREATED_SUCCESS = 'Antelope was successfully created.';

    /**
     * @throws ContainerKeyNotFoundException
     */
    public function indexAction(Request $request): array|RedirectResponse
    {
        $antelopeCreateForm = $this->getFactory()
            ->createAntelopeCreateForm(new AntelopeTransfer())
            ->handleRequest($request);

        if ($antelopeCreateForm->isSubmitted() && $antelopeCreateForm->isValid()) {
            return $this->createAntelope($antelopeCreateForm);
        }

        return $this->viewResponse([
            'antelopeCreateForm' => $antelopeCreateForm->createView(),
            'backUrl' => $this->getAntelopeOverviewUrl(),
        ]);
    }

    /**
     * @throws ContainerKeyNotFoundException
     */
    protected function createAntelope(FormInterface $antelopeCreateForm): RedirectResponse
    {
        /** @var AntelopeTransfer|null $antelopeTransfer */
        $antelopeTransfer = $antelopeCreateForm->getData();

        $antelopeTransfer = $this->getFactory()
            ->getAntelopeFacade()
            ->createAntelope($antelopeTransfer);

        $this->addSuccessMessage(static::MESSAGE_ANTELOPE_CREATED_SUCCESS);

        return $this->redirectResponse($this->getAntelopeOverviewUrl());
    }

    protected function getAntelopeOverviewUrl(): string
    {
        return (string)Url::generate(static::URL_ANTELOPE_OVERVIEW);
    }

    /**
     * @throws ContainerKeyNotFoundException
     */
    public function getAntelopeLocations(): array
    {
        $res = [];
        $result = $this->getFactory()->getAntelopeLocationPropelQuery()
            ->orderBy('location_name')->find();
        foreach ($result as $location) {
            $res[$location->getIdAntelopeLocation()] = $location->getLocationName();
        }
        return $res;
    }
}
