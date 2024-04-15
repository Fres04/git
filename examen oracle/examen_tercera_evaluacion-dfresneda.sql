--1
select nombre,precio 
from Articulo
where precio >=250;
--2
select codigo,nombre 
from articulo 
where nombre like 'M%';
--3
select nombre,count(fabricante_pk) as "FABRICANTES"
from fabricante
group by nombre
having "FABRICANTES";
--4
select f.codigo,f.nombre from Fabricante left join provincia  p on f.codfabricante=p.provincia_pk
where (provincia_pk=1 or provincia_pk =3 or provincia_pk=7);
--5
select f.codigo,count(a.codigo) as"CODIGO_FABRICANTE" from Fabricante f left join articulo a on f.Fabricante_pk=a.art_fk
group by f.codigo
having "CODIGO_FABRICANTE" desc;
--6 entiendo que fabricante te refieres a todos los campos,sino sería agruparlos por el nombre del fabricante
select f.nombre,max(a.precio) as "MAX_PRECIO",min(a.precio) as "MIN_PRECIO",avg(precio) as "AVG_PRECIO"
from Fabricante f left join articulo a on f.Fabricante_pk=a.art_fk
group by f.nombre
having "MAX_PRECIO","MIN_PRECIO","AVG_PRECIO";
--7
select a.nombre,f.nombre 
from articulo a left join fabricante f on a.art_fk=f.fabricante_pk
where a.codfabricante=3;
--8
select a.nombre,a.precio
from articulo left join (
    provincia p 
    inner join fabricante f 
    on p.provincia_pk=f.fab_fk
    ) on a.art_fk=f.fabricante_pk
    where p.nombre ="SEGOVIA";

--9
select f.nombre,sum(a.precio)
from fabricante f left join articulo a on f.fabricante_pk=a.art_fk
group by f.nombre
having sum(a.precio);
--10
select f.nombre
from fabricante f left join articulo a on f.fabricante_pk=a.art_fk
group by f.nombre
having avg(a.precio)>=150;
--11
select a.nombre,min(precio) as "PRECIO_MINIMO"
from articulo
group by nombre
having "PRECIO_MINIMO";
--12
select a.nombre,a.precio,f.nombre
from articulo a left join fabricante f on a.art_fk=f.fabricante_pk
where a.precio>(
    select avg(precio)
    from articulo
);
--13
select codigo,nombre 
from articulo 
where codigo in(select sysdate,a.fechafab
from articulo
where (months_between(sysdate,a.fechafab)<4 and a.fechafab>"09/10/2023");  
--14
select  artiuclo a left join (
    provincia p 
    inner join fabricante f 
    on p.provincia_pk=f.fab_fk
    ) on a.art_fk=f.fabricante_pk
    where a.precio>(
        select avg(precio)
        from articulo
    );
--15
select *
from articulo
where sysdate=fechafab;
--16
select a.nombre,a.precio 
from articulo a left join fabricante f 
on a.art_fk=f.fabricante_pk
where precio >(
    select precio
    from articulo
    where codfabricante=2
);
--17
select a.nombre,f.nombre,p.nombre
from artiuclo a left join (
    provincia p 
    inner join fabricante f 
    on p.provincia_pk=f.fab_fk
    ) on a.art_fk=f.fabricante_pk;
--18
select a.codigo,a.nombre,f.nombre,p.nombre
from artiuclo a left join (
    provincia p 
    inner join fabricante f 
    on p.provincia_pk=f.fab_fk
    ) on a.art_fk=f.fabricante_pk
    where a.precio >(
        select avg(precio) 
        from articulo);
--19
select f.nombre,count(a.codigo) as "PRODUCIDO"
from fabricante f left join articulo a on f.codigo=a.codfabricante 
gruop by f.nombre
having "PRODUCIDO";
--20
select p.nombre,count(a.codigo) as "NUM_ART",
from artiuclo a left join (
    provincia p 
    inner join fabricante f 
    on p.provincia_pk=f.fab_fk
    ) on a.art_fk=f.fabricante_pk
    group by p.nombre
    having "NUM_ART";