-- create and select the database
DROP DATABASE IF EXISTS jewelry_store;
CREATE DATABASE jewelry_store;
USE jewelry_store;  -- MySQL command

-- create the tables
CREATE TABLE jewelryCategories (
  jewelryCategoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  jewelryCategoryName     VARCHAR(255)   NOT NULL,
  dateAdded          	  DATETIME       NOT NULL,
  PRIMARY KEY (jewelryCategoryID)
);

CREATE TABLE jewelry (
  jewelryID        	INT(11)        NOT NULL   AUTO_INCREMENT,
  jewelryCategoryID	INT(11)        NOT NULL,
  jewelryCode      	VARCHAR(10)    NOT NULL   UNIQUE,
  jewelryName      	VARCHAR(255)   NOT NULL,
  description        	TEXT           NOT NULL,
  price              	DECIMAL(10,2)  NOT NULL,
  dateAdded          	DATETIME       NOT NULL,
  PRIMARY KEY (jewelryID)
);

-- create the user
CREATE USER IF NOT EXISTS web_user@localhost 
IDENTIFIED BY 'pa55word';

-- grant privileges to the user
GRANT SELECT, INSERT, DELETE, UPDATE
ON * 
TO web_user@localhost;
-- END OF CREATING DATABASE --

-- INSERT COMMANDS --

--add the product to the database
INSERT INTO jewelryCategories
(jewelryCategoryName,dateAdded)
VALUES
('Necklaces', NOW() );

--add the product to the database
INSERT INTO jewelryCategories
(jewelryCategoryName,dateAdded)
VALUES
('Rings', NOW() );

--add the product to the database
INSERT INTO jewelryCategories
(jewelryCategoryName,dateAdded)
VALUES
('Earrings', NOW() );

--add the product to the database
INSERT INTO jewelryCategories
(jewelryCategoryName,dateAdded)
VALUES
('Braclet', NOW() );

--add the product to the database
INSERT INTO jewelryCategories
(jewelryCategoryName,dateAdded)
VALUES
('Anklet', NOW() );

-- ADDING ITEMS INTO EACH CATEGORY --
-- JEWELRYCODE RANDOM NUMBER GENERATOR COMMAND BORROWED FROM SOURCE: https://www.queryexamples.com/sql/select/sql-random-number-between-1000-and-9999/ --
--Rings--
INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
(2, 2134, "Ring", "Amethyst Diamond 14k Gold Ring", 1099.99, NOW());

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Rings'), 5867, "Ruby Ring", "Ruby 14k White Gold Ring", 1799.99, NOW());

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Rings'), (SELECT floor(rand()*9000) + 1000), "Emerald Ring", "Emerald Diamond 14k White Gold Ring", 2399.99, NOW());

INSERT INTO jewelry
(jewelryID,jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES --An input got messed up before where ID 2 was skipped so I had to explicitly define ID 2.
(2,(SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Rings'), (SELECT floor(rand()*9000) + 1000), "Sapphire Ring", "Sapphire Diamond 14k Gold Ring", 2399.99, NOW());

--Necklaces--

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Necklaces'), (SELECT floor(rand()*9000) + 1000), "Multistone Necklace", '22" Multistone Purple Necklace with alternating Pearls, Carnelian, and Hematite stones', (SELECT floor(rand()*900)+100), NOW());


INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Necklaces'), (SELECT floor(rand()*9000) + 1000), " Necklace", '', (SELECT floor(rand()*900)+100.99), NOW());

