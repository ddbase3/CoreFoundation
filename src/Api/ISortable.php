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
 * Interface ISortable
 *
 * Defines an optional priority-based sorting contract for objects.
 * Classes implementing this interface can provide an integer priority value
 * that allows consistent ordering when multiple implementations are collected,
 * e.g. in plugin or extension systems.
 */
interface ISortable {

	/**
	 * Returns the sort priority of this object.
	 *
	 * Higher values indicate later execution (lower priority values are executed first).
	 * Default implementations should typically return 0.
	 *
	 * @return int Sort priority
	 */
	public function getPriority(): int;
}

