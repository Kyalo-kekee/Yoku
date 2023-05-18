<?php

namespace Yoku\Ddd\Application;

use Symfony\Component\Config\Loader\LoaderInterface;

class YokuKernel extends  \Symfony\Component\HttpKernel\Kernel
{

    public function registerBundles(): iterable
    {
        // TODO: Implement registerBundles() method.
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        // TODO: Implement registerContainerConfiguration() method.
    }
}