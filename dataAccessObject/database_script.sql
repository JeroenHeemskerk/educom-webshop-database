create database abdel_websho;
use abdel_webshop;
CREATE TABLE users (
    user_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255)NOT NULL
);
alter table users add unique (email);