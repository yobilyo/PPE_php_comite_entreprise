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

insert into tresorerie values (NULL, 15000);
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

insert into activite values (NULL, "Parc Asterix", "Pailly", 200, 500, "Prix casse", "2020-11-28", "2020-11-30", 25, 1);

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



insert into utilisateur values (NULL, "Melanie", "45D4E", "melanie@cfa.fr"), (NULL, "Julien", "885DE", "julien@cfa.fr"), (NULL, "Gerard", "8555ed", "Gerard@cfa.fr");
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

insert into salarie values (1, "Melanie", "DUVIL", "0633928562", "paris", 2, "developpeur", "femme");
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

insert into sponsor values (2, "IMACInfo", 8000, "0685549655", 1);

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
# Table: admin
#------------------------------------------------------------

CREATE TABLE admin(
        idutilisateur Int NOT NULL ,
		FOREIGN KEY (idutilisateur) REFERENCES salarie(idutilisateur)
);


insert into admin values (1);


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