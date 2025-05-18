CREATE DATABASE BTP;
USE BTP;

CREATE TABLE Comune (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(255),
    Provincia VARCHAR(255),
    Password VARCHAR(255)
);

CREATE TABLE Utente (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(255),
    Cognome VARCHAR(255),
    Username VARCHAR(255),
    Password VARCHAR(255)
);

CREATE TABLE TourVirtuale (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Qualità VARCHAR(255),
    Dimensione VARCHAR(255)
);

CREATE TABLE Tariffa (
    Id_Tariffa INT PRIMARY KEY,
    Tipo_Tariffa VARCHAR(255)
);

CREATE TABLE Monumento (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Descrizione VARCHAR(255),
    Posizione VARCHAR(255),
    Comune INT,
    FOREIGN KEY (Comune) REFERENCES Comune(Id)
);

CREATE TABLE Richiede (
    Comune_Id INT,
    TourVirtuale_Id INT,
    FOREIGN KEY (Comune_Id) REFERENCES Comune(Id),
    FOREIGN KEY (TourVirtuale_Id) REFERENCES TourVirtuale(Id)
);

CREATE TABLE Visita (
    Utente_Id INT,
    TourVirtuale_Id INT,
    FOREIGN KEY (Utente_Id) REFERENCES Utente(Id),
    FOREIGN KEY (TourVirtuale_Id) REFERENCES TourVirtuale(Id)
);

CREATE TABLE Comprende (
    TourVirtuale_Id INT,
    Monumento_Id INT,
    FOREIGN KEY (TourVirtuale_Id) REFERENCES TourVirtuale(Id),
    FOREIGN KEY (Monumento_Id) REFERENCES Monumento(Id)
);

CREATE TABLE Prezza (
    TourVirtuale_Id INT,
    Tariffa_Id INT,
    FOREIGN KEY (TourVirtuale_Id) REFERENCES TourVirtuale(Id),
    FOREIGN KEY (Tariffa_Id) REFERENCES Tariffa(Id_Tariffa)
);