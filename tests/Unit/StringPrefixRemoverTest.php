<?php

declare(strict_types=1);

namespace webignition\StringPrefixRemover\Tests\Unit;

use PHPUnit\Framework\TestCase;
use webignition\StringPrefixRemover\StringPrefixRemover;

class StringPrefixRemoverTest extends TestCase
{
    /**
     * @dataProvider removeDataProvider
     */
    public function testRemove(string $prefix, string $subject, string $expectedSubject): void
    {
        self::assertSame($expectedSubject, StringPrefixRemover::remove($prefix, $subject));
    }

    /**
     * @return string[][]
     */
    public function removeDataProvider(): array
    {
        return [
            'empty prefix, empty subject' => [
                'prefix' => '',
                'subject' => '',
                'expectedSubject' => '',
            ],
            'empty prefix, non-empty subject' => [
                'prefix' => '',
                'subject' => 'content',
                'expectedSubject' => 'content',
            ],
            'subject does not contain prefix' => [
                'prefix' => 'prefix-content',
                'subject' => 'subject-content',
                'expectedSubject' => 'subject-content',
            ],
            'subject does not start with prefix' => [
                'prefix' => 'prefix-content',
                'subject' => 'subject-content prefix-content',
                'expectedSubject' => 'subject-content prefix-content',
            ],
            'subject starts with prefix' => [
                'prefix' => 'prefix-content',
                'subject' => 'prefix-content subject-content',
                'expectedSubject' => ' subject-content',
            ],
        ];
    }
}
