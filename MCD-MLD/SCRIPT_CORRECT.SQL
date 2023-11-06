-- -----------------------------------------------------------------------------
--             Génération d'une base de données pour
--                      Oracle Version 10g
--                        (6/11/2023 17:38:03)
-- -----------------------------------------------------------------------------
--      Nom de la base : MLR2
--      Projet : Espace de travail
--      Auteur : WD_User
--      Date de dernière modification : 6/11/2023 17:36:15
-- -----------------------------------------------------------------------------

DROP TABLE TAGS CASCADE CONSTRAINTS;

DROP TABLE STATUT CASCADE CONSTRAINTS;

DROP TABLE TYPE CASCADE CONSTRAINTS;

DROP TABLE RECETTE CASCADE CONSTRAINTS;

DROP TABLE UTILISATEUR CASCADE CONSTRAINTS;

DROP TABLE CATEGORIE CASCADE CONSTRAINTS;

DROP TABLE INGREDIENT CASCADE CONSTRAINTS;

DROP TABLE COMMENTAIRES CASCADE CONSTRAINTS;

DROP TABLE MENTIONNER CASCADE CONSTRAINTS;

DROP TABLE CONTENIR CASCADE CONSTRAINTS;

-- -----------------------------------------------------------------------------
--       CREATION DE LA BASE 
-- -----------------------------------------------------------------------------

CREATE DATABASE MLR2;

-- -----------------------------------------------------------------------------
--       TABLE : TAGS
-- -----------------------------------------------------------------------------

CREATE TABLE TAGS
   (
    TAG_ID DB_LONG(4)  NOT NULL,
    TAG_INTITULE DB_TEXT, 255  NULL
,   CONSTRAINT PK_TAGS PRIMARY KEY (TAG_ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : STATUT
-- -----------------------------------------------------------------------------

CREATE TABLE STATUT
   (
    STA_ID DB_LONG(4)  NOT NULL,
    STA_INTITULE DB_TEXT, 255  NULL
,   CONSTRAINT PK_STATUT PRIMARY KEY (STA_ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : TYPE
-- -----------------------------------------------------------------------------

CREATE TABLE TYPE
   (
    TYP_ID DB_LONG(4)  NOT NULL,
    TYP_INTITULE DB_TEXT, 255  NULL
,   CONSTRAINT PK_TYPE PRIMARY KEY (TYP_ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : RECETTE
-- -----------------------------------------------------------------------------

CREATE TABLE RECETTE
   (
    REC_ID DB_LONG(4)  NOT NULL,
    CAT_ID DB_LONG(4)  NOT NULL,
    USER_ID DB_LONG(4)  NOT NULL,
    REC_TITRE DB_TEXT, 255  NULL,
    REC_CONTENU DB_TEXT, 255  NULL,
    REC_RESUME DB_TEXT, 255  NULL,
    REC_CATEGORIE DB_TEXT, 255  NULL,
    REC_DATE_INS DB_DATE(8)  NULL,
    REC_IMAGE DB_TEXT, 255  NULL,
    REC_DATE_CREA DB_DATE(8)  NULL,
    REC_DATE_MODIF DB_DATE(8)  NULL,
    REC_AUTEUR DB_TEXT, 255  NULL
,   CONSTRAINT PK_RECETTE PRIMARY KEY (REC_ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE RECETTE
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_RECETTE_CATEGORIE
     ON RECETTE (CAT_ID ASC)
    ;

CREATE  INDEX I_FK_RECETTE_UTILISATEUR
     ON RECETTE (USER_ID ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : UTILISATEUR
-- -----------------------------------------------------------------------------

CREATE TABLE UTILISATEUR
   (
    USER_ID DB_LONG(4)  NOT NULL,
    TYP_ID DB_LONG(4)  NOT NULL,
    STA_ID DB_LONG(4)  NOT NULL,
    USER_PSEUDO DB_TEXT, 255  NOT NULL,
    USER_EMAIL DB_TEXT, 255  NOT NULL,
    USER_PRENOM DB_TEXT, 255  NOT NULL,
    USER_NOM DB_TEXT, 255  NOT NULL,
    USER_DATE_INS DB_DATE(12)  NOT NULL,
    USER_MDP DB_TEXT(1000)  NOT NULL
,   CONSTRAINT PK_UTILISATEUR PRIMARY KEY (USER_ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE UTILISATEUR
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_UTILISATEUR_TYPE
     ON UTILISATEUR (TYP_ID ASC)
    ;

CREATE  INDEX I_FK_UTILISATEUR_STATUT
     ON UTILISATEUR (STA_ID ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : CATEGORIE
-- -----------------------------------------------------------------------------

CREATE TABLE CATEGORIE
   (
    CAT_ID DB_LONG(4)  NOT NULL,
    CAT_INTITULE DB_TEXT, 255  NULL,
    CAT_DESC DB_TEXT, 255  NULL
,   CONSTRAINT PK_CATEGORIE PRIMARY KEY (CAT_ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : INGREDIENT
-- -----------------------------------------------------------------------------

CREATE TABLE INGREDIENT
   (
    ING_ID DB_LONG(4)  NOT NULL,
    ING_INTITULE DB_TEXT, 255  NULL,
    ING_DESC DB_TEXT, 255  NULL
,   CONSTRAINT PK_INGREDIENT PRIMARY KEY (ING_ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : COMMENTAIRES
-- -----------------------------------------------------------------------------

CREATE TABLE COMMENTAIRES
   (
    COM_ID DB_LONG(4)  NOT NULL,
    USER_ID DB_LONG(4)  NOT NULL,
    REC_ID DB_LONG(4)  NOT NULL,
    COM_DESCRIPTION DB_TEXT, 255  NULL
,   CONSTRAINT PK_COMMENTAIRES PRIMARY KEY (COM_ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE COMMENTAIRES
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_COMMENTAIRES_UTILISATEUR
     ON COMMENTAIRES (USER_ID ASC)
    ;

CREATE  INDEX I_FK_COMMENTAIRES_RECETTE
     ON COMMENTAIRES (REC_ID ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : MENTIONNER
-- -----------------------------------------------------------------------------

CREATE TABLE MENTIONNER
   (
    REC_ID DB_LONG(4)  NOT NULL,
    TAG_ID DB_LONG(4)  NOT NULL
,   CONSTRAINT PK_MENTIONNER PRIMARY KEY (REC_ID, TAG_ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE MENTIONNER
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_MENTIONNER_RECETTE
     ON MENTIONNER (REC_ID ASC)
    ;

CREATE  INDEX I_FK_MENTIONNER_TAGS
     ON MENTIONNER (TAG_ID ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : CONTENIR
-- -----------------------------------------------------------------------------

CREATE TABLE CONTENIR
   (
    REC_ID DB_LONG(4)  NOT NULL,
    ING_ID DB_LONG(4)  NOT NULL
,   CONSTRAINT PK_CONTENIR PRIMARY KEY (REC_ID, ING_ID)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE CONTENIR
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_CONTENIR_RECETTE
     ON CONTENIR (REC_ID ASC)
    ;

CREATE  INDEX I_FK_CONTENIR_INGREDIENT
     ON CONTENIR (ING_ID ASC)
    ;


-- -----------------------------------------------------------------------------
--       CREATION DES REFERENCES DE TABLE
-- -----------------------------------------------------------------------------


ALTER TABLE RECETTE ADD (
     CONSTRAINT FK_RECETTE_CATEGORIE
          FOREIGN KEY (CAT_ID)
               REFERENCES CATEGORIE (CAT_ID))   ;

ALTER TABLE RECETTE ADD (
     CONSTRAINT FK_RECETTE_UTILISATEUR
          FOREIGN KEY (USER_ID)
               REFERENCES UTILISATEUR (USER_ID))   ;

ALTER TABLE UTILISATEUR ADD (
     CONSTRAINT FK_UTILISATEUR_TYPE
          FOREIGN KEY (TYP_ID)
               REFERENCES TYPE (TYP_ID))   ;

ALTER TABLE UTILISATEUR ADD (
     CONSTRAINT FK_UTILISATEUR_STATUT
          FOREIGN KEY (STA_ID)
               REFERENCES STATUT (STA_ID))   ;

ALTER TABLE COMMENTAIRES ADD (
     CONSTRAINT FK_COMMENTAIRES_UTILISATEUR
          FOREIGN KEY (USER_ID)
               REFERENCES UTILISATEUR (USER_ID))   ;

ALTER TABLE COMMENTAIRES ADD (
     CONSTRAINT FK_COMMENTAIRES_RECETTE
          FOREIGN KEY (REC_ID)
               REFERENCES RECETTE (REC_ID))   ;

ALTER TABLE MENTIONNER ADD (
     CONSTRAINT FK_MENTIONNER_RECETTE
          FOREIGN KEY (REC_ID)
               REFERENCES RECETTE (REC_ID))   ;

ALTER TABLE MENTIONNER ADD (
     CONSTRAINT FK_MENTIONNER_TAGS
          FOREIGN KEY (TAG_ID)
               REFERENCES TAGS (TAG_ID))   ;

ALTER TABLE CONTENIR ADD (
     CONSTRAINT FK_CONTENIR_RECETTE
          FOREIGN KEY (REC_ID)
               REFERENCES RECETTE (REC_ID))   ;

ALTER TABLE CONTENIR ADD (
     CONSTRAINT FK_CONTENIR_INGREDIENT
          FOREIGN KEY (ING_ID)
               REFERENCES INGREDIENT (ING_ID))   ;


-- -----------------------------------------------------------------------------
--                FIN DE GENERATION
-- -----------------------------------------------------------------------------