<?php

namespace Controller;

use Service\NewsProcessor;
use Vehsamrak\Vehsa\AbstractController;

/**
 * @author p.karmashev
 */
class IndexController extends AbstractController
{

    const MAIN_PAGE_NEWS_COUNT = 3;

    public function indexAction()
    {
        $newsProcessor = new NewsProcessor();

        $this->render('index', ['news' => $newsProcessor->getLastNews(self::MAIN_PAGE_NEWS_COUNT)]);
    }
}
