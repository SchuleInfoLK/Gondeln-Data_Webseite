CREATE TABLE [SeilbahnDaten] (
  [ID] INT NOT NULL IDENTITY(1,1), -- Automatische ID für jede Zeile
  [Baujahr] INT NOT NULL, -- Jahr, numerisch
  [Typ] VARCHAR(255) NOT NULL, -- Typ als String
  [Standort] VARCHAR(255) NOT NULL, -- Standort als String
  [Hersteller] VARCHAR(255) NOT NULL, -- Hersteller als String
  [HTal] INT NOT NULL, -- Höhe Tal, numerisch
  [HBerg] INT NOT NULL, -- Höhe Berg, numerisch
  [HDiff] INT NOT NULL, -- Höhenunterschied, numerisch
  [HorizontLang] INT NOT NULL, -- Horizontale Länge, numerisch
  [Bodenabstand] INT NOT NULL, -- Bodenabstand, numerisch
  [MaxSpeed] INT NOT NULL, -- Maximale Geschwindigkeit, numerisch
  [MaxFörderleistung] INT NOT NULL, -- Maximale Förderleistung, numerisch
  [Fahrzeit] INT NOT NULL, -- Fahrzeit, numerisch
  [PersproMittel] INT NOT NULL, -- Personen pro Mittel, numerisch
  [ArtGaragierung] VARCHAR(255) NOT NULL, -- Art der Garagierung als String
  [Kuppelbar] BIT NOT NULL, -- True/False für Kuppelbar
  [Sitzheizung] BIT NOT NULL, -- True/False für Sitzheizung
  [Bildpfad] VARCHAR NOT NULL, --relativer Bildpfad als string
  PRIMARY KEY ([ID])
);