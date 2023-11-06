DROP DATABASE IF EXISTS MLR2;

CREATE DATABASE IF NOT EXISTS MLR2;
USE MLR2;
# -----------------------------------------------------------------------------
#       TABLE : TAGS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TAGS
 (
   TAG_ID DB_LONG(4) NOT NULL  ,
   TAG_INTITULE DB_TEXT, 255 NULL  
   , PRIMARY KEY (TAG_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : STATUT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS STATUT
 (
   STA_ID DB_LONG(4) NOT NULL  ,
   STA_INTITULE DB_TEXT, 255 NULL  
   , PRIMARY KEY (STA_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TYPE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPE
 (
   TYP_ID DB_LONG(4) NOT NULL  ,
   TYP_INTITULE DB_TEXT, 255 NULL  
   , PRIMARY KEY (TYP_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : RECETTE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RECETTE
 (
   REC_ID DB_LONG(4) NOT NULL  ,
   CAT_ID DB_LONG(4) NOT NULL  ,
   USER_ID DB_LONG(4) NOT NULL  ,
   REC_TITRE DB_TEXT, 255 NULL  ,
   REC_CONTENU DB_TEXT, 255 NULL  ,
   REC_RESUME DB_TEXT, 255 NULL  ,
   REC_CATEGORIE DB_TEXT, 255 NULL  ,
   REC_DATE_INS DB_DATE(8) NULL  ,
   REC_IMAGE DB_TEXT, 255 NULL  ,
   REC_DATE_CREA DB_DATE(8) NULL  ,
   REC_DATE_MODIF DB_DATE(8) NULL  ,
   REC_AUTEUR DB_TEXT, 255 NULL  
   , PRIMARY KEY (REC_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RECETTE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RECETTE_CATEGORIE
     ON RECETTE (CAT_ID ASC);

CREATE  INDEX I_FK_RECETTE_UTILISATEUR
     ON RECETTE (USER_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : UTILISATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS UTILISATEUR
 (
   USER_ID DB_LONG(4) NOT NULL  ,
   TYP_ID DB_LONG(4) NOT NULL  ,
   STA_ID DB_LONG(4) NOT NULL  ,
   USER_PSEUDO DB_TEXT, 255 NOT NULL  ,
   USER_EMAIL DB_TEXT, 255 NOT NULL  ,
   USER_PRENOM DB_TEXT, 255 NOT NULL  ,
   USER_NOM DB_TEXT, 255 NOT NULL  ,
   USER_DATE_INS DB_DATE(12) NOT NULL  ,
   USER_MDP DB_TEXT(1000) NOT NULL  
   , PRIMARY KEY (USER_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE UTILISATEUR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_UTILISATEUR_TYPE
     ON UTILISATEUR (TYP_ID ASC);

CREATE  INDEX I_FK_UTILISATEUR_STATUT
     ON UTILISATEUR (STA_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : CATEGORIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CATEGORIE
 (
   CAT_ID DB_LONG(4) NOT NULL  ,
   CAT_INTITULE DB_TEXT, 255 NULL  ,
   CAT_DESC DB_TEXT, 255 NULL  
   , PRIMARY KEY (CAT_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : INGREDIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INGREDIENT
 (
   ING_ID DB_LONG(4) NOT NULL  ,
   ING_INTITULE DB_TEXT, 255 NULL  ,
   ING_DESC DB_TEXT, 255 NULL  
   , PRIMARY KEY (ING_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMMENTAIRES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMENTAIRES
 (
   COM_ID DB_LONG(4) NOT NULL  ,
   USER_ID DB_LONG(4) NOT NULL  ,
   REC_ID DB_LONG(4) NOT NULL  ,
   COM_DESCRIPTION DB_TEXT, 255 NULL  
   , PRIMARY KEY (COM_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMMENTAIRES
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMMENTAIRES_UTILISATEUR
     ON COMMENTAIRES (USER_ID ASC);

CREATE  INDEX I_FK_COMMENTAIRES_RECETTE
     ON COMMENTAIRES (REC_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : MENTIONNER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MENTIONNER
 (
   REC_ID DB_LONG(4) NOT NULL  ,
   TAG_ID DB_LONG(4) NOT NULL  
   , PRIMARY KEY (REC_ID,TAG_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE MENTIONNER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_MENTIONNER_RECETTE
     ON MENTIONNER (REC_ID ASC);

CREATE  INDEX I_FK_MENTIONNER_TAGS
     ON MENTIONNER (TAG_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : CONTENIR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONTENIR
 (
   REC_ID DB_LONG(4) NOT NULL  ,
   ING_ID DB_LONG(4) NOT NULL  
   , PRIMARY KEY (REC_ID,ING_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CONTENIR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CONTENIR_RECETTE
     ON CONTENIR (REC_ID ASC);

CREATE  INDEX I_FK_CONTENIR_INGREDIENT
     ON CONTENIR (ING_ID ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE RECETTE 
  ADD FOREIGN KEY FK_RECETTE_CATEGORIE (CAT_ID)
      REFERENCES CATEGORIE (CAT_ID) ;


ALTER TABLE RECETTE 
  ADD FOREIGN KEY FK_RECETTE_UTILISATEUR (USER_ID)
      REFERENCES UTILISATEUR (USER_ID) ;


ALTER TABLE UTILISATEUR 
  ADD FOREIGN KEY FK_UTILISATEUR_TYPE (TYP_ID)
      REFERENCES TYPE (TYP_ID) ;


ALTER TABLE UTILISATEUR 
  ADD FOREIGN KEY FK_UTILISATEUR_STATUT (STA_ID)
      REFERENCES STATUT (STA_ID) ;


ALTER TABLE COMMENTAIRES 
  ADD FOREIGN KEY FK_COMMENTAIRES_UTILISATEUR (USER_ID)
      REFERENCES UTILISATEUR (USER_ID) ;


ALTER TABLE COMMENTAIRES 
  ADD FOREIGN KEY FK_COMMENTAIRES_RECETTE (REC_ID)
      REFERENCES RECETTE (REC_ID) ;


ALTER TABLE MENTIONNER 
  ADD FOREIGN KEY FK_MENTIONNER_RECETTE (REC_ID)
      REFERENCES RECETTE (REC_ID) ;


ALTER TABLE MENTIONNER 
  ADD FOREIGN KEY FK_MENTIONNER_TAGS (TAG_ID)
      REFERENCES TAGS (TAG_ID) ;


ALTER TABLE CONTENIR 
  ADD FOREIGN KEY FK_CONTENIR_RECETTE (REC_ID)
      REFERENCES RECETTE (REC_ID) ;


ALTER TABLE CONTENIR 
  ADD FOREIGN KEY FK_CONTENIR_INGREDIENT (ING_ID)
      REFERENCES INGREDIENT (ING_ID) ;

