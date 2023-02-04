<?php
declare(strict_types=1);

namespace ShopwareRecruitmentPlugin\Service;

use App\Product;
use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\Context;
use Psr\Container\ContainerInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\IdSearchResult;
use Shopware\Core\System\CustomField\CustomFieldTypes;

class ProductCustomFields
{
    public const LABEL_CUSTOM_FIELD_KEY = 'label';
    public const ONE_CUSTOM_FIELD_KEY = 'description';

    protected ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function installCustomFields(Context $context): void
    {
        $searchResults = $this->getCustomFields($context);
        if ($searchResults->getTotal() === 0) {
            $customField = [
                'name' => self::LABEL_CUSTOM_FIELD_KEY,
                'active' => false,
                'relations' => [
                    [
                        'entityName' => 'product'
                    ]
                ],
                'customFields' => [
                    [
                        'name' => self::ONE_CUSTOM_FIELD_KEY,
                        'type' => CustomFieldTypes::TEXT,
                    ]
                ]
            ];
            $this->container->get('custom_field_set.repository')->create([$customField], $context);
        }
    }

    public function activateCustomFields(Context $context): void
    {
        $this->setCustomFieldsActivate(
            $this->getCustomFields($context)->getIds(), true, $context);
    }

    public function deactivateCustomFields(Context $context): void
    {
        $this->setCustomFieldsActivate(
            $this->getCustomFields($context)->getIds(), false, $context);
    }

    public function uninstallCustomFields(Context $context): void
    {
        $customFieldsIds = $this->getCustomFields($context)->getIds();
        if (count($customFieldsIds) !== 0) {
            $this->container->get('custom_field_set.repository')->delete([[
                'id' => $customFieldsIds[0]
            ]], $context);
        }
    }

    private function setCustomFieldsActivate(array $customFieldsIds, bool $active, Context $context): void
    {
        $this->container->get('custom_field_set.repository')->update([[
            'id' => $customFieldsIds[0],
            'active' => $active
        ]], $context);
    }

    private function getCustomFields(Context $context): IdSearchResult
    {
        return $this->container->get('custom_field_set.repository')->searchIds(
            (new Criteria())->addFilter(new EqualsFilter(
                'name', self::LABEL_CUSTOM_FIELD_KEY)), $context);
    }

}
