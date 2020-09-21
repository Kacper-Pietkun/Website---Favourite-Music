<?php
const REDIRECT_PREFIX = 'redirect:';

class Dispatcher
{
    function dispatch($routing, $action_url)
    {
        $main_controll = new Main_controll();

        $controller_name = $routing[$action_url];
        $model = [];
        $view_name = $main_controll->$controller_name($model);
        $this->build_response($view_name, $model);
    }

    function build_response($view, $model)
    {
        if(strpos($view, REDIRECT_PREFIX) === 0)
        {
            $url = substr($view, strlen(REDIRECT_PREFIX));
            header("Location: " . $url);
            exit;
        }
        else if($view === 'dont_render')
            ;
        else
        {
            $this->render($view, $model);
        }
    }

    function render($view_name, $model)
    {
        extract($model);
        include 'views/' . $view_name . '.php';
    }
}

