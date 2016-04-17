<?php

namespace Entity;

use Vehsamrak\Vehsa\AbstractRepository;

/**
 * @author Vehsamrak
 */
class AuthorRepository extends AbstractRepository
{

    /**
     * @param string $login
     * @return Author|null
     */
    public function findOneByLogin(string $login)
    {
        $queryResults = $this->connection->prepare("SELECT * FROM authors a WHERE a.login = :login");
        $queryResults->bindParam('login', $login, \PDO::PARAM_STR);
        $queryResults->execute();

        $queryResults = $queryResults->fetch(\PDO::FETCH_ASSOC);

        return $queryResults
            ? new Author($queryResults['login'], $queryResults['name'], $queryResults['password'])
            : null;
    }
}
