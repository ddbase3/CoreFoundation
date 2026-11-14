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

namespace Base3\CoreFoundation\Authorization\Api;

use Base3\CoreFoundation\Api\IBase;
use Base3\CoreFoundation\Usermanager\Permission;

/** Plugin-discoverable feature description, not a second authorization decision service. */
interface IFeature extends IBase {

	/** @return string Non-empty human-readable feature label for administrative UIs */
	public function getLabel(): string;

	/** @return string Plain-language description of the feature's protected operations */
	public function getDescription(): string;

	/**
	 * Describes the real Permission checks protecting this feature. A feature can own several
	 * permissions; duplicate ownership between features is an error, not an implicit union.
	 *
	 * @return list<Permission> Non-empty, stable permission list with no runtime target
	 */
	public function getPermissions(): array;

	/**
	 * Returns the default BASE3 audience expression when a host has no explicit override.
	 * The same read-only IUserCriterion expression evaluator is used by group membership and
	 * feature access. Feature expressions may additionally contain ['group' => 'logical-name'].
	 * A configured empty expression denies access; native host permissions remain independent.
	 *
	 * @return array<string,mixed> Criterion expression or [] to deny access by default
	 */
	public function getDefaultAudience(): array;
}
