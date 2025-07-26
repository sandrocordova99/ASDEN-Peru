-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2025 a las 18:40:06
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asden_peruv2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '2025_02_21_221323_create_contactos_table', 1),
(3, '2025_02_28_200753_create_sessions_table', 1),
(4, '2025_03_10_033049_create_user_a_s_d_e_n_s_table', 1),
(5, '2025_03_10_033741_create_posts_table', 1),
(6, '2025_03_10_033826_create_trabajo_table', 1),
(8, '2025_03_10_034209_create_commets_table', 1),
(9, '2025_03_10_044803_create_personal_access_tokens_table', 1),
(10, '2025_03_21_163940_create_noticias_table', 1),
(11, '2025_04_07_032858_create_reclamaciones_table', 2),
(12, '2025_04_21_205750_add_estado_to_reclamaciones_table', 3),
(13, '2025_04_30_184941_create_projects_table', 4),
(14, '2025_03_10_034125_create_solicitudes_table', 5),
(15, '2025_04_21_210122_add_estado_to_reclamaciones_table', 6),
(16, '2025_04_24_204530_create_comments_table', 7),
(17, '2025_05_13_221133_create_subscribers_table', 8),
(18, '2025_05_15_204327_add_is_active_to_subscribers_table', 9),
(19, '2025_05_15_205830_add_unsubscribe_token_to_subscribers_table', 10),
(20, '2025_05_20_190756_update_users_table_for_invitations', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `portada` varchar(255) DEFAULT NULL,
  `imagen_1` varchar(255) DEFAULT NULL,
  `imagen_2` varchar(255) DEFAULT NULL,
  `imagen_3` varchar(255) DEFAULT NULL,
  `resumen` varchar(255) NOT NULL,
  `tags` longtext NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `descripcion`, `portada`, `imagen_1`, `imagen_2`, `imagen_3`, `resumen`, `tags`, `user_id`, `created_at`, `updated_at`, `username`) VALUES
('NTC-2AB', '¿Frank Cuesta es en verdad un mentiroso?', '{\"parrafo_1\":{\"subtitulo\":\"Inicio\",\"contenido\":\"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci cum, itaque laudantium earum tenetur facilis atque reprehenderit repellendus similique sapiente quae eveniet voluptatum! Excepturi ut dignissimos molestias natus nemo praesentium, porro blanditiis molestiae accusamus? Beatae magnam, nam aliquid laborum sapiente odit explicabo sunt tempore recusandae porro vel, atque voluptates, quis soluta vitae iusto consectetur ipsa necessitatibus! Sit, quisquam, a voluptas placeat aspernat soluta vitae iusto consectetur ipsa necessitatibus! Sit, quisquam, a voluptas placeat aspernat soluta vitae iusto consectetur ipsa necessitatibus!\"},\"parrafo_2\":{\"subtitulo\":\"Desarrollo\",\"contenido\":\"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci cum, itaque laudantium earum tenetur facilis atque reprehenderit repellendus similique sapiente quae eveniet voluptatum! Excepturi ut dignissimos molestias natus nemo praesentium, porro blanditiis molestiae accusamus? Beatae magnam, nam aliquid laborum sapiente odit explicabo sunt tempore recusandae porro vel, atque voluptates, quis soluta vitae iusto consectetur ipsa necessitatibus! Sit, quisquam, a voluptas placeat aspernat soluta vitae iusto consectetur ipsa necessitatibus! Sit, quisquam, a voluptas placeat aspernat soluta vitae iusto consectetur ipsa necessitatibus!\"},\"parrafo_3\":{\"subtitulo\":\"Cierre\",\"contenido\":\"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci cum, itaque laudantium earum tenetur facilis atque reprehenderit repellendus similique sapiente quae eveniet voluptatum! Excepturi ut dignissimos molestias natus nemo praesentium, porro blanditiis molestiae accusamus? Beatae magnam, nam aliquid laborum sapiente odit explicabo sunt tempore recusandae porro vel, atque voluptates, quis soluta vitae iusto consectetur ipsa necessitatibus! Sit, quisquam, a voluptas placeat aspernat soluta vitae iusto consectetur ipsa necessitatibus! Sit, quisquam, a voluptas placeat aspernat soluta vitae iusto consectetur ipsa necessitatibus!\"}}', 'avatars/HYxVTEnAJmPQzY6UINhGaYBc4peVKxk9GSB6ee1w.webp', 'avatars/f3lDuCNQuirSvR6w9cAYn796j58t3qJCpW6rH6J9.webp', NULL, NULL, 'Buen resumen la verdad, sit amet consectetur adipisicing elit. Adipisci cum, itaque laudantium earum tenetur facilis atque reprehenderit repellendus similique sapiente quaee.', 'Agricultura', 'USR-4AA', '2025-05-20 02:34:51', '2025-05-24 21:15:59', 'User123'),
('NTC-ESB', 'Tenemos un nuevo Papa', '{\"parrafo_1\":{\"subtitulo\":\"Habemus Papam\",\"contenido\":\"Hace unos dias se dio a conocer al nuevo papa despues de la repentina muerte del papa Francisco, el nuevo papa de origen estadounidense se llama Robert Francis Prevost\\u200b\\u200b, eligi\\u00f3 su nombre como papa de Le\\u00f3n XIV, pero lo verdaderamente importante es que nuestro nuevo papa es un \'pe causa\', nacionalizado peruano en el 2015; durante su presentaci\\u00f3n mand\\u00f3 un saludo a su querida diocesis de Chiclayo, pero a parte de toda la celebraci\\u00f3n que se form\\u00f3 en nuestro pa\\u00eds por esta noticia; tambien comenzaron a salir comentarios y noticias en contra de nuestro querido papa amante del cuy.\"},\"parrafo_2\":{\"subtitulo\":\"Controversia LGBT\",\"contenido\":\"En los \\u00faltimos d\\u00edas, varios videos del papa caminando entre sus seguidores generaron debate en redes sociales. En algunas de estas grabaciones, se observa c\\u00f3mo parece evitar mirar o interactuar con una bandera que muchos interpretaron como la del orgullo LGBT. Esta percepci\\u00f3n caus\\u00f3 cierta incomodidad entre miembros de la comunidad, al pensar que se trataba de un gesto de rechazo. Sin embargo, al analizar con m\\u00e1s detalle las im\\u00e1genes, se confirm\\u00f3 que no se trataba de una bandera LGBT, sino de la bandera de la paz, que comparte una paleta de colores similar. A pesar de la confusi\\u00f3n, el incidente reaviv\\u00f3 conversaciones sobre la postura del Vaticano frente a la diversidad sexual y la inclusi\\u00f3n dentro de la Iglesia.\"},\"parrafo_3\":{\"subtitulo\":\"Controversia con Estados Unidos\",\"contenido\":\"Por otro lado, el descontento tambi\\u00e9n vino por parte de varios asistentes y usuarios estadounidenses, quienes criticaron al papa por no incluir el ingl\\u00e9s en su discurso oficial, optando \\u00fanicamente por hablar en italiano y espa\\u00f1ol. Esta decisi\\u00f3n fue vista por algunos como una falta de respeto hacia los fieles de habla inglesa, lo que deriv\\u00f3 en acusaciones de \\\"antinacionalismo\\\" e incluso comentarios que exig\\u00edan mayor representaci\\u00f3n ling\\u00fc\\u00edstica. La reacci\\u00f3n fue ampliamente debatida en redes, con muchos usuarios, especialmente en Am\\u00e9rica Latina, respondiendo con iron\\u00eda y celebrando el uso del espa\\u00f1ol como una peque\\u00f1a victoria cultural (a callar yankees, latam gano otra vez).\"}}', 'avatars/yJH8ceBDLpd8lYlKHsmN74AcmIGDu7XpKyLQixPK.webp', 'avatars/Wv4Uc8Dy1yc3QYniKqTRinLXliDCIbIKo6TY8E0p.webp', 'avatars/EeNOyrLL6DPROdUJkDGauT8TjgYX0SG8jgRvApUM.webp', NULL, 'Tras la muerte del papa Francisco, fue elegido León XIV, un estadounidense nacionalizado peruano. Saludó a Chiclayo, pero hubo críticas por una bandera confundida con la LGBT y quejas de estadounidenses por no hablar en inglés.', 'Medio Ambiente', 'USR-GL6', '2025-05-24 20:48:14', '2025-05-24 20:48:14', 'KalCio'),
('NTC-QJL', 'Vice City regresa en GTA 6, elevando a Rockstar.', '{\"parrafo_1\":{\"subtitulo\":\"Nuevo tr\\u00e1iler y fecha de lanzamiento\",\"contenido\":\"El esperado tr\\u00e1iler de Grand Theft Auto VI (GTA 6) ha capturado la atenci\\u00f3n mundial con su impresionante calidad visual y narrativa. Presentando a los protagonistas Jason y Luc\\u00eda en una historia que recuerda a Bonnie y Clyde, el tr\\u00e1iler muestra una Vice City renovada, ubicada en el estado ficticio de Leonida. La canci\\u00f3n \\\"Love Is a Long Road\\\" de Tom Petty acompa\\u00f1a escenas que sugieren una trama de amor y crimen. El juego, que saldr\\u00e1 el 26 de mayo de 2026, estar\\u00e1 disponible inicialmente para PS5 y Xbox Series X|S .\"},\"parrafo_2\":{\"subtitulo\":\"Innovaciones y detalles ocultos\",\"contenido\":\"Rockstar Games ha incorporado detalles sorprendentes en GTA 6. Desde la inclusi\\u00f3n de redes sociales in-game hasta la posibilidad de repostar veh\\u00edculos, cada elemento busca enriquecer la experiencia del jugador. Adem\\u00e1s, la ciudad de Leonida promete ser la m\\u00e1s vasta y detallada de la saga, con m\\u00faltiples localidades y ecosistemas por explorar.\"},\"parrafo_3\":{\"subtitulo\":\"Reacci\\u00f3n de la comunidad y expectativas\",\"contenido\":\"El tr\\u00e1iler ha generado una ola de teor\\u00edas y an\\u00e1lisis entre los fans. Algunos han reorganizado las escenas para proponer una cronolog\\u00eda de la historia, mientras que otros destacan la evoluci\\u00f3n gr\\u00e1fica de los personajes. La comunidad espera con ansias el lanzamiento, anticipando una de las entregas m\\u00e1s ambiciosas de la franquicia.\"}}', 'avatars/xV1Ru9xqPmTJfQTc7CUC75CGBCIYOMmt5WdugG39.webp', 'avatars/NqerZmBxaqP3272EvH2QKeV5HVdvW3bqa2WJbVO0.webp', 'avatars/DeU8VCOhaNSmwkQF33Luuo9k46zuKh2jgel6P2U2.webp', 'avatars/kNO0A0chwVsyTMGKra28Qd3cykeHyp0m4XJ6Mbcn.webp', 'GTA 6 reveló su tráiler con gráficos impresionantes y una historia ambientada en Vice City. La comunidad elogió los detalles y teoriza sobre la trama. Rockstar rediseñó su web, elevando aún más la expectativa global.', 'Biodiversidad', 'USR-4AA', '2025-05-06 03:43:36', '2025-05-24 21:17:48', 'Prueba Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(12, 'App\\Models\\UserASDEN', 'USR-UX1', 'token', '33264c71bec9c42b7433f88d385f4cfecd66e402eaf4d1e91e222738926f8d46', '[\"*\"]', '2025-03-22 20:34:50', NULL, '2025-03-22 20:33:04', '2025-03-22 20:34:50'),
(37, 'App\\Models\\UserASDEN', 'USR-PYU', 'token', 'f4ee38a66061461f6824dd9fec4f2e8d44fcad2ee3a13459447e17200186a11c', '[\"*\"]', '2025-04-09 01:12:07', NULL, '2025-04-09 01:12:07', '2025-04-09 01:12:07'),
(40, 'App\\Models\\UserASDEN', 'USR-1W4', 'token', 'a6c93e3f5304633e06dc2e70d87ca6a5bb11c1b308b7aac73004293e9c3631c4', '[\"*\"]', NULL, NULL, '2025-04-11 03:32:29', '2025-04-11 03:32:29'),
(50, 'App\\Models\\UserASDEN', 'USR_5AA', 'token', '6a68e854f103a894f6b6547d4eb63056f2d3e251020ce3fa9a8875d73d5f5a9e', '[\"*\"]', '2025-05-03 00:12:42', NULL, '2025-05-01 01:14:03', '2025-05-03 00:12:42'),
(76, 'App\\Models\\UserASDEN', 'USR-NRE', 'token', 'a77946e829fc90ebce35f368959017ea4962b6edcf6d79c9f972525281d0df57', '[\"*\"]', '2025-05-17 20:48:28', NULL, '2025-05-17 20:48:25', '2025-05-17 20:48:28'),
(85, 'App\\Models\\UserASDEN', 'USR-I3P', 'token', '8ede28acd8823a7887fa6b0e715e77d52563676504dfba33fa5eb8b2102672ed', '[\"*\"]', '2025-05-21 02:10:28', NULL, '2025-05-21 02:10:28', '2025-05-21 02:10:28'),
(91, 'App\\Models\\UserASDEN', 'USR-4AA', 'token', 'f2eb4d3275555f4c753e3003039432bf0dc45c78c38728f433702e0b24815e98', '[\"*\"]', '2025-05-24 21:39:45', NULL, '2025-05-24 20:23:38', '2025-05-24 21:39:45'),
(92, 'App\\Models\\UserASDEN', 'USR-GL6', 'token', '09564898de3c9c66e3b3e27c69eb460e9ba2b1bd17c37b0e68207ff5d40a8346', '[\"*\"]', '2025-05-24 21:39:46', NULL, '2025-05-24 20:29:23', '2025-05-24 21:39:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cards` text NOT NULL,
  `portada` varchar(255) DEFAULT NULL,
  `imagen_1` varchar(255) DEFAULT NULL,
  `imagen_2` varchar(255) DEFAULT NULL,
  `resumen` varchar(255) DEFAULT NULL,
  `tags` longtext NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `cards`, `portada`, `imagen_1`, `imagen_2`, `resumen`, `tags`, `user_id`, `created_at`, `updated_at`) VALUES
('POST-AQM', 'AriGameplays se vuelve cantante', '{\"parrafo_1\":{\"subtitulo\":\"Aria Bela, un nuevo lado de AriGameplays\",\"contenido\":\"Recientemente, la aclamada streamer y exesposa de Juan Guarnizo \\u2014el creador del \\\"Dios de Todo\\\", presidente de Aniquiladores FC y principal definici\\u00f3n de \\\"vitrinas vac\\u00edas\\\"\\u2014 comenz\\u00f3 un nuevo camino como cantante, debutando con un evento en el cual revel\\u00f3 su primera canci\\u00f3n, que no tardar\\u00eda en convertirse en el foco de atenci\\u00f3n de todos.\"},\"parrafo_2\":{\"subtitulo\":\"Nueva m\\u00fasica y sencillos\",\"contenido\":\"El nombre art\\u00edstico de Ari es Aria Bela, con el cual hizo su debut oficial en la industria musical al lanzar su primer sencillo titulado Pilates. Desde su estreno, la canci\\u00f3n ha generado una gran cantidad de comentarios en redes sociales y foros, provocando opiniones divididas entre los oyentes. Muchos han criticado el exceso de autotune en la producci\\u00f3n, lo que dificulta entender con claridad la letra. Sin embargo, a pesar de las cr\\u00edticas, Pilates ha captado la atenci\\u00f3n de una gran audiencia que celebra su estilo fresco y pegajoso. Gracias a esto, numerosos seguidores ya afirman estar entrando en lo que han bautizado como la Era Pilates, respaldando a Aria Bela en esta nueva etapa art\\u00edstica.\"}}', '{\"card_1\":{\"title_card_1\":\"Referencia a Faraon Love Shady\",\"text_card_1\":\"En un fragmento de su \\u00faltima canci\\u00f3n se escucha claramente un en\\u00e9rgico \\\"RAA\\\", lo que muchos fans consideran una referencia intencional al ic\\u00f3nico cantante peruano Fara\\u00f3n Love Shady, conocido por su estilo exc\\u00e9ntrico y frases virales que han marcado tendencia en redes sociales.\"},\"card_2\":{\"title_card_2\":\"Nueva canci\\u00f3n revelada\",\"text_card_2\":\"En los \\u00faltimos d\\u00edas ha dado pistas y anunciado la fecha de estreno de su nueva canci\\u00f3n. Se llama Online y ya se encuentra disponible en todas las plataformas. Cambia un poco el estilo respecto a su entrega anterior, adoptando un tono que recuerda a los corridos de M\\u00e9xico.\"}}', 'avatars/iExSwwsU5QIkDGO2ZW3UdqlW4lsHT7zEqc1Lqpwd.webp', 'avatars/dhLPKrO391erj4bTBiBu9xQzDJZEY6Lcz9oc2lcC.webp', NULL, 'AriGameplays debuta como cantante bajo el nombre de Aria Bela. Tras lanzar Pilates, tema que generó opiniones divididas, ahora presenta Online, con un estilo más cercano a los corridos mexicanos. Su carrera musical ya está dando mucho de qué hablar.', 'Stream,Musica,3.99', 'USR-GL6', '2025-05-24 21:28:05', '2025-05-24 21:28:05'),
('POST-FTZ', 'No man\'s Sky, la fuerza de toda una comunidad', '{\"parrafo_1\":{\"subtitulo\":\"Spirited, atrapado sin salida en No Man\\u2019s Sky\",\"contenido\":\"Un jugador conocido como Spirited qued\\u00f3 atrapado en un planeta extremadamente hostil dentro de No Man\\u2019s Sky, mientras jugaba en modo permadeath. Su nave qued\\u00f3 inutilizada, rodeado de oc\\u00e9anos t\\u00f3xicos y tormentas el\\u00e9ctricas constantes, sin recursos ni forma aparente de escapar. Con la salud deterior\\u00e1ndose y el ox\\u00edgeno agot\\u00e1ndose, decidi\\u00f3 compartir su situaci\\u00f3n en Reddit, no tanto para pedir ayuda, sino para relatar una experiencia l\\u00edmite dentro del juego. Su historia se volvi\\u00f3 viral, generando empat\\u00eda y apoyo inmediato de la comunidad.\"},\"parrafo_2\":{\"subtitulo\":\"La respuesta de la comunidad\",\"contenido\":\"La comunidad de No Man\\u2019s Sky respondi\\u00f3 r\\u00e1pidamente, ofreciendo consejos, recursos y apoyo moral. Jugadores experimentados compartieron estrategias para rescatar a Spirited, mientras que otros ofrecieron materiales y tecnolog\\u00eda para facilitar su escape tecnolog\\u00eda para facilitar su escape tecnolog\\u00eda para facilitar su escape tecnolog\\u00eda para facilitar su escape tecnolog\\u00eda para facilitar su escape tecnolog\\u00eda para facilitar su escape tecnolog\\u00eda para facilitar su escape tecnolog\\u00eda para facilitar su escape.\"}}', '{\"card_1\":{\"title_card_1\":\"Rescate en tiempo real: una operaci\\u00f3n coordinada\",\"text_card_1\":\"La comunidad organiz\\u00f3 una operaci\\u00f3n virtual para localizar y rescatar a Spirited. Utilizando las herramientas del juego y la comunicaci\\u00f3n en l\\u00ednea, lograron encontrar su ubicaci\\u00f3n y proporcionarle los recursos necesarios para reparar su nave y escapar del planeta.\"},\"card_2\":{\"title_card_2\":\"Lecciones de solidaridad en el universo digital\",\"text_card_2\":\"Este incidente destaca la importancia de la colaboraci\\u00f3n y el apoyo mutuo en los videojuegos. La comunidad de No Man\\u2019s Sky demostr\\u00f3 que, m\\u00e1s all\\u00e1 de la competencia, existe un fuerte sentido de comunidad y ayuda entre jugadores.\"}}', 'avatars/KxveUOI472rLNPAZMWev4UZJd6GUG2YzGxP2wPAm.webp', 'avatars/2BZKrJjugyoLVvWUz9bwaXtX2iEvpxxydORhb5dJ.webp', NULL, 'Un jugador quedó atrapado en No Man’s Sky y la comunidad organizó un rescate virtual. Su historia se volvió viral y mostró la solidaridad entre jugadores. Incluso el creador reaccionó.', 'Videojuegos,Comunidad', 'USR-4AA', '2025-05-24 21:24:12', '2025-05-24 21:31:24'),
('POST-ZZR', 'MrBeast y la polémica en templos mayas', '{\"parrafo_1\":{\"subtitulo\":\"Acceso exclusivo y alteraciones en el video\",\"contenido\":\"El 10 de mayo de 2025, el youtuber MrBeast (Jimmy Donaldson) public\\u00f3 un video titulado \\\"Sobreviv\\u00ed 100 Horas Dentro De Un Templo Antiguo\\\", donde se le ve explorando templos mayas en Yucat\\u00e1n, M\\u00e9xico. Aunque el acceso fue autorizado por el Instituto Nacional de Antropolog\\u00eda e Historia (INAH), se ha criticado que el video muestra escenas editadas que sugieren actividades no realizadas, como la manipulaci\\u00f3n de artefactos antiguos y un aterrizaje en helic\\u00f3ptero simulado.\"},\"parrafo_2\":{\"subtitulo\":\"Reacciones y acciones legales\",\"contenido\":\"El INAH ha presentado una demanda contra Full Circle Media, la productora del video, por presuntas violaciones a los acuerdos de filmaci\\u00f3n, incluyendo el uso no autorizado de im\\u00e1genes para promoci\\u00f3n comercial. La Secretar\\u00eda de Cultura de M\\u00e9xico tambi\\u00e9n ha expresado su preocupaci\\u00f3n por el respeto al patrimonio cultural.\"}}', '{\"card_1\":{\"title_card_1\":\"Hallazgos en la expedici\\u00f3n\",\"text_card_1\":\"Durante la grabaci\\u00f3n, MrBeast y su equipo descubrieron una estatua del dios del ma\\u00edz dentro de la boca de un jaguar, una pir\\u00e1mide construida sobre otra y una m\\u00e1scara funeraria representando a un rey del \\\"reino de la serpiente\\\".\"},\"card_2\":{\"title_card_2\":\"Impacto en la comunidad yucateca\",\"text_card_2\":\"La visita de MrBeast ha generado opiniones divididas entre los habitantes de Yucat\\u00e1n. Algunos consideran que su presencia puede atraer turismo y promover la cultura local, mientras que otros expresan preocupaci\\u00f3n por el respeto a las normativas de conservaci\\u00f3n y el uso comercial de los sitios arqueol\\u00f3gicos.\"}}', 'avatars/7bOVRlaVlMVVfLw7i4N7oTYMkt4CEAjepsHOjA9j.webp', 'avatars/xWvtEmeI3SBgkGaiyrqUq9WkjGcCqhFYg4WhnqR0.webp', 'avatars/MWlNPkYmLMLN9f98UtVWSQhGpPyL2aiqTaz1Htgk.webp', 'MrBeast visitó templos mayas con permiso del INAH, pero su video generó críticas por escenas alteradas y promoción comercial. El INAH demandó a la productora por violar los acuerdos de grabación.', 'Youtube,Mexico', 'USR-4AA', '2025-05-15 03:38:15', '2025-05-24 21:31:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` varchar(255) NOT NULL,
  `etapa` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumen` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `etiqueta` enum('Infraestructura','Tecnología','Consultoría','Vivienda','Construcción','Otros') NOT NULL,
  `portada` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `etapa`, `titulo`, `resumen`, `descripcion`, `etiqueta`, `portada`, `created_at`, `updated_at`) VALUES
('PRJ-DW6', 2024, 'Construcción de casas prefabricadas', 'ASDEN reconoce la necesidad de las viviendas, por ello, ha trabajado en diversos proyectos para que más familias sean dueñas de una.', 'ASDEN reconoce la urgente necesidad de acceso a una vivienda digna para muchas familias, especialmente en contextos de vulnerabilidad. Por ello, ha venido trabajando en el desarrollo y acompañamiento', 'Vivienda', 'images/X36wG0Z8s5wgBfIQ08UEuSP3lJKB0drgM5bsbDg5.webp', '2025-05-16 00:52:42', '2025-05-24 20:36:12'),
('PRJ-NEL', 2023, 'Elaboración de Proyectos y Asesoramiento', 'Se apoyó con estudios, elaboración y asesoramiento de proyectos para el Centro Poblado Nuevo Ayacucho de Chincha (Ica).', 'Con el objetivo de mejorar el acceso a servicios básicos en el Centro Poblado Nuevo Ayacucho, en Chincha (Ica), se brindó apoyo a través de la realización de estudios, la elaboración de proyectos y el', 'Consultoría', 'images/S8UxlkYONgSvO3VqGiFMmiiAKpfKyoGJ6IhBw0jR.webp', '2025-05-16 01:07:00', '2025-05-24 20:36:37'),
('PRJ-NRK', 2024, 'Apoyo técnico para perforación de pozo artesanal', 'A fin de que el Centro Poblado Nuevo Ayacucho de Chincha (Ica) pueda mejorar su acceso al agua, se brindó apoyo técnico con el proyecto.', 'A fin de que el Centro Poblado Nuevo Ayacucho, ubicado en Chincha (Ica), pueda mejorar su acceso al agua potable, se brindó apoyo técnico en la formulación y desarrollo del proyecto correspondiente.', 'Tecnología', 'images/Op10SzchcGeesI4388FLLAzO96J5SMJgMDtuqvtV.webp', '2025-05-16 01:08:21', '2025-05-24 20:37:11'),
('PRJ-ZX8', 2023, 'Proyectos de Agua y Alcantarillado', 'Dada la falta de agua y desagüe, ASDEN viene trabajando en distintos proyectos para que más familias accedan a estos servicios.', 'Dada la falta de acceso a servicios básicos como el agua potable y el desagüe, ASDEN ha venido trabajando de manera constante en el desarrollo de diversos proyectos con el objetivo de mejorar.', 'Infraestructura', 'images/6cv2JvlRPMrzZW152uqcJqrG3eDKM6uBHjiElqQQ.webp', '2025-05-03 03:42:55', '2025-05-24 20:41:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamaciones`
--

CREATE TABLE `reclamaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `numeroDocumento` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `distrito` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `tipoReclamo` varchar(255) NOT NULL,
  `fechaIncidente` date NOT NULL,
  `reclamoPerson` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reclamaciones`
--

INSERT INTO `reclamaciones` (`id`, `nombre`, `apellido`, `documento`, `numeroDocumento`, `email`, `celular`, `direccion`, `distrito`, `ciudad`, `tipoReclamo`, `fechaIncidente`, `reclamoPerson`, `created_at`, `updated_at`, `estado`) VALUES
(7, 'Miguel', 'Sanchez', 'DNI', '75884134', 'giovanni@gmail.com', '999999999', 'Ticrapo', 'Ticrapo', 'Ticrapo', 'QUEJA', '2025-04-22', 'F', '2025-04-07 09:57:26', '2025-05-01 01:56:52', 'Atendido'),
(25, 'Rodrigo', 'Alca', 'DNI', '98765432', 'u20233057@utp.edu.pe', '984325600', 'Villa Periodista c-9', 'Ica', 'Ica', 'RECLAMO', '2025-04-08', 'aea', '2025-04-19 19:42:58', '2025-04-22 01:13:35', 'Pendiente'),
(26, 'Carlos', 'Luna', 'DNI', '7777777777', 'carlos@gmail.com', '999999999', 'Ica', 'Ica', 'Ica', 'QUEJA', '2025-04-11', 'no', '2025-04-22 02:06:18', '2025-04-22 02:43:33', 'Pendiente'),
(31, 'Giovanni', 'Alca', 'DNI', '0000000', 'u20233057@utp.edu.pe', '984325600', 'Llipata', 'AAAAAAAAAAAAAA', 'Llipata', 'QUEJA', '2025-04-30', 'aea', '2025-05-01 00:50:26', '2025-05-01 00:50:26', 'Pendiente'),
(32, 'Javier Alonzo', 'Quispe Rivera', 'DNI', '75334082', 'nonamesteam123@gmail.com', '959215783', 'fsdfsdffds', 'Callao', 'Callao', 'QUEJA', '2025-05-07', 'xsadxsdxasdasxadssxad', '2025-05-08 00:55:14', '2025-05-10 21:28:39', 'Atendido'),
(33, 'Pedro', 'Asnillo', 'DNI', '75334082', 'nonamesteam123@gmail.com', '455435435', 'fsdfsdffds', 'Callao', 'Callao', 'QUEJA', '2025-05-10', 'MUY MAL MUY MAL', '2025-05-10 21:04:05', '2025-05-14 00:08:44', 'Atendido'),
(34, 'PEDRO', 'BDSD', 'DNI', '32424324', 'nonamesteam123@gmail.com', '223124324', 'fsdfsdffds', 'Callao', 'Callao', 'QUEJA', '2025-05-10', 'fgsdfsdfsfsdfdsf', '2025-05-10 21:08:07', '2025-05-10 21:13:51', 'Atendido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dwVRfk3RBtmBjmbq2EDrmV74rPawZ76zJm6zu95R', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWllKOXZPa1BXckVNN3M1VkpNdTlPRXRjdER6bXJrTHMzSkp2cGhjVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qb2JCb2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1743462039);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `estado` enum('Pendiente','Aceptado','Rechazado') NOT NULL DEFAULT 'Pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trabajo_id` varchar(255) NOT NULL,
  `salario` double DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscribers`
--

CREATE TABLE `subscribers` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `unsubscribe_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `is_active`, `unsubscribe_token`, `created_at`, `updated_at`) VALUES
('SUB-ZIE', 'nonamesteam123@gmail.com', 1, 'P6yqgu5yGEFiY5HXOADjgr3nzg2HfIk7', '2025-05-20 01:05:05', '2025-05-20 01:05:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `modalidad` enum('Presencial','Remoto','Híbrido') NOT NULL,
  `tipo_trabajo` enum('Prácticas','Jornada Completa','Jornada Parcial','Voluntariado') NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad_puestos` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `resumen` varchar(255) NOT NULL,
  `funciones` varchar(255) NOT NULL,
  `beneficios` varchar(255) NOT NULL,
  `requisitos` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `titulo`, `modalidad`, `tipo_trabajo`, `descripcion`, `cantidad_puestos`, `created_at`, `updated_at`, `resumen`, `funciones`, `beneficios`, `requisitos`, `color`) VALUES
('TRB-TGJ', 'TRABAJOOOAAAA', 'Presencial', 'Jornada Parcial', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', 45, '2025-05-16 03:18:50', '2025-05-16 03:18:50', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.', '#000000'),
('TRB-TNZ', 'DEASDASDASDFSDFDSF', 'Presencial', 'Jornada Parcial', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', 34, '2025-05-16 00:19:38', '2025-05-16 00:19:38', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', '#000000'),
('TRB-TVV', 'Chambeador', 'Híbrido', 'Voluntariado', 'a', 2, '2025-04-02 03:00:58', '2025-04-02 03:00:58', 'a', 'a', 'a', 'a', '#4CAF50'),
('TRB-U5I', 'FULLSTACK JUNIOR', 'Híbrido', 'Voluntariado', 'Ingeniero de Software Full Stack Ingeniero de Software Ingeniero de Software Ingeniero de Software Ingeniero de Software Ingeniero de Software Ingeniero de Software Ingeniero de Software Ingeniero de Software', 1, '2025-04-02 02:32:14', '2025-05-13 01:05:27', 'Ingeniero de Software Ingeniero de Software Ingeniero de Software Ingeniero de Software', 'Dominio de tecnologías como HTML, CSS, JavaScript, Node.js, y bases de datos SQL/NoSQL.', 'Dominio de tecnologías como HTML, CSS, JavaScript, Node.js, y bases de datos SQL/NoSQL.', 'Oportunidades de crecimiento profesional.\r\nHorario flexible y beneficios adicionales.', '#2196f3'),
('TRB-WSW', 'Trabajo bueno', 'Híbrido', 'Jornada Completa', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', 34, '2025-05-16 02:49:22', '2025-05-16 02:49:22', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', '#9c3535'),
('TRB-XVS', 'Trabajo bueno', 'Presencial', 'Jornada Parcial', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', 34, '2025-05-16 02:49:01', '2025-05-16 02:49:01', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', 'Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrollo front-end y back-end.Desarrollador Web Senior con más de 5 años de experiencia en desarrol', '#000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_a_s_d_e_n_s`
--

CREATE TABLE `user_a_s_d_e_n_s` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `invitation_token` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_a_s_d_e_n_s`
--

INSERT INTO `user_a_s_d_e_n_s` (`id`, `name`, `lastname`, `username`, `email`, `password`, `invitation_token`, `avatar`, `bio`, `role`, `created_at`, `updated_at`, `email_verified_at`) VALUES
('USR-4AA', 'Prueba', 'Admin', 'User123', 'admin@hotmail.com', '$2y$12$OAwfxlIBkH2oTogCYxd4l.fxFCX1E.sxE6eucK3DlyFOfdn5dZ0j2', NULL, 'avatars/pSegdbcNKxCJU9h1MqYwHES9smtGWcHFhMWy5tiF.webp', 'Prueba Admin', 'admin', '2025-03-22 20:33:53', '2025-05-24 20:24:53', '2025-04-29 02:59:09'),
('USR-GL6', 'Kaleb', 'Zambrano', 'KalCio', 'kalebzambranob28@gmail.com', '$2y$12$OAwfxlIBkH2oTogCYxd4l.fxFCX1E.sxE6eucK3DlyFOfdn5dZ0j2', NULL, 'avatars/Y7a0MtCY1IZ3Qj0S9Oji0rClVAaTWyBPXgX3GLCc.webp', NULL, 'admin', '2025-05-24 20:27:57', '2025-05-24 21:38:09', '2025-05-24 20:27:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commets_post_id_foreign` (`post_id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contactos_email_unique` (`email`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noticias_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reclamaciones`
--
ALTER TABLE `reclamaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `solicitudes_dni_unique` (`dni`),
  ADD KEY `solicitudes_trabajo_id_foreign` (`trabajo_id`);

--
-- Indices de la tabla `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`),
  ADD UNIQUE KEY `subscribers_unsubscribe_token_unique` (`unsubscribe_token`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_a_s_d_e_n_s`
--
ALTER TABLE `user_a_s_d_e_n_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_a_s_d_e_n_s_username_unique` (`username`),
  ADD UNIQUE KEY `user_a_s_d_e_n_s_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `reclamaciones`
--
ALTER TABLE `reclamaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `commets_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_a_s_d_e_n_s` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_a_s_d_e_n_s` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_trabajo_id_foreign` FOREIGN KEY (`trabajo_id`) REFERENCES `trabajos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
