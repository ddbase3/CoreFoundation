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
 * Interface IBootstrap
 *
 * Defines a component that executes startup or initialization logic.
 */
interface IBootstrap {

	/**
	 * Runs the bootstrap logic.
	 *
	 * This method is called during application startup to perform initialization tasks,
	 * such as registering services, loading configuration, or setting up environment state.
	 *
	 * @return void
	 */
	public function run(): void;

}

