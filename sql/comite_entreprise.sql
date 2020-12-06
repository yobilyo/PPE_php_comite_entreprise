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

#------------------------------------------------------------
# Table: activite
#------------------------------------------------------------

CREATE TABLE activite(
        id_activite   Int  Auto_increment  NOT NULL ,
        nom           Varchar (50),
        lieu          Varchar (50),
		image_url	  Varchar (100),
		lien	  	Varchar (100),
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
#------------------------------------------------------------
# Table: salarie
#------------------------------------------------------------

CREATE TABLE salarie(
        idutilisateur Int NOT NULL ,
        nom           Varchar (20),
        prenom        Varchar (20),
        tel           Varchar (15),
        adresse       Varchar (50),
        quotient_fam  Enum ("1","2","3","4","5"),
        service       Enum ("comptabilite","developpeur","commercial","ressources_humaines"),
        sexe          Enum ("homme","femme"),
		FOREIGN KEY (idutilisateur) REFERENCES utilisateur(idutilisateur)
);
#------------------------------------------------------------
# Table: Sponsor
#------------------------------------------------------------

CREATE TABLE Sponsor(
        idutilisateur Int NOT NULL ,
        societe       Varchar (20),
        budget        Float,
        tel           Varchar (15),

		FOREIGN KEY (idutilisateur) REFERENCES utilisateur(idutilisateur)
		
);
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
		s.tel
		
		
	from utilisateur u, sponsor s where u.idutilisateur = s.idutilisateur 
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
		a.image_url,
		a.lien,
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
		a.id_activite,
		a.nom as "nom_activite",
		a.lieu,
		a.image_url,
		a.lien,
		c.id_commentaire,
		c.contenu,
		c.datecomment
	
	
	from  utilisateur u, salarie sa, activite a, tresorerie t, commentaire c
	where u.idutilisateur = sa.idutilisateur 
	and c.idutilisateur = sa.idutilisateur
	and c.id_activite = a.id_activite 
);

#------------------------------------------------------------
# View : utilisateur_sponsor_don
#------------------------------------------------------------
create view utilisateur_sponsor_don as (
    select 
		u.idutilisateur,
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

#------------------------------------------------------------
# View : utilisateur_salarie_activite_participer
#------------------------------------------------------------


create view utilisateur_salarie_activite_participer as (

	select 	
		u.idutilisateur,
		a.id_activite,
		u.username, 
		u.email,
		sa.nom, 
		sa.prenom, 
		sa.tel, 
		sa.adresse, 
		sa.service, 
		a.nom as "nom_activite",
		p.date_inscription,
		a.lieu,
		a.image_url,
		a.lien,
		a.description
		
	
	from  utilisateur u, salarie sa, participer p, activite a, tresorerie t
	where u.idutilisateur = sa.idutilisateur 
	and sa.idutilisateur = p.idutilisateur  
	and p.id_activite = a.id_activite
);


#------------------------------------------------------------
# Trigger : ajout_don_tresorerie
#------------------------------------------------------------


DROP trigger IF EXISTS ajout_don_tresorerie;
DELIMITER $
CREATE TRIGGER ajout_don_tresorerie
AFTER INSERT ON don
FOR EACH ROW
BEGIN
	UPDATE tresorerie SET fonds = fonds + new.montant
	WHERE new.id_tresorerie = id_tresorerie;
END $
DELIMITER ;

#------------------------------------------------------------
# Trigger : modifie_don_tresorerie
#------------------------------------------------------------

DROP trigger IF EXISTS modifie_don_tresorerie;
DELIMITER $
CREATE TRIGGER modifie_don_tresorerie
AFTER UPDATE ON don
FOR EACH ROW
BEGIN
	UPDATE tresorerie SET fonds = fonds - old.montant + new.montant
	WHERE new.id_tresorerie = id_tresorerie;
END $
DELIMITER ;

#------------------------------------------------------------
# Trigger : supprime_don_tresorerie
#------------------------------------------------------------

DROP trigger IF EXISTS supprime_don_tresorerie;
DELIMITER $
CREATE TRIGGER supprime_don_tresorerie
AFTER DELETE ON don
FOR EACH ROW
BEGIN
	UPDATE tresorerie SET fonds = fonds - old.montant
	WHERE old.id_tresorerie = id_tresorerie;
END $
DELIMITER ;


#------------------------------------------------------------
# Trigger : update_budget_activite_fond_tresorerie
#Apres une insertion dans participation, mettre a jour le budget de l activité ainsi que les fonds de la trésorerie
#------------------------------------------------------------

#DROP trigger IF EXISTS maj_budget_activite;
#DELIMITER $
#CREATE TRIGGER maj_budget_activite
#AFTER INSERT ON participer
#FOR EACH ROW
#BEGIN
#	UPDATE activite SET budget = budget + new.???
#	WHERE new.id_activite = id_activite;
#END $
#DELIMITER ;

#------------------------------------------------------------
# Trigger : ajout_participation_activite 
#Le nombre de personne inscrit va être actualisé à chaque insertion d une participation
#------------------------------------------------------------

DROP TRIGGER IF EXISTS ajout_participation_activite;
DELIMITER $
CREATE TRIGGER ajout_participation_activite
AFTER INSERT ON participer
FOR EACH ROW
BEGIN
	UPDATE activite SET nb_personnes = nb_personnes + 1
	WHERE new.id_activite = id_activite;
END $
DELIMITER ;

#------------------------------------------------------------
# Trigger : modifie_participation_activite
#Le nombre de personne inscrit va être actualisé à chaque suppression d une participation
#------------------------------------------------------------

DROP TRIGGER IF EXISTS supprime_participation_activite;
DELIMITER $
CREATE TRIGGER supprime_participation_activite
AFTER DELETE ON participer
FOR EACH ROW
BEGIN
	UPDATE activite SET nb_personnes = nb_personnes - 1
	WHERE old.id_activite = id_activite;
END $
DELIMITER ;

#------------------------------------------------------------
# Trigger : ajout_activite_tresorerie
#------------------------------------------------------------


DROP trigger IF EXISTS ajout_activite_tresorerie;
DELIMITER $
CREATE TRIGGER ajout_activite_tresorerie
AFTER INSERT ON activite
FOR EACH ROW
BEGIN
    UPDATE tresorerie SET fonds = fonds - new.budget
    WHERE new.id_tresorerie = id_tresorerie;
END $
DELIMITER ;

#------------------------------------------------------------
# Trigger : modifie_activite_tresorerie
#------------------------------------------------------------

DROP trigger IF EXISTS modifie_activite_tresorerie;
DELIMITER $
CREATE TRIGGER modifie_activite_tresorerie
AFTER UPDATE ON activite
FOR EACH ROW
BEGIN
    UPDATE tresorerie SET fonds = fonds + old.budget - new.budget
    WHERE new.id_tresorerie = id_tresorerie;
END $
DELIMITER ;

#------------------------------------------------------------
# Trigger : supprime_activite_tresorerie
#------------------------------------------------------------

DROP trigger IF EXISTS supprime_activite_tresorerie;
DELIMITER $
CREATE TRIGGER supprime_activite_tresorerie
AFTER DELETE ON activite
FOR EACH ROW
BEGIN
    UPDATE tresorerie SET fonds = fonds + old.budget
    WHERE old.id_tresorerie = id_tresorerie;
END $
DELIMITER ;

#On insère ces valeurs après le trigger pour que ce soit pris en compte

# au début la trésorerie est haute afin de pouvoir créer de nombreuses activités en sql
insert into tresorerie values (NULL, 50000);

insert into activite values (1, "Parc Asterix", "Plailly", "lib/images/parc_asterix.jpg","https://www.parcasterix.fr/", 1150, "Venez découvrir un Noël au Parc Astérix !", "2020-11-28", "2021-05-15", 25, 0, 1),
	(2, "Disneyland Paris", "Marne-La-Vallee", "lib/images/disneyland.jpg", "https://www.disneylandparis.com/fr-fr/", 730, "Noel chez Disney", "2020-11-28", "2021-08-10", 35, 0, 1),
	(3, "Voyage a NYC", "Etats Unis", "lib/images/voyage-new-york.jpg","https://www.leclercvoyages.com/product/?pid=253098&c.desti=US.EST#rubric=search&dispo=25-03-2021-5-3-PAR&dpci=&p=m_c.desti%3DUS.NYC", 7000, "Detendez vous en optant pour un voyage exceptionnel", "2020-12-08", "2021-03-14", 950, 0, 1),
	(4, "Soins massages", "Paris", "lib/images/massage.jpg","https://www.massage-concept.fr/", 900, "Prenez soin de vous avec ce massage tout compris", "2020-12-14", "2021-05-10", 32, 0, 1);

insert into utilisateur values (1, "Melanie", "45D4E", "melanie@cfa-insta.fr", "salarie"), 
	(2, "Julien", "885DE", "julien@cfa-insta.fr", "salarie"), 
	(3, "Gerard", "8555ed", "Gerard@cfa-insta.fr", "admin"),
	(4, "Franck", "445d4d", "Franck@cfa-insta.fr", "admin"),
	(5, "Damiens", "23daeez", "damiens@cfa-insta.fr", "salarie"),
	(6, "Cedric", "c85d4ee", "cedric@cfa-insta.fr", "sponsor"),
	(7, "Jessica", "jess744", "jessica@cfa-insta.fr", "sponsor"),
	(8, "Michele", "m847cihe", "michele@cfa-insta.fr", "sponsor"),
	(9, "Jeremie", "j885ee", "jeremie@cfa-insta.fr", "sponsor"),
	(10, "admin", "", "a@gmail.com", "admin"),
	(11, "salarie", "", "sa@gmail.com", "salarie"),
	(12, "sponsor", "", "sp@gmail.com", "sponsor");

insert into salarie values (1, "Melanie", "DUVIL", "0633928562", "paris", 2, "developpeur", "femme"), 
							(2, "Julien", "BARRETO", "0645749655", "toulouse", 1, "commercial", "homme"),
							(3, "Gerard", "DEPARD", "0658856244", "bordeaux", 4, "comptabilite", "homme"),
							(4, "Franck", "HAMIAUX", "0755896254", "caen", 3, "ressources_humaines", "homme"),
							(5, "Damiens", "DENIS", "0646220322", "boissy-saint-leger", 1, "commercial", "homme"),
							(10, "Franck", "HAMIAUX", "0755896254", "caen", 3, "ressources_humaines", "homme"),
							(11, "Franck", "HAMIAUX", "0755896254", "caen", 3, "ressources_humaines", "homme");

insert into participer values (1, 1, "2020-10-05"),
								(2, 2, "2020-08-20"),
								(3, 3, "2020-10-12"),
								(4, 4, "2020-04-17");

insert into commentaire values (NULL, "2020-11-29", "Nous y retournerons très prochainement, c'était super !", 1, 1),
	(NULL, "2020-11-29", "Assez satisfait, prix intéressant", 2, 2),
	(NULL, "2020-11-30", "Un voyage inoubliable !", 3, 3),
	(NULL, "2020-12-02", "Mauvaise masseuse, prix bien trop élevé.", 4, 4);

insert into sponsor values (6, "IMACInfo", 8000, "0184452566"),
							(7, "Techphone", 5000, "0925526358"),
							(8, "ImatRepair", 9500, "0180300322"),
							(9, "SpaceTech", 10000, "0144857852"),
							(12, "ImatRepair", 9500, "0180300322");

insert into contact values (NULL, "Reservation", "Bonjour, je vous contacte suite à l'annonce concernant le voyage a New-York. Les chambres disposent-elle d'une SDB handicapée ? Merci", "2020-11-29",4),
						(NULL, "Probleme technique", "Bonjour, je ne parviens pas à accedez à mon espace CE", "2020-11-30", 4);

INSERT INTO don VALUES (NULL,"2020-11-15", 300, "Avec plaisir", 7,1),
						(NULL,"2020-12-10", 450, "Pour vous aider", 6,1),
						(NULL,"2020-12-10", 180, "Etant riche, je me permet de vous donnez cette somme", 8,1);

# verification :
select * from utilisateur_salarie;
select * from utilisateur_sponsor;
select * from utilisateur_salarie_activite;
select * from utilisateur_salarie_activite_commentaire;
select * from utilisateur_sponsor_don;
select * from utilisateur_contact;
select * from utilisateur_administrateur;
select * from utilisateur_salarie_activite_participer;
select * from utilisateur;
select * from participer;
select * from activite;
select * from commentaire;
select * from don;
select * from tresorerie;
select * from contact;

