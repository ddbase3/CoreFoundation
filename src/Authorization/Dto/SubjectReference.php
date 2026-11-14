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

/** A principal identifier within the owning identity authority, not a globally meaningful user ID. */
final readonly class SubjectReference {

	public function __construct(
		public string $authority,
		public string $kind,
		public int|string $id
	) {
		if (trim($authority) === '' || !in_array($kind, ['user', 'group', 'role', 'agent', 'service'], true) || trim((string)$id) === '') {
			throw new InvalidArgumentException('A subject needs an authority, supported kind and non-empty ID.');
		}
	}
}
