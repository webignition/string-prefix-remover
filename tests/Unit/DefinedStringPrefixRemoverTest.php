<?php

declare(strict_types=1);

namespace webignition\StringPrefixRemover\Tests\Unit;

use PHPUnit\Framework\TestCase;
use webignition\StringPrefixRemover\DefinedStringPrefixRemover;

class DefinedStringPrefixRemoverTest extends TestCase
{
    private const PREFIX = 'prefix-content';

    private DefinedStringPrefixRemover $remover;

    protected function setUp(): void
    {
        parent::setUp();

        $this->remover = new DefinedStringPrefixRemover(self::PREFIX);
    }

    /**
     * @dataProvider removeDataProvider
     */
    public function testRemove(string $subject, string $expectedSubject): void
    {
        self::assertSame($expectedSubject, $this->remover->remove($subject));
    }

    /**
     * @return string[][]
     */
    public function removeDataProvider(): array
    {
        return [
            'subject does not contain prefix' => [
                'subject' => 'subject-content',
                'expectedSubject' => 'subject-content',
            ],
            'subject does not start with prefix' => [
                'subject' => 'subject-content ' . self::PREFIX,
                'expectedSubject' => 'subject-content prefix-content',
            ],
            'subject starts with prefix' => [
                'subject' => self::PREFIX . ' subject-content',
                'expectedSubject' => ' subject-content',
            ],
        ];
    }
}
