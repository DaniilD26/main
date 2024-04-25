<?php
namespace App\Generators;

class StringGenerator
{
    public function generate(): string
    {
        $letters = range('A', 'Z');
        $digits = range(0, 9);

        $string = $letters[array_rand($letters)] . $digits[array_rand($digits)] . $digits[array_rand($digits)];

        return $string;
    }
}