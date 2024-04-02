--Práctica 9: Consultas sobre varias tablas
--ejerccicio1
select d.nomde,c.nomce,max(e.salar) as "Finanzas"
from empleados e
inner join (departamentos d inner join centros c 
on d.numce=c.numce)
on d.numde=e.numde where presu <35
group by d.nomde, c.nomce 
having max(e.salar)>1500;
--ejercicio2
SELECT d1.nomde AS "departamento", 
       d2.nomde AS "Dpt. del que depende", 
       d2.presu AS "PRESU"
FROM departamentos d1
JOIN departamentos d2 ON d1.depde = d2.numde
WHERE d2.presu < 30 ORDER BY d1.nomde;
--ejercicio3

--ejercicio4

--ejercicio5

--ejercicio6

--ejercicio7

--ejercicio8

--ejercicio9

--ejercicio10

--ejercicio11

--ejercicio12

--ejercicio13

--ejercicio14

--ejercicio15

--ejercicio16

--ejercicio17

--ejercicio18