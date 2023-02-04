<?php
declare(strict_types=1);

namespace ShopwareRecruitmentPlugin\Core\Content\Product\Aggregate\ProductBadgeTranslation;
use Shopware\Core\Framework\DataAbstractionLayer\EntityTranslationDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use ShopwareRecruitmentPlugin\Core\Content\Product\ProductBadgeDefinition;

class ProductBadgeTranslationDefinition extends EntityTranslationDefinition
{

    public const ENTITY_NAME = 'product_badge_translation';

    public function getEntityName(): string
    {
        return ProductBadgeTranslationEntity::class;
        // TODO: Implement getEntityName() method.
    }

    public function getParentDefinitionClass(): string
    {
        return ProductBadgeDefinition::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new StringField('name', 'name'))->addFlags(new Required()),
        ]);
    }
}
