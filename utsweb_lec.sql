-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 04:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utsweb_lec`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `gambar_menu` varchar(255) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `harga_menu` decimal(10,2) NOT NULL,
  `kategori` enum('Pasta','Pizza','Soup','Vegetables','Appetizer','Dessert','Drinks') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `gambar_menu`, `nama_menu`, `deskripsi_menu`, `harga_menu`, `kategori`) VALUES
(4, 'spaghetti bolognese.webp', 'Spaghetti Bolognese', 'Al dente spaghetti with slow-cooked beef and tomato sauce, topped with Parmesan cheese.', 50000.00, 'Pasta'),
(6, 'Spaghetti-aglio-olio.jpg', 'Spaghetti Aglio Olio', 'Delicate spaghetti strands kissed by golden olive oil, tossed with garlic, red pepper flakes, and finished with a sprinkle of fresh parsley.', 50000.00, 'Pasta'),
(7, 'fettucine-funghi.jpg', 'Fettucine con Funghi', 'Silky fettuccine pasta bathed in a velvety cream sauce, generously infused with sautéed mushrooms and a hint of earthy herbs.', 50000.00, 'Pasta'),
(8, 'Penne alla Vodka.webp', 'Penne alla Vodka', 'Penne pasta swirled in a luscious vodka tomato cream sauce, with a hint of chili flakes for a touch of heat.', 50000.00, 'Pasta'),
(9, 'Farfalle Primavera.webp', 'Farfalle Primavera', 'Farfalle bow-tie pasta tossed with a medley of fresh, crisp vegetables in a light lemon butter sauce.', 45000.00, 'Pasta'),
(10, 'Ravioli di Zucca.jpg', 'Ravioli di Zucca', 'Plump ravioli filled with roasted butternut squash and sage, served in a brown butter sauce with toasted pine nuts.', 40000.00, 'Pasta'),
(13, 'lasagna-bolognese-slice.jpg', 'Lasagna al Forno', 'Layers of wide lasagna noodles, rich meat sauce, creamy béchamel, and melted mozzarella, baked to perfection.', 50000.00, 'Pasta'),
(14, 'Fettuccine Alfredo.jpg', 'Fettuccine Alfredo', 'Fettuccine pasta luxuriating in a velvety Alfredo sauce, made with cream, butter, and Parmesan cheese.', 50000.00, 'Pasta'),
(15, 'Margherita Pizza.jpg', 'Margherita Pizza', 'A classic Neapolitan pizza featuring tomato sauce, fresh mozzarella, basil leaves, and a drizzle of olive oil.', 40000.00, 'Pizza'),
(16, 'Quattro Formaggi.jpg', 'Quattro Formaggi', 'Four-cheese pizza with a blend of mozzarella, gorgonzola, fontina, and Parmesan, offering a rich and cheesy flavor.', 45000.00, 'Pizza'),
(17, 'Pepperoni Amore.jpg', ' Pepperoni Amore', 'A pepperoni lover\'s dream with a generous layer of spicy pepperoni, tomato sauce, and melted mozzarella.', 50000.00, 'Pizza'),
(18, 'Funghi e Prosciutto.jpg', 'Funghi e Prosciutto', 'Earthy mushrooms and salty prosciutto atop a pizza, complemented by creamy white sauce and fresh arugula.', 45000.00, 'Pizza'),
(19, 'Diavola.jpg', 'Diavola', 'A fiery delight with spicy salami, red pepper flakes, and fresh basil on a tomato and mozzarella base.', 40000.00, 'Pizza'),
(20, 'Pizza Caprese.jpg', ' Pizza Caprese', 'A medley of ripe tomatoes, fresh mozzarella, basil, and balsamic reduction, capturing the essence of a Caprese salad on pizza dough.', 45000.00, 'Pizza'),
(21, 'Pesto Chicken Pizza.jpg', 'Pesto Chicken Pizza', 'Grilled chicken, sun-dried tomatoes, and pesto sauce on a pizza, offering a savory and aromatic combination.', 50000.00, 'Pizza'),
(24, 'Calzone Ripieno.webp', 'Calzone Ripieno', 'A folded pizza stuffed with tomato sauce, mozzarella, ricotta, and your choice of toppings, baked to golden perfection.', 45000.00, 'Pizza'),
(26, 'Insalata Caprese.webp', 'Insalata Caprese', 'A vibrant salad of fresh tomatoes, mozzarella, basil, and balsamic glaze, showcasing the colors of the Italian flag.', 40000.00, 'Vegetables'),
(27, 'Asparagi Grigliati.jpg', 'Asparagi Grigliati', 'Grilled asparagus spears drizzled with olive oil, lemon, and a sprinkle of Parmesan cheese.', 40000.00, 'Vegetables'),
(28, 'Spinaci Saltati.jpg', 'Spinaci Saltati', 'Sautéed spinach with garlic, a hint of chili flakes, and a squeeze of lemon for a touch of zest.', 45000.00, 'Vegetables'),
(29, 'Carciofi Fritti.jpg', 'Carciofi Fritti', 'Crispy fried artichoke hearts served with a zesty aioli dipping sauce.', 45000.00, 'Vegetables'),
(30, 'Zucchine Gratin.jpg', 'Zucchine Gratin', 'Sliced zucchini baked with breadcrumbs, Parmesan, and herbs, forming a golden and crispy gratin.', 45000.00, 'Vegetables'),
(31, 'Peperoni Arrostiti.webp', 'Peperoni Arrostiti', 'Roasted bell peppers marinated in olive oil, garlic, and fresh herbs, served with crusty Italian bread.', 50000.00, 'Vegetables'),
(32, 'Funghi Trifolati.jpg', 'Funghi Trifolati', 'Sliced mushrooms sautéed with garlic, parsley, and white wine, creating a delightful mushroom medley.', 50000.00, 'Vegetables'),
(34, 'Broccoli al Vapore.jpg', ' Broccoli al Vapore', 'Steamed broccoli florets with a drizzle of extra virgin olive oil and a pinch of sea salt, for a simple and healthy side dish.', 35000.00, 'Vegetables'),
(35, 'Bruschetta Classica.jpg', ' Bruschetta Classica', 'Slices of toasted bread topped with diced tomatoes, garlic, basil, and olive oil, capturing the essence of Italy in one bite.', 45000.00, 'Appetizer'),
(36, 'Antipasto Misto.png', 'Antipasto Misto', 'A diverse selection of Italian cured meats, cheeses, olives, and marinated vegetables, perfect for sharing.', 65000.00, 'Appetizer'),
(37, 'Arancini.jpeg', 'Arancini', 'Deep-fried risotto balls filled with a creamy center of mozzarella, peas, and ragu, served with marinara sauce.', 40000.00, 'Appetizer'),
(38, 'Carpaccio di Manzo.jpg', 'Carpaccio di Manzo', ' Ultra-thin slices of raw beef, drizzled with lemon, olive oil, capers, and shaved Parmesan, creating a delicate and flavorful dish.', 40000.00, 'Appetizer'),
(40, 'Insalata di Mare.webp', ' Insalata di Mare', ' A delightful seafood salad featuring shrimp, calamari, mussels, and octopus, tossed in a lemon vinaigrette.', 50000.00, 'Appetizer'),
(41, 'Polpette al Forno.jpg', 'Polpette al Forno', 'Baked meatballs made from a blend of beef and pork, served with a savory tomato sauce and a sprinkle of Parmesan.', 45000.00, 'Appetizer'),
(43, 'Gamberi all\'Aglio.jpg', 'Gamberi all\'Aglio', 'Succulent shrimp sautéed in a garlic and white wine sauce, finished with a touch of lemon and fresh parsley.', 45000.00, 'Appetizer'),
(44, 'Funghi Ripieni.jpg', 'Funghi Ripieni', 'Stuffed mushrooms filled with a mixture of breadcrumbs, garlic, herbs, and Parmesan cheese, baked to perfection.', 40000.00, 'Appetizer'),
(45, 'Tiramisu.jpg', 'Tiramisu', 'A classic Italian dessert featuring layers of coffee-soaked ladyfingers, mascarpone cheese, and cocoa powder.', 35000.00, 'Dessert'),
(46, 'Cannoli Siciliani.webp', ' Cannoli Siciliani', 'Sicilian pastry tubes filled with sweetened ricotta cheese, chocolate chips, and candied orange peel.', 35000.00, 'Dessert'),
(47, 'Panna Cotta.webp', 'Panna Cotta', 'A silky vanilla-infused custard topped with a luscious berry compote and a drizzle of honey.', 25000.00, 'Dessert'),
(48, 'Gelato Trio.jpg', 'Gelato Trio', 'A trio of Italian gelato flavors, including creamy chocolate, luscious pistachio, and refreshing lemon, served in a crisp waffle cone.', 30000.00, 'Dessert'),
(49, 'Affogato al Caffe.jpg', 'Affogato al Caffe', 'A scoop of vanilla gelato \"drowned\" in a shot of freshly brewed espresso, offering a delightful contrast of hot and cold.', 35000.00, 'Dessert'),
(50, 'Torta al Cioccolato.webp', 'Torta al Cioccolato', 'Decadent chocolate cake served with a scoop of vanilla gelato and a drizzle of chocolate ganache.', 40000.00, 'Dessert'),
(53, 'Crostata di Frutta.jpg', 'Crostata di Frutta', 'A buttery shortcrust pastry filled with a medley of fresh fruits and a light glaze for a sweet and fruity finish.', 40000.00, 'Dessert'),
(54, 'Torte di Ricotta.jpg', 'Torte di Ricotta', 'Ricotta cheesecake featuring a velvety filling, hints of citrus zest, and a dusting of powdered sugar.', 35000.00, 'Dessert'),
(55, 'Limonata Fresca.jpg', 'Limonata Fresca', 'A refreshing and tangy lemonade made with freshly squeezed lemons, sugar, and sparkling water.', 30000.00, 'Drinks'),
(56, 'Aperol Spritz.jpg', 'Aperol Spritz', ' A vibrant and bittersweet cocktail made with Aperol, Prosecco, and a splash of soda, garnished with a slice of orange.', 35000.00, 'Drinks'),
(57, 'Negroni.webp', 'Negroni', 'A classic Italian cocktail with equal parts gin, Campari, and sweet vermouth, served over ice with an orange twist.', 45000.00, 'Drinks'),
(58, 'Caffè Espresso.jpg', 'Caffè Espresso', 'A strong and aromatic shot of espresso, the quintessential Italian coffee experience.', 35000.00, 'Drinks'),
(59, 'Cioccolata Calda.jpg', 'Cioccolata Calda', 'A rich and decadent Italian hot chocolate, thick and creamy, topped with whipped cream and cocoa.', 35000.00, 'Drinks'),
(60, 'Bellini.jpg', ' Bellini', 'A delightful cocktail featuring Prosecco and white peach puree, a sweet and bubbly treat.', 30000.00, 'Drinks'),
(61, 'Spritz al Mandarino.jpg', 'Spritz al Mandarino', 'A twist on the classic Aperol Spritz, this version includes mandarin liqueur for a citrusy kick.', 35000.00, 'Drinks'),
(62, 'Frappuccino Affogato.jpg', 'Frappuccino Affogato', 'A frozen blend of coffee, ice cream, and espresso, a caffeinated delight with a scoop of vanilla gelato.', 35000.00, 'Drinks'),
(64, 'Minestrone.webp', 'Minestrone', 'A hearty vegetable soup featuring a medley of fresh vegetables, beans, pasta, and herbs in a savory tomato broth.', 45000.00, 'Soup'),
(65, 'Zuppa di Pomodoro.jpg', 'Zuppa di Pomodoro', 'A velvety tomato soup, enriched with cream, basil, and a drizzle of olive oil, offering a comforting and classic taste.', 40000.00, 'Soup'),
(66, 'Crema di Funghi.jpg', 'Crema di Funghi', 'A creamy mushroom soup, crafted from sautéed mushrooms, garlic, and thyme, pureed to perfection.', 40000.00, 'Soup'),
(67, 'Pasta e Fagioli.webp', 'Pasta e Fagioli', 'A comforting soup with pasta, cannellini beans, tomatoes, and Italian herbs, providing a satisfying and nourishing meal.', 40000.00, 'Soup'),
(68, 'Minestra di Verdure.jpg', ' Minestra di Verdure', 'A light and nutritious vegetable soup filled with seasonal greens, root vegetables, and a delicate broth.', 35000.00, 'Soup'),
(69, 'Zuppa di Pesce.jpg', 'Zuppa di Pesce', 'A flavorful seafood soup featuring a variety of fish, shellfish, and aromatic herbs in a tomato and white wine broth.', 45000.00, 'Soup'),
(70, 'Vellutata di Zucca.webp', 'Vellutata di Zucca', 'A velvety butternut squash soup with a touch of nutmeg and a swirl of cream, creating a warm and inviting flavor.', 45000.00, 'Soup'),
(71, 'Ribollita.webp', 'Ribollita', 'A Tuscan bread and vegetable soup, made with day-old bread, cannellini beans, and hearty vegetables, simmered to rustic perfection.', 40000.00, 'Soup');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `quantity`, `price`, `date`) VALUES
(4, 14, 6, 300000, '2023-10-24'),
(5, 14, 4, 185000, '2023-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `password`, `birthdate`, `gender`, `role`, `username`, `email`) VALUES
(11, 'admin', '', '$2y$10$VDdcsdRTgppWxi4SNjzOe.2Re.Mw/vRj5rre5HQ7WTHX/IsEqlC72', '2023-10-18', 'Male', 'admin', 'admin', 'admin@delizio.com'),
(13, 'Nadya', 'Sava', '$2y$10$Jq0Y31jtm2XnIbgTbv9UyucU4pA3vLeRBjZgT4gFBPWTQ4QZEYdmu', '2004-09-16', 'Female', 'customer', 'nadyasava', 'nadyasavoy@gmail.com'),
(14, 'dafi', '.', '$2y$10$rtXEIMrz8CIf8tIFng6X.O1KYa0Q1djqFsRveCXFRTYT3G7wYpsOu', '2023-10-23', 'Male', 'customer', 'dafi', 'dafi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
