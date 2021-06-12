-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Haz 2021, 21:31:44
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `products`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`) VALUES
(1, 'TEKNOKING/AMD Ryzen 5 3600X/GIGABYTE RTX 2060 OC 6GB GDDR6/16GB DD4/240GB SSD/1TB Disk/Gaming Computer', '6954628', 200.00, 'http://localhost/web_proje/resimler/TEKNOK%C4%B0NG.jpg'),
(2, 'Test Name', '554648', 500.00, 'https://cdn.vatanbilgisayar.com/Upload/PRODUCT/hp/thumb/TeoriV2-105608_large.jpg'),
(3, 'Hp Notebook', '2131231', 3000.00, 'https://cdn.vatanbilgisayar.com/Upload/PRODUCT/hp/thumb/TeoriV2-92787-3_large.jpg'),
(4, 'Lenova', '3333', 79999.00, 'https://www.lenovo.com/medias/lenovo-laptop-thinkbook-15p-front.png?context=bWFzdGVyfHJvb3R8MzE2MzN8aW1hZ2UvcG5nfGhmOS9oMjUvMTEwNzY1MTQ4NDA2MDYucG5nfDkxYWJiMDYxOGI2Zjc3MWRhOTU4ZjY1MWI2NWVmMjcwODE2MTc3YmRhOWFjYTk3YWQwZDA1ZjgzOTJjZWU1ZmM'),
(5, 'Lenova PC', '123123', 3333.00, 'https://www.lenovo.com/medias/lenovo-laptop-thinkbook-15p-front.png?context=bWFzdGVyfHJvb3R8MzE2MzN8aW1hZ2UvcG5nfGhmOS9oMjUvMTEwNzY1MTQ4NDA2MDYucG5nfDkxYWJiMDYxOGI2Zjc3MWRhOTU4ZjY1MWI2NWVmMjcwODE2MTc3YmRhOWFjYTk3YWQwZDA1ZjgzOTJjZWU1ZmM');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
