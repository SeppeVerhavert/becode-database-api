CREATE DATABASE IF NOT EXISTS 'notesDB';

CREATE TABLE IF NOT EXISTS 'notesTB' (
    title VARCHAR(30) NOT NULL,
    id SMALLINT NOT NULL AUTO_INCREMENT,
    modifieddate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    note VARCHAR(MAX) DEFAULT NULL,
    PRIMARY KEY (id)
)