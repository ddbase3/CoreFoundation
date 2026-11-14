<?php declare(strict_types=1);

/***********************************************************************
 * This file is part of CoreFoundation for BASE3 Framework.
 *
 * CoreFoundation defines the stable shared contracts of BASE3 Framework.
 * It owns framework interfaces, models, DTOs, exceptions and common bases.
 * Concrete core implementations depend on it, never the reverse.
 *
 * Developed by Daniel Dahme
 * Licensed under GPL-3.0
 * https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * https://base3.de
 * https://github.com/ddbase3/Base3Framework
 **********************************************************************/

namespace Base3\CoreFoundation\Api;

/**
 * Interface IPlugin
 *
 * Defines a plugin that can be initialized with a service container and perform setup logic.
 */
interface IPlugin {

	/**
	 * Constructs the plugin with access to the dependency injection container.
	 *
	 * @param IContainer $container The shared service container
	 */
	public function __construct(IContainer $container);

	/**
	 * Initializes the plugin (e.g. registers services, performs setup).
	 *
	 * Called after construction to allow the plugin to configure its dependencies.
	 *
	 * @return void
	 */
	public function init();

}

