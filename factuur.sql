SELECT `factuur`.`OderID`, `factuur`.`LeverancierID` FROM `factuur`;
SELECT `ProductID`, `Prijs`, `producten`.`Naam`, `LeveranciersID`, `Aantal`, `bestelling`.`GebruikerID` FROM `producten` JOIN `productenbesteld` USING (`ProductID`) JOIN `Bestelling` USING (`BestellingID`) WHERE `Bestelling`.`BestellingID` = 23;
insert into `factuur` (`OderID`,`Status`,`leverancierID`) values (23,'Nieuw',11);
