CREATE TABLE events (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`Event ID` INT(10) NOT NULL,
`Event Name` VARCHAR(255) NOT NULL,
`Event Category` VARCHAR(255) NOT NULL,
`Start Time` TIMESTAMP NOT NULL,
`End Time` TIMESTAMP NOT NULL,
UNIQUE (`Start Time`, `Event ID`)
);