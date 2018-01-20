-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 15 Janvier 2018 à 12:39
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alaska`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `reportComment` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `postId`, `author`, `comment`, `comment_date`, `reportComment`) VALUES
(1, 1, 'Stephanie', 'Ce premier billet est superbe ! ', '2018-01-13 17:22:02', 1),
(2, 1, 'Fanny', 'Pas mal . Voir la suite ', '2018-01-13 17:28:43', 1),
(3, 2, 'Luc', 'Deuxième billet prometteur . Bien meilleur que le premier !', '2018-01-13 17:34:24', 1),
(4, 6, 'stephanie Houssin', 'Je laisse un commentaire', '2018-01-15 10:25:26', 1),
(5, 5, 'stephanie', 'je teste', '2018-01-15 11:47:41', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `content`, `creation_date`) VALUES
(1, 'Jean Forteroche', 'Premier billet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nisi felis, fringilla vitae orci ut, euismod imperdiet ligula. In hac habitasse platea dictumst. Duis egestas, lorem et faucibus fermentum, est ante suscipit lectus, et luctus sapien ex in nibh. Aenean magna diam, finibus nec urna quis, volutpat ornare tellus. Curabitur et libero dolor. Cras nec ultricies tortor, vitae feugiat quam. Sed at consectetur ligula. Vestibulum ullamcorper consectetur purus in placerat. Mauris convallis metus enim, nec pharetra nunc volutpat eget. Nulla bibendum ac augue quis euismod. Cras in nunc magna. Proin non tincidunt augue, sit amet fermentum neque.</p>\r\n<p>Praesent tempor rutrum enim a iaculis. Ut in feugiat magna, et luctus est. Suspendisse a metus at lacus finibus elementum eu non odio. Ut ut metus orci. Morbi leo est, cursus a quam varius, porttitor condimentum purus. Suspendisse ut nibh in sem sollicitudin ullamcorper. Nunc feugiat nec ligula in mollis. Aliquam lacinia ac nisl ut porttitor. Nunc dignissim eros vitae nisl facilisis, ut ullamcorper quam lacinia. Integer dictum, lorem consequat malesuada congue, lectus enim egestas tortor, in mattis neque neque et urna. Aenean ex odio, faucibus quis urna eu, egestas facilisis enim. Nulla mattis ornare elit, eget ornare nulla. Aliquam facilisis risus purus, at vulputate nisl hendrerit vel. In dictum in risus eget sagittis. Pellentesque ut pellentesque purus, quis egestas mauris.</p>\r\n<p>Suspendisse non faucibus sem. Morbi interdum varius arcu a commodo. Praesent facilisis nulla eu porta facilisis. Integer lectus ligula, vestibulum maximus blandit ut, placerat quis justo. Fusce vel semper justo. Ut vestibulum massa sapien, vel mollis arcu aliquam vel. Aenean leo tellus, lacinia vitae augue ac, maximus blandit lacus. Donec dolor quam, sollicitudin id libero et, ultricies tincidunt tortor. Cras eu felis egestas, varius nisi ac, ullamcorper eros.</p>\r\n<p>Morbi massa orci, placerat tempus erat vitae, scelerisque egestas justo. Donec ut bibendum arcu. Sed maximus, nibh vel malesuada pellentesque, lacus lectus scelerisque nibh, at rhoncus diam ligula ut ligula. Proin non orci aliquam, pulvinar enim nec, ullamcorper eros. Nulla ac ipsum quam. Vestibulum sollicitudin nunc sem, ac gravida dui egestas viverra. Donec vestibulum luctus luctus. Sed maximus, sapien quis maximus elementum, enim odio auctor nisi, eget pretium libero ex at nisi. Fusce blandit ex ligula, ut eleifend leo bibendum id. Donec condimentum id nunc eget congue. Proin blandit hendrerit placerat. Nunc nec malesuada mauris, ac posuere libero. Aenean eu consectetur ipsum. Aliquam vitae orci eu arcu ultricies tincidunt sit amet sit amet neque. Integer ipsum quam, lacinia vitae efficitur at, mattis nec sem.</p>\r\n<p>Donec imperdiet mauris quis dui dictum interdum. Pellentesque iaculis nunc eros, eu vulputate odio rhoncus ut. Fusce efficitur ipsum id feugiat imperdiet. Cras elementum tortor ac arcu venenatis, aliquam malesuada ex ullamcorper. Vestibulum suscipit at dolor sed fringilla. Aliquam erat volutpat. Sed placerat rutrum eros eu interdum. Mauris neque nibh, molestie ac nisl eu, vestibulum porta urna. Ut id congue risus. Nulla elementum urna id eleifend sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc porttitor ac erat in porta.</p>', '2018-01-13 17:20:06'),
(2, 'Jean Forteroche', 'Deuxième Billet', '<p>Praesent tempor rutrum enim a iaculis. Ut in feugiat magna, et luctus est. Suspendisse a metus at lacus finibus elementum eu non odio. Ut ut metus orci. Morbi leo est, cursus a quam varius, porttitor condimentum purus. Suspendisse ut nibh in sem sollicitudin ullamcorper. Nunc feugiat nec ligula in mollis. Aliquam lacinia ac nisl ut porttitor. Nunc dignissim eros vitae nisl facilisis, ut ullamcorper quam lacinia. Integer dictum, lorem consequat malesuada congue, lectus enim egestas tortor, in mattis neque neque et urna. Aenean ex odio, faucibus quis urna eu, egestas facilisis enim. Nulla mattis ornare elit, eget ornare nulla. Aliquam facilisis risus purus, at vulputate nisl hendrerit vel. In dictum in risus eget sagittis. Pellentesque ut pellentesque purus, quis egestas mauris.</p>\r\n<p>Suspendisse non faucibus sem. Morbi interdum varius arcu a commodo. Praesent facilisis nulla eu porta facilisis. Integer lectus ligula, vestibulum maximus blandit ut, placerat quis justo. Fusce vel semper justo. Ut vestibulum massa sapien, vel mollis arcu aliquam vel. Aenean leo tellus, lacinia vitae augue ac, maximus blandit lacus. Donec dolor quam, sollicitudin id libero et, ultricies tincidunt tortor. Cras eu felis egestas, varius nisi ac, ullamcorper eros.</p>', '2018-01-13 17:21:05'),
(3, 'Jean Forteroche', 'Troisième billet', '<p>Suspendisse non faucibus sem. Morbi interdum varius arcu a commodo. Praesent facilisis nulla eu porta facilisis. Integer lectus ligula, vestibulum maximus blandit ut, placerat quis justo. Fusce vel semper justo. Ut vestibulum massa sapien, vel mollis arcu aliquam vel. Aenean leo tellus, lacinia vitae augue ac, maximus blandit lacus. Donec dolor quam, sollicitudin id libero et, ultricies tincidunt tortor. Cras eu felis egestas, varius nisi ac, ullamcorper eros.</p>\r\n<p>Morbi massa orci, placerat tempus erat vitae, scelerisque egestas justo. Donec ut bibendum arcu. Sed maximus, nibh vel malesuada pellentesque, lacus lectus scelerisque nibh, at rhoncus diam ligula ut ligula. Proin non orci aliquam, pulvinar enim nec, ullamcorper eros. Nulla ac ipsum quam. Vestibulum sollicitudin nunc sem, ac gravida dui egestas viverra. Donec vestibulum luctus luctus. Sed maximus, sapien quis maximus elementum, enim odio auctor nisi, eget pretium libero ex at nisi. Fusce blandit ex ligula, ut eleifend leo bibendum id. Donec condimentum id nunc eget congue. Proin blandit hendrerit placerat. Nunc nec malesuada mauris, ac posuere libero. Aenean eu consectetur ipsum. Aliquam vitae orci eu arcu ultricies tincidunt sit amet sit amet neque. Integer ipsum quam, lacinia vitae efficitur at, mattis nec sem.</p>\r\n<p>Donec imperdiet mauris quis dui dictum interdum. Pellentesque iaculis nunc eros, eu vulputate odio rhoncus ut. Fusce efficitur ipsum id feugiat imperdiet. Cras elementum tortor ac arcu venenatis, aliquam malesuada ex ullamcorper. Vestibulum suscipit at dolor sed fringilla. Aliquam erat volutpat. Sed placerat rutrum eros eu interdum. Mauris neque nibh, molestie ac nisl eu, vestibulum porta urna. Ut id congue risus. Nulla elementum urna id eleifend sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc porttitor ac erat in porta.</p>', '2018-01-13 17:36:46'),
(4, 'Jean Forteroche', 'Quatrième billet', '<p>Suspendisse non faucibus sem. Morbi interdum varius arcu a commodo. Praesent facilisis nulla eu porta facilisis. Integer lectus ligula, vestibulum maximus blandit ut, placerat quis justo. Fusce vel semper justo. Ut vestibulum massa sapien, vel mollis arcu aliquam vel. Aenean leo tellus, lacinia vitae augue ac, maximus blandit lacus. Donec dolor quam, sollicitudin id libero et, ultricies tincidunt tortor. Cras eu felis egestas, varius nisi ac, ullamcorper eros.</p>\r\n<p>Morbi massa orci, placerat tempus erat vitae, scelerisque egestas justo. Donec ut bibendum arcu. Sed maximus, nibh vel malesuada pellentesque, lacus lectus scelerisque nibh, at rhoncus diam ligula ut ligula. Proin non orci aliquam, pulvinar enim nec, ullamcorper eros. Nulla ac ipsum quam. Vestibulum sollicitudin nunc sem, ac gravida dui egestas viverra. Donec vestibulum luctus luctus. Sed maximus, sapien quis maximus elementum, enim odio auctor nisi, eget pretium libero ex at nisi. Fusce blandit ex ligula, ut eleifend leo bibendum id. Donec condimentum id nunc eget congue. Proin blandit hendrerit placerat. Nunc nec malesuada mauris, ac posuere libero. Aenean eu consectetur ipsum. Aliquam vitae orci eu arcu ultricies tincidunt sit amet sit amet neque. Integer ipsum quam, lacinia vitae efficitur at, mattis nec sem.</p>\r\n<p>Donec imperdiet mauris quis dui dictum interdum. Pellentesque iaculis nunc eros, eu vulputate odio rhoncus ut. Fusce efficitur ipsum id feugiat imperdiet. Cras elementum tortor ac arcu venenatis, aliquam malesuada ex ullamcorper. Vestibulum suscipit at dolor sed fringilla. Aliquam erat volutpat. Sed placerat rutrum eros eu interdum. Mauris neque nibh, molestie ac nisl eu, vestibulum porta urna. Ut id congue risus. Nulla elementum urna id eleifend sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc porttitor ac erat in porta.</p>', '2018-01-13 17:37:19'),
(5, 'Jean Forteroche', 'Cinquième billet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nisi felis, fringilla vitae orci ut, euismod imperdiet ligula. In hac habitasse platea dictumst. Duis egestas, lorem et faucibus fermentum, est ante suscipit lectus, et luctus sapien ex in nibh. Aenean magna diam, finibus nec urna quis, volutpat ornare tellus. Curabitur et libero dolor. Cras nec ultricies tortor, vitae feugiat quam. Sed at consectetur ligula. Vestibulum ullamcorper consectetur purus in placerat. Mauris convallis metus enim, nec pharetra nunc volutpat eget. Nulla bibendum ac augue quis euismod. Cras in nunc magna. Proin non tincidunt augue, sit amet fermentum neque.</p>\r\n<p>Praesent tempor rutrum enim a iaculis. Ut in feugiat magna, et luctus est. Suspendisse a metus at lacus finibus elementum eu non odio. Ut ut metus orci. Morbi leo est, cursus a quam varius, porttitor condimentum purus. Suspendisse ut nibh in sem sollicitudin ullamcorper. Nunc feugiat nec ligula in mollis. Aliquam lacinia ac nisl ut porttitor. Nunc dignissim eros vitae nisl facilisis, ut ullamcorper quam lacinia. Integer dictum, lorem consequat malesuada congue, lectus enim egestas tortor, in mattis neque neque et urna. Aenean ex odio, faucibus quis urna eu, egestas facilisis enim. Nulla mattis ornare elit, eget ornare nulla. Aliquam facilisis risus purus, at vulputate nisl hendrerit vel. In dictum in risus eget sagittis. Pellentesque ut pellentesque purus, quis egestas mauris.</p>\r\n<p>Suspendisse non faucibus sem. Morbi interdum varius arcu a commodo. Praesent facilisis nulla eu porta facilisis. Integer lectus ligula, vestibulum maximus blandit ut, placerat quis justo. Fusce vel semper justo. Ut vestibulum massa sapien, vel mollis arcu aliquam vel. Aenean leo tellus, lacinia vitae augue ac, maximus blandit lacus. Donec dolor quam, sollicitudin id libero et, ultricies tincidunt tortor. Cras eu felis egestas, varius nisi ac, ullamcorper eros.</p>', '2018-01-13 17:37:40'),
(6, 'Jean Forteroche', 'Sixième billet', 'J\'ajoute du texte<br /><br />Praesent tempor rutrum enim a iaculis. Ut in feugiat magna, et luctus est. Suspendisse a metus at lacus finibus elementum eu non odio. Ut ut metus orci. Morbi leo est, cursus a quam varius, porttitor condimentum purus. Suspendisse ut nibh in sem sollicitudin ullamcorper. Nunc feugiat nec ligula in mollis. Aliquam lacinia ac nisl ut porttitor. Nunc dignissim eros vitae nisl facilisis, ut ullamcorper quam lacinia. Integer dictum, lorem consequat malesuada congue, lectus enim egestas tortor, in mattis neque neque et urna. Aenean ex odio, faucibus quis urna eu, egestas facilisis enim. Nulla mattis ornare elit, eget ornare nulla. Aliquam facilisis risus purus, at vulputate nisl hendrerit vel. In dictum in risus eget sagittis. Pellentesque ut pellentesque purus, quis egestas mauris.\r\n<p>Suspendisse non faucibus sem. Morbi interdum varius arcu a commodo. Praesent facilisis nulla eu porta facilisis. Integer lectus ligula, vestibulum maximus blandit ut, placerat quis justo. Fusce vel semper justo. Ut vestibulum massa sapien, vel mollis arcu aliquam vel. Aenean leo tellus, lacinia vitae augue ac, maximus blandit lacus. Donec dolor quam, sollicitudin id libero et, ultricies tincidunt tortor. Cras eu felis egestas, varius nisi ac, ullamcorper eros.</p>\r\n<p>Morbi massa orci, placerat tempus erat vitae, scelerisque egestas justo. Donec ut bibendum arcu. Sed maximus, nibh vel malesuada pellentesque, lacus lectus scelerisque nibh, at rhoncus diam ligula ut ligula. Proin non orci aliquam, pulvinar enim nec, ullamcorper eros. Nulla ac ipsum quam. Vestibulum sollicitudin nunc sem, ac gravida dui egestas viverra. Donec vestibulum luctus luctus. Sed maximus, sapien quis maximus elementum, enim odio auctor nisi, eget pretium libero ex at nisi. Fusce blandit ex ligula, ut eleifend leo bibendum id. Donec condimentum id nunc eget congue. Proin blandit hendrerit placerat. Nunc nec malesuada mauris, ac posuere libero. Aenean eu consectetur ipsum. Aliquam vitae orci eu arcu ultricies tincidunt sit amet sit amet neque. Integer ipsum quam, lacinia vitae efficitur at, mattis nec sem.</p>\r\n<p>Donec imperdiet mauris quis dui dictum interdum. Pellentesque iaculis nunc eros, eu vulputate odio rhoncus ut. Fusce efficitur ipsum id feugiat imperdiet. Cras elementum tortor ac arcu venenatis, aliquam malesuada ex ullamcorper. Vestibulum suscipit at dolor sed fringilla. Aliquam erat volutpat. Sed placerat rutrum eros eu interdum. Mauris neque nibh, molestie ac nisl eu, vestibulum porta urna. Ut id congue risus. Nulla elementum urna id eleifend sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc porttitor ac erat in porta.</p>', '2018-01-13 17:38:13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL DEFAULT 'JForteroche',
  `password` varchar(255) NOT NULL DEFAULT 'Autruche75'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
