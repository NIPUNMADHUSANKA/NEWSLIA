-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 03:57 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newslia`
--

-- --------------------------------------------------------

--
-- Table structure for table `accept_complaint`
--

CREATE TABLE `accept_complaint` (
  `Complaint_ID` char(10) NOT NULL,
  `System_Admin_ID` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `Post_ID` char(10) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Publish_Date` date NOT NULL,
  `Image` longblob NOT NULL,
  `Details` varchar(255) NOT NULL,
  `Creator_ID` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `articles_pending`
--

CREATE TABLE `articles_pending` (
  `Post_ID` char(10) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Create Date` date NOT NULL,
  `Image` longblob NOT NULL,
  `Details` varchar(255) NOT NULL,
  `Creator_ID` char(10) NOT NULL,
  `NormalUser_Can_Edit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `Complaint_ID` char(10) NOT NULL,
  `Complainer_ID` char(10) NOT NULL,
  `News_ID` char(10) NOT NULL,
  `Date` date NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Details` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `com_ads`
--

CREATE TABLE `com_ads` (
  `Post_ID` char(10) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Publish_Date` date NOT NULL,
  `Image` longblob NOT NULL,
  `Details` varchar(255) NOT NULL,
  `Creator_ID` char(10) NOT NULL,
  `Set_Date` date DEFAULT NULL,
  `Set_Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `com_ads_pending`
--

CREATE TABLE `com_ads_pending` (
  `Post_ID` char(10) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Create_Date` date NOT NULL,
  `Image` longblob NOT NULL,
  `Details` varchar(255) NOT NULL,
  `Creator_ID` char(10) NOT NULL,
  `Set_Date` date DEFAULT NULL,
  `Set_Time` time DEFAULT NULL,
  `System_User_Can_Edit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deactivate`
--

CREATE TABLE `deactivate` (
  `System_Actor_ID` char(10) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dsa`
--

CREATE TABLE `dsa` (
  `Province` varchar(20) NOT NULL,
  `District` varchar(20) NOT NULL,
  `DSA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dsa`
--

INSERT INTO `dsa` (`Province`, `District`, `DSA`) VALUES
('Central', 'Kandy', 'Akurana'),
('Central', 'Kandy', 'Delthota'),
('Central', 'Kandy', 'Doluwa'),
('Central', 'Kandy', 'Gagawata Korale'),
('Central', 'Kandy', 'Ganga Ihala Korale'),
('Central', 'Kandy', 'Harispattuwa'),
('Central', 'Kandy', 'Hatharaliyadda'),
('Central', 'Kandy', 'Kundasale'),
('Central', 'Kandy', 'Medadumbara'),
('Central', 'Kandy', 'Minipe'),
('Central', 'Kandy', 'Panvila'),
('Central', 'Kandy', 'Pasbage Korale'),
('Central', 'Kandy', 'Pathadumbara'),
('Central', 'Kandy', 'Pathahewaheta'),
('Central', 'Kandy', 'Poojapitiya'),
('Central', 'Kandy', 'Thumpane'),
('Central', 'Kandy', 'Udadumbara'),
('Central', 'Kandy', 'Udapalatha'),
('Central', 'Kandy', 'Udunuwara'),
('Central', 'Kandy', 'Yatinuwara'),
('Central', 'Matale', 'Ambanganga Korale'),
('Central', 'Matale', 'Dambulla'),
('Central', 'Matale', 'Galewela'),
('Central', 'Matale', 'Laggala-Pallegama'),
('Central', 'Matale', 'Matale'),
('Central', 'Matale', 'Naula'),
('Central', 'Matale', 'Pallepola'),
('Central', 'Matale', 'Rattota'),
('Central', 'Matale', 'Ukuwela'),
('Central', 'Matale', 'Wilgamuwa'),
('Central', 'Matale', 'Yatawatta'),
('Central', 'Nuwara-Eliya', 'Ambagamuwa'),
('Central', 'Nuwara-Eliya', 'Hanguranketha'),
('Central', 'Nuwara-Eliya', 'Kothmale'),
('Central', 'Nuwara-Eliya', 'Nuwara Eliya'),
('Central', 'Nuwara-Eliya', 'Walapane'),
('Eastern', 'Ampara', 'Addalachchenai'),
('Eastern', 'Ampara', 'Akkaraipattu'),
('Eastern', 'Ampara', 'Alayadiwembu'),
('Eastern', 'Ampara', 'Ampara'),
('Eastern', 'Ampara', 'Damana'),
('Eastern', 'Ampara', 'Dehiattakandiya'),
('Eastern', 'Ampara', 'Eragama'),
('Eastern', 'Ampara', 'Kalmunai Muslim'),
('Eastern', 'Ampara', 'Kalmunai Tamil'),
('Eastern', 'Ampara', 'Karaitivu'),
('Eastern', 'Ampara', 'Lahugala'),
('Eastern', 'Ampara', 'Mahaoya'),
('Eastern', 'Ampara', 'Navithanveli'),
('Eastern', 'Ampara', 'Ninthavur'),
('Eastern', 'Ampara', 'Padiyathalawa'),
('Eastern', 'Ampara', 'Pothuvil'),
('Eastern', 'Ampara', 'Sainthamarathu'),
('Eastern', 'Ampara', 'Samanthurai'),
('Eastern', 'Ampara', 'Thirukkovil'),
('Eastern', 'Ampara', 'Uhana'),
('Eastern', 'Batticaloa', 'Eravur Pattu'),
('Eastern', 'Batticaloa', 'Eravur Town'),
('Eastern', 'Batticaloa', 'Kattankudy'),
('Eastern', 'Batticaloa', 'Koralai Pattu'),
('Eastern', 'Batticaloa', 'Koralai Pattu Central'),
('Eastern', 'Batticaloa', 'Koralai Pattu North'),
('Eastern', 'Batticaloa', 'Koralai Pattu South'),
('Eastern', 'Batticaloa', 'Koralai Pattu West'),
('Eastern', 'Batticaloa', 'Manmunai North'),
('Eastern', 'Batticaloa', 'Manmunai Pattu'),
('Eastern', 'Batticaloa', 'Manmunai S. and Eruvil Pattu'),
('Eastern', 'Batticaloa', 'Manmunai South West'),
('Eastern', 'Batticaloa', 'Manmunai West'),
('Eastern', 'Batticaloa', 'Porativu Pattu'),
('Eastern', 'Trincomalee', 'Gomarankadawala'),
('Eastern', 'Trincomalee', 'Kantalai'),
('Eastern', 'Trincomalee', 'Kinniya'),
('Eastern', 'Trincomalee', 'Kuchchaveli'),
('Eastern', 'Trincomalee', 'Morawewa'),
('Eastern', 'Trincomalee', 'Muttur'),
('Eastern', 'Trincomalee', 'Padavi Sri Pura'),
('Eastern', 'Trincomalee', 'Seruvila'),
('Eastern', 'Trincomalee', 'Thambalagamuwa'),
('Eastern', 'Trincomalee', 'Trincomalee'),
('Eastern', 'Trincomalee', 'Verugal'),
('North-Central', 'Anuradhapura', 'Galenbindunuwewa'),
('North-Central', 'Anuradhapura', 'Galnewa '),
('North-Central', 'Anuradhapura', 'Horowpothana'),
('North-Central', 'Anuradhapura', 'Ipalogama '),
('North-Central', 'Anuradhapura', 'Kahatagasdigiliya'),
('North-Central', 'Anuradhapura', 'Kebithigollewa'),
('North-Central', 'Anuradhapura', 'Kekirawa'),
('North-Central', 'Anuradhapura', 'Mahavilachchiya'),
('North-Central', 'Anuradhapura', 'Medawachchiya'),
('North-Central', 'Anuradhapura', 'Mihinthale'),
('North-Central', 'Anuradhapura', 'Nachchadoowa'),
('North-Central', 'Anuradhapura', 'Nochchiyagama'),
('North-Central', 'Anuradhapura', 'Nuwaragam Palatha Central '),
('North-Central', 'Anuradhapura', 'Nuwaragam Palatha East'),
('North-Central', 'Anuradhapura', 'Padaviya'),
('North-Central', 'Anuradhapura', 'Palagala'),
('North-Central', 'Anuradhapura', 'Palugaswewa'),
('North-Central', 'Anuradhapura', 'Rajanganaya'),
('North-Central', 'Anuradhapura', 'Rambewa'),
('North-Central', 'Anuradhapura', 'Thalawa'),
('North-Central', 'Anuradhapura', 'Thambuttegama'),
('North-Central', 'Anuradhapura', 'Thirappane'),
('North-Central', 'Polonnaruwa', 'Dimbulagala'),
('North-Central', 'Polonnaruwa', 'Elahera'),
('North-Central', 'Polonnaruwa', 'Hingurakgoda'),
('North-Central', 'Polonnaruwa', 'Lankapura'),
('North-Central', 'Polonnaruwa', 'Medirigiriya'),
('North-Central', 'Polonnaruwa', 'Thamankaduwa'),
('North-Central', 'Polonnaruwa', 'Welikanda'),
('North-Western', 'Kurunegala', 'Alawwa'),
('North-Western', 'Kurunegala', 'Ambanpola'),
('North-Western', 'Kurunegala', 'Bamunakotuwa'),
('North-Western', 'Kurunegala', 'Bingiriya'),
('North-Western', 'Kurunegala', 'Ehetuwewa'),
('North-Western', 'Kurunegala', 'Galgamuwa'),
('North-Western', 'Kurunegala', 'Ganewatta'),
('North-Western', 'Kurunegala', 'Giribawa'),
('North-Western', 'Kurunegala', 'Ibbagamuwa'),
('North-Western', 'Kurunegala', 'Katupotha'),
('North-Western', 'Kurunegala', 'Kobeigane'),
('North-Western', 'Kurunegala', 'Kotavehera'),
('North-Western', 'Kurunegala', 'Kuliyapitiya East'),
('North-Western', 'Kurunegala', 'Kuliyapitiya West'),
('North-Western', 'Kurunegala', 'Kurunegala'),
('North-Western', 'Kurunegala', 'Mahawa'),
('North-Western', 'Kurunegala', 'Mallawapitiya'),
('North-Western', 'Kurunegala', 'Maspotha'),
('North-Western', 'Kurunegala', 'Mawathagama'),
('North-Western', 'Kurunegala', 'Narammala'),
('North-Western', 'Kurunegala', 'Nikaweratiya'),
('North-Western', 'Kurunegala', 'Panduwasnuwara'),
('North-Western', 'Kurunegala', 'Pannala'),
('North-Western', 'Kurunegala', 'Polgahawela'),
('North-Western', 'Kurunegala', 'Polpithigama'),
('North-Western', 'Kurunegala', 'Rasnayakapura'),
('North-Western', 'Kurunegala', 'Rideegama'),
('North-Western', 'Kurunegala', 'Udubaddawa'),
('North-Western', 'Kurunegala', 'Wariyapola'),
('North-Western', 'Kurunegala', 'Weerambugedara'),
('North-Western', 'Puttalam', 'Anamaduwa'),
('North-Western', 'Puttalam', 'Arachchikattuwa'),
('North-Western', 'Puttalam', 'Chilaw'),
('North-Western', 'Puttalam', 'Dankotuwa'),
('North-Western', 'Puttalam', 'Kalpitiya'),
('North-Western', 'Puttalam', 'Karuwalagaswewa'),
('North-Western', 'Puttalam', 'Madampe'),
('North-Western', 'Puttalam', 'Mahakumbukkadawala'),
('North-Western', 'Puttalam', 'Mahawewa'),
('North-Western', 'Puttalam', 'Mundalama'),
('North-Western', 'Puttalam', 'Nattandiya'),
('North-Western', 'Puttalam', 'Nawagattegama'),
('North-Western', 'Puttalam', 'Pallama'),
('North-Western', 'Puttalam', 'Puttalam'),
('North-Western', 'Puttalam', 'Vanathavilluwa'),
('North-Western', 'Puttalam', 'Wennappuwa'),
('Northern', 'Jaffna', 'Delft'),
('Northern', 'Jaffna', 'Island North'),
('Northern', 'Jaffna', 'Island South'),
('Northern', 'Jaffna', 'Jaffna'),
('Northern', 'Jaffna', 'Karainagar'),
('Northern', 'Jaffna', 'Nallur'),
('Northern', 'Jaffna', 'Thenmaradchi'),
('Northern', 'Jaffna', 'Vadamaradchi East'),
('Northern', 'Jaffna', 'Vadamaradchi North'),
('Northern', 'Jaffna', 'Vadamaradchi South-West'),
('Northern', 'Jaffna', 'Valikamam East'),
('Northern', 'Jaffna', 'Valikamam North'),
('Northern', 'Jaffna', 'Valikamam South'),
('Northern', 'Jaffna', 'Valikamam South-West'),
('Northern', 'Jaffna', 'Valikamam West'),
('Northern', 'Kilinochchi', 'Kandavalai'),
('Northern', 'Kilinochchi', 'Karachchi'),
('Northern', 'Kilinochchi', 'Pachchilaipalli'),
('Northern', 'Kilinochchi', 'Poonakary'),
('Northern', 'Mannar', 'Madhu'),
('Northern', 'Mannar', 'Mannar'),
('Northern', 'Mannar', 'Manthai West'),
('Northern', 'Mannar', 'Musalai'),
('Northern', 'Mannar', 'Nanaddan'),
('Northern', 'Mullaitivu', 'Manthai East'),
('Northern', 'Mullaitivu', 'Maritimepattu'),
('Northern', 'Mullaitivu', 'Oddusuddan'),
('Northern', 'Mullaitivu', 'Puthukudiyiruppu'),
('Northern', 'Mullaitivu', 'Thunukkai'),
('Northern', 'Mullaitivu', 'Welioya'),
('Northern', 'Vavuniya', 'Vavuniya'),
('Northern', 'Vavuniya', 'Vavuniya North'),
('Northern', 'Vavuniya', 'Vavuniya South'),
('Northern', 'Vavuniya', 'Vengalacheddikulam'),
('Sabaragamuwa', 'Kegalle', 'Aranayaka'),
('Sabaragamuwa', 'Kegalle', 'Bulathkohupitiya'),
('Sabaragamuwa', 'Kegalle', 'Dehiovita'),
('Sabaragamuwa', 'Kegalle', 'Deraniyagala'),
('Sabaragamuwa', 'Kegalle', 'Galigamuwa'),
('Sabaragamuwa', 'Kegalle', 'Kegalle'),
('Sabaragamuwa', 'Kegalle', 'Mawanella'),
('Sabaragamuwa', 'Kegalle', 'Rambukkana'),
('Sabaragamuwa', 'Kegalle', 'Ruwanwella'),
('Sabaragamuwa', 'Kegalle', 'Warakapola'),
('Sabaragamuwa', 'Kegalle', 'Yatiyanthota'),
('Sabaragamuwa', 'Ratnapura', 'Ayagama'),
('Sabaragamuwa', 'Ratnapura', 'Balangoda'),
('Sabaragamuwa', 'Ratnapura', 'Eheliyagoda'),
('Sabaragamuwa', 'Ratnapura', 'Elapattha'),
('Sabaragamuwa', 'Ratnapura', 'Embilipitiya'),
('Sabaragamuwa', 'Ratnapura', 'Godakawela'),
('Sabaragamuwa', 'Ratnapura', 'Imbulpe'),
('Sabaragamuwa', 'Ratnapura', 'Kahawatta'),
('Sabaragamuwa', 'Ratnapura', 'Kalawana'),
('Sabaragamuwa', 'Ratnapura', 'Kiriella'),
('Sabaragamuwa', 'Ratnapura', 'Kolonna'),
('Sabaragamuwa', 'Ratnapura', 'Kuruvita'),
('Sabaragamuwa', 'Ratnapura', 'Nivithigala'),
('Sabaragamuwa', 'Ratnapura', 'Opanayaka'),
('Sabaragamuwa', 'Ratnapura', 'Pelmadulla'),
('Sabaragamuwa', 'Ratnapura', 'Ratnapura'),
('Sabaragamuwa', 'Ratnapura', 'Weligepola'),
('Southern', 'Galle', 'Akmeemana'),
('Southern', 'Galle', 'Ambalangoda'),
('Southern', 'Galle', 'Baddegama'),
('Southern', 'Galle', 'Balapitiya'),
('Southern', 'Galle', 'Benthota'),
('Southern', 'Galle', 'Bope-Poddala'),
('Southern', 'Galle', 'Elpitiya'),
('Southern', 'Galle', 'Galle'),
('Southern', 'Galle', 'Gonapinuwala'),
('Southern', 'Galle', 'Habaraduwa'),
('Southern', 'Galle', 'Hikkaduwa'),
('Southern', 'Galle', 'Imaduwa'),
('Southern', 'Galle', 'Karandeniya'),
('Southern', 'Galle', 'Nagoda'),
('Southern', 'Galle', 'Neluwa'),
('Southern', 'Galle', 'Niyagama'),
('Southern', 'Galle', 'Thawalama'),
('Southern', 'Galle', 'Welivitiya-Divithura'),
('Southern', 'Galle', 'Yakkalamulla'),
('Southern', 'Hambantota', 'Ambalantota'),
('Southern', 'Hambantota', 'Angunakolapelessa'),
('Southern', 'Hambantota', 'Beliatta'),
('Southern', 'Hambantota', 'Hambantota'),
('Southern', 'Hambantota', 'Katuwana'),
('Southern', 'Hambantota', 'Lunugamvehera'),
('Southern', 'Hambantota', 'Okewela'),
('Southern', 'Hambantota', 'Sooriyawewa'),
('Southern', 'Hambantota', 'Tangalle'),
('Southern', 'Hambantota', 'Thissamaharama'),
('Southern', 'Hambantota', 'Walasmulla'),
('Southern', 'Hambantota', 'Weeraketiya'),
('Southern', 'Matara', 'Akuressa'),
('Southern', 'Matara', 'Athuraliya'),
('Southern', 'Matara', 'Devinuwara'),
('Southern', 'Matara', 'Dickwella'),
('Southern', 'Matara', 'Hakmana'),
('Southern', 'Matara', 'Kamburupitiya'),
('Southern', 'Matara', 'Kirinda Puhulwella'),
('Southern', 'Matara', 'Kotapola'),
('Southern', 'Matara', 'Malimbada'),
('Southern', 'Matara', 'Matara'),
('Southern', 'Matara', 'Mulatiyana'),
('Southern', 'Matara', 'Pasgoda'),
('Southern', 'Matara', 'Pitabeddara'),
('Southern', 'Matara', 'Thihagoda'),
('Southern', 'Matara', 'Weligama'),
('Southern', 'Matara', 'Welipitiya'),
('Uva', 'Badulla', 'Badulla'),
('Uva', 'Badulla', 'Bandarawela'),
('Uva', 'Badulla', 'Ella'),
('Uva', 'Badulla', 'Haldummulla'),
('Uva', 'Badulla', 'Hali-Ela'),
('Uva', 'Badulla', 'Haputale'),
('Uva', 'Badulla', 'Kandaketiya'),
('Uva', 'Badulla', 'Lunugala'),
('Uva', 'Badulla', 'Mahiyanganaya'),
('Uva', 'Badulla', 'Meegahakivula'),
('Uva', 'Badulla', 'Passara'),
('Uva', 'Badulla', 'Rideemaliyadda'),
('Uva', 'Badulla', 'Soranathota'),
('Uva', 'Badulla', 'Uva-Paranagama'),
('Uva', 'Badulla', 'Welimada'),
('Uva', 'Moneragala', 'Badalkumbura'),
('Uva', 'Moneragala', 'Bibile'),
('Uva', 'Moneragala', 'Buttala'),
('Uva', 'Moneragala', 'Katharagama'),
('Uva', 'Moneragala', 'Madulla'),
('Uva', 'Moneragala', 'Medagama'),
('Uva', 'Moneragala', 'Moneragala'),
('Uva', 'Moneragala', 'Sevanagala'),
('Uva', 'Moneragala', 'Siyambalanduwa'),
('Uva', 'Moneragala', 'Thanamalvila'),
('Uva', 'Moneragala', 'Wellawaya'),
('Western', 'Colombo', 'Avissawella'),
('Western', 'Colombo', 'Colombo'),
('Western', 'Colombo', 'Dehiwala'),
('Western', 'Colombo', 'Homagama'),
('Western', 'Colombo', 'Kaduwela'),
('Western', 'Colombo', 'Kesbewa'),
('Western', 'Colombo', 'Kolonnawa'),
('Western', 'Colombo', 'Kotte'),
('Western', 'Colombo', 'Maharagama'),
('Western', 'Colombo', 'Moratuwa'),
('Western', 'Colombo', 'Padukka '),
('Western', 'Colombo', 'Ratmalana'),
('Western', 'Colombo', 'Thimbirigasyaya '),
('Western', 'Gampaha', 'Attanagalla'),
('Western', 'Gampaha', 'Biyagama'),
('Western', 'Gampaha', 'Divulapitiya'),
('Western', 'Gampaha', 'Dompe'),
('Western', 'Gampaha', 'Gampaha'),
('Western', 'Gampaha', 'Ja-Ela'),
('Western', 'Gampaha', 'Katana'),
('Western', 'Gampaha', 'Kelaniya'),
('Western', 'Gampaha', 'Mahara'),
('Western', 'Gampaha', 'Minuwangoda'),
('Western', 'Gampaha', 'Mirigama'),
('Western', 'Gampaha', 'Negombo'),
('Western', 'Gampaha', 'Wattala'),
('Western', 'Kalutara', 'Agalawatta'),
('Western', 'Kalutara', 'Bandaragama'),
('Western', 'Kalutara', 'Beruwala'),
('Western', 'Kalutara', 'Bulathsinhala'),
('Western', 'Kalutara', 'Dodangoda'),
('Western', 'Kalutara', 'Horana'),
('Western', 'Kalutara', 'Ingiriya'),
('Western', 'Kalutara', 'Kalutara'),
('Western', 'Kalutara', 'Madurawela'),
('Western', 'Kalutara', 'Mathugama'),
('Western', 'Kalutara', 'Millaniya'),
('Western', 'Kalutara', 'Palindanuwara'),
('Western', 'Kalutara', 'Panadura'),
('Western', 'Kalutara', 'Walallavita');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `evt_id` bigint(11) NOT NULL,
  `evt_start` date NOT NULL,
  `evt_end` date NOT NULL,
  `evt_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hidden`
--

CREATE TABLE `hidden` (
  `Post_ID` char(10) NOT NULL,
  `System_Actor_ID` char(10) NOT NULL,
  `Post Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `important_number`
--

CREATE TABLE `important_number` (
  `Contact_ID` char(10) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Area` varchar(30) NOT NULL,
  `Image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `important_number_list`
--

CREATE TABLE `important_number_list` (
  `Contact_ID` char(10) NOT NULL,
  `Number` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancies`
--

CREATE TABLE `job_vacancies` (
  `Post_ID` char(10) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Publish_Date` date NOT NULL,
  `Deadline_Date` date NOT NULL,
  `Image` longblob NOT NULL,
  `Details` varchar(255) NOT NULL,
  `Creator_ID` char(10) NOT NULL,
  `Set_Date` date DEFAULT NULL,
  `Set_Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancies_pending`
--

CREATE TABLE `job_vacancies_pending` (
  `Post_ID` char(10) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Create_Date` date NOT NULL,
  `Deadline_Date` date NOT NULL,
  `Image` longblob NOT NULL,
  `Details` varchar(255) NOT NULL,
  `Creator_ID` char(10) NOT NULL,
  `Set_Date` date DEFAULT NULL,
  `Set_Time` time DEFAULT NULL,
  `System_User_Can_Edit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Email` varchar(255) NOT NULL,
  `System_Actor_ID` char(10) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Deactivate` tinyint(1) NOT NULL,
  `Blacklist` tinyint(1) NOT NULL,
  `Staff_State` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Email`, `System_Actor_ID`, `Password`, `Deactivate`, `Blacklist`, `Staff_State`) VALUES
('kasunchamara8089@gmail.com', 'NL-M-6', 'dd997bcc9e5c3b0bef5d03d8f30d501f', 0, 0, 1),
('km@gmail.com', 'NL-M-3', 'b9452ddbfe6da829232f1107cce9ebbf', 0, 0, 1),
('nipunmadhusan865@gmail.com', 'NL-M-2', '', 0, 0, 1),
('nipunmadhusanka201085@gmail.com', 'NL-M-1', 'dd997bcc9e5c3b0bef5d03d8f30d501f', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `moderate_area`
--

CREATE TABLE `moderate_area` (
  `System_Actor_Id` char(10) NOT NULL,
  `Area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moderate_insights`
--

CREATE TABLE `moderate_insights` (
  `System_Actor_Id` char(10) NOT NULL,
  `News` int(11) NOT NULL,
  `Articles` int(11) NOT NULL,
  `Notices` int(11) NOT NULL,
  `Job Vacancies` int(11) NOT NULL,
  `Commercial Ads` int(11) NOT NULL,
  `Complaints` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `Post_ID` char(10) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Publish_Date` date NOT NULL,
  `Image` longblob NOT NULL,
  `Details` varchar(255) NOT NULL,
  `News_Category` varchar(20) NOT NULL,
  `Creator_ID` char(10) NOT NULL,
  `Calendar_Date` date DEFAULT NULL,
  `up_count` int(11) NOT NULL,
  `down_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news_pending`
--

CREATE TABLE `news_pending` (
  `Post_ID` char(10) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Create_Date` date NOT NULL,
  `Image` longblob NOT NULL,
  `Details` varchar(255) NOT NULL,
  `News_Category` varchar(20) NOT NULL,
  `Creator_ID` char(11) NOT NULL,
  `Calendar_Date` date DEFAULT NULL,
  `Reporter_Can_Edit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news_type`
--

CREATE TABLE `news_type` (
  `System_Actor_Id` char(10) NOT NULL,
  `Political` tinyint(1) NOT NULL,
  `Crime` tinyint(1) NOT NULL,
  `Inves` tinyint(1) NOT NULL,
  `Art` tinyint(1) NOT NULL,
  `Eduation` tinyint(1) NOT NULL,
  `Sport` tinyint(1) NOT NULL,
  `Entertainment` tinyint(1) NOT NULL,
  `Environment` tinyint(1) NOT NULL,
  `Other` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `Post_ID` char(10) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Publish_Date` date NOT NULL,
  `Image` longblob NOT NULL,
  `Details` varchar(255) NOT NULL,
  `Creator_ID` char(10) NOT NULL,
  `Set_Date` date DEFAULT NULL,
  `Set_Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notices_pending`
--

CREATE TABLE `notices_pending` (
  `Post_ID` char(10) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Create Date` date NOT NULL,
  `Image` longblob NOT NULL,
  `Details` varchar(255) NOT NULL,
  `Creator_ID` char(10) NOT NULL,
  `Publish Date` date DEFAULT NULL,
  `Publish Time` time DEFAULT NULL,
  `System_User_Can_Edit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_area`
--

CREATE TABLE `post_area` (
  `Post_ID` char(10) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `Post Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_area`
--

INSERT INTO `post_area` (`Post_ID`, `Area`, `Post Type`) VALUES
('NL-CA-1', 'Minuwangoda', 'C.ADS'),
('NL-JV-1', 'Minuwangoda', 'VACANCIES'),
('NL-N-1', 'Minuwangoda', 'NEWS'),
('NL-N-2', 'Gampaha', 'NEWS'),
('NL-N-2', 'Minuwangoda', 'NEWS'),
('NL-NO-2', 'Minuwangoda', 'NOTICES');

-- --------------------------------------------------------

--
-- Table structure for table `post_auto_delete`
--

CREATE TABLE `post_auto_delete` (
  `Post_ID` char(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_auto_delete`
--

INSERT INTO `post_auto_delete` (`Post_ID`, `Date`, `Time`, `Type`) VALUES
('NL-N-2', '2022-01-19', '08:06:00', 'News');

-- --------------------------------------------------------

--
-- Table structure for table `post_type`
--

CREATE TABLE `post_type` (
  `System_Actor_Id` char(10) NOT NULL,
  `News` tinyint(1) NOT NULL,
  `Article` tinyint(1) NOT NULL,
  `Notice` tinyint(1) NOT NULL,
  `Job_Vacancies` tinyint(1) NOT NULL,
  `Com_Ads` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `read_area`
--

CREATE TABLE `read_area` (
  `System_Actor_Id` char(10) NOT NULL,
  `Area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reject_complaint`
--

CREATE TABLE `reject_complaint` (
  `Complaint_ID` char(10) NOT NULL,
  `System_Admin_ID` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `Post_ID` char(10) NOT NULL,
  `System_Actor_ID` char(10) NOT NULL,
  `Reminder_Date` date NOT NULL,
  `Reminder_Time` time NOT NULL,
  `Account_Balance` double NOT NULL,
  `Post_Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reporter_complaints`
--

CREATE TABLE `reporter_complaints` (
  `Complaint_ID` char(10) NOT NULL,
  `System_Reporter_ID` char(10) NOT NULL,
  `News_ID` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reporter_insights`
--

CREATE TABLE `reporter_insights` (
  `System_Actor_Id` char(10) NOT NULL,
  `News` int(11) NOT NULL,
  `Notices` int(11) NOT NULL,
  `Job Vacancies` int(11) NOT NULL,
  `Commercial Ads` int(11) NOT NULL,
  `Complaints` int(11) NOT NULL,
  `Stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_area`
--

CREATE TABLE `report_area` (
  `System_Actor_Id` char(10) NOT NULL,
  `Area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `save`
--

CREATE TABLE `save` (
  `Post_ID` char(10) NOT NULL,
  `System_Actor_ID` char(10) NOT NULL,
  `Post Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `smart_calendar`
--

CREATE TABLE `smart_calendar` (
  `evt_id` int(10) NOT NULL,
  `evt_start` date NOT NULL,
  `evt_end` date NOT NULL,
  `Post_Id` char(10) NOT NULL,
  `Area` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_actor`
--

CREATE TABLE `system_actor` (
  `System_Actor_Id` char(10) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `Mobile` char(10) NOT NULL,
  `DSA` varchar(255) NOT NULL,
  `Position` char(1) NOT NULL,
  `Profile_Img` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `Post_ID` char(10) NOT NULL,
  `System_Actor_ID` char(10) NOT NULL,
  `Vote` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accept_complaint`
--
ALTER TABLE `accept_complaint`
  ADD PRIMARY KEY (`Complaint_ID`),
  ADD KEY `System_Actor_ID` (`System_Admin_ID`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `articles_pending`
--
ALTER TABLE `articles_pending`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`Complaint_ID`),
  ADD KEY `Complainer_ID` (`Complainer_ID`),
  ADD KEY `News_ID` (`News_ID`);

--
-- Indexes for table `com_ads`
--
ALTER TABLE `com_ads`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `com_ads_pending`
--
ALTER TABLE `com_ads_pending`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `deactivate`
--
ALTER TABLE `deactivate`
  ADD PRIMARY KEY (`System_Actor_ID`),
  ADD KEY `System_Actor_ID` (`System_Actor_ID`);

--
-- Indexes for table `dsa`
--
ALTER TABLE `dsa`
  ADD PRIMARY KEY (`Province`,`District`,`DSA`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`evt_id`);

--
-- Indexes for table `hidden`
--
ALTER TABLE `hidden`
  ADD PRIMARY KEY (`Post_ID`,`System_Actor_ID`),
  ADD KEY `System_Actor_ID` (`System_Actor_ID`);

--
-- Indexes for table `important_number`
--
ALTER TABLE `important_number`
  ADD PRIMARY KEY (`Contact_ID`);

--
-- Indexes for table `important_number_list`
--
ALTER TABLE `important_number_list`
  ADD PRIMARY KEY (`Contact_ID`,`Number`);

--
-- Indexes for table `job_vacancies`
--
ALTER TABLE `job_vacancies`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `job_vacancies_pending`
--
ALTER TABLE `job_vacancies_pending`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Email`),
  ADD KEY `System_Actor_ID` (`System_Actor_ID`);

--
-- Indexes for table `moderate_area`
--
ALTER TABLE `moderate_area`
  ADD PRIMARY KEY (`System_Actor_Id`,`Area`);

--
-- Indexes for table `moderate_insights`
--
ALTER TABLE `moderate_insights`
  ADD PRIMARY KEY (`System_Actor_Id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `news_pending`
--
ALTER TABLE `news_pending`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `news_type`
--
ALTER TABLE `news_type`
  ADD PRIMARY KEY (`System_Actor_Id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `notices_pending`
--
ALTER TABLE `notices_pending`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `post_area`
--
ALTER TABLE `post_area`
  ADD PRIMARY KEY (`Post_ID`,`Area`);

--
-- Indexes for table `post_auto_delete`
--
ALTER TABLE `post_auto_delete`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`System_Actor_Id`);

--
-- Indexes for table `read_area`
--
ALTER TABLE `read_area`
  ADD PRIMARY KEY (`System_Actor_Id`,`Area`);

--
-- Indexes for table `reject_complaint`
--
ALTER TABLE `reject_complaint`
  ADD PRIMARY KEY (`Complaint_ID`),
  ADD KEY `System_Actor_ID` (`System_Admin_ID`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`Post_ID`,`System_Actor_ID`),
  ADD KEY `System_Actor_ID` (`System_Actor_ID`);

--
-- Indexes for table `reporter_complaints`
--
ALTER TABLE `reporter_complaints`
  ADD PRIMARY KEY (`Complaint_ID`),
  ADD KEY `System_Reporter_ID` (`System_Reporter_ID`),
  ADD KEY `News_ID` (`News_ID`);

--
-- Indexes for table `reporter_insights`
--
ALTER TABLE `reporter_insights`
  ADD PRIMARY KEY (`System_Actor_Id`);

--
-- Indexes for table `report_area`
--
ALTER TABLE `report_area`
  ADD PRIMARY KEY (`System_Actor_Id`);

--
-- Indexes for table `save`
--
ALTER TABLE `save`
  ADD PRIMARY KEY (`Post_ID`,`System_Actor_ID`),
  ADD KEY `System_Actor_ID` (`System_Actor_ID`);

--
-- Indexes for table `smart_calendar`
--
ALTER TABLE `smart_calendar`
  ADD PRIMARY KEY (`evt_id`),
  ADD KEY `Post_Id` (`Post_Id`);

--
-- Indexes for table `system_actor`
--
ALTER TABLE `system_actor`
  ADD PRIMARY KEY (`System_Actor_Id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`Post_ID`,`System_Actor_ID`),
  ADD KEY `System_Actor_ID` (`System_Actor_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smart_calendar`
--
ALTER TABLE `smart_calendar`
  MODIFY `evt_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accept_complaint`
--
ALTER TABLE `accept_complaint`
  ADD CONSTRAINT `accept_complaint_ibfk_1` FOREIGN KEY (`Complaint_ID`) REFERENCES `complaint` (`Complaint_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accept_complaint_ibfk_2` FOREIGN KEY (`System_Admin_ID`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`Complainer_ID`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`News_ID`) REFERENCES `news` (`Post_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deactivate`
--
ALTER TABLE `deactivate`
  ADD CONSTRAINT `deactivate_ibfk_1` FOREIGN KEY (`System_Actor_ID`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hidden`
--
ALTER TABLE `hidden`
  ADD CONSTRAINT `hidden_ibfk_1` FOREIGN KEY (`System_Actor_ID`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `important_number_list`
--
ALTER TABLE `important_number_list`
  ADD CONSTRAINT `important_number_list_ibfk_1` FOREIGN KEY (`Contact_ID`) REFERENCES `important_number` (`Contact_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`System_Actor_ID`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moderate_area`
--
ALTER TABLE `moderate_area`
  ADD CONSTRAINT `moderate_area_ibfk_1` FOREIGN KEY (`System_Actor_Id`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moderate_insights`
--
ALTER TABLE `moderate_insights`
  ADD CONSTRAINT `moderate_insights_ibfk_1` FOREIGN KEY (`System_Actor_Id`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_type`
--
ALTER TABLE `news_type`
  ADD CONSTRAINT `news_type_ibfk_1` FOREIGN KEY (`System_Actor_Id`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_type`
--
ALTER TABLE `post_type`
  ADD CONSTRAINT `post_type_ibfk_1` FOREIGN KEY (`System_Actor_Id`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `read_area`
--
ALTER TABLE `read_area`
  ADD CONSTRAINT `read_area_ibfk_1` FOREIGN KEY (`System_Actor_Id`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reject_complaint`
--
ALTER TABLE `reject_complaint`
  ADD CONSTRAINT `reject_complaint_ibfk_1` FOREIGN KEY (`Complaint_ID`) REFERENCES `complaint` (`Complaint_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reject_complaint_ibfk_2` FOREIGN KEY (`System_Admin_ID`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `reminder_ibfk_1` FOREIGN KEY (`System_Actor_ID`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reporter_complaints`
--
ALTER TABLE `reporter_complaints`
  ADD CONSTRAINT `reporter_complaints_ibfk_1` FOREIGN KEY (`Complaint_ID`) REFERENCES `complaint` (`Complaint_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reporter_complaints_ibfk_2` FOREIGN KEY (`System_Reporter_ID`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reporter_complaints_ibfk_3` FOREIGN KEY (`News_ID`) REFERENCES `news` (`Post_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reporter_insights`
--
ALTER TABLE `reporter_insights`
  ADD CONSTRAINT `reporter_insights_ibfk_1` FOREIGN KEY (`System_Actor_Id`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `save`
--
ALTER TABLE `save`
  ADD CONSTRAINT `save_ibfk_1` FOREIGN KEY (`System_Actor_ID`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `smart_calendar`
--
ALTER TABLE `smart_calendar`
  ADD CONSTRAINT `smart_calendar_ibfk_1` FOREIGN KEY (`Post_Id`) REFERENCES `news` (`Post_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`System_Actor_ID`) REFERENCES `system_actor` (`System_Actor_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`Post_ID`) REFERENCES `news` (`Post_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
