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

namespace Base3\CoreFoundation\Authorization\Dto;

use InvalidArgumentException;

/** A resource is identified by its owning authorization authority, type and native ID. */
final readonly class ResourceReference {

	public function __construct(
		public string $authority,
		public string $type,
		public int|string $id
	) {
		if (trim($authority) === '' || trim($type) === '' || trim((string)$id) === '') {
			throw new InvalidArgumentException('A resource needs an authority, type and non-empty ID.');
		}
	}
}
