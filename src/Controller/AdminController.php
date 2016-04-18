<?php

namespace Controller;

use Vehsamrak\Vehsa\AbstractController;

/**
 * @author Vehsamrak
 */
class AdminController extends AbstractController
{
    public function indexAction()
    {
        $this->render('admin/index');
    }
}
