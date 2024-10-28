<?php

namespace Pyz\Zed\AntelopeLocationGui\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController extends AbstractController
{

    public function indexAction(): array
    {
        $table = $this->getFactory()
            ->createAntelopeLocationTable();

        return $this->viewResponse([
            'antelopeLocationTable' => $table->render(),
        ]);
    }

    public function tableAction(): JsonResponse
    {
        $table = $this->getFactory()
            ->createAntelopeLocationTable();

        return $this->jsonResponse($table->fetchData());
    }
}
