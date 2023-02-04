<?php
declare(strict_types=1);

namespace ShopwareRecruitmentPlugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\DeactivateContext;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\Plugin;
use ShopwareRecruitmentPlugin\Service\ProductCustomFields;

class ShopwareRecruitmentPlugin extends Plugin
{
    public function install(InstallContext $installContext): void
    {
        (new ProductCustomFields($this->container))
            ->installCustomFields($installContext->getContext());
    }
    public function activate(ActivateContext $activateContext): void
    {
        (new ProductCustomFields($this->container))
            ->activateCustomFields($activateContext->getContext());
    }
    public function deactivate(DeactivateContext $deactivateContext): void
    {
        (new ProductCustomFields($this->container))
            ->deactivateCustomFields($deactivateContext->getContext());
    }
    public function uninstall(UninstallContext $uninstallContext): void
    {
        (new ProductCustomFields($this->container))
            ->uninstallCustomFields($uninstallContext->getContext());
    }
}
