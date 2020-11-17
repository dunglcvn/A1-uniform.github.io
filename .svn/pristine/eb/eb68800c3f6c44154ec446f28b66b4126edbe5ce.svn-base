USE eproject1;

CREATE TABLE product(
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY ,
	catalog_id INT NOT NULL,
	`name` VARCHAR(50) NOT NULL,
	color VARCHAR(50) NOT NULL,
	size VARCHAR(50) NOT NULL ,
	price VARCHAR(50) NOT NULL,
	`type` VARCHAR(50) NOT NULL,
	img VARCHAR(500) NOT NULL,
	 FOREIGN KEY (catalog_id) REFERENCES catalog(catalog_id)  
);

SELECT `img_link`, `ProductID` FROM `product_img`;

CREATE TABLE member(
	memID INT AUTO_INCREMENT PRIMARY KEY ,
	Username VARCHAR(100) NOT NULL ,
	`Password` VARCHAR(100) NOT NULL ,
	`Name` VARCHAR(50) NOT NULL ,
	`Phone` VARCHAR(20) NOT NULL ,
	`Email` VARCHAR(100) NOT NULL ,
	`Address` VARCHAR(100) NOT NULL 
);

SELECT * FROM `admin` WHERE `Username` = "admin"; 