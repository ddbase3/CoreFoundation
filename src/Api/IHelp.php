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
 * Interface IHelp
 *
 * Defines an optional capability for classes that can provide help,
 * usage notes, or debug-oriented self-description.
 *
 * This interface is intentionally separate from IOutput so that output
 * classes are not forced to implement help functionality when they do
 * not need it. It may also be implemented by other class types such as
 * services or framework components if they want to expose structured or
 * human-readable usage information.
 *
 * Current purpose:
 * - endpoint help text
 * - developer-oriented usage hints
 * - debug information in development environments
 *
 * Important note for future refactoring:
 * The name "help" is intentionally kept for backward compatibility and
 * for a minimal migration path. A later redesign may rename this concept
 * to something broader and semantically more precise, for example a
 * description-oriented interface such as "IDescribe" with a method like
 * "describe()".
 */
interface IHelp {

	/**
	 * Returns help text or debug-related usage information.
	 *
	 * Implementations may return endpoint syntax, supported parameters,
	 * output format information, examples, or any other human-readable
	 * guidance that is useful during development or debugging.
	 *
	 * The exact structure and content are intentionally flexible for now.
	 * In production systems this method is typically only exposed when the
	 * framework runs in debug mode.
	 *
	 * @return string Human-readable help or diagnostic information
	 */
	public function getHelp(): string;
}
