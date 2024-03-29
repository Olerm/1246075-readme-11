CREATE DATABASE readme;
USE readme;

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
regdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
email VARCHAR(128) NOT NULL UNIQUE,
login VARCHAR(128) NOT NULL UNIQUE,
password VARCHAR(128) NOT NULL,
avatar VARCHAR(128)
);

CREATE TABLE posts (
id INT AUTO_INCREMENT PRIMARY KEY,
postdate TIMESTAMP,
title VARCHAR(128),
content VARCHAR(512),
citeauthor VARCHAR(128),
image VARCHAR(128),
video VARCHAR(128),
link VARCHAR(128),
views INT,

user_id INT,
conttype_id INT
);

CREATE TABLE posthashs (
id INT AUTO_INCREMENT PRIMARY KEY,
post_id INT,
hashs_id INT
);

CREATE TABLE comments (
id INT AUTO_INCREMENT PRIMARY KEY,
commentdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
content VARCHAR(128),

user_id INT,
post_id INT
);

CREATE TABLE likes (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
post_id INT
);

CREATE TABLE subs (
id INT AUTO_INCREMENT PRIMARY KEY,
userwho_id INT,
userto_id INT
);

CREATE TABLE mails (
id INT AUTO_INCREMENT PRIMARY KEY,
maildate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
content VARCHAR(512),

userwho_id INT,
userto_id INT
);

CREATE TABLE hashs (
id INT AUTO_INCREMENT PRIMARY KEY,
hash VARCHAR(128)
);

CREATE TABLE conttype (
id INT AUTO_INCREMENT PRIMARY KEY,
typename VARCHAR(128),
icon VARCHAR(128)
);