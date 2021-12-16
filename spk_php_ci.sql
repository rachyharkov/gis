-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 04:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_php_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `alternatif_id` int(11) NOT NULL,
  `kode_alternatif` varchar(200) NOT NULL,
  `nama_alternatif` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`alternatif_id`, `kode_alternatif`, `nama_alternatif`, `password`) VALUES
(64, 'K001', 'Wolly', 'e097df4faed927c296dfec99bf237eb6fa2c6064'),
(65, 'K002', 'Rio', '5409bfd489b5dc8a9859142329c657740a6db1fa'),
(66, 'K003', 'Norman1', '0bc65b16bddcaee6a50ff10fcafe8f38edbfb2d7'),
(67, 'K004', 'Norman2', '72ca2189110d7abff3d818262bd7a3d553120a88'),
(68, 'K005', 'Norman3', 'f88d3dda465fe5d286c52055d45e56bcec55e35b'),
(69, 'K006', 'Norman4', 'b5ce7a992b6b8d5c8f2e0ae951e4cc3f4a55cf69'),
(70, 'K007', 'Norman5', '62cfc724d5e3864d43a1a25725cf56cd2f57838b'),
(71, 'K008', 'Norman6', '5c06b9d107b927bc599174ef4730b93795829005'),
(72, 'K009', 'Norman7', 'b00e9c0cbb53f467dcb1ed2bb4a59e39f2c4e126'),
(73, 'K010', 'Norman8', '33141882579257990051073cd65db41717ba5535'),
(74, 'K011', 'Norman9', '620c4ad8873bdced8c26e0e31a2d2ce46454bcdb'),
(75, 'K012', 'Norman10', '7fd9ee78d9f145d44b5cd8cc766bdfc87d2f0910'),
(76, 'K013', 'Norman11', '0f4118ab57d2b720d2f3e68a572ab0db1f0e2a1d'),
(77, 'K014', 'Norman12', 'ddab028d9ce8491a26f9118b97488032b78263aa');

--
-- Triggers `alternatif`
--
DELIMITER $$
CREATE TRIGGER `del_pembanding_alternatif` AFTER DELETE ON `alternatif` FOR EACH ROW DELETE FROM perbandingan_alternatif
    WHERE perbandingan_alternatif.alternatif1 = old.alternatif_id or perbandingan_alternatif.alternatif2 = old.alternatif_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_pv_alternatif` AFTER DELETE ON `alternatif` FOR EACH ROW DELETE FROM pv_alternatif
    WHERE pv_alternatif.alternatif_id = old.alternatif_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_rangking` AFTER DELETE ON `alternatif` FOR EACH ROW DELETE FROM ranking
    WHERE ranking.alternatif_id = old.alternatif_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `history_login`
--

CREATE TABLE `history_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `info` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `user_agent` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_login`
--

INSERT INTO `history_login` (`id`, `user_id`, `info`, `tanggal`, `user_agent`) VALUES
(1, 176, 'admin Telah melakukan login', '16/12/2021 12:51:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(2, 177, 'user Telah melakukan login', '16/12/2021 12:51:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(3, 176, 'admin Telah melakukan login', '16/12/2021 12:51:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(4, 177, 'user Telah melakukan login', '16/12/2021 16:49:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(5, 177, 'user Telah melakukan login', '16/12/2021 16:54:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(6, 176, 'admin Telah melakukan login', '16/12/2021 16:59:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(7, 176, 'admin Telah melakukan login', '16/12/2021 17:01:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(8, 177, 'user Telah melakukan login', '16/12/2021 17:02:27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(9, 176, 'admin Telah melakukan login', '16/12/2021 17:02:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(10, 176, 'admin Telah melakukan login', '16/12/2021 17:50:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(11, 176, 'admin Telah melakukan login', '16/12/2021 18:06:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(12, 176, 'admin Telah melakukan login', '16/12/2021 18:22:02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(13, 176, 'admin Telah melakukan login', '16/12/2021 19:02:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(14, 176, 'admin Telah melakukan login', '16/12/2021 19:03:24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(15, 176, 'admin Telah melakukan login', '16/12/2021 19:06:17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(16, 176, 'admin Telah melakukan login', '16/12/2021 19:07:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(17, 176, 'admin Telah melakukan login', '16/12/2021 19:20:37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36'),
(18, 176, 'admin Telah melakukan login', '16/12/2021 19:22:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `ir`
--

CREATE TABLE `ir` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ir`
--

INSERT INTO `ir` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kode_kriteria` varchar(200) NOT NULL,
  `nama_kriteria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `kode_kriteria`, `nama_kriteria`) VALUES
(31, 'K001', 'Pekerjaan'),
(32, 'K002', 'Pendidikan'),
(33, 'K003', 'Penghasilan perbulan');

--
-- Triggers `kriteria`
--
DELIMITER $$
CREATE TRIGGER `del_perbandingan_alternatif` AFTER DELETE ON `kriteria` FOR EACH ROW DELETE FROM perbandingan_alternatif
    WHERE perbandingan_alternatif.pembanding = old.kriteria_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_perbandingan_kriteria` AFTER DELETE ON `kriteria` FOR EACH ROW DELETE FROM perbandingan_kriteria
    WHERE perbandingan_kriteria.kriteria1 = old.kriteria_id or  perbandingan_kriteria.kriteria2 = old.kriteria_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_pv_alternatif2` AFTER DELETE ON `kriteria` FOR EACH ROW DELETE FROM pv_alternatif
    WHERE pv_alternatif.kriteria_id = old.kriteria_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_pv_kriteria` AFTER DELETE ON `kriteria` FOR EACH ROW DELETE FROM pv_kriteria
    WHERE pv_kriteria.kriteria_id = old.kriteria_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_alternatif`
--

CREATE TABLE `perbandingan_alternatif` (
  `perbandingan_alternatif_id` int(11) NOT NULL,
  `alternatif1` int(11) NOT NULL,
  `alternatif2` int(11) NOT NULL,
  `pembanding` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbandingan_alternatif`
--

INSERT INTO `perbandingan_alternatif` (`perbandingan_alternatif_id`, `alternatif1`, `alternatif2`, `pembanding`, `nilai`) VALUES
(765, 65, 68, 33, 3),
(801, 68, 74, 33, 1),
(800, 68, 73, 33, 1),
(570, 64, 67, 31, 2),
(612, 67, 76, 31, 1),
(630, 69, 77, 31, 1),
(675, 65, 69, 32, 1),
(732, 71, 75, 32, 1),
(840, 76, 77, 33, 1),
(839, 75, 77, 33, 1),
(702, 67, 75, 32, 1),
(764, 65, 67, 33, 1),
(799, 68, 72, 33, 1),
(838, 75, 76, 33, 1),
(798, 68, 71, 33, 1),
(731, 71, 74, 32, 1),
(674, 65, 68, 32, 1),
(611, 67, 75, 31, 1),
(837, 74, 77, 33, 3),
(836, 74, 76, 33, 1),
(797, 68, 70, 33, 1),
(796, 68, 69, 33, 1),
(763, 65, 66, 33, 3),
(701, 67, 74, 32, 1),
(651, 73, 76, 31, 1),
(795, 67, 77, 33, 1),
(730, 71, 73, 32, 1),
(673, 65, 67, 32, 1),
(610, 67, 74, 31, 1),
(576, 64, 73, 31, 1),
(835, 74, 75, 33, 1),
(762, 64, 77, 33, 1),
(729, 71, 72, 32, 1),
(672, 65, 66, 32, 1),
(609, 67, 73, 31, 1),
(834, 73, 77, 33, 1),
(833, 73, 76, 33, 1),
(794, 67, 76, 33, 1),
(761, 64, 76, 33, 3),
(728, 70, 77, 32, 3),
(650, 73, 75, 31, 1),
(793, 67, 75, 33, 1),
(727, 70, 76, 32, 2),
(671, 64, 77, 32, 1),
(629, 69, 76, 31, 1),
(575, 64, 72, 31, 1),
(832, 73, 75, 33, 4),
(760, 64, 75, 33, 1),
(726, 70, 75, 32, 1),
(670, 64, 76, 32, 1),
(608, 67, 72, 31, 1),
(831, 73, 74, 33, 1),
(792, 67, 74, 33, 1),
(759, 64, 74, 33, 3),
(725, 70, 74, 32, 1),
(669, 64, 75, 32, 1),
(791, 67, 73, 33, 1),
(724, 70, 73, 32, 1),
(668, 64, 74, 32, 1),
(628, 69, 75, 31, 1),
(585, 65, 70, 31, 1),
(830, 72, 77, 33, 1),
(758, 64, 73, 33, 1),
(723, 70, 72, 32, 1),
(667, 64, 73, 32, 1),
(607, 67, 71, 31, 1),
(790, 67, 72, 33, 1),
(757, 64, 72, 33, 3),
(722, 70, 71, 32, 1),
(666, 64, 72, 32, 1),
(829, 72, 76, 33, 1),
(756, 64, 71, 33, 1),
(665, 64, 71, 32, 1),
(627, 69, 74, 31, 1),
(584, 65, 69, 31, 1),
(828, 72, 75, 33, 1),
(789, 67, 71, 33, 1),
(721, 69, 77, 32, 1),
(664, 64, 70, 32, 1),
(626, 69, 73, 31, 1),
(755, 64, 70, 33, 1),
(720, 69, 76, 32, 1),
(663, 64, 69, 32, 2),
(827, 72, 74, 33, 1),
(754, 64, 69, 33, 1),
(700, 67, 73, 32, 2),
(625, 69, 72, 31, 1),
(583, 65, 68, 31, 2),
(826, 72, 73, 33, 1),
(788, 67, 70, 33, 1),
(719, 69, 75, 32, 1),
(662, 64, 68, 32, 2),
(624, 69, 71, 31, 1),
(718, 69, 74, 32, 1),
(699, 67, 72, 32, 2),
(825, 71, 77, 33, 1),
(753, 64, 68, 33, 1),
(698, 67, 71, 32, 1),
(623, 69, 70, 31, 1),
(597, 66, 71, 31, 1),
(824, 71, 76, 33, 1),
(787, 67, 69, 33, 1),
(717, 69, 73, 32, 1),
(661, 64, 67, 32, 2),
(622, 68, 77, 31, 1),
(697, 67, 70, 32, 1),
(823, 71, 75, 33, 3),
(752, 64, 67, 33, 2),
(696, 67, 69, 32, 1),
(649, 73, 74, 31, 1),
(596, 66, 70, 31, 1),
(822, 71, 74, 33, 1),
(786, 67, 68, 33, 1),
(716, 69, 72, 32, 1),
(695, 67, 68, 32, 1),
(621, 68, 76, 31, 1),
(821, 71, 73, 33, 1),
(751, 64, 66, 33, 2),
(694, 66, 77, 32, 1),
(648, 72, 77, 31, 1),
(595, 66, 69, 31, 1),
(820, 71, 72, 33, 2),
(785, 66, 77, 33, 1),
(715, 69, 71, 32, 1),
(693, 66, 76, 32, 1),
(620, 68, 75, 31, 1),
(784, 66, 76, 33, 1),
(692, 66, 75, 32, 2),
(647, 72, 76, 31, 1),
(594, 66, 68, 31, 1),
(819, 70, 77, 33, 1),
(783, 66, 75, 33, 4),
(750, 64, 65, 33, 1),
(691, 66, 74, 32, 2),
(619, 68, 74, 31, 1),
(714, 69, 70, 32, 1),
(646, 72, 75, 31, 1),
(606, 67, 70, 31, 1),
(818, 70, 76, 33, 1),
(782, 66, 74, 33, 3),
(749, 76, 77, 32, 1),
(690, 66, 73, 32, 1),
(645, 72, 74, 31, 1),
(644, 72, 73, 31, 1),
(605, 67, 69, 31, 1),
(817, 70, 75, 33, 1),
(781, 66, 73, 33, 5),
(748, 75, 77, 32, 3),
(689, 66, 72, 32, 2),
(643, 71, 77, 31, 1),
(604, 67, 68, 31, 1),
(816, 70, 74, 33, 1),
(780, 66, 72, 33, 1),
(747, 75, 76, 32, 1),
(688, 66, 71, 32, 2),
(642, 71, 76, 31, 1),
(815, 70, 73, 33, 1),
(779, 66, 71, 33, 1),
(746, 74, 77, 32, 1),
(687, 66, 70, 32, 2),
(641, 71, 75, 31, 1),
(778, 66, 70, 33, 1),
(745, 74, 76, 32, 4),
(686, 66, 69, 32, 4),
(640, 71, 74, 31, 1),
(744, 74, 75, 32, 1),
(685, 66, 68, 32, 4),
(639, 71, 73, 31, 1),
(713, 68, 77, 32, 1),
(638, 71, 72, 31, 1),
(660, 64, 66, 32, 2),
(603, 66, 77, 31, 1),
(593, 66, 67, 31, 1),
(592, 65, 77, 31, 1),
(591, 65, 76, 31, 1),
(590, 65, 75, 31, 1),
(582, 65, 67, 31, 2),
(581, 65, 66, 31, 2),
(580, 64, 77, 31, 1),
(574, 64, 71, 31, 3),
(573, 64, 70, 31, 3),
(569, 64, 66, 31, 2),
(814, 70, 72, 33, 1),
(813, 70, 71, 33, 1),
(812, 69, 77, 33, 1),
(811, 69, 76, 33, 1),
(810, 69, 75, 33, 3),
(809, 69, 74, 33, 2),
(808, 69, 73, 33, 1),
(807, 69, 72, 33, 1),
(806, 69, 71, 33, 3),
(805, 69, 70, 33, 1),
(804, 68, 77, 33, 1),
(803, 68, 76, 33, 1),
(802, 68, 75, 33, 1),
(777, 66, 69, 33, 1),
(776, 66, 68, 33, 4),
(775, 66, 67, 33, 6),
(774, 65, 77, 33, 1),
(773, 65, 76, 33, 1),
(772, 65, 75, 33, 1),
(771, 65, 74, 33, 5),
(770, 65, 73, 33, 1),
(769, 65, 72, 33, 1),
(768, 65, 71, 33, 1),
(767, 65, 70, 33, 1),
(766, 65, 69, 33, 1),
(743, 73, 77, 32, 1),
(742, 73, 76, 32, 1),
(741, 73, 75, 32, 1),
(740, 73, 74, 32, 1),
(739, 72, 77, 32, 1),
(738, 72, 76, 32, 1),
(737, 72, 75, 32, 1),
(736, 72, 74, 32, 1),
(735, 72, 73, 32, 4),
(734, 71, 77, 32, 1),
(733, 71, 76, 32, 1),
(712, 68, 76, 32, 1),
(711, 68, 75, 32, 1),
(710, 68, 74, 32, 1),
(709, 68, 73, 32, 1),
(708, 68, 72, 32, 1),
(707, 68, 71, 32, 2),
(706, 68, 70, 32, 1),
(705, 68, 69, 32, 2),
(704, 67, 77, 32, 1),
(703, 67, 76, 32, 1),
(684, 66, 67, 32, 4),
(683, 65, 77, 32, 4),
(682, 65, 76, 32, 4),
(681, 65, 75, 32, 4),
(680, 65, 74, 32, 1),
(679, 65, 73, 32, 1),
(678, 65, 72, 32, 1),
(677, 65, 71, 32, 1),
(676, 65, 70, 32, 1),
(659, 64, 65, 32, 2),
(658, 76, 77, 31, 1),
(657, 75, 77, 31, 1),
(656, 75, 76, 31, 1),
(655, 74, 77, 31, 1),
(654, 74, 76, 31, 1),
(653, 74, 75, 31, 1),
(652, 73, 77, 31, 1),
(637, 70, 77, 31, 1),
(636, 70, 76, 31, 1),
(635, 70, 75, 31, 1),
(634, 70, 74, 31, 1),
(633, 70, 73, 31, 1),
(632, 70, 72, 31, 1),
(631, 70, 71, 31, 1),
(618, 68, 73, 31, 1),
(617, 68, 72, 31, 1),
(616, 68, 71, 31, 1),
(615, 68, 70, 31, 1),
(614, 68, 69, 31, 1),
(613, 67, 77, 31, 1),
(602, 66, 76, 31, 1),
(601, 66, 75, 31, 1),
(600, 66, 74, 31, 1),
(599, 66, 73, 31, 1),
(598, 66, 72, 31, 1),
(589, 65, 74, 31, 1),
(588, 65, 73, 31, 1),
(587, 65, 72, 31, 1),
(586, 65, 71, 31, 1),
(579, 64, 76, 31, 3),
(578, 64, 75, 31, 3),
(577, 64, 74, 31, 1),
(572, 64, 69, 31, 2),
(571, 64, 68, 31, 2),
(568, 64, 65, 31, 2);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `perbandingan_kriteria_id` int(11) NOT NULL,
  `kriteria1` int(11) NOT NULL,
  `kriteria2` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`perbandingan_kriteria_id`, `kriteria1`, `kriteria2`, `nilai`) VALUES
(86, 31, 32, 2),
(88, 32, 33, 1),
(87, 31, 33, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pv_alternatif`
--

CREATE TABLE `pv_alternatif` (
  `pv_alternatif_id` int(11) NOT NULL,
  `alternatif_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pv_alternatif`
--

INSERT INTO `pv_alternatif` (`pv_alternatif_id`, `alternatif_id`, `kriteria_id`, `nilai`) VALUES
(226, 77, 33, 0.0623565),
(211, 76, 32, 0.054618),
(187, 66, 31, 0.0631087),
(199, 64, 32, 0.0898945),
(190, 69, 31, 0.0657542),
(220, 71, 33, 0.0707288),
(202, 67, 32, 0.0654809),
(214, 65, 33, 0.0956232),
(193, 72, 31, 0.0697973),
(196, 75, 31, 0.0644065),
(223, 74, 33, 0.0577299),
(205, 70, 32, 0.0718806),
(225, 76, 33, 0.0601597),
(217, 68, 33, 0.0564174),
(208, 73, 32, 0.0595471),
(222, 73, 33, 0.0690882),
(219, 70, 33, 0.0644887),
(216, 67, 33, 0.0567325),
(213, 64, 33, 0.0971999),
(210, 75, 32, 0.0642776),
(207, 72, 32, 0.0714804),
(204, 69, 32, 0.0547279),
(201, 66, 32, 0.121989),
(198, 77, 31, 0.0697973),
(195, 74, 31, 0.0697973),
(192, 71, 31, 0.0644065),
(189, 68, 31, 0.0631087),
(186, 65, 31, 0.0791471),
(224, 75, 33, 0.0502005),
(221, 72, 33, 0.057752),
(218, 69, 33, 0.0832702),
(215, 66, 33, 0.118253),
(212, 77, 32, 0.0547696),
(209, 74, 32, 0.0718806),
(206, 71, 32, 0.0595757),
(203, 68, 32, 0.0650525),
(200, 65, 32, 0.0948261),
(197, 76, 31, 0.0644065),
(194, 73, 31, 0.0697973),
(191, 70, 31, 0.0644065),
(188, 67, 31, 0.0631087),
(185, 64, 31, 0.128957);

-- --------------------------------------------------------

--
-- Table structure for table `pv_kriteria`
--

CREATE TABLE `pv_kriteria` (
  `pv_kriteria_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pv_kriteria`
--

INSERT INTO `pv_kriteria` (`pv_kriteria_id`, `kriteria_id`, `nilai`) VALUES
(50, 33, 0.210606),
(49, 32, 0.240909),
(48, 31, 0.548485);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `alternatif_id` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`alternatif_id`, `nilai`) VALUES
(64, 0.112858),
(65, 0.0863943),
(66, 0.0889072),
(67, 0.0623373),
(68, 0.0621678),
(69, 0.0667868),
(70, 0.0662244),
(71, 0.0645742),
(72, 0.067666),
(73, 0.0671786),
(74, 0.0677577),
(75, 0.0613836),
(76, 0.061154),
(77, 0.0646099);

-- --------------------------------------------------------

--
-- Table structure for table `skala`
--

CREATE TABLE `skala` (
  `skala_id` int(11) NOT NULL,
  `nama_skala` varchar(200) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skala`
--

INSERT INTO `skala` (`skala_id`, `nama_skala`, `nilai`) VALUES
(12, 'Sama pentingnya (Equal Importance)', 1),
(13, 'Sama hingga sedikit lebih penting', 2),
(14, 'Sedikit lebih penting (Slightly more importance)', 3),
(15, 'Sedikit lebih hingga jelas lebih penting', 4),
(16, 'Jelas lebih penting (Materially more importance)', 5),
(17, 'Jelas hingga sangat jelas lebih penting', 6),
(18, 'Sangat jelas lebih penting (Significantly more importance)', 7),
(19, 'Sangat jelas hingga mutlak lebih penting', 8),
(20, 'Mutlak lebih penting (Absolutely more importance)', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `level`, `photo`, `email`) VALUES
(176, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ADMIN', 'File-211203-b9f7c3aebe.png', 'saepulramdan244@gmail.com'),
(177, 'user', '12dea96fec20593566ab75692c9949596833adc9', 'USER', 'File-211203-900477eb6f.png', 'ramdan_genz@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`alternatif_id`);

--
-- Indexes for table `history_login`
--
ALTER TABLE `history_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ir`
--
ALTER TABLE `ir`
  ADD PRIMARY KEY (`jumlah`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  ADD PRIMARY KEY (`perbandingan_alternatif_id`);

--
-- Indexes for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`perbandingan_kriteria_id`);

--
-- Indexes for table `pv_alternatif`
--
ALTER TABLE `pv_alternatif`
  ADD PRIMARY KEY (`pv_alternatif_id`);

--
-- Indexes for table `pv_kriteria`
--
ALTER TABLE `pv_kriteria`
  ADD PRIMARY KEY (`pv_kriteria_id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`alternatif_id`);

--
-- Indexes for table `skala`
--
ALTER TABLE `skala`
  ADD PRIMARY KEY (`skala_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `alternatif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `history_login`
--
ALTER TABLE `history_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  MODIFY `perbandingan_alternatif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=841;

--
-- AUTO_INCREMENT for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `perbandingan_kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `pv_alternatif`
--
ALTER TABLE `pv_alternatif`
  MODIFY `pv_alternatif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `pv_kriteria`
--
ALTER TABLE `pv_kriteria`
  MODIFY `pv_kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `skala`
--
ALTER TABLE `skala`
  MODIFY `skala_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
