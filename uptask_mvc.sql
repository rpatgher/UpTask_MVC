-- -------------------------------------------------------------
-- TablePlus 5.3.8(500)
--
-- https://tableplus.com/
--
-- Database: uptask_mvc
-- Generation Time: 2023-07-15 17:44:14.9980
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `proyectos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `proyecto` varchar(60) DEFAULT NULL,
  `url` varchar(32) DEFAULT NULL,
  `propietarioId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `propietarioId` (`propietarioId`),
  CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`propietarioId`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `tareas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `proyectoId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proyectoId` (`proyectoId`),
  CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`proyectoId`) REFERENCES `proyectos` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `confirmado` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `proyectos` (`id`, `proyecto`, `url`, `propietarioId`) VALUES
(3, 'Remy Patgher Web Site', '75771c014ab27753f223fce0a6b2612f', 1),
(4, ' The Padrinos Barber', '87374baa74ffaabfcf344fec17cedec3', 1),
(5, ' Diseñar Logotipo', '5ac80c4297baf69198ae493653ac1181', 1),
(6, ' Desarrollar un Tasklist', 'f03850e43458d22c04aeb774da18968b', 1),
(7, ' Películas', '499e5d2412df7c87e05b8a5f49dcd2cd', 2),
(8, ' Series', '3d8bceebe0f30d160cd60a83f8b8bddb', 2),
(9, ' TV Shows', 'debc85f110f85c72efb86955f64ec0ca', 2);

INSERT INTO `tareas` (`id`, `nombre`, `estado`, `proyectoId`) VALUES
(8, ' Elegir Colores', 0, 5),
(9, ' Hacer Bosquejo', 0, 5),
(14, ' Elegir Fuente', 0, 5),
(15, ' Subir Sitio', 0, 4),
(16, ' Agregar sección de barberos', 0, 4),
(17, ' Compar dominio', 0, 4),
(18, ' Arreglar menu desplegable', 0, 3),
(19, ' Poner CV', 0, 3),
(20, ' Habilitar formulario de contacto', 0, 3),
(21, ' Hacer pre-diseño', 0, 6),
(22, ' Elegir paleta de colores', 0, 6),
(23, 'Elegir fuente', 0, 6),
(24, ' Cambiar fuente', 0, 3),
(25, ' Ver Indiana Jones', 0, 7),
(26, ' Ver Transformers', 0, 7),
(27, ' Ver Flash', 0, 7),
(28, ' Terminar Mr. Robot', 0, 8),
(29, ' Ver nueva temporada de Black Mirro', 0, 8),
(35, 'Subir Sitio', 1, 3),
(36, 'Compar dominio', 1, 3);

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `token`, `confirmado`) VALUES
(1, ' Remy Patgher', 'correo@correo.com', '$2y$10$m4VkPTY6Gj.kO50/Sa9n7.p8qbn0XI.NIxqBdkFilsIOtwHcgzg8q', '', 1),
(2, ' Carlos Hernández', 'correo2@correo.com', '$2y$10$dyYikoapHSxCAixt1KW/FeWYrQVcv9gdlVLgEW93YvGOWcefYnVmS', '', 1);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;