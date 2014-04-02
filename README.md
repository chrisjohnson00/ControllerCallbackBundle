ControllerCallbackBundle
========================

A Symfony 2 bundle which adds the ability to configure a controller function call before or after the action is called

## Continuous Integration
[![Build Status](https://travis-ci.org/chrisjohnson00/ControllerCallbackBundle.png?branch=master)](https://travis-ci.org/chrisjohnson00/ControllerCallbackBundle) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/chrisjohnson00/ControllerCallbackBundle/badges/quality-score.png?s=8dbcaa1baf707dad71ec2b514adb72d2717dd2bf)](https://scrutinizer-ci.com/g/chrisjohnson00/ControllerCallbackBundle/) [![Code Coverage](https://scrutinizer-ci.com/g/chrisjohnson00/ControllerCallbackBundle/badges/coverage.png?s=555f42d9885f22b76fb170778802917cdfe62fcc)](https://scrutinizer-ci.com/g/chrisjohnson00/ControllerCallbackBundle/)

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
