<?php

declare(strict_types=1);

namespace Hoverfly\Model;

use ArrayObject;
use UnexpectedValueException;

/**
 * Class ArrayRequestFieldMatcher.
 */
class ArrayRequestFieldMatcher extends ArrayObject
{
    /**
     * @param mixed                 $index
     * @param RequestFieldMatcher[] $values
     */
    public function offsetSet($index, $values)
    {
        $matchers = array_map(function ($value) {
            if (empty($value['matcher'])) {
                throw new UnexpectedValueException('Empty matcher is not allowed');
            }

            return new RequestFieldMatcher($value['value'], $value['matcher']);
        }, $values);

        parent::offsetSet($index, $matchers);
    }
}
