-- Step one 
-- ***********************
-- Aim : creating a Datebaase on this folder 
-- ***********************
-- Version             Date                Authour          Description
-- *******             ****                *******          ***********
-- 1.0.0.0              13-11-2024          OmidMhr         rollercoaster of EU 
-- ***********************
-- Delete Datebase rollercoaster-2408c
drop database if exists `rollercoaster-2408c`;

-- Creating a DateBase First
create database `rollercoaster-2408c`;

-- Use Datebase rollercoaster-2408c
use `rollercoaster-2408c`;

-- Step two 
-- ***********************
-- Aim : creating a Table on this folder 
-- ***********************
-- Version             Date                Authour          Description
-- *******             ****                *******          ***********
-- 1.0.0.0              13-11-2024          OmidMhr         Achtbaan of EU 
-- ***********************
create table RollercoasterOfEu (
    Id smallint unsigned not null auto_increment,
    Name_ID varchar(50) not null,
    park varchar(50) not null,
    country varchar(50) not null,
    topspeed tinyint unsigned not null,
    height tinyint unsigned not null,
    IsActive bit not null default 1,
    Remark varchar(255) null default null,
    CreatedDate datetime(6) not null,
    UpdatedDate datetime(6) not null,
    constraint PK_RollercoassterOfEu_Id primary key clustered(Id)
) ENGINE = InnoDB;