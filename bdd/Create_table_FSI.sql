CREATE TABLE Alerte (
	IdAle INT,
	DatLimUn DATE,
	DatLimDeux DATE,
	CONSTRAINT Pk_Alerte PRIMARY KEY(IdAle))
ENGINE = INNODB;

CREATE TABLE Specialite (
	IdSpe INT,
	NomSpe Varchar(50),
	CONSTRAINT Pk_Specialite PRIMARY KEY(IdSpe))
ENGINE = INNODB; 

CREATE TABLE Classe (
	IdCla INT,
	LibCla Varchar(50),
	NbEtu INT,
	CONSTRAINT Pk_Primary PRIMARY KEY(IdCla))
ENGINE = INNODB;

CREATE TABLE Entreprise (
	IdEnt INT,
	NomEnt Varchar(50),
	AdrEnt Varchar(100),
	CpEnt Varchar(5),
	VilEnt Varchar(50),
	TelEnt Varchar(10),
	MaiEnt Varchar(50),
	CONSTRAINT Pk_Entreprise PRIMARY KEY(IdEnt))
ENGINE = INNODB;

CREATE TABLE TypeUtilisateur (
	IdTypUti INT,
	TypUti Varchar(50),
	CONSTRAINT Pk_TypeUtilisateur PRIMARY KEY(IdTypUti))
ENGINE = INNODB;

CREATE TABLE MaitreApprentissage(
	IdMai INT,
	NomMai Varchar(50),
	PreMai Varchar(50),
	TelMai Varchar(10),
	MaiMai Varchar(50),
	IdEnt INT,
	CONSTRAINT Pk_MaitreApprentissage PRIMARY KEY (IdMai),
	CONSTRAINT Fk_Entreprise_Maitre FOREIGN KEY (IdEnt) REFERENCES Entreprise (IdEnt))
ENGINE = INNODB;

CREATE TABLE Utilisateur (
	IdUti INT,
	LogUti Varchar(50),
	MdpUti Varchar(20),
	MaiUti Varchar(50),
	NomUti Varchar(50),
	PreUti Varchar(50),
	AltUti Boolean,
	AdrUti Varchar(100),
	CpUti Varchar(5),
	VilUti Varchar(50),
	NbMaxEtu3 INT,
	NbMaxEtu4 INT,
	NbMaxEtu5 INT,
	IdEnt INT,
	IdMai INT,
	IdCla INT,
	IdSpe INT,
	IdTypUti INT,
	CONSTRAINT Pk_Utilisateur PRIMARY KEY (IdUti),
	CONSTRAINT Fk_Entreprise_Utilisateur FOREIGN KEY (IdEnt) REFERENCES Entreprise (IdEnt),
	CONSTRAINT Fk_Maitre_Utilisateur FOREIGN KEY (IdMai) REFERENCES MaitreApprentissage (IdMai),
	CONSTRAINT Fk_Classe_Utilisateur FOREIGN KEY (IdCla) REFERENCES Classe (IdCla),
	CONSTRAINT Fk_Specialite_Utilisateur FOREIGN KEY (IdSpe) REFERENCES Specialite (IdSpe),
	CONSTRAINT Fk_TypeUtilisateur_Utilisateur FOREIGN KEY (IdTypUti) REFERENCES TypeUtilisateur (IdTypUti))
ENGINE = INNODB;

CREATE TABLE Bilan1 (
	IdBilUn INT,
	LibBilUn Varchar(50),
	NotBilUn Varchar(200),
	RemBilUn Varchar(200),
	NotEnt Varchar(50),
	NotOra1 Varchar(50),
	DatBil1 DATE,
	IdUti INT,
	CONSTRAINT Pk_Bilan1 PRIMARY KEY (IdBilUn),
	CONSTRAINT Fk_Utilisateur_Bilan1 FOREIGN KEY (IdUti) REFERENCES Utilisateur (IdUti))
ENGINE = INNODB;

CREATE TABLE Bilan2 (
	IdBilDeux INT,
	LibBilDeux Varchar(50),
	NotBilDeux Varchar(200),
	NotOra2 Varchar(50),
	SujBil Varchar(150),
	DatBil2 DATE,
	IdUti INT,
	CONSTRAINT Pk_Bilan2 PRIMARY KEY (IdBilDeux),
	CONSTRAINT Fk_Utilisateur_Bilan2 FOREIGN KEY (IdUti) REFERENCES Utilisateur (IdUti)) 
ENGINE = INNODB;

