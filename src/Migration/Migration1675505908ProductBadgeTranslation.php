<?php declare(strict_types=1);

namespace ShopwareRecruitmentPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1675505908ProductBadgeTranslation extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1675505908;
    }

    public function update(Connection $connection): void
    {
        $query = <<<SQL
CREATE TABLE IF NOT EXISTS `product_badge_translation` (
    `product_badge_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    `name` VARCHAR(255),
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`product_badge_id`, `language_id`),
    CONSTRAINT `fk.product_badge_translation.product_badge_id` FOREIGN KEY (`product_badge_id`)
        REFERENCES `product_badge` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk.product_badge_translation.language_id` FOREIGN KEY (`language_id`)
        REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;
SQL;
        $connection->executeStatement($query);
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
