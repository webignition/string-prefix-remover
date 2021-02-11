<?php

declare(strict_types=1);

namespace webignition\StringPrefixRemover;

class DefinedStringPrefixRemover
{
    private string $prefix;

    public function __construct(string $prefix)
    {
        $this->prefix = $prefix;
    }

    public function remove(string $subject): string
    {
        return StringPrefixRemover::remove($this->prefix, $subject);
    }
}
