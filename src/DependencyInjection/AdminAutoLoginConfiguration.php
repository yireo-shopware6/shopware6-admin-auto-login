<?php declare(strict_types=1);

namespace Yireo\AdminAutoLogin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class AdminAutoLoginConfiguration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('admin_auto_login');

        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->children()
            ->arrayNode('parameters')
            ->children()
            ->scalarNode('username')->end()
            ->scalarNode('password')->end()
            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
