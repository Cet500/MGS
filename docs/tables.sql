CREATE TABLE `mgs_php_db`.`users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`lastname` VARCHAR(100) NOT NULL,
	`login` VARCHAR(100) NOT NULL,
	`pass_hash` VARCHAR(100) NOT NULL,
	`avatar` INT NOT NULL,
	`datatime_reg` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `mgs_php_db`.`comments` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_game` INT NOT NULL,
	`id_user` INT NOT NULL,
	`datatime_write` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`name_comment` VARCHAR(100) NOT NULL,
	`text_comment` TEXT NOT NULL,
	`likes` INT NOT NULL,
	`dislikes` INT NOT NULL,
	`is_positive` BOOLEAN NOT NULL,
	INDEX `id_game_index` (`id_game`),
	INDEX `id_user_index` (`id_user`),
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `mgs_php_db`.`game_tags` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_game` INT NOT NULL,
	`id_tags` INT NOT NULL,
	INDEX `id_game_index` (`id_game`),
	INDEX `id_tags_index` (`id_tags`),
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `mgs_php_db`.`tags` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`tag` VARCHAR(100) NOT NULL,
	`description` TEXT NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `mgs_php_db`.`system_requare` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_game` INT NOT NULL,
	`os` VARCHAR(75) NOT NULL,
	`cpu` VARCHAR(75) NOT NULL,
	`ram` VARCHAR(75) NOT NULL,
	`memory` VARCHAR(75) NOT NULL,
	`videocard` VARCHAR(75) NOT NULL,
	`directx` VARCHAR(75) NOT NULL,
	`soundsys` VARCHAR(75) NOT NULL,
	INDEX `id_game_index` (`id_game`),
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `mgs_php_db`.`game_genres` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_game` INT NOT NULL,
	`id_genre` INT NOT NULL,
	INDEX `id_game_index` (`id_game`),
	INDEX `id_genre_index` (`id_genre`),
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `mgs_php_db`.`game_subtitles_lang` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_game` INT NOT NULL,
	`id_lang` INT NOT NULL,
	INDEX `id_game_index` (`id_game`),
	INDEX `id_lang_index` (`id_lang`),
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `mgs_php_db`.`game_voice_lang` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_game` INT NOT NULL,
	`id_lang` INT NOT NULL,
	INDEX `id_game_index` (`id_game`),
	INDEX `id_lang_index` (`id_lang`),
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `mgs_php_db`.`game_text_lang` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_game` INT NOT NULL,
	`id_lang` INT NOT NULL,
	INDEX `id_game_index` (`id_game`),
	INDEX `id_lang_index` (`id_lang`),
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `mgs_php_db`.`langs` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`lang` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `mgs_php_db`.`genres` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`genre` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `mgs_php_db`.`companies_publish` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`description` TEXT NOT NULL,
	`year_create` DATE NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `mgs_php_db`.`companies_create` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`description` TEXT NOT NULL,
	`year_create` DATE NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `mgs_php_db`.`games` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`description` TEXT NOT NULL,
	`date_relize` DATE NOT NULL,
	`id_company_creator` INT NOT NULL,
	`id_company_publisher` INT NOT NULL,
	`is_tablet` BOOLEAN NOT NULL,
	`datatime_add` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`user_add` INT NOT NULL,
	INDEX `id_company_creator_index` (`id_company_creator`),
	INDEX `id_company_publisher_index` (`id_company_publisher`),
	INDEX `user_add_index` (`user_add`),
	PRIMARY KEY (`id`)
) ENGINE = InnoDB; 
