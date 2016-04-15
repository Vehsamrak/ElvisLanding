<?php

namespace Controller;

use Entity\NewsRepository;
use Vehsamrak\Vehsa\AbstractController;
use Vehsamrak\Vehsa\Database;

/**
 * @author p.karmashev
 */
class IndexController extends AbstractController
{

    public function indexAction()
    {
        $connection = (new Database())->getConnection();
        $newsRepository = new NewsRepository($connection);

        $this->render(['news' => $newsRepository->findAllSortedByDate()]);
    }
}
