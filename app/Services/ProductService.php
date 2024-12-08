<?php

namespace App\Services;

use Attribute;

#[Attribute]
class ProductService
{
    public function __construct(public string $name) {}

    public function process(): string
    {
        return $this->name . ' ProductService';
    }
}
