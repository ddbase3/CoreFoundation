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

use Base3\CoreFoundation\Usermanager\Permission;

/** A grant reported by the native authority for a subject on a resource. */
final readonly class AuthorizationGrant {

	public function __construct(
		public SubjectReference $subject,
		public Permission $permission,
		public ResourceReference $resource,
		public bool $editable,
		public ?bool $inherited = null,
		public ?ResourceReference $origin = null
	) {}
}
