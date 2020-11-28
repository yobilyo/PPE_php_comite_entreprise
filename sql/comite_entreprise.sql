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
        fonds         Float NOT NULL
	,CONSTRAINT Tresorerie_PK PRIMARY KEY (id_tresorerie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: activite
#------------------------------------------------------------

CREATE TABLE activite(
        id_activite   Int  Auto_increment  NOT NULL ,
        nom           Varchar (50) NOT NULL ,
        lieu          Varchar (50) NOT NULL ,
        nb_personnes  Int NOT NULL ,
        budget        Float NOT NULL ,
        description   Varchar (200) NOT NULL ,
        date_debut    Date NOT NULL ,
        date_fin      Date NOT NULL ,
        prix          Float NOT NULL ,
        id_tresorerie Int NOT NULL
	,CONSTRAINT activite_PK PRIMARY KEY (id_activite)

	,CONSTRAINT activite_Tresorerie_FK FOREIGN KEY (id_tresorerie) REFERENCES Tresorerie(id_tresorerie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        idutilisateur Int  Auto_increment  NOT NULL ,
        username      Varchar (20) NOT NULL ,
        password      Varchar (20) NOT NULL ,
        email         Varchar (20) NOT NULL
	,CONSTRAINT utilisateur_PK PRIMARY KEY (idutilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: salarie
#------------------------------------------------------------

CREATE TABLE salarie(
        idutilisateur Int NOT NULL ,
        nom           Varchar (20) NOT NULL ,
        prenom        Varchar (20) NOT NULL ,
        tel           Varchar (15) NOT NULL ,
        adresse       Varchar (50) NOT NULL ,
        quotient_fam  Int NOT NULL ,
        service       Enum ("comptabilite","developpeur","commercial","ressources_humaines") NOT NULL ,
        sexe          Enum ("homme","femme") NOT NULL ,
        username      Varchar (20) NOT NULL ,
        password      Varchar (20) NOT NULL ,
        email         Varchar (20) NOT NULL
	,CONSTRAINT salarie_PK PRIMARY KEY (idutilisateur)

	,CONSTRAINT salarie_utilisateur_FK FOREIGN KEY (idutilisateur) REFERENCES utilisateur(idutilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Sponsor
#------------------------------------------------------------

CREATE TABLE Sponsor(
        idutilisateur Int NOT NULL ,
        societe       Varchar (20) NOT NULL ,
        budget        Float NOT NULL ,
        tel           Varchar (15) NOT NULL ,
        username      Varchar (20) NOT NULL ,
        password      Varchar (20) NOT NULL ,
        email         Varchar (20) NOT NULL ,
        id_tresorerie Int NOT NULL
	,CONSTRAINT Sponsor_PK PRIMARY KEY (idutilisateur)

	,CONSTRAINT Sponsor_utilisateur_FK FOREIGN KEY (idutilisateur) REFERENCES utilisateur(idutilisateur)
	,CONSTRAINT Sponsor_Tresorerie0_FK FOREIGN KEY (id_tresorerie) REFERENCES Tresorerie(id_tresorerie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: commentaire
#------------------------------------------------------------

CREATE TABLE commentaire(
        id_commentaire Int  Auto_increment  NOT NULL ,
        datecomment    Date NOT NULL ,
        contenu        Text NOT NULL ,
        id_activite    Int NOT NULL ,
        idutilisateur  Int NOT NULL
	,CONSTRAINT commentaire_PK PRIMARY KEY (id_commentaire)

	,CONSTRAINT commentaire_activite_FK FOREIGN KEY (id_activite) REFERENCES activite(id_activite)
	,CONSTRAINT commentaire_salarie0_FK FOREIGN KEY (idutilisateur) REFERENCES salarie(idutilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: admin
#------------------------------------------------------------

CREATE TABLE admin(
        idutilisateur Int NOT NULL ,
        username      Varchar (20) NOT NULL ,
        password      Varchar (20) NOT NULL ,
        email         Varchar (20) NOT NULL ,
        nom           Varchar (20) NOT NULL ,
        prenom        Varchar (20) NOT NULL ,
        tel           Varchar (15) NOT NULL ,
        adresse       Varchar (50) NOT NULL ,
        quotient_fam  Int NOT NULL ,
        service       Enum ("comptabilite","developpeur","commercial","ressources_humaines") NOT NULL ,
        sexe          Enum ("homme","femme") NOT NULL
	,CONSTRAINT admin_PK PRIMARY KEY (idutilisateur)

	,CONSTRAINT admin_salarie_FK FOREIGN KEY (idutilisateur) REFERENCES salarie(idutilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contact
#------------------------------------------------------------

CREATE TABLE contact(
        id_contact    Int  Auto_increment  NOT NULL ,
        objet         Varchar (50) NOT NULL ,
        contenu       Varchar (500) NOT NULL ,
        date          Date NOT NULL ,
        idutilisateur Int NOT NULL
	,CONSTRAINT contact_PK PRIMARY KEY (id_contact)

	,CONSTRAINT contact_utilisateur_FK FOREIGN KEY (idutilisateur) REFERENCES utilisateur(idutilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: participer
#------------------------------------------------------------

CREATE TABLE participer(
        idutilisateur    Int NOT NULL ,
        id_activite      Int NOT NULL ,
        date_inscription Date NOT NULL
	,CONSTRAINT participer_PK PRIMARY KEY (idutilisateur,id_activite)

	,CONSTRAINT participer_salarie_FK FOREIGN KEY (idutilisateur) REFERENCES salarie(idutilisateur)
	,CONSTRAINT participer_activite0_FK FOREIGN KEY (id_activite) REFERENCES activite(id_activite)
)ENGINE=InnoDB;

