<?php

namespace Service;

use Exception\AuthorNotFound;
use Vehsamrak\Vehsa\Database;
use Entity\News;
use Entity\NewsRepository;
use Entity\AuthorRepository;

/**
 * @author Vehsamrak
 */
class NewsProcessor
{

    /** @var NewsRepository */
    private $newsRepository;

    /** @var AuthorRepository */
    private $authorRepository;

    /**
     * @param NewsRepository|null   $newsRepository
     * @param AuthorRepository|null $authorRepository
     */
    public function __construct(NewsRepository $newsRepository = null, AuthorRepository $authorRepository = null)
    {

        if (!$newsRepository || !$authorRepository) {
            $connection = (new Database())->getConnection();
            $this->newsRepository = $newsRepository ? $newsRepository : new NewsRepository($connection);
            $this->authorRepository = $authorRepository ? $authorRepository : new AuthorRepository($connection);
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

    /**
     * @param \DateTimeImmutable $date
     * @param string             $authorLogin
     * @param string             $title
     * @param string             $text
     * @throws AuthorNotFound
     */
    public function addNews(\DateTimeImmutable $date, string $authorLogin, string $title, string $text)
    {
        $author = $this->authorRepository->findOneByLogin($authorLogin);
        
        if (!$author) {
        	throw new AuthorNotFound();
        }

        $news = new News($date->format('Y-m-d'), $authorLogin, $author->getName(), $title, $text);

        $this->newsRepository->persist($news);
    }
}
