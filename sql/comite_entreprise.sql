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
        nb_personnes  Int(5),
        budget        Float,
        description   Varchar (200),
        date_debut    Date,
        date_fin      Date,
        prix          Float,
        id_tresorerie Int NOT NULL,
		PRIMARY KEY (id_activite),
		FOREIGN KEY (id_tresorerie) REFERENCES Tresorerie(id_tresorerie)
);

insert into activite values (NULL, "Parc Asterix", "Plailly", 250, 1000, "Venez decouvrir Noel au sein d'Asterix", "2020-11-28", "2021-05-15", 25, 1),
	(NULL, "Disneyland Paris", "Marne-La-Vallee", 550, 500, "Noel chez Disney", "2020-11-28", "2021-08-10", 35, 1),
	(NULL, "Voyage a NYC", "Etats Unis", 25, 25000, "Detendez vous en optant pour un voyage exceptionnel", "2020-12-08", "2021-03-14", 1550, 1),
	(NULL, "Soins massage", "Paris", 350, 990, "Detendez-vous en optant pour un voyage exceptionnel", "2020-12-14", "2021-05-10", 32, 1);

#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        idutilisateur Int  Auto_increment  NOT NULL ,
        username      Varchar (20),
        password      Varchar (20),
        email         Varchar (20),
		PRIMARY KEY (idutilisateur)
);



insert into utilisateur values (NULL, "Melanie", "45D4E", "melanie@cfa-insta.fr"), 
								(NULL, "Julien", "885DE", "julien@cfa-insta.fr"), 
								(NULL, "Gerard", "8555ed", "Gerard@cfa-insta.fr"),
								(NULL, "Franck", "445d4d", "Franck@cfa-insta.fr"),
								(NULL, "Damiens", "23daeez", "damiens@cfa-insta.fr"),
								(NULL, "Cedric", "c85d4ee", "cedric@cfa-insta.fr"),
								(NULL, "Jessica", "jess744", "jessica@cfa-insta.fr"),
								(NULL, "Michele", "m847cihe", "michele@cfa-insta.fr"),
								(NULL, "Jeremie", "j885ee", "jeremie@cfa-insta.fr");
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

insert into commentaire values (NULL, "2020-11-29", "Nous y retournerons tres prochainement, c'etais super !", 1, 1),
	(NULL, "2020-11-29", "Assez satisfait, prix interessant", 2, 2),
	(NULL, "2020-11-30", "Un voyage inoubliable !", 3, 3),
	(NULL, "2020-12-02", "Mauvaise masseuse, prix bien trop eleve.", 4, 4);



#------------------------------------------------------------
# Table: admin
#------------------------------------------------------------

CREATE TABLE admin(
        idutilisateur Int NOT NULL ,
		FOREIGN KEY (idutilisateur) REFERENCES salarie(idutilisateur)
);


insert into admin values (3), (4);


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

insert into contact values (NULL, "Reservation", "Bonjour, je vous contact suite a l'annonce concernant le voyage a New-York. Les chambres disposent-elle d'une SDB handicapée ? Merci", "2020-11-29",4),
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
# View : utilisateur_sponsor
#------------------------------------------------------------

create view utilisateur_sponsor as (
	select u.idutilisateur, u.username, u.email, s.societe, s.budget, s.tel, t.id_tresorerie
	from utilisateur u, sponsor s, tresorerie t
	where u.idutilisateur = s.idutilisateur 
);


#------------------------------------------------------------
# View : utilisateur_salarie
#------------------------------------------------------------

create view utilisateur_salarie as (
	select u.idutilisateur, u.username, u.email, sa.nom, sa.prenom, sa.tel, sa.adresse, sa.quotient_fam, sa.service, sa.sexe
	from utilisateur u, salarie sa
	where u.idutilisateur = sa.idutilisateur
);

#------------------------------------------------------------
# View : utilisateur_salarie_admin
#------------------------------------------------------------

create view utilisateur_salarie_admin as (
	select u.idutilisateur, u.username, u.email, sa.nom, sa.prenom, sa.tel, sa.adresse, sa.quotient_fam, sa.service, sa.sexe
	from utilisateur u, salarie sa, admin a
	where a.idutilisateur = sa.idutilisateur
	and sa.idutilisateur = u.idutilisateur
);


#------------------------------------------------------------
# View : utilisateur_salarie_activite
#------------------------------------------------------------

create view utilisateur_salarie_activite as (

	select 	
			sa.nom as "Nom", 
			sa.prenom as "Prénom", 
			sa.tel as "Téléphone", 
			sa.adresse as "Adresse", 
			sa.quotient_fam as "Quotient familial", 
			sa.service as "Service", 
			a.nom as "Nom activite", 
			a.lieu as "Lieu", 
			a.nb_personnes as "Nombre de personnes", 
			a.description as "Desciption de l'activitée", 
			sum(a.prix) as "Prix total", 
			p.date_inscription as "Date inscription"
	
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
			sa.nom as "Nom", 
			sa.prenom as "Prénom", 
			sa.tel as "Téléphone", 
			sa.adresse as "Adresse", 
			sa.service as "Service", 
			a.nom as "Nom activite",
			a.lieu as "Lieu",
			a.description as "Description de l'activitée",
			c.contenu as "Commentaire"
	
	from  utilisateur u, salarie sa, participer p, activite a, tresorerie t, commentaire c
	
	where u.idutilisateur = sa.idutilisateur 
	and sa.idutilisateur = p.idutilisateur  
	and p.id_activite = a.id_activite  
	and c.id_activite = a.id_activite 
);

# verification :
select * from utilisateur_salarie;
select * from utilisateur_salarie_admin;
select * from utilisateur_sponsor;
select * from utilisateur_salarie_activite;
select * from utilisateur_salarie_activite_commentaire;
select * from activite;
select * from commentaire;
select * from tresorerie;
select * from contact;

