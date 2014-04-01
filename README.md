ControllerCallbackBundle
========================

A Symfony 2 bundle which adds the ability to configure a controller function call before or after the action is called

Installation
------------
### Installation by Composer

Add ApiProfilerBundle bundle as a dependency to the composer.json of your application

    "require": {
        ...
        "chrisjohnson00/controller-callback-bundle": "dev-master"
        ...
    },

Or on the command line with
`composer require chrisjohnson00/controller-callback-bundle`

## Add ApiProfilerBundle to your application kernel.

```php
// app/AppKernel.php
<?php
    // ...
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new ChrisJohnson00\ControllerCallbackBundle\ChrisJohnson00ControllerCallbackBundle(),
        );
    }
```
