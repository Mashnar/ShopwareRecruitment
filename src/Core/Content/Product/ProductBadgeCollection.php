<?php
declare(strict_types=1);

namespace ShopwareRecruitmentPlugin\Core\Content\Product;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

class ProductBadgeCollection extends  EntityCollection
{
    protected function getExpectedClass(): string
    {
        return ProductBadgeEntity::class;
    }
}
