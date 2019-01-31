# Creación da táboa cos hábitos
CREATE TABLE Habitos (ID INT NOT NULL AUTO_INCREMENT, Nome VARCHAR(255), PRIMARY KEY (ID));

# Creación da táboa para o rexistro diario
CREATE TABLE Rexistro (id_habito INT NOT NULL, dia DATE NOT NULL, valor INT, FOREIGN KEY (id_habito) REFERENCES Habitos(ID) ON DELETE CASCADE, PRIMARY KEY (id_habito, dia));
