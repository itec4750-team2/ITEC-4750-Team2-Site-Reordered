-- the code below erases the database and creates a new blank one
-- use the ITEC 4750 DB Setup to populate it with initial data

drop database if exists mga_db;
create database mga_db;

-- Uncomment the lines below to setup the initial user account within the database that the website utilizes

-- CREATE USER 'user1'@'localhost' IDENTIFIED BY 'thisuser';
-- GRANT ALL PRIVILEGES ON * . * TO 'user1'@'localhost';
-- FLUSH PRIVILEGES;

