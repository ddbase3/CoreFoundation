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
 * Interface IMvcView
 *
 * Defines a template-based MVC view system with assignable variables and language-dependent text bricks.
 */
interface IMvcView {

	/**
	 * Sets the base path for template and brick loading.
	 *
	 * @param string $path Directory path, defaults to current directory
	 * @return void
	 */
	public function setPath(string $path = '.');

	/**
	 * Assigns a variable to the template.
	 *
	 * @param string $key Variable name
	 * @param mixed $value Variable value
	 * @return void
	 */
	public function assign(string $key, $value);

	/**
	 * Sets the template name to be used.
	 *
	 * @param string $template Template identifier (default: "default")
	 * @return void
	 */
	public function setTemplate(string $template = 'default');

	/**
	 * Loads and renders the assigned template.
	 *
	 * @return string Rendered output as HTML or other format
	 */
	public function loadTemplate(): string;

	/**
	 * Loads language-specific brick texts for a given set.
	 *
	 * @param string $set Name of the brick set
	 * @param string $language Optional language code (e.g. "en", "de")
	 * @return void
	 */
	public function loadBricks(string $set, string $language = '');

	/**
	 * Returns the loaded bricks for the given set.
	 *
	 * @param string $set Brick set name
	 * @return array<string, string>|null Associative array of key => text, or null if not found
	 */
	public function getBricks(string $set): ?array;

}

