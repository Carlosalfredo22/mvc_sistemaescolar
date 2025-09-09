-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2025 a las 23:24:48
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
-- Base de datos: `mvc_project`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `anecdote`
--

INSERT INTO `anecdote` (`anecdote_id`, `student_nie`, `student_name`, `faults`, `faults_date`, `created_at`, `updated_at`) VALUES
(2, 5676819, 'jennifer alejandra ramos sanchez', 'trabajo no realizado', '2025-02-16', '2025-02-18 02:49:28', '2025-03-11 23:52:30'),
(8, 16567890, 'Ismael rosales', 'Inasistencia', '2025-03-20', '2025-03-11 22:24:54', '2025-03-11 23:52:56');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medical_data`
--

INSERT INTO `medical_data` (`id`, `student_nie`, `disease`, `medication`, `allergy`, `created_at`, `updated_at`) VALUES
(3, 16567890, 'alergia', 'medicamento1', 'alergia acuda', '2025-02-06 02:57:50', '2025-02-19 02:57:50'),
(4, 5676819, 'gripe', 'medicamento2', 'ninguna', '2025-02-11 03:21:16', '2025-02-26 03:21:16');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`payment_id`, `student_nie`, `student_name`, `manual`, `card`, `virtual_classroom`, `tuition`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`, `created_at`, `updated_at`) VALUES
(22, 16567890, 'Juan jose', 1, 1, 1, 2000.00, 1, 1, 1, 0, 1, 1, 1, 0, 1, 0, 1, 1, '2025-02-27 01:38:56', '2025-07-15 20:14:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_file`
--

CREATE TABLE `student_file` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_nie` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `grade` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `living_with` varchar(30) NOT NULL,
  `photo_img` varchar(100) NOT NULL,
  `number` varchar(30) NOT NULL,
  `book` int(11) NOT NULL,
  `folio` int(11) NOT NULL,
  `tomo` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(50) NOT NULL,
  `mother_name` varchar(40) NOT NULL,
  `mother_workplace` varchar(100) NOT NULL,
  `mother_phone` varchar(30) DEFAULT NULL,
  `mother_dui` varchar(10) NOT NULL,
  `mother_marital_status` varchar(10) DEFAULT NULL,
  `father_name` varchar(40) NOT NULL,
  `father_workplace` varchar(50) NOT NULL,
  `father_phone` varchar(30) DEFAULT NULL,
  `father_dui` varchar(10) NOT NULL,
  `father_marital_status` varchar(10) DEFAULT NULL,
  `photo` varchar(100) NOT NULL,
  `previous_grade_certificate` varchar(50) NOT NULL,
  `behavior_certificate` varchar(50) NOT NULL,
  `guardian_dui_copy` varchar(100) NOT NULL,
  `financial_regulations` varchar(100) NOT NULL,
  `other` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `student_file`
--

INSERT INTO `student_file` (`id`, `student_nie`, `first_name`, `last_name`, `address`, `age`, `grade`, `phone`, `living_with`, `photo_img`, `number`, `book`, `folio`, `tomo`, `date_of_birth`, `place_of_birth`, `mother_name`, `mother_workplace`, `mother_phone`, `mother_dui`, `mother_marital_status`, `father_name`, `father_workplace`, `father_phone`, `father_dui`, `father_marital_status`, `photo`, `previous_grade_certificate`, `behavior_certificate`, `guardian_dui_copy`, `financial_regulations`, `other`, `created_at`, `updated_at`) VALUES
(2, 16567890, 'Carlos Alfredo alvarado', 'lopez', 'san juan nonualco', 10, '9 noveno', '72801073', 'san juan nonualco', '1752893323_estudiante23.png', '7829012', 2, 2, 2, '2025-01-14', 'santa maria', 'yesenia', 'hospital', '8910232', '8820102', 'casada', 'carlos', 'hospital', '7889212', '8290123', 'CASADO', 'photo.png', 'anterio', 'bueno', '89201230', 'si', 'nada', '2025-01-28 03:12:48', '2025-07-19 02:48:43'),
(8, 5676819, 'Carlos ramos sidon', 'Miguel angel', 'San juan nonualco', 15, '8', '76879021', 'mi madre y padre', '1752890919_estudianteprueba1.jpg', '762891291', 1, 1, 1, '2025-02-20', 'San salvador', 'Claudia fiona', 'hospital', '7898721', '7182910-21', 'casado', 'miguel sanchez', 'hospital', '87982122', '72819201-2', 'casado', 'photo.png', 'certificado.pdf', 'certificado.pdf', '7819201-21', 'si', 'nada', '2025-02-07 03:20:50', '2025-07-19 02:08:39'),
(13, 892010, 'Diego', 'sanchez', 'santiago nonualco', 15, '9', '78982122', 'con mis padres', '1752898986_estudiante1.jpeg', '7729123', 3, 3, 1, '2025-07-15', 'san rafael', 'fernanda sanchez', 'restaurante', '789219', '781921', 'casada', 'francisco sanchez', 'mecanica', '892012', '9201023', 'casado', 'foto', 'certificado', 'bueno', '8820102', 'no', 'nada', '2025-07-19 04:23:06', NULL);

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
(9, 'profesor1', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'teacher'),
(14, 'profesor2', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'teacher'),
(19, 'profesor3', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'teacher'),
(21, 'profesor4', '0bc35d431f653c25ff670adb5a51ac7274ad6f4046e552f09cef9f5b873c575a', 'teacher');

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
-- Indices de la tabla `medical_data`
--
ALTER TABLE `medical_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_nie` (`student_nie`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `student_nie` (`student_nie`);

--
-- Indices de la tabla `student_file`
--
ALTER TABLE `student_file`
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
  MODIFY `anecdote_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `medical_data`
--
ALTER TABLE `medical_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `student_file`
--
ALTER TABLE `student_file`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anecdote`
--
ALTER TABLE `anecdote`
  ADD CONSTRAINT `anecdote_ibfk_1` FOREIGN KEY (`student_nie`) REFERENCES `student_file` (`student_nie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medical_data`
--
ALTER TABLE `medical_data`
  ADD CONSTRAINT `medical_data_ibfk_1` FOREIGN KEY (`student_nie`) REFERENCES `student_file` (`student_nie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`student_nie`) REFERENCES `student_file` (`student_nie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
