-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 06 Ιουν 2021 στις 21:17:22
-- Έκδοση διακομιστή: 10.4.17-MariaDB
-- Έκδοση PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `doctor_appointment`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `department`
--

CREATE TABLE `department` (
  `id` int(10) UNSIGNED NOT NULL,
  `department` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(3, 'Cardiology'),
(1, 'E.N.T'),
(2, 'Neurology'),
(4, 'Surgery');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `bio` text NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL DEFAULT 'Inactive',
  `image` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `doctor`
--

INSERT INTO `doctor` (`id`, `username`, `email`, `phone`, `department_id`, `bio`, `password`, `status`, `image`) VALUES
(45, 'doc2', 'doc2@gmail.com', '6986621447', 3, 'cardiologist', '271559ec25268bb9bb2ad7fd8b4cf71a', 'Active', ''),
(47, 'doc3', 'doc3@gmail.com', '6986298655', 1, 'ent', 'cd89644a6bc2d0d856810732744ef3cd', 'Active', ''),
(49, 'tonia', 'tonia@gmail.com', '6986621447', 4, 'neurologist', '85bb964a8f4f5a6b2250b9189b66441e', 'Active', ''),
(56, 'doctor', 'doctor@gmail.com', '6986621447', 4, 'neurosurgeon', 'f9f16d97c90d8c6f2cab37bb6d1f1992', 'Active', ''),
(57, 'doc6', 'doc6@gmail.com', '6986621447', 3, 'cardiologist', 'b1f936e714c08ee39fa70a6fdaaea343', 'Inactive', ''),
(65, 'doc1', 'doc1@gmail.com', '2233445566', 1, 'ent', '83e4b1789306d3d1c99140df3827d600', 'Active', 'b1.jpg'),
(66, 'dimitra', 'dimitra@gmail.com', '1234567890', 3, 'cardiologist', 'b2df3652dfa3e19d5e96dfc53f44a992', 'Active', 'doc.jpg');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `list`
--

CREATE TABLE `list` (
  `id` int(255) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `pat_name` varchar(255) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `serial` int(11) DEFAULT NULL,
  `is_morning` tinyint(1) NOT NULL,
  `pat_age` int(255) NOT NULL,
  `pat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `list`
--

INSERT INTO `list` (`id`, `date`, `pat_name`, `doc_id`, `serial`, `is_morning`, `pat_age`, `pat_id`) VALUES
(251, '2021-01-15', 'tonia', 56, 1, 0, 21, 41);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL DEFAULT 'Inactive',
  `image` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `patient`
--

INSERT INTO `patient` (`id`, `username`, `age`, `email`, `phone`, `password`, `status`, `image`) VALUES
(50, 'tonianik', 0, 'tonianik@gmail.com', '123123123', 'ff1c78e149d76c0c7de5b976f8cd0561', 'Active', 'pat_pic.jpg');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `pat_name` varchar(255) NOT NULL,
  `pat_age` varchar(255) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `doc_bio` text NOT NULL,
  `doc_phone` varchar(255) NOT NULL,
  `prescribe` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `prescription`
--

INSERT INTO `prescription` (`id`, `pat_name`, `pat_age`, `doc_name`, `doc_bio`, `doc_phone`, `prescribe`, `date`) VALUES
(19, 'tonia', '21', 'doctor', 'neurosurgeon', '6986621447', 'odmbogidf', '2021-01-15');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `morning_max` int(11) UNSIGNED NOT NULL,
  `evening_max` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `schedule`
--

INSERT INTO `schedule` (`id`, `doctor_id`, `date`, `morning_max`, `evening_max`) VALUES
(76, 56, '2021-01-15', 5, 6),
(77, 56, '0000-00-00', 0, 0),
(78, 56, '0000-00-00', 0, 0),
(79, 56, '2021-01-23', 5, 5);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `secratary`
--

CREATE TABLE `secratary` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL DEFAULT 'Inactive',
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `secratary`
--

INSERT INTO `secratary` (`id`, `username`, `email`, `phone`, `password`, `status`, `image`) VALUES
(2, 'Chris', 'chris@gmail.com', '6999999', '6b34fe24ac2ff8103f6fce1f0da2ef57', 'Active', ''),
(4, 'sec1', 'sec1@gmail.com', '6986621447', '35f7bba0a937a63ed13dae2232ee4b51', 'Inactive', ''),
(5, 'sec2', 'sec2@gmail.com', '5161652', 'ad31b430bcdcd1aeb0dc3a10069e229c', 'Active', ''),
(6, 'dimitra', 'dimitra@gmail.com', '6986621444', 'b2df3652dfa3e19d5e96dfc53f44a992', 'Active', ''),
(20, 'tina', 'tina@gmail.com', '1234567', 'ef2afe0ea76c76b6b4b1ee92864c4d5c', 'Inactive', 'b1.jpg'),
(21, 'nefeli', 'nefeli@gmail.com', '123321222', '833d8f78b93c38b68f0a915d28d1e01b', 'Inactive', 'b1.jpg'),
(23, 'christina', 'christina@gmail.com', '001122', 'e311dd5fd4cdbba780ea0d0062df7788', 'Active', 'b1.jpg');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department` (`department`);

--
-- Ευρετήρια για πίνακα `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `department_id_2` (`department_id`);

--
-- Ευρετήρια για πίνακα `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `pat_id` (`pat_id`),
  ADD KEY `pat_id_2` (`pat_id`),
  ADD KEY `pat_id_3` (`pat_id`);

--
-- Ευρετήρια για πίνακα `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Ευρετήρια για πίνακα `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Ευρετήρια για πίνακα `secratary`
--
ALTER TABLE `secratary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT για πίνακα `list`
--
ALTER TABLE `list`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT για πίνακα `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT για πίνακα `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT για πίνακα `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT για πίνακα `secratary`
--
ALTER TABLE `secratary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
