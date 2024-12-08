<?php

namespace App\Products\Enums;

use App\Products\Enums\Attributes\Description;
use App\Services\ProductService;

enum Status: string
{
    #[Description('Draft')]
    #[ProductService('Draft')]
    case DRAFT = 'draft';

    #[Description('Published')]
    #[ProductService('Published')]
    case PUBLISHED = 'published';

    #[Description('Archived')]
    #[ProductService('Archived')]
    case ARCHIVED = 'archived';


    public function getDescription(): string
    {
        $reflection = new \ReflectionEnum($this);
        $case = $reflection->getReflectionConstant($this->name);
        $attributes = $case->getAttributes(Description::class);

        return $attributes[0]->newInstance()->description;
    }

    public function getProductService(): string
    {
        $reflection = new \ReflectionEnumUnitCase($this, $this->name);
        $attributes = $reflection->getAttributes(ProductService::class);

        if(count($attributes) === 0) {
            return '';
        }

        return $attributes[0]->newInstance()->process();
    }
}
