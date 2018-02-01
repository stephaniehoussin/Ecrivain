-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Février 2018 à 21:12
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
  `is_signaled` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `postId`, `author`, `comment`, `comment_date`, `is_signaled`) VALUES
(1, 5, 'stephanie', 'je laisse mon commentaire', '2018-01-30 17:21:00', 0),
(3, 1, 'Stéphanie', 'Très bel épisode ! Très palpitant ! J\'ai hâte de lire le prochain !', '2018-01-30 17:26:13', 0),
(5, 4, 'steph', 'je laisse mon commentaire test et je vois si ca marche\r\n', '2018-01-31 12:31:28', 1),
(7, 5, 'stephanie', 'commentaire', '2018-02-01 17:05:11', 0);

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
(1, 'Jean Forteroche', 'Premier billet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nisi felis, fringilla vitae orci ut, euismod imperdiet ligula. In hac habitasse platea dictumst. Duis egestas, lorem et faucibus fermentum, est ante suscipit lectus, et luctus sapien ex in nibh. Aenean magna diam, finibus nec urna quis, volutpat ornare tellus. Curabitur et libero dolor. Cras nec ultricies tortor, vitae feugiat quam. Sed at consectetur ligula. Vestibulum ullamcorper consectetur purus in placerat. Mauris convallis metus enim, nec pharetra nunc volutpat eget. Nulla bibendum ac augue quis euismod. Cras in nunc magna. Proin non tincidunt augue, sit amet fermentum neque.</p>\r\n<p>Praesent tempor rutrum enim a iaculis. Ut in feugiat magna, et luctus est. Suspendisse a metus at lacus finibus elementum eu non odio. Ut ut metus orci. Morbi leo est, cursus a quam varius, porttitor condimentum purus. Suspendisse ut nibh in sem sollicitudin ullamcorper. Nunc feugiat nec ligula in mollis. Aliquam lacinia ac nisl ut porttitor. Nunc dignissim eros vitae nisl facilisis, ut ullamcorper quam lacinia. Integer dictum, lorem consequat malesuada congue, lectus enim egestas tortor, in mattis neque neque et urna. Aenean ex odio, faucibus quis urna eu, egestas facilisis enim. Nulla mattis ornare elit, eget ornare nulla. Aliquam facilisis risus purus, at vulputate nisl hendrerit vel. In dictum in risus eget sagittis. Pellentesque ut pellentesque purus, quis egestas mauris.</p>\r\n<p>Suspendisse non faucibus sem. Morbi interdum varius arcu a commodo. Praesent facilisis nulla eu porta facilisis. Integer lectus ligula, vestibulum maximus blandit ut, placerat quis justo. Fusce vel semper justo. Ut vestibulum massa sapien, vel mollis arcu aliquam vel. Aenean leo tellus, lacinia vitae augue ac, maximus blandit lacus. Donec dolor quam, sollicitudin id libero et, ultricies tincidunt tortor. Cras eu felis egestas, varius nisi ac, ullamcorper eros.</p>\r\n<p>Morbi massa orci, placerat tempus erat vitae, scelerisque egestas justo. Donec ut bibendum arcu. Sed maximus, nibh vel malesuada pellentesque, lacus lectus scelerisque nibh, at rhoncus diam ligula ut ligula. Proin non orci aliquam, pulvinar enim nec, ullamcorper eros. Nulla ac ipsum quam. Vestibulum sollicitudin nunc sem, ac gravida dui egestas viverra. Donec vestibulum luctus luctus. Sed maximus, sapien quis maximus elementum, enim odio auctor nisi, eget pretium libero ex at nisi. Fusce blandit ex ligula, ut eleifend leo bibendum id. Donec condimentum id nunc eget congue. Proin blandit hendrerit placerat. Nunc nec malesuada mauris, ac posuere libero. Aenean eu consectetur ipsum. Aliquam vitae orci eu arcu ultricies tincidunt sit amet sit amet neque. Integer ipsum quam, lacinia vitae efficitur at, mattis nec sem.</p>\r\n<p>Donec imperdiet mauris quis dui dictum interdum. Pellentesque iaculis nunc eros, eu vulputate odio rhoncus ut. Fusce efficitur ipsum id feugiat imperdiet. Cras elementum tortor ac arcu venenatis, aliquam malesuada ex ullamcorper. Vestibulum suscipit at dolor sed fringilla. Aliquam erat volutpat. Sed placerat rutrum eros eu interdum. Mauris neque nibh, molestie ac nisl eu, vestibulum porta urna. Ut id congue risus. Nulla elementum urna id eleifend sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc porttitor ac erat in porta.</p>\r\n<p>QS</p>\r\n<p>ssds</p>\r\n<p> </p>', '2018-01-13 17:20:06'),
(2, 'Jean Forteroche', 'Deuxième Billet', '<p>Praesent tempor rutrum enim a iaculis. Ut in feugiat magna, et luctus est. Suspendisse a metus at lacus finibus elementum eu non odio. Ut ut metus orci. Morbi leo est, cursus a quam varius, porttitor condimentum purus. Suspendisse ut nibh in sem sollicitudin ullamcorper. Nunc feugiat nec ligula in mollis. Aliquam lacinia ac nisl ut porttitor. Nunc dignissim eros vitae nisl facilisis, ut ullamcorper quam lacinia. Integer dictum, lorem consequat malesuada congue, lectus enim egestas tortor, in mattis neque neque et urna. Aenean ex odio, faucibus quis urna eu, egestas facilisis enim. Nulla mattis ornare elit, eget ornare nulla. Aliquam facilisis risus purus, at vulputate nisl hendrerit vel. In dictum in risus eget sagittis. Pellentesque ut pellentesque purus, quis egestas mauris.</p>\r\n<p>Suspendisse non faucibus sem. Morbi interdum varius arcu a commodo. Praesent facilisis nulla eu porta facilisis. Integer lectus ligula, vestibulum maximus blandit ut, placerat quis justo. Fusce vel semper justo. Ut vestibulum massa sapien, vel mollis arcu aliquam vel. Aenean leo tellus, lacinia vitae augue ac, maximus blandit lacus. Donec dolor quam, sollicitudin id libero et, ultricies tincidunt tortor. Cras eu felis egestas, varius nisi ac, ullamcorper eros.</p>', '2018-01-13 17:21:05'),
(3, 'Jean Forteroche', 'Troisième billet', '<p>Suspendisse non faucibus sem. Morbi interdum varius arcu a commodo. Praesent facilisis nulla eu porta facilisis. Integer lectus ligula, vestibulum maximus blandit ut, placerat quis justo. Fusce vel semper justo. Ut vestibulum massa sapien, vel mollis arcu aliquam vel. Aenean leo tellus, lacinia vitae augue ac, maximus blandit lacus. Donec dolor quam, sollicitudin id libero et, ultricies tincidunt tortor. Cras eu felis egestas, varius nisi ac, ullamcorper eros.</p>\r\n<p>Morbi massa orci, placerat tempus erat vitae, scelerisque egestas justo. Donec ut bibendum arcu. Sed maximus, nibh vel malesuada pellentesque, lacus lectus scelerisque nibh, at rhoncus diam ligula ut ligula. Proin non orci aliquam, pulvinar enim nec, ullamcorper eros. Nulla ac ipsum quam. Vestibulum sollicitudin nunc sem, ac gravida dui egestas viverra. Donec vestibulum luctus luctus. Sed maximus, sapien quis maximus elementum, enim odio auctor nisi, eget pretium libero ex at nisi. Fusce blandit ex ligula, ut eleifend leo bibendum id. Donec condimentum id nunc eget congue. Proin blandit hendrerit placerat. Nunc nec malesuada mauris, ac posuere libero. Aenean eu consectetur ipsum. Aliquam vitae orci eu arcu ultricies tincidunt sit amet sit amet neque. Integer ipsum quam, lacinia vitae efficitur at, mattis nec sem.</p>\r\n<p>Donec imperdiet mauris quis dui dictum interdum. Pellentesque iaculis nunc eros, eu vulputate odio rhoncus ut. Fusce efficitur ipsum id feugiat imperdiet. Cras elementum tortor ac arcu venenatis, aliquam malesuada ex ullamcorper. Vestibulum suscipit at dolor sed fringilla. Aliquam erat volutpat. Sed placerat rutrum eros eu interdum. Mauris neque nibh, molestie ac nisl eu, vestibulum porta urna. Ut id congue risus. Nulla elementum urna id eleifend sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc porttitor ac erat in porta.</p>', '2018-01-13 17:36:46'),
(4, 'Jean Forteroche', 'Quatrième billet', '<p>Suspendisse non faucibus sem. Morbi interdum varius arcu a commodo. Praesent facilisis nulla eu porta facilisis. Integer lectus ligula, vestibulum maximus blandit ut, placerat quis justo. Fusce vel semper justo. Ut vestibulum massa sapien, vel mollis arcu aliquam vel. Aenean leo tellus, lacinia vitae augue ac, maximus blandit lacus. Donec dolor quam, sollicitudin id libero et, ultricies tincidunt tortor. Cras eu felis egestas, varius nisi ac, ullamcorper eros.</p>\r\n<p>Morbi massa orci, placerat tempus erat vitae, scelerisque egestas justo. Donec ut bibendum arcu. Sed maximus, nibh vel malesuada pellentesque, lacus lectus scelerisque nibh, at rhoncus diam ligula ut ligula. Proin non orci aliquam, pulvinar enim nec, ullamcorper eros. Nulla ac ipsum quam. Vestibulum sollicitudin nunc sem, ac gravida dui egestas viverra. Donec vestibulum luctus luctus. Sed maximus, sapien quis maximus elementum, enim odio auctor nisi, eget pretium libero ex at nisi. Fusce blandit ex ligula, ut eleifend leo bibendum id. Donec condimentum id nunc eget congue. Proin blandit hendrerit placerat. Nunc nec malesuada mauris, ac posuere libero. Aenean eu consectetur ipsum. Aliquam vitae orci eu arcu ultricies tincidunt sit amet sit amet neque. Integer ipsum quam, lacinia vitae efficitur at, mattis nec sem.</p>\r\n<p>Donec imperdiet mauris quis dui dictum interdum. Pellentesque iaculis nunc eros, eu vulputate odio rhoncus ut. Fusce efficitur ipsum id feugiat imperdiet. Cras elementum tortor ac arcu venenatis, aliquam malesuada ex ullamcorper. Vestibulum suscipit at dolor sed fringilla. Aliquam erat volutpat. Sed placerat rutrum eros eu interdum. Mauris neque nibh, molestie ac nisl eu, vestibulum porta urna. Ut id congue risus. Nulla elementum urna id eleifend sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc porttitor ac erat in porta.</p>', '2018-01-13 17:37:19'),
(5, 'Jean Forteroche', 'Cinquième billet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nisi felis, fringilla vitae orci ut, euismod imperdiet ligula. In hac habitasse platea dictumst. Duis egestas, lorem et faucibus fermentum, est ante suscipit lectus, et luctus sapien ex in nibh. Aenean magna diam, finibus nec urna quis, volutpat ornare tellus. Curabitur et libero dolor. Cras nec ultricies tortor, vitae feugiat quam. Sed at consectetur ligula. Vestibulum ullamcorper consectetur purus in placerat. Mauris convallis metus enim, nec pharetra nunc volutpat eget. Nulla bibendum ac augue quis euismod. Cras in nunc magna. Proin non tincidunt augue, sit amet fermentum neque.</p>\r\n<p>Praesent tempor rutrum enim a iaculis. Ut in feugiat magna, et luctus est. Suspendisse a metus at lacus finibus elementum eu non odio. Ut ut metus orci. Morbi leo est, cursus a quam varius, porttitor condimentum purus. Suspendisse ut nibh in sem sollicitudin ullamcorper. Nunc feugiat nec ligula in mollis. Aliquam lacinia ac nisl ut porttitor. Nunc dignissim eros vitae nisl facilisis, ut ullamcorper quam lacinia. Integer dictum, lorem consequat malesuada congue, lectus enim egestas tortor, in mattis neque neque et urna. Aenean ex odio, faucibus quis urna eu, egestas facilisis enim. Nulla mattis ornare elit, eget ornare nulla. Aliquam facilisis risus purus, at vulputate nisl hendrerit vel. In dictum in risus eget sagittis. Pellentesque ut pellentesque purus, quis egestas mauris.</p>\r\n<p>Suspendisse non faucibus sem. Morbi interdum varius arcu a commodo. Praesent facilisis nulla eu porta facilisis. Integer lectus ligula, vestibulum maximus blandit ut, placerat quis justo. Fusce vel semper justo. Ut vestibulum massa sapien, vel mollis arcu aliquam vel. Aenean leo tellus, lacinia vitae augue ac, maximus blandit lacus. Donec dolor quam, sollicitudin id libero et, ultricies tincidunt tortor. Cras eu felis egestas, varius nisi ac, ullamcorper eros.</p>', '2018-01-13 17:37:40');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL DEFAULT 'JForteroche',
  `password` varchar(255) NOT NULL DEFAULT 'Autruche75'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(13, 'JForteroche', 'Autruche75');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
