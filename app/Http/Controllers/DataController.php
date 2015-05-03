<?php

namespace Teamnfc\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Teamnfc\Services\Data;

class DataController extends Controller {

    protected $dataService;

    /**
     * @param Data $dataService
     */
    public function __construct(Data $dataService)
    {
        $this->dataService = $dataService;
    }


    public function index()
    {

    }

    public function user($userId)
    {
        return new JsonResponse(
            $this->dataService->getData($userId)
        );
    }

    public function overall($userId, $criteria = null)
    {
        $stats = $this->dataService->getOverall($userId, $criteria);

        return new JsonResponse(
            $stats
        );
    }

    public function positive($userId)
    {
        return new JsonResponse(
            $this->dataService->getPositive($userId)
        );
    }

    public function negative($userId)
    {
        return new JsonResponse(
            $this->dataService->getNegative($userId)
        );
    }

    public function rank($userId, $scope)
    {
        return new JsonResponse(
            $this->dataService->getRank($userId, $scope)
        );
    }

    public function most($userId, $type)
    {
        return new JsonResponse(
            $this->dataService->getMost($userId, $type)
        );
    }

}