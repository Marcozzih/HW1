/*Implementazione tabelle*/

create table album (
	CB varchar(30) primary key,
	titolo varchar(30),
	genere varchar(30),
	artista varchar(30),	
	durata float,
	image varchar(255),
	descrizione varchar(255));
	
create table traccia(
	n_traccia integer,
	album varchar(30),	
	primary key(n_traccia, album),
	index alb_idx(album),
	foreign key(album) references album(CB));


create table formato(
	tipo varchar(30) primary key
);

create table esisteIn(
	album varchar(30),
	formato varchar(30),
	prezzo float,
	index alb_idx(album),
	index form_idx(formato),	
	foreign key(formato) references formato(tipo),
	foreign key(album) references album(CB),	
	unique(album, formato, prezzo));


create table piano(
	id integer primary key,
	metri_quadri integer);
	
create table cassettone(
	id integer primary key,
	piano integer,
	capienza integer,
	posti_liberi integer,
	posti_occupati integer,		
	index pn_idx(piano),
	foreign key(piano) references piano(id));
	
create table si_trova(
	album varchar(30),
	cassettone integer,
	data date,
	n_copie integer,
	primary key(album, cassettone),
	index alb_idx(album),
	index cass_idx(cassettone),
	foreign key(album) references album(CB),
	foreign key(cassettone) references cassettone(id));
	

create table impiegato(
	id_impiegato integer primary key,
	nome varchar(30),
	cognome varchar(30),
	recapito varchar(30));
	
create table piano_corrente(
	id integer primary key,
	piano integer,
	impiegato integer,
	data_inizio date,	
	index pn_idx(piano),
	index inp_edx(impiegato),	
	foreign key(piano) references piano(id),
	foreign key(impiegato) references impiegato(id_impiegato),
	unique(piano, impiegato, data_inizio));
	
create table piano_passato(
	id integer primary key,
	piano integer,
	impiegato integer,
	data_inizio date,
	data_fine date,
	index pn_idx(piano),
	index inp_edx(impiegato),	
	foreign key(piano) references piano(id),
	foreign key(impiegato) references impiegato(id_impiegato),
	unique(piano, impiegato, data_inizio));

	
create table cliente(
	cod_cliente integer primary key,
	nome varchar(30),
	cognome varchar(30),
	data_nascita date,
	email varchar(50),
	username varchar(50),
	pass varchar(50));
	

create table acquisto(
	id integer primary key,
	album varchar(30),
	cliente integer,
	data_acquisto date,
	index alb_idx(album),
	index cli_idx(cliente),	
	foreign key(cliente) references cliente(cod_cliente),
	foreign key(album) references album(CB),	
	unique(album, cliente, data_acquisto));

-- tabella per il web : carello, preferiti
create table carrello(
	id integer primary key,
	album varchar(30),
	cliente integer,
	formato varchar(30),
	index alb_idx(album),
	index cli_idx(cliente),	
	index form_idx(formato),	
	foreign key(formato) references formato(tipo),
	foreign key(cliente) references cliente(cod_cliente),
	foreign key(album) references album(CB),	
	unique(album, cliente));

create table preferiti(
	id integer primary key,
	album varchar(30),
	cliente integer,
	index alb_idx(album),
	index cli_idx(cliente),	
	foreign key(cliente) references cliente(cod_cliente),
	foreign key(album) references album(CB),	
	unique(album, cliente));




	
create table tempo(
	id integer primary key,
	data_fornitura date);
	
create table fornitore(
	id_fornitore integer primary key,
	nome varchar(30),
	recapito varchar(30));
	
create table fornitura(
	id_fornitura integer primary key,
	album varchar(30),
	fornitore integer,
	id_data integer,
	prezzo float,	
	index alb_idx(album),
	index dat_idx(id_data),
	index forn_idx(fornitore),	
	foreign key(album) references album(CB),
	foreign key(id_data) references tempo(id),
	foreign key(fornitore) references fornitore(id_fornitore),	
	unique(id_data, fornitore, album));
	

	
	
	

		
insert into album (CB, titolo, genere, artista, durata, image, descrizione)
values
	('033560', 'the mountain', 'progressive metal', 'haken', 70, 'https://www.angrymetalguy.com/wp-content/uploads/2013/09/Haken-The-Mountain.jpg', "Anticipato dall'audio del brano Atlas Stone e dal video di Pareidolia, The Mountain è stato descritto dai chitarristi Richard Henshall e Charles Griffiths come un album che «spazia dal delicato al brutale, con tutto il resto nel mezzo»."),
	('026640', 'the dark side of the moon', 'rock', 'pink floyd', 42, 'https://images-na.ssl-images-amazon.com/images/I/81aTawcGdmL._AC_SL1500_.jpg', "L'album rappresenta l'approdo di numerose sperimentazioni musicali che i Pink Floyd andavano da tempo operando sia nei loro concerti che nelle registrazioni"),
	('070910', 'prisoner 709', 'rap', 'caparezza', 65, 'https://images-na.ssl-images-amazon.com/images/I/71BCCBEm%2BUL._AC_SL1200_.jpg', "L'album è frutto di una profonda crisi interiore del rapper ed è incentrato sulla tematica dell'ingabbiamento all'interno della propria dimensione mentale (o prigione, come dichiarato dallo stesso artista)."),
	('064981', 'the court of the crimson king', 'progressive rock', 'king crimson', 50, 'https://legendarycover.it/wp-content/uploads/2019/04/in-the-court-crimson-king.jpg', "È generalmente considerato uno dei più grandi album del rock progressivo: la musica in esso contenuta travalica, secondo i critici, i confini del rock e attinge dal jazz e dalla musica classica, costituendo comunque un ponte tra generi diversi."),
	('011930', 'whos next', 'rock', 'the who', 43, 'https://images-na.ssl-images-amazon.com/images/I/81CXOAXD1DL._AC_SL1400_.jpg', "Who's Next è il quinto album in studio del gruppo musicale rock britannico The Who, pubblicato nel 1971. La rivista Rolling Stone lo ha inserito al 28º posto della sua lista dei 500 migliori album di tutti i tempi. Viene considerato un pilastro della musica rock del XX secolo"),
	('023520', 'al monte', 'folk rock', 'mannarino', 39, 'https://www.angolotesti.it/cover/219167.jpg', "L'album viene descritto come 'un viaggio iniziatico su una montagna molto metaforica' e in esso l'autore si fa più 'misurato e consapevole' rispetto agli album precedenti."),
	('086980', 'origin of symmetry', 'alternative rock', 'muse', 47, 'https://audioxide.com/api/images/album-artwork/origin-of-symmetry-muse-large-square.jpg', "Con questo album l'idea dei Muse era quello di presentare al pubblico il loro lato più eccentrico, avvalendosi anche di strumenti come l'organo o il balafon."),
	('043360', 'OK computer', 'alternative rock', 'radiohead', 50, 'https://images-na.ssl-images-amazon.com/images/I/715LZJ5qX0L._AC_SL1200_.jpg', "L'album rappresenta un vero e proprio punto di svolta dal precedente lavoro del gruppo, The Bends, basato sulla chitarra e su testi introspettivi, per dirigersi verso testi astratti e musica sperimentale, che pose le basi per tutti i lavori successivi del gruppo."),
	('039102', 'exuvia', 'rap', 'caparezza', 60, 'https://images-na.ssl-images-amazon.com/images/I/814WAZ5-drL._AC_SL1500_.jpg', "Si tratta di un concept album suddiviso in quattordici brani e cinque intermezzi nei quali viene descritto il percorso di una persona che evade da una prigione per fuggire e far perdere le proprie tracce all'interno di una foresta.");
insert into traccia(N_traccia, album)
values
	(1, '026640'),
	(2, '026640'),
	(3, '026640'),
	(4, '026640'),
	(5, '026640'),
	(6, '026640'),
	(7, '026640'),
	(8, '026640'),
	(9, '026640'),
	(10, '026640'),
	(1, '023520'),
	(2, '023520'),
	(3, '023520'),
	(4, '023520'),
	(5, '023520'),
	(6, '023520'),
	(7, '023520'),
	(8, '023520'),
	(9, '023520'),
	(1, '033560'),
	(2, '033560'),
	(3, '033560'),
	(4, '033560'),
	(5, '033560'),
	(6, '033560'),
	(1, '070910'),
	(2, '070910'),
	(3, '070910'),
	(4, '070910'),
	(5, '070910'),
	(6, '070910'),
	(7, '070910'),
	(8, '070910'),
	(9, '070910'),
	(10, '070910'),
	(11, '070910'),
	(12, '070910'),
	(1, '064981'),
	(2, '064981'),
	(3, '064981'),
	(4, '064981'),
	(5, '064981'),
	(1, '011930'),
	(2, '011930'),
	(3, '011930'),
	(4, '011930'),
	(5, '011930'),
	(6, '011930'),
	(7, '011930'),
	(8, '011930'),
	(9, '011930'),
	(1, '086980'),
	(2, '086980'),
	(3, '086980'),
	(4, '086980'),
	(5, '086980'),
	(6, '086980'),
	(7, '086980'),
	(8, '086980'),
	(9, '086980'),
	(10, '086980'),
	(11, '086980'),
	(12, '086980'),
	(1, '043360'),
	(2, '043360'),
	(3, '043360'),
	(4, '043360'),
	(5, '043360'),
	(6, '043360'),
	(7, '043360'),
	(8, '043360'),
	(9, '043360'),
	(10, '043360'),
	(11, '043360'),
	(12, '043360');
	
insert into formato(tipo)
values
	('cassetta'),
	('vinile'),
	('cd');

insert into esisteIn(album, formato, prezzo)
values
	('026640', 'cd', 10.00),
	('033560', 'cassetta', 15.00),
	('026640', 'cassetta', 15.00),
	('026640', 'vinile', 15.00),
	('023520', 'vinile', 15.00),
	('086980', 'vinile', 15.00),
	('043360', 'vinile', 15.00),
	('070910', 'vinile', 35.50),
	('064981', 'cassetta', 19.00),
	('011930', 'cd', 14.50),
	('023520', 'cd', 15.00),	
	('039102', 'vinile', 32.00);
	


insert into piano(id, metri_quadri)
values
	(1, 20),
	(2, 30),
	(3, 40),
	(4, 35),
	(5, 25);
	
insert into cassettone(id, piano, capienza, posti_liberi, posti_occupati)
values
	(1, 1, 100, 100, 0),
	(2, 2, 150, 150, 0),
	(3, 2, 60, 60, 0),
	(4, 1, 150, 150, 0),
	(5, 4, 70, 70, 0);
	
insert into si_trova(album, cassettone, data, n_copie)
values
	('033560', 2, '2019-12-30', 2),
	('026640', 2, '2018-08-23', 1),
	('026640', 3, '2017-10-12', 3),
	('070910', 4, '2019-01-22', 2),
	('064981', 5, '2018-07-07', 1),
	('064981', 1, '2019-10-06', 1),
	('011930', 2, '2018-03-02', 3),	
	('023520', 1, '2020-12-21', 2),
	('023520', 4, '2020-02-01', 4),
	('086980', 5, '2020-05-16', 1),
	('043360', 5, '2020-07-22', 3),	
	('011930', 4, '2019-05-12', 3);
	
insert into impiegato(id_impiegato, nome, cognome, recapito)
values
	(1, 'Paolo', 'Verdi', '3320482748'),
	(2, 'Giacomo', 'Verdi', '3940294323'),
	(3, 'Mirio', 'Rossi', '3498834593'),
	(4, 'Mario', 'Bianchi', '2349933456'),
	(5, 'Antonio', 'Magi', '9034534329'),
	(6, 'Pippo', 'Rossi', '3455563323'),
	(7, 'Giovanno', 'Bianchi', '2341228897'),
	(8, 'Mario', 'Alti', '2355435465');
	
insert into piano_corrente(id, piano, impiegato, data_inizio)
values
	(1, 2, 5, '2015-12-03'),
	(2, 5, 1, '2019-11-02'),
	(3, 3, 3, '2018-04-14'),
	(4, 4, 2, '2019-08-20'),
	(5, 1, 4, '2016-06-03');
	
insert into piano_passato(id, piano, impiegato, data_inizio, data_fine)
values
	(1, 1, 3, '2016-04-20', '2017-12-24'),
	(2, 4, 3, '2017-12-24', '2018-04-14'),
	(3, 4, 4, '2015-03-12', '2016-06-03'),
	(4, 5, 2, '2017-08-11', '2018-11-09'),
	(5, 3, 2, '2018-11-09', '2019-08-20');

insert into cliente(cod_cliente, nome, cognome, data_nascita, username, email, pass)
values
	(1, 'Pippo', 'Mellino', '1982-11-03', 'Melliz', 'mellinopipp@hotmail.it', 'Mellinator09#'),
	(2, 'Sara', 'Rossi', '1990-04-12', 'Saretta', 'sarara@hotmail.it', 'dfoihaSsu99#'),
	(3, 'Marco', 'Bianchi', '1976-06-13', 'Mabillih', 'marco.bbb@hotmail.it', '#095asfkDDD'),
	(4, 'Giovanni', 'Umberti', '1988-09-22', 'Giovis', 'giovanniumb@hotmail.it', 'audgaII88sdf#'),
	(5, 'Gianluca', 'Monaco', '1992-07-02', 'Gingianc', 'giandols@hotmail.it', 'ddkk88UUhà#');

insert into acquisto(id, album, cliente, data_acquisto)
values
	(1, '033560', 2, '2019-11-04'),
	(2, '033560', 4, '2019-04-23'),
	(3, '064981', 1, '2019-03-12'),
	(4, '070910', 5, '2018-10-30'),
	(5, '011930', 1, '2020-01-05'),
	(6, '011930', 3, '2018-08-23'),
	(7, '026640', 3, '2018-08-23');

insert into carrello(id, album, cliente, formato)
values
	(1, '033560', 2, 'cassetta'),
	(2, '070910', 2, 'vinile'),
	(3, '011930', 1, 'cd'),
	(4, '011930', 3, 'cd'),
	(5, '026640', 1, 'vinile'),
	(6, '064981', 5, 'cassetta');


	
insert into fornitore(id_fornitore, nome, recapito)
values
	(1, 'Music&co', '3324567234'),
	(2, 'Giostra&Giova', '3242334999'),
	(3, 'NonSoloMusica', '3251226576'),
	(4, 'Garage', '3339341292'),
	(5, 'Machemusica', '3459000234');
	
insert into tempo(id, data_fornitura)
values
	(1, '2016-12-04'),
	(2, '2017-05-06'),
	(3, '2017-05-06'),
	(4, '2017-05-06'),
	(5, '2017-05-06'),
	(6, '2017-09-16'),
	(7, '2018-03-23'),
	(8, '2018-12-19');
	
insert into fornitura(id_fornitura, album, fornitore, id_data, prezzo)
values
	(1, '070910', 1, 2, 60),
	(2, '070910', 2, 2, 40),
	(3, '011930', 2, 3, 30),
	(4, '011930', 3, 3, 150),
	(5, '011930', 3, 4, 50),
	(6, '026640', 3, 5, 130);
