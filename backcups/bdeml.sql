-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2024 a las 07:52:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdeml`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genere`
--

CREATE TABLE `genere` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genere` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genere`
--

INSERT INTO `genere` (`id`, `genere`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2024_08_21_033132_create_genere_table', 1),
(11, '2024_08_21_033214_create_status_table', 1),
(12, '2024_08_21_033248_create_users_table', 1),
(13, '2024_08_21_160313_view_user', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Activado'),
(2, 'Desactivado'),
(3, 'Bloqueado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `num_document` varchar(18) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `second_name` varchar(30) DEFAULT NULL,
  `first_lastname` varchar(30) NOT NULL,
  `second_lastname` varchar(30) NOT NULL,
  `genere` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `status` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `created_user` datetime NOT NULL,
  `update_user` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `num_document`, `user_name`, `first_name`, `second_name`, `first_lastname`, `second_lastname`, `genere`, `email`, `phone`, `status`, `city`, `state`, `created_user`, `update_user`, `date_birth`) VALUES
(1, '1000338431', 'Calderon_7', 'Jhonnatan', NULL, 'Calderon', 'Moros', 1, 'calderonjhonatan7@gmail.com', '3143627220', 1, 'Bogota', 'Bogota D.C', '2024-08-21 06:07:06', '2024-08-22 03:20:51', '2002-02-07'),
(7, '1029384123', 'Mango76', 'Marco', NULL, 'Marquez', 'Angeloti', 1, 'mangeloti@gmail.com', '3124564567', 2, 'Bucaramanga', NULL, '2024-08-21 23:09:34', '2024-08-22 05:00:18', '2024-08-01'),
(8, '8821605234', 'MrStiven', 'Alejandro', NULL, 'Parada', 'Jimenez', 1, 'aparada@mail.com', '3124502859', 1, 'Bogota', NULL, '2024-08-22 02:00:04', '2024-08-22 02:00:04', '2002-03-14'),
(11, '88216052', 'Tania9', 'Tania', 'Ximena', 'Morales', 'Moros', 2, 'tania@gmail.com', '3213214123', 1, 'Bogotá, Bogotá D.C., Colombia', NULL, '2024-08-22 04:29:04', '2024-08-22 04:30:44', '1998-02-09');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_user`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_user` (
`id` bigint(20) unsigned
,`num_document` varchar(18)
,`user_name` varchar(30)
,`first_name` varchar(30)
,`second_name` varchar(30)
,`first_lastname` varchar(30)
,`second_lastname` varchar(30)
,`genere` varchar(15)
,`email` varchar(60)
,`phone` varchar(12)
,`status` varchar(15)
,`city` varchar(30)
,`state` varchar(30)
,`created_user` datetime
,`update_user` timestamp
,`date_birth` date
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user`  AS SELECT `us`.`id` AS `id`, `us`.`num_document` AS `num_document`, `us`.`user_name` AS `user_name`, `us`.`first_name` AS `first_name`, `us`.`second_name` AS `second_name`, `us`.`first_lastname` AS `first_lastname`, `us`.`second_lastname` AS `second_lastname`, `g`.`genere` AS `genere`, `us`.`email` AS `email`, `us`.`phone` AS `phone`, `s`.`status` AS `status`, `us`.`city` AS `city`, `us`.`state` AS `state`, `us`.`created_user` AS `created_user`, `us`.`update_user` AS `update_user`, `us`.`date_birth` AS `date_birth` FROM ((`users` `us` left join `genere` `g` on(`us`.`genere` = `g`.`id`)) left join `status` `s` on(`us`.`status` = `s`.`id`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genere`
--
ALTER TABLE `genere`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `numDocument_unique` (`num_document`),
  ADD KEY `users_genere_foreign` (`genere`),
  ADD KEY `users_status_foreign` (`status`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genere`
--
ALTER TABLE `genere`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_genere_foreign` FOREIGN KEY (`genere`) REFERENCES `genere` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_status_foreign` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
