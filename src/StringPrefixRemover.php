<?php

declare(strict_types=1);

namespace webignition\StringPrefixRemover;

class StringPrefixRemover
{
    public static function remove(string $prefix, string $subject): string
    {
        return (string) preg_replace('/^' . preg_quote($prefix, '/') . '/', '', $subject);
    }
}
