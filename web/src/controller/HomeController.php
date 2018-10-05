<?php
namespace agilman\a2\controller;
use agilman\a2\view\View;


/**
 * Class HomeController
 *
 * @package agilman/a2
 * @author  Andrew Gilman <a.gilman@massey.ac.nz>
 */
class HomeController extends Controller
{
    /**
     * Account Index action
     */
    public function indexAction()
    {
        session_start();
        $view = new View('main');
        echo $view->render();
        //$this->redirect('accountIndex');
    }
}
