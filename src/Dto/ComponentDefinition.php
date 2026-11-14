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

namespace Base3\CoreFoundation\Dto;

/**
 * ComponentDefinition
 *
 * Describes one configured runtime instance of a classmap-discovered component implementation.
 */
final class ComponentDefinition {

	public const SERVICE_PREFIX = 'component.definition.';

	public function __construct(
		public readonly string $id,
		public readonly string $interfaceName,
		public readonly string $implementationName,
		public readonly array $arguments = [],
		public readonly array $config = [],
		public readonly array $metadata = [],
	) {}

	public function getServiceName(): string {
		return self::getServiceNameFor($this->interfaceName, $this->id);
	}

	public static function getServiceNameFor(string $interfaceName, string $id): string {
		return self::SERVICE_PREFIX . str_replace('\\', '.', trim($interfaceName, '\\')) . '.' . $id;
	}
}
