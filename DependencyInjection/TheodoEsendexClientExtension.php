<?php

namespace Theodo\Bundle\EsendexClient\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class TheodoEsendexClientExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('theodo.esendex.client.config.username', $config['username']);
        $container->setParameter('theodo.esendex.client.config.password', $config['password']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('esendex_client.xml');

        $container->setAlias('esendex_client', 'theodo.esendex.client');
    }
}
