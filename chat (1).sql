

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `adding`
--

CREATE TABLE `adding` (
  `A` varchar(255) NOT NULL,
  `B` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `A` varchar(255) NOT NULL,
  `B` varchar(120) DEFAULT NULL,
  `chat` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `A` varchar(255) DEFAULT NULL,
  `B` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------



--
-- Table structure for table `signupid`
--

CREATE TABLE `signupid` (
  `id` int(11) NOT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Username` varchar(120) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
