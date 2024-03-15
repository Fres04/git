--Práctica 7: Consultas con Fechas
--ejercicio1
SELECT nomem, to_char(fecna, 'DD/MM/YYYY') as "NACIMIENTO"
FROM empleados
WHERE EXTRACT(MONTH FROM fecna) = 11
ORDER BY nomem;
--ejercicio2
 select nomem 
 from empleados 
 where to_char(fecna, 'DD-MON') = to_char (sysdate, 'DD-MON');
 order by nomem;
--ejercicio3
 select nomem from empleados where EXTRACT(YEAR FROM fecna) < 1950 order by nomem;
--ejercicio4
select nomem,fecna,fecin 
from empleados 
where EXTRACT(YEAR FROM fecin) < 1970 order by nomem ;
--ejercicio5
 select nomem,fecna,fecin 
 from empleados 
 where EXTRACT(YEAR FROM fecin)- EXTRACT(YEAR FROM fecna) <30 ;
--ejercicio6
 select nomem,to_char(fecna,'day') as "Día de nacimiento" 
 from empleados 
 where to_char(fecna, 'D')=1;
--ejercicio7
 select nomem,to_char(fecna,'day') as "Viernes para nac. e incorp." 
 from empleados 
 where to_char(fecna, 'D')=5 and to_char(fecin, 'D')=5 ;
--ejercicio8
 select nomem,to_char(fecna,'day') as "Mismo día de nac. e incorp." 
 from empleados 
 where to_char(fecna, 'D')=  to_char(fecin, 'D') ;
--ejercicio9
 select nomem,to_char(fecin,'month') as "Mes incorporación" 
 from empleados 
 where (EXTRACT(month FROM fecin)>= 1 and EXTRACT(month FROM fecin) <= 7) ; 
--ejercicio10
 select nomem,to_char(fecin,'month') as "Mes incorporación" 
 from empleados 
 where (EXTRACT(month FROM fecin)>= 1 and EXTRACT(month FROM fecin) <= 7 and EXTRACT(month FROM fecna) = EXTRACT(month FROM fecin)) ; 
--Práctica 8: Consultas con funciones colectivas
--ejercicio1
 select avg(salar)as "Salario medio",min(salar) as"Salario mínimo", max(salar) as "Salario máximo" 
 from empleados;
--ejercicio2
 select salar,nomem from empleados 
 where salar*1.40 >(select max(salar) 
 from empleados ) 
 order by nomem;
--ejercicio3
 select max(extract(year from sysdate )-extract(year from fecna)) as "EDAD" 
 from empleados 
 where numde = 110 order by edad desc ;
--ejercicio4
SELECT nomem, EXTRACT(YEAR FROM SYSDATE) - EXTRACT(YEAR FROM fecna) AS "EDAD" 
FROM empleados 
WHERE fecna = (
    SELECT MIN(fecna)
    FROM empleados 
    WHERE numde = 110) AND numde = 110;
--ejercicio5
select count(numem),COUNT(DISTINCT (COMIS)), SUM(COMIS) 
from empleados
 where numde =112 and comis >0;
--ejercicio6
select NUMDE, COUNT(NUMEM) 
from empleados 
group by numde;
--ejercicio7
select numde, trunc(avg(salar),2)as "Salario medio",min(salar) as"Salario mínimo", max(salar) as "Salario máximo" 
from empleados group by numde;
--ejercicio8
select comis, trunc(avg(salar),2)as "Salario medio",trunc(avg(extract(year from sysdate )-EXTRACT(YEAR FROM fecna))) as "EDAD MEDIA"
 from empleados group by comis;
--ejercicio9
select comis, trunc(avg(salar),2)as "Salario medio",trunc(avg(extract(year from sysdate )-EXTRACT(YEAR FROM fecna))) as "EDAD MEDIA"
 from empleados group by comis;
--ejercicio10
select numde,comis, trunc(avg(salar),2)as "Salario medio",trunc(avg(extract(year from sysdate )-EXTRACT(YEAR FROM fecna))) as "EDAD MEDIA" 
from empleados group by comis;
--ejercicio11
select NUMDE, COUNT(NUMEM), SUM(SALAR) 
from empleados 
where numde in(
    select numde 
    from empleados 
    where salar >2500) 
    group by numde;
--ejercicio12
select extel,count (numem)
from empleados 
group by extel having count(numem)>1;
--ejercicio13
select numce, avg(presu) as "Presupuesto medio" 
from departamentos group by numce having avg(presu)>1;
--ejercicio14
select numce, tidir as "T", avg(presu) as  "Presupuesto medio" 
from departamentos
 where tidir='p' or tidir='f' or tidir='F' or tidir='P'
 group by numce,tidir having avg(presu)>1;
--ejercicio15
SELECT NUMDE,COUNT(EXTEL) AS "nº EXTENSIONES TELEFÓNICAS"
FROM EMPLEADOS
GROUP BY NUMDE
HAVING avg (SALAR) > (
    SELECT avg (SALAR)
    FROM EMPLEADOS
)
ORDER BY NUMDE;
--ejercicio16
SELECT NUMDE,sum(SALAR) 
FROM empleados 
group by numde
HAVING sum(salar) = (
    select max (total_salarios) 
  from (
    SELECT SUM(SALAR) AS total_salarios 
    FROM EMPLEADOS 
    GROUP BY NUMDE))


