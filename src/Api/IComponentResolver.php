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
 * Interface IComponentResolver
 *
 * Resolves configured component instances from container-held definitions and classmap-discovered implementations.
 */
interface IComponentResolver {

	/**
	 * Checks whether a configured component definition exists.
	 *
	 * @param string $interfaceName Fully qualified component interface name
	 * @param string $id Runtime component id
	 * @return bool
	 */
	public function has(string $interfaceName, string $id): bool;

	/**
	 * Resolves a configured component instance.
	 *
	 * @param string $interfaceName Fully qualified component interface name
	 * @param string $id Runtime component id
	 * @return IComponent|null
	 */
	public function get(string $interfaceName, string $id): ?IComponent;

	/**
	 * Resolves all configured component instances for an interface.
	 *
	 * @param string $interfaceName Fully qualified component interface name
	 * @return iterable<IComponent>
	 */
	public function all(string $interfaceName): iterable;
}
