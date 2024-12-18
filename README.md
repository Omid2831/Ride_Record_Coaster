# Rollercoaster of EU Database Project

## Table of Contents
1. [Overview](#overview)
2. [Project Structure](#project-structure)
3. [Getting Started](#getting-started)
4. [Database Setup](#database-setup)
5. [Table Schema](#table-schema)
6. [Data Insertion](#data-insertion)
7. [CRUD Operations](#crud-operations)
8. [Contributing](#contributing)
9. [License](#license)

## Overview
This project establishes a MySQL database to store and manage roller coaster information across Europe. It consists of three key steps: database creation, table setup, and data insertion.

## Project Structure
```markdown
rollercoaster-of-eu/
|---- README.md
|---- database/
|       |---- create_database.sql
|       |---- create_table.sql
|       |---- insert_data.sql
|---- LICENSE
```

## Getting Started
To get started with this project, you will need to have MySQL installed on your system. You can download the MySQL Community Server from the official MySQL website.

## Database Setup
To set up the database, run the following SQL command:
```sql
CREATE DATABASE rollercoaster_2408c;
```
This will create a new database named `rollercoaster_2408c`.

## Table Schema
The table schema for the `RollercoasterOfEu` table is as follows:
```sql
CREATE TABLE RollercoasterOfEu (
  id INT AUTO_INCREMENT,
  name VARCHAR(255),
  park VARCHAR(255),
  country VARCHAR(255),
  top_speed INT,
  height INT,
  status VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);
```
This table has fields for each roller coaster's name, park, country, top speed, height, status, and timestamps.

## Data Insertion
To insert data into the `RollercoasterOfEu` table, run the following SQL command:
```sql
INSERT INTO RollercoasterOfEu (name, park, country, top_speed, height, status)
VALUES ('Red Force', 'PortAventura World', 'Spain', 180, 112, 'Active');
```
This will insert a sample entry for "Red Force" in Spain.

## CRUD Operations
This project lays the groundwork for effective CRUD (Create, Read, Update, Delete) operations within the `rollercoaster_2408c` database.

## Contributing
Contributions are welcome! If you would like to contribute to this project, please fork the repository and submit a pull request.

## License
This project is licensed under the MIT License. See the LICENSE file for more information.