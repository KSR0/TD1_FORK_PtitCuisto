DROP DATABASE IF EXISTS MLR2;

CREATE DATABASE IF NOT EXISTS MLR2;
USE MLR2;
# -----------------------------------------------------------------------------
#       TABLE : TAGS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TAGS
 (
   IDENTIFIANT BIGINT(4) NOT NULL  ,
   INTITULE CHAR(255) NULL  
   , PRIMARY KEY (IDENTIFIANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : STATUT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS STATUT
 (
   STA_ID BIGINT(4) NOT NULL  ,
   STA_INTITULE CHAR(255) NULL  
   , PRIMARY KEY (STA_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TYPE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPE
 (
   TYP_ID BIGINT(4) NOT NULL  ,
   TYP_INTITULE CHAR(255) NULL  
   , PRIMARY KEY (TYP_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : RECETTE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RECETTE
 (
   REC_ID BIGINT(4) NOT NULL  ,
   CAT_ID BIGINT(4) NOT NULL  ,
   USER_ID BIGINT(4) NOT NULL  ,
   REC_TITRE CHAR(255) NULL  ,
   REC_CONTENU CHAR(255) NULL  ,
   REC_RESUME CHAR(255) NULL  ,
   REC_CATEGORIE CHAR(255) NULL  ,
   REC_DATE_INS DATE NULL  ,
   REC_IMAGE CHAR(255) NULL  ,
   REC_DATE_CREA DATE NULL  ,
   REC_DATE_MODIF DATE NULL  ,
   REC_AUTEUR CHAR(255) NULL  
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
   USER_ID BIGINT(4) NOT NULL  ,
   TYP_ID BIGINT(4) NOT NULL  ,
   STA_ID BIGINT(4) NOT NULL  ,
   USER_PSEUDO CHAR(255) NULL  ,
   USER_EMAIL CHAR(255) NULL  ,
   USER_PRENOM CHAR(255) NULL  ,
   USER_NOM CHAR(255) NULL  ,
   USER_DATE_INS DATETIME NULL  
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
   CAT_ID BIGINT(4) NOT NULL  ,
   CAT_INTITULE CHAR(255) NULL  ,
   CAT_DESC CHAR(255) NULL  
   , PRIMARY KEY (CAT_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : INGREDIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INGREDIENT
 (
   ING_ID BIGINT(4) NOT NULL  ,
   ING_INTITULE CHAR(255) NULL  ,
   ING_DESC CHAR(255) NULL  
   , PRIMARY KEY (ING_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMMENTAIRES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMENTAIRES
 (
   IDENTIFIANT BIGINT(4) NOT NULL  ,
   REC_ID BIGINT(4) NOT NULL  ,
   DESCRIPTION CHAR(255) NULL  
   , PRIMARY KEY (IDENTIFIANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMMENTAIRES
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMMENTAIRES_RECETTE
     ON COMMENTAIRES (REC_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : MENTIONNER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MENTIONNER
 (
   REC_ID BIGINT(4) NOT NULL  ,
   IDENTIFIANT BIGINT(4) NOT NULL  
   , PRIMARY KEY (REC_ID,IDENTIFIANT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE MENTIONNER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_MENTIONNER_RECETTE
     ON MENTIONNER (REC_ID ASC);

CREATE  INDEX I_FK_MENTIONNER_TAGS
     ON MENTIONNER (IDENTIFIANT ASC);

# -----------------------------------------------------------------------------
#       TABLE : CONTENIR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONTENIR
 (
   REC_ID BIGINT(4) NOT NULL  ,
   ING_ID BIGINT(4) NOT NULL  
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
  ADD FOREIGN KEY FK_COMMENTAIRES_RECETTE (REC_ID)
      REFERENCES RECETTE (REC_ID) ;


ALTER TABLE MENTIONNER 
  ADD FOREIGN KEY FK_MENTIONNER_RECETTE (REC_ID)
      REFERENCES RECETTE (REC_ID) ;


ALTER TABLE MENTIONNER 
  ADD FOREIGN KEY FK_MENTIONNER_TAGS (IDENTIFIANT)
      REFERENCES TAGS (IDENTIFIANT) ;


ALTER TABLE CONTENIR 
  ADD FOREIGN KEY FK_CONTENIR_RECETTE (REC_ID)
      REFERENCES RECETTE (REC_ID) ;


ALTER TABLE CONTENIR 
  ADD FOREIGN KEY FK_CONTENIR_INGREDIENT (ING_ID)
      REFERENCES INGREDIENT (ING_ID) ;

