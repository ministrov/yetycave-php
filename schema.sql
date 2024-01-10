CREATE DATABASE yeticave;
USE yeticave;

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  character_code VARCHAR(128) UNIQUE,
  name_category VARCHAR(128)
);

CREATE TABLE users ();

CREATE TABLE bets ();

CREATE TABLE lots ();