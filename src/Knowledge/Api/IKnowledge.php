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

namespace Base3\CoreFoundation\Knowledge\Api;

/**
 * Interface IKnowledge
 *
 * Provides access to structured knowledge scopes, their fields, and associated data.
 */
interface IKnowledge {

	/**
	 * Returns a list of available knowledge scopes.
	 *
	 * @return array<string> List of scope identifiers
	 */
	public function getScopes();

	/**
	 * Returns the available fields for a given scope.
	 *
	 * @param string $scope The name of the scope
	 * @return array<string, string> List of field keys and their labels
	 */
	public function getFields($scope);

	/**
	 * Returns data for a given scope and selected fields.
	 *
	 * @param string $scope The name of the scope
	 * @param array<string>|null $fields Optional list of field keys to return (null = all)
	 * @return array<int, array<string, mixed>> Array of result rows with field values
	 */
	public function getData($scope, $fields = null);

}

