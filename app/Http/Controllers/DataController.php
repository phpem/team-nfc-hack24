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

    public function votesAll($userId)
    {
        return new JsonResponse(
            $this->dataService->getVotesAll($userId)
        );
    }

    public function votesPositive($userId)
    {
        return new JsonResponse(
            $this->dataService->getVotesPositive($userId)
        );
    }

    public function votesNegative($userId)
    {
        return new JsonResponse(
            $this->dataService->getVotesNegative($userId)
        );
    }

    public function votesNeutral($userId)
    {
        return new JsonResponse(
            $this->dataService->getVotesNeutral($userId)
        );
    }

    public function rank($orgId = null)
    {
        return new JsonResponse(
            $this->dataService->getRank($orgId)
        );
    }

    public function most($userId, $type)
    {
        return new JsonResponse(
            $this->dataService->getMost($userId, $type)
        );
    }

    public function radar($userId)
    {
        return new JsonResponse(
            $this->dataService->getRadar($userId)
        );
    }

    public function getPositivePercentPerCriteria($userId)
    {
        return new JsonResponse(
            $this->dataService->getPositivePercentPerCriteria($userId)
        );
    }

    public function getAverageScorePerCriteria($userId)
    {
        return new JsonResponse(
            $this->dataService->getAverageScorePerCriteria($userId)
        );
    }

}