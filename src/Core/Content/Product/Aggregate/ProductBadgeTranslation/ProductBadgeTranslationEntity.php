<?php
declare(strict_types=1);

namespace ShopwareRecruitmentPlugin\Core\Content\Product\Aggregate\ProductBadgeTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\TranslationEntity;
use ShopwareRecruitmentPlugin\Core\Content\Product\ProductBadgeEntity;

class ProductBadgeTranslationEntity extends  TranslationEntity
{
    protected string $productBadgeId;

    protected ?string $name;

    protected ProductBadgeEntity $productBadge;

    public function getProductBadgeId(): string
    {
        return $this->productBadgeId;
    }

    public function setProductBadgeId(string $productBadgeId): void
    {
        $this->productBadgeId = $productBadgeId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getProductBadge(): ProductBadgeEntity
    {
        return $this->productBadge;
    }

    public function setProductBadge(ProductBadgeEntity $productBadge): void
    {
        $this->productBadge = $productBadge;
    }
}
