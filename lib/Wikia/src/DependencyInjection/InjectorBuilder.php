<?php
/**
 * InjectorBuilder
 *
 * <insert description here>
 *
 * @author Nelson Monterroso <nelson@wikia-inc.com>
 */

namespace Wikia\DependencyInjection;

use DI\ContainerBuilder;
use Doctrine\Common\Cache\CacheProvider;
use function DI\object;

class InjectorBuilder {
	private $builder;

	public function __construct() {
		$this->builder = (new ContainerBuilder())
			->useAnnotations(true);
	}

	public function bindClass($key, $class) {
		return $this->bind($key, object($class));
	}

	public function bind($key, $value) {
		$this->builder->addDefinitions([$key => $value]);
		return $this;
	}

	/**
	 * @param Module $module
	 * @return InjectorBuilder
	 */
	public function addModule(Module $module) {
		$this->builder->addDefinitions($module->configure());
		return $this;
	}

	public function withCache(CacheProvider $cacheProvider = null) {
		if ($cacheProvider != null) {
			$this->builder->setDefinitionCache($cacheProvider);
		}

		return $this;
	}

	/**
	 * @return Injector
	 * @throws \Exception when trying to build an already-built injector
	 */
	public function build() {
		return new Injector($this->builder->build());
	}
}
