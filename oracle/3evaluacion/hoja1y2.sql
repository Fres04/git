--hoja1
--1.1. Ejecuta el siguiente bloque. Indica cuál es la salida. 
BEGIN
 IF 10 > 5 THEN
 DBMS_OUTPUT.PUT_LINE ('Cierto');
 ELSE
 DBMS_OUTPUT.PUT_LINE ('Falso');
 END IF;
END;
--sale cierto
--1.2. Ejecuta el siguiente bloque. Indica cuál es la salida. 
BEGIN
 IF 10 > 5 AND 5 > 1 THEN
 DBMS_OUTPUT.PUT_LINE ('Cierto');
 ELSE 
DBMS_OUTPUT.PUT_LINE ('Falso');
 END IF;
END;
--sale cierto
--1.3. Ejecuta el siguiente bloque. Indica cuál es la salida. 
BEGIN
 IF 10 > 5 AND 5 > 50 THEN
DBMS_OUTPUT.PUT_LINE ('Cierto');
ELSE
DBMS_OUTPUT.PUT_LINE ('Falso');
END IF;
END;
-- sale falso
--1.4. A partir de los ejemplos anteriores, crea un bloque de código utilizando la sentencia IF THEN ELSE. 
BEGIN
if 1000>1 and 10 <100 then DBMS_OUTPUT.PUT_LINE ('Cierto');
ELSE
DBMS_OUTPUT.PUT_LINE ('Falso');
END IF;
END;
--1.5. Ejecuta el siguiente bloque. Indica cuál es la salida. 
BEGIN
 CASE
 WHEN 10 > 5 AND 5 > 50 THEN
DBMS_OUTPUT.PUT_LINE ('Cierto'); 
ELSE
 DBMS_OUTPUT.PUT_LINE ('Falso');
 END CASE;
END;
--sale falso
--1.6. A partir del ejemplo anterior, crea un bloque de código utilizando la sentencia CASE. 
--1.7. Ejecuta el siguiente bloque. Indica cuál es la salida. 
BEGIN
 FOR i IN 1..10 LOOP
 DBMS_OUTPUT.PUT_LINE (i);
 END LOOP;
END;
--salen los numeros del 1 al 10
--1.8. Ejecuta el siguiente bloque. Indica cuál es la salida. 
BEGIN
 FOR i IN REVERSE 1..10 LOOP
 DBMS_OUTPUT.PUT_LINE (i);
END LOOP;
END;
--salen los numeros del 10 al 1
--1.9. A partir del ejemplo anterior, crea un bloque de código utilizando la sentencia FOR. 
BEGIN
 FOR i IN REVERSE 20..100 LOOP
 DBMS_OUTPUT.PUT_LINE (i);
END LOOP;
END;
--1.10. Ejecuta el siguiente bloque. Indica cuál es la salida. 
DECLARE
 num NUMBER(3) := 0;
BEGIN
 WHILE num<=100 LOOP
 DBMS_OUTPUT.PUT_LINE (num);
 num:= num+2;
 END LOOP;
END;
--se muestran por pantalla el numero 0 hasta el  100 sumando dos a cada vuelta hasta llegar a 100 es decir 0,2,4....
--1.11. A partir del ejemplo anterior, crea un bloque de código utilizando la sentencia WHILE. 
DECLARE
 num NUMBER(5) := 0;
BEGIN
 WHILE num<=1000 LOOP
 DBMS_OUTPUT.PUT_LINE (num);
 num:= num+2;
 END LOOP;
END;
--1.12. Ejecuta el siguiente bloque. Indica cuál es la salida. 
DECLARE
 num NUMBER(3) := 0;
BEGIN
 LOOP
 DBMS_OUTPUT.PUT_LINE (num);
 IF num > 100 THEN EXIT; END IF;
 num:= num+2;
 END LOOP;
END;
--lo mismo que el anterior pero como no esta el igual se muestra hasta el 102 es decir 0,2,4...100,102;
--1.13. Ejecuta el siguiente bloque. Indica cuál es la salida. 
DECLARE
 num NUMBER(3) := 0;
BEGIN
 LOOP
 DBMS_OUTPUT.PUT_LINE (num);
 EXIT WHEN num > 100;
 num:= num+2;
 END LOOP;
END;
--lo mismo que el anterior pero cuando el numero sea mayor que 100 hace un exit y muestra por pantallla todos hasta el 102;
--1.14. A partir del ejemplo anterior, crea un bloque de código utilizando la sentencia LOOP.
DECLARE
 num NUMBER(5) := 0;
BEGIN
 LOOP
 DBMS_OUTPUT.PUT_LINE (num);
 EXIT WHEN num > 300;
 num:= num+8;
 END LOOP;
END;
--hoja2
--1. Crea un procedimiento llamado ESCRIBE para mostrar por pantalla el mensaje HOLA MUNDO
CREATE OR REPLACE PROCEDURE escribe as
BEGIN
DBMS_OUTPUT.PUT_LINE( 'Hola mundo');
END escribe;
--el exec desde otro lado;
EXEC escribe;
--2. Crea un procedimiento llamado ESCRIBE_MENSAJE que tenga un parámetro de tipo VARCHAR2, que recibe un texto y lo muestre por pantalla.
create or replace PROCEDURE ESCRIBE_MENSAJE(texto in VARCHAR2) as
begin 
DBMS_OUTPUT.PUT_LINE(texto);
end ESCRIBE_MENSAJE;
--el exec desde otro lado;
exec escribe_mensaje('hola');
--3. Crea un procedimiento llamado SERIE que muestre por pantalla una serie de números
--desde un mínimo hasta un máximo con un determinado salto.
create or replace PROCEDURE SERIE (minimo NUMBER, maximo NUMBER, salto NUMBER)as 
 i number:=minimo;
begin 
WHILE i<=maximo 
LOOP
 DBMS_OUTPUT.PUT_LINE (i);
 i:= i+salto;
 END LOOP;
 end serie;
--4. Crea una función AZAR que reciba dos parámetros y genere un número al azar entre un
--mínimo y máximo indicado
create or replace PROCEDURE AZAR ()as
begin

end azar;
--5. Crea una función NOTA que reciba un parámetro que será una nota numérica entre 0 y 10
--y devuelva una cadena de texto con la calificación (Suficiente, Bien, Notable, ...).

--6. Crea una función que nos devuelva el mayor de tres números

--7. A partir de la siguiente tabla:

--8. Crea un procedimiento que muestra en pantalla un menú con dos opciones: