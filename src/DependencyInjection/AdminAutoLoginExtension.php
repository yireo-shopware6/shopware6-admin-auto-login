<?php declare(strict_types=1);

namespace Yireo\AdminAutoLogin\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class AdminAutoLoginExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $configs);
    }

    public function getConfiguration(array $config, ContainerBuilder $container)
    {
        return new AdminAutoLoginConfiguration();
    }
}
