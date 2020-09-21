<?php
if(!isset($_SESSION))
{
    session_start();
}

require_once '../dispatcher.php';
require_once '../routing.php';
require_once '../controllers.php';

class Front_controller
{
    private $action_url;
    private $route;

    private function update_action()
    {
        $this->action_url = $_GET['action'];
    }

    private function update_routing()
    {
        $routing = new Routing();
        $this->route = $routing->route();
    }

    function start_dispatching()
    {
        $this->update_action();
        $this->update_routing();
        $dispatcher = new Dispatcher();
        $dispatcher->dispatch($this->route, $this->action_url);
    }

}
$front_controller = new Front_controller();
$front_controller->start_dispatching();