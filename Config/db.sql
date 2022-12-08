CREATE DATABASE bibolet;

USE bibolet;

CREATE TABLE
    tShop(
        shopId varchar(50) NOT NULL PRIMARY KEY,
        shopBrand varchar(50) NULL,
        shopOwner varchar(50) NULL,
        shopEmail varchar(50) NULL,
        shopPhone varchar(50) NULL,
        shopPassword varchar(50) NULL,
        shopFullAddress varchar(50) NULL,
        shopSlogan varchar(50) NULL,
        shopLat varchar(50) NULL,
        shopLng varchar(50) NULL,
        isSeller TINYINT(1) NOT NULL DEFAULT 0,
        shopImageCover varchar(50) NULL,
        isSuspended TINYINT(1) NOT NULL DEFAULT 0,
    );

CREATE TABLE
    tCategory(
        catId varchar(50) PRIMARY KEY,
        catName varchar(50)
    );

CREATE TABLE
    tProduct(
        prodId varchar(50) NOT NULL PRIMARY KEY,
        catId VARCHAR(50) not NULL,
        prodName varchar(50) NOT NULL,
        prodmark varchar(50) NULL,
        prodPrice varchar(50) NOT NULL,
        prodOfferPrice varchar(50),
        isOffer TINYINT(1) NOT NULL DEFAULT 0,
        isValid TINYINT(1) NOT NULL DEFAULT 1,
        productImages varchar(50),
        productComment TEXT,
        FOREIGN KEY (catId) REFERENCES tCategory(catId)
    );

CREATE TABLE
    tCommand(
        cmdId varchar(50) NOT NULL PRIMARY KEY,
        prodId varchar(50) NOT NULL,
        shopId varchar(50) NOT NULL,
        cmdQuantity varchar(50) NOT NULL,
        cmdTotalPrice varchar(50) NOT NULL,
        cmdDate datetime NOT NULL default CURRENT_TIMESTAMP,
        cmdDeliveyPoint varchar(50) NULL,
        cmdDeliverLat varchar(50) NULL,
        cmdDeliverLng varchar(50) NULL,
        iscmdConfirmed TINYINT(1) NOT NULL DEFAULT 0,
        isPaid TINYINT(1) NOT NULL DEFAULT 0,
        isCustormerReceived TINYINT(1) NOT NULL DEFAULT 0,
        FOREIGN KEY (prodId) REFERENCES tProduct(prodId)
    );