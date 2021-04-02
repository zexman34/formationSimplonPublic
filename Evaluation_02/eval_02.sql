-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2021 at 11:53 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eval_02`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `artist_name`) VALUES
(1, 'Rammstein'),
(2, 'ACDCa'),
(3, 'Gojira'),
(4, 'System Of A Down'),
(5, 'Lindenmann'),
(26, 'Iron Maiden'),
(28, 'Lolal'),
(29, 'fa'),
(30, 'fa'),
(31, 'faa'),
(32, 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `asso_artist_style`
--

CREATE TABLE `asso_artist_style` (
  `asso_id` int(11) NOT NULL,
  `asso_style_id` int(11) NOT NULL,
  `asso_artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `asso_artist_style`
--

INSERT INTO `asso_artist_style` (`asso_id`, `asso_style_id`, `asso_artist_id`) VALUES
(4, 16, 1),
(5, 17, 2),
(6, 19, 2),
(7, 20, 2),
(9, 167, 26),
(11, 481, 28),
(12, 484, 32);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(2, 'Brass & Military'),
(3, 'Children’s'),
(4, 'Classical'),
(5, 'Electronic'),
(6, 'Folk, World, & Country'),
(7, 'Funk & Soul'),
(8, 'Hip Hop'),
(9, 'Jazze'),
(10, 'Latin'),
(11, 'Non-Music'),
(12, 'Popa'),
(13, 'Reggae'),
(16, 'Pas de genre'),
(17, 'Rock');

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `style_id` int(11) NOT NULL,
  `style_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `style_genre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`style_id`, `style_name`, `style_genre_id`) VALUES
(2, 'Chicago Blues', 16),
(3, 'Country Blues', 16),
(4, 'Delta Blues', 16),
(5, 'East Coast Blues', 16),
(6, 'Electric Blues', 16),
(7, 'Harmonica Blues', 16),
(8, 'Hill Country Blues', 16),
(9, 'Jump Blues', 16),
(10, 'Louisiana Blues', 16),
(11, 'Memphis Blues', 16),
(12, 'Modern Electric Blues', 16),
(13, 'Piano Blues', 16),
(14, 'Piedmont Blues', 16),
(15, 'Texas Blues', 16),
(16, 'Brass Band', 2),
(17, 'Marches', 2),
(18, 'Military', 2),
(19, 'Pipe & Drum', 2),
(20, 'Educational', 3),
(21, 'Nursery Rhymes', 3),
(22, 'Story', 3),
(23, 'Baroque', 4),
(24, 'Choral', 4),
(25, 'Classical', 4),
(26, 'Contemporary', 4),
(27, 'Early', 4),
(28, 'Impressionist', 4),
(29, 'Medieval', 4),
(30, 'Modern', 4),
(31, 'Neo-Classical', 4),
(32, 'Neo-Romantic', 4),
(33, 'Opera', 4),
(34, 'Operetta', 4),
(35, 'Oratorio', 4),
(36, 'Post-Modern', 4),
(37, 'Renaissance', 4),
(38, 'Romantic', 4),
(39, 'Serial', 4),
(40, 'Twelve-tone', 4),
(41, 'Zarzuela', 4),
(42, 'Abstract', 5),
(43, 'Acid', 5),
(44, 'Acid House', 5),
(45, 'Acid Jazz', 5),
(46, 'Ambient', 5),
(47, 'Ballroom', 5),
(48, 'Baltimore Club', 5),
(49, 'Bassline', 5),
(50, 'Beatdown', 5),
(51, 'Berlin-School', 5),
(52, 'Big Beat', 5),
(53, 'Bleep', 5),
(54, 'Breakbeat', 5),
(55, 'Breakcore', 5),
(56, 'Breaks', 5),
(57, 'Broken Beat', 5),
(58, 'Chillwave', 5),
(59, 'Chiptune', 5),
(60, 'Dance-pop', 5),
(61, 'Dark Ambient', 5),
(62, 'Darkwave', 5),
(63, 'Deep House', 5),
(64, 'Deep Techno', 5),
(65, 'Disco', 5),
(66, 'Disco Polo', 5),
(67, 'Donk', 5),
(68, 'Doomcore', 5),
(69, 'Downtempo', 5),
(70, 'Drone', 5),
(71, 'Drum n Bass', 5),
(72, 'Dub', 5),
(73, 'Dub Techno', 5),
(74, 'Dubstep', 5),
(75, 'Dungeon Synth', 5),
(76, 'EBM', 5),
(77, 'Electro', 5),
(78, 'Electro House', 5),
(79, 'Electro Swing', 5),
(80, 'Electroacoustic', 5),
(81, 'Electroclash', 5),
(82, 'Euro House', 5),
(83, 'Euro-Disco', 5),
(84, 'Eurobeat', 5),
(85, 'Eurodance', 5),
(86, 'Experimental', 5),
(87, 'Footwork', 5),
(88, 'Freestyle', 5),
(89, 'Funkot', 5),
(90, 'Future Jazz', 5),
(91, 'Gabber', 5),
(92, 'Garage House', 5),
(93, 'Ghetto', 5),
(94, 'Ghetto House', 5),
(95, 'Ghettotech', 5),
(96, 'Glitch', 5),
(97, 'Glitch Hop', 5),
(98, 'Goa Trance', 5),
(99, 'Grime', 5),
(100, 'Halftime', 5),
(101, 'Hands Up', 5),
(102, 'Happy Hardcore', 5),
(103, 'Hard Beat', 5),
(104, 'Hard House', 5),
(105, 'Hard Techno', 5),
(106, 'Hard Trance', 5),
(107, 'Hardcore', 5),
(108, 'Hardstyle', 5),
(109, 'Harsh Noise Wall', 5),
(110, 'Hi NRG', 5),
(111, 'Hip Hop', 5),
(112, 'Hip-House', 5),
(113, 'House', 5),
(114, 'IDM', 5),
(115, 'Illbient', 5),
(116, 'Industrial', 5),
(117, 'Italo House', 5),
(118, 'Italo-Disco', 5),
(119, 'Italodance', 5),
(120, 'J-Core', 5),
(121, 'Jazzdance', 5),
(122, 'Jersey Club', 5),
(123, 'Juke', 5),
(124, 'Jumpstyle', 5),
(125, 'Jungle', 5),
(126, 'Latin', 5),
(127, 'Leftfield', 5),
(128, 'Lento Violento', 5),
(129, 'Makina', 5),
(130, 'Minimal', 5),
(131, 'Minimal Techno', 5),
(132, 'Modern Classical', 5),
(133, 'Moombahton', 5),
(134, 'Musique Concrète', 5),
(135, 'Neo Trance', 5),
(136, 'Neofolk', 5),
(137, 'Nerdcore Techno', 5),
(138, 'New Age', 5),
(139, 'New Beat', 5),
(140, 'Noise', 5),
(141, 'Nu-Disco', 5),
(142, 'Power Electronics', 5),
(143, 'Progressive Breaks', 5),
(144, 'Progressive House', 5),
(145, 'Progressive Trance', 5),
(146, 'Psy-Trance', 5),
(147, 'Rhythmic Noise', 5),
(148, 'Schranz', 5),
(149, 'Skweee', 5),
(150, 'Sound Collage', 5),
(151, 'Speed Garage', 5),
(152, 'Speedcore', 5),
(153, 'Synth-pop', 5),
(154, 'Synthwave', 5),
(155, 'Tech House', 5),
(156, 'Tech Trance', 5),
(157, 'Techno', 5),
(158, 'Trance', 5),
(159, 'Tribal', 5),
(160, 'Tribal House', 5),
(161, 'Trip Hop', 5),
(162, 'Tropical House', 5),
(163, 'UK Funky', 5),
(164, 'UK Garage', 5),
(165, 'Vaporwave', 5),
(166, 'Witch House', 5),
(167, 'Aboriginal', 6),
(168, 'African', 6),
(169, 'Andalusian Classical', 6),
(170, 'Andean Music', 6),
(171, 'Appalachian Music', 6),
(172, 'Bangladeshi Classical', 6),
(173, 'Basque Music', 6),
(174, 'Bengali Music', 6),
(175, 'Bhangra', 6),
(176, 'Bluegrass', 6),
(177, 'Cajun', 6),
(178, 'Cambodian Classical', 6),
(179, 'Canzone Napoletana', 6),
(180, 'Carnatic', 6),
(181, 'Catalan Music', 6),
(182, 'Celtic', 6),
(183, 'Chacarera', 6),
(184, 'Chamamé', 6),
(185, 'Chinese Classical', 6),
(186, 'Chutney', 6),
(187, 'Cobla', 6),
(188, 'Copla', 6),
(189, 'Country', 6),
(190, 'Cretan', 6),
(191, 'Dangdut', 6),
(192, 'Entekhno', 6),
(193, 'Fado', 6),
(194, 'Filk', 6),
(195, 'Flamenco', 6),
(196, 'Folk', 6),
(197, 'Funaná', 6),
(198, 'Gagaku', 6),
(199, 'Galician Traditional', 6),
(200, 'Gamelan', 6),
(201, 'Għana', 6),
(202, 'Ghazal', 6),
(203, 'Griot', 6),
(204, 'Guarania', 6),
(205, 'Gwo Ka', 6),
(206, 'Hawaiian', 6),
(207, 'Highlife', 6),
(208, 'Hillbilly', 6),
(209, 'Hindustani', 6),
(210, 'Honky Tonk', 6),
(211, 'Huayno', 6),
(212, 'Indian Classical', 6),
(213, 'Jota', 6),
(214, 'Jug Band', 6),
(215, 'Kaseko', 6),
(216, 'Keroncong', 6),
(217, 'Kizomba', 6),
(218, 'Klasik', 6),
(219, 'Klezmer', 6),
(220, 'Korean Court Music', 6),
(221, 'Laïkó', 6),
(222, 'Lao Music', 6),
(223, 'Liscio', 6),
(224, 'Luk Krung', 6),
(225, 'Luk Thung', 6),
(226, 'Maloya', 6),
(227, 'Mbalax', 6),
(228, 'Min’yō', 6),
(229, 'Mizrahi', 6),
(230, 'Mo Lam', 6),
(231, 'Morna', 6),
(232, 'Mouth Music', 6),
(233, 'Mugham', 6),
(234, 'Népzene', 6),
(235, 'Nhạc Vàng', 6),
(236, 'Nordic', 6),
(237, 'Ottoman Classical', 6),
(238, 'Overtone Singing', 6),
(239, 'Pacific', 6),
(240, 'Pasodoble', 6),
(241, 'Persian Classical', 6),
(242, 'Philippine Classical', 6),
(243, 'Phleng Phuea Chiwit', 6),
(244, 'Piobaireachd', 6),
(245, 'Polka', 6),
(246, 'Progressive Bluegrass', 6),
(247, 'Qawwali', 6),
(248, 'Raï', 6),
(249, 'Rebetiko', 6),
(250, 'Romani', 6),
(251, 'Rune Singing', 6),
(252, 'Salegy', 6),
(253, 'Sámi Music', 6),
(254, 'Sea Shanties', 6),
(255, 'Séga', 6),
(256, 'Sephardic', 6),
(257, 'Soukous', 6),
(258, 'Taarab', 6),
(259, 'Tamil Film Music', 6),
(260, 'Thai Classical', 6),
(261, 'Volksmusik', 6),
(262, 'Waiata', 6),
(263, 'Western Swing', 6),
(264, 'Yemenite Jewish', 6),
(265, 'Zamba', 6),
(266, 'Zemer Ivri', 6),
(267, 'Zouk', 6),
(269, 'Bayou Funk', 7),
(270, 'Boogie', 7),
(271, 'Contemporary R&B', 7),
(272, 'Free Funk', 7),
(273, 'Funk', 7),
(274, 'Gogo', 7),
(275, 'Gospel', 7),
(276, 'Minneapolis Sound', 7),
(277, 'Neo Soul', 7),
(278, 'New Jack Swing', 7),
(279, 'P.Funk', 7),
(280, 'Psychedelic', 7),
(281, 'Rhythm & Blues', 7),
(282, 'Soul', 7),
(283, 'Swingbeat', 7),
(284, 'UK Street Soul', 7),
(285, 'Bass Music', 8),
(286, 'Beatbox', 8),
(287, 'Bongo Flava', 8),
(288, 'Boom Bap', 8),
(289, 'Bounce', 8),
(290, 'Britcore', 8),
(291, 'Cloud Rap', 8),
(292, 'Conscious', 8),
(293, 'Crunk', 8),
(294, 'Cut-up/DJ', 8),
(295, 'DJ Battle Tool', 8),
(296, 'Favela Funk', 8),
(297, 'G-Funk', 8),
(298, 'Gangsta', 8),
(299, 'Go-Go', 8),
(300, 'Hardcore Hip-Hop', 8),
(301, 'Hiplife', 8),
(302, 'Horrorcore', 8),
(303, 'Hyphy', 8),
(304, 'Instrumental', 8),
(305, 'Jazzy Hip-Hop', 8),
(306, 'Kwaito', 8),
(307, 'Miami Bass', 8),
(308, 'Motswako', 8),
(309, 'Phonk', 8),
(310, 'Pop Rap', 8),
(311, 'Ragga HipHop', 8),
(312, 'RnB/Swing', 8),
(313, 'Screw', 8),
(314, 'Spaza', 8),
(315, 'Thug Rap', 8),
(316, 'Trap', 8),
(317, 'Turntablism', 8),
(318, 'Afro-Cuban Jazz', 9),
(319, 'Afrobeat', 9),
(320, 'Avant-garde Jazz', 9),
(321, 'Big Band', 9),
(322, 'Bop', 9),
(323, 'Bossa Nova', 9),
(324, 'Cape Jazz', 9),
(325, 'Contemporary Jazz', 9),
(326, 'Cool Jazz', 9),
(327, 'Dark Jazz', 9),
(328, 'Dixieland', 9),
(329, 'Easy Listening', 9),
(330, 'Free Improvisation', 9),
(331, 'Free Jazz', 9),
(332, 'Fusion', 9),
(333, 'Gypsy Jazz', 9),
(334, 'Hard Bop', 9),
(335, 'Jazz-Funk', 9),
(336, 'Jazz-Rock', 9),
(337, 'Latin Jazz', 9),
(338, 'Modal', 9),
(339, 'Post Bop', 9),
(340, 'Ragtime', 9),
(341, 'Smooth Jazz', 9),
(342, 'Soul-Jazz', 9),
(343, 'Space-Age', 9),
(344, 'Stride', 9),
(345, 'Swing', 9),
(346, 'Afro-Cuban', 10),
(347, 'Aguinaldo', 10),
(348, 'Axé', 10),
(349, 'Bachata', 10),
(350, 'Baião', 10),
(351, 'Bambuco', 10),
(352, 'Batucada', 10),
(353, 'Beguine', 10),
(354, 'Bolero', 10),
(355, 'Bomba', 10),
(356, 'Boogaloo', 10),
(357, 'Bossanova', 10),
(358, 'Candombe', 10),
(359, 'Carimbó', 10),
(360, 'Cha-Cha', 10),
(361, 'Champeta', 10),
(362, 'Charanga', 10),
(363, 'Choro', 10),
(364, 'Compas', 10),
(365, 'Conjunto', 10),
(366, 'Corrido', 10),
(367, 'Cuatro', 10),
(368, 'Cubano', 10),
(369, 'Cumbia', 10),
(370, 'Danzon', 10),
(371, 'Descarga', 10),
(372, 'Forró', 10),
(373, 'Gaita', 10),
(374, 'Guaguancó', 10),
(375, 'Guajira', 10),
(376, 'Guaracha', 10),
(377, 'Jibaro', 10),
(378, 'Joropo', 10),
(379, 'Lambada', 10),
(380, 'Mambo', 10),
(381, 'Marcha Carnavalesca', 10),
(382, 'Mariachi', 10),
(383, 'Marimba', 10),
(384, 'Merengue', 10),
(385, 'MPB', 10),
(386, 'Musette', 10),
(387, 'Música Criolla', 10),
(388, 'Norteño', 10),
(389, 'Nueva Cancion', 10),
(390, 'Nueva Trova', 10),
(391, 'Occitan', 10),
(392, 'Pachanga', 10),
(393, 'Plena', 10),
(394, 'Porro', 10),
(395, 'Quechua', 10),
(396, 'Ranchera', 10),
(397, 'Reggaeton', 10),
(398, 'Rumba', 10),
(399, 'Salsa', 10),
(400, 'Samba', 10),
(401, 'Samba-Canção', 10),
(402, 'Seresta', 10),
(403, 'Son', 10),
(404, 'Son Montuno', 10),
(405, 'Sonero', 10),
(406, 'Tango', 10),
(407, 'Tejano', 10),
(408, 'Timba', 10),
(409, 'Trova', 10),
(410, 'Vallenato', 10),
(411, 'Audiobook', 11),
(412, 'Comedy', 11),
(413, 'Dialogue', 11),
(414, 'Education', 11),
(415, 'Erotic', 11),
(416, 'Field Recording', 11),
(417, 'Health-Fitness', 11),
(418, 'Interview', 11),
(419, 'Monolog', 11),
(420, 'Movie Effects', 11),
(421, 'Poetry', 11),
(422, 'Political', 11),
(423, 'Promotional', 11),
(424, 'Public Broadcast', 11),
(425, 'Public Service Announcement', 11),
(426, 'Radioplay', 11),
(427, 'Religious', 11),
(428, 'Sermon', 11),
(429, 'Sound Art', 11),
(430, 'Sound Poetry', 11),
(431, 'Special Effects', 11),
(432, 'Speech', 11),
(433, 'Spoken Word', 11),
(434, 'Technical', 11),
(435, 'Therapy', 11),
(436, 'Ballad', 12),
(437, 'Barbershop', 12),
(438, 'Bollywood', 12),
(439, 'Break-In', 12),
(440, 'Bubblegum', 12),
(441, 'Cantopop', 12),
(442, 'Chanson', 12),
(443, 'City Pop', 12),
(444, 'Enka', 12),
(445, 'Ethno-pop', 12),
(446, 'Europop', 12),
(447, 'Hokkien Pop', 12),
(448, 'Indie Pop', 12),
(449, 'Indo-Pop', 12),
(450, 'J-pop', 12),
(451, 'K-pop', 12),
(452, 'Karaoke', 12),
(453, 'Kayōkyoku', 12),
(454, 'Levenslied', 12),
(455, 'Light Music', 12),
(456, 'Mandopop', 12),
(457, 'Music Hall', 12),
(458, 'Néo Kyma', 12),
(459, 'Novelty', 12),
(460, 'Ryūkōka', 12),
(461, 'Schlager', 12),
(462, 'Villancicos', 12),
(463, 'Vocal', 12),
(464, 'Azonto', 13),
(465, 'Bubbling', 13),
(466, 'Calypso', 13),
(467, 'Dancehall', 13),
(468, 'Dub Poetry', 13),
(469, 'Junkanoo', 13),
(470, 'Lovers Rock', 13),
(471, 'Mento', 13),
(472, 'Ragga', 13),
(473, 'Rapso', 13),
(474, 'Reggae', 13),
(475, 'Reggae Gospel', 13),
(476, 'Reggae-Pop', 13),
(477, 'Rocksteady', 13),
(478, 'Roots Reggae', 13),
(479, 'Soca', 13),
(480, 'Steel Band', 13),
(481, 'Acid Rock', 16),
(482, 'Acoustic', 16),
(483, 'Alternative Rock', 16),
(484, 'AOR', 16),
(485, 'Arena Rock', 16),
(486, 'Art Rock', 16),
(487, 'Atmospheric Black Metal', 16),
(488, 'Avantgarde', 16),
(489, 'Beat', 16),
(490, 'Black Metal', 16),
(491, 'Blues Rock', 16),
(492, 'Brit Pop', 16),
(493, 'Classic Rock', 16),
(494, 'Coldwave', 16),
(495, 'Country Rock', 16),
(496, 'Crust', 16),
(497, 'Death Metal', 16),
(498, 'Deathcore', 16),
(499, 'Deathrock', 16),
(500, 'Depressive Black Metal', 16),
(501, 'Doo Wop', 16),
(502, 'Doom Metal', 16),
(503, 'Dream Pop', 16),
(504, 'Emo', 16),
(505, 'Ethereal', 16),
(506, 'Folk Metal', 16),
(507, 'Folk Rock', 16),
(508, 'Funeral Doom Metal', 16),
(509, 'Funk Metal', 16),
(510, 'Garage Rock', 16),
(511, 'Glam', 16),
(512, 'Goregrind', 16),
(513, 'Goth Rock', 16),
(514, 'Gothic Metal', 16),
(515, 'Grindcore', 16),
(516, 'Groove Metal', 16),
(517, 'Grunge', 16),
(518, 'Hard Rock', 16),
(519, 'Heavy Metal', 16),
(520, 'Horror Rock', 16),
(521, 'Indie Rock', 16),
(522, 'Industrial Metal', 16),
(523, 'J-Rock', 16),
(524, 'Jangle Pop', 16),
(525, 'K-Rock', 16),
(526, 'Krautrock', 16),
(527, 'Lo-Fi', 16),
(528, 'Lounge', 16),
(529, 'Math Rock', 16),
(530, 'Melodic Death Metal', 16),
(531, 'Melodic Hardcore', 16),
(532, 'Metalcore', 16),
(533, 'Mod', 16),
(534, 'NDW', 16),
(535, 'New Wave', 16),
(536, 'No Wave', 16),
(537, 'Noisecore', 16),
(538, 'Nu Metal', 16),
(539, 'Oi', 16),
(540, 'Parody', 16),
(541, 'Pop Punk', 16),
(542, 'Pop Rock', 16),
(543, 'Pornogrind', 16),
(544, 'Post Rock', 16),
(545, 'Post-Hardcore', 16),
(546, 'Post-Metal', 16),
(547, 'Post-Punk', 16),
(548, 'Power Metal', 16),
(549, 'Power Pop', 16),
(550, 'Power Violence', 16),
(551, 'Prog Rock', 16),
(552, 'Progressive Metal', 16),
(553, 'Psychedelic Rock', 16),
(554, 'Psychobilly', 16),
(555, 'Pub Rock', 16),
(556, 'Punk', 16),
(557, 'Rock & Roll', 16),
(558, 'Rock Opera', 16),
(559, 'Rockabilly', 16),
(560, 'Shoegaze', 16),
(561, 'Ska', 16),
(562, 'Skiffle', 16),
(563, 'Sludge Metal', 16),
(564, 'Soft Rock', 16),
(565, 'Southern Rock', 16),
(566, 'Space Rock', 16),
(567, 'Speed Metal', 16),
(568, 'Stoner Rock', 16),
(569, 'Surf', 16),
(570, 'Swamp Pop', 16),
(571, 'Symphonic Metal', 16),
(572, 'Symphonic Rock', 16),
(573, 'Technical Death Metal', 16),
(574, 'Thrash', 16),
(575, 'Twist', 16),
(576, 'Viking Metal', 16),
(577, 'Yé-Yé', 16),
(578, 'Cabaret', 16),
(579, 'Musical', 16),
(580, 'Score', 16),
(581, 'Soundtrack', 16),
(582, 'Theme', 16),
(583, 'Vaudeville', 16),
(584, 'Video Game Music', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `asso_artist_style`
--
ALTER TABLE `asso_artist_style`
  ADD PRIMARY KEY (`asso_id`),
  ADD KEY `asso_style_id` (`asso_style_id`),
  ADD KEY `asso_artist_id` (`asso_artist_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`style_id`),
  ADD KEY `style_genre_id` (`style_genre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `asso_artist_style`
--
ALTER TABLE `asso_artist_style`
  MODIFY `asso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `style_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=585;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asso_artist_style`
--
ALTER TABLE `asso_artist_style`
  ADD CONSTRAINT `asso_artist_style_ibfk_1` FOREIGN KEY (`asso_artist_id`) REFERENCES `artists` (`artist_id`),
  ADD CONSTRAINT `asso_artist_style_ibfk_2` FOREIGN KEY (`asso_style_id`) REFERENCES `styles` (`style_id`);

--
-- Constraints for table `styles`
--
ALTER TABLE `styles`
  ADD CONSTRAINT `styles_ibfk_1` FOREIGN KEY (`style_genre_id`) REFERENCES `genres` (`genre_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
