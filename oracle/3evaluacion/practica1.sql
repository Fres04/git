--1 no se puede debido a que el valor es unique debido a que no se pueden repetir dos claves.

--2 no se puede debido a que el valor es primary key,no pueden haber dos claves repetidas

--3. Introduce 3 alumnos para los cuales no conocemos el número de teléfono.
insert into alumno (NUMMATRICULA, NOMBRE, FECHANACIMIENTO) values (145,'daniel','2024/12/12');
insert into alumnos (NUMMATRICULA, NOMBRE, FECHANACIMIENTO) values (679,'maria','2023/12/12');
insert into alumnos (NUMMATRICULA, NOMBRE, FECHANACIMIENTO) values (660,'mariaaaa','2024/10/10');
--4. Modifica los datos de los 3 alumnos anteriores para establecer un número de  
--teléfono.
update  alumno set telefono="687654321" where NUMMATRICULA in("145", "679", "660");
--5. Para todos los alumnos, poner 2000 como año de nacimiento.
UPDATE alumno
SET FECHANACIMIENTO = CONCAT('2000-', DATE_FORMAT(FECHANACIMIENTO, '%m-%d'));

--6. Para los profesores que tienen número de teléfono y NIF no comience por 9, poner
--'Informática' como especialidad.
update  profesor set  ESPECIALIDAD='Informática' where NIF_P REGEXP '^[0-8]' and telefono is not null;
update  profesor set  ESPECIALIDAD='Informática' where NIF_P not like '9%' and telefono  is not null;
--7. Cambia la asignación de asignaturas para los profesores. Es decir, las asignaturas
--impartidas por un profesor las dará el otro profesor y viceversa. 
--CODASIGNATURA	NOMBRE	IDPROFESOR
UPDATE asignatura
SET IDPROFESOR = 
    CASE
        WHEN IDPROFESOR = 1 THEN 2
        WHEN IDPROFESOR = 2 THEN 1
    END
WHERE IDPROFESOR IN (1, 2);
--8. En la tabla Recibe borra todos los registros que pertenecen a una de las asignaturas.
delete from recibe where  CODASIGNATURA ='BIOLOG';
--9. En la tabla Asignatura borra dicha asignatura.
delete from asignatura where  CODASIGNATURA ='BIOLOG';
--10. Borra el resto de las asignaturas. ¿Qué sucede? ¿Por qué? ¿Como lo solucionarías?
--¿Podría haberse evitado el problema con otro diseño físico? ¿Cómo?
--Cannot delete or update a parent row: a foreign key constraint fails 
--(`tema6`.`recibe`, CONSTRAINT `FK_REC_ASI` FOREIGN KEY (`CODASIGNATURA`) REFERENCES `asignatura` (`CODASIGNATURA`))
--para ello deberias borrar las contrains y primero borrar recibe y luego asignatura

--11. Borra todos los profesores. ¿Qué sucede? ¿Por qué? ¿Como lo solucionarías? ¿Podría
--haberse evitado el problema con otro diseño físico?¿Cómo?
-- no puedes debido a que tienen una ocntraint en aignatura asi que tendrias que borrar recibe, luego asignatura y luego profesor para poder eliminar (en cascade);

--12. Borra todos los alumnos. ¿Qué sucede? ¿Por qué? ¿Como lo solucionarías? ¿Podría
--haberse evitado el problema con otro diseño físico?¿Cómo?

--no se puede debido a que tiene una contraint  de referencia hacia otra tabla,para ello deberias borrar la tabla a la que hace referencia la contraint y luego borrar esta tabla

