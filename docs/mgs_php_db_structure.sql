SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `mgs_php_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `mgs_php_db`;

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `id_game` int NOT NULL,
  `id_user` int NOT NULL,
  `datatime_write` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name_comment` varchar(100) NOT NULL,
  `text_comment` text NOT NULL,
  `likes` int NOT NULL,
  `dislikes` int NOT NULL,
  `is_positive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `companies_create` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `year_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `companies_publish` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `year_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `games` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_relize` date NOT NULL,
  `id_company_creator` int NOT NULL,
  `id_company_publisher` int NOT NULL,
  `is_tablet` tinyint(1) NOT NULL,
  `datatime_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_add` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `game_genres` (
  `id` int NOT NULL,
  `id_game` int NOT NULL,
  `id_genre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `game_subtitles_lang` (
  `id` int NOT NULL,
  `id_game` int NOT NULL,
  `id_lang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `game_tags` (
  `id` int NOT NULL,
  `id_game` int NOT NULL,
  `id_tags` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `game_text_lang` (
  `id` int NOT NULL,
  `id_game` int NOT NULL,
  `id_lang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `game_voice_lang` (
  `id` int NOT NULL,
  `id_game` int NOT NULL,
  `id_lang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `genres` (
  `id` int NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `langs` (
  `id` int NOT NULL,
  `lang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `system_requare` (
  `id` int NOT NULL,
  `id_game` int NOT NULL,
  `os` varchar(75) NOT NULL,
  `cpu` varchar(75) NOT NULL,
  `ram` varchar(75) NOT NULL,
  `memory` varchar(75) NOT NULL,
  `videocard` varchar(75) NOT NULL,
  `directx` varchar(75) NOT NULL,
  `soundsys` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `tag` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass_hash` varchar(100) NOT NULL,
  `avatar` int NOT NULL,
  `datatime_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_game_index` (`id_game`),
  ADD KEY `id_user_index` (`id_user`);

ALTER TABLE `companies_create`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `companies_publish`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_company_creator_index` (`id_company_creator`),
  ADD KEY `id_company_publisher_index` (`id_company_publisher`),
  ADD KEY `user_add_index` (`user_add`);

ALTER TABLE `game_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_game_index` (`id_game`),
  ADD KEY `id_genre_index` (`id_genre`);

ALTER TABLE `game_subtitles_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_game_index` (`id_game`),
  ADD KEY `id_lang_index` (`id_lang`);

ALTER TABLE `game_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_game_index` (`id_game`),
  ADD KEY `id_tags_index` (`id_tags`);

ALTER TABLE `game_text_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_game_index` (`id_game`),
  ADD KEY `id_lang_index` (`id_lang`);

ALTER TABLE `game_voice_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_game_index` (`id_game`),
  ADD KEY `id_lang_index` (`id_lang`);

ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `langs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `system_requare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_game_index` (`id_game`);

ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `companies_create`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `companies_publish`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `games`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `game_genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `game_subtitles_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `game_tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `game_text_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `game_voice_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `langs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `system_requare`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;


ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_game`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`id_company_publisher`) REFERENCES `companies_publish` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `games_ibfk_2` FOREIGN KEY (`id_company_creator`) REFERENCES `companies_create` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `games_ibfk_3` FOREIGN KEY (`user_add`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `game_genres`
  ADD CONSTRAINT `game_genres_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_genres_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `game_subtitles_lang`
  ADD CONSTRAINT `game_subtitles_lang_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_subtitles_lang_ibfk_2` FOREIGN KEY (`id_lang`) REFERENCES `langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `game_tags`
  ADD CONSTRAINT `game_tags_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_tags_ibfk_2` FOREIGN KEY (`id_tags`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `game_text_lang`
  ADD CONSTRAINT `game_text_lang_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_text_lang_ibfk_2` FOREIGN KEY (`id_lang`) REFERENCES `langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `game_voice_lang`
  ADD CONSTRAINT `game_voice_lang_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_voice_lang_ibfk_2` FOREIGN KEY (`id_lang`) REFERENCES `langs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `system_requare`
  ADD CONSTRAINT `system_requare_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
