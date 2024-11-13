# CRUD_PHP
--
Rollercoaster of EU Database Project
This project involves creating and populating a MySQL database dedicated to capturing data about roller coasters across Europe. Below is a step-by-step breakdown.

Project Steps
Step 1: Create the Database
Aim: Set up the initial database for storing roller coaster data.
Details:
Version: 1.0.0.0
Date: 13-11-2024
Author: OmidMhr
Description: Establishes the rollercoaster-2408c database.
sql
Copy code
-- Delete Database rollercoaster-2408c if exists
DROP DATABASE IF EXISTS `rollercoaster-2408c`;

-- Create Database
CREATE DATABASE `rollercoaster-2408c`;

-- Use Database
USE `rollercoaster-2408c`;
Step 2: Create the Table
Aim: Set up the table structure within the database to hold roller coaster data.
Details:
Version: 1.0.0.0
Date: 13-11-2024
Author: OmidMhr
Description: Defines the structure for the RollercoasterOfEu table.
sql
Copy code
CREATE TABLE RollercoasterOfEu (
    Id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    Name_ID VARCHAR(50) NOT NULL,
    park VARCHAR(50) NOT NULL,
    country VARCHAR(50) NOT NULL,
    topspeed TINYINT UNSIGNED NOT NULL,
    height TINYINT UNSIGNED NOT NULL,
    IsActive BIT NOT NULL DEFAULT 1,
    Remark VARCHAR(255) NULL DEFAULT NULL,
    CreatedDate DATETIME(6) NOT NULL,
    UpdatedDate DATETIME(6) NOT NULL,
    CONSTRAINT PK_RollercoasterOfEu_Id PRIMARY KEY CLUSTERED (Id)
) ENGINE = InnoDB;
Step 3: Insert Data into the Table
Aim: Populate the RollercoasterOfEu table with initial data entries.
Details:
Version: 1.0.0.0
Date: 13-11-2024
Author: OmidMhr
Description: Adds initial data for a roller coaster located in Spain.
sql
Copy code
INSERT INTO RollercoasterOfEu (
    Name_ID,
    park,
    country,
    topspeed,
    height,
    IsActive,
    Remark,
    CreatedDate,
    UpdatedDate
) VALUES (
    "Red Force",
    "Ferrari Land",
    "Spain",
    180,
    112,
    1, 
    NULL,
    SYSDATE(6),
    SYSDATE(6)
);
Notes
The RollercoasterOfEu table includes fields for the roller coaster's name, park location, country, top speed, height, active status, and timestamps for record creation and updates.
Primary Key: Id - auto-incremented to ensure unique records.
Constraints: The IsActive field indicates whether the roller coaster entry is active.
