create table if not exists categoria(
    id_categoria int not null auto_increment,
    nome varchar(100) not null,
    primary key(id_categoria)
);

create table if not exists tipo_produto(
    id_tipo int not null auto_increment,
    nome varchar(100) not null,
    primary key(id_tipo)
);

create table if not exists produto(
    id_produto int not null auto_increment,
    nome varchar(100) not null,
    preco_unitario double not null,
    descricao varchar(500) not null,
    sistema varchar(100),
    tipo_produto int not null,
    foreign key(tipo_produto) references tipo_produto(id_tipo),
    primary key(id_produto)
);

create table if not exists produto_categoria(
    produto int not null,
    categoria int not null,
    foreign key(produto) references produto(id_produto),
    foreign key(categoria) references categoria(id_categoria)
);

create table if not exists usuario(
    email varchar(50) not null,
    nome varchar(100) not null,
    senha varchar(100) not null,
    administrador int not null,
    primary key(email)
);

create table if not exists pedido(
    quantidade int not null,
    produto int not null,
    usuario varchar(50),
    foreign key (produto) references produto(id_produto),
    foreign key (usuario) references usuario(email)
);

insert into categoria(nome) values
    ("Plataforma"),
    ("RPG"),
    ("Mundo Aberto"),
    ("Luta"),
    ("Esporte"),
    ("FPS"),
    ("Ritmico");

insert into tipo_produto(nome) values
    ("Xicaras"),
    ("Camisetas"),
    ("Acessorios"),
    ("Consoles"),
    ("Games"),
    ("Miniaturas"),
    ("Posters");

insert into produto(nome, preco_unitario, descricao, sistema, tipo_produto) values
    ("Super Mario 64",150.00,"Encanador salva a princesa","Nintendo 64",5),
    ("Legend of Zelda: Ocarina of Time",145.00,"Menino da floresta e fadinha precisam salvar o mundo","Nintendo 64",5),
    ("Tekken 4",167.00,"Casos de Familia num torneio de luta", "Playstation 2",5),
    ("The Elder Scrolls: Skyrim",199.00,"Protagonista grita com dragoes e come abelhas","Playstation 3",5),
    ("Xicara Sonic",30.00,"Xicara do Sonic",null,1),
    ("Playstation 2",1000.00,"Playstation antigo",null,4);

insert into produto_categoria(produto, categoria) values
    (1,1),
    (2,2),
    (2,3),
    (3,4),
    (4,2),
    (4,3);

insert into usuario(email, nome, senha, administrador) values
    ("pessoa1@mymail.com","Pessoa1","12345678",0),
    ("pessoa2@mymail.com","Pessoa2","135798642",0),
    ("pessoa3@mymail.com","Pessoa3","24689571",0),
    ("pessoa4@mymail.com","Pessoa4","87654321",0),
    ("legolas123@mymail.com","Legolas123","13g0145l2E",0),
    ("admin@mymail.com","Administrador","87654321",1);

insert into pedido(quantidade, produto, usuario) values
    (1,2,"pessoa1@mymail.com"),
    (2,5,"pessoa1@mymail.com"),
    (1,6,"legolas123@mymail.com"),
    (1,2,"legolas123@mymail.com"),
    (1,4,"legolas123@mymail.com");

/*Procurar itens por pedaço de nome.*/
select * from produto where lower(nome) like "%sky%";

/*Procurar games por pedaço de nome.*/
select produto.nome, tipo_produto.nome from produto
    join tipo_produto on produto.tipo_produto=tipo_produto.id_tipo
where lower(tipo_produto.nome)="games";

/*Procurar quais games pertencem aquele videogame.*/
select nome, sistema from produto
where lower(sistema)="nintendo 64";

/*Quais são os games de uma determinada categoria?*/
select produto.nome, categoria.nome, tipo_produto.nome from produto
    join produto_categoria on produto_categoria.produto=produto.id_produto
    join categoria on produto_categoria.categoria=categoria.id_categoria
    join tipo_produto on produto.tipo_produto=tipo_produto.id_tipo
where lower(categoria.nome)="rpg" and lower(tipo_produto.nome)="games";

/*Procurar a lista de produtos por usuário e toda a sua ficha e calcular gasto total.*/

/*Procurar qual é o usuário que gastou mais?*/

/*Qual é o produto de maior quantidade*/

/*Qual é o produto mais caro.*/
select max(preco_unitario), nome from(
    select preco_unitario, nome from produto
    group by nome
    order by preco_unitario desc
)maior_preco;

/*Tela do Admin*/
select produto.nome as nome_do_produto, pedido.quantidade, usuario.nome as comprador, usuario.email from produto
    join pedido on pedido.produto=produto.id_produto
    join usuario on pedido.usuario=usuario.email;