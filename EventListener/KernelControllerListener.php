<?php
namespace ChrisJohnson00\ControllerCallbackBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class KernelControllerListener
{
    private $controller;
    private $routeParameters;

    public function onKernelController(FilterControllerEvent $event)
    {
        $this->setController($event->getController());

        /*
         * $controller passed can be either a class or a Closure. This is not usual in Symfony2 but it may happen.
         * If it is a class, it comes in array format
         */
        if (!is_array($this->controller))
        {
            return;
        }

        $request = $event->getRequest();
        $this->setRouteParameters($request->get('_route_params'));
        $this->preActionMethod();
        $this->postActionMethod();
    }

    public function setController($controller)
    {
        $this->controller = $controller;
    }

    public function setRouteParameters($parameters)
    {
        $this->routeParameters = $parameters;
    }

    public function preActionMethod()
    {
        if (isset($this->routeParameters['preActionMethod']))
        {
            $method = $this->routeParameters['preActionMethod'];
            $this->controller[0]->{$method}($this->routeParameters);
        }
    }

    public function postActionMethod()
    {
        if (isset($this->routeParameters['postActionMethod']))
        {
            $method = $this->routeParameters['postActionMethod'];
            $this->controller[0]->{$method}($this->routeParameters);
        }

    }
}