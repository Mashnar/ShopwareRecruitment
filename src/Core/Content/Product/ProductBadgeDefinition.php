<?php
declare(strict_types=1);

namespace ShopwareRecruitmentPlugin\Core\Content\Product;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use ShopwareRecruitmentPlugin\Core\Content\Product\Aggregate\ProductBadgeTranslation\ProductBadgeTranslationDefinition;

class ProductBadgeDefinition extends EntityDefinition
{

    public const ENTITY_NAME = 'product_badge';

    public function getEntityName(): string
    {
        return ProductBadgeEntity::class;
    }

    public function getCollectionClass(): string
    {
        return ProductBadgeCollection::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            (new FkField('product_id', 'productId', ProductDefinition::class)),
            (new StringField('name', 'name')),
            (new TranslatedField('name'))->addFlags(new ApiAware(), new Required()),
            (new TranslationsAssociationField(
                ProductBadgeTranslationDefinition::class,
                'product_badge_id'
            ))->addFlags(new ApiAware(), new Required())

        ]);
    }
}
