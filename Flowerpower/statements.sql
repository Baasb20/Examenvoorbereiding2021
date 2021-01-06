-- Naam: Nashon Woldai
-- Klas: OITAOO8B

--database aangemaakt
CREATE DATABASE flowerpower;

USE flowerpower;

--hier maak ik een table genaamd klant
CREATE TABLE klant(
    id INT NOT NULL AUTO_INCREMENT,
    voorletters VARCHAR(250) NOT NULL,
    tussenvoegsel VARCHAR(250),
    achternaam VARCHAR(250) NOT NULL,
    adres VARCHAR(250) NOT NULL,
    postcode VARCHAR(250) NOT NULL,
    woonplaats VARCHAR(250) NOT NULL,
    geboortedatum DATE,
    gebruikersnaam VARCHAR(250) NOT NULL,
    wachtwoord VARCHAR(250) NOT NULL,
    PRIMARY KEY(id)
)

--hier maak ik een table genaamd medewerker
CREATE TABLE medewerker(
    id INT NOT NULL AUTO_INCREMENT,
    voorletters VARCHAR(250) NOT NULL,
    voorvoegsels VARCHAR(250),
    achternaam VARCHAR(250) NOT NULL,
    gebruikersnaam VARCHAR(250) NOT NULL,
    wachtwoord VARCHAR(250) NOT NULL,
    PRIMARY KEY(id)
)

--hier maak ik een table genaamd winkel
CREATE TABLE winkel(
    id INT NOT NULL AUTO_INCREMENT,
    winkelnaam VARCHAR(250) NOT NULL,
    winkeladres VARCHAR(250) NOT NULL,
    winkelpostcode VARCHAR(250) NOT NULL,
    vestigingsplaats VARCHAR(250) NOT NULL,
    telefoonnummer VARCHAR(250) NOT NULL,
    PRIMARY KEY(id)
)

--hier maak ik een table genaamd factuur
CREATE TABLE factuur(
    id INT NOT NULL AUTO_INCREMENT,
    factuurdatum DATE NOT NULL,
    klant_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(klant_id) REFERENCES klant(id)
)

--hier maak ik een table genaamd artikel
CREATE TABLE artikel(
    id INT NOT NULL AUTO_INCREMENT,
    artikel VARCHAR(250) NOT NULL,
    prijs DECIMAL(60) NOT NULL,
    PRIMARY KEY(id)
)

--hier maak ik een table genaamd factuurregel
CREATE TABLE factuurregel(
    id INT NOT NULL AUTO_INCREMENT,
    aantal VARCHAR(250) NOT NULL,
    prijs DECIMAL(60) NOT NULL,
    factuur_id INT NOT NULL,
    artikel_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(factuur_id) REFERENCES factuur(id),
    FOREIGN KEY(artikel_id) REFERENCES artikel(id)
)

--hier maak ik een table genaamd bestelling
CREATE TABLE bestelling(
    id INT NOT NULL AUTO_INCREMENT,
    aantal VARCHAR(250) NOT NULL,
    afgehaald VARCHAR(250) NOT NULL,
    klant_id INT NOT NULL,
    medewerker_id INT NOT NULL,
    artikel_id INT NOT NULL,
    winkel_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(klant_id) REFERENCES klant(id),
    FOREIGN KEY(medewerker_id) REFERENCES medewerker(id),
    FOREIGN KEY(artikel_id) REFERENCES artikel(id),
    FOREIGN KEY(winkel_id) REFERENCES winkel(id)
)
