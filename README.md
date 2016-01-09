# ais-daftar-bundle
Daftar Bundle For AIS

## Usage

Add the following inside require tag in your root composer.json file:

```json
{
    "require": {
      "ais/daftarbundle" : "dev-master"
    },
}
```
Run $ php composer.phar update, wait until update finished.

Registering the bundle into your AppKernel.php 
Once composer update finished. If not yet install NelmioApiDocBundle you need registering it too. Because this bundle require
NelmioApiDocBundle to see the API doc.

```php
<?php
// app/AppKernel.php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
        ...
            new Nelmio\ApiDocBundle\NelmioApiDocBundle(),
			      new Ais\DaftarBundle\AisDaftarBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
```

Import the route to your routing.yml

```yaml
  ais_daftars:
    type: rest
    prefix: /api
    resource: "@AisDaftarBundle/Resources/config/routes.yml"
  
  NelmioApiDocBundle:
    resource: "@NelmioApiDocBundle/Resources/config/routing.yml"
    prefix:   /api/doc
```

## See what in the inside
Now you may see the available API by access your url dev
ex: http://localhost/web/app_dev.php/api/doc

Find a typo? just ask me for PR. If you find some error please help me to fix it by email me to vizzlearn@gmail.com
