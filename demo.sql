CREATE DATABASE demo;

USE demo;

CREATE TABLE `user` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `fullName` VARCHAR(255) NOT NULL,
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

CREATE TABLE `application` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `userId` INT NOT NULL,
    `categoryId` INT NOT NULL,
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status` SET('Новая','Принято в работу','Выполнено') NOT NULL DEFAULT 'Новая',
    `pictureApplication` VARCHAR(255) NOT NULL,
    `pictureDesign` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `application` ADD INDEX(`userId`);

ALTER TABLE `application` ADD INDEX(`categoryId`);

ALTER TABLE `application` ADD FOREIGN KEY (`userId`)
    REFERENCES `user`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `application` ADD FOREIGN KEY (`categoryId`)
    REFERENCES `category`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `user` (`fullName`, `login`, `email`, `password`, `adminRights`)
    VALUES ('Иванов Иван Иванович', 'admin', 'admin@gmail.com', 'adminWSR', '1');
