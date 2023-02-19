<?php

declare(strict_types=1);

namespace Hoverfly\Model;

/**
 * Class RequestFieldMatcher.
 */
class RequestFieldMatcher implements \JsonSerializable
{
    /**
     * @var string
     */
    public const EXACT = 'exact';

    /**
     * @var string
     */
    public const GLOB = 'glob';

    /**
     * @var string
     */
    public const REGEX = 'regex';

    /**
     * @var string
     */
    public const XML = 'xml';

    /**
     * @var string
     */
    public const XPATH = 'xpath';

    /**
     * @var string
     */
    public const JSON = 'json';

    /**
     * @var string
     */
    public const JSON_PARTIAL = 'jsonPartial';

    /**
     * @var string
     */
    public const JSONPATH = 'jsonpath';

    /**
     * @var string
     */
    private $matcher;

    /**
     * @var string
     */
    private $value = '';

    /**
     * RequestFieldMatcher constructor.
     */
    public function __construct(string $value, string $matcher = self::EXACT)
    {
        $this->value = $value;
        $this->matcher = $matcher;
    }

    public function getMatcher(): string
    {
        return $this->matcher;
    }

    public function setMatcher(string $matcher): RequestFieldMatcher
    {
        $this->matcher = $matcher;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): RequestFieldMatcher
    {
        $this->value = $value;

        return $this;
    }

    public static function newExactMatcher(string $value): RequestFieldMatcher
    {
        return new static($value);
    }

    public static function newJsonMatcher(array $value, bool $partial = false): RequestFieldMatcher
    {
        return new static(json_encode($value), $partial ? static::JSON_PARTIAL : static::JSON);
    }

    public function jsonSerialize(): array
    {
        return [
            'matcher' => $this->matcher,
            'value' => $this->value,
        ];
    }
}
