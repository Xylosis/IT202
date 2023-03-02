--THIS FILE IS TO KEEP TRACK OF EVERY SQL QUERY COMMITTED TO THE DATABASE--

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
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Necklaces'), (SELECT floor(rand()*9000) + 1000), "Finite Necklace", '19" 14k Gold Finite Engraved with Embedded Diamonds', (SELECT floor(rand()*900)+100.99), NOW());

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Necklaces'), (SELECT floor(rand()*9000) + 1000), "Ruby Sapphire Necklace", '16" Ruby Sapphire alternate pattern Necklace', (SELECT floor(rand()*900)+100.99), NOW());

--Earrings--

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Earrings'), (SELECT floor(rand()*9000) + 1000), "Black Diamond Studs", "6mm Black Diamond Stud Earrign with 14k White Gold", (SELECT floor(rand()*900)+100.99), NOW());

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Earrings'), (SELECT floor(rand()*9000) + 1000), "Rose Gold Hoops", '20mm Rose Gold Dangling Hoops', (SELECT floor(rand()*900)+100.99), NOW());

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Earrings'), (SELECT floor(rand()*9000) + 1000), "Ruby Black Diamond Studs", '5mm Ruby and Black Diamond Studs with 24k White Gold', (SELECT floor(rand()*9000)+1000.99), NOW());

--Braclets--

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Braclet'), (SELECT floor(rand()*9000) + 1000), "Rose Gold Infinity Bracelet", '14k Rose Gold Bracelet with Infinity Design twists on front.', (SELECT floor(rand()*500)+100.99), NOW());

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Braclet'), (SELECT floor(rand()*9000) + 1000), "Amethyst and White Gold Bracelet", 'Amethyst and 24k White Gold mixture entangled design bracelet', (SELECT floor(rand()*1500)+1000.99), NOW());

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Braclet'), (SELECT floor(rand()*9000) + 1000), "Platinum Bracelet", 'Solid Platinum Bracelet', (SELECT floor(rand()*700)+100.99), NOW());

--Anklets--

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Anklet'), (SELECT floor(rand()*9000) + 1000), "Five Point Gold Anklet", 'Five point anklet with 14k gold', (SELECT floor(rand()*200)+100.99), NOW());

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Anklet'), (SELECT floor(rand()*9000) + 1000), "Diamond and Rose Gold Anklet", 'Intertwined Diamond and 24k Rose Gold Anklet', (SELECT floor(rand()*900)+800.99), NOW());

INSERT INTO jewelry
(jewelryCategoryID, jewelryCode, jewelryName, description, price, dateAdded)
VALUES
((SELECT jewelryCategoryID FROM jewelryCategories WHERE jewelryCategoryName = 'Anklet'), (SELECT floor(rand()*9000) + 1000), "Finite Sterling Silver Anklet", 'Sterling Silver Anklet with Finite Symbol', (SELECT floor(rand()*100)+129.99), NOW());

--Fixing my dumb spelling mistake on bracelet--

UPDATE jewelryCategories SET jewelryCategoryName = 'Bracelet' WHERE jewelryCategoryID = 4