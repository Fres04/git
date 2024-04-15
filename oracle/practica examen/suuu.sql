--1
--1.2
--1.2
--1.3
--1.4
--1.5
--1.6
--1.7
--1.8
--1.9
select a.*,f.* from articulos a left join fabricantes f on a.fabricante =f.codigo;
--1.10

--3
--3.1
select * from almacenes;
--3.2
select * form cajas where valor >150;
--3.3
select distinct contenido from cajas;
--3.4
select avg(valor)from cajas;
--3.5
select avg(valor)from cajas group by almacen;
--3.6
select  almacen,avg(valor) from cajas group by almacen having avg(valor)>150;
--3.7
select c.numreferencia,a.lugar from cajas c inner join almacenes a on c.almacen=a.codigo;
--3.8
select almacen,count(numreferencia) from cajas group by almacen;
--3.9
select codigo from almacenes where capacidad <(select count(numreferencia) from cajas group by almacen);
--3.10
select numreferencia from cajas where almacen in (select codigo from almacenes where lugar='BILBAO');
--3.13
update cajas set valor = valor*0.85;
--3.14
update cajas set valor =valor *0.80 where valor>
(select avg(valor) 
from cajas);
--3.15
delete from cajas where valor<100;
--3.16
delete  from cajas where almacenes in(
    select codigo 
    from almacenes 
    where capacidad <(
    select count(numreferencia) 
    from cajas 
    group by almacen)); 
--4
--4.1
select distinct calificacionEdad from peliculas;
--4.2
select peliculas 
from salas 
where not in(
    select codigo 
    from peliculas 
    where calificacionEdad is null);
--4.3
select s.codigo,s.nombre,s.pelicula ,p.*
from salas s 
left join peliculas p  on s.pelicula=p.codigo;
--4.4
select p.codigo,p.nombre,p.calificacionEdad,s.*
from peliculas p
left join salas s  on p.codigo=s.pelicula;
--4.5
select nombre from peliculas 
where  codigo 
not in (
    select peliculas 
    from salas)
--4.6

--4.7
update pelicas set calificacionEdad= 13 where calificacionEdad is null;
--4.8
delete  from salas where pelicula in (
    select codigo 
    from peliculas 
    where calificacionEdad =0 );
--5
--5.1
select dni,nobre,nomapel
--5.2
--5.3
--5.4
--5.5
--5.6
--5.7
--5.8
--5.9
--5.10
--6
--6.1
--7
--7.1
select c.*,p.id,p.nombre 
from cientificos c inner join (
    asignado_a inner join proyecto p on a.proyecto=p.id
) 
 on a.cientifico=c.dni;
 --7.2
 select count(a.cientifico),c.dni,c.nomApels
 from cientificos  c left join  asignado_a a on c.dni=a.cientifico
 group by c.dni,c.nomApels ;
 --7.3
 
 --7.4

 --7.5
 select c.*
 from cientificos c
 where  <1 (
    select count(proyecto)
    from asignado_a
    where  científico=científicos.dni
 ) and (selct avg(horas)
 from proyecto 
 where id=asignado_a.proyecto 
 and asignado_a.científico=científicos.dni
 )>80;
 --otra solucion
select c.*
from cientificos c inner join (
    asignado_a inner join proyecto p on a.proyecto=p.id
) on a.cientifico=c.dni
group by  c.dni,nomApels 
having count(a.proyecto)>1 and avg(p.horas)>80;
--unir cuatro tablas
select c.*
from TABLA t JOIN (cientificos c inner join (
    asignado_a a inner join proyecto p on a.proyecto=p.id
) on a.cientifico=c.dni) ON t.key = c.key
group by  c.dni,nomApels 
having count(a.proyecto)>1 and avg(p.horas)>80;
--8
--8.1
select p.nombre, count(v.producto) as "ventas"
from productos p left join ventas v on p.codigo=v.producto
group by nombre 
Order by "ventas" desc;
--8.2
select c.Nomapel,p.nombre,p.precio,m.piso 
from cajeros c inner join (productos p inner join (
    maquinas_registradas m inner join venta v 
    on m.codigo=v.maquina)
    on p.codigo=v.producto) on c.codigo=v.cajero;
--8.3
select m.piso,count(v.producto) from maquinas_registradoras m 
left join venta v on m.codigo=v.maquina
group by m.piso; 
--8.4
select c.*,sum(p.precio) as "Suma total"
from cajeros c inner join (productos p inner join (
    maquinas_registradas m inner join venta v 
    on m.codigo=v.maquina)
    on p.codigo=v.producto) on c.codigo=v.cajero;
    group by c.*
    having "Suma total"<500;
--9
select 
    