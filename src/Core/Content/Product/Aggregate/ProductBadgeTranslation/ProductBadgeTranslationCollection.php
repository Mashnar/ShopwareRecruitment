<?php
declare(strict_types=1);

namespace ShopwareRecruitmentPlugin\Core\Content\Product\Aggregate\ProductBadgeTranslation;

use Shopware\Core\Content\Product\Aggregate\ProductTranslation\ProductTranslationEntity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

class ProductBadgeTranslationCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return ProductTranslationEntity::class;
    }
}
