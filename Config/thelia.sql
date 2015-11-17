
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- product_registration
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `product_registration`;

CREATE TABLE `product_registration`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `transceiver_id` INTEGER NOT NULL,
    `serial_number` VARCHAR(50) NOT NULL,
    `date_purchase` DATE,
    `antenna_id` INTEGER,
    `other_antenna` VARCHAR(255),
    `where_purchase` VARCHAR(255),
    `customer_id` INTEGER NOT NULL,
    `warranty` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `product_registration_U_1` (`serial_number`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
