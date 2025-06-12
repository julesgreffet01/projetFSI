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