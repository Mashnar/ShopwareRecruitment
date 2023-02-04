<?php declare(strict_types=1);

namespace ShopwareRecruitmentPlugin\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1675370235ProductBadge extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1675370235;
    }

    public function update(Connection $connection): void
    {
        $query = <<<SQL
CREATE TABLE IF NOT EXISTS `product_badge` (
    `id` BINARY(16) NOT NULL,
    `name`   VARCHAR(255)  NOT NULL COLLATE utf8mb4_unicode_ci,
    `product_id`   INT  NOT NULL,
    PRIMARY KEY (`id`)
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
