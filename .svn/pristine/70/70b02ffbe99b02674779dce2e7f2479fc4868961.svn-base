CREATE DATABASE eproject1;

USE eproject1;

CREATE TABLE `Product` (
  ProductID INT AUTO_INCREMENT PRIMARY KEY ,
  `Name` VARCHAR(100) NOT NULL ,
	`Color` VARCHAR(15) NOT NULL ,
	`Size` VARCHAR(10) NOT NULL ,
	`Price` VARCHAR(200) NOT NULL ,
	`Type` VARCHAR(50) NOT NULL ,
	`Image` VARCHAR(200) NOT NULL ,
	`ProductDescription` VARCHAR(10000) NOT NULL,
	FOREIGN KEY (`Type`) REFERENCES `Category`(`Type`)
);

CREATE TABLE `Category` (
	`Type` VARCHAR(50) PRIMARY KEY
)

CREATE TABLE `TemporaryTable` SELECT Email FROM `admin`;
DELETE FROM `TemporaryTable` WHERE Email = 'admin@gmail.com';
SELECT * FROM `TemporaryTable` WHERE Email = 'admin1@gmail.com';
eproject1DROP TABLE `TemporaryTable`;

CREATE TABLE `product_img` (
	imgID INT PRIMARY KEY AUTO_INCREMENT ,
	img_link VARCHAR(1000) NOT NULL ,
	ProductID INT,
	FOREIGN KEY (ProductID) REFERENCES `Product`(ProductID)
)