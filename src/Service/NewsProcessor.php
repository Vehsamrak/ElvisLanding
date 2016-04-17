<?php

namespace Service;

use Entity\News;
use Entity\NewsRepository;
use Vehsamrak\Vehsa\Database;

/**
 * @author Vehsamrak
 */
class NewsProcessor
{

    /**
     * @var NewsRepository
     */
    private $newsRepository;

    /**
     * @param NewsRepository|null $newsRepository
     */
    public function __construct(NewsRepository $newsRepository = null)
    {
        if ($newsRepository) {
            $this->newsRepository = $newsRepository;
        } else {
            $connection = (new Database())->getConnection();
            $this->newsRepository = new NewsRepository($connection);
        }

    }

    /**
     * @param int $lastNewsCount
     * @return News[]
     */
    public function getLastNews(int $lastNewsCount)
    {
        return $this->newsRepository->findLastSortedByDate($lastNewsCount);
    }
}
