<?php

declare(strict_types=1);

namespace Unit\Model;

use UnexpectedValueException;
use PHPUnit\Framework\TestCase;
use Hoverfly\Model\RequestFieldMatcher;
use Hoverfly\Model\ArrayRequestFieldMatcher;

class ArrayRequestFieldMatcherTest extends TestCase
{
    public function testConvertsArrayToRequestFieldMatcher()
    {
        $a = new ArrayRequestFieldMatcher();
        $a[] = [['matcher' => RequestFieldMatcher::EXACT, 'value' => 'hello']];

        $this->assertEquals(
            [[RequestFieldMatcher::newExactMatcher('hello')]],
            $a->getArrayCopy()
        );
    }

    public function testThrowsExceptionOnEmptyMatcher()
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('Empty matcher is not allowed');
        $a = new ArrayRequestFieldMatcher();
        $a[] = [['matcher' => '', 'value' => 'hello']];
    }
}
