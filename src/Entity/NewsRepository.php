<?php

namespace Entity;

use Vehsamrak\Vehsa\AbstractRepository;

/**
 * @author Vehsamrak
 */
class NewsRepository extends AbstractRepository
{

    /**
     * @return News[]
     */
    public function findAllSortedByDate(): array
    {
        $queryResults = $this->connection->query('
            SELECT n.id, n.title, n.text, a.name as authorName
            FROM news n 
            LEFT JOIN authors a ON a.login = n.author 
            ORDER BY date DESC'
        );

        $queryResults = $queryResults->fetchAll(\PDO::FETCH_ASSOC);

        $newsCollection = [];

        if ($queryResults) {
            foreach ($queryResults as $result) {
                $newsCollection[] = new News($result['id'], $result['authorName'], $result['title'], $result['text']);
            }
        }

        return $newsCollection;
    }
}
