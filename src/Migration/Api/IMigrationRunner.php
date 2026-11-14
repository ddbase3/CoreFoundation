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

namespace Base3\CoreFoundation\Migration\Api;

/**
 * Runs pending framework or plugin migrations.
 */
interface IMigrationRunner {

	/**
	 * Runs all pending migrations for the current runtime composition.
	 *
	 * Implementations may be no-op runners when the current project does not
	 * use migrations or does not have a database service.
	 */
	public function migrate(): void;
}
