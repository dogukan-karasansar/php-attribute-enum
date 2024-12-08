<?php

namespace App\Products\Enums\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS_CONSTANT)]
class Description
{
    public function __construct(public string $description) {}
}
