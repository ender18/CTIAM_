-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-10-2020 a las 16:27:31
-- Versión del servidor: 5.6.49-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ctiam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content1` text COLLATE utf8mb4_unicode_ci,
  `content2` text COLLATE utf8mb4_unicode_ci,
  `content3` text COLLATE utf8mb4_unicode_ci,
  `content4` text COLLATE utf8mb4_unicode_ci,
  `file` text COLLATE utf8mb4_unicode_ci,
  `privacy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contents`
--

INSERT INTO `contents` (`id`, `name`, `content`, `content1`, `content2`, `content3`, `content4`, `file`, `privacy`, `created_at`, `updated_at`) VALUES
(1, 'primary_slider', '\"Clubes de la Ciencia\"', 'Con el objetivo de promover y desarrollar el interés por la ciencia, la investigación y la tecnología, la Vicerrectoría de Investigación de la Universidad Francisco de Paula Santander y el SENA realizó en el 2019 la II semana regional y V nacional de “Clubes de la Ciencia”.', 'null', 'null', 'null', '/images/user/1602088305club de ciencia 1.jpg', 'public', NULL, '2020-10-07 18:31:47'),
(2, 'primary_slider', 'I Muestra Empresarial', 'Foro: Casos de éxito de mujeres emprendedoras en Cúcuta y el área metropolitana.', 'null', 'null', 'null', '/images/user/1602088962foro de mujeres.jpg', 'public', NULL, '2020-10-07 18:42:42'),
(5, 'quienes_somos', 'Hacemos parte del cambio. CTIAM es un colectivo de mujeres empoderadas las cuales usan las TICS como herramienta fundamental para el desarrollo integral de la mujer Nortesantandereana.', 'null', 'null', 'null', 'null', '/images/user/1601914729ux-789162_1920.jpg', NULL, '2020-07-20 01:47:16', '2020-10-05 18:18:49'),
(6, 'que_hacemos', 'En CTIAM las mujeres reciben formación que les permite desarrollar y mejorar sus habilidades digitales, adquieren conocimientos sobre estrategias y Marketing Digital y se empoderan para creer en sus capacidades y hacer realidad sus emprendimientos mediante el aprovechamiento y apropiación de las TIC.', 'null', 'null', 'null', 'null', '/images/user/1601913145IMG_20200924_174717.jpg', NULL, NULL, '2020-10-05 17:52:28'),
(7, 'proyectos_realizados', 'Proyecto x', 'Descripcion del proyecto x', NULL, NULL, NULL, 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=753&q=80', NULL, NULL, NULL),
(8, 'proyectos_realizados', 'Proyecto y', 'Descripcion del proyecto y', NULL, NULL, NULL, 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80', NULL, NULL, NULL),
(9, 'proyectos_realizados', 'Proyecto z', 'Descripcion del proyecto z', NULL, NULL, NULL, 'https://images.unsplash.com/photo-1522542550221-31fd19575a2d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80', NULL, NULL, NULL),
(10, 'mision', 'Somos un colectivo de mujeres profesionales que desarrolla estrategias que promuevan el aprovechamiento y la apropiación de las TIC (Tecnologías de la Información y las Comunicación) para el desarrollo integral de la mujer en la zona urbana del municipio de San José de Cúcuta y su Área Metropolitana.', 'null', 'null', 'null', 'null', 'images/welcome/mision.png', NULL, NULL, '2020-08-10 12:48:53'),
(11, 'vision', 'Seremos promotoras de una red de conocimiento que permita la formulación y desarrollo de políticas, programas y proyectos que propendan la participación de las niñas y mujeres nortesantandereanas en la ciencia, tecnología, ingenierías, artes y matemáticas.', NULL, NULL, NULL, NULL, 'images/welcome/vision.png', NULL, NULL, NULL),
(12, 'obj_general', 'Desarrollar estrategias de emprendimiento y formación de competencias que permita promover el aprovechamiento y la apropiación de las TIC para el desarrollo integral de la mujer en la zona urbana del municipio de San José de Cúcuta.', NULL, NULL, NULL, NULL, 'images/welcome/vision.png', NULL, NULL, NULL),
(13, 'obj_especifico', 'Determinar el grado de aprovechamiento de las TIC para el desarrollo integral de la mujer en el hogar, en sus emprendimientos e iniciativas productivas de la zona urbana del municipio de Cúcuta.', NULL, 'null', 'null', 'null', NULL, NULL, NULL, '2020-08-10 12:57:27'),
(14, 'obj_especifico', 'Conformar la red de conocimiento en la apropiación y aprovechamiento de las TIC por la mujer cucuteña con la alianza de entidades públicas y privadas de la ciudad en pro de su equidad económica y equidad de género.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'obj_especifico', 'Desarrollar estrategias para visibilidad de la red de conocimiento en la apropiación y aprovechamiento de las TIC por la mujer cucuteña..', 'null', 'null', 'null', 'null', NULL, NULL, NULL, '2020-07-20 19:25:15'),
(16, 'marco_normativo', 'Titulo Marco Normativo', NULL, NULL, NULL, NULL, 'files/mnyf.pdf', NULL, NULL, NULL),
(17, 'marco_normativo', 'Titulo Marco Normativo 1', NULL, NULL, NULL, NULL, 'files/mnyf.pdf', NULL, NULL, NULL),
(18, 'marco_normativo', 'Titulo Marco Normativo 2', NULL, NULL, NULL, NULL, 'files/mnyf.pdf', NULL, NULL, NULL),
(19, 'members', 'Universidad Francisco de Paula Santander', 'Descripción de miembro', 'https://ww2.ufps.edu.co', 'Salón de reuniones', 'null', 'https://ww2.ufps.edu.co/public/archivos/elementos_corporativos/logoufps.png', NULL, NULL, '2020-08-10 13:06:22'),
(20, 'members', 'Universidad Simón Bolivar', 'Descripción de miembro', 'https://www.unisimon.edu.co/cucuta/', NULL, NULL, 'https://carrerasuniversitarias.com.co/logos/original/logo-universidad-simon-bolivar.png', NULL, NULL, NULL),
(21, 'members', 'Universidad Nacional de Colombia', 'Descripción de miembro', 'https://unal.edu.co/', NULL, NULL, 'https://www.ingenieria.bogota.unal.edu.co/concursodocente_lapaz/images/logosimbolo_central_2c.png', NULL, NULL, NULL),
(22, 'members', 'Universidad de Santander', 'Descripción del miembro', 'https://cucuta.udes.edu.co/', '', NULL, 'data:image/png;base64,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', NULL, NULL, NULL),
(23, 'focus', 'Familiar1', 'Descripción foco familiar', 'null', 'null', 'null', 'https://www.bbmundo.com/wp-content/uploads/2014/09/a-punto-de-ser-mama-soltera.jpg', NULL, NULL, '2020-07-20 20:10:37'),
(24, 'focus', 'Estudiante', 'Descripción foco estudiante', NULL, NULL, NULL, 'https://eatingdisorderspecialists.com/wp-content/uploads/bigstock-Mixed-Race-College-Student-8339436.jpg', NULL, NULL, NULL),
(25, 'focus', 'Profesional', 'Descripción foco Profesional', NULL, NULL, NULL, 'https://koreyhowellphotography.com/wp-content/uploads/2017/09/AdobeStock_122362963-1028x675.jpg', NULL, NULL, NULL),
(26, 'focus', 'Laboral', 'Descripción foco Laboral', NULL, NULL, NULL, 'https://www.lachicadelbanquillo.com/wp-content/uploads/2018/07/caracter%C3%ADsticas-que-definen-el-liderazgo-femenino-700x466.jpg', NULL, NULL, NULL),
(27, 'founder', 'Juliana Cogollo', 'Descripción personal', 'Ingeniera', 'null', 'null', '/images/user/1603318660foto fundadora.jpg', NULL, NULL, '2020-10-22 00:17:40'),
(28, 'founder', 'Olga Rincon', 'Descripción personal', 'Docente', NULL, NULL, 'https://koreyhowellphotography.com/wp-content/uploads/2017/04/AdobeStock_94026210-1024x689.jpeg', NULL, NULL, NULL),
(29, 'founder', 'Maria Lucia Ramirez', 'Descripción personal', 'Developer Senior', 'null', 'null', 'https://thefashionfantasy.com/wp-content/uploads/2020/03/Professional-Hairstyles-for-Working-Women.jpg', NULL, NULL, '2020-08-10 12:24:25'),
(30, 'video_haz_parte', 'IwPnQaTKhqo', 'null', 'null', 'null', 'null', '\r\n', NULL, NULL, '2020-08-10 13:27:31'),
(31, 'img_obj_especifico', 'null', 'null', 'null', 'null', 'null', '/images/user/1595273187objectives.png', NULL, NULL, '2020-07-20 19:26:27'),
(44, 'members', 'Bango Agrario', 'Descripcion', 'banagrario.com.co', '5 millones de pesos', 'null', '/images/user/1596749116computer-icons-educational-technology-learning-training-course-training-png-clip-art.png', NULL, '2020-08-06 21:25:16', '2020-08-10 12:57:50'),
(45, 'description_site', 'En este espacio digital podrás encontrar toda la información de la Red de Mujeres CTIAM.', 'null', 'null', 'null', 'null', NULL, NULL, NULL, '2020-09-25 16:05:26'),
(46, 'phone', '580 00011', 'null', 'null', 'null', 'null', NULL, NULL, NULL, '2020-08-10 12:44:31'),
(47, 'email', 'mujeresctim@ufps.edu.co', 'null', 'null', 'null', 'null', NULL, NULL, NULL, '2020-10-06 15:39:49'),
(48, 'twitter', '@ctiam_cucuta', 'https://www.dasscol.co', 'null', 'null', 'null', NULL, NULL, NULL, '2020-09-25 00:19:05'),
(49, 'facebook', '@mujeresctiam', 'https://www.facebook.com/mujeresctim/', 'null', 'null', 'null', NULL, NULL, NULL, '2020-09-25 16:14:34'),
(50, 'instagram', '@mujeresctiam', 'https://instagram.com/mujeresctiam?igshid=12yj0c4k7b4vs', 'null', 'null', 'null', NULL, NULL, NULL, '2020-09-25 16:11:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `duration` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_image` text COLLATE utf8mb4_unicode_ci,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `fecha_inicio_inscription` date DEFAULT NULL,
  `fecha_fin_inscription` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `id_owner` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `type`, `title`, `description`, `duration`, `duration_type`, `url_image`, `fecha_inicio`, `fecha_fin`, `fecha_inicio_inscription`, `fecha_fin_inscription`, `cost`, `id_owner`, `status`, `created_at`, `updated_at`) VALUES
(37, 'Curso', 'Formación en estrategias digitales para mujeres emprendedoras', 'Curso virtual para empoderar a las mujeres víctimas de la frontera, creadoras de iniciativas productivas  y/o emprendimientos de la zona de La Parada y Villa del Rosario de las herramientas tecnológicas, que les permita transformar sus negocios y realizar procesos innovadores en Marketing Digital, ventas y posicionamiento.', '34', 'Horas', '/images/user/160210032920200925_113739_0001.png', '2020-10-06', '2020-11-06', '2020-10-01', '2020-10-25', 0, 79, 'Publicado', '2020-10-07 21:52:09', '2020-10-27 18:43:00'),
(38, 'Curso', 'Formación en estrategias digitales para mujeres emprendedoras', 'Curso virtual para empoderar a las mujeres de Cúcuta y Norte de Santander, creadoras de iniciativas productivas y/o emprendimientos sobre las herramientas tecnológicas, que les permita transformar sus negocios y realizar procesos innovadores en Marketing Digital, ventas y posicionamiento.', '34', 'Horas', '/images/user/1603813301Diseño sin título.jpg', '2020-11-09', '2020-12-10', '2020-10-27', '2020-11-05', 0, 83, 'Publicado', '2020-10-27 17:22:23', '2020-10-27 18:02:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_foci`
--

CREATE TABLE `course_foci` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `foci_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `course_foci`
--

INSERT INTO `course_foci` (`id`, `course_id`, `foci_id`, `created_at`, `updated_at`) VALUES
(181, 38, 3, '2020-10-27 18:07:37', '2020-10-27 18:07:37'),
(182, 38, 10, '2020-10-27 18:07:37', '2020-10-27 18:07:37'),
(183, 38, 4, '2020-10-27 18:07:37', '2020-10-27 18:07:37'),
(190, 37, 3, '2020-10-27 18:43:01', '2020-10-27 18:43:01'),
(191, 37, 4, '2020-10-27 18:43:01', '2020-10-27 18:43:01'),
(192, 37, 10, '2020-10-27 18:43:01', '2020-10-27 18:43:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foci`
--

CREATE TABLE `foci` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `foci`
--

INSERT INTO `foci` (`id`, `name`, `description`, `url_image`, `created_at`, `updated_at`) VALUES
(1, 'Familiar', 'Descripción del foco familiar', 'https://www.bbmundo.com/wp-content/uploads/2014/09/a-punto-de-ser-mama-soltera.jpg', NULL, NULL),
(2, 'Estudiante', 'Descripción del foco estudiante', 'https://eatingdisorderspecialists.com/wp-content/uploads/bigstock-Mixed-Race-College-Student-8339436.jpg', NULL, NULL),
(3, 'Profesional', 'Descripción del foco profesional', 'https://koreyhowellphotography.com/wp-content/uploads/2017/09/AdobeStock_122362963-1028x675.jpg', NULL, NULL),
(4, 'Laboral', 'Descripción del foco laboral', 'https://www.lachicadelbanquillo.com/wp-content/uploads/2018/07/caracter%C3%ADsticas-que-definen-el-liderazgo-femenino-700x466.jpg', NULL, NULL),
(10, 'Empresarial', 'Descripción del foco Empresaria', '/images/user/15964649971595253339new.png', '2020-08-03 14:29:57', '2020-08-03 14:29:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foci_user`
--

CREATE TABLE `foci_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foci_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `foci_user`
--

INSERT INTO `foci_user` (`id`, `foci_id`, `user_id`, `created_at`, `updated_at`) VALUES
(24, 1, 32, '2020-08-10 20:49:43', '2020-08-10 20:49:43'),
(25, 3, 32, '2020-08-10 20:49:43', '2020-08-10 20:49:43'),
(26, 4, 32, '2020-08-10 20:49:43', '2020-08-10 20:49:43'),
(27, 10, 32, '2020-08-10 20:49:43', '2020-08-10 20:49:43'),
(28, 3, 34, '2020-09-28 13:55:11', '2020-09-28 13:55:11'),
(29, 4, 34, '2020-09-28 13:55:11', '2020-09-28 13:55:11'),
(30, 1, 36, '2020-10-03 08:45:35', '2020-10-03 08:45:35'),
(31, 2, 36, '2020-10-03 08:45:35', '2020-10-03 08:45:35'),
(32, 4, 36, '2020-10-03 08:45:35', '2020-10-03 08:45:35'),
(33, 2, 74, '2020-10-06 01:17:02', '2020-10-06 01:17:02'),
(34, 3, 74, '2020-10-06 01:17:02', '2020-10-06 01:17:02'),
(35, 2, 84, '2020-10-27 23:36:08', '2020-10-27 23:36:08'),
(36, 4, 84, '2020-10-27 23:36:08', '2020-10-27 23:36:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int(11) DEFAULT NULL,
  `schedule` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_group` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_course_parent` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `quota`, `schedule`, `place`, `status_group`, `id_course_parent`, `created_at`, `updated_at`) VALUES
(45, 'Formación en estrategias digitales para mujeres emprendedoras', 30, '2:30-5:30', 'Google Meet', 'Borrador', 37, '2020-10-20 16:13:04', '2020-10-20 16:13:04'),
(47, '1', 25, 'Lunes y miércoles 2:30-5:30', 'Google Meet', '', 38, '2020-10-27 18:02:02', '2020-10-27 18:02:02'),
(48, '2', 25, 'Martes y jueves 2:30-5:30', 'Google Meet', '', 38, '2020-10-27 18:02:41', '2020-10-27 18:02:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups_tutors`
--

CREATE TABLE `groups_tutors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_group` bigint(20) UNSIGNED NOT NULL,
  `id_tutor` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `groups_tutors`
--

INSERT INTO `groups_tutors` (`id`, `id_group`, `id_tutor`, `created_at`, `updated_at`) VALUES
(19, 45, 75, '2020-10-20 16:13:04', '2020-10-20 16:13:04'),
(20, 45, 81, '2020-10-20 16:13:04', '2020-10-20 16:13:04'),
(21, 45, 35, '2020-10-20 16:13:04', '2020-10-20 16:13:04'),
(22, 45, 80, '2020-10-20 16:13:04', '2020-10-20 16:13:04'),
(27, 47, 75, '2020-10-27 18:02:02', '2020-10-27 18:02:02'),
(28, 47, 81, '2020-10-27 18:02:02', '2020-10-27 18:02:02'),
(29, 47, 35, '2020-10-27 18:02:02', '2020-10-27 18:02:02'),
(30, 47, 80, '2020-10-27 18:02:02', '2020-10-27 18:02:02'),
(31, 48, 75, '2020-10-27 18:02:41', '2020-10-27 18:02:41'),
(32, 48, 81, '2020-10-27 18:02:41', '2020-10-27 18:02:41'),
(33, 48, 35, '2020-10-27 18:02:41', '2020-10-27 18:02:41'),
(34, 48, 80, '2020-10-27 18:02:41', '2020-10-27 18:02:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups_users`
--

CREATE TABLE `groups_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_group` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `groups_users`
--

INSERT INTO `groups_users` (`id`, `id_group`, `id_users`, `status`, `created_at`, `updated_at`) VALUES
(18, 45, 47, '', '2020-10-20 16:14:33', '2020-10-20 16:14:33'),
(19, 45, 48, '', '2020-10-20 16:15:06', '2020-10-20 16:15:06'),
(20, 45, 40, '', '2020-10-20 16:15:29', '2020-10-20 16:15:29'),
(21, 45, 41, '', '2020-10-20 16:16:42', '2020-10-20 16:16:42'),
(22, 45, 50, '', '2020-10-20 16:18:14', '2020-10-20 16:18:14'),
(23, 45, 51, '', '2020-10-20 16:19:17', '2020-10-20 16:19:17'),
(24, 45, 70, '', '2020-10-20 16:19:44', '2020-10-20 16:19:44'),
(25, 45, 52, '', '2020-10-20 16:20:35', '2020-10-20 16:20:35'),
(26, 45, 53, '', '2020-10-20 16:21:55', '2020-10-20 16:21:55'),
(27, 45, 78, '', '2020-10-20 16:22:18', '2020-10-20 16:22:18'),
(28, 45, 54, '', '2020-10-20 16:22:46', '2020-10-20 16:22:46'),
(29, 45, 55, '', '2020-10-20 16:23:10', '2020-10-20 16:23:10'),
(30, 45, 56, '', '2020-10-20 16:24:02', '2020-10-20 16:24:02'),
(31, 45, 57, '', '2020-10-20 16:24:34', '2020-10-20 16:24:34'),
(32, 45, 58, '', '2020-10-20 16:25:26', '2020-10-20 16:25:26'),
(33, 45, 59, '', '2020-10-20 16:26:00', '2020-10-20 16:26:00'),
(34, 45, 60, '', '2020-10-20 16:27:30', '2020-10-20 16:27:30'),
(35, 45, 61, '', '2020-10-20 16:28:34', '2020-10-20 16:28:34'),
(36, 45, 62, '', '2020-10-20 16:29:23', '2020-10-20 16:29:23'),
(37, 45, 63, '', '2020-10-20 16:30:05', '2020-10-20 16:30:05'),
(38, 45, 64, '', '2020-10-20 16:30:49', '2020-10-20 16:30:49'),
(39, 45, 65, '', '2020-10-20 16:31:17', '2020-10-20 16:31:17'),
(40, 45, 66, '', '2020-10-20 16:31:47', '2020-10-20 16:31:47'),
(41, 45, 67, '', '2020-10-20 16:32:12', '2020-10-20 16:32:12'),
(42, 45, 68, '', '2020-10-20 16:32:55', '2020-10-20 16:32:55'),
(43, 45, 69, '', '2020-10-20 16:33:20', '2020-10-20 16:33:20'),
(44, 45, 82, '', '2020-10-20 16:34:08', '2020-10-20 16:34:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_resets_table', 1),
(35, '2019_08_19_000000_create_failed_jobs_table', 1),
(36, '2020_06_21_221948_create_contents_table', 1),
(37, '2020_07_10_093822_create_roles_table', 1),
(38, '2020_07_10_104602_create_role_user_table', 1),
(39, '2020_07_26_192351_add_dni_to_users', 2),
(40, '2020_07_26_200530_create_courses_table', 3),
(41, '2020_07_26_202451_create_courses_users_table', 4),
(42, '2020_07_31_152224_create_foci_table', 5),
(43, '2020_07_31_152849_create_course_foci_table', 6),
(44, '2020_07_31_152917_create_foci_user_table', 6),
(45, '2020_09_22_102120_create_groups_table', 7),
(47, '2020_09_22_103508_create_groups_users_table', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('enderortega18@gmail.com', '$2y$10$NRMkuaScsLoF./ZSrT5puuIGRK.CPinjJ65DdFxLQMR950CNxgRNO', '2020-08-10 14:38:25'),
('enderortega@outlook.com', '$2y$10$uDgujO7hQzsd40OHyp6i1unn31D8EtzPLhEcFMqKxqxBHqzGOSGVC', '2020-10-27 23:36:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador', '2020-07-10 15:47:03', '2020-07-10 15:47:03'),
(2, 'aliado', 'Aliado', '2020-07-10 15:47:03', '2020-07-10 15:47:03'),
(3, 'beneficiaria', 'Beneficiaria', '2020-07-10 15:47:03', '2020-07-10 15:47:03'),
(4, 'tutor', 'Tutor', '2020-07-10 15:47:00', '2020-07-10 15:47:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'activated', NULL, NULL),
(15, 17, 1, 'activated', NULL, NULL),
(21, 35, 4, 'activated', '2020-10-02 21:19:00', '2020-10-02 21:19:00'),
(23, 37, 2, 'activated', '2020-10-03 15:33:01', '2020-10-03 15:33:01'),
(26, 40, 3, 'activated', '2020-10-03 17:25:26', '2020-10-03 17:25:26'),
(27, 41, 3, 'activated', '2020-10-03 17:48:31', '2020-10-03 17:48:31'),
(33, 47, 3, 'activated', '2020-10-03 18:00:54', '2020-10-03 18:00:54'),
(34, 48, 3, 'activated', '2020-10-03 18:04:41', '2020-10-03 18:04:41'),
(36, 50, 3, 'activated', '2020-10-03 18:38:18', '2020-10-03 18:38:18'),
(37, 51, 3, 'activated', '2020-10-03 22:27:12', '2020-10-03 22:27:12'),
(38, 52, 3, 'activated', '2020-10-03 22:43:55', '2020-10-03 22:43:55'),
(39, 53, 3, 'activated', '2020-10-03 22:54:49', '2020-10-03 22:54:49'),
(40, 54, 3, 'activated', '2020-10-03 23:02:40', '2020-10-03 23:02:40'),
(41, 55, 3, 'activated', '2020-10-03 23:09:14', '2020-10-03 23:09:14'),
(42, 56, 3, 'activated', '2020-10-03 23:15:30', '2020-10-03 23:15:30'),
(43, 57, 3, 'activated', '2020-10-03 23:20:23', '2020-10-03 23:20:23'),
(44, 58, 3, 'activated', '2020-10-03 23:30:04', '2020-10-03 23:30:04'),
(45, 59, 3, 'activated', '2020-10-03 23:36:54', '2020-10-03 23:36:54'),
(46, 60, 3, 'activated', '2020-10-03 23:41:41', '2020-10-03 23:41:41'),
(47, 61, 3, 'activated', '2020-10-03 23:47:05', '2020-10-03 23:47:05'),
(48, 62, 3, 'activated', '2020-10-03 23:53:10', '2020-10-03 23:53:10'),
(49, 63, 3, 'activated', '2020-10-03 23:57:48', '2020-10-03 23:57:48'),
(50, 64, 3, 'activated', '2020-10-04 00:06:53', '2020-10-04 00:06:53'),
(51, 65, 3, 'activated', '2020-10-04 00:12:02', '2020-10-04 00:12:02'),
(52, 66, 3, 'activated', '2020-10-04 00:16:54', '2020-10-04 00:16:54'),
(53, 67, 3, 'activated', '2020-10-04 00:24:53', '2020-10-04 00:24:53'),
(54, 68, 3, 'activated', '2020-10-04 00:46:17', '2020-10-04 00:46:17'),
(55, 69, 3, 'activated', '2020-10-04 00:50:43', '2020-10-04 00:50:43'),
(56, 70, 3, 'activated', '2020-10-05 23:15:37', '2020-10-05 23:15:37'),
(60, 74, 3, 'activated', '2020-10-06 01:17:02', '2020-10-06 01:17:02'),
(61, 75, 4, 'activated', '2020-10-06 02:07:45', '2020-10-06 02:07:45'),
(62, 76, 4, 'activated', '2020-10-06 02:10:50', '2020-10-06 02:10:50'),
(63, 77, 1, 'activated', '2020-10-06 13:45:09', '2020-10-06 13:45:09'),
(64, 78, 3, 'activated', '2020-10-06 17:25:57', '2020-10-06 17:25:57'),
(65, 79, 2, 'activated', '2020-10-06 23:21:03', '2020-10-06 23:21:03'),
(66, 80, 4, 'activated', '2020-10-07 18:50:05', '2020-10-07 18:50:05'),
(67, 81, 4, 'activated', '2020-10-07 21:34:41', '2020-10-07 21:34:41'),
(68, 82, 3, 'activated', '2020-10-16 15:31:24', '2020-10-16 15:31:24'),
(69, 83, 2, 'activated', '2020-10-27 17:16:33', '2020-10-27 17:16:33'),
(70, 84, 3, 'activated', '2020-10-27 23:36:08', '2020-10-27 23:36:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_dni` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni` bigint(20) DEFAULT NULL,
  `last_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `adress` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neighborhood` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `id_ally` bigint(20) UNSIGNED DEFAULT NULL,
  `civil_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_children` tinyint(1) DEFAULT NULL,
  `level_study` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_study` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `study_actually` tinyint(1) DEFAULT NULL,
  `what_studies` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_actually` tinyint(1) DEFAULT NULL,
  `laboral_sector` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bussiness_owner` tinyint(1) DEFAULT NULL,
  `way_working` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_company` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_not_to_work` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type_dni`, `dni`, `last_name`, `birthdate`, `adress`, `neighborhood`, `commune`, `phone`, `id_ally`, `civil_status`, `has_children`, `level_study`, `last_study`, `degree`, `study_actually`, `what_studies`, `work_actually`, `laboral_sector`, `bussiness_owner`, `way_working`, `type_company`, `time_not_to_work`) VALUES
(1, 'administrador', 'admin@mail.com', NULL, '$2y$10$yPzbmJL9f9rtcNG8DXW3huiDyXcaCU42ofugzBQ7WEah95UhPIZZC', '7h45G7ImCUbp9EuEI7r6KoXNKAj40Oq2ANp98W479UtYqidf5tmpjanlVsJu', '2020-07-10 15:47:03', '2020-07-10 15:47:03', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Carlos Alberto', 'carlosalbertoml@ufps.edu.co', NULL, '$2y$10$XeNmDlQkJKS2KiX.ex1J5O4DVrmY90v9qqaTQNWYdgMPLhoFpNUtS', 'G01vXN56XpRSKtZVAjEFdOgMvHDoQb5jwE3PqICFo3u4goiVSVxIEBZttW7X', '2020-10-02 21:19:00', '2020-10-02 21:19:00', 'Cedula de Ciudadanía', 1090514611, 'Mendoza Leal', '1998-03-30', 'Cll 2a norte #9-53', 'SEVILLA', '6', 3188108860, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Fundación', 'asoderedez_08@gmail.com', NULL, '$2y$10$Ot5BR.EPzq1emda88NGy7OSOFKtwl0TBDdU89FJXAGBGR5pBkyNUq', NULL, '2020-10-03 15:33:01', '2020-10-03 15:33:01', 'NIT', 9010766494, 'Deredez', '2016-01-01', 'Carrera 4 # 3-51', 'Alfonso Lopez, la parada- Villa del Rosario', NULL, 5654090, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Hermelina', 'hermelinaortegarubio26@gmail.com', NULL, '$2y$10$cGP9nnrFHE8IsA5ntRgf.OrYfDfw1Yh31wJJOv3iwU9siu8ce.6yq', NULL, '2020-10-03 17:25:26', '2020-10-03 17:25:26', 'Cedula de Ciudadanía', 60376568, 'Ortega Rubio', '1973-01-03', 'Carrera 4 # 3-51', 'La Parada', NULL, 3227654452, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Yoselin Paola', 'yphernandez4@gmail.com', NULL, '$2y$10$6OoZoQIzqRWARJNBO/ALneRWOZ8FJ2hNCTQXvJ4Ymq9fXSs62Hwcm', NULL, '2020-10-03 17:48:31', '2020-10-03 17:48:31', 'Cedula de Ciudadanía', 1092148190, 'Hernández Sandoval', '1991-01-03', 'Calle 17 # 14-16', 'La Esperanza, Villa del Rosario', NULL, 3172329461, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Ana Teresa', 'kbasuke946@gmail.com', NULL, '$2y$10$of8IxeWDD9MKHc1m0du6A.Csjdpskuw8OnYu7y4bq9ijn61PhMomy', NULL, '2020-10-03 18:00:54', '2020-10-03 18:00:54', 'Cedula de Ciudadanía', 42936381, 'Castillo Ramos', '1960-01-01', 'carrera 4 # 3-51', 'La Parada', NULL, 3134388605, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Nohora Cecilia', 'nhorabaez5@gmail.com', NULL, '$2y$10$ShZqJJvNU8VPRthVA7GRx.l5bmrG/frYkjblcZTl9Ui3qDhXsz.FG', NULL, '2020-10-03 18:04:41', '2020-10-03 18:04:41', 'Cedula de Ciudadanía', 60362590, 'Báez Gómez', '1970-01-03', 'Carrera 4 # 3-51', 'La Parada', NULL, 3503872375, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Yosmary Marcela', 'ymsandoval4@gmail.com', NULL, '$2y$10$/IXKXIECsZtYZ1jr0jM1BO1sZmuqdXy4vTTCQk5j2jEAcszlT8csi', NULL, '2020-10-03 18:38:18', '2020-10-03 18:38:18', 'Cedula de Ciudadanía', 1004914015, 'Hernández Sandoval', '2000-01-01', 'calle 17 # 14-16', 'La Esperanza alta, Villa del Rosario', NULL, 3170397878, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Gregoria', 'gysandoval4@gmail.com', NULL, '$2y$10$J1FClWvppzeKaZ98RRMZg.oAeUnx.QxTQvCImpJidRj.EY5BoTd6y', NULL, '2020-10-03 22:27:12', '2020-10-03 22:27:12', 'Cedula de Ciudadanía', 60401497, 'Sandoval', '1973-01-01', 'Calle 17 # 14-16', 'La Esperanza alta, Villa del Rosario', NULL, 3192133535, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Dina Maria', 'dina20_391@hotmail.com', NULL, '$2y$10$Z2G.S1hmFa.33dSmg3gVROT.Qw3N9HwI4rgufYlxpkWK0Czdw.Jm2', NULL, '2020-10-03 22:43:55', '2020-10-03 22:43:55', 'Cedula de Ciudadanía', 1092347778, 'Villegas', '1999-01-01', 'Carrera 7 # 3-17', 'Fátima, Villa del Rosario', NULL, 3507978954, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'Alix Adriana', 'alixnsotelo@gmail.com', NULL, '$2y$10$JGEWY7DLlkkJHvdTVY4Qy.BmXjglwHzlPIP86kqsw.Aou459D.9Uu', NULL, '2020-10-03 22:54:49', '2020-10-03 22:54:49', 'Cedula de Ciudadanía', 52280979, 'Niño Sotelo', '1980-01-01', 'Carrera 7 # 3-17', 'Fátima, Villa del Rosario', NULL, 3115942543, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Yazmin Zuleima', 'ezyasmin16@gmail.com', NULL, '$2y$10$pLgfyT87MjxgeE8QFlrvK.AMUF2dFSI.Kn6BDOQ/eaahC9joe5eom', NULL, '2020-10-03 23:02:40', '2020-10-03 23:02:40', 'Cedula de Ciudadanía', 60394283, 'Punzón Ramírez', '1975-01-03', 'Carrera 2 # 2-2A-37', 'La Playita , Villa del Rosario', NULL, 3115495825, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Isabel Andreina', 'v32210727@gmail.com', NULL, '$2y$10$B4Y6uVOjklZmEqKeluQopu4QPVo7F7pJ89qEflC.ydTVMYwSbUK4q', NULL, '2020-10-03 23:09:14', '2020-10-03 23:09:14', 'Cedula de Ciudadanía', 32210727, 'Pineda Suarez', '2000-01-05', 'Carrera 4 # 3-56', 'Alfonzo López , La Parada', NULL, 3144353394, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'María Iteresa', 'silanomary85@gmail.com', NULL, '$2y$10$w1ZuiSTVjmTnEcwEzLnR3O.j3jRu1aAUdagbHV5z94DzH3VWF02SG', NULL, '2020-10-03 23:15:30', '2020-10-03 23:15:30', 'Cedula de Ciudadanía', 1092391055, 'Silano Orozco', '1985-01-08', 'Carrera 3 # 4 -56', 'Alfonso López, La Parada', NULL, 4147335689, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Marinela', 'marinela4217@gmail.com', NULL, '$2y$10$wOkiqCQwollcriT/vB/BQuJKfoe/egXC754MgTW2HSnq376HqqCKm', NULL, '2020-10-03 23:20:23', '2020-10-03 23:20:23', 'Cedula de Ciudadanía', 60374493, 'Torres Perez', '1976-03-01', 'Carrera 3 # 4-56', 'Alfonso López, La Parada', NULL, 3134856810, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Rosa Yurley', 'rosaacevedo.00@gmail.com', NULL, '$2y$10$qMvNPKe7Gksqi5FiYQjN8uV0auZkODeJ1YoYr1K5MlszuD8kukt6G', NULL, '2020-10-03 23:30:04', '2020-10-03 23:30:04', 'Cedula de Ciudadanía', 1126708031, 'Acevedo Ortega', '1991-01-03', 'Calle 3 casa 6-97', 'Barrio La Esperanza', NULL, 4247650002, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Dioselider', 'lidesperez04@gmail.com', NULL, '$2y$10$MsdHnKyPzsiOYGnU0iyzsuwJC8KXx60Vd76m.2MzTbj3EFW0Ya0LK', NULL, '2020-10-03 23:36:54', '2020-10-03 23:36:54', 'Cedula de Ciudadanía', 37278887, 'Perez Ascanio', '1978-01-05', 'Calle 3 casa 6-97', 'La esperanza , Villa del Rosario', NULL, 3508519783, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Ana Ecilia', 'imbachiana414@gmail.com', NULL, '$2y$10$qNdN8twf1iruzZ.VWPBxf.3Ml3rVFz5iJJ1NFYP34qdAFHf1/YcmG', NULL, '2020-10-03 23:41:41', '2020-10-03 23:41:41', 'Cedula de Ciudadanía', 1061721958, 'Imbachi Perafan', '1989-01-03', 'Calle 3 casa 6-97', 'La Esperanza , Villa del Rosario', NULL, 3204673676, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Ana Belzabeth', 'betsabethbeltran7@gmail.com', NULL, '$2y$10$LLxWvPGRtlGblUYUqgTguuAa7IXWTd3/h1aRsnTn.KfkDfy6RMY7O', NULL, '2020-10-03 23:47:05', '2020-10-03 23:47:05', 'Cedula de Ciudadanía', 1010086749, 'Beltrán Castellano', '2000-01-05', 'Calle 4 casa 17-34', 'La Playita, La Parada', NULL, 3203432287, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Jeimy Paola', 'jeikmaster11@gmail.com', NULL, '$2y$10$934bCczScoCKE..vr0Iz8.5i1xKNUQf4wP.vSA8aWAgPaQ/i47Rw2', NULL, '2020-10-03 23:53:10', '2020-10-03 23:53:10', 'Cedula de Ciudadanía', 1127048609, 'Muñoz Meneces', '2002-02-03', 'Calle 2 casa 18 -23', 'La Playita, La Parada', NULL, 3202356745, NULL, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Johanna Graciela', 'lagalvis@hotmail.com', NULL, '$2y$10$N2rgJdn40UtrJhBKyhGq9eglRZVsm.L9TWrH1Je0hp6X1073C5w12', NULL, '2020-10-03 23:57:48', '2020-10-03 23:57:48', 'Cedula de Ciudadanía', 1090399895, 'Galvis Tenorio', '1988-02-05', 'Calle 2 casa 19-24', 'La Playita, La Parada', NULL, 3503728152, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'Itsamar', 'itsamarvillegas@gmail.com', NULL, '$2y$10$SEd30zXu7zKqWtDKUOUqgexYo.ErPHm.3WC5aph.dR/LaEW4wx2/6', NULL, '2020-10-04 00:06:53', '2020-10-04 00:06:53', 'Cedula de Ciudadanía', 1092362859, 'Villegas Echeverry', '1997-01-02', 'Avenida 4 # 29-43', 'Los Patios , Centro', NULL, 3157781258, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Orlianny Ester', 'orliannymedina99@gmail.com', NULL, '$2y$10$s0p5QbQGHMhTaa4OVVvgieiMMVUIaLrVC01T42tdjhfHWASE7UMP6', NULL, '2020-10-04 00:12:02', '2020-10-04 00:12:02', 'Cedula de Ciudadanía', 27997574, 'Briseño Medina', '2000-02-02', 'Calle 2 # 4-57', 'La Parada', NULL, 3115530565, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Yudy', 'yulitzapalechor@gmail.com', NULL, '$2y$10$/qO7gXpy2LDpw44euL6D0efukCRXA2cY9gYBfMzzPmYs/rTlSuRfi', NULL, '2020-10-04 00:16:54', '2020-10-04 00:16:54', 'Cedula de Ciudadanía', 1092344849, 'Palechor Quiñones', '1989-02-03', 'Calle 3 # 3- 18', 'Alfonso López , La Parada', NULL, 3153852733, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Mariela', 'abogadajaimesreatiga@gmail.com', NULL, '$2y$10$OU3NI9s4Zr8WLsQeTgiptOo/HqxTv03MQwiie.D6f9SA.RdT16XIa', NULL, '2020-10-04 00:24:53', '2020-10-04 00:24:53', 'Cedula de Ciudadanía', 63310719, 'Jaimes Reatiga', '1975-03-05', 'Calle 2 # 2-11', 'Villa del Rosario', NULL, 3115837776, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Luz Enith', 'luzyasadary@gmail.com', NULL, '$2y$10$j3CenyE8s1TbIw5EmKB9LOrHDy7IfpSvrS877cfX/qnUcWp/1cH2i', NULL, '2020-10-04 00:46:17', '2020-10-04 00:46:17', 'Cedula de Ciudadanía', 1092338576, 'Sanguinio Correa', '1987-02-27', 'Calle 2 # 2-11', 'Villa del Rosario', NULL, 3213266209, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'Carmenza', 'carmdur568@gmail.com', NULL, '$2y$10$oEvtpAZZGAnu6bUJFzQifOnFr9NbPQL3dmpjIS2WAC/0BRRD2lZ8m', NULL, '2020-10-04 00:50:43', '2020-10-04 00:50:43', 'Cedula de Ciudadanía', 60378822, 'Duran Tellez', '1974-03-06', 'Avenida 28 # 15 -90', 'Simon Bolivar', NULL, 3125278722, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Lina Marcela', 'hermelinaortegarubio26@gmail.com', NULL, '$2y$10$I6RFunF7P7Fs.EifOmb/9uBAnrFDTL0L7HUdCa8B6dbQsTk3iGDiS', NULL, '2020-10-05 23:15:37', '2020-10-05 23:15:37', 'Cedula de Ciudadanía', 1010016789, 'Herrera Ortega', '2001-05-03', 'Calle 3 nro 17', 'La Parada', NULL, NULL, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'JUAN SEBASTIAN', 'juansebastiancs@ufps.edu.co', NULL, '$2y$10$E9Rd0BnBo56jqtfWLzk5xuow.qavttLaoXfx3uMi/Ej02mEfF4JGy', NULL, '2020-10-06 02:07:45', '2020-10-06 02:07:45', 'Cedula de Ciudadanía', 1090529363, 'CASTELLANOS SANCHEZ', '1999-08-06', 'Altos del tamarindo casa m15', 'BOCONO', '3', 3165282884, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'Carlos Alberto', 'carlosalbertoml@ufps.edu.co', NULL, '$2y$10$TA8J9xfl56D7vauUj/aMTOJEfFeXwb63ptoHSRv4RboXD4NP8f9Gm', NULL, '2020-10-06 02:10:50', '2020-10-06 02:10:50', 'Cedula de Ciudadanía', 1090514611, 'Mendoza Leal', '1998-03-30', 'Calle 2a Norte N9-53', 'SEVILLA', '6', 3188108860, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'Administrador', 'admin@mujeresctiam.org', NULL, '$2y$10$jIqScx9Fo0gL0P9EW4siI.ofe.swrR9KtMaj/MWfIy1rKGCBYOK/W', NULL, '2020-10-06 13:45:09', '2020-10-06 13:45:09', 'Cedula de Ciudadanía', 123456789, NULL, '2000-01-01', 'UFPS', 'UFPS', '2', 5776655, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'Sandra Maria', 'hedier98@gmail.com', NULL, '$2y$10$c0qsyo3OABbPxNRk3lOG3uDtvhOlSYSPPGHVRCZVDdxFzSFj3o0qW', NULL, '2020-10-06 17:25:57', '2020-10-06 17:25:57', 'Cedula de Ciudadanía', 37331397, 'Sánchez Duran', '1978-01-08', 'Cra 2 # 2-2A-37', 'La Playita, Villa del Rosario', NULL, NULL, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Punto Vive Digital', 'vivelabcucuta@ufps.edu.co', NULL, '$2y$10$hV5lKorXKHyJVQ4BRO39UOQTZyBcbJ5ZUABy7ZPmpQpDKiiEtK.Vq', NULL, '2020-10-06 23:21:03', '2020-10-06 23:21:03', 'NIT', 8905006226, 'Lab', '2016-02-01', 'Av Gran Colombia N 12 E', 'COLSAG', '2', 3124434071, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'Diana Marcela', 'diiana0124@gmail.com', NULL, '$2y$10$btJyMS2lDeq8pPITQR3Kruj5489P.xttMR2evcTARyjwWEdSy6SzS', NULL, '2020-10-07 18:50:05', '2020-10-07 18:50:05', 'Cedula de Ciudadanía', 1090503011, 'Mora Delgado', '1997-01-24', 'Calle 20 # 4-66', 'SANTA TERESITA', '4', 3232856640, 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'Brandon Stiven', 'rodriguezkertlinbrandonstivend@ufps.edu.co', NULL, '$2y$10$nFdsNpvCmZ/6H402DeaOBefUCxK1NEIlDB6S9M2h8lvZc.R/DoJoG', NULL, '2020-10-07 21:34:41', '2020-10-07 21:34:41', 'Cedula de Ciudadanía', 1004922093, 'Delgado Rodríguez', '1999-03-13', 'Av 2 # 0-95', 'AEROPUERTO', '6', 3208369678, 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'Nancy Katherine', 'nancy-gcly@hotmail.com', NULL, '$2y$10$M9HvWz3cBELxk1.6igKKtu2KxFNqTVui83rfOEA6EywDc8ZDgpe1G', NULL, '2020-10-16 15:31:24', '2020-10-16 15:31:24', 'Cedula de Ciudadanía', 1149461444, 'Becerra Granados', '1989-01-05', 'Calle 1 8a19', 'SANTANDER', '10', 3197744640, 37, 'Soltera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'Gobernación de Norte de Santander', 'gobernacion@nortedesantander.gov.co', NULL, '$2y$10$tDzvMzN.DgwYeev9uKnOHuz/e3isGTAKFcw9xS3BN3TqyUJXDFT16', NULL, '2020-10-27 17:16:33', '2020-10-27 17:16:33', 'NIT', 8001039277, NULL, NULL, 'Av 5 calle 13 y 14 esquina', 'CENTRO', '1', 5710290, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'Ender Hernando', 'enderortega@outlook.com', NULL, '$2y$10$7QV/WmeYrt3yT/LcNAAamufuLtSD7hPGv6/nr41o.hM9Lbz1PgTp2', NULL, '2020-10-27 23:36:08', '2020-10-27 23:36:08', 'Cedula de Ciudadanía', 1090503218, 'Ortega Baez', '1997-02-18', 'Calle 1N 5-93', 'B.MERCED', '5', 3153042721, 83, 'Soltera', NULL, 'Técnica', 'Técnico', 'Asistencia Administrativa', 1, 'Pregrado', 1, 'Transporte y Almacenamiento', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_id_owner_foreign` (`id_owner`);

--
-- Indices de la tabla `course_foci`
--
ALTER TABLE `course_foci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_foci_course_id_foreign` (`course_id`),
  ADD KEY `course_foci_foci_id_foreign` (`foci_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `foci`
--
ALTER TABLE `foci`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `foci_user`
--
ALTER TABLE `foci_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foci_user_user_id_foreign` (`user_id`),
  ADD KEY `foci_user_foci_id_foreign` (`foci_id`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course_parent` (`id_course_parent`);

--
-- Indices de la tabla `groups_tutors`
--
ALTER TABLE `groups_tutors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_tutors_id_group_foreign` (`id_group`),
  ADD KEY `groups_tutors_id_tutor_foreign` (`id_tutor`);

--
-- Indices de la tabla `groups_users`
--
ALTER TABLE `groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_users_id_group_foreign` (`id_group`),
  ADD KEY `groups_users_id_users_foreign` (`id_users`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `course_foci`
--
ALTER TABLE `course_foci`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `foci`
--
ALTER TABLE `foci`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `foci_user`
--
ALTER TABLE `foci_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `groups_tutors`
--
ALTER TABLE `groups_tutors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `groups_users`
--
ALTER TABLE `groups_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `groups_tutors`
--
ALTER TABLE `groups_tutors`
  ADD CONSTRAINT `groups_tutors_id_group_foreign` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `groups_tutors_id_tutor_foreign` FOREIGN KEY (`id_tutor`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
