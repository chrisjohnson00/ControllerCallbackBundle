<?php
/**
 * Created by PhpStorm.
 * User: cjohnson
 * Date: 4/1/14
 * Time: 10:23 PM
 */

namespace ChrisJohnson00\ControllerCallbackBundle\Tests\EventListener\KernelControllerListenerTest;

use ChrisJohnson00\ControllerCallbackBundle\EventListener\KernelControllerListener;

class KernelControllerListenerTest extends \PHPUnit_Framework_TestCase
{
    private $listener;
    private $parameters;
    private $controller;

    public function setUp()
    {
        $this->listener   = new KernelControllerListener();
        $this->parameters = array('param1'           => 'value1',
                                  'param2'           => 'value2',
                                  'preActionMethod'  => 'doSomething',
                                  'postActionMethod' => 'doSomething');
        $this->controller = $this->getMock('SomeClass', array('doSomething'));
    }

    public function testParameters()
    {
        $this->listener->setRouteParameters($this->parameters);
        $this->assertSame($this->parameters, $this->listener->getRouteParameters());
    }

    public function testController()
    {
        $this->listener->setController($this->controller);
        $this->assertSame($this->controller, $this->listener->getController());
    }

    public function testPreActionMethod()
    {
        $this->configureMock();
        $this->listener->setController(array($this->controller)); //symfony provides the controller as an array containing an object
        $this->listener->setRouteParameters($this->parameters);
        $this->listener->preActionMethod();
    }

    public function testPostActionMethod()
    {
        $this->configureMock();
        $this->listener->setController(array($this->controller)); //symfony provides the controller as an array containing an object
        $this->listener->setRouteParameters($this->parameters);
        $this->listener->postActionMethod();
    }

    private function configureMock()
    {
        //internal assertion that the mock->doSomething() is called one time with this->parameters as the input
        $this->controller->expects($this->once())->method('doSomething')->with($this->parameters);
    }

}

class SomeClass
{
    public function doSomething($params)
    {
        return true;
    }
}
 