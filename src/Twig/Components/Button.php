<?php

namespace App\Twig\Components;

class Button
{
    public string $text;

    public function __construct(string $text, string $type = '')
    {
        $this->text = $text;
    }
}
 