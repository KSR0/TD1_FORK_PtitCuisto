-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql.info.unicaen.fr:3306
-- Généré le : lun. 13 nov. 2023 à 22:29
-- Version du serveur :  10.5.11-MariaDB-1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bayon222_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `FORK_CATEGORIE`
--

CREATE TABLE `FORK_CATEGORIE` (
  `CAT_ID` decimal(4,0) NOT NULL,
  `CAT_INTITULE` varchar(255) DEFAULT NULL,
  `CAT_DESC` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FORK_CATEGORIE`
--

INSERT INTO `FORK_CATEGORIE` (`CAT_ID`, `CAT_INTITULE`, `CAT_DESC`) VALUES
('1', 'Entrée', 'La recette est une entrée.'),
('2', 'Plat', 'La recette est un plat.'),
('3', 'Dessert', 'La recette est un dessert.');

-- --------------------------------------------------------

--
-- Structure de la table `FORK_COMMENTAIRE`
--

CREATE TABLE `FORK_COMMENTAIRE` (
  `COM_ID` decimal(4,0) NOT NULL,
  `USER_ID` decimal(4,0) NOT NULL,
  `REC_ID` decimal(4,0) NOT NULL,
  `COM_DESCRIPTION` varchar(1000) DEFAULT NULL,
  `COM_DATE_CREA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FORK_COMMENTAIRE`
--

INSERT INTO `FORK_COMMENTAIRE` (`COM_ID`, `USER_ID`, `REC_ID`, `COM_DESCRIPTION`, `COM_DATE_CREA`) VALUES
('1', '1', '11', 'Cette mousse au chocolat est tout simplement divine ! Légère, aérée et d\'une texture veloutée. Un véritable plaisir pour les amateurs de chocolat', '2023-11-12 22:19:53'),
('2', '1', '11', 'C\'est comme déguster un nuage de chocolat. Léger, délicat, et pourtant tellement intense en saveur. Une expérience sensorielle que je recommande à tous les amateurs de chocolat.', '2023-11-13 12:38:35'),
('3', '1', '12', 'Même pour ceux qui ne sont pas des experts en cuisine, cette recette de crêpes est inratable. La pâte est facile à manipuler, et le résultat est toujours délicieux. Mes enfants en raffolent !', '2023-11-13 12:38:46'),
('4', '6', '12', 'Ces crêpes sont légères comme un souffle, avec une texture parfaitement fine. Un régal au petit-déjeuner ou en dessert. À refaire sans hésiter !', '2023-11-13 12:47:25'),
('5', '7', '10', 'Ces œufs mimosa sont un véritable régal ! L\'association de la douceur de l\'œuf et de la richesse de la mayonnaise crée une expérience culinaire élégante et pleine de saveurs.', '2023-11-13 22:19:57'),
('6', '7', '9', 'Ce gaspacho aux tomates est la définition même de la fraîcheur en un bol. Les tomates juteuses associées aux herbes aromatiques créent une expérience gustative légère et revigorante.', '2023-11-13 22:19:57');

-- --------------------------------------------------------

--
-- Structure de la table `FORK_CONTENIR`
--

CREATE TABLE `FORK_CONTENIR` (
  `REC_ID` decimal(4,0) NOT NULL,
  `ING_ID` decimal(4,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `FORK_INGREDIENT`
--

CREATE TABLE `FORK_INGREDIENT` (
  `ING_ID` decimal(4,0) NOT NULL,
  `ING_INTITULE` varchar(255) DEFAULT NULL,
  `ING_DESC` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FORK_INGREDIENT`
--

INSERT INTO `FORK_INGREDIENT` (`ING_ID`, `ING_INTITULE`, `ING_DESC`) VALUES
('0', 'Sucre', 'Substance de saveur douce extraite principalement de la canne à sucre ou de la betterave sucrière'),
('1', 'Beurre', 'Produit laitier1 extrait, par barattage, de la crème issue du lait2 généralement de vache'),
('2', 'Lait', 'Liquide biologique comestible généralement de couleur blanchâtre produit par les glandes mammaires des mammifères femelles'),
('3', 'Carotte', 'Plante bisannuelle de la famille des Apiacées, largement cultivée pour sa racine pivotante charnue, comestible, de couleur généralement orangée, consommée comme légume');

-- --------------------------------------------------------

--
-- Structure de la table `FORK_MENTIONNER`
--

CREATE TABLE `FORK_MENTIONNER` (
  `REC_ID` decimal(4,0) NOT NULL,
  `TAG_ID` decimal(4,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FORK_MENTIONNER`
--

INSERT INTO `FORK_MENTIONNER` (`REC_ID`, `TAG_ID`) VALUES
('1', '3'),
('1', '5'),
('2', '1'),
('2', '2'),
('2', '3'),
('2', '6'),
('4', '4'),
('4', '6'),
('4', '7'),
('5', '1'),
('5', '2'),
('5', '3'),
('6', '3'),
('6', '6'),
('7', '4'),
('8', '4'),
('9', '7'),
('10', '6'),
('11', '1'),
('11', '2'),
('11', '3'),
('11', '6'),
('12', '3'),
('12', '9'),
('13', '11');

-- --------------------------------------------------------

--
-- Structure de la table `FORK_RECETTE`
--

CREATE TABLE `FORK_RECETTE` (
  `REC_ID` decimal(4,0) NOT NULL,
  `CAT_ID` decimal(4,0) NOT NULL,
  `USER_ID` decimal(4,0) NOT NULL,
  `REC_TITRE` varchar(255) DEFAULT NULL,
  `REC_CONTENU` varchar(1000) DEFAULT NULL,
  `REC_RESUME` varchar(3000) DEFAULT NULL,
  `REC_IMAGE` varchar(1000) DEFAULT NULL,
  `REC_DATE_CREA` datetime DEFAULT NULL,
  `REC_DATE_MODIF` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FORK_RECETTE`
--

INSERT INTO `FORK_RECETTE` (`REC_ID`, `CAT_ID`, `USER_ID`, `REC_TITRE`, `REC_CONTENU`, `REC_RESUME`, `REC_IMAGE`, `REC_DATE_CREA`, `REC_DATE_MODIF`) VALUES
('1', '3', '1', 'Tarte aux fraises', 'Ingrédients pour une tarte aux fraises traditionnelle pour 8 personnes : Pour la pâte sucrée : 125 g de beurre pommade 120 g de sucre glace Le zeste d\'un citron vert (facultatif) 1 oeuf 250 g de farine T55 30 g de poudre d\'amande 1 pincée de sel (fleur de sel c\'est encore mieux) Pour la crème pâtissière : 30 cl de lait entier 1 gousse de vanille (ou 1/2, ça ira aussi) 3 jaunes d’œufs 50 g de sucre en poudre 30 g de maïzena 10 g de farine Pour la garniture : 400 g de fraises', '1 : Préchauffer le four à 180°C (air chaud/chaleur tournante: 160°C). 2 : Cuisson à blanc: foncer la plaque chemisée de papier sulfurisé. Découper les bords excédentaires. Piquer généreusement la pâte à la fourchette. Placer un second papier sulfurisé sur la pâte, y répartir les légumes secs. Cuire 10 min au niveau de la deuxième rainure depuis le bas. Ôter les légumes secs et le papier sulfurisé, cuire encore 10 min. Laisser refroidir la pâte dans la plaque. 3 : Crème pâtissière: dans un saladier, battre en mousse les jaunes d\'oeufs et le sucre à l\'aide d\'un batteur jusqu\'à ce que le mélange blanchisse. Mélanger la fécule de maïs à ½ dl de lait, ajouter, mélanger le tout. 4 : Dans une casserole, porter à ébullition le reste du lait, les graines et la gousse de vanille. Retirer la gousse. 5 : Verser le lait vanillé dans le mélange aux oeufs en remuant constamment au fouet. Reverser le tout dans la casserole. 6 : Porter à ébullition sans cesser de fouetter. Dès que la crème épaissit, retirer la casserole du feu et continuer de remuer 30 sec pour éviter qu\'elle attache. 7 : Verser dans un bol. Poser du film alimentaire directement sur la crème pour éviter qu\'une peau se forme. Laisser refroidir. 8 : Garniture: répartir la crème sur le fond de tarte refroidi, égaliser. Recouvrir de fraises. Badigeonner de nappage de fraise ou de gelée de fraise ou de raisinet.', 'https://images.pexels.com/photos/13999771/pexels-photo-13999771.jpeg', '2023-11-08 11:01:16', '2023-11-08 11:01:16'),
('2', '3', '1', 'Brownie facile', 'Liste ingrédients :  Chocolat noir 200 g Œuf(s) 3 Sucre en poudre 200 g Farine 100 g Beurre 150 g ', 'Le goûter préféré des enfants (et de leurs parents) : le brownie au chocolat ! Tout droit venu des États-Unis, ce gâteau au chocolat cuit au four, aussi exquis tiède que froid, rivalise de fondant. En voici une recette facile dénuée de tout ingrédient superflu : du bon chocolat noir, des œufs, du sucre, de la farine et du beurre, rien d\'autre. Un délice cacaoté prêt à enfourner en 15 min chrono… qui se dévore encore plus vite !', 'https://assets.afcdn.com/recipe/20161114/26634_w1000h667c1cx2736cy1824.webp', '2023-11-08 11:05:28', '2023-11-08 11:05:28'),
('4', '1', '1', 'Soupe de légumes', 'Ingrédients pour une soupe de légumes : 1 courgette, 2 poireaux, 2 navets, 2 pommes de terre, 2 carottes, 30 g de beurre, sel et poivre.', 'On aime tous le potage. La soupe de poireaux et de pommes de terre, c\'est bon, mais avec davantage de légumes, c\'est encore meilleur ! Alors convoquez tout un assortiment de légumes à pot-au-feu dans votre marmite. Laissez-les mijoter tranquillement après les avoir parfumés au vin blanc. Puis mixez-les à la mode de chez vous, pour une soupe plutôt épaisse ou plutôt veloutée, pour concocter votre version de la soupe de légumes maison traditionnelle.', 'https://images.pexels.com/photos/209540/pexels-photo-209540.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', '2023-11-08 11:20:02', '2023-11-08 11:20:02'),
('5', '3', '1', 'Tiramisu', 'Ingrédients pour un tiramisu : 250 g de mascarpone, 50 g de sucre, 25 cl de café très très fort, 20 à 30 biscuits à la cuillère, 5 cuillerées à soupe d\'Amaretto, 4 œufs extra frais, Cacao amer en poudre.', 'Le tiramisu simple est un dessert italien très populaire que chacun revisite à sa manière. Son nom, \'tirami sù,\' signifie littéralement \'tire-moi en haut\'. Cette expression renvoie au réconfort moral et physique. Et pour cause ! Quoi de plus réconfortant que ce délice préparé à base d\'œufs, de sucre, de café froid, de mascarpone et parfois d\'un soupçon d\'alcool pour imbiber des biscuits moelleux, le tout saupoudré de cacao en poudre ? L\'origine exacte du tiramisu demeure incertaine. Il aurait été créé en Toscane à la fin du XVIe siècle pour satisfaire le duc de Toscane. Il aurait tellement apprécié ce dessert qu\'il l\'aurait popularisé en Italie. Une autre version prétend que les Vénitiennes de la Renaissance l\'offraient à leurs amants. Enfin, une dernière légende plus terre à terre suggère que le tiramisu serait né pour éviter de gaspiller le café froid et les restes de gâteaux.', 'https://images.pexels.com/photos/4078174/pexels-photo-4078174.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', '2023-11-08 11:20:57', '2023-11-08 11:20:57'),
('6', '2', '1', 'Quiche loraine', 'Ingrédients pour une quiche loraine pour 8 personnes :\r\n2 tranches de jambon blanc,\r\n200 g de lardons,\r\n4 oeufs,\r\n3/4 d\'un pot de crème fraiche,\r\n1/2 litre de lait,\r\nune pâte brisée,', 'Comme son nom l\'indique, la quiche lorraine est une tarte salée typique de la cuisine lorraine, devenue au fil du temps un grand classique de la cuisine française. Elle se compose d\'une base de pâte brisée ou feuilletée, et d\'une garniture à base d\'oeufs, crème et de lardons. Ces derniers ont été introduits dans la quiche lorraine au XIXe siècle, et, à partir du XXe siècle on a introduit aussi du fromage râpé : emmenthal ou gruyère, selon les gouts. Cette dernière version de la quiche lorraine est devenue la plus courant. Dans cette recette, on vous propose une version simple et rapide de quiche lorraine, à déguster comme entrée ou comme plat, accompagnée d\'une belle salade verte. C\'est un régal !', 'https://platetrecette.com/wp-content/uploads/2018/01/quiche-lorraine-l%C3%A9g%C3%A8re.jpg', '2023-11-08 11:37:13', '2023-11-08 11:37:13'),
('7', '2', '1', 'Pizza aux fromages', 'Ingrédients d\'une pizza aux fromages pour 6 personnes :\r\n1 pâte à pizza,\r\n140 g de parmesan,\r\n55 g de fontine (ou du gruyère),\r\n55 g de mozzarella,\r\n30 g de gorgonzola.', 'Ah l\'Italie et sa gastronomie ! Si vous aussi vous aimez la cuisine méditerranéenne et plus particulièrement les pizzas, pourquoi ne pas réaliser vous-même votre pizza en vous inspirant de cette recette de pizza aux quatre fromages ? Comme vous allez le constater, cette préparation est très facile à réaliser et ne vous prendra que quelques minutes de votre temps pour un résultat digne des meilleurs restaurants italiens.', 'https://images.unsplash.com/photo-1513104890138-7c749659a591?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '2023-11-08 11:37:18', '2023-11-08 11:37:18'),
('8', '2', '1', 'Lasagnes', 'Ingrédients des lasagnes pour 4 à 6 personnes :\r\n350 g de boeuf haché,\r\n50 g de beurre,\r\n50 g de farine,\r\n60 cl de lait,\r\n1 boîte de tomates pelées et concassées (400 g),\r\n2 feuilles de laurier,\r\n1 branche de thym,\r\n1 oignon,\r\nGruyère râpé,\r\nLasagnes (6 à 9 feuilles),\r\nSel, poivre.', 'Vous rêvez de mordre à pleines dents dans la dolce vita en réalisant illico presto un classique de la gastronomie italienne ? Fondez pour cette recette de lasagne maison, dont les feuilles de pâte laissent entrevoir une irrésistible farce tomatée au bœuf haché, discrètement adoucie par une onctueuse béchamel. Gentiment gratinée au four et accompagnée d’une belle salade verte (et de quelques bons amis), elle fait briller le soleil au dîner !', 'https://www.galbani.fr/wp-content/uploads/2017/07/shutterstock_142426168.jpg', '2023-11-08 11:45:36', '2023-11-08 11:45:36'),
('9', '1', '2', 'Gaspacho aux tomates', 'Ingrédients d\'un gaspacho aux tomates pour 4 personnes :\r\n700 g de tomates grappes,\r\n½ concombre,\r\n2 tranches de pain de mie (facultatif),\r\n1 gousse d\'ail, dégermée et écrasée,\r\n3 cuillerées à soupe d\'huile d\'olive,\r\n3 cuillerées à soupe de vinaigre de xérès,\r\nsel, poivre,\r\n\r\nGarniture :\r\n1/2 concombre,\r\n2 tomates.', 'Qui a dit qu\'on ne pouvait pas souper en été ? Cette version simplifiée (mais savoureuse) du célèbre gaspacho aux tomates andalou viendra mettre de la fraicheur, des vitamines et de la couleur à votre table. Pensez à la préparer un peu en avance pour pouvoir la déguster bien froide, et si vous voulez lui donner davantage de caractère, n\'hésitez pas à faire appel au piment !', 'https://backend.panzani.fr/app/uploads/2020/03/gaspacho-espagnol-au-tomacouli-min-scaled.jpg', '2023-11-08 11:57:01', '2023-11-08 11:57:01'),
('10', '1', '2', 'Oeufs mimosa', 'Ingrédients des oeufs mimosa pour 4 personnes :\r\n4 œufs,\r\n2 à 3 cuillères à soupe de mayonnaise,\r\n1 cuillère à café de moutarde,\r\nSel.', 'L’œuf mimosa est une entrée traditionnelle très facile à préparer. Elle est constituée d’un œuf dur dont on prélève le jaune, que l’on mélange avec de la mayonnaise, des aromates et que l’on replace dans le blanc. Le jaune d’œuf émietté ressemble alors à la fleur de mimosa, d’où cette entrée tient son nom.', 'https://assets.afcdn.com/recipe/20130924/17648_w1024h768c1cx1328cy1928.jpg', '2023-11-08 12:07:10', '2023-11-08 12:07:10'),
('11', '3', '2', 'Mousse au chocolat', 'Ingrédients d\'une mousse au chocolat pour 4 à 5 personnes :\r\n150 g de chocolat noir (1/3 lbs),\r\n40 g de beurre (1/5 tasse),\r\n4 oeufs,\r\n60 g de sucre glace (un peu plus d\'1/3 tasse de sucre à glacer).', 'Gourmandise assurée !', 'https://turbigo-gourmandises.fr/wp-content/uploads/2011/05/mousse-au-chocolat-maison.jpg', '2023-11-08 12:12:27', '2023-11-08 12:12:27'),
('12', '3', '1', 'Crêpes maison', 'Utilisez un appareil à crêpes pour faire réchauffer la pâte', 'Cette recette de crêpes maison va vous rendre addict !', 'https://media.istockphoto.com/id/505469106/fr/photo/cr%C3%AApes-sur-un-fond-en-bois.jpg?s=612x612&w=0&k=20&c=zINKCTlwlETbWF8g2SmIS2apzqmIfYM-8-EvHV18p_M=', '2023-11-12 19:00:06', '2023-11-12 19:00:06'),
('13', '2', '4', 'za', 'z', 'a', 'te', '2023-11-13 19:48:38', '2023-11-13 19:48:38');

-- --------------------------------------------------------

--
-- Structure de la table `FORK_STATUT`
--

CREATE TABLE `FORK_STATUT` (
  `STA_ID` decimal(4,0) NOT NULL,
  `STA_INTITULE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FORK_STATUT`
--

INSERT INTO `FORK_STATUT` (`STA_ID`, `STA_INTITULE`) VALUES
('1', 'Actif'),
('2', 'Suspendu');

-- --------------------------------------------------------

--
-- Structure de la table `FORK_TAGS`
--

CREATE TABLE `FORK_TAGS` (
  `TAG_ID` decimal(4,0) NOT NULL,
  `TAG_INTITULE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FORK_TAGS`
--

INSERT INTO `FORK_TAGS` (`TAG_ID`, `TAG_INTITULE`) VALUES
('1', 'Chocolat'),
('2', 'Soiree'),
('3', 'Anniversaire'),
('4', 'Repas chaud'),
('5', 'Fruité'),
('6', 'Très facile'),
('7', 'Équilibré'),
('9', 'Délicieux'),
('10', 'v'),
('11', 'te');

-- --------------------------------------------------------

--
-- Structure de la table `FORK_TYPE`
--

CREATE TABLE `FORK_TYPE` (
  `TYP_ID` decimal(4,0) NOT NULL,
  `TYP_INTITULE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FORK_TYPE`
--

INSERT INTO `FORK_TYPE` (`TYP_ID`, `TYP_INTITULE`) VALUES
('1', 'administrateur'),
('2', 'editeur'),
('3', 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `FORK_UTILISATEUR`
--

CREATE TABLE `FORK_UTILISATEUR` (
  `USER_ID` decimal(4,0) NOT NULL,
  `TYP_ID` decimal(4,0) NOT NULL,
  `STA_ID` decimal(4,0) NOT NULL,
  `USER_PSEUDO` varchar(255) NOT NULL,
  `USER_EMAIL` varchar(255) NOT NULL,
  `USER_PRENOM` varchar(255) NOT NULL,
  `USER_NOM` varchar(255) NOT NULL,
  `USER_DATE_INS` datetime NOT NULL,
  `USER_DATE_MODIF` datetime NOT NULL,
  `USER_MDP` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `FORK_UTILISATEUR`
--

INSERT INTO `FORK_UTILISATEUR` (`USER_ID`, `TYP_ID`, `STA_ID`, `USER_PSEUDO`, `USER_EMAIL`, `USER_PRENOM`, `USER_NOM`, `USER_DATE_INS`, `USER_DATE_MODIF`, `USER_MDP`) VALUES
('1', '1', '1', 'Admin', 'admin.fork@gmail.com', 'Admin', 'FORK', '2023-10-17 00:00:00', '0000-00-00 00:00:00', 'd9ebae2e5d1f0512c4b1744cd5649a958c30f431f71bc11e2d5899764420d6228af9f1772b384af72d42abbf674f1bf88679a760d59992cdc023f49de545f252'),
('2', '1', '1', 'DesTroy', 'axel.bayon@etu.unicaen.fr', 'Axel', 'BAYON', '2023-11-08 11:55:20', '2023-11-08 11:55:20', 'miamiam'),
('4', '2', '1', 'test1', 'axelb@test.test', 'b', 'axel', '2023-11-12 15:36:50', '2023-11-12 15:36:50', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff'),
('5', '2', '1', 'Editor', 'editor.cooking@gmail.com', 'Editor', 'COOKING', '2023-11-12 19:15:20', '2023-11-12 19:15:20', '49a37bae6ca976685a79f1dd7c9788f4345d6489ebb827ab46ecd38cd5d1dc336bdea035de5cd6287f73130da6d672a8569e4be75d3339142c92241e30d2b9c5'),
('6', '2', '1', 'scar', 'scar@mail.com', 'ae', 'sc', '2023-11-12 20:09:32', '2023-11-12 20:09:32', '0fe7ec250d338d92004660e4b3bb7b6d76cb8e5f2fdf97f67e9a1e39624c55301bea0522922636bcfc59818d9b58876b47203143be1add70a90f0e0e0e075352'),
('7', '2', '1', 'Nico', 'nicolas.peyregne@etu.unicaen.fr', 'Nicolas', 'PEYREGNE', '2023-11-12 20:13:03', '2023-11-12 20:13:03', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `FORK_CATEGORIE`
--
ALTER TABLE `FORK_CATEGORIE`
  ADD PRIMARY KEY (`CAT_ID`);

--
-- Index pour la table `FORK_COMMENTAIRE`
--
ALTER TABLE `FORK_COMMENTAIRE`
  ADD PRIMARY KEY (`COM_ID`),
  ADD KEY `I_FK_COMMENTAIRES_UTILISATEUR` (`USER_ID`),
  ADD KEY `I_FK_COMMENTAIRES_RECETTE` (`REC_ID`);

--
-- Index pour la table `FORK_CONTENIR`
--
ALTER TABLE `FORK_CONTENIR`
  ADD PRIMARY KEY (`REC_ID`,`ING_ID`),
  ADD KEY `I_FK_CONTENIR_RECETTE` (`REC_ID`),
  ADD KEY `I_FK_CONTENIR_INGREDIENT` (`ING_ID`);

--
-- Index pour la table `FORK_INGREDIENT`
--
ALTER TABLE `FORK_INGREDIENT`
  ADD PRIMARY KEY (`ING_ID`);

--
-- Index pour la table `FORK_MENTIONNER`
--
ALTER TABLE `FORK_MENTIONNER`
  ADD PRIMARY KEY (`REC_ID`,`TAG_ID`),
  ADD KEY `I_FK_MENTIONNER_RECETTE` (`REC_ID`),
  ADD KEY `I_FK_MENTIONNER_TAGS` (`TAG_ID`);

--
-- Index pour la table `FORK_RECETTE`
--
ALTER TABLE `FORK_RECETTE`
  ADD PRIMARY KEY (`REC_ID`),
  ADD KEY `I_FK_RECETTE_CATEGORIE` (`CAT_ID`),
  ADD KEY `I_FK_RECETTE_UTILISATEUR` (`USER_ID`);

--
-- Index pour la table `FORK_STATUT`
--
ALTER TABLE `FORK_STATUT`
  ADD PRIMARY KEY (`STA_ID`);

--
-- Index pour la table `FORK_TAGS`
--
ALTER TABLE `FORK_TAGS`
  ADD PRIMARY KEY (`TAG_ID`);

--
-- Index pour la table `FORK_TYPE`
--
ALTER TABLE `FORK_TYPE`
  ADD PRIMARY KEY (`TYP_ID`);

--
-- Index pour la table `FORK_UTILISATEUR`
--
ALTER TABLE `FORK_UTILISATEUR`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `I_FK_UTILISATEUR_TYPE` (`TYP_ID`),
  ADD KEY `I_FK_UTILISATEUR_STATUT` (`STA_ID`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `FORK_COMMENTAIRE`
--
ALTER TABLE `FORK_COMMENTAIRE`
  ADD CONSTRAINT `FK_COMMENTAIRES_RECETTE` FOREIGN KEY (`REC_ID`) REFERENCES `FORK_RECETTE` (`REC_ID`),
  ADD CONSTRAINT `FK_COMMENTAIRES_UTILISATEUR` FOREIGN KEY (`USER_ID`) REFERENCES `FORK_UTILISATEUR` (`USER_ID`);

--
-- Contraintes pour la table `FORK_CONTENIR`
--
ALTER TABLE `FORK_CONTENIR`
  ADD CONSTRAINT `FK_CONTENIR_INGREDIENT` FOREIGN KEY (`ING_ID`) REFERENCES `FORK_INGREDIENT` (`ING_ID`),
  ADD CONSTRAINT `FK_CONTENIR_RECETTE` FOREIGN KEY (`REC_ID`) REFERENCES `FORK_RECETTE` (`REC_ID`);

--
-- Contraintes pour la table `FORK_MENTIONNER`
--
ALTER TABLE `FORK_MENTIONNER`
  ADD CONSTRAINT `FK_MENTIONNER_RECETTE` FOREIGN KEY (`REC_ID`) REFERENCES `FORK_RECETTE` (`REC_ID`),
  ADD CONSTRAINT `FK_MENTIONNER_TAGS` FOREIGN KEY (`TAG_ID`) REFERENCES `FORK_TAGS` (`TAG_ID`);

--
-- Contraintes pour la table `FORK_RECETTE`
--
ALTER TABLE `FORK_RECETTE`
  ADD CONSTRAINT `FK_RECETTE_CATEGORIE` FOREIGN KEY (`CAT_ID`) REFERENCES `FORK_CATEGORIE` (`CAT_ID`),
  ADD CONSTRAINT `FK_RECETTE_UTILISATEUR` FOREIGN KEY (`USER_ID`) REFERENCES `FORK_UTILISATEUR` (`USER_ID`);

--
-- Contraintes pour la table `FORK_UTILISATEUR`
--
ALTER TABLE `FORK_UTILISATEUR`
  ADD CONSTRAINT `FK_UTILISATEUR_STATUT` FOREIGN KEY (`STA_ID`) REFERENCES `FORK_STATUT` (`STA_ID`),
  ADD CONSTRAINT `FK_UTILISATEUR_TYPE` FOREIGN KEY (`TYP_ID`) REFERENCES `FORK_TYPE` (`TYP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
