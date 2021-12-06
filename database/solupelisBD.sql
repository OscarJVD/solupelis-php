-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2020 a las 22:14:17
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solupelisbd2`
--
DROP DATABASE IF EXISTS solupelis;
CREATE DATABASE IF NOT EXISTS solupelis;
USE solupelis;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `img_category` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `status_id`,`img_category`) VALUES
(1, 'Drama', 2,'assets/img/categories/drama.jpg'),
(2, 'Terror', 1,'assets/img/categories/horror.jpg'),
(3, 'Comedia', 1,'assets/img/categories/comedy.jpg'),
(4, 'Accion', 1,'assets/img/categories/action.jpg'),
(5, 'Aventura', 1,'assets/img/categories/adventure.jpg'),
(6, 'Ciencia Ficción', 1,'assets/img/categories/fiction.jpg'),
(7, 'Musical', 1,'assets/img/categories/musical.jpg'),
(8, 'Guerra', 1,'assets/img/categories/war.jpg'),
(9, 'Crimen', 1,'assets/img/categories/crimen.jpg'),
(10, 'Animación', 1,'assets/img/categories/animation.jpg'),
(11, 'Infantil', 2,'assets/img/categories/childish.jpg'),
(12, 'Para Adultos', 1,'assets/img/categories/adults.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_movie`
--

CREATE TABLE `category_movie` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category_movie`
--

INSERT INTO `category_movie` (`id`, `movie_id`, `category_id`, `status_id`) VALUES
(1, 1, 9, 1),
(2, 2, 1, 1),
(3, 3, 3, 1),
(4, 4, 3, 1),
(5, 5, 1, 1),
(6, 6, 1, 1),
(7, 7, 5, 1),
(8, 8, 10, 1),
(9, 9, 4, 1),
(10, 10, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movie`
--

INSERT INTO `movie` (`id`, `name`, `description`, `users_id`, `status_id`) VALUES
(1, 'INTOCABLES', 'Philippe (François Cluzet, \'No se lo digas a nadie\') es un hombre adinerado que pertenece a la alta sociedad. Sin embargo, su vida cambiará para siempre después de un aparatoso accidente de parapente que lo dejará inválido y en silla de ruedas. Ya no podrá hacer nada por sí mismo, así que tendrá que contratar a un asistente para que le ayude a desplazarse y a cuidar de él en la casa. La persona que quedará a su cargo será Driss (Omar Sy, \'Micmacs\'), un joven de color necesitado de dinero que procede de un barrio marginal y que para colmo acaba de ser liberado de la cárcel. Aunque parecen destinados a no llevarse bien, Philippe y Driss encontrarán el uno en el otro la ilusión que les falta en sus vidas. Aprenderán a apreciar y a mezclar a Vivaldi con el hip hop, los trajes hechos a medida con la ropa holgada y el chándal y la exquisitez en el paladar con la hamburguesa callejera. Si separados son personas frágiles, juntos serán intocables.El tandem de directores formado por Eric Toledano y Olivier Nakache ha conseguido un éxito rotundo de taquilla en Francia, convirtiéndose \'Intocable\' en la película más vista de la temporada en el país vecino.', 2, 2),
(2, 'EN BUSCA DE LA FELICIDAD', 'Chris Gardner, un joven padre de familia, está tratando de ganarse la vida. Nunca ha tenido un trabajo estable y se pasa los días haciendo malabares. Su mujer en cambio, va en contra de la forma que tiene para salir adelante. Un día, harta de todo, decide abandonar a Chris y a su hijo de cinco años, Christopher. En ese momento, la vida de ambos cambiará para siempre cuando todo se complique y tengan que vivir momentos difíciles, como el embargo de su casa o el esfuerzo en vano por buscar un buen empleo con el que poder mantenerse. Perdido en el peor calvario de su vida, Chris seguirá velando por Christopher, basándose en el afecto y la confianza de su hijo, que se convertirá en la fuerza que le ayudará a superar los obstáculos ...', 2, 2),
(3, 'LA MADRINA', '						', 3, 1),
(4, 'SIEMPRE A TU LADO HACHIKO', 'Parker Wilson (Richard Gere, \'El caso Wells\') es un profesor de universidad que trabaja lejos de su casa. Todos los días se acerca a la estación de tren para trasladarse a su oficio. No obstante, un día en el que regresa del trabajo, encuentra en la estación de tren un perro, aún cachorro, de la raza akita. Sin saber con quién dejar al animal, decide llevárselo a su casa aun sabiendo que su esposa no quiere tener animales en casa. Con el paso del tiempo, Parker y \"Hachi\", su nueva mascota, se terminan haciendo inseparables, acompañando el perro a su dueño en todas las tareas de casa. Tanto es el grado en el que se quieren que Hachi, al crecer, termina yendo a buscar a su dueño cada día a la estación de tren, ya que le echa de menos. Sin embargo, un inesperado acontecimiento, termina cambiando de nuevo sus vidas.', 4, 1),
(5, 'FORREST GUMP', 'Al tener el coeficiente intelectual de un niño, Forrest Gump siempre ha sido considerado el “tonto” de clase. Bajo las faldas de su madre se siente protegido y junto a su amiga Jenny es feliz, aunque en su propio mundo. Un problema en su columna vertebral no le impide convertirse en un ágil corredor. Ya más mayor, Forrest luchará en la guerra de Vietnam y conocerá al mismísimo presidente de los Estados Unidos. Llegará a ser muy rico, pero para Forrest hay algo que no cambia: el amor de su vida es y será Jenny.   Robert Zemeckis (\'Back for the Future\', \'El vuelo\') es el director de este largometraje, contando con la activa participación de Eric Roth para adaptar la historia original creada en su día por el novelista Winston Groom. En cuanto al reparto de la obra, cabe destacar la presencia de diversos intérpretes de gran nivel en lo que se refiere al ámbito cinematográfico como es el caso de Tom Hanks (\'Capitán Phillips\', \'American Gods\') o Robin Wright (\'House of Cards\', \'A Most Wanted Man\').', 5, 1),
(6, 'LA VIDA ES BELLA', 'La Segunda Guerra Mundial está a punto de estallar en Europa. Mientras tanto, Guido llega a un pueblo italiano con la intención de abrir una librería. Allí se enamora de la novia de un fascista italiano, Dora. Ésta sucumbirá a sus encantos y Guido consigue que se case con él.  De la bonita unión nace un pequeño que tendrá que vivir en primera persona los horrores de la guerra. La familia será recluida en un campo de concentración. Guido hará todo lo que esté en sus manos para hacer creer a su hijo que la vida es bella y que todo lo que están viviendo no es más que un juego…  La conocida película escrita, dirigida y protagonizada por Roberto Benigni (El tigre y la nieve, Pinocchio) consiguió, nada más y nada menos, que tres Oscar (Mejor Actor, Mejor Película de Habla No Inglesa y Mejor Banda Sonora) en el año 1998. La conmovedora historia arrasó en múltiples festivales de cine. También, en el año 1998, llegó a conseguir el Goya a la Mejor Película Europea. La actriz Nicolleta Braschi (El tigre y la nieve) dando vida a Dora, la mujer de Guido y el pequeño Giorgio Cantarini (Gladiator), en el papel de Giosué, conforman el reparto principal.', 6, 1),
(7, 'EL REY LEÓN', 'Recuperación del clásico de Disney de 1994, adaptado a las nuevas generaciones gracias a la tecnología 3-D. La productora de animación sigue así el camino que emprendió con \'La bella y la bestia\' de adaptar sus cintas más populares a dicha tecnología para que los nuevos espectadores puedan disfrutarla mejor (y sacar de paso rendimiento, ahora que estamos en época de crisis, a las apuestas seguras de su fondo de armario).  De esta forma, la épica y la espectacularidad de esta historia de aventuras y superación personal, de gran aliento shakesperiano, se verá realzada sin duda gracias a las nuevas texturas en imagen digital y sonido. De nuevo, el pequeño león Simba, tendrá que aprender el valor de la amistad, de las cosas buenas de la vida y también de la crueldad que encierra la naturaleza y la vileza de algunos seres.  Tras la muerte de su padre, encontrará por el camino una serie de compañeros de viaje que le enseñarán el verdadero significado de todas estas cosas. La esencia de la película será la de siempre, aunque su presencia física en la pantalla ganará en grandeza.', 7, 1),
(8, 'COCO', 'En un pequeño y alegre pueblo mexicano vive Miguel, un niño de 12 años que pertenece a una familia de zapateros, en la que la música está prohibida. Durante generaciones, los Rivera han censurado la música porque creen que hay una maldición en ella. Y es que, hace muchos años, su bisabuelo abandonó a su mujer para seguir su sueño de ser músico, y por eso la música se declaró muerta para todos ellos.  Claro que Miguel guarda en su interior el anhelo de ser músico. A pesar de la maldición familiar, Miguel no desiste ya que ama la música y no va a renunciar a sus sueños tan fácilmente. Su sueño es tocar la guitarra, inspirado por su cantante favorito de todos los tiempos, Ernesto de la Cruz. En la mañana del Día de Muertos, el joven se verá envuelto en una fantástica aventura junto a su perro Dante. Ambos lograrán entrar al Mundo de los Muertos, donde conocerán a sus antepasados, además de a un espíritu amigo llamado Héctor. Con la festividad del Día de Muertos como telón de fondo, Coco nos trasladará a este mundo colorido y musical que es una celebración de la vida, de la familia, los recuerdos y la conexión a través de diversas generaciones.  Filme de animación de la factoría Pixar escrito y dirigido por Lee Unkrich (Toy Story 3, Buscando a Nemo) y Adrián Molina (El viaje de Arlo). Entre las voces protagonistas de la versión original están las de los actores Benjamin Bratt (Doctor Extraño, Infiltrados en Miami) como Ernesto de la Cruz y Gael García Bernal (Mozart in the Jungle, Neruda) como Héctor, además de la del joven Anthony Gonzalez como el niño protagonista. Completan el reparto Edward James Olmos (Blade Runner), Alanna Ubach (Los padres de él), Cheech Marin (Machete), Gabriel Iglesias (Americano) y Alfonso Arau (Tres amigos).', 8, 1),
(9, 'VENGADORES: ENDGAME', 'Después de los devastadores eventos ocurridos en Vengadores: Infinity War, el universo está en ruinas debido a las acciones de Thanos, el Titán Loco. Tras la derrota, las cosas no pintan bien para los Vengadores. Mientras Iron Man (Robert Downey Jr.) vaga en soledad junto a Nebula (Karen Gillan) en una nave lejos de la Tierra, el grupo encabezado por Capitán América (Chris Evans), Viuda Negra (Scarlett Johansson), Hulk (Mark Ruffalo) y Thor (Chris Hemsworth) deberá tratar de revertir los efectos de la catástrofe provocada por Thanos. Los Vengadores deberán reunirse una vez más para deshacer sus acciones y restaurar el orden en el universo de una vez por todas. Esta vez, contarán también con aliados como Ojo de Halcón (Jeremy Renner) y Capitana Marvel (Brie Larson), además de Ant-Man (Paul Rudd), que presumiblemente podría haber estado atrapado en el Reino Cuántico. Juntos, se prepararán para la batalla final, sin importar cuáles sean las consecuencias.  Esta continuación de Vengadores: Infinity War (2018) está de nuevo dirigida por los hermanos Joe y Anthony Russo (Capitán América: Civil War, Capitán América: El Soldado de Invierno). Escribe el guión del filme el tándem formado por Christopher Markus y Stephen McFeely, autores de los libretos de Thor: El mundo oscuro (2013) y Capitán América: El Primer Vengador (2011), a partir de la serie de cómics de Marvel titulados La Guerra del Infinito, creada por Jim Starlin. El reparto del filme cuenta, entre otros, con Chris Evans (Un don excepcional), Scarlett Johansson (Ghost in the Shell: El alma de la máquina), Robert Downey Jr. (Spider-Man: Homecoming), Mark Ruffalo (Spotlight), Chris Hemsworth (Men in Black: International), Brie Larson (Kong: La Isla Calavera), Karen Gillan (Jumanji: Bienvenidos a la jungla), Jeremy Renner (La llegada), Paul Rudd (Mute), Evangeline Lilly (Pequeño Demonio), Bradley Cooper (Mula), Gwyneth Paltrow (Mortdecai) y Josh Brolin (Sicario: El día del soldado).', 9, 1),
(10, 'TU MEJOR AMIGO', '¿Cuál es el sentido de la vida… si eres un perro? Este filme nos acerca, desde el punto de vista de un cachorrito, a la divertida y conmovedora historia de Bailey, un perro que tendrá la oportunidad de vivir varias vidas perrunas distintas, como Bailey, Buddy, Tino y Ellie, y así descubrir el propósito de su existencia al lado de los humanos.  Basado en el best seller A Dog’s Purpose de W. Bruce Cameron, Lasse Hallström (Un viaje de diez metros) dirige esta película escrita por Cathryn Michon (Muffin Top: A Love Story). Josh Gad (La bella y la bestia, Angry Birds: La película) es el encargado de dar voz al perro protagonista y su reparto se completa con Britt Robertson (Tomorrowland: El mundo del mañana), Dennis Quaid (Qué esperar cuando estás esperando), Peggy Lipton (En la boda de mi hermana) y Luke Kirby (Take This Waltz), entre otros.', 8, 1),
(16, 'cars', 'carros con cara', 1, 1),
(17, 'harry potter', 'mago ', 3, 1),
(18, 'Miedo', '		lorem10				', 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movie_rental`
--

CREATE TABLE `movie_rental` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `rental_id` int(11) DEFAULT NULL,
  `unit_price` bigint(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `total` bigint(60) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rentals`
--

INSERT INTO `rentals` (`id`, `start_date`, `end_date`, `status_id`, `total`, `user_id`) VALUES
(4, '2020-05-05', '2020-05-12', 2, 23333, 2),
(5, '2020-05-14', '2020-05-08', 1, 121212, 6),
(6, '2020-05-07', '2020-05-06', 1, 47564, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `status_id`) VALUES
(1, 'Administrador', 1),
(2, 'Empleado', 1),
(3, 'Cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `type_statuses_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `type_statuses_id`) VALUES
(1, 'Activo', 2),
(2, 'Inactivo', 2),
(6, 'En progreso', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_statuses`
--

CREATE TABLE `type_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `type_statuses`
--

INSERT INTO `type_statuses` (`id`, `name`) VALUES
(1, 'General'),
(2, 'Usuario'),
(3, 'Peliculas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `roles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status_id`, `roles_id`) VALUES
(1, 'ARTURO CERVANTES VARGAS', 'os@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 2),
(2, 'JORGE CURIEL ESTRUCH', 'jce@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 2),
(3, 'MARTIN VILLAREJO CABANILLAS', 'mvc@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 3),
(4, 'CONSUELO BAS BARRAGAN', 'cbb@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 1),
(5, 'GONZALO ARRIBAS GUARDIOLA', 'gag@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2, 2),
(6, 'ANDRES LOPES MANRESA', 'alm@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 3),
(7, 'AMPARO SALAS RICART', 'asr@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 1),
(8, 'LUCIA JUNQUERA GIRALDO', 'ljg@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 2),
(9, 'ANTONIA MENDEZ GIMENEZ', 'amg@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 3),
(11, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'ojvargas30@misena.edu.co', 'adsasd', 2, 1),
(12, 'Rodolfo Vargas', 'vargas.rodolfo@gmail.com', '12312312312', 1, 1),
(14, 'OSCAR JAVI', 'ojvargas30@misena.edu.com', 'adsad', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indices de la tabla `category_movie`
--
ALTER TABLE `category_movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indices de la tabla `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indices de la tabla `movie_rental`
--
ALTER TABLE `movie_rental`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `rental_id` (`rental_id`);

--
-- Indices de la tabla `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indices de la tabla `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_statuses_id` (`type_statuses_id`);

--
-- Indices de la tabla `type_statuses`
--
ALTER TABLE `type_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `category_movie`
--
ALTER TABLE `category_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `movie_rental`
--
ALTER TABLE `movie_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `type_statuses`
--
ALTER TABLE `type_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Filtros para la tabla `category_movie`
--
ALTER TABLE `category_movie`
  ADD CONSTRAINT `category_movie_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `category_movie_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_movie_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Filtros para la tabla `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Filtros para la tabla `movie_rental`
--
ALTER TABLE `movie_rental`
  ADD CONSTRAINT `movie_rental_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `movie_rental_ibfk_2` FOREIGN KEY (`rental_id`) REFERENCES `rentals` (`id`);

--
-- Filtros para la tabla `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `rentals_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Filtros para la tabla `statuses`
--
ALTER TABLE `statuses`
  ADD CONSTRAINT `statuses_ibfk_1` FOREIGN KEY (`type_statuses_id`) REFERENCES `type_statuses` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);
COMMIT;

CREATE PROCEDURE sp_getCategoriesById(IN id_movie int)
SELECT cm.*,c.name as catnm,c.img_category
,m.name as movie,s.status as estado FROM category_movie cm
INNER JOIN categories c ON c.id = cm.category_id
INNER JOIN movie m ON m.id = cm.movie_id
INNER JOIN statuses s ON s.id = cm.status_id;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
