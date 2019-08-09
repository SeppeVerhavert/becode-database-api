CREATE DATABASE IF NOT EXISTS `note_db`;

CREATE TABLE IF NOT EXISTS `note_db`.`note_tb` (
    title VARCHAR(30) NOT NULL,
    id SMALLINT NOT NULL AUTO_INCREMENT,
    last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    note VARCHAR(1000),
    PRIMARY KEY (id)
);