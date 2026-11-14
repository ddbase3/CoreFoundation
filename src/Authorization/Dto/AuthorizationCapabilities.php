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

/** What the native authority can expose through the common rights administration UI. */
final readonly class AuthorizationCapabilities {

	/**
	 * @param string $authority Registered authorization authority
	 * @param bool $canRead Grants and permissions may be inspected by the current operator
	 * @param bool $canWrite The current operator may change supported native grants
	 * @param bool $supportsHierarchy The native authority supports resource inheritance
	 * @param list<string> $subjectKinds Subject kinds for which this authority exposes native grants
	 * @param list<string> $limitations Human-readable description of unsupported operations
	 */
	public function __construct(
		public string $authority,
		public bool $canRead,
		public bool $canWrite,
		public bool $supportsHierarchy,
		public array $subjectKinds,
		public array $limitations = []
	) {}
}
