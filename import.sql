CREATE TABLE `participants`(
    `participant_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `discord_id` VARCHAR(255) NOT NULL,
    `data` BIGINT NULL,
    `balance` BIGINT NULL,
    `donation` BIGINT NULL,
    `unclaimed` BIGINT NOT NULL
);
CREATE TABLE `treasury`(
    `action_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT NULL,
    `event_id` BIGINT NULL,
    `title` VARCHAR(255) NULL,
    `description` VARCHAR(255) NULL,
    `type` VARCHAR(255) NOT NULL,
    `amount` BIGINT NOT NULL
);
CREATE TABLE `events`(
    `event_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `event_desc` VARCHAR(255) NULL,
    `event_budget` VARCHAR(255) NULL,
    `creator_id` BIGINT NOT NULL,
    `event_start_date` DATETIME NOT NULL,
    `expiry` DATETIME NULL
);
CREATE TABLE `users`(
    `user_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL
    `hash` VARCHAR(255) NOT NULL,
    `ipaddr` VARCHAR(255) NOT NULL,
    `last_login` VARCHAR(255) NOT NULL
);
CREATE TABLE `participation`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `participant_id` VARCHAR(255) NOT NULL,
    `event_id` BIGINT NOT NULL,
    `timestamp` DATETIME NOT NULL
);
CREATE TABLE `actionlog`(
    `log_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `action_id` BIGINT NOT NULL,
    `user_id` BIGINT NOT NULL,
    `event_id` BIGINT NULL,
    `timestamp` DATETIME NOT NULL
);