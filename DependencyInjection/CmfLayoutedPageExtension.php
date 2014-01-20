<?php

namespace Cmf\LayoutedPageBundle\DependencyInjection;

use PHPCR\Util\PathHelper;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class CmfLayoutedPageExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $layoutPath = PathHelper::absolutizePath($config['layout_path'], $config['base_path']);
        $container->setParameter($this->getAlias().'.layout_path', $layoutPath);

        $pagePath = PathHelper::absolutizePath($config['page_path'], $config['base_path']);
        $container->setParameter($this->getAlias().'.page_path', $pagePath);
    }
}
