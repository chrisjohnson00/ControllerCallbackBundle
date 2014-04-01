<?php
namespace ChrisJohnson00\ControllerCallbackBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class KernelControllerListener
{
    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        /*
         * $controller passed can be either a class or a Closure. This is not usual in Symfony2 but it may happen.
         * If it is a class, it comes in array format
         */
        if (!is_array($controller))
        {
            return;
        }

        $request         = $event->getRequest();
        $routeParameters = $request->get('_route_params');
        if (isset($routeParameters['preActionMethod']))
        {
            $method = $routeParameters['preActionMethod'];
            $controller[0]->{$method}($routeParameters);
        }
        if (isset($routeParameters['postActionMethod']))
        {
            $method = $routeParameters['postActionMethod'];
            $controller[0]->{$method}($routeParameters);
        }
    }
}