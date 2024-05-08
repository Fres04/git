--1. Inserta en la tabla Barcos un nuevo barco de nombre ʻSanta Maríaʼ, con matrícula 
--‘LI-3222’ de nacionalidad Portugal.
INSERT INTO Barcos (Nombre, Matricula, Nacionalidad) VALUES ('Santa Maria', 'LI-3222', 'Portugal');
--2. Crea una nueva tabla llamada copiacapturas con los campos (Matrícula, Codespecie,
--fecha) y utilizando una única sentencia SQL introduce en esa tabla los datos de todas las
--capturas de aquellos barcos de nacionalidad española.
CREATE TABLE copiacapturas(
    matricula VARCHAR(8),
    codespecie VARCHAR(6),
    fecha date
);

INSERT INTO copiacapturas (matricula, codespecie, fecha)
SELECT c.matricula, c.codespecie, c.fecha
FROM capturas c
JOIN barcos b ON c.matricula = b.matricula
WHERE b.nacionalidad = 'España';
--3. Inserta en la tabla lotes un nuevo lote con codigo 'L13', matricula:'PU-2301' y numkilos:
--220, para la especie de nombre ‘Merluza’.
INSERT INTO lotes (codigo, codespecie, matricula, numkilos)
VALUES ('L13', (SELECT codigo FROM especies WHERE nombre = 'Merluza'), 'PU-2301', 220);
--4. Cambia la nacionalidad del barco ‘'Sakura Sakura' para que sea la misma que la del
--barco 'Calm After the Storm'.
UPDATE barcos
SET nacionalidad = (SELECT nacionalidad FROM barcos WHERE nombre = 'Calm After the Storm')
WHERE nombre = 'Sakura Sakura';

--5. Modifica el número de kilos de todas las capturas de los barcos españoles sumándoles
--100kg.
UPDATE capturas 
SET numkilos = numkilos + 100
WHERE matricula IN (SELECT matricula FROM barcos WHERE nacionalidad = 'España');
--6. Elimina todos los lotes de aquellos barcos que hayan faenado en el caladero del
--‘Atlántico Sur'.
DELETE FROM lotes
WHERE matricula IN (SELECT matricula FROM capturas WHERE codcaladero = 3 or codcaladero =4);
