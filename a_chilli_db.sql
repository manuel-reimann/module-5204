-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 03, 2023 at 09:55 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_chilli_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chillis`
--

CREATE TABLE `chillis` (
  `ID` int(11) NOT NULL,
  `name` varchar(512) DEFAULT NULL,
  `scoville_heat` varchar(512) DEFAULT NULL,
  `sow_date` varchar(512) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `origin` varchar(512) DEFAULT NULL,
  `cultivation_difficulty` varchar(512) DEFAULT NULL,
  `path` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chillis`
--

INSERT INTO `chillis` (`ID`, `name`, `scoville_heat`, `sow_date`, `description`, `origin`, `cultivation_difficulty`, `path`) VALUES
(1, 'Aji Amarillo', '30,000-50,000 SHU', 'October-November', 'A moderately hot chili with a fruity, slightly sweet flavor. It is a key ingredient in many Peruvian dishes.', 'Peru', 'Moderate', '1.jpeg'),
(2, 'Aji Cristal', '30,000-50,000', 'Feb-Apr', 'A sweet and fruity chili that is similar to the Aji Amarillo, but with less heat.', 'Peru', 'Easy', '2.jpeg'),
(3, 'Aji Dulce', '0-1,000', 'Mar-Jun', 'A sweet and smoky pepper with no heat. Commonly used in Caribbean and Latin American cuisine.', 'Caribbean', 'Moderate', '3.jpeg'),
(4, 'Aji Lemon', '30,000-50,000', 'Feb-May', 'Also known as Lemon Drop, this chili pepper has a citrusy flavor with moderate heat. It is often used in ceviche and other Peruvian dishes.', 'Peru', 'Moderate', '4.jpeg'),
(5, 'Aji Limo', '30,000-50,000 SHU', 'October-November', 'A moderately hot chili with a citrusy, slightly smoky flavor. It is often used in Peruvian ceviche.', 'Peru', 'Easy', '5.jpeg'),
(6, 'Aji Panca', '1,000-1,500', 'Feb-Jun', 'A mild chili pepper commonly used in Peruvian cuisine, particularly in soups and stews. It has a fruity, berry-like flavor with a smoky undertone.', 'Peru', 'Easy', '6.webp'),
(7, 'Ají Pineapple', '30,000-50,000', 'Feb-May', 'Aji Pineapple is a sweet and fruity pepper with a medium heat level. It has a distinctive pineapple flavor that makes it great for adding sweetness to salsas, marinades, and sauces.', 'Peru', 'Easy', '7.jpeg'),
(8, 'Aji Rojo', '30,000-50,000', 'Feb-May', 'This chili pepper is a key ingredient in the traditional Peruvian dish aji de gallina. It has a fruity, citrusy flavor with moderate heat.', 'Peru', 'Moderate', '8.jpeg'),
(9, 'Aleppo', '10,000-30,000', 'April', 'Aleppo pepper is a type of chili pepper that is commonly used in Middle Eastern and Mediterranean cuisine. It has a moderate heat level and a fruity, raisin-like flavor.', 'Syria', 'Easy', '9.jpeg'),
(11, 'Aleppo Sultan', '30,000-50,000', 'Apr-Jun', 'A fruity, complex flavor with medium heat. Often used in Middle Eastern and Mediterranean cuisine.', 'Syria', 'Easy', '11.jpeg'),
(12, 'Aleppo Turkish', '10,000-30,000', 'Mar-Jun', 'This is a moderately hot chili pepper that is commonly used in Middle Eastern cuisine. It has a fruity, raisin-like flavor and is often used to make Aleppo pepper flakes.', 'Syria', 'Moderate', '12.jpeg'),
(13, 'Alma Paprika', '0', 'Apr-Jun', 'A mild chili pepper that is primarily used to make paprika. It has a sweet, fruity flavor and is often smoked before being ground into a powder.', 'Hungary', 'Easy', '13.jpeg'),
(14, 'Anaheim', '500-2,500 SHU', 'February-May', 'Mild chili with a slightly sweet, earthy flavor. Often used in Southwestern and Mexican cuisine.', 'United States/Mexico', 'Easy', '14.jpeg'),
(16, 'Ancho 211', '1,000-1,500', 'Feb-Jun', 'Also known as Ancho Mulato, this chili pepper is a dried version of the poblano pepper. It has a mild, slightly sweet and smoky flavor.', 'Mexico', 'Easy', '16.jpeg'),
(17, 'Ancho/Poblano', '1,000-1,500 SHU', 'February-April', 'A mild, dark green chili that is commonly used in Mexican cuisine. It has a slightly fruity and earthy flavor.', 'Mexico', 'Easy', '17.jpeg'),
(18, 'Arbol', '15,000-30,000', 'Feb-Jun', 'This is a Mexican chili pepper that is thin and has a bright red color when mature. It is often used in soups, stews, and sauces.', 'Mexico', 'Easy', '18.jpeg'),
(19, 'Aribibi Gusano', '30,000-50,000', 'Jan-Apr', 'A rare and unusual chili pepper from Bolivia, known for its worm-like appearance. It has a fruity, tropical flavor with moderate heat.', 'Bolivia', 'Moderate', '19.jpeg'),
(20, 'Bahamian', '50,000-100,000', 'Mar-Apr', 'The Bahamian chili is a type of chili pepper that is native to the Bahamas. It has a medium to hot heat with a fruity, slightly smoky flavor, and is commonly used in Caribbean and Bahamian cuisine.', 'Bahamas', 'Moderate', '20.jpeg'),
(22, 'Balloon', '2,000-8,000', 'Mar-Jun', 'This is a small, round chili pepper that is named for its shape. It has a mild to medium heat level and is often used in Southwestern and Mexican cuisine.', 'Mexico/US', 'Easy', '22.jpeg'),
(23, 'Banana', '0-500 SHU', 'February-April', 'A mild chili with a sweet, tangy flavor. It is often used in Caribbean and Latin American cuisine.', 'Caribbean', 'Easy', '23.jpeg'),
(24, 'Beaver Dam', '5,000-10,000', 'Feb-Jun', 'This is a medium-hot chili pepper that is named for the town in Wisconsin where it was developed. It has a slightly sweet flavor and is often used to make salsa and hot sauce.', 'USA', 'Easy', '24.jpeg'),
(26, 'Bhut Jolokia', '1,000,000 SHU', 'February-April', 'One of the hottest chilies in the world, with a smoky, slightly sweet flavor. It is often used in Indian cuisine.', 'India', 'Difficult', '26.jpeg'),
(27, 'Bhut Jolokia Chocolate', '800,000-1,001,300', 'Mar-Jun', 'A chocolate-colored version of the Bhut Jolokia with a slightly smokier flavor. Extremely hot.', 'India', 'Difficult', '27.jpeg'),
(28, 'Bhut Jolokia Yellow', '800,000-1,001,304', 'Feb-Jun', 'This is a variant of the Bhut Jolokia chili pepper that has a yellow color when ripe. It is one of the hottest chili peppers in the world and is used to make various hot sauces and spice blends.', 'India', 'Difficult', '28.jpeg'),
(29, 'Big Jim', '2,500-8,000', 'Apr-Jun', 'A mild to medium heat chili that is often used in green chili recipes.', 'United States', 'Moderate', '29.webp'),
(30, 'Biquinho', '500-2,500', 'Jan-Apr', 'A sweet pepper with a slightly smoky flavor, often used in Brazilian cuisine', 'Brazil', 'Easy to moderate', '30.jpeg'),
(31, 'Biquinho Red', '500-1,000', 'Mar-Jun', 'Biquinho Red is a sweet and mild chilli pepper from Brazil. It is great for snacking, adding to salads, and pickling.', 'Brazil', 'Easy', '31.webp'),
(32, 'Bird\'s Eye', '50,000-100,000 SHU', 'Year-round', 'A small, very spicy chili with a sharp and pungent flavor. It is often used in Southeast Asian cuisine.', 'Southeast Asia', 'Moderate', '32.jpeg'),
(33, 'Bird\'s Eye Brown', '50,000-100,000', 'Year Round', 'A small, pungent chili with a sharp heat that is commonly used in African cuisine.', 'Africa', 'Easy', '33.jpeg'),
(34, 'Bishop\'s Crown', '5,000-30,000', 'Feb-Jun', 'A medium-hot pepper with a fruity flavor and a unique shape resembling a bishop\'s crown', 'United States/Caribbean', 'Easy to moderate', '34.jpeg'),
(35, 'Black Cobra', '1,000,000-1,500,000', 'March', 'The Black Cobra pepper is a very hot chili pepper that is native to Trinidad and Tobago. It has a fruity flavor and is used to add heat to dishes like stews, sauces, and marinades.', 'Trinidad and Tobago', 'Difficult', '35.jpeg'),
(38, 'Black Pearl', '30,000-50,000', 'Feb-Jun', 'This is a small, round chili pepper that has a black color when mature. It has a smoky, slightly sweet flavor and is often used in salsas and hot sauces.', 'USA', 'Moderate', '38.webp'),
(39, 'Bolivian Rainbow', '30,000-50,000', 'Feb-May', 'Multicolored, ornamental peppers', 'Bolivia', 'Easy', '39.jpeg'),
(40, 'Bonda ma Jacques', '200,000-300,000', 'Feb-Jun', 'Spicy and fruity', 'Haiti', 'Moderate', '40.jpeg'),
(41, 'Buena Mulata', '1,000-2,500', 'Feb-Apr', 'Mild, sweet and tangy flavor', 'South America', 'Easy', '41.webp'),
(42, 'Bulgarian Carrot', '5,000-30,000', 'May', 'The Bulgarian Carrot chili pepper is a medium-hot chili pepper that is a cultivar of the Hungarian Wax pepper. It is used in many types of cuisine, including Mexican, Indian, and Korean.', 'Bulgaria', 'Moderate', '42.jpeg'),
(44, 'Cachucha', '0-500', 'Feb-May', 'Also known as Ají dulce. Used in Caribbean, Venezuelan, and Dominican cuisine.', 'Caribbean', 'Easy', '44.jpeg'),
(45, 'Calabrian Pepperoncini', '5,000-15,000', 'Mar-Jun', 'Mild and tangy with slight heat', 'Italy', 'Easy', '45.jpeg'),
(46, 'Sandia Select', '4,000-6,500', 'Apr-Jun', 'This is a sweet and mild chilli pepper that is great for grilling and stuffing. It has a thick flesh that makes it easy to peel and is perfect for roasting.', 'USA', 'Easy', '46.webp'),
(47, 'Caribbean Red Habanero', '250,000-445,000', 'Feb-Jun', 'Extremely spicy pepper with a fruity and slightly smoky flavor. Commonly used in Caribbean and Latin American cuisine for its heat and flavor.', 'Caribbean', 'Moderate', '47.jpeg'),
(48, 'Carolina Cayenne', '30,000-50,000', 'May', 'The Carolina Cayenne is a medium-hot chili pepper that is a cultivar of the cayenne pepper. It is often used in hot sauces and can be dried and ground to make a spicy powder.', 'United States', 'Easy', '48.jpg'),
(49, 'Carolina Reaper Yellow', '1,600,000-2,200,000', 'Mar-Jul', 'Mild, sweet with fruity flavor', 'South Carolina', 'Easy', '49.webp'),
(50, 'Carolina Reaper', '1,400,000-2,200,000', 'February-April', 'The current Guinness World Record holder for the hottest chili pepper, with a fruity, sweet flavor and a severe heat level.', 'United States', 'Difficult', '50.jpeg'),
(51, 'Carolina Reaper Chocolate', '1,400,000', 'Mar-Jun', 'A hybrid of a Ghost pepper and a Red Habanero pepper.', 'South Carolina, USA', 'Difficult', '51.webp'),
(52, 'Cascabel', '1,000-3,000 SHU', 'February-April', 'A mild, nutty flavored chili that is commonly used in Mexican cuisine. It is often used in sauces and salsas.', 'Mexico', 'Moderate', '52.jpeg'),
(53, 'Cascabella', '1,500-4,000', 'Apr-May', 'The Cascabella chili is a type of chili pepper that is named for its small, bell-like shape. It has a mild heat with a slightly sweet, smoky flavor, and is commonly used in salsas, pickling, and stuffing.', 'Mexico', 'Easy', '53.jpeg'),
(55, 'Cayenne', '30,000-50,000 SHU', 'February-April', 'A thin, red chili with a hot, pungent flavor. Often used in Cajun and Creole cuisine.', 'South America', 'Easy', '55.jpeg'),
(56, 'Charleston Hot', '50,000-100,000 SHU', 'February-April', 'A hot chili with a fruity, slightly sweet flavor. It is a popular variety in the Lowcountry cuisine of South Carolina.', 'United States', 'Moderate', '56.jpg'),
(57, 'Cherry Bomb', '2,500-5,000 SHU', 'March-April', 'A medium-hot chili with a slightly sweet flavor. It is often used for stuffing or pickling.', 'United States', 'Easy', '57.jpeg'),
(58, 'Cherry Sweetie', '0-500', 'Feb-Jun', 'Small and sweet, suitable for snacking', 'Europe', 'Easy', '58.jpeg'),
(59, 'Chilaca', '1,000-2,000', 'Mar-Apr', 'The Chilaca chili, also known as the Pasilla chili when dried, is a type of chili pepper that is commonly used in Mexican cuisine, particularly in mole sauces. It has a mild heat with a smoky, earthy flavor and is often used for its deep, rich color.', 'Mexico', 'Easy', '59.webp'),
(60, 'Chiltepin', '50,000-100,000', 'Mar-May', 'Also known as Tepin pepper. Used in salsas, vinegars, and sauces.', 'Mexico', 'Moderate', '60.jpeg'),
(61, 'Chimayo', '4,000-6,000 SHU', 'February-April', 'A mild to medium chili with a smoky, earthy flavor. It is a staple in New Mexican cuisine.', 'United States', 'Easy', '61.webp'),
(63, 'Chinese Five Color', '50,000-70,000', 'Feb-Jun', 'Multicolored, sweet and hot', 'China', 'Moderate', '63.jpeg'),
(64, 'Chocolate Habanero', '300,000-577,000 SHU', 'February-April', 'A very hot chili with a rich, smoky flavor. It is often used in Caribbean and Central American cuisine.', 'Caribbean', 'Moderate', '64.jpeg'),
(65, 'Congo Black', '30,000-50,000', 'Feb-May', 'Used in stews, soups, and sauces.', 'Africa', 'Moderate', '65.jpeg'),
(66, 'Criolla Sella', '0-500', 'Mar-Jun', 'Also known as Peruvian White Habanero. Mild flavor and fruity aroma.', 'Peru', 'Easy', '66.jpeg'),
(67, 'Datil', '100,000-300,000 SHU', 'Year-round', 'A very hot chili with a sweet, fruity flavor. It is often used in hot sauces and salsas.', 'United States', 'Difficult', '67.jpeg'),
(68, 'Datil Noir', '100,000-300,000', 'Jan-Apr', 'Similar to the Datil pepper, but with a darker color. Used in hot sauces and marinades.', 'Florida, USA', 'Moderate', '68.jpeg'),
(69, 'Datil Pepper', '100,000-300,000', 'Feb-Apr', 'The datil pepper is a hot pepper that is closely associated with the city of St. Augustine, Florida. It has a sweet, fruity flavor and is used in a variety of dishes, including sauces, salsas, and marinades. The heat of the datil pepper is similar to that of the habanero pepper, but with a slightly sweeter taste. The datil pepper is a relatively rare pepper, and is mainly grown in the St. Augustine area.', 'United States', 'Moderate', '69.jpeg'),
(70, 'Demon Red', '300,000 SHU', 'February-April', 'A very hot chili with a fruity, sweet flavor. It is often used in hot sauces and marinades.', 'United States', 'Moderate', '70.jpeg'),
(71, 'Devil\'s Brain', '1,200,000', 'Jan-Apr', 'Small, red chili pepper with a fruity flavor.', 'Australia', 'Difficult', '71.jpeg'),
(72, 'Devil\'s Tongue', '125,000-325,000', 'March', 'The Devil\'s Tongue is a hot chili pepper that is native to Central and South America. It has a fruity flavor and is used to add heat to dishes like stews, sauces, and marinades.', 'Central and South America', 'Moderate', '72.jpeg'),
(73, 'Douglah', '923', 'Mar-Jun', 'Also known as 7 Pot Douglah. Dark brown pepper with a smoky, chocolate flavor.', 'Trinidad', 'Difficult', '73.jpeg'),
(74, 'Early Jalapeño', '2,500-8,000', 'Mar-Apr', 'The early jalapeño is a medium-sized chili pepper that is typically harvested when green, but can also be left to ripen to a red color. It has a mild to moderate level of heat and is commonly used in Mexican cuisine, particularly in salsas, marinades, and stuffed with cheese. Early jalapeño plants are compact and can be grown in containers or in the ground. They are early-maturing and produce a high yield of peppers.', 'Mexico', 'Easy', '74.jpeg'),
(75, 'Espelette Pepper', '4,000-6,000', 'Mar-Jun', 'The Espelette pepper is a mild chili pepper that originates from the Basque region of France. It has a slightly sweet and smoky flavor and is traditionally used in the Basque dish Piperade, as well as in other stews, soups, and sauces. The Espelette pepper is typically harvested in late summer and early fall, and is often dried and ground into a powder for use in cooking.', 'France', 'Moderate', '75.jpeg'),
(76, 'Fatalii', '125,000-400,000 SHU', 'February-April', 'A very hot chili with a fruity, citrusy flavor. It is often used in African and Caribbean cuisine.', 'Central and South Africa', 'Moderate', '76.jpeg'),
(77, 'Fatalii Gourmet Jigsaw', '100,000-400,000', 'Jan-Apr', 'Fatalii Gourmet Jigsaw is a very hot chilli with a fruity and citrusy flavor. It is great for adding heat to sauces, marinades, and curries.', 'Africa', 'Medium', '77.webp'),
(78, 'Fatalii Pepper', '125,000-400,000', 'Feb-Apr', 'The fatalii pepper is a hot chili pepper that originates from Central and Southern Africa. It has a fruity, citrus-like flavor and is commonly used in hot sauces and marinades. The fatalii pepper is relatively easy to grow and produces high yields of peppers. It is typically harvested when ripe, which is when it turns a bright yellow color.', 'Africa', 'Easy', '78.jpeg'),
(79, 'Fish', '5,000-30,000', 'May', 'The Fish pepper is a medium-hot chili pepper that is a cultivar of the Tabasco pepper. It is named for its shape, which is similar to that of a fish. It is often used in seafood dishes.', 'United States', 'Easy', '79.jpeg'),
(80, 'Fresno', '2,500-10,000 SHU', 'February-July', 'A mild to medium-hot chili with a slightly sweet flavor. It is often used in Mexican and Southwestern cuisine.', 'United States', 'Easy', '80.png'),
(81, 'Ghost Pepper', '855,000-1,041,427 SHU', 'February-April', 'A very hot chili with a fruity, floral flavor. It is often used in Indian and Southeast Asian cuisine.', 'India', 'Difficult', '81.jpeg'),
(82, 'Goat Horn', '25,000-30,000 SHU', 'February-April', 'A medium chili with a sweet, tangy flavor. It is a popular variety in Jamaican cuisine.', 'Jamaica', 'Easy', '82.jpeg'),
(83, 'Guajillo', '2,500-5,000', 'Mar', 'The Guajillo chili is a type of chili pepper that is commonly used in Mexican cuisine, particularly in sauces, soups, and stews. It has a mild to medium heat and a sweet, fruity flavor with notes of berry and green tea.', 'Mexico', 'Easy', '83.jpeg'),
(84, 'Guindilla Pepper', '4,000-6,000', 'Mar-Jun', 'The guindilla pepper is a mild chili pepper that is commonly used in Spanish cuisine. It has a slightly sweet and tangy flavor and is often pickled or used in salads, stews, and sandwiches. The guindilla pepper is typically harvested when green, but can also be left to ripen to a red color. It is relatively easy to grow and produces a high yield of peppers.', 'Spain', 'Easy', '84.jpeg'),
(85, 'Habanada', '0 SHU', 'February-April', 'A sweet chili with no heat. It is often used in salads and desserts.', 'United States', 'Moderate', '85.jpeg'),
(86, 'Hungarian Black', '5,000-10,000', 'Mar-Apr', 'Dark purple peppers with smoky, sweet flavor', 'Hungary', 'Easy', '86.jpeg'),
(87, 'Hungarian Hot Wax', '5,000-15,000 SHU', 'February-April', 'A mild to medium chili with a tangy, slightly sweet flavor. It is often used in Hungarian cuisine.', 'Hungary', 'Easy', '87.webp'),
(88, 'Hungarian Wax', '1,000-15,000 SHU', 'February-April', 'A mild to medium-hot chili with a slightly sweet flavor. It is often used in Hungarian cuisine.', 'Hungary', 'Easy', '88.jpeg'),
(89, 'Italian Sweet', '0-1000', 'Mar-Jun', 'Mild and sweet, used in Italian cuisine for stuffing, grilling, and roasting.', 'Italy', 'Easy', '89.png'),
(90, 'Jalapeño', '2,500-8,000 SHU', 'February-April', 'A medium-hot chili with a slightly smoky, earthy flavor. It is often used in Mexican cuisine.', 'Mexico', 'Easy', '90.jpeg'),
(91, 'Jaloro', '3,000-6,000', 'Mar-Apr', 'Thick-fleshed yellow peppers with mild heat', 'USA', 'Easy', '91.jpeg'),
(92, 'Jamaican Hot', '100,000-200,000', 'Mar-Jun', 'Small, wrinkled peppers with fruity flavor', 'Jamaica', 'Moderate', '92.jpeg'),
(93, 'Jimmy Nardello', '0-500', 'Mar-Jun', 'Long, thin, sweet Italian frying pepper', 'Italy', 'Easy', '93.jpeg'),
(95, 'Kashmiri', '30,000-50,000', 'Mar-Apr', 'A mild chili with a bright red color and fruity flavor, commonly used in Indian cuisine for curries, chutneys, and pickles.', 'India', 'Easy', '95.jpeg'),
(97, 'Korean Red', '2500-8000', 'Mar-Jun', 'Medium heat, used in Korean cuisine for making kimchi and sauces.', 'Korea', 'Moderate', '97.png'),
(98, 'Kung Pao', '30,000-50,000', 'Mar-Jun', 'Red, wrinkled, thin-walled peppers', 'China', 'Moderate', '98.jpeg'),
(99, 'Lemon Drop', '15,000-30,000 SHU', 'February-April', 'A medium chili with a citrusy, zesty flavor. It is often used in Peruvian cuisine.', 'Peru', 'Moderate', '99.jpeg'),
(102, 'Leutschauer Paprika', '5,000-10,000', 'Mar-Apr', 'Sweet and spicy peppers for drying or fresh use', 'Hungary', 'Easy', '102.jpeg'),
(105, 'Little Elf', '5,000-30,000', 'Mar-Apr', 'Small, hot, orange-red peppers with smoky flavor', 'USA', 'Easy', '105.jpeg'),
(108, 'Madame Francisque', '10,000-20,000', 'Mar-Jun', 'Long, red, tapered peppers with mild heat', 'Martinique, Caribbean', 'Moderate', '108.jpeg'),
(110, 'Madame Jeanette', '100,000-350,000', 'Mar-Apr', 'A hot chili pepper with a unique fruity flavor and a bright yellow color. It is commonly used in Surinamese and other Caribbean cuisines to add heat and flavor to dishes like stews and marinades.', 'Suriname', 'Moderate', '110.jpeg'),
(111, 'Malagueta', '50000-100000', 'Feb-May', 'Very spicy, used in Brazilian cuisine for making hot sauces and marinades.', 'Brazil', 'Moderate', '111.jpeg'),
(114, 'Mulato', '2,500-3,000 SHU', 'February-April', 'A mild chili with a smoky, chocolatey flavor. It is often used in Mexican mole sauces.', 'Mexico', 'Moderate', '114.jpeg'),
(117, 'Naga Morich', '800,000-1,000,000 SHU', 'February-April', 'A very hot chili with a fruity, floral flavor. It is often used in Indian cuisine.', 'India', 'Difficult', '117.jpeg'),
(118, 'Naga Viper', '1,382,118 SHU', 'February-April', 'A very hot chili with a sweet, fruity flavor. It is a crossbreed of several other super hot chili varieties.', 'United Kingdom', 'Difficult', '118.webp'),
(121, 'NuMex Twilight', '3000-5000', 'Mar-Jun', 'Mildly spicy, small and colorful, used in salads and as a garnish.', 'United States', 'Easy', '121.jpeg'),
(122, 'Padron', '500-2,500 SHU', 'February-April', 'A mild to medium chili with a fresh, grassy flavor. It is often served fried in Spanish cuisine.', 'Spain', 'Moderate', '122.jpeg'),
(123, 'Paprika', '0 SHU', 'February-April', 'A mild chili with a sweet, slightly smoky flavor. It is often used as a spice and a coloring agent.', 'Central America', 'Easy', '123.jpeg'),
(124, 'Pasilla', '1,000-2,000 SHU', 'February-April', 'A mild chili with a raisin-like flavor. It is often used in Mexican cuisine.', 'Mexico', 'Moderate', '124.jpeg'),
(125, 'Pasilla Mixe', '1,000-2,500', 'Mar-Jun', 'Pasilla Mixe is a mild chilli pepper that is great for making sauces, stews, and soups. It has a rich, smoky flavor with notes of chocolate and tobacco.', 'Mexico', 'Easy', '125.webp'),
(126, 'Pequin', '30,000-60,000 SHU', 'February-April', 'A very hot chili with a nutty, smoky flavor. It is often used in Mexican cuisine.', 'Mexico', 'Moderate', '126.jpeg'),
(127, 'Peter Pepper', '5,000-30,000 SHU', 'February-April', 'A medium chili with a distinctive phallic shape. It is often used in pickling and salsa making.', 'United States', 'Moderate', '127.jpeg'),
(128, 'Pimiento', '0 SHU', 'February-April', 'A mild chili with a sweet, fruity flavor. It is often used in Spanish cuisine.', 'Spain', 'Easy', '128.jpeg'),
(129, 'Poblano', '1,000-2,000 SHU', 'February-April', 'A mild chili with a rich, earthy flavor. It is often used in Mexican cuisine.', 'Mexico', 'Moderate', '129.jpeg'),
(130, 'Poblano Ancho', '1000-2000', 'Mar-Jun', 'Mildly spicy, used in Mexican cuisine for making chiles rellenos and mole sauce.', 'Mexico', 'Easy', '130.jpeg'),
(131, 'Red Savina', '350,000-580,000 SHU', 'February-April', 'A very hot chili with a fruity, smoky flavor. It was once the world\'s hottest chili.', 'United States', 'Difficult', '131.jpeg'),
(133, 'Rocotillo', '1500-2500', 'Feb-Jun', 'Mildly spicy, used in Peruvian cuisine for making aji sauces and ceviche.', 'Peru', 'Moderate', '133.jpeg'),
(134, 'Rocoto', '50,000-250,000 SHU', 'February-April', 'A hot chili with a fruity, nutty flavor. It is often used in Peruvian cuisine.', 'Peru', 'Difficult', '134.jpeg'),
(135, 'Scotch Bonnet', '100,000-350,000 SHU', 'February-April', 'A very hot chili with a sweet, fruity flavor. It is often used in Caribbean cuisine.', 'Caribbean', 'Moderate', '135.jpeg'),
(136, 'Scotch Bonnet Chocolate', '100,000-400,000', 'Jan-Apr', 'Scotch Bonnet Chocolate is a very hot chilli pepper that is great for making hot sauces, jerk seasoning, and marinades. It has a fruity, smoky flavor with hints of chocolate.', 'Caribbean', 'Medium', '136.jpeg'),
(137, 'Serrano', '10,000-23,000', 'April', 'The Serrano chili pepper is a type of chili pepper that originated in the mountainous regions of the Mexican states of Puebla and Hidalgo. It is commonly used in Mexican cuisine, particularly in salsas.', 'Mexico', 'Moderate', '137.jpeg'),
(138, 'Serrano del Sol', '10,000-23,000', 'Feb-Jul', 'This is a Mexican chili pepper that is used to add a pungent flavor to various dishes such as salsa, guacamole, and chili con carne.', 'Mexico', 'Easy', '138.jpeg'),
(139, 'Serrano Tampiqueno', '10000 - 25000', 'Feb-Apr', 'Similar to the Jalapeno but smaller and hotter, often used in salsas and sauces', 'Mexico', 'Easy', '139.jpeg'),
(140, 'Shishito', '50-200 SHU', 'April-June', 'A mild chili with a slightly sweet, smoky flavor. It is often used in Japanese cuisine.', 'Japan', 'Easy', '140.jpeg'),
(141, 'Siling Haba', '5,000-30,000 SHU', 'January-April', 'A moderately hot chili with a slightly sweet, smoky flavor. It is often used in Filipino cuisine.', 'Philippines', 'Easy', '141.jpg'),
(142, 'Siling Labuyo', '80,000-100,000 SHU', 'January-April', 'A very hot chili with a bright, citrusy flavor. It is often used in Filipino cuisine.', 'Philippines', 'Easy', '142.jpeg'),
(143, 'Spanish Padron', '5000 - 10000', 'Mar-Jul', 'Small and mild when green, but can be hot when ripe, typically fried in olive oil and served as a tapa', 'Spain', 'Easy', '143.jpg'),
(144, 'Super Chili', '40000 - 50000', 'Mar-Jun', 'Small, cone-shaped chili that ripens from green to red, very hot and typically used in Thai and Indian cuisine', 'Thailand', 'Moderate', '144.jpeg'),
(145, 'Tabasco', '30,000-50,000 SHU', 'February-April', 'A hot chili with a tangy, slightly fruity flavor. It is often used to make the hot sauce of the same name.', 'Mexico', 'Easy', '145.jpeg'),
(146, 'Thai Bird\'s Eye', '50,000-100,000 SHU', 'February-April', 'A very hot chili with a sharp, spicy flavor. It is often used in Thai cuisine.', 'Thailand', 'Easy', '146.jpeg'),
(147, 'Tien Tsin', '50000 - 75000', 'Mar-Jun', 'Small, red chili with a smoky, salty flavor often used in Chinese dishes', 'China', 'Easy', '147.webp'),
(148, 'Trinidad Moruga Scorpion', '1,200,000-2,000,000 SHU', 'February-April', 'One of the hottest chilies in the world, with a fruity, slightly floral flavor. It is often used in Caribbean cuisine.', 'Trinidad and Tobago', 'Difficult', '148.jpeg'),
(149, 'Trinidad Perfume', '0', 'Mar-Jul', 'Aromatic chili with no heat, used for flavoring dishes without adding spiciness', 'Trinidad and Tobago', 'Easy', '149.webp'),
(150, 'Trinidad Scorpion', '1,200,000-2,000,000', 'February', 'The Trinidad Scorpion is a hot chili pepper that originated in Trinidad and Tobago. It is among the hottest peppers in the world and is often used to add heat to sauces, marinades, and other dishes.', 'Trinidad and Tobago', 'Difficult', '150.jpeg'),
(151, 'Trinidad Scorpion Butch T', '800000 - 1000000', 'Feb-May', 'One of the hottest peppers in the world, with a fruity flavor and slow-building heat', 'Trinidad and Tobago', 'Difficult', '151.jpeg'),
(152, 'Urfa Biber', '3000 - 5000', 'Feb-Jun', 'Turkish chili with a smoky, raisin-like flavor, often used in kebabs and other grilled meats', 'Turkey', 'Easy', '152.jpeg'),
(153, 'White Habanero', '100000 - 350000', 'Jan-Apr', 'A sweeter and fruitier version of the classic Habanero, with a creamy color and citrusy flavor', 'Peru/Mexico', 'Moderate', '153.jpeg'),
(154, 'Yellow 7 Pot', '800,000-1,300,000', 'March', 'The Yellow 7 Pot is a hot chili pepper that is a cultivar of the Trinidad 7 Pot pepper. It has a fruity flavor and is used to add heat to dishes like stews, sauces, and marinades.', 'Trinidad and Tobago', 'Difficult', '154.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chilli_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`ID`, `user_id`, `chilli_id`, `timestamp`) VALUES
(138, 95, 99, '2023-05-03 21:47:14'),
(139, 95, 38, '2023-05-03 21:47:19'),
(140, 95, 86, '2023-05-03 21:47:20'),
(142, 95, 50, '2023-05-03 21:47:32'),
(143, 95, 127, '2023-05-03 21:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `email`, `password`, `firstname`, `lastname`) VALUES
(95, 'Manu', 'manu@sae.ch', '$2y$10$96dVUbuWRn0Pz3Tt6UYL2.6YrSvOfW6IjzGEPfrXys38P3KnstGXy', 'Manuel', 'Reimann'),
(96, 'Martin', 'martin@sae.ch', '$2y$10$H27C8hPBToHujfpyf0xJGeXe4rm615AX.ydrEf6raxEtjjRfCZbbO', 'Martin', 'Hutchings');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chillis`
--
ALTER TABLE `chillis`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_rel` (`user_id`),
  ADD KEY `chilli_rel` (`chilli_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chillis`
--
ALTER TABLE `chillis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `chilli_rel` FOREIGN KEY (`chilli_id`) REFERENCES `chillis` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_rel` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
