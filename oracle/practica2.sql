--BD_T5_2_Tarea3.pdf
--ejericico1:
select nomem 
from empleados 
where salar> all(
    select salar 
    from empleados 
    where numde=122 )
    order by nomem asc;
--ejercicio2:
select nomem 
from empleados 
where salar> all(
    select salar 
    from empleados 
    where numde=150 
)
order by nomem asc;
--se muestra por ordern alfabetico debido a que ordeno por nombre ascendente y aparte como no hay departamento 150 se muestran todos
--ejercicio3:
select nomem 
from empleados 
where salar >=any(
select salar*2.5 from empleados where numde = 122
)
order by nomem asc;
--ejercicio4:
select nomem,salar 
from empleados
 where salar =any(
    select comis*10
    from empleados)
order by salar asc;
--ejercicio5:
select nomem,salar 
from empleados 
where salar >any(
    select max (comis*20) 
    from empleados)
order by nomem asc;
--ejericico6:
select nomem,salar 
from empleados 
where salar <any(
    select min (comis*20) 
    from empleados)
order by nomem asc;
--BD_T5_2_Tarea4.pdf
--ejericico1:
select nomem 
from empleados 
where salar between 1500 and 1600;
--ejercicio2:
select nomem,salar 
from empleados 
where numhi>0 AND comis >0 and (salar /numhi between 0 and 720
or salar/numhi >comis*50)
order by nomem asc;
--ejercicio3:
select nomem,salar 
from empleados 
where nomem LIKE 'A%' 
order by nomem;
--ejercicio4:
select nomem 
from empleados 
where nomem LIKE '________' 
order by nomem;
--ejercicio5:
select nomem 
from empleados 
where extel in (
    select extel 
    from empleados 
    where extel =250 or extel =750)
--ejercicio6:
select nomem 
from empleados 
where numde in (
    select numde 
    from empleados 
    where nomem= 'PILAR' or nomem = 'DOROTEA')
order by nomem;
--ejercicio7:
SELECT nomde AS "NOMBRES Departamentos", direc AS "Identificador de su director"
FROM departamentos
WHERE direc IN (
    SELECT direc 
    FROM departamentos
    WHERE nomde = 'DIRECC.COMERCIAL' or nomde = 'PERSONAL')
order by "Identificador de su director" desc ,"NOMBRES Departamentos" desc;
--ejercicio8:
select nomce 
from centros 
where exists (
    select *
    from centros 
    where dirce like '%ATOCHA%')
order by nomce desc;
--ejercicio9:
SELECT NOMEM, SALAR
FROM empleados
WHERE NUMDE = 100 AND EXISTS (
    SELECT SALAR 
    FROM empleados 
    WHERE SALAR > 1300);

--ejercicio10:
SELECT NOMEM, SALAR
FROM empleados
WHERE NUMDE = 100 AND EXISTS (
    SELECT numde 
    FROM departamentos 
    WHERE SALAR > 2750);
--ejercicio11:
SELECT NOMEM, SALAR
FROM empleados
WHERE NUMDE = 100 AND EXISTS (
    SELECT SALAR 
    FROM empleados 
    WHERE SALAR > 3000);
--BD_T5_2_Tarea5.pdf
--ejericico1:
 select nomem,comis 
 from empleados 
 where numde =110 and exists (
    select comis 
    from empleados 
    where comis >0)
    order by nomem asc;
--ejercicio2:
    select nomde 
    from departamentos 
    where nomde not like '%DIREC%' and nomde not like '%SECTOR%'; 
--ejercicio3:
select nomem as "NOMBRE",salar as "SALARIO" 
from empleados 
where numhi =0 and salar >1500 or numhi >0 and salar <1000
    order by "NOMBRE";
--ejercicio4:
select 'nº '|| numem as "NÚMERO EMPLEADO",nomem as"NOMBRE",salar+comis as"SALARIO TOTAL" 
    from empleados 
    where salar+comis>1800
    order by numem desc;
--ejercicio5:
    select  nomem,salar 
    from empleados 
    where numde = 111 and comis is not null and comis > salar * 0.15 
    order by nomem asc
--ejercicio6:
SELECT NOMDE as "Nombre de Departamento", TIDIR as "T", PRESU as "Presupuesto"
FROM departamentos
WHERE TIDIR = 'F' OR TIDIR = 'P'
  AND depde is null or PRESU > 30
--ejercicio7:
  SELECT NOMDE as "Nombre de Departamento", TIDIR as "T", CONCAT(presu, '.000 €') as "Presupuesto"
FROM departamentos
WHERE TIDIR = 'F' OR TIDIR = 'P'
  AND depde is null or PRESU > 30