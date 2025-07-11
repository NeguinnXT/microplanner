<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util\Xml;

use const PHP_EOL;
use function sprintf;
use function trim;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 *
 * @psalm-immutable
 */
final class ValidationResult
{
    /**
     * @psalm-var array<int,list<string>>
     */
    private $validationErrors = [];

    /**
     * @psalm-param array<int,\LibXMLError> $errors
     */
    public static function fromArray(array $errors): self
    {
        $validationErrors = [];

        foreach ($errors as $error) {
            if (!isset($validationErrors[$error->line])) {
                $validationErrors[$error->line] = [];
            }

            $validationErrors[$error->line][] = trim($error->message);
        }

        return new self($validationErrors);
    }

    private function __construct(array $validationErrors)
    {
        $this->validationErrors = $validationErrors;
    }

    public function hasValidationErrors(): bool
    {
        return !empty($this->validationErrors);
    }

    public function asString(): string
    {
        $buffer = '';

        foreach ($this->validationErrors as $line => $validationErrorsonline) {
            $buffer .= sprintf(PHP_EOL . '  Line %d:' . PHP_EOL, $line);

            foreach ($validationErrorsonline as $validationError) {
                $buffer .= sprintf('  - %s' . PHP_EOL, $validationError);
            }
        }

        return $buffer;
    }
}
