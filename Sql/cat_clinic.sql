-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 20 fév. 2019 à 19:39
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cat_clinic`
--

-- --------------------------------------------------------

--
-- Structure de la table `contenus`
--

DROP TABLE IF EXISTS `contenus`;
CREATE TABLE IF NOT EXISTS `contenus` (
  `ID_CONTENU` int(11) NOT NULL AUTO_INCREMENT,
  `TITRE` varchar(50) NOT NULL,
  `AUTEUR` varchar(50) DEFAULT NULL,
  `FICHIER` varchar(40) DEFAULT NULL,
  `TEXTE` text NOT NULL,
  `ID_ITEM` int(11) NOT NULL,
  PRIMARY KEY (`ID_CONTENU`),
  KEY `FRK` (`ID_ITEM`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contenus`
--

INSERT INTO `contenus` (`ID_CONTENU`, `TITRE`, `AUTEUR`, `FICHIER`, `TEXTE`, `ID_ITEM`) VALUES
(1, 'Les spécialités de la clinique', '', '', '<h2>Siuation géographique</h2><div>    <p>Adresse : route des chats noirs, 38270 Jarcieu</p>    <p>Tel : 04 21 23 06 66</p></div><div>    <iframe src=', 1),
(2, 'L\'équipe', '', '', '<h2>Siuation géographique</h2><div>    <p>Adresse : route des chats noirs, 38270 Jarcieu</p>    <p>Tel : 04 21 23 06 66</p></div><div>    <iframe src=', 1),
(3, 'Localisation', '', '', '<h2>Siuation géographique</h2><div>    <p>Adresse : route des chats noirs, 38270 Jarcieu</p>    <p>Tel : 04 21 23 06 66</p></div><div>    <iframe src=', 1),
(4, 'Horaires', '', '', '<h2>Siuation géographique</h2><div>    <p>Adresse : route des chats noirs, 38270 Jarcieu</p>    <p>Tel : 04 21 23 06 66</p></div><div>    <iframe src=', 1),
(5, 'Maladies et vaccination', '', '', '<div class=\"tabs-panel is-active\" id=\"panel1\">\r\n<h2>Maladies et vaccination</h2>\r\n<h3>Votre chat compte sur vous pour être protégé</h3>\r\n<p>L\'un des meilleurs moyens de permettre à votre chat de vivre en bonne santé pendant de nombreuses années est de le faire vacciner contre les maladies félines les plus répandues. Au cours des premières semaines de son existence votre chat a reçu, par le lait de sa mère, des anticorps qui l\'ont immunisé contre certaines maladies. Après cette période, c\'est à vous qu\'il revient de protéger votre compagnon, avec l\'aide et les conseils de votre vétérinaire.</p>\r\n                        <h3>Comment un vaccin fonctionne-t-il ? </h3>\r\n                        <p>Un vaccin contient une petite quantité de virus, de bactéries ou d\'autres organismes causant des maladies. Ceux-ci ont été soit atténués soit « tués ». Lorsque ces organismes sont administrés à votre chat, ils stimulent son système immunitaire qui produit des cellules et des protéines qui combattent la maladie, « les anticorps », et protègent votre animal contre certaines maladies.</p>\r\n                        <h3>Quand dois-je faire vacciner mon chat ?</h3>\r\n                        <p>En général, l\'immunité que reçoit un chaton à sa naissance commence à s\'estomper après neuf semaines. C\'est alors le moment, habituellement, de lui administrer ses premiers vaccins. Il doit recevoir un rappel de 3 à 4 semaines plus tard. Par la suite, votre chat devra se faire vacciner régulièrement toute sa vie. Bien sûr, ce ne sont que des lignes directrices. Votre vétérinaire sera en mesure de déterminer le programme de vaccination qui répondra parfaitement aux besoins de votre compagnon félin.</p>\r\n                </div>', 2),
(6, 'Les dangers domestiques', '', '', ' <div class=\"tabs-panel\" id=\"panel2\">\r\n                    <h2>Les dangers domestiques</h2>\r\n                    <p>Comment faire de votre maison un endroit sûr pour vos animaux domestiques</p>\r\n                    <p>Tout comme les parents rendent leur maison à l’épreuve de leurs enfants, les propriétaires d’animaux domestiques devraient faire de même pour leur animal domestique. Nos compagnons à quatre pattes sont comme les bébés et les bambins : curieux de nature, ils sont portés à explorer leur environnement avec leurs pattes et leurs griffes et à goûter à tout.</p>\r\n                    <h3>Dans la maison</h3>\r\n                    <p>Installez des moustiquaires dans les fenêtres pour éviter les chutes. Ne laissez pas les jeunes animaux sur un balcon, un perron ou une terrasse surélevés. Un grand nombre de plantes d’intérieur, comme le dieffenbachia, le philodendron en fer de lance, la plante araignée, sont toxiques quand elles sont ingérées. Enlevez-les ou placez-les hors d’atteinte dans des jardinières suspendues. Les chiots et les chatons adorent mâchouiller lorsqu’ils font leurs dents. Par conséquent, débranchez ou enlevez les cordons électriques ou couvrez-les.</p>\r\n                    <p>Ne laissez pas votre animal sans surveillance dans une pièce dans laquelle un feu de foyer est allumé ou une chaufferette fonctionne. Les sacs de plastique sont bien amusants, mais votre animal peut s’étouffer en jouant avec eux.</p>\r\n                    <p>Dites-vous bien que si votre animal domestique peut se mettre quelque chose dans la gueule, il est fort probable qu’il le fera. Ne laissez donc pas traîner de petits objets pointus et faciles à avaler.</p>\r\n                </div>', 2),
(7, 'Administration des médicaments', '', '', ' <div class=\"tabs-panel\" id=\"panel3\">\r\n                    <h2>Administration des médicaments</h2>\r\n                    <p>Tout comme vous, votre animal sera malade et il est probable que vous deviez lui administrer des médicaments prescrits par votre vétérinaire. L’emploi d’une bonne méthode facilitera la vie de tout le monde:</p>\r\n                    <div id=\"solides\">\r\n                        <h3>Les comprimés ou gélules</h3>\r\n                        <p>C\'est certainement le seul médicament qu\'on puisse lui administrer sans problème. Contrairement à ce qu\'on croit, votre animal est parfaitement capable d\'avaler des gros comprimés</p>\r\n                        <ul>\r\n                            <li>\r\n                                <h4>1ére étape :</h4>\r\n                                <p>Placez le comprimé entre vos doigts. • De l’autre main, tenez sa tête par derrière. Le menton doit passer à la verticale.</p>\r\n                            </li>\r\n                            <li>\r\n                                <h4>2ème étape :</h4>\r\n                                <p>Maintenant, ses yeux fixent le plafond, la lèvre inférieure baille spontanément. • Si votre animal n’ouvre pas la gueule, exercez une légère pression sur sa mâchoire inférieure à l’aide de votre majeur.</p>\r\n                            </li>\r\n                            <li>\r\n                                <h4>3ème étape :</h4>\r\n                                <p>Laissez votre majeur sur les petites incisives de votre animal afin que sa gueule reste ouverte. : Déposez le comprimé le plus loin possible dans la gueule. • Refermez la gueule.</p>\r\n                            </li>\r\n                            <li>\r\n                                <h4>4ème étape :</h4>\r\n                                <p>Masser sa gorge ou soufflez sur son nez pour l’inciter à déglutir.</p>\r\n                            </li>\r\n                        </ul>\r\n                    </div>\r\n                    <div id=\"liquides\">\r\n                        <h3>Les liquides</h3>\r\n                        <p>Agitez le flacon si cela est demandé.</p>\r\n                        <ul>\r\n                            <li>\r\n                                <h4>1ére étape :</h4>\r\n                                <p>Tout d’abord, remplissez une seringue du médicament.</p></li>\r\n                            <li>\r\n                                <h4>2ème étape :</h4>\r\n                                <p>Le médicament liquide doit être versé dans l\'espace entre la canine et les molaires. 3e étape : Tenez les mâchoires de votre animal fermées et renversez légèrement sa tête vers l’arrière.</p></li>\r\n                        </ul>\r\n                    </div>\r\n                    <div id=\"conseils\">\r\n                        <h4>Conseils pratiques</h4>\r\n                        <p>Lisez attentivement l\'étiquette.</p>\r\n                        <p>Demandez à votre vétérinaire à quel moment du repas le médicament peut être donné.</p>\r\n                        <p>Cachez le comprimé dans un morceau d\'aliment appètent (viande hachée, fromage)</p>\r\n                        <p>Demandez à un ami ou à un membre de la famille de vous aider. Lorsque la taille de l\'animal le permet, il est plus facile d\'administrer des médicaments si l\'animal est placé sur une table.</p>\r\n                        <p>Lorsque vous donnez un médicament, demeurez calme, car votre animal peut sentir votre nervosité, ce qui rendra votre tâche plus difficile.Vous devez toujours le féliciter et le récompenser avec une gâterie.</p>\r\n                        <p>Pour éviter de mettre vos doigts dans la gueule de votre compagnon, vous pouvez utiliser une seringue spéciale. Il s’agit d’un tube en plastique similaire à une seringue qui permet de déposer le comprimé ou la capsule dans la gueule de l’animal.</p>\r\n                    </div>\r\n                </div>', 2),
(8, 'Comportement de votre chat', '', '', '<div class=\"tabs-panel\" id=\"panel4\">\r\n<h2>Comportement de votre chat</h2>\r\n	<h4>Notions de base</h4>\r\n               <p>Le chat est devenu l’animal de compagnie le plus populaire en Europe.</p>\r\n                    <p>Bien qu’il soit très différent du chien, le chat est animal sociable et indépendant, demandant énormément d’affection !</p>\r\n                    <p>Quand vous adoptez un chaton ou un chat, vous devez décider s’il vivra seulement à l’intérieur ou s’il pourra aller dehors.</p>\r\n                    <p>Les deux situations comportent des avantages et des inconvénients.</p>\r\n                    <p>Les chats qui vont dehors sont plus exposés aux maladies et leur espérance de vie peut être beaucoup plus courte que celle des chats d’appartement, car ils peuvent se faire heurter par une voiture ou se faire attaquer par d’autres animaux.</p>\r\n                    <p>Par contre, si votre chat ne sort pas, vous devez le stimuler mentalement et physiquement, jouer avec lui et lui faire faire de l’exercice.</p>\r\n                    <p>Il devra également disposer d’un poteau à griffer et d’une litière propre.</p>\r\n\r\n                    <h4>Choisir son griffoire</h4>\r\n                    <p>Faire ses griffes est un geste naturel pour un chat; cette activité commence dès l’âge de 5 semaines. Cela permet à l’animal de laisser des phérormones qui servent à communiquer avec les autres animaux. Toutefois, ce geste tout à fait normal peut devenir problématique quand votre chat s’en prend à vos tapis et à vos meubles. Il faudra acheter un griffoir et le disposer à un endroit bien à lui pour faire ses griffes.</p>\r\n                    <p>Attention, les griffoirs que l’on trouve dans le commerce ne plaisent pas à tous les chats.</p>\r\n                    <p>Idéalement, le griffoir doit être plus grand que le chat debout sur ses pattes arrière et doit être placé bien en vue dans un endroit facile d’accès.</p>\r\n                    <p>Evitez de changer tout le temps de griffoir. En effet, plus le poteau aura été griffé et sera délabré, plus votre chat l’aimera et l’utilisera.</p>\r\n</div>', 2),
(11, 'DOCUMENT-11', 'Auteur-11', 'fichier-11.pdf', '', 0),
(12, 'DOCUMENT-12', 'Auteur-12', 'fichier-12.pdf', '', 0),
(13, 'DOCUMENT-13', 'Auteur-13', 'fichier-13.pdf', '', 0),
(14, 'DOCUMENT-14', 'Auteur-14', 'fichier-14.pdf', '', 0),
(15, 'DOCUMENT-15', 'Auteur-15', 'fichier-15.pdf', '', 0),
(16, 'DOCUMENT-16', 'Auteur-16', 'fichier-16.pdf', '', 0),
(17, 'DOCUMENT-17', 'Auteur-17', 'fichier-17.pdf', '', 0),
(18, 'DOCUMENT-18', 'Auteur-18', 'fichier-18.pdf', '', 0),
(20, 'DOCUMENT-20', 'Auteur-20', 'fichier-20.pdf', '', 0),
(66, 'nouvelle', NULL, NULL, 'fiche', 0),
(67, 'test', NULL, NULL, 'test', 0),
(68, 'mike', NULL, NULL, 'mika', 18),
(71, 'mike2mars', NULL, NULL, 'mail', 18),
(72, 'Contactez nous', NULL, NULL, 'Ici', 3),
(73, 'TITRE NEW', NULL, NULL, 'NEW', 21);

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `ID_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `ITEM` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_ITEM`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`ID_ITEM`, `ITEM`) VALUES
(1, 'La clinique'),
(2, 'Fiches Conseils'),
(3, 'Contact');

-- --------------------------------------------------------

--
-- Structure de la table `items_contenus`
--

DROP TABLE IF EXISTS `items_contenus`;
CREATE TABLE IF NOT EXISTS `items_contenus` (
  `ID_ITEM` int(11) NOT NULL,
  `ID_CONTENU` int(11) NOT NULL,
  PRIMARY KEY (`ID_ITEM`,`ID_CONTENU`),
  KEY `FK_ITEMS_CONTENU_2` (`ID_CONTENU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `items_contenus`
--

INSERT INTO `items_contenus` (`ID_ITEM`, `ID_CONTENU`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(5, 10),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(4, 17),
(4, 18),
(4, 20),
(2, 51),
(1, 56);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
