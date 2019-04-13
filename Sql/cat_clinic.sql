-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 13 avr. 2019 à 10:52
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
  `PARAGRAPHE` text NOT NULL,
  PRIMARY KEY (`ID_CONTENU`),
  KEY `FRK` (`ID_ITEM`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contenus`
--

INSERT INTO `contenus` (`ID_CONTENU`, `TITRE`, `AUTEUR`, `FICHIER`, `TEXTE`, `ID_ITEM`, `PARAGRAPHE`) VALUES
(1, 'Les spécialités de la clinique', '', '', '<ul>\r\n    <li>Radiographie</li>\r\n    <li>Echographie (Abdominale et échocardiographie)</li>\r\n    <li>Analyses sanguines : Biochimie et hématologie</li>\r\n    <li>Laboratoire et cytologie</li>\r\n    <li>Dentisterie</li>\r\n    <li>Chirurgie</li>\r\n    <li>Hospitalisation</li>\r\n    <li>Service de garde 24h/24 7j/7</li>\r\n</ul>', 1, ''),
(2, 'L\'équipe', '', '', '<h3>Les praticiens</h3>\r\n<div>\r\n    <p class=\"underline\">Docteurs:</p>\r\n    <ul>\r\n        <li>Remain André</li>\r\n        <li>Burlotte Sylvie</li>\r\n    </ul>\r\n</div>\r\n<div>\r\n    <p class=\"underline\">Auxiliaire Spécialisé Vétérinaire :</p>\r\n    <ul>\r\n        <li>Abeauvaux Jérôme</li>\r\n    </ul>\r\n</div>', 1, ''),
(3, 'Adresse', '', '', '<div>\r\n    <p>Adresse : route des chats noirs, 38270 Jarcieu</p>\r\n    <p>Tel : 04 21 23 06 66</p>\r\n</div>\r\n<div>\r\n    <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2804.5288342981894!2d4.946674015553215!3d45.338136079099684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f53ab5fdf83913%3A0x4480d6093bfb5d6a!2sRoute+des+Chats+Noirs%2C+38270+Jarcieu!5e0!3m2!1sfr!2sfr!4v1547061705131\" width=\"600\" height=\"450\" style=\"border:0\" allowfullscreen></iframe>\r\n</div>\r\n', 1, ''),
(4, 'Horaires', '', '', '<table>\r\n    <thead>\r\n        <tr>\r\n           <th colspan=\"2\">Horaires d\'ouverture</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td>Lundi à Vendredi</td>\r\n            <td>08h30 - 19h30</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Samedi</td>\r\n            <td>08h30 - 18h00</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Dimanche</td>\r\n            <td>10h00 - 12h00</td>\r\n        </tr>\r\n    </tbody>\r\n    <tfoot>\r\n        <tr>\r\n            <th colspan=\"2\">Urgences</th>\r\n        </tr>\r\n        <tr>\r\n            <td colspan=\"2\">24h/24 et 7j/7 après appel téléphonique</td>\r\n        </tr>\r\n    </tfoot>\r\n</table>', 1, ''),
(5, 'Maladies et vaccination', '', '', '<h3>Votre chat compte sur vous pour être protégé</h3>\r\n<p>L\'un des meilleurs moyens de permettre à votre chat de vivre en bonne santé pendant de nombreuses années est de le faire vacciner contre les maladies félines les plus répandues. Au cours des premières semaines de son existence votre chat a reçu, par le lait de sa mère, des anticorps qui l\'ont immunisé contre certaines maladies. Après cette période, c\'est à vous qu\'il revient de protéger votre compagnon, avec l\'aide et les conseils de votre vétérinaire.</p>\r\n<h3>Comment un vaccin fonctionne-t-il ? </h3>\r\n<p>Un vaccin contient une petite quantité de virus, de bactéries ou d\'autres organismes causant des maladies. Ceux-ci ont été soit atténués soit « tués ». Lorsque ces organismes sont administrés à votre chat, ils stimulent son système immunitaire qui produit des cellules et des protéines qui combattent la maladie, « les anticorps », et protègent votre animal contre certaines maladies.</p>\r\n<h3>Quand dois-je faire vacciner mon chat ?</h3>\r\n<p>En général, l\'immunité que reçoit un chaton à sa naissance commence à s\'estomper après neuf semaines. C\'est alors le moment, habituellement, de lui administrer ses premiers vaccins. Il doit recevoir un rappel de 3 à 4 semaines plus tard. Par la suite, votre chat devra se faire vacciner régulièrement toute sa vie. Bien sûr, ce ne sont que des lignes directrices. Votre vétérinaire sera en mesure de déterminer le programme de vaccination qui répondra parfaitement aux besoins de votre compagnon félin.</p>\r\n', 2, ''),
(6, 'Les dangers domestiques', '', '', '<p>Comment faire de votre maison un endroit sûr pour vos animaux domestiques</p>\r\n<p>Tout comme les parents rendent leur maison à l’épreuve de leurs enfants, les propriétaires d’animaux domestiques devraient faire de même pour leur animal domestique. Nos compagnons à quatre pattes sont comme les bébés et les bambins : curieux de nature, ils sont portés à explorer leur environnement avec leurs pattes et leurs griffes et à goûter à tout.</p>\r\n<h3>Dans la maison</h3>\r\n<p>Installez des moustiquaires dans les fenêtres pour éviter les chutes. Ne laissez pas les jeunes animaux sur un balcon, un perron ou une terrasse surélevés. Un grand nombre de plantes d’intérieur, comme le dieffenbachia, le philodendron en fer de lance, la plante araignée, sont toxiques quand elles sont ingérées. Enlevez-les ou placez-les hors d’atteinte dans des jardinières suspendues. Les chiots et les chatons adorent mâchouiller lorsqu’ils font leurs dents. Par conséquent, débranchez ou enlevez les cordons électriques ou couvrez-les.</p>\r\n<p>Ne laissez pas votre animal sans surveillance dans une pièce dans laquelle un feu de foyer est allumé ou une chaufferette fonctionne. Les sacs de plastique sont bien amusants, mais votre animal peut s’étouffer en jouant avec eux.</p>\r\n<p>Dites-vous bien que si votre animal domestique peut se mettre quelque chose dans la gueule, il est fort probable qu’il le fera. Ne laissez donc pas traîner de petits objets pointus et faciles à avaler.</p>\r\n', 2, ''),
(7, 'Administration des médicaments', '', '', 'p>Tout comme vous, votre animal sera malade et il est probable que vous deviez lui administrer des médicaments prescrits par votre vétérinaire. L’emploi d’une bonne méthode facilitera la vie de tout le monde:</p>\r\n<div id=\"solides\">\r\n    <h3>Les comprimés ou gélules</h3>\r\n    <p>C\'est certainement le seul médicament qu\'on puisse lui administrer sans problème. Contrairement à ce qu\'on croit, votre animal est parfaitement capable d\'avaler des gros comprimés</p>\r\n    <ul>\r\n        <li>\r\n            <p>1ére étape :</p>\r\n            <p>Placez le comprimé entre vos doigts. • De l’autre main, tenez sa tête par derrière. Le menton doit passer à la verticale.</p>\r\n        </li>\r\n        <li>\r\n            <p>2ème étape :</p>\r\n            <p>Maintenant, ses yeux fixent le plafond, la lèvre inférieure baille spontanément. • Si votre animal n’ouvre pas la gueule, exercez une légère pression sur sa mâchoire inférieure à l’aide de votre majeur.</p>\r\n        </li>\r\n        <li>\r\n            <p>3ème étape :</p>\r\n            <p>Laissez votre majeur sur les petites incisives de votre animal afin que sa gueule reste ouverte. : Déposez le comprimé le plus loin possible dans la gueule. • Refermez la gueule.</p>\r\n        </li>\r\n        <li>\r\n            <p>4ème étape :</p>\r\n            <p>Masser sa gorge ou soufflez sur son nez pour l’inciter à déglutir.</p>\r\n        </li>\r\n    </ul>\r\n</div>\r\n<div id=\"liquides\">\r\n    <h3>Les liquides</h3>\r\n    <p>Agitez le flacon si cela est demandé.</p>\r\n    <ul>\r\n        <li>\r\n            <p>1ére étape :</p>\r\n            <p>Tout d’abord, remplissez une seringue du médicament.</p></li>\r\n        <li>\r\n            <p>2ème étape :</p>\r\n            <p>Le médicament liquide doit être versé dans l\'espace entre la canine et les molaires. 3e étape : Tenez les mâchoires de votre animal fermées et renversez légèrement sa tête vers l’arrière.</p></li>\r\n    </ul>\r\n</div>\r\n<div id=\"conseils\">\r\n    <h4>Conseils pratiques</h4>\r\n    <p>Lisez attentivement l\'étiquette.</p>\r\n    <p>Demandez à votre vétérinaire à quel moment du repas le médicament peut être donné.</p>\r\n    <p>Cachez le comprimé dans un morceau d\'aliment appètent (viande hachée, fromage)</p>\r\n    <p>Demandez à un ami ou à un membre de la famille de vous aider. Lorsque la taille de l\'animal le permet, il est plus facile d\'administrer des médicaments si l\'animal est placé sur une table.</p>\r\n    <p>Lorsque vous donnez un médicament, demeurez calme, car votre animal peut sentir votre nervosité, ce qui rendra votre tâche plus difficile.Vous devez toujours le féliciter et le récompenser avec une gâterie.</p>\r\n    <p>Pour éviter de mettre vos doigts dans la gueule de votre compagnon, vous pouvez utiliser une seringue spéciale. Il s’agit d’un tube en plastique similaire à une seringue qui permet de déposer le comprimé ou la capsule dans la gueule de l’animal.</p>\r\n</div>\r\n', 2, ''),
(8, 'Comportement de votre chat', '', '', '<h4>Notions de base</h4><p>Le chat est devenu l’animal de compagnie le plus populaire en Europe.</p><p>Bien qu’il soit très différent du chien, le chat est animal sociable et indépendant, demandant énormément d’affection !</p><p>Quand vous adoptez un chaton ou un chat, vous devez décider s’il vivra seulement à l’intérieur ou s’il pourra aller dehors.</p><p>Les deux situations comportent des avantages et des inconvénients.</p><p>Les chats qui vont dehors sont plus exposés aux maladies et leur espérance de vie peut être beaucoup plus courte que celle des chats d’appartement, car ils peuvent se faire heurter par une voiture ou se faire attaquer par d’autres animaux.</p><p>Par contre, si votre chat ne sort pas, vous devez le stimuler mentalement et physiquement, jouer avec lui et lui faire faire de l’exercice.</p><p>Il devra également disposer d’un poteau à griffer et d’une litière propre.</p><h4>Choisir son griffoire</h4><p>Faire ses griffes est un geste naturel pour un chat; cette activité commence dès l’âge de 5 semaines. Cela permet à l’animal de laisser des phérormones qui servent à communiquer avec les autres animaux. Toutefois, ce geste tout à fait normal peut devenir problématique quand votre chat s’en prend à vos tapis et à vos meubles. Il faudra acheter un griffoir et le disposer à un endroit bien à lui pour faire ses griffes.</p><p>Attention, les griffoirs que l’on trouve dans le commerce ne plaisent pas à tous les chats.</p><p>Idéalement, le griffoir doit être plus grand que le chat debout sur ses pattes arrière et doit être placé bien en vue dans un endroit facile d’accès.</p><p>Evitez de changer tout le temps de griffoir. En effet, plus le poteau aura été griffé et sera délabré, plus votre chat l’aimera et l’utilisera.</p>', 2, ''),
(81, 'a faire', NULL, NULL, 'securité injection sql<p>filtrer les balises script</p><p>mockup</p>', 23, ''),
(93, 'Maladies et vaccin', NULL, NULL, 'Votre chat compte sur vous pour être protégé', 27, 'L\'un des meilleurs moyens de permettre à votre chat de vivre en bonne santé pendant de nombreuses années est de le faire vacciner contre les maladies félines les plus répandues. Au cours des premières semaines de son existence votre chat a reçu, par le lait de sa mère, des anticorps qui l\'ont immunisé contre certaines maladies. Après cette période, c\'est à vous qu\'il revient de protéger votre compagnon, avec l\'aide et les conseils de votre vétérinaire.'),
(104, 'formulaire de contact', NULL, NULL, 'VForm->showFormContact', 3, 'bouton annuler'),
(105, 'tous les formulaires', NULL, NULL, 'alignement boutons', 3, '');

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `ID_DOC` int(11) NOT NULL AUTO_INCREMENT,
  `TITRE` varchar(100) NOT NULL,
  `TEXTE` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_DOC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `ID_ITEM` int(11) NOT NULL AUTO_INCREMENT,
  `ITEM` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_ITEM`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`ID_ITEM`, `ITEM`) VALUES
(1, 'la clinique'),
(2, 'fiches conseils');

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

-- --------------------------------------------------------

--
-- Structure de la table `paragraphes`
--

DROP TABLE IF EXISTS `paragraphes`;
CREATE TABLE IF NOT EXISTS `paragraphes` (
  `ID_PARAGRAPHE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONTENU` int(11) DEFAULT NULL,
  `PARAGRAPHE` text NOT NULL,
  PRIMARY KEY (`ID_PARAGRAPHE`),
  UNIQUE KEY `FRK` (`ID_CONTENU`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paragraphes`
--

INSERT INTO `paragraphes` (`ID_PARAGRAPHE`, `ID_CONTENU`, `PARAGRAPHE`) VALUES
(1, 1, 'nouveau paragraphe');

-- --------------------------------------------------------

--
-- Structure de la table `titres`
--

DROP TABLE IF EXISTS `titres`;
CREATE TABLE IF NOT EXISTS `titres` (
  `ID_TITRE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONTENU` int(11) NOT NULL,
  `TITRE` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_TITRE`),
  KEY `FRK` (`ID_CONTENU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(10) NOT NULL,
  `PASSWORD` varchar(10) NOT NULL,
  `NOM` varchar(100) NOT NULL,
  `PRENOM` varchar(100) NOT NULL,
  `AUTORISATION` int(2) NOT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID_USER`, `LOGIN`, `PASSWORD`, `NOM`, `PRENOM`, `AUTORISATION`) VALUES
(1, 'mike', 'mika', 'larboni', 'mike', 7),
(2, 'jack', '24', 'bauer', 'jack', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_doc`
--

DROP TABLE IF EXISTS `user_doc`;
CREATE TABLE IF NOT EXISTS `user_doc` (
  `ID_USER` int(11) NOT NULL,
  `ID_DOC` int(11) NOT NULL,
  PRIMARY KEY (`ID_USER`,`ID_DOC`),
  KEY `FK_USER_DOC_2` (`ID_DOC`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
