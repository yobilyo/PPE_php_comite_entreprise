#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

drop database if exists ce;
create database ce;
use ce;

#------------------------------------------------------------
# Table: Tresorerie
#------------------------------------------------------------

CREATE TABLE Tresorerie(
        id_tresorerie Int  Auto_increment  NOT NULL ,
        fonds         Float,
		PRIMARY KEY (id_tresorerie)
);

insert into tresorerie values (NULL, 895000);
#------------------------------------------------------------
# Table: activite
#------------------------------------------------------------

CREATE TABLE activite(
        id_activite   Int  Auto_increment  NOT NULL ,
        nom           Varchar (50),
        lieu          Varchar (50),
        budget        Float,
        description   Varchar (200),
        date_debut    Date,
        date_fin      Date,
        prix          Float,
		nb_personnes  Int(5),
        id_tresorerie Int NOT NULL,
		PRIMARY KEY (id_activite),
		FOREIGN KEY (id_tresorerie) REFERENCES Tresorerie(id_tresorerie)
);

insert into activite values (NULL, "Parc Asterix", "Plailly", 250, "Venez découvrir un Noël au Parc Astérix !", "2020-11-28", "2021-05-15", 25, 0, 1),
	(NULL, "Disneyland Paris", "Marne-La-Vallee", 550, "Noel chez Disney", "2020-11-28", "2021-08-10", 35, 0, 1),
	(NULL, "Voyage a NYC", "Etats Unis", 25, "Detendez vous en optant pour un voyage exceptionnel", "2020-12-08", "2021-03-14", 1550, 0, 1),
	(NULL, "Soins massages", "Paris", 350, "Prenez soin de vous avec ce massage tout compris", "2020-12-14", "2021-05-10", 32, 0, 1);

#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        idutilisateur Int  Auto_increment  NOT NULL ,
        username      Varchar (20),
        password      Varchar (20),
        email         Varchar (20),
		droits        Enum("salarie", "admin", "sponsor") NOT NULL,
		PRIMARY KEY (idutilisateur)
);



insert into utilisateur values (NULL, "Melanie", "45D4E", "melanie@cfa-insta.fr", "salarie"), 
	(NULL, "Julien", "885DE", "julien@cfa-insta.fr", "salarie"), 
	(NULL, "Gerard", "8555ed", "Gerard@cfa-insta.fr", "admin"),
	(NULL, "Franck", "445d4d", "Franck@cfa-insta.fr", "admin"),
	(NULL, "Damiens", "23daeez", "damiens@cfa-insta.fr", "salarie"),
	(NULL, "Cedric", "c85d4ee", "cedric@cfa-insta.fr", "sponsor"),
	(NULL, "Jessica", "jess744", "jessica@cfa-insta.fr", "sponsor"),
	(NULL, "Michele", "m847cihe", "michele@cfa-insta.fr", "sponsor"),
	(NULL, "Jeremie", "j885ee", "jeremie@cfa-insta.fr", "sponsor");
#------------------------------------------------------------
# Table: salarie
#------------------------------------------------------------

CREATE TABLE salarie(
        idutilisateur Int NOT NULL ,
        nom           Varchar (20),
        prenom        Varchar (20),
        tel           Varchar (15),
        adresse       Varchar (50),
        quotient_fam  Int,
        service       Enum ("comptabilite","developpeur","commercial","ressources_humaines"),
        sexe          Enum ("homme","femme"),
		FOREIGN KEY (idutilisateur) REFERENCES utilisateur(idutilisateur)
);

insert into salarie values (1, "Melanie", "DUVIL", "0633928562", "paris", 2, "developpeur", "femme"), 
							(2, "Julien", "BARRETO", "0645749655", "toulouse", 1, "commercial", "homme"),
							(3, "Gerard", "DEPARD", "0658856244", "bordeaux", 4, "comptabilite", "homme"),
							(4, "Franck", "HAMIAUX", "0755896254", "caen", 3, "ressources_humaines", "homme"),
							(5, "Damiens", "DENIS", "0646220322", "boissy-saint-leger", 1, "commercial", "homme");
#------------------------------------------------------------
# Table: Sponsor
#------------------------------------------------------------

CREATE TABLE Sponsor(
        idutilisateur Int NOT NULL ,
        societe       Varchar (20),
        budget        Float,
        tel           Varchar (15),
        id_tresorerie Int NOT NULL,
		FOREIGN KEY (idutilisateur) REFERENCES utilisateur(idutilisateur),
		FOREIGN KEY (id_tresorerie) REFERENCES Tresorerie(id_tresorerie)
);

insert into sponsor values (6, "IMACInfo", 8000, "0184452566", 1),
							(7, "Techphone", 5000, "0925526358", 1),
							(8, "ImatRepair", 9500, "0180300322", 1),
							(9, "SpaceTech", 10000, "0144857852", 1);

# voir tous les utilisateurs:
select * from utilisateur;

#------------------------------------------------------------
# Table: commentaire
#------------------------------------------------------------

CREATE TABLE commentaire(
        id_commentaire Int  Auto_increment  NOT NULL ,
        datecomment    Date,
        contenu        Text,
        id_activite    Int NOT NULL ,
        idutilisateur  Int NOT NULL,
		PRIMARY KEY (id_commentaire),
		FOREIGN KEY (id_activite) REFERENCES activite(id_activite),
		FOREIGN KEY (idutilisateur) REFERENCES salarie(idutilisateur)
);

insert into commentaire values (NULL, "2020-11-29", "Nous y retournerons très prochainement, c'était super !", 1, 1),
	(NULL, "2020-11-29", "Assez satisfait, prix intéressant", 2, 2),
	(NULL, "2020-11-30", "Un voyage inoubliable !", 3, 3),
	(NULL, "2020-12-02", "Mauvaise masseuse, prix bien trop élevé.", 4, 4);



#------------------------------------------------------------
# Table: contact
#------------------------------------------------------------

CREATE TABLE contact(
        id_contact    Int  Auto_increment  NOT NULL ,
        objet         Varchar (50),
        contenu       Varchar (500),
        date          Date,
        idutilisateur Int NOT NULL,
		PRIMARY KEY (id_contact),
		FOREIGN KEY (idutilisateur) REFERENCES utilisateur(idutilisateur)
);

insert into contact values (NULL, "Reservation", "Bonjour, je vous contacte suite à l'annonce concernant le voyage a New-York. Les chambres disposent-elle d'une SDB handicapée ? Merci", "2020-11-29",4),
						(NULL, "Probleme technique", "Bonjour, je ne parviens pas à accedez à mon espace CE", "2020-11-30", 4);

#------------------------------------------------------------
# Table: participer
#------------------------------------------------------------

CREATE TABLE participer(
        idutilisateur    Int NOT NULL ,
        id_activite      Int NOT NULL ,
        date_inscription Date,
		PRIMARY KEY (idutilisateur,id_activite),
		FOREIGN KEY (idutilisateur) REFERENCES salarie(idutilisateur),
		FOREIGN KEY (id_activite) REFERENCES activite(id_activite)
);

insert into participer values (1, 1, "2020-10-05"),
								(2, 2, "2020-08-20"),
								(3, 3, "2020-10-12"),
								(4, 4, "2020-04-17");



#------------------------------------------------------------
# Table: don
#------------------------------------------------------------

CREATE TABLE don(
		iddon int AUTO_INCREMENT not null ,
		datedon DATE,
		montant float ,
		appreciation varchar(50),
		idutilisateur int not null,
		id_tresorerie int not null,
		PRIMARY key (iddon),
		FOREIGN key(idutilisateur) REFERENCES utilisateur(idutilisateur),
		FOREIGN key (id_tresorerie) REFERENCES tresorerie(id_tresorerie)
);

INSERT INTO don VALUES (NULL,"2020-11-15", 5000, "Avec plaisir", 7,1),
						(NULL,"2020-12-10", 4000, "Pour vous aidez", 6,1),
						(NULL,"2020-12-10", 4000, "Etant riche, je me permet de vous donnez cette somme", 8,1);

#------------------------------------------------------------
# View : utilisateur_sponsor
#------------------------------------------------------------

create view utilisateur_sponsor as (
	select 
		u.idutilisateur,
		u.username, 
		u.email,
		u.password,
		u.droits, 
		s.societe, 
		s.budget, 
		s.tel, 
		t.id_tresorerie
		
	from utilisateur u, sponsor s, tresorerie t
	where u.idutilisateur = s.idutilisateur 
);


#------------------------------------------------------------
# View : utilisateur_salarie
#------------------------------------------------------------

create view utilisateur_salarie as (
	select  
		u.idutilisateur,
		u.username, 
		u.email,
		u.password,
		u.droits, 
		sa.nom, 
		sa.prenom,
		sa.sexe,
		sa.tel, 
		sa.adresse, 
		sa.quotient_fam, 
		sa.service
	from utilisateur u, salarie sa
	where u.idutilisateur = sa.idutilisateur
);


#------------------------------------------------------------
# View : utilisateur_salarie_activite
#------------------------------------------------------------

create view utilisateur_salarie_activite as (

	select 	
		u.idutilisateur,
		u.username, 
		u.email,
		u.password,
		u.droits, 
		sa.nom, 
		sa.prenom,
		sa.sexe,
		sa.tel, 
		sa.adresse, 
		sa.quotient_fam, 
		sa.service,
		a.nom as "nom_activite", 
		a.lieu, 
		a.nb_personnes, 
		a.description, 
		sum(a.prix) as "prix_total", 
		p.date_inscription
	
	from  utilisateur u, salarie sa, participer p, activite a, tresorerie t
	where u.idutilisateur = sa.idutilisateur 
	and sa.idutilisateur = p.idutilisateur  
	and p.id_activite = a.id_activite  
);

#------------------------------------------------------------
# View : utilisateur_salarie_activite_commentaire
#------------------------------------------------------------

create view utilisateur_salarie_activite_commentaire as (

	select 	
		u.idutilisateur,
		u.username, 
		u.email,
		u.password,
		u.droits, 
		sa.nom, 
		sa.prenom, 
		sa.tel, 
		sa.adresse, 
		sa.service, 
		a.nom as "nom_activite",
		a.lieu,
		a.description,
		c.contenu,
		c.datecomment,
		c.id_commentaire
		
	
	from  utilisateur u, salarie sa, participer p, activite a, tresorerie t, commentaire c
	where u.idutilisateur = sa.idutilisateur 
	and sa.idutilisateur = p.idutilisateur  
	and p.id_activite = a.id_activite  
	and c.id_activite = a.id_activite 
);

#------------------------------------------------------------
# View : utilisateur_sponsor_don
#------------------------------------------------------------
create view utilisateur_sponsor_don as (
    select 
		d.iddon,
        u.username , 
        u.email, 
        s.societe , 
        s.budget, 
        s.tel , 
        d.montant,
        d.appreciation

    from utilisateur u, sponsor s, don d
    where u.idutilisateur = s.idutilisateur 
	AND s.idutilisateur = d.idutilisateur
);


#------------------------------------------------------------
# View : utilisateur_contact
#------------------------------------------------------------


create view utilisateur_contact as (
	SELECT
		c.id_contact,
		c.objet,
		c.contenu,
		c.date,
		u.username
	
	from contact c, utilisateur u
	where c.idutilisateur = u.idutilisateur
);

#------------------------------------------------------------
# View : utilisateur_administrateur 
#------------------------------------------------------------


create view utilisateur_administrateur as (
	SELECT
		*
	from utilisateur
	where utilisateur.droits="admin"
);



# verification :
select * from utilisateur_salarie;
select * from utilisateur_sponsor;
select * from utilisateur_salarie_activite;
select * from utilisateur_salarie_activite_commentaire;
select * from utilisateur_sponsor_don;
select * from utilisateur_contact;
select * from utilisateur_administrateur;
select * from participer;
select * from activite;
select * from commentaire;
select * from don;
select * from tresorerie;
select * from contact;

