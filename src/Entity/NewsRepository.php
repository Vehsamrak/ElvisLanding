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
            SELECT n.id, n.title, n.text, n.date, a.name as authorName
            FROM news n 
            LEFT JOIN authors a ON a.login = n.author
            ORDER BY date DESC LIMIT :newsCount'
        );
        $queryResults->bindParam('newsCount', $newsCount, \PDO::PARAM_INT);
        $queryResults->execute();

        $queryResults = $queryResults->fetchAll(\PDO::FETCH_ASSOC);

        $newsCollection = [];

        if ($queryResults) {
            foreach ($queryResults as $result) {
                $newsCollection[] = new News(
                    $result['id'],
                    $result['date'],
                    $result['authorName'],
                    $result['title'],
                    $result['text']
                );
            }
        }

        return $newsCollection;
    }
}
