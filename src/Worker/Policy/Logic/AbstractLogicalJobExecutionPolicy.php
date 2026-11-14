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

namespace Base3\CoreFoundation\Worker\Policy\Logic;

use Base3\CoreFoundation\Api\IClassMap;
use Base3\CoreFoundation\Worker\Api\IJobExecutionPolicy;
use Base3\CoreFoundation\Worker\Policy\AbstractJobExecutionPolicy;

abstract class AbstractLogicalJobExecutionPolicy extends AbstractJobExecutionPolicy {

	/**
	 * @var array<int, IJobExecutionPolicy>
	 */
	protected array $policies = [];

	public function __construct(
		protected readonly IClassMap $classMap
	) {}

	public function setData(array $data) {
		parent::setData($data);
		$this->policies = [];

		foreach ($this->extractPolicyDefinitions($data) as $definition) {
			$policy = $this->createPolicy($definition);
			if ($policy !== null) {
				$this->policies[] = $policy;
			}
		}
	}

	protected function createPolicy(array $definition): ?IJobExecutionPolicy {
		$name = $definition['policy'] ?? null;
		if (!is_scalar($name) || trim((string)$name) === '') {
			return null;
		}

		$policy = $this->classMap->getInstanceByInterfaceName(
			IJobExecutionPolicy::class,
			(string)$name
		);

		if (!$policy instanceof IJobExecutionPolicy) {
			return null;
		}

		$policyData = $definition['data'] ?? [];
		$policy->setData(is_array($policyData) ? $policyData : []);

		return $policy;
	}

	protected function extractPolicyDefinitions(array $data): array {
		if (isset($data['items']) && is_array($data['items'])) {
			return $data['items'];
		}

		if ($this->isList($data)) {
			return $data;
		}

		return [];
	}

	protected function isList(array $array): bool {
		$i = 0;
		foreach ($array as $key => $_) {
			if ($key !== $i) {
				return false;
			}
			$i++;
		}

		return true;
	}
}
