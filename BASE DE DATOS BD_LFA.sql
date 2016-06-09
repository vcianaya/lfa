-- DROP DATABASE bd_lfa;
--create database BD_LFA;

create table estado_civil(
	idEstado int primary key,
	descripcion varchar(15)
);
insert into estado_civil values(1,'Casado');
insert into estado_civil values(2,'Soltero');
insert into estado_civil values(3,'Divorciado');
insert into estado_civil values(4,'Viudo');

create table tipo_pedido(
	idPedido int primary key,
	desPedido varchar(30)
);
insert into tipo_pedido values(1,'Para la mesa');
insert into tipo_pedido values(2,'Para llevar');

create table correlativo(
	idCorrelativo int primary key,
	nroCorrelativo int,
	desCorrelativo varchar(50)
);
insert into correlativo values(1,1,'Plato');
insert into correlativo values(2,1,'Postre');

create table tableta(
	idTab int primary key,
	imeiTab varchar(20),
	marTab varchar(50)
);
create table menu(
	idMenu int primary key,
	nomMenu varchar(100),
	desMenu varchar(500)
);

create table email(
	idEmail int primary key,
	email varchar(50),
	cliente int
);
create table celular(
	idCel int primary key,
	numCel varchar(8),
	cliente int
);
create table cliente(
	idClie int primary key,
	ciClie varchar(12),
	nomClie varchar(25),
	apepClie varchar(25),
	apemClie varchar(25),
	nacClie date,
	genClie varchar(10),
	nick varchar(15),
	pass varchar(15),
	estadoCivil int
);
create table sugerencia(
	idSug int primary key,
	desSug varchar(500),
	fecSug date,
	cliente int
);
create table tab_log(
	idLog int primary key,
	cliente int,
	tableta int,
	fecha timestamp
);
create table pedidos(
	idPed int primary key,
	fecPed timestamp,
	canPed int,
	prePed double precision,
	tipo int,
	plato int,
	postre int,
	tableta int
);
create table postre(
	idPost int primary key,
	nomPost varchar(150),
	desPost varchar(500),
	prePost double precision,
	tiePost time,
	stockPost int,
	menu int,
	correlativo int
);
create table plato(
	idPlato int primary key,
	nomPlato varchar(150),
	desPlato varchar(500),
	prePlato double precision,
	tiePlato time,
	stockPlato int,
	menu int,
	correlativo int
);

create table bebida(
idBeb int primary key,
NomBeb varchar(50),
tieBeb time,
preBeb double precision,
desBeb varchar(500),
stockBeb int,
correlativo int
);

create table promocion(
idProm int primary key,
nomProm varchar(200),
DesProm varchar (300),
correlativo int
);
alter table cliente  add constraint cliente_estadoCivil foreign key (estadoCivil)  references estado_civil (idEstado);
alter table email add constraint email_cliente foreign key (cliente) references cliente (idClie);
alter table celular add constraint celular_cliente foreign key (cliente) references cliente (idClie);
alter table sugerencia add constraint sugerencia_cliente foreign key (cliente) references cliente (idClie);
alter table tab_log add constraint tabLog_Cliente foreign key (cliente) references cliente (idClie);
alter table tab_log add constraint tabLog_Tableta foreign key (tableta) references tableta (idTab);
alter table pedidos add constraint pedido_TipoPedido foreign key (tipo) references tipo_pedido (idPedido);
alter table pedidos add constraint pedido_Plato foreign key (plato) references plato (idPlato);
alter table pedidos add constraint pedido_Postre foreign key (postre) references postre (idPost);
alter table pedidos add constraint pedido_TabLog foreign key (tableta) references tab_log (idLog);
alter table postre add constraint postre_menu foreign key (menu) references menu (idMenu);
alter table plato add constraint plato_menu foreign key (menu) references menu (idMenu);
alter table plato add constraint plato_correlativo foreign key (correlativo) references correlativo (idCorrelativo);
alter table postre add constraint postre_correlativo foreign key (correlativo) references correlativo (idCorrelativo);
alter table bebida add constraint bebida_correlativo foreign key (correlativo) references correlativo (idCorrelativo);









