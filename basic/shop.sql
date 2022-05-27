CREATE DATABASE shop;

USE shop;

CREATE TABLE `user` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `surname` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `patronymic` VARCHAR(255),
    `login` VARCHAR(255) NOT NULL UNIQUE,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `adminRights` BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `category` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL UNIQUE,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `product` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `year` INT(4) NOT NULL,
    `publishingHouse` VARCHAR(255) NOT NULL,
    `antagonist` VARCHAR(255) NOT NULL,
    `categoryId` INT NOT NULL,
    `price` FLOAT NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `picture` VARCHAR(255) NOT NULL,
    `count` INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `product` ADD INDEX(`categoryId`);

ALTER TABLE `product` ADD FOREIGN KEY (`categoryId`)
    REFERENCES `category`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `order` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `userId` INT NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status` SET('Новый','Подтвержденный','Отмененный') NOT NULL DEFAULT 'Новый',
    `amount` FLOAT NOT NULL,
    `reason` TEXT,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `order` ADD INDEX(`userId`);

ALTER TABLE `order` ADD FOREIGN KEY (`userId`)
    REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `order_product` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `orderId` INT NOT NULL,
    `productId` INT NOT NULL,
    `count` INT NOT NULL,
    `amount` FLOAT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `order_product` ADD INDEX(`orderId`);

ALTER TABLE `order_product` ADD INDEX(`productId`);

ALTER TABLE `order_product` ADD FOREIGN KEY (`orderId`)
    REFERENCES `order`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `order_product` ADD FOREIGN KEY (`productId`)
    REFERENCES `product`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `category` (`title`)
    VALUES ('Marvel'), ('DC'), ('Other');

INSERT INTO `user` (`surname`, `name`, `patronymic`, `login`, `email`, `password`, `adminRights`)
    VALUES ('Иванов', 'Иван', 'Иванович', 'admin', 'admin@gmail.com', 'admin', '1');
