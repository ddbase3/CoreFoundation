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

namespace Base3\CoreFoundation\Worker\Policy;

use Base3\CoreFoundation\Worker\Api\IJobExecutionPolicy;

abstract class AbstractJobExecutionPolicy implements IJobExecutionPolicy {

	protected array $data = [];
	protected string $reason = '';

	abstract public static function getName(): string;

	public function setData(array $data) {
		$this->data = $data;
	}

	public function markRun(string $jobName) {}

	public function getReason() {
		return $this->reason;
	}

	public function getSchema(): array {
		return [];
	}

	protected function setReason(string $reason): void {
		$this->reason = $reason;
	}

	protected function getString(string $key, string $default = ''): string {
		$value = $this->data[$key] ?? $default;
		return is_scalar($value) ? (string)$value : $default;
	}

	protected function getInt(string $key, int $default = 0): int {
		$value = $this->data[$key] ?? $default;
		return is_numeric($value) ? (int)$value : $default;
	}

	protected function getPolicyId(): ?string {
		$id = $this->data['id'] ?? ($this->data['policy_id'] ?? null);

		if (!is_scalar($id)) {
			return null;
		}

		$id = trim((string)$id);
		return $id !== '' ? $id : null;
	}

	protected function stateKey(string $jobName, string $policyType, string $key, ?string $policyId = null): string {
		$parts = [
			'worker',
			'job',
			$this->cleanSegment($jobName),
			$this->cleanSegment($policyType)
		];

		if ($policyId !== null && trim($policyId) !== '') {
			$parts[] = $this->cleanSegment($policyId);
		}

		$parts[] = $this->cleanSegment($key);

		return implode('.', $parts);
	}

	protected function cleanSegment(string $value): string {
		$value = strtolower(trim($value));
		$value = preg_replace('/[^a-z0-9_]+/', '_', $value) ?? '';
		$value = trim($value, '_');

		return $value !== '' ? $value : 'default';
	}

	protected function nowSqlString(): string {
		return date('Y-m-d H:i:s');
	}

	protected function isSameDay(string $dateTime): bool {
		$ts = strtotime($dateTime);
		return $ts !== false && date('Y-m-d', $ts) === date('Y-m-d');
	}

	protected function isTimeInWindow(string $now, string $from, string $to): bool {
		if ($from <= $to) {
			return $now >= $from && $now < $to;
		}

		return $now >= $from || $now < $to;
	}
}
