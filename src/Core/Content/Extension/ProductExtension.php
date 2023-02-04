<?php
declare(strict_types=1);

namespace ShopwareRecruitmentPlugin\Core\Content\Extension;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use ShopwareRecruitmentPlugin\Core\Content\Product\ProductBadgeDefinition;

class ProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new OneToOneAssociationField('product_id', ProductBadgeDefinition::class, 'id',ProductDefinition::class))
        );
    }

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }
}
