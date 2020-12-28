-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1:3307
-- Χρόνος δημιουργίας: 18 Δεκ 2020 στις 20:50:20
-- Έκδοση διακομιστή: 10.4.14-MariaDB
-- Έκδοση PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `gomoku`
--

DELIMITER $$
--
-- Διαδικασίες
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `clean_board` ()  BEGIN
REPLACE INTO board SELECT * FROM board_empty;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `piece_move` (`x1` TINYINT, `y1` TINYINT, `x2` TINYINT, `y2` TINYINT)  BEGIN
	declare  p_color char;
	
	select  piece_color into p_color FROM `board` WHERE X=x1 AND Y=y1;
	
	update board
	set piece_color=p_color
	where x=x2 and y=y2;
	
	UPDATE board
	SET piece_color=null
	WHERE X=x1 AND Y=y1;
	
	update game_status set p_turn=if(p_color='W','B','W');
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `board`
--

CREATE TABLE `board` (
  `x` int(20) NOT NULL,
  `y` int(20) NOT NULL,
  `piece_color` enum('B','W') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `board`
--

INSERT INTO `board` (`x`, `y`, `piece_color`) VALUES
(1, 1, NULL),
(1, 2, NULL),
(1, 3, NULL),
(1, 4, NULL),
(1, 5, NULL),
(1, 6, NULL),
(1, 7, NULL),
(1, 8, NULL),
(1, 9, NULL),
(1, 10, NULL),
(1, 11, NULL),
(1, 12, NULL),
(1, 13, NULL),
(1, 14, NULL),
(1, 15, NULL),
(2, 1, NULL),
(2, 2, NULL),
(2, 3, NULL),
(2, 4, NULL),
(2, 5, NULL),
(2, 6, NULL),
(2, 7, NULL),
(2, 8, NULL),
(2, 9, NULL),
(2, 10, NULL),
(2, 11, NULL),
(2, 12, NULL),
(2, 13, NULL),
(2, 14, NULL),
(2, 15, NULL),
(3, 1, NULL),
(3, 2, NULL),
(3, 3, NULL),
(3, 4, NULL),
(3, 5, NULL),
(3, 6, NULL),
(3, 7, NULL),
(3, 8, NULL),
(3, 9, NULL),
(3, 10, NULL),
(3, 11, NULL),
(3, 12, NULL),
(3, 13, NULL),
(3, 14, NULL),
(3, 15, NULL),
(4, 1, NULL),
(4, 2, NULL),
(4, 3, NULL),
(4, 4, NULL),
(4, 5, NULL),
(4, 6, NULL),
(4, 7, NULL),
(4, 8, NULL),
(4, 9, NULL),
(4, 10, NULL),
(4, 11, NULL),
(4, 12, NULL),
(4, 13, NULL),
(4, 14, NULL),
(4, 15, NULL),
(5, 1, NULL),
(5, 2, NULL),
(5, 3, NULL),
(5, 4, NULL),
(5, 5, NULL),
(5, 6, NULL),
(5, 7, NULL),
(5, 8, NULL),
(5, 9, NULL),
(5, 10, NULL),
(5, 11, NULL),
(5, 12, NULL),
(5, 13, NULL),
(5, 14, NULL),
(5, 15, NULL),
(6, 1, NULL),
(6, 2, NULL),
(6, 3, NULL),
(6, 4, NULL),
(6, 5, NULL),
(6, 6, NULL),
(6, 7, NULL),
(6, 8, NULL),
(6, 9, NULL),
(6, 10, NULL),
(6, 11, NULL),
(6, 12, NULL),
(6, 13, NULL),
(6, 14, NULL),
(6, 15, NULL),
(7, 1, NULL),
(7, 2, NULL),
(7, 3, NULL),
(7, 4, NULL),
(7, 5, NULL),
(7, 6, NULL),
(7, 7, NULL),
(7, 8, NULL),
(7, 9, NULL),
(7, 10, NULL),
(7, 11, NULL),
(7, 12, NULL),
(7, 13, NULL),
(7, 14, NULL),
(7, 15, NULL),
(8, 1, NULL),
(8, 2, NULL),
(8, 3, NULL),
(8, 4, NULL),
(8, 5, NULL),
(8, 6, NULL),
(8, 7, NULL),
(8, 8, NULL),
(8, 9, NULL),
(8, 10, NULL),
(8, 11, NULL),
(8, 12, NULL),
(8, 13, NULL),
(8, 14, NULL),
(8, 15, NULL),
(9, 1, NULL),
(9, 2, NULL),
(9, 3, NULL),
(9, 4, NULL),
(9, 5, NULL),
(9, 6, NULL),
(9, 7, NULL),
(9, 8, NULL),
(9, 9, NULL),
(9, 10, NULL),
(9, 11, NULL),
(9, 12, NULL),
(9, 13, NULL),
(9, 14, NULL),
(9, 15, NULL),
(10, 1, NULL),
(10, 2, NULL),
(10, 3, NULL),
(10, 4, NULL),
(10, 5, NULL),
(10, 6, NULL),
(10, 7, NULL),
(10, 8, NULL),
(10, 9, NULL),
(10, 10, NULL),
(10, 11, NULL),
(10, 12, NULL),
(10, 13, NULL),
(10, 14, NULL),
(10, 15, NULL),
(11, 1, NULL),
(11, 2, NULL),
(11, 3, NULL),
(11, 4, NULL),
(11, 5, NULL),
(11, 6, NULL),
(11, 7, NULL),
(11, 8, NULL),
(11, 9, NULL),
(11, 10, NULL),
(11, 11, NULL),
(11, 12, NULL),
(11, 13, NULL),
(11, 14, NULL),
(11, 15, NULL),
(12, 1, NULL),
(12, 2, NULL),
(12, 3, NULL),
(12, 4, NULL),
(12, 5, NULL),
(12, 6, NULL),
(12, 7, NULL),
(12, 8, NULL),
(12, 9, NULL),
(12, 10, NULL),
(12, 11, NULL),
(12, 12, NULL),
(12, 13, NULL),
(12, 14, NULL),
(12, 15, NULL),
(13, 1, NULL),
(13, 2, NULL),
(13, 3, NULL),
(13, 4, NULL),
(13, 5, NULL),
(13, 6, NULL),
(13, 7, NULL),
(13, 8, NULL),
(13, 9, NULL),
(13, 10, NULL),
(13, 11, NULL),
(13, 12, NULL),
(13, 13, NULL),
(13, 14, NULL),
(13, 15, NULL),
(14, 1, NULL),
(14, 2, NULL),
(14, 3, NULL),
(14, 4, NULL),
(14, 5, NULL),
(14, 6, NULL),
(14, 7, NULL),
(14, 8, NULL),
(14, 9, NULL),
(14, 10, NULL),
(14, 11, NULL),
(14, 12, NULL),
(14, 13, NULL),
(14, 14, NULL),
(14, 15, NULL),
(15, 1, NULL),
(15, 2, NULL),
(15, 3, NULL),
(15, 4, NULL),
(15, 5, NULL),
(15, 6, NULL),
(15, 7, NULL),
(15, 8, NULL),
(15, 9, NULL),
(15, 10, NULL),
(15, 11, NULL),
(15, 12, NULL),
(15, 13, NULL),
(15, 14, NULL),
(15, 15, NULL);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `board_empty`
--

CREATE TABLE `board_empty` (
  `x` int(20) NOT NULL,
  `y` int(20) NOT NULL,
  `piece_color` enum('B','W') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `game_status`
--

CREATE TABLE `game_status` (
  `status` enum('not active','initialized','started','ended','aborded') NOT NULL DEFAULT 'not active',
  `p_turn` enum('B','W') DEFAULT NULL,
  `result` enum('W','B','D') DEFAULT NULL,
  `last_change` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `game_status`
--

INSERT INTO `game_status` (`status`, `p_turn`, `result`, `last_change`) VALUES
('not active', NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `players`
--

CREATE TABLE `players` (
  `username` varchar(20) DEFAULT NULL,
  `piece_color` enum('B','W') NOT NULL,
  `token` varchar(32) DEFAULT NULL,
  `last_change` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `players`
--

INSERT INTO `players` (`username`, `piece_color`, `token`, `last_change`) VALUES
(NULL, 'B', NULL, '0000-00-00 00:00:00'),
(NULL, 'W', NULL, '0000-00-00 00:00:00');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`x`,`y`);

--
-- Ευρετήρια για πίνακα `board_empty`
--
ALTER TABLE `board_empty`
  ADD PRIMARY KEY (`x`,`y`);

--
-- Ευρετήρια για πίνακα `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`piece_color`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
