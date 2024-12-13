
CREATE DATABASE IF NOT EXISTS install CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE install;

CREATE TABLE install_test
(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date INT(16) UNSIGNED DEFAULT 0,
    content VARCHAR(20) NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO install_test(date, content) VALUES (1733560065, 'TEST')
