CREATE TABLE [users] (
  [id] int NOT NULL IDENTITY(1,1),
  [name] varchar(75) NOT NULL,
  [password] varchar(255) NOT NULL,
  [email] varchar(100) NOT NULL,
  PRIMARY KEY ([id]),
  UNIQUE ([email])
);