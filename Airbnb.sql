CREATE Table Client(
  Id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Nom VARCHAR(255) NOT NULL,
  Prenom VARCHAR(255) NOT NULL,
  Email VARCHAR(255) NOT NULL UNIQUE,
  Phone VARCHAR(255) NOT NULL UNIQUE,
  Passwords VARCHAR(255) NOT NULL,
  Adresse VARCHAR(255) DEFAULT NULL,
  Hote int NOT NULL,
    Constraint CHK_Hote check(Hote = 0 or Hote = 1),
  DateCreation DATETIME NOT NULL,
  DateModification DATETIME NOT NULL
);

CREATE Table TypeImmo(
  Id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Lib VARCHAR(255) NOT NULL UNIQUE,
  Prixmin int NOT NULL
);

CREATE Table Regions(
  Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Nom VARCHAR(255) NOT NULL UNIQUE
);

CREATE Table Services(
  Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Libelle VARCHAR(255) NOT NULL UNIQUE
);

CREATE Table Piece(
  Id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Nom VARCHAR(255) NOT NULL UNIQUE
);

CREATE Table Annonce(
  Id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Publication int NOT NULL,
    Constraint CHK_Publication check(Publication 0 = or Publication = 1),
  PrixHT FLOAT NOT NULL,
  Adresse Varchar(255) NOT NULL,
  DateCreation DateTime NOT NULL,
  DateModification DateTime NOT NULL,
  Client_Id int NOT NULL,
  TypeImmo_Id int NOT NULL,
  Regions_Id int NOT NULL,
  Constraint FK_AnnonceClient FOREIGN KEY(Client_Id) REFERENCES Client(Id),
  Constraint FK_AnnonceTypeImmo FOREIGN KEY(TypeImmo_Id) REFERENCES TypeImmo(Id),
  Constraint FK_AnnonceRegions FOREIGN KEY(Regions_Id) REFERENCES Regions(Id)
);

CREATE Table Posseder(
  Piece_Id int,
  Annonce_Id int,
  Quantite int NOT NULL,
    Constraint CHK_Quantite check(Quantite = 1),
  Constraint FK_PossederPiece FOREIGN KEY(Piece_Id) REFERENCES Piece(Id),
  Constraint FK_PossederAnnonce FOREIGN KEY(Annonce_Id) REFERENCES Annonce(Id),
  PRIMARY KEY(Piece_Id, Annonce_Id)
);

CREATE Table Reservation(
  Annonce_Id int,
  Client_Id int,
  Constraint FK_ReservationAnnonce FOREIGN KEY(Annonce_Id) REFERENCES Annonce(Id),
  Constraint FK_ReservationClient FOREIGN KEY(Client_Id) REFERENCES Client(Id),
  DateDebut DATETIME NOT NULL,
  DateFin DATETIME NOT NULL,
  PRIMARY KEY(Annonce_Id, Client_Id)
);

CREATE Table Photo(
  Id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Chemin VARCHAR(255) NOT NULL,
  Annonce_Id int,
  Constraint PhotoAnnonce FOREIGN KEY(Annonce_Id) REFERENCES Annonce(Id)
);

CREATE Table Fournir(
  Services_Id int,
  Annonce_Id int,
  Constraint FK_FournirServices FOREIGN KEY(Services_Id) REFERENCES Services(Id),
  Constraint FK_FournirAnnonce FOREIGN KEY(Annonce_Id) REFERENCES Annonce(Id),
  PRIMARY KEY(Services_Id, Annonce_Id)
);

CREATE Table Commentaire(
  Id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Avis VARCHAR(255),
  Note int NOT NULL,
  DateModification DATETIME NOT NULL,
  Client_Id int NOT NULL,
  Annonce_Id int NOT NULL,
  Constraint CommentaireClient FOREIGN KEY(Client_Id) REFERENCES Client(Id),
  Constraint CommentaireAnnonce FOREIGN KEY(Annonce_Id) REFERENCES Annonce(Id)
);

CREATE Table TVA(
  Id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Taux int NOT NULL,
  DateDepart DATETIME NOT NULL UNIQUE
);

INSERT INTO Client (Nom,Prenom,Email,Phone,Passwords,Adresse,Hote,DateCreation,DateModification)
VALUES
  ('Toto','Titi','toto@titi.com','08765443345','password','7 rue des Titi',0,'2022-02-02','2022-03-02');

INSERT INTO TypeImmo (Lib, Prixmin) VALUES ('Maison', 130),('Appartement', 90);


INSERT INTO Regions (Nom) VALUES ('Rhones-Alpes'),('Auvergne');

INSERT INTO Services (Libelle) VALUES ('Wifi');

INSERT INTO Piece (Nom) VALUES ('Entrée'),('Salon'),('Cuisine'),('WC'),('Chambres'),('Salles de bains');

INSERT INTO Annonce (Publication,PrixHT,Adresse,DateCreation,DateModification,Client_Id,TypeImmo_Id,Regions_Id) 
VALUES
  (0, 50,'7 rue des TOTOS','2022-02-03','2022-02-23', 1,1,1);

INSERT INTO Posseder (Piece_Id, Annonce_Id, Quantite) VALUES (1, 1, 1);

INSERT INTO Reservation (Annonce_Id, Client_Id, DateDebut, DateFin) VALUES (1, 1, '2022-02-08', '2022-02-17');


INSERT INTO Fournir (Services_Id, Annonce_Id) VALUES (1, 1);


INSERT INTO TVA (Taux, DateDepart) VALUES (20, '2022-03-22');
