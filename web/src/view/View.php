<?php
/**
 * Created by PhpStorm.
 * User: andrew
 * Date: 30/08/17
 * Time: 4:38 PM
 */

namespace team\a2\view;

use const team\a2\APP_ROOT;
/**
 * Class CustomerController
 *
 * @package team\a2\controller
 *  @author Junghoe Hwang
 * @author Robert Harper
 * @author Erdem Alpkaya
 */
class View
{

    /**
     * @var string path to template being rendered
     */
    protected $template = null;

    /**
     * @var array data to be made available to the template
     */
    protected $data = array();

    public function __construct($template)
    {
        try {
            $file =  APP_ROOT . DIRECTORY_SEPARATOR .
                'src' . DIRECTORY_SEPARATOR .
                'templates' . DIRECTORY_SEPARATOR .
                $template . '.phtml';

            if (file_exists($file)) {
                $this->template = $file;
            } else {
//                throw new customException('Template ' . $template . ' not found!');
            }
        } catch (customException $e) {
            echo $e->errorMessage();
        }
    }

    /**
     * Adds a key/value pair to be available to phtml template
     *
     * @param string $key name of the data to be available
     * @param object $val value of the data to be available
     *
     * @return $this View
     */
    public function addData($key, $val)
    {
        $this->data[$key] = $val;
        return $this;
    }

    /**
     * Render the template, returning it's content.
     *
     * @return string The rendered template.
     */
    public function render()
    {
        // create a closure to be used in the templates
        $linkTo = function ($route, $params = []) {
            // Generate a link URL for a named route
            return $GLOBALS['router']->generate($route, $params);
        };
        extract($this->data);
        ob_start();
        include($this->template);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
