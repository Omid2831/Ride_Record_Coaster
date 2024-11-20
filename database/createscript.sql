-- Step 1 
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

-- Step 2 
-- ***********************
-- Aim : creating a Table on this folder 
-- ***********************
-- Version             Date                Authour          Description
-- *******             ****                *******          ***********
-- 1.0.0.0              13-11-2024          OmidMhr         Achtbaan of EU 
-- ***********************
create table RollercoasterOfEu (
    Id smallint unsigned not null AUTO_INCREMENT,
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

-- Step 3 
-- ***********************
-- Aim : Fill in the Table with some data
-- ***********************
-- Version             Date                Authour          Description
-- *******             ****                *******          ***********
-- 1.0.0.0              13-11-2024          OmidMhr         rollercoaster of EU 
-- ***********************
insert into
    RollercoasterOfEu (
        Name_ID,
        park,
        country,
        topspeed,
        height,
        IsActive,
        Remark,
        CreatedDate,
        UpdatedDate,
    )
values
    (
        "red Force",
        "Ferrari Land",
        "Spain",
        180,
        112,
        1,
        null,
        sysdate(6),
        sysdate(6)
    ),
    (
        "Hyperion",
        "Energyland",
        "Polen",
        142,
        77,
        1,
        null,
        sysdate(6),
        sysdate(6)
    ),
    (
        "Shambhala",
        "PortAventura",
        "Spain",
        134,
        76,
        1,
         null,
        sysdate(6),
        sysdate(6)
    ),
    (
     "Schwur des Kärnan",
     "Hansa-Park",
        "Germany",
        127,
        73,
        1,
         null,
        sysdate(6),
        sysdate(6)
    )
    
