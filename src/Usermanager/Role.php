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

namespace Base3\CoreFoundation\Usermanager;

class Role {

	public $id;
	public $name;
	public $label;
	public $info;
	public $archive;
	public $permissions = array();

	public static function named(string $name): self {
		$role = new self();
		$role->name = $name;
		return $role;
	}

	public static function fromArray(array $data): self {
		$role = new self();

		foreach (['id', 'name', 'label', 'info', 'archive', 'permissions'] as $key) {
			if (array_key_exists($key, $data)) {
				$role->$key = $data[$key];
			}
		}

		return $role;
	}
}
