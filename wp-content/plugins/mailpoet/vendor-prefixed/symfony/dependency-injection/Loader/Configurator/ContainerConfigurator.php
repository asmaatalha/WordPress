<?php
 namespace MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator; if (!defined('ABSPATH')) exit; use MailPoetVendor\Symfony\Component\DependencyInjection\Argument\IteratorArgument; use MailPoetVendor\Symfony\Component\DependencyInjection\Argument\ServiceLocatorArgument; use MailPoetVendor\Symfony\Component\DependencyInjection\Argument\TaggedIteratorArgument; use MailPoetVendor\Symfony\Component\DependencyInjection\ContainerBuilder; use MailPoetVendor\Symfony\Component\DependencyInjection\Definition; use MailPoetVendor\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException; use MailPoetVendor\Symfony\Component\DependencyInjection\Extension\ExtensionInterface; use MailPoetVendor\Symfony\Component\DependencyInjection\Loader\PhpFileLoader; use MailPoetVendor\Symfony\Component\ExpressionLanguage\Expression; class ContainerConfigurator extends \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\AbstractConfigurator { const FACTORY = 'container'; private $container; private $loader; private $instanceof; private $path; private $file; private $anonymousCount = 0; public function __construct(\MailPoetVendor\Symfony\Component\DependencyInjection\ContainerBuilder $container, \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\PhpFileLoader $loader, array &$instanceof, string $path, string $file) { $this->container = $container; $this->loader = $loader; $this->instanceof =& $instanceof; $this->path = $path; $this->file = $file; } public final function extension(string $namespace, array $config) { if (!$this->container->hasExtension($namespace)) { $extensions = \array_filter(\array_map(function (\MailPoetVendor\Symfony\Component\DependencyInjection\Extension\ExtensionInterface $ext) { return $ext->getAlias(); }, $this->container->getExtensions())); throw new \MailPoetVendor\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException(\sprintf('There is no extension able to load the configuration for "%s" (in "%s"). Looked for namespace "%s", found "%s".', $namespace, $this->file, $namespace, $extensions ? \implode('", "', $extensions) : 'none')); } $this->container->loadFromExtension($namespace, static::processValue($config)); } public final function import(string $resource, string $type = null, $ignoreErrors = \false) { $this->loader->setCurrentDir(\dirname($this->path)); $this->loader->import($resource, $type, $ignoreErrors, $this->file); } public final function parameters() : \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\ParametersConfigurator { return new \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\ParametersConfigurator($this->container); } public final function services() : \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\ServicesConfigurator { return new \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\ServicesConfigurator($this->container, $this->loader, $this->instanceof, $this->path, $this->anonymousCount); } } function ref(string $id) : \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\ReferenceConfigurator { return new \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\ReferenceConfigurator($id); } function inline(string $class = null) : \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\InlineServiceConfigurator { return new \MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\InlineServiceConfigurator(new \MailPoetVendor\Symfony\Component\DependencyInjection\Definition($class)); } function service_locator(array $values) : \MailPoetVendor\Symfony\Component\DependencyInjection\Argument\ServiceLocatorArgument { return new \MailPoetVendor\Symfony\Component\DependencyInjection\Argument\ServiceLocatorArgument(\MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\AbstractConfigurator::processValue($values, \true)); } function iterator(array $values) : \MailPoetVendor\Symfony\Component\DependencyInjection\Argument\IteratorArgument { return new \MailPoetVendor\Symfony\Component\DependencyInjection\Argument\IteratorArgument(\MailPoetVendor\Symfony\Component\DependencyInjection\Loader\Configurator\AbstractConfigurator::processValue($values, \true)); } function tagged(string $tag, string $indexAttribute = null, string $defaultIndexMethod = null) : \MailPoetVendor\Symfony\Component\DependencyInjection\Argument\TaggedIteratorArgument { @\trigger_error(__NAMESPACE__ . '\\tagged() is deprecated since Symfony 4.4 and will be removed in 5.0, use ' . __NAMESPACE__ . '\\tagged_iterator() instead.', \E_USER_DEPRECATED); return new \MailPoetVendor\Symfony\Component\DependencyInjection\Argument\TaggedIteratorArgument($tag, $indexAttribute, $defaultIndexMethod); } function tagged_iterator(string $tag, string $indexAttribute = null, string $defaultIndexMethod = null, string $defaultPriorityMethod = null) : \MailPoetVendor\Symfony\Component\DependencyInjection\Argument\TaggedIteratorArgument { return new \MailPoetVendor\Symfony\Component\DependencyInjection\Argument\TaggedIteratorArgument($tag, $indexAttribute, $defaultIndexMethod, \false, $defaultPriorityMethod); } function tagged_locator(string $tag, string $indexAttribute = null, string $defaultIndexMethod = null) : \MailPoetVendor\Symfony\Component\DependencyInjection\Argument\ServiceLocatorArgument { return new \MailPoetVendor\Symfony\Component\DependencyInjection\Argument\ServiceLocatorArgument(new \MailPoetVendor\Symfony\Component\DependencyInjection\Argument\TaggedIteratorArgument($tag, $indexAttribute, $defaultIndexMethod, \true)); } function expr(string $expression) : \MailPoetVendor\Symfony\Component\ExpressionLanguage\Expression { return new \MailPoetVendor\Symfony\Component\ExpressionLanguage\Expression($expression); } 