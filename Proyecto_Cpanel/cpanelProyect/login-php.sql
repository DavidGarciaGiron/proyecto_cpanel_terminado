CREATE DATABASE cpanelDB;

USE cpanelDB;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `privilegio` int(2) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `password`, `privilegio`, `fecha_registro`) VALUES
(1, 'David Garcia Giron', 'dgarcia', 'david.garcia@tecsup.edu.pe', 'admin', 1, '2016-08-18 03:59:20'),
(2, 'Diana Garcia Giron', 'dayanara', 'dayanara@gmail.com', 'dayanara123', 2, '2016-10-06 06:35:32'),
(3, 'Lili Giron Victoria', 'lilita', 'lilita@gmail.com', 'lilita123', 2, '2016-10-06 06:35:32'),
(4, 'Julio Sanchez', 'Julio', 'Julio@gmail.com', 'Julio123', 2, '2016-10-06 06:35:32');

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;



