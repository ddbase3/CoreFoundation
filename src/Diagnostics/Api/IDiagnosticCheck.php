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

namespace Base3\CoreFoundation\Diagnostics\Api;

use Base3\CoreFoundation\Api\IBase;
use Base3\CoreFoundation\Diagnostics\Dto\DiagnosticCheckResult;

/**
 * A read-only, classmap-discoverable diagnostic owned by its providing module.
 *
 * Implementations must not mutate resources, trigger remediation, expose secrets,
 * or include personal data in their result. Human-facing text is resolved from
 * the module's lang/DiagnosticChecks/<language>.ini, using getName() as section.
 */
interface IDiagnosticCheck extends IBase {

	/**
	 * Returns the unique name of an existing IDiagnosticScope implementation.
	 *
	 * The scope is code-owned and must not depend on mutable user input. A check
	 * belongs to exactly one scope. Callers must reject unknown scopes.
	 *
	 * @return string IDiagnosticScope::getName() of this check's scope
	 */
	public function getScope(): string;

	/**
	 * Runs this check without changing the inspected system.
	 *
	 * Each invocation independently evaluates current conditions and returns a
	 * single structured result. A failed condition is a FAILED result, whereas
	 * a condition that cannot be reliably evaluated is ERROR. An irrelevant
	 * resource may return NOT_APPLICABLE; it must never report PASSED without
	 * actually evaluating the condition. Results contain translation keys and
	 * safe scalar measurements, not HTML or sensitive source records.
	 *
	 * @return DiagnosticCheckResult Current result; no persistent report is created
	 * @throws \Throwable For unexpected evaluation errors; the runner converts
	 *                    these to a generic ERROR without exposing details
	 */
	public function run(): DiagnosticCheckResult;

}
