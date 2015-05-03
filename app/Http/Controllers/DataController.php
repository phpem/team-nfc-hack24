<?php

namespace Teamnfc\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
//use Illuminate\Support\Facades\Request;
//use Illuminate\Support\Facades\Route;
use Teamnfc\Services\Data;

class DataController extends Controller {

    protected $dataService;

    /**
     * @param Data $dataService
     */
    public function __construct(Data $dataService)
    {
        $this->dataService = $dataService;
        dd(Route::current()->getParameter('userId'));
        $this->dataService->setUserId(Request::input('userId'));
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

    public function overall($userId, $criteria)
    {
        return new JsonResponse(
            $this->dataService->getOverall($userId, $criteria)
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