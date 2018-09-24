SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `altcoins` (
  `id` int(11) NOT NULL,
  `symbol` varchar(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `percent` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `side` varchar(5) NOT NULL,
  `init_percent` varchar(10) NOT NULL,
  `percent` float NOT NULL,
  `for_balancing` float NOT NULL,
  `symbols` varchar(10) NOT NULL,
  `orderId` varchar(20) NOT NULL,
  `transactTime` varchar(20) NOT NULL,
  `executedQty` float NOT NULL,
  `status` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `commission` float NOT NULL,
  `commissionAsset` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `altcoins`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `altcoins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
