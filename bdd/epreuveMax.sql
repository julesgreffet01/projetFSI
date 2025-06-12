CREATE TABLE Professeur (
    idprof INT AUTO_INCREMENT,
    nomprof VARCHAR(50),
    preprof VARCHAR(50),
    numprof varchar(20),
    CONSTRAINT Pk_Prof PRIMARY KEY(idprof))
ENGINE = INNODB;

INSERT INTO Professeur (nomprof, preprof, numprof) VALUES ('Goudet', 'Magali', '06060606006'), ('Thouverez', 'Bastien', '07070707');



ALTER TABLE Classe
    ADD COLUMN IdProf INT DEFAULT 1,
ADD CONSTRAINT FK_Classe_Professeur
FOREIGN KEY (IdProf) REFERENCES Professeur(IdProf);

ALTER TABLE Entreprise
    ADD COLUMN Siret VARCHAR(20);

UPDATE Entreprise
SET Siret = '73282932000074'
WHERE IdEnt = 1;

UPDATE Entreprise
SET Siret = '84390215000038'
WHERE IdEnt = 2;

UPDATE Entreprise
SET Siret = '51930235000021'
WHERE IdEnt = 3;
