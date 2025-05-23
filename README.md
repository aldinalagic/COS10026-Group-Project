# IMPORTANT: Cloning this repo:

1. Delete the `htdocs` folder. If you have anything in there save it somewhere else

2. Open the terminal at `xampfiles` and type: `git clone https://github.com/aldinalagic/COS10026-Group-Project.git htdocs` You want to do this because all contents in htdocs will be overrided with this repo's files instead.

3. You're all set!

<br>

You can find `xampfiles` folder when you click on `Open Application Folder` inside the XXAMP desktop interface, then just right-click and open the terminal there :)

<br>

## SQL stuff:

```sql
CREATE DATABASE glow_db;
USE glow_db;
CREATE TABLE eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    JobReferenceNumber VARCHAR(50) NOT NULL,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    StreetAddress VARCHAR(255),
    SuburbTown VARCHAR(100),
    State VARCHAR(50),
    Postcode VARCHAR(10),
    EmailAddress VARCHAR(100),
    PhoneNumber VARCHAR(20),
    Skill1 VARCHAR(100),
    Skill2 VARCHAR(100),
    Skill3 VARCHAR(100),
    OtherSkills TEXT,
    STATUS VARCHAR(20)
);
CREATE TABLE jobs (
    JobReferenceNumber VARCHAR(50) PRIMARY KEY NOT NULL,
    JobTitle VARCHAR(100),
    JobDescription VARCHAR(2000),
    IconPath VARCHAR(255),
    Color VARCHAR(20),
    BackgroundSVG VARCHAR(100)
);

CREATE TABLE managers (
    Email VARCHAR(150) PRIMARY KEY NOT NULL,
    Password VARCHAR(25),
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Avatar VARCHAR(2000)
);
```