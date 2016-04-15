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
        $connection = $this->connection;
        $queryResults = $connection->query('SELECT author, title, text FROM news ORDER BY date DESC');

        $queryResults = $queryResults->fetchAll(\PDO::FETCH_ASSOC);

        $entryCollection = [];

        if ($queryResults) {
            foreach ($queryResults as $result) {
                $entryCollection[] = new News($result['author'], $result['title'], $result['text']);
            }
        }

        return $entryCollection;
    }
}
