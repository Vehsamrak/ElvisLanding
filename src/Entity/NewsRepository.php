<?php

namespace Entity;

use Vehsamrak\Vehsa\AbstractRepository;

/**
 * @author Vehsamrak
 */
class NewsRepository extends AbstractRepository
{

    /**
     * @param int $newsCount
     * @return array|News[]
     */
    public function findLastSortedByDate(int $newsCount): array
    {
        $queryResults = $this->connection->prepare('
            SELECT n.id, n.title, n.text, n.date, a.name as authorName, a.login as authorLogin
            FROM news n 
            LEFT JOIN authors a ON a.login = n.author
            ORDER BY date DESC LIMIT :newsCount
        ');
        
        $queryResults->bindParam('newsCount', $newsCount, \PDO::PARAM_INT);
        $queryResults->execute();

        $queryResults = $queryResults->fetchAll(\PDO::FETCH_ASSOC);

        $newsCollection = [];

        if ($queryResults) {
            foreach ($queryResults as $result) {
                $news = new News(
                    $result['date'],
                    $result['authorLogin'],
                    $result['authorName'],
                    $result['title'],
                    $result['text']
                );
                $news->setId($result['id']);
                
                $newsCollection[] = $news;
            }
        }

        return $newsCollection;
    }

    /**
     * Persist news post to database
     * @param News $news
     * @return bool
     */
    public function save(News $news)
    {
        if ($news->isNew()) {
            $queryResults = $this->connection->prepare('
            INSERT INTO news (`title`, `author`, `text`, `date`) 
            VALUES (:title, :authorLogin, :text, :currentDate)
        ');

            $title = $news->getTitle();
            $authorLogin = $news->getAuthorLogin();
            $text = $news->getText();
            $date = $news->getDate();

            $queryResults->bindParam('title', $title, \PDO::PARAM_STR);
            $queryResults->bindParam('authorLogin', $authorLogin, \PDO::PARAM_STR);
            $queryResults->bindParam('text', $text, \PDO::PARAM_STR);
            $queryResults->bindParam('currentDate', $date, \PDO::PARAM_STR);

            return $queryResults->execute();
        }

        return false;
    }
}
