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
        $queryResults = $this->connection->query('SELECT id, author, title, text FROM news ORDER BY date DESC');

        $queryResults = $queryResults->fetchAll(\PDO::FETCH_ASSOC);

        $newsCollection = [];

        if ($queryResults) {
            foreach ($queryResults as $result) {
                $newsCollection[] = new News($result['id'], $result['author'], $result['title'], $result['text']);
            }
        }

        return $newsCollection;
    }
}
