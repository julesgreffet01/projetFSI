-- Insérer des Classes
INSERT INTO Classe (LibCla, NbEtu) VALUES ('3OLEN', 3), ('4OLEN', 1), ('5OLEN', 2);

-- Insérer des Alertes
INSERT INTO Alerte (DatLimUn, DatLimDeux) VALUES ('2025-01-15', '2025-06-27');

-- Insérer des Spécialités
INSERT INTO Specialite (NomSpe) VALUES ('Infra-Cyber'), ('Devellopement');

-- Insérer des Types d'Utilisateurs
INSERT INTO TypeUtilisateur (TypUti) VALUES ('Etudiant'), ('Tuteur'), ('Administrateur');

-- Insérer des Entreprises
INSERT INTO Entreprise (NomEnt, AdrEnt, CpEnt, VilEnt, TelEnt, MaiEnt) VALUES 
('LaravelCorp', '123 rue de Bastien', '69001', 'Lyon1', '0452634147', 'contact@laravelcorp.com'),
('OrangeBlack', '456 rue du jardinier', '69330', 'Meyzieux', '0463968574', 'recrutement@orangeblack.com'),
('ORT LYON', '444 rue Henri Maréchal', '69800', 'Saint-Priest', '0452632541', 'recrutement@ort.com');

-- Insérer des Maîtres d'Apprentissage
INSERT INTO MaitreApprentissage (NomMai, PreMai, TelMai, MaiMai, IdEnt) VALUES 
('DUPONT', 'Arnaud', '0714528596', 'adupont@laravelcorp.com', 1),
('RAHAIMI', 'Oualid', '0674845968', 'orahaimi@orangeblack.com', 2),
('SATTA', 'Mattieux', '0685956253', 'msatta@laravelcorps.com', 1);

-- Insérer des Utilisateurs
INSERT INTO Utilisateur (LogUti, MdpUti, TelUti, MaiUti, NomUti, PreUti, AltUti, AdrUti, CpUti, VilUti, NbMaxEtu3, NbMaxEtu4, NbMaxEtu5, IdEnt, IdMai, IdCla, IdSpe, IdTypUti, IdTut) VALUES 
('mgoudet', 'password', '0610111213', 'mgoudet@asso.ort.lyon.fr', 'GOUDET', 'Magali', NULL, 'Rue du SQL', '69008', 'Lyon8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL),
('tuteur', 'password', '0452634152', 'tuteur@gmail.com','TUTEUR', 'Test', NULL, '6 rue Marechal Leclerc', '38220', 'Grenoble', 2, NULL, 1, NULL, NULL, NULL, NULL, 2, NULL),
('tuteurdeux', 'password', '0674845236', 'tuteurdeux@gmail.com', 'TUTEURDEUX', 'testdeux', NULL, '6 rue des tuteurs', '69200', 'Venissieux', NULL, 1, 1, NULL, NULL, NULL, NULL, 2, NULL),
('hzenasni', 'password', '0712345678', 'hzenasni.pro@gmail.com', 'ZENASNI', 'Hakim', 1, '24 rue de Lyon', '69800', 'Saint-Priest', NULL, NULL, NULL, 1, 1, 3, 1, 1, 3),
('rcabot', 'password','0687654321', 'rcabot.pro@gmail.com','CABOT', 'Robin', 0, '69 rue du Lyonnais', '69330', 'Meyzieux', NULL, NULL, NULL, NULL, NULL, 3, 1, 1, 2),
('jgreffet', 'password', '0785236974', 'jgreffet.pro@gmail.com', 'GREFFET', 'Jules', 0, '6 rue Mordekaiser', '69001', 'Lyon1', NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 2),
('mroux', 'password', '0741256396', 'mroux.pro@gmail.com','ROUX', 'Maxime', 1, '82 rue Lee Sin', '69700', 'Mions', NULL, NULL, NULL, 2, 2, 1, 2, 1, 2),
('ybouquet', 'password', '0674845189', 'ybouqet.pro@gmail.com', 'BOUQET', 'Yanis', 1, '16 rue des fleurs', '38000', 'Lisle dabeau', NULL, NULL, NULL, 1, 3, 2, 2, 1, 3),
('agharbi', 'password', '0785749636', 'agharbi.pro@gmail.com', 'GHARBI', 'Aymen', 0, '32 rue Sully', '69500', 'Decines-Charpieux', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL);

-- Insérer des Bilans
INSERT INTO Bilan1 (LibBilUn, NotBilUn, RemBilUn, NotEnt, NotOra1, DatBil1, IdUti) VALUES
('Bilan semestre 1', 15.0, 'Très bon semestre, continuez !', 18.8, 16.5, '2024-09-02', 4),
('Bilan semestre 1', 16.4, 'Rien à dire', 20, 17.5, '2024-09-02', 5),
('Bilan semestre 1', 15.0, 'Très bien', 18.8, 15.0, '2024-09-02', 6),
('Bilan semestre 1', 15.0, 'Continuez ainsi !', 19.5, 16.7, '2024-09-02', 7);

INSERT INTO Bilan2 (LibBilDeux, NotBilDeux, NotOra2, SujBil, DatBil2, IdUti) VALUES
('Bilan semetre 2', 13.6, 14.2, 'Le repas', '2025-01-16', 4),
('Bilan semetre 2', 13.0, 13.2, 'Le repas', '2025-01-16', 5),
('Bilan semetre 2', 14.6, 14.0, 'Les intelligences artificielles', '2025-01-16', 6);

