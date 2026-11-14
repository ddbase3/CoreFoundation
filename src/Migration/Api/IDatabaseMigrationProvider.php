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

use Base3\CoreFoundation\Api\IBase;

/**
 * Provides database migrations for one schema owner.
 *
 * A provider decides whether its migrations are relevant for the current
 * project composition. For example, a DatabaseStateStore provider should
 * only be active when the database-backed state store is actually wired.
 */
interface IDatabaseMigrationProvider extends IBase {

	/**
	 * Returns whether this provider should run in the current composition.
	 */
	public function isActive(): bool;

	/**
	 * Returns migrations in any order. The runner sorts them by version.
	 *
	 * Providers may return migration instances or class names that can be
	 * instantiated through the BASE3 class map.
	 *
	 * @return array<int, IDatabaseMigration|string>
	 */
	public function getMigrations(): array;
}
