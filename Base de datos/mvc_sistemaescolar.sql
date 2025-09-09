-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2025 a las 23:25:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvc_sistemaescolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anecdote`
--

CREATE TABLE `anecdote` (
  `anecdote_id` bigint(20) UNSIGNED NOT NULL,
  `student_nie` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `faults` varchar(50) NOT NULL,
  `faults_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `anecdote`
--

INSERT INTO `anecdote` (`anecdote_id`, `student_nie`, `student_name`, `faults`, `faults_date`, `created_at`, `updated_at`) VALUES
(2, 1234567890, 'alfredo', 'no vieno a clases', '2025-07-07', '2025-07-25 18:21:01', NULL),
(3, 1234567890, 'jonhy', 'no vieno a clases', '2025-07-19', '2025-07-25 18:32:05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_data`
--

CREATE TABLE `book_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_nie` int(10) UNSIGNED NOT NULL,
  `number` varchar(30) NOT NULL,
  `book` int(11) NOT NULL,
  `folio` int(11) NOT NULL,
  `tomo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `book_data`
--

INSERT INTO `book_data` (`id`, `student_nie`, `number`, `book`, `folio`, `tomo`) VALUES
(1, 1234567890, '2313', 101, 202, 303);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_nie` int(10) UNSIGNED NOT NULL,
  `photo` varchar(100) NOT NULL,
  `previous_grade_certificate` varchar(50) NOT NULL,
  `behavior_certificate` varchar(50) NOT NULL,
  `guardian_dui_copy` varchar(100) NOT NULL,
  `financial_regulations` varchar(100) NOT NULL,
  `other` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documents`
--

INSERT INTO `documents` (`id`, `student_nie`, `photo`, `previous_grade_certificate`, `behavior_certificate`, `guardian_dui_copy`, `financial_regulations`, `other`) VALUES
(1, 1234567890, '', 'previous_cert.pdf', 'good_behavior.pdf', 'guardian_dui_copy.pdf', 'financial_regulations.pdf', 'nada mas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medical_data`
--

CREATE TABLE `medical_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_nie` int(10) UNSIGNED NOT NULL,
  `disease` varchar(50) NOT NULL,
  `medication` varchar(40) NOT NULL,
  `allergy` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medical_data`
--

INSERT INTO `medical_data` (`id`, `student_nie`, `disease`, `medication`, `allergy`, `created_at`, `updated_at`) VALUES
(1, 1234567890, 'Asthma', 'Inhaler', 'Peanuts', '2025-07-22 21:49:31', '2025-07-22 21:49:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parents`
--

CREATE TABLE `parents` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_nie` int(10) UNSIGNED NOT NULL,
  `parent_type` enum('mother','father') NOT NULL,
  `name` varchar(40) NOT NULL,
  `workplace` varchar(100) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `dui` varchar(10) NOT NULL,
  `marital_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parents`
--

INSERT INTO `parents` (`id`, `student_nie`, `parent_type`, `name`, `workplace`, `phone`, `dui`, `marital_status`) VALUES
(1, 1234567890, 'mother', 'Jane Doe', 'XYZ Corp', '555-5678', 'D123456789', 'Single'),
(2, 1234567890, 'father', 'Michael Doe', 'ABC Ltd.', '555-8765', 'M987654321', 'Married');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `student_nie` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `manual` tinyint(1) NOT NULL DEFAULT 0,
  `card` tinyint(1) NOT NULL DEFAULT 0,
  `virtual_classroom` tinyint(1) NOT NULL DEFAULT 0,
  `tuition` decimal(8,2) NOT NULL,
  `january` tinyint(1) NOT NULL DEFAULT 0,
  `february` tinyint(1) NOT NULL DEFAULT 0,
  `march` tinyint(1) NOT NULL DEFAULT 0,
  `april` tinyint(1) NOT NULL DEFAULT 0,
  `may` tinyint(1) NOT NULL DEFAULT 0,
  `june` tinyint(1) NOT NULL DEFAULT 0,
  `july` tinyint(1) NOT NULL DEFAULT 0,
  `august` tinyint(1) NOT NULL DEFAULT 0,
  `september` tinyint(1) NOT NULL DEFAULT 0,
  `october` tinyint(1) NOT NULL DEFAULT 0,
  `november` tinyint(1) NOT NULL DEFAULT 0,
  `december` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`payment_id`, `student_nie`, `student_name`, `manual`, `card`, `virtual_classroom`, `tuition`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`, `created_at`, `updated_at`) VALUES
(2, 1234567890, 'alfredo', 1, 0, 1, 22.00, 1, 0, 1, 0, 0, 1, 1, 0, 1, 0, 1, 0, '2025-07-25 19:45:13', '2025-07-25 19:45:13'),
(3, 1234567890, 'jonhy', 1, 1, 1, 44.00, 1, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 1, '2025-07-25 19:45:37', '2025-07-25 19:45:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_nie` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `grade` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `living_with` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(50) NOT NULL,
  `photo_img` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `student_nie`, `first_name`, `last_name`, `address`, `age`, `grade`, `phone`, `living_with`, `date_of_birth`, `place_of_birth`, `photo_img`, `created_at`, `updated_at`) VALUES
(1, 1234567890, 'John', 'Doe', '123 Main St, Springfield', 15, '10th Grade', '555-1234', 'Mother', '2009-04-15', 'Springfield', '1753670452_estudiante23.png', '2025-07-22 21:48:48', '2025-07-28 02:40:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','teacher') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'admin'),
(3, 'profesor1', 'cffa965d9faa1d453f2d336294b029a7f84f485f75ce2a2c723065453b12b03b', 'teacher');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anecdote`
--
ALTER TABLE `anecdote`
  ADD PRIMARY KEY (`anecdote_id`),
  ADD KEY `student_nie` (`student_nie`);

--
-- Indices de la tabla `book_data`
--
ALTER TABLE `book_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_nie` (`student_nie`);

--
-- Indices de la tabla `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_nie` (`student_nie`);

--
-- Indices de la tabla `medical_data`
--
ALTER TABLE `medical_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_nie` (`student_nie`);

--
-- Indices de la tabla `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_nie` (`student_nie`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `student_nie` (`student_nie`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_nie` (`student_nie`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anecdote`
--
ALTER TABLE `anecdote`
  MODIFY `anecdote_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `book_data`
--
ALTER TABLE `book_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `medical_data`
--
ALTER TABLE `medical_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anecdote`
--
ALTER TABLE `anecdote`
  ADD CONSTRAINT `anecdote_ibfk_1` FOREIGN KEY (`student_nie`) REFERENCES `students` (`student_nie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `book_data`
--
ALTER TABLE `book_data`
  ADD CONSTRAINT `book_data_ibfk_1` FOREIGN KEY (`student_nie`) REFERENCES `students` (`student_nie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`student_nie`) REFERENCES `students` (`student_nie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medical_data`
--
ALTER TABLE `medical_data`
  ADD CONSTRAINT `medical_data_ibfk_1` FOREIGN KEY (`student_nie`) REFERENCES `students` (`student_nie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_ibfk_1` FOREIGN KEY (`student_nie`) REFERENCES `students` (`student_nie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`student_nie`) REFERENCES `students` (`student_nie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
