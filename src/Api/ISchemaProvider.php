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
 * Interface ISchemaProvider
 *
 * Provides a schema definition used for validating or describing structured data.
 */
interface ISchemaProvider {

	/**
	 * Returns the schema definition.
	 *
	 * The schema can be used for validation, documentation, or code generation purposes.
	 *
	 * @return array Associative array describing the schema structure
	 */
	public function getSchema(): array;

}

