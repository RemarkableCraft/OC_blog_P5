-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 29 avr. 2022 à 16:40
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_oc`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contentComment` text NOT NULL,
  `autorComment` int(11) NOT NULL,
  `postComment` int(11) NOT NULL,
  `createDateComment` datetime NOT NULL,
  `statusComment` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idComment`),
  KEY `fk_post_comment` (`postComment`),
  KEY `fk_autor_comment` (`autorComment`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `titlePost` varchar(255) NOT NULL,
  `chapoPost` text NOT NULL,
  `contentPost` text NOT NULL,
  `imagePost` text NOT NULL,
  `autorPost` int(11) NOT NULL,
  `createDatePost` datetime NOT NULL,
  `updateDatePost` datetime DEFAULT NULL,
  PRIMARY KEY (`idPost`),
  KEY `fk_autor_post` (`autorPost`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`idPost`, `titlePost`, `chapoPost`, `contentPost`, `imagePost`, `autorPost`, `createDatePost`, `updateDatePost`) VALUES
(1, 'Comment bien r&eacute;diger un article.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris commodo posuere euismod. Integer elit metus, ullamcorper non magna id, fringilla vestibulum orci. In hac habitasse platea dictumst. Etiam rutrum diam.', '&lt;h1&gt;Bla bla 1&lt;/h1&gt;&lt;p class=&quot;ql-align-justify&quot;&gt;Proin elit nisl, rutrum sit amet turpis mollis, dictum auctor lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pulvinar rutrum urna. Vestibulum tortor leo, congue eleifend efficitur et, commodo mollis nunc. Nam tempus, dui id hendrerit ullamcorper, diam ipsum elementum dui, ut imperdiet justo lorem vel ante. Sed vitae risus lobortis ipsum maximus semper id non turpis. Etiam accumsan sem in eros placerat imperdiet. Morbi eu nibh in elit porta dignissim vel gravida lorem. Vestibulum a nisl vel nisi molestie pretium ultricies tristique risus. Praesent aliquet blandit lacus, sed ornare ante placerat gravida. Donec sed dignissim risus, id sollicitudin tortor. Sed fringilla velit ex, quis aliquam lorem euismod sit amet.&lt;/p&gt;&lt;p class=&quot;ql-align-justify&quot;&gt;Donec egestas leo at felis ultricies vulputate. Vivamus pulvinar volutpat facilisis. In feugiat, quam ut mollis porta, massa nunc pellentesque arcu, sit amet aliquet libero urna at libero. Quisque sed lobortis magna. Suspendisse aliquam feugiat congue. Etiam vitae lacus facilisis, pretium est auctor, lobortis turpis. Vestibulum in urna volutpat, lacinia diam nec, blandit lacus. Curabitur varius nisi suscipit orci eleifend, in scelerisque sem blandit. Phasellus sollicitudin, magna ac porta tempor, nibh nunc euismod nulla, sed facilisis leo neque non tortor. Aenean eu cursus mi. Donec a orci eget turpis maximus gravida. Etiam id lectus sapien. Nam sed urna vehicula, interdum tortor eget, auctor erat.&lt;/p&gt;&lt;h2&gt;Blabla 2&lt;/h2&gt;&lt;ul&gt;&lt;li class=&quot;ql-align-justify&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;&lt;li class=&quot;ql-align-justify&quot;&gt;Sed venenatis odio nec turpis interdum lacinia.&lt;/li&gt;&lt;li class=&quot;ql-align-justify&quot;&gt;Nam tempor leo vitae urna mollis sollicitudin.&lt;/li&gt;&lt;li class=&quot;ql-align-justify&quot;&gt;Aenean porta sem ac lorem bibendum semper.&lt;/li&gt;&lt;li class=&quot;ql-align-justify&quot;&gt;Cras semper tortor in facilisis iaculis.&lt;/li&gt;&lt;/ul&gt;&lt;p class=&quot;ql-align-justify&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;ul&gt;&lt;li class=&quot;ql-align-justify&quot;&gt;Maecenas condimentum odio sit amet augue gravida, sit amet pellentesque sapien condimentum.&lt;/li&gt;&lt;li class=&quot;ql-align-justify&quot;&gt;Mauris vitae arcu pulvinar, accumsan quam viverra, placerat eros.&lt;/li&gt;&lt;li class=&quot;ql-align-justify&quot;&gt;Sed porttitor velit et lorem dictum tempus.&lt;/li&gt;&lt;li class=&quot;ql-align-justify&quot;&gt;Morbi sit amet augue pharetra, molestie lacus finibus, dapibus augue.&lt;/li&gt;&lt;li class=&quot;ql-align-justify&quot;&gt;Nunc accumsan metus vel dolor auctor tristique nec non erat.&lt;/li&gt;&lt;/ul&gt;&lt;h3&gt;Blabla 3&lt;/h3&gt;&lt;p class=&quot;ql-align-justify&quot;&gt;Suspendisse eu faucibus ante. Proin nisi enim, egestas in gravida eget, egestas ut lacus. Cras eleifend tellus vulputate mi commodo, ac lobortis quam blandit. Duis feugiat, elit et aliquet feugiat.&lt;/p&gt;', 'https://picsum.photos/id/180/1000/800', 1, '2022-04-28 19:08:37', '2022-04-28 21:02:57');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `surname` varchar(55) NOT NULL,
  `pseudo` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'lecteur',
  `createDate` datetime NOT NULL,
  `validateDate` datetime DEFAULT NULL,
  `token` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `validCompte` (`pseudo`,`token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `name`, `surname`, `pseudo`, `email`, `password`, `role`, `createDate`, `validateDate`, `token`) VALUES
(1, 'blog', 'blog', 'blog', 'null', 'null', 'blog', '2022-04-07 21:17:19', '2022-04-08 20:54:21', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_autor_comment` FOREIGN KEY (`autorComment`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_comment` FOREIGN KEY (`postComment`) REFERENCES `post` (`idPost`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_autor_post` FOREIGN KEY (`autorPost`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
