-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2023 a las 21:10:01
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurantedaw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria` bigint(20) UNSIGNED NOT NULL,
  `descripcion` longtext DEFAULT NULL,
  `precio` double(8,2) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `recomendado` tinyint(1) NOT NULL,
  `agotado` tinyint(1) NOT NULL DEFAULT 0,
  `imagen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `categoria`, `descripcion`, `precio`, `activo`, `tipo`, `recomendado`, `agotado`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Espaguetti con setas', 1, 'Velit animi laudantium a iste voluptas eum aut ut. Saepe ex saepe saepe ipsa pariatur eum. Enim voluptas quis blanditiis tempore rerum qui maxime.', 151.28, 1, 'cartamenu', 0, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(2, 'Revuelto de ajetes tiernos con gulas', 1, 'Qui facere omnis dolores vel. Dignissimos quis velit voluptate ea aut laboriosam. Ea nihil corrupti voluptatem veniam. Odit et distinctio deleniti enim exercitationem facere velit et.', 199.84, 1, 'menu', 1, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(3, 'Creppes con helado de chocolate', 1, 'Ipsum consectetur tempore sunt fuga. Et provident ea laborum et. Ea qui optio repellat qui voluptatem. Nemo velit aut sint fuga in aut voluptate.', 144.89, 1, 'menu', 0, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(4, 'Tarta de arandanos', 1, 'Est sed officiis sequi voluptate voluptatem qui non. Dolor quia a necessitatibus sed. Quis fugit occaecati a aut velit rem suscipit.', 188.90, 1, 'menu', 1, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(5, 'Anchoas en Escabeche', 1, 'Officia ut esse quis quod. Sint hic aut sint omnis veniam quo. Debitis est eos aperiam aperiam deleniti cupiditate.', 139.26, 0, 'cartamenu', 0, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(6, 'Pollo con patatas y salsa parmesana', 4, 'Consectetur qui quibusdam ut enim blanditiis. Beatae dolores minima doloremque. Dolores inventore commodi at illum facere.', 164.01, 1, 'cartamenu', 1, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(7, 'Revuelto de ajos tiernos', 2, 'Occaecati dolor error aut qui consectetur. Inventore numquam laborum libero et sed ut ut. Illum iste et ducimus expedita dolorem delectus a. Itaque id aut id id placeat.', 20.41, 0, 'cartamenu', 1, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(8, 'Calamares Fritos', 1, 'Quas saepe est reiciendis voluptatum praesentium aut. Ullam voluptas et nihil veritatis voluptate officia. Quaerat ut sit ratione soluta facere. Ad consequatur quod quis.', 9.67, 1, 'cartamenu', 0, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(9, 'Tortilla Sacromonte', 4, 'Voluptatibus voluptatem voluptas laborum temporibus totam quam qui. Officiis ratione cum doloremque. In optio non est dolorem tenetur.', 165.97, 1, 'menu', 0, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(10, 'Fritura de pescado', 3, 'Quos cum quia vel voluptatem rem non necessitatibus et. Similique ut sunt dolores. Cupiditate molestiae sint ducimus et quo quia quibusdam. Et quam qui omnis voluptas quidem aspernatur.', 177.35, 1, 'carta', 0, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(11, 'Sopa de marisco', 3, 'Quia qui cum nihil praesentium. Minus accusantium sint omnis quaerat repellat.', 86.94, 1, 'cartamenu', 1, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(12, 'Ensalada Cesar', 4, 'Omnis voluptatem assumenda odio. Nesciunt qui et animi laudantium. A iusto ut mollitia et odit velit necessitatibus sed. Dolores qui esse enim voluptatem cumque.', 28.68, 0, 'carta', 1, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(13, 'Ensalada de la casa ', 4, 'Suscipit deleniti nesciunt rerum aut sit. Eos in reprehenderit molestias id id. Dicta commodi dolor ut. Quidem aut neque eum explicabo voluptatum.', 55.33, 1, 'menu', 0, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(14, 'Carne con ajos', 1, 'Inventore nulla natus quam iste magnam nesciunt iusto ullam. Ad explicabo facilis dolores consectetur eos libero et. Qui sed deleniti dolorem incidunt. Quia est aut molestiae laboriosam eaque culpa.', 23.18, 0, 'carta', 1, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(15, 'Leche Frita', 2, 'Sed sunt qui dolorem vel deserunt maiores eos sint. Tempore quis et provident pariatur laudantium et. Aspernatur earum pariatur quidem soluta beatae. Nesciunt molestiae incidunt modi voluptas ut.', 58.46, 1, 'carta', 1, 0, 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Entrantes', 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(2, 'Primeros', 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(3, 'Segundo', 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(4, 'Postres', 'default', '2023-06-03 17:09:20', '2023-06-03 17:09:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcionCorta` longtext DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `dia` int(11) NOT NULL,
  `mes` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `descripcionCorta`, `descripcion`, `dia`, `mes`, `imagen`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Meú Navideño', 'Precio: 50€ (Menú especial de navidad y música en directo)', 'Contamos con Pierna de Cerdo al Horno, Mixiote Navideño, Lomo de Cerdo al Horno Navideño, Tradición Navideña: Romeritos con Camarón, Queso Relleno, Pozole Navideño, Pavo navideño ahumado de uva, Pavo glaseado con mandarina.', 24, 'Diciembre', 'default', 1, '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(2, 'Menú Fin de Año', 'Precio: 80€ (Menú especial de fin de año y música en directo con artistas exclusivos)', 'Contamos con los siguientes platos Cabrito Guisado, Solomillo Wellington, Gambones a la Plancha, Ostras Naturales, Bacalao con pisto de verduras, Ceviche de caballa, Mejillones en salsa picante, Mousse de chocolate.', 31, 'Diciembre', 'default', 1, '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(3, 'Menú Carnavalero', 'Precio: 40€ (Menú especial de carnaval con disfraces y sorpresas)', 'Ceviche Mixto, Ceviche de Pescado, Ceviche Camarón, Plancha de Mariscos, Cócteles.', 28, 'Febrero', 'default', 1, '2023-06-03 17:09:20', '2023-06-03 17:09:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seccion` varchar(255) NOT NULL,
  `texto1` varchar(255) DEFAULT NULL,
  `texto2` varchar(255) DEFAULT NULL,
  `texto3` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `seccion`, `texto1`, `texto2`, `texto3`, `imagen`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'menu', 'Como en', 'tu Propia', 'Casa', 'menu3.jpg', 1, '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(2, 'inicio', 'La Mejor', 'Ubicación', NULL, 'inicio1.jpg', 1, '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(3, 'inicio', 'Los Mejores Platos', 'Productos', 'Aquí!', 'inicio2.jpg', 1, '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(4, 'inicio', 'Gracias por', 'Elegirnos', NULL, 'inicio3.jpg', 1, '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(5, 'carta', 'Los Mejores', 'Productos', NULL, 'carta1.jpg', 1, '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(6, 'carta', 'Una Experiencia', 'Jamás', 'Vivida', 'carta2.jpg', 1, '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(7, 'carta', 'Sabemos', 'que te Encantará', NULL, 'carta3.jpg', 1, '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(8, 'menu', 'Menús', 'Diferentes cada', 'Día!', 'menu1.jpg', 1, '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(9, 'menu', 'La Mejor', 'Calidad', 'Precio', 'menu2.jpg', 1, '2023-06-03 17:09:20', '2023-06-03 17:09:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `comensales` int(11) NOT NULL,
  `estado` enum('disponible','ocupada','rota') NOT NULL DEFAULT 'disponible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `nombre`, `comensales`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Mesa 1', 6, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(2, 'Mesa 2', 4, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(3, 'Mesa 3', 2, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(4, 'Mesa 4', 8, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(5, 'Mesa 5', 10, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(6, 'Mesa 6', 10, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(7, 'Mesa 7', 4, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(8, 'Mesa 8', 4, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(9, 'Mesa 9', 2, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(10, 'Mesa 10', 6, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(11, 'Mesa 11', 8, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(12, 'Mesa 12', 4, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(13, 'Mesa 13', 4, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(14, 'Mesa 14', 2, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(15, 'Mesa 15', 6, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(16, 'Mesa 16', 2, 'disponible', '2023-06-03 17:09:20', '2023-06-03 17:09:20');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_08_100000_create_telescope_entries_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_01_16_121556_create_permission_tables', 1),
(7, '2023_01_18_090938_add_image_users_table', 1),
(8, '2023_04_07_073000_create_categorias_table', 1),
(9, '2023_04_07_093324_create_articulos_table', 1),
(10, '2023_05_14_115357_create_eventos_table', 1),
(11, '2023_05_15_094605_create_fotos_table', 1),
(12, '2023_05_15_181335_create_mesas_table', 1),
(13, '2023_05_15_181505_create_reservas_table', 1),
(14, '2023_05_23_093429_create_pedidos_table', 1),
(15, '2023_05_23_093435_create_productos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL DEFAULT 'AppModelsUser',
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL DEFAULT 'AppModelsUser',
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'AppModelsUser', 1),
(2, 'AppModelsUser', 2),
(3, 'AppModelsUser', 1),
(3, 'AppModelsUser', 2),
(3, 'AppModelsUser', 3),
(3, 'AppModelsUser', 4),
(3, 'AppModelsUser', 5),
(3, 'AppModelsUser', 6),
(3, 'AppModelsUser', 7),
(3, 'AppModelsUser', 8),
(3, 'AppModelsUser', 9),
(3, 'AppModelsUser', 10),
(3, 'AppModelsUser', 11),
(3, 'AppModelsUser', 12),
(3, 'AppModelsUser', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUsuario` bigint(20) UNSIGNED NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` enum('iniciado','pendiente','terminado') NOT NULL DEFAULT 'iniciado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.all', 'web', '2023-06-03 17:09:19', '2023-06-03 17:09:19'),
(2, 'admin.dashboard', 'web', '2023-06-03 17:09:19', '2023-06-03 17:09:19'),
(3, 'view.page', 'web', '2023-06-03 17:09:19', '2023-06-03 17:09:19');

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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idPedido` bigint(20) UNSIGNED NOT NULL,
  `idArticulo` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `agregado` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `fecha_reserva` datetime NOT NULL,
  `mesa` bigint(20) UNSIGNED NOT NULL,
  `comensales` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2023-06-03 17:09:19', '2023-06-03 17:09:19'),
(2, 'Admin', 'web', '2023-06-03 17:09:19', '2023-06-03 17:09:19'),
(3, 'User', 'web', '2023-06-03 17:09:19', '2023-06-03 17:09:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `batch_id` char(36) NOT NULL,
  `family_hash` varchar(255) DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `telescope_entries`
--

INSERT INTO `telescope_entries` (`sequence`, `uuid`, `batch_id`, `family_hash`, `should_display_on_index`, `type`, `content`, `created_at`) VALUES
(1, '99530a7e-0abe-4296-ac6d-f55b7de284dc', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `articulos`\",\"time\":\"20.31\",\"slow\":false,\"file\":\"C:\\\\laragon\\\\www\\\\RestauranteDAW\\\\app\\\\Models\\\\Articulos.php\",\"line\":32,\"hash\":\"5a91a3826c4be10ebdcd2ba7689dfd30\",\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(2, '99530a7e-0dd7-4c44-b9c6-d1e1b9b766d8', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'model', '{\"action\":\"retrieved\",\"model\":\"App\\\\Models\\\\Articulos\",\"count\":15,\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(3, '99530a7e-0f0e-4d9e-997f-fc3606cbe1d7', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `eventos`\",\"time\":\"0.68\",\"slow\":false,\"file\":\"C:\\\\laragon\\\\www\\\\RestauranteDAW\\\\app\\\\Models\\\\Eventos.php\",\"line\":27,\"hash\":\"5725538914c10c8b9a1649a825657482\",\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(4, '99530a7e-0f45-484d-9111-42bad3d9a9ac', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'model', '{\"action\":\"retrieved\",\"model\":\"App\\\\Models\\\\Eventos\",\"count\":3,\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(5, '99530a7e-0fd5-4712-b3f3-f91e6fe3dc9b', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'query', '{\"connection\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `fotos` where `seccion` = \'inicio\'\",\"time\":\"0.60\",\"slow\":false,\"file\":\"C:\\\\laragon\\\\www\\\\RestauranteDAW\\\\app\\\\Http\\\\Controllers\\\\MainController.php\",\"line\":40,\"hash\":\"40fefc606ef74b01a8ae53c6433c47d1\",\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(6, '99530a7e-100e-4882-800b-2694bbbd6c89', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'model', '{\"action\":\"retrieved\",\"model\":\"App\\\\Models\\\\Fotos\",\"count\":3,\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(7, '99530a7e-1445-41db-9294-66338f2225c1', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'view', '{\"name\":\"main\",\"path\":\"\\\\resources\\\\views\\/main.blade.php\",\"data\":[\"articulos\",\"recomendados\",\"activos\",\"eventos\",\"activas\",\"fotos\"],\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(8, '99530a7e-14c0-4ef2-a041-d39b2bf9e0ff', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'view', '{\"name\":\"sections.carrusel\",\"path\":\"\\\\resources\\\\views\\/sections\\/carrusel.blade.php\",\"data\":[\"articulos\",\"recomendados\",\"activos\",\"eventos\",\"activas\",\"fotos\"],\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(9, '99530a7e-1527-488f-83c5-289c737e5c82', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'view', '{\"name\":\"sections.recomendados\",\"path\":\"\\\\resources\\\\views\\/sections\\/recomendados.blade.php\",\"data\":[\"articulos\",\"recomendados\",\"activos\",\"eventos\",\"activas\",\"fotos\"],\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(10, '99530a7e-168c-4f15-bbbd-330800e529d6', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'view', '{\"name\":\"sections.eventos\",\"path\":\"\\\\resources\\\\views\\/sections\\/eventos.blade.php\",\"data\":[\"articulos\",\"recomendados\",\"activos\",\"eventos\",\"activas\",\"fotos\"],\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(11, '99530a7e-16f5-4996-82ed-2bac96bae049', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'view', '{\"name\":\"sections.footer\",\"path\":\"\\\\resources\\\\views\\/sections\\/footer.blade.php\",\"data\":[\"articulos\",\"recomendados\",\"activos\",\"eventos\",\"activas\",\"fotos\"],\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(12, '99530a7e-1795-42e4-a57c-84a62d7fa0f7', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'view', '{\"name\":\"layouts.app\",\"path\":\"\\\\resources\\\\views\\/layouts\\/app.blade.php\",\"data\":[\"articulos\",\"recomendados\",\"activos\",\"eventos\",\"activas\",\"fotos\"],\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(13, '99530a7e-189f-4b07-9e74-5557c1684353', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'view', '{\"name\":\"sections.header\",\"path\":\"\\\\resources\\\\views\\/sections\\/header.blade.php\",\"data\":[\"articulos\",\"recomendados\",\"activos\",\"eventos\",\"activas\",\"fotos\"],\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(14, '99530a7e-1a7c-4086-b080-f52d4d73f391', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'gate', '{\"ability\":\"admin.dashboard\",\"result\":\"denied\",\"arguments\":[],\"file\":\"C:\\\\laragon\\\\www\\\\RestauranteDAW\\\\storage\\\\framework\\\\views\\\\6b91ab226075f21f2da7099435a98345.php\",\"line\":27,\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(15, '99530a7e-1ac7-4c5d-b3bd-6663bb654c36', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'gate', '{\"ability\":\"admin.all\",\"result\":\"denied\",\"arguments\":[],\"file\":\"C:\\\\laragon\\\\www\\\\RestauranteDAW\\\\storage\\\\framework\\\\views\\\\6b91ab226075f21f2da7099435a98345.php\",\"line\":30,\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(16, '99530a7e-1b03-4e11-be12-ba28b398ce38', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'gate', '{\"ability\":\"admin.dashboard\",\"result\":\"denied\",\"arguments\":[],\"file\":\"C:\\\\laragon\\\\www\\\\RestauranteDAW\\\\storage\\\\framework\\\\views\\\\6b91ab226075f21f2da7099435a98345.php\",\"line\":164,\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(17, '99530a7e-1b2c-4cae-a361-cb339ce3b4e1', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'gate', '{\"ability\":\"admin.all\",\"result\":\"denied\",\"arguments\":[],\"file\":\"C:\\\\laragon\\\\www\\\\RestauranteDAW\\\\storage\\\\framework\\\\views\\\\6b91ab226075f21f2da7099435a98345.php\",\"line\":167,\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33'),
(18, '99530a7e-1dde-4c98-a3d9-4d663ebe8fd1', '99530a7e-1f2a-44e3-9fdd-27f7fb31a0ac', NULL, 1, 'request', '{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/\",\"method\":\"GET\",\"controller_action\":\"App\\\\Http\\\\Controllers\\\\MainController@index\",\"middleware\":[\"web\"],\"headers\":{\"host\":\"127.0.0.1:8000\",\"connection\":\"keep-alive\",\"cache-control\":\"max-age=0\",\"sec-ch-ua\":\"\\\"Microsoft Edge\\\";v=\\\"113\\\", \\\"Chromium\\\";v=\\\"113\\\", \\\"Not-A.Brand\\\";v=\\\"24\\\"\",\"sec-ch-ua-mobile\":\"?0\",\"sec-ch-ua-platform\":\"\\\"Windows\\\"\",\"upgrade-insecure-requests\":\"1\",\"user-agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/113.0.0.0 Safari\\/537.36 Edg\\/113.0.1774.57\",\"accept\":\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\",\"sec-fetch-site\":\"none\",\"sec-fetch-mode\":\"navigate\",\"sec-fetch-user\":\"?1\",\"sec-fetch-dest\":\"document\",\"accept-encoding\":\"gzip, deflate, br\",\"accept-language\":\"es,es-ES;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6\",\"cookie\":\"XSRF-TOKEN=eyJpdiI6InpCb2M3dXdnS2dSR3d5dkJ6dWdwV2c9PSIsInZhbHVlIjoiTW13L1lZWnpJcmFBOHJaZGF5S29BVGlxTWFtWCthUzQyTndOZWdIdVA3azRheTlmb2ZNOExiMnBxbE5VeVpJZ2NyYys4WXcrM1VKMVJXcGNscE1IcWtCbllKN0pBUDgzWGl2b3dRMnRDa0F3RW5haTNPZG8ydXg5TDhieXowdDAiLCJtYWMiOiIxN2QzY2JkOWM4ZWViZTk5N2NmNjU3MzgxZjViZjg2ZGVlNGY0NDEzNDZmYTg3NTY3YWVjYzBiMzhjZWM2NmVkIiwidGFnIjoiIn0%3D; restaurantedaw_session=eyJpdiI6ImMwWUJzSml3TnljUDF2b2lobm5qa2c9PSIsInZhbHVlIjoiV0Y3cDNKS2NVVFZjVXp5WWN3NEcrRWh2L3phbTdGT1NkVHd0REo5VEhheUVNak1KQ2xhYVduRklSZThTZ2JKbDR6UlBldE9hSU1lUVZ1RGs4elh0My82WGdLRkRJR2FiTy94aTV2bktVNkVKY1plamtUeDJBSTNGV3hGL2ROTG0iLCJtYWMiOiJiZDYxMDU2MTI3NGVjM2QzYmY5Nzc4MWU1YmI3NTE3ZWQ5Zjc4Nzc5ZGFiM2Y3MzIyYTVlMjgwNDkxNzBmY2IwIiwidGFnIjoiIn0%3D\"},\"payload\":[],\"session\":{\"_token\":\"5QSRG9ZPMyIB8Ajv2G11Nmi16rnUzGZSLkCJxg0H\",\"_previous\":{\"url\":\"http:\\/\\/127.0.0.1:8000\"},\"_flash\":{\"old\":[],\"new\":[]}},\"response_status\":200,\"response\":{\"view\":\"C:\\\\laragon\\\\www\\\\RestauranteDAW\\\\resources\\\\views\\/main.blade.php\",\"data\":{\"articulos\":{\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Collection\",\"properties\":[{\"nombre\":\"Espaguetti con setas\",\"categoria\":1,\"descripcion\":\"Velit animi laudantium a iste voluptas eum aut ut. Saepe ex saepe saepe ipsa pariatur eum. Enim voluptas quis blanditiis tempore rerum qui maxime.\",\"precio\":151.28,\"activo\":1,\"tipo\":\"cartamenu\",\"recomendado\":0,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Revuelto de ajetes tiernos con gulas\",\"categoria\":1,\"descripcion\":\"Qui facere omnis dolores vel. Dignissimos quis velit voluptate ea aut laboriosam. Ea nihil corrupti voluptatem veniam. Odit et distinctio deleniti enim exercitationem facere velit et.\",\"precio\":199.84,\"activo\":1,\"tipo\":\"menu\",\"recomendado\":1,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Creppes con helado de chocolate\",\"categoria\":1,\"descripcion\":\"Ipsum consectetur tempore sunt fuga. Et provident ea laborum et. Ea qui optio repellat qui voluptatem. Nemo velit aut sint fuga in aut voluptate.\",\"precio\":144.89,\"activo\":1,\"tipo\":\"menu\",\"recomendado\":0,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Tarta de arandanos\",\"categoria\":1,\"descripcion\":\"Est sed officiis sequi voluptate voluptatem qui non. Dolor quia a necessitatibus sed. Quis fugit occaecati a aut velit rem suscipit.\",\"precio\":188.9,\"activo\":1,\"tipo\":\"menu\",\"recomendado\":1,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Anchoas en Escabeche\",\"categoria\":1,\"descripcion\":\"Officia ut esse quis quod. Sint hic aut sint omnis veniam quo. Debitis est eos aperiam aperiam deleniti cupiditate.\",\"precio\":139.26,\"activo\":0,\"tipo\":\"cartamenu\",\"recomendado\":0,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Pollo con patatas y salsa parmesana\",\"categoria\":4,\"descripcion\":\"Consectetur qui quibusdam ut enim blanditiis. Beatae dolores minima doloremque. Dolores inventore commodi at illum facere.\",\"precio\":164.01,\"activo\":1,\"tipo\":\"cartamenu\",\"recomendado\":1,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Revuelto de ajos tiernos\",\"categoria\":2,\"descripcion\":\"Occaecati dolor error aut qui consectetur. Inventore numquam laborum libero et sed ut ut. Illum iste et ducimus expedita dolorem delectus a. Itaque id aut id id placeat.\",\"precio\":20.41,\"activo\":0,\"tipo\":\"cartamenu\",\"recomendado\":1,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Calamares Fritos\",\"categoria\":1,\"descripcion\":\"Quas saepe est reiciendis voluptatum praesentium aut. Ullam voluptas et nihil veritatis voluptate officia. Quaerat ut sit ratione soluta facere. Ad consequatur quod quis.\",\"precio\":9.67,\"activo\":1,\"tipo\":\"cartamenu\",\"recomendado\":0,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Tortilla Sacromonte\",\"categoria\":4,\"descripcion\":\"Voluptatibus voluptatem voluptas laborum temporibus totam quam qui. Officiis ratione cum doloremque. In optio non est dolorem tenetur.\",\"precio\":165.97,\"activo\":1,\"tipo\":\"menu\",\"recomendado\":0,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Fritura de pescado\",\"categoria\":3,\"descripcion\":\"Quos cum quia vel voluptatem rem non necessitatibus et. Similique ut sunt dolores. Cupiditate molestiae sint ducimus et quo quia quibusdam. Et quam qui omnis voluptas quidem aspernatur.\",\"precio\":177.35,\"activo\":1,\"tipo\":\"carta\",\"recomendado\":0,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Sopa de marisco\",\"categoria\":3,\"descripcion\":\"Quia qui cum nihil praesentium. Minus accusantium sint omnis quaerat repellat.\",\"precio\":86.94,\"activo\":1,\"tipo\":\"cartamenu\",\"recomendado\":1,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Ensalada Cesar\",\"categoria\":4,\"descripcion\":\"Omnis voluptatem assumenda odio. Nesciunt qui et animi laudantium. A iusto ut mollitia et odit velit necessitatibus sed. Dolores qui esse enim voluptatem cumque.\",\"precio\":28.68,\"activo\":0,\"tipo\":\"carta\",\"recomendado\":1,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Ensalada de la casa \",\"categoria\":4,\"descripcion\":\"Suscipit deleniti nesciunt rerum aut sit. Eos in reprehenderit molestias id id. Dicta commodi dolor ut. Quidem aut neque eum explicabo voluptatum.\",\"precio\":55.33,\"activo\":1,\"tipo\":\"menu\",\"recomendado\":0,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Carne con ajos\",\"categoria\":1,\"descripcion\":\"Inventore nulla natus quam iste magnam nesciunt iusto ullam. Ad explicabo facilis dolores consectetur eos libero et. Qui sed deleniti dolorem incidunt. Quia est aut molestiae laboriosam eaque culpa.\",\"precio\":23.18,\"activo\":0,\"tipo\":\"carta\",\"recomendado\":1,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"nombre\":\"Leche Frita\",\"categoria\":2,\"descripcion\":\"Sed sunt qui dolorem vel deserunt maiores eos sint. Tempore quis et provident pariatur laudantium et. Aspernatur earum pariatur quidem soluta beatae. Nesciunt molestiae incidunt modi voluptas ut.\",\"precio\":58.46,\"activo\":1,\"tipo\":\"carta\",\"recomendado\":1,\"agotado\":0,\"imagen\":\"default\",\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"}]},\"recomendados\":5,\"activos\":3,\"eventos\":{\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Collection\",\"properties\":[{\"titulo\":\"Me\\u00fa Navide\\u00f1o\",\"descripcionCorta\":\"Precio: 50\\u20ac (Men\\u00fa especial de navidad y m\\u00fasica en directo)\",\"descripcion\":\"Contamos con Pierna de Cerdo al Horno, Mixiote Navide\\u00f1o, Lomo de Cerdo al Horno Navide\\u00f1o, Tradici\\u00f3n Navide\\u00f1a: Romeritos con Camar\\u00f3n, Queso Relleno, Pozole Navide\\u00f1o, Pavo navide\\u00f1o ahumado de uva, Pavo glaseado con mandarina.\",\"dia\":24,\"mes\":\"Diciembre\",\"imagen\":\"default\",\"activo\":1,\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"titulo\":\"Men\\u00fa Fin de A\\u00f1o\",\"descripcionCorta\":\"Precio: 80\\u20ac (Men\\u00fa especial de fin de a\\u00f1o y m\\u00fasica en directo con artistas exclusivos)\",\"descripcion\":\"Contamos con los siguientes platos Cabrito Guisado, Solomillo Wellington, Gambones a la Plancha, Ostras Naturales, Bacalao con pisto de verduras, Ceviche de caballa, Mejillones en salsa picante, Mousse de chocolate.\",\"dia\":31,\"mes\":\"Diciembre\",\"imagen\":\"default\",\"activo\":1,\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"titulo\":\"Men\\u00fa Carnavalero\",\"descripcionCorta\":\"Precio: 40\\u20ac (Men\\u00fa especial de carnaval con disfraces y sorpresas)\",\"descripcion\":\"Ceviche Mixto, Ceviche de Pescado, Ceviche Camar\\u00f3n, Plancha de Mariscos, C\\u00f3cteles.\",\"dia\":28,\"mes\":\"Febrero\",\"imagen\":\"default\",\"activo\":1,\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"}]},\"activas\":3,\"fotos\":{\"class\":\"Illuminate\\\\Database\\\\Eloquent\\\\Collection\",\"properties\":[{\"seccion\":\"inicio\",\"texto1\":\"La Mejor\",\"texto2\":\"Ubicaci\\u00f3n\",\"texto3\":null,\"imagen\":\"inicio1.jpg\",\"activo\":1,\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"seccion\":\"inicio\",\"texto1\":\"Los Mejores Platos\",\"texto2\":\"Productos\",\"texto3\":\"Aqu\\u00ed!\",\"imagen\":\"inicio2.jpg\",\"activo\":1,\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"},{\"seccion\":\"inicio\",\"texto1\":\"Gracias por\",\"texto2\":\"Elegirnos\",\"texto3\":null,\"imagen\":\"inicio3.jpg\",\"activo\":1,\"created_at\":\"2023-06-03T19:09:20.000000Z\",\"updated_at\":\"2023-06-03T19:09:20.000000Z\"}]}}},\"duration\":297,\"memory\":22,\"hostname\":\"DESKTOP-OH7V444\"}', '2023-06-03 19:09:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `telescope_entries_tags`
--

INSERT INTO `telescope_entries_tags` (`entry_uuid`, `tag`) VALUES
('99530a7e-0dd7-4c44-b9c6-d1e1b9b766d8', 'App\\Models\\Articulos'),
('99530a7e-0f45-484d-9111-42bad3d9a9ac', 'App\\Models\\Eventos'),
('99530a7e-100e-4882-800b-2694bbbd6c89', 'App\\Models\\Fotos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `imagen`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jorcartriyo', 'jorcartriyo@gmail.com', '2023-06-03 17:09:19', 'default', '$2y$10$5L699luCSrtDBTXyVAgGielvLe/lq9.uTUySNVcnwULUq.u.8UhFC', '9TeG5gVKD2', '2023-06-03 17:09:19', '2023-06-03 17:09:19'),
(2, 'paco', 'paco@gmail.com', '2023-06-03 17:09:19', 'default', '$2y$10$v5DQwHAGqwPWQ82JqKGIG.I89xS6udGeAaLPALwy7ybq0bQzGZmW6', 'uPAqDG5M17', '2023-06-03 17:09:19', '2023-06-03 17:09:19'),
(3, 'manolo', 'manolo@gmail.com', '2023-06-03 17:09:19', 'default', '$2y$10$WF2Lb33XLxw/gAM/wE8dzuPibQo2YGASI6mQJxc2DxAbJ3d7z4AYG', 'mX1GE4elqj', '2023-06-03 17:09:19', '2023-06-03 17:09:19'),
(4, 'Ms. Maci Howe', 'quigley.virginia@example.com', '2023-06-03 17:09:19', 'default', '$2y$10$yDnVhTGSsujmleDmdTtWDOCNyyw5uNKkkCQqr7f7fUPFLKZVdN6CW', 'wIL7fKM6xD', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(5, 'Prof. Tyreek Schultz Jr.', 'janis97@example.com', '2023-06-03 17:09:19', 'default', '$2y$10$QaMCv1bwTWaEGHLWauJxpOtkZBGd2NU6g80IjZxAbDYx79QUkDE0O', '5mLo4xXxtt', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(6, 'Mariana Turner DVM', 'mayra72@example.net', '2023-06-03 17:09:19', 'default', '$2y$10$e/e0vJ6WItrQgHNCm8I90OLaKjtfRB/zb9I3Xu0.B9sUlFv03Wl0C', 'n2ypUKjFGw', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(7, 'Jacky Ullrich', 'jschulist@example.org', '2023-06-03 17:09:19', 'default', '$2y$10$67eGQtX3ygw5W1qbeSijjeHotJITpXrjnfKXxbvm7R6g5DfZoKq/m', 'hPETzZev4G', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(8, 'Jesse Weimann DDS', 'seamus.gerlach@example.org', '2023-06-03 17:09:19', 'default', '$2y$10$gCGfXRteqgxQyud9Am3IZu.1xj8aMx4LGHBbi9yRKeGyIZTcG02s.', 'VmIJKNW2mK', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(9, 'Beverly Funk', 'milton.kunze@example.org', '2023-06-03 17:09:19', 'default', '$2y$10$8C3pt.64ChMK.faqskenCOa3ALSylpi8kx31F1TF2xenvWKgkFEEe', 'V4YIl1pAP2', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(10, 'Mr. Vince Koepp DVM', 'shanna.spinka@example.org', '2023-06-03 17:09:19', 'default', '$2y$10$dyEKeDkfluaI.qBjNp/M6u6hqw9neMRw0NO6vVxsMUw5ouyhqytty', 'HWquIyyFF2', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(11, 'Elmer Dach', 'maureen21@example.org', '2023-06-03 17:09:19', 'default', '$2y$10$j5VHSoQ9b63ztjLYgf9B0O26fVufWVYYShe05F8u6SjZWT.sHhHoS', 'zmBoC3dPQu', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(12, 'Ewald Sipes', 'twaters@example.org', '2023-06-03 17:09:19', 'default', '$2y$10$EEcbJKZLnt4qqsYlpvKQO.uFZ2oizlSz7/2MDT3M7YG2eCE8ozr7.', 'IwLXvL6c4J', '2023-06-03 17:09:20', '2023-06-03 17:09:20'),
(13, 'Lorena Reichert', 'cbogan@example.org', '2023-06-03 17:09:20', 'default', '$2y$10$o4kJfAU5WBlOXjfdyl0QZ.iax2eGhW//NYXLnxD59pwz5GNGZiWl6', 'DPWR4QLQmf', '2023-06-03 17:09:20', '2023-06-03 17:09:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articulos_nombre_unique` (`nombre`),
  ADD KEY `articulos_categoria_foreign` (`categoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorias_categoria_unique` (`categoria`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `eventos_titulo_unique` (`titulo`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_idusuario_foreign` (`idUsuario`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_idpedido_foreign` (`idPedido`),
  ADD KEY `productos_idarticulo_foreign` (`idArticulo`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservas_mesa_foreign` (`mesa`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`),
  ADD KEY `telescope_entries_created_at_index` (`created_at`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`);

--
-- Indices de la tabla `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_categoria_foreign` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_idusuario_foreign` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_idarticulo_foreign` FOREIGN KEY (`idArticulo`) REFERENCES `articulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_idpedido_foreign` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_mesa_foreign` FOREIGN KEY (`mesa`) REFERENCES `mesas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
