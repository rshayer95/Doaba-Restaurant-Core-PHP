-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 04:52 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(100) NOT NULL,
  `upass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `upass`) VALUES
('Admin', '16041431604137');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `b_id` int(11) NOT NULL,
  `b_by` varchar(50) NOT NULL,
  `b_head` varchar(100) NOT NULL,
  `b_ingredients` varchar(5000) DEFAULT NULL,
  `subtitle1` varchar(1000) DEFAULT NULL,
  `b_blog1` varchar(5000) NOT NULL,
  `subtitle2` varchar(1000) DEFAULT NULL,
  `b_blog2` varchar(5000) DEFAULT NULL,
  `subtitle3` varchar(1000) DEFAULT NULL,
  `b_blog3` varchar(5000) DEFAULT NULL,
  `b_img` varchar(200) DEFAULT NULL,
  `uploaddate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`b_id`, `b_by`, `b_head`, `b_ingredients`, `subtitle1`, `b_blog1`, `subtitle2`, `b_blog2`, `subtitle3`, `b_blog3`, `b_img`, `uploaddate`) VALUES
(1, 'Admin', 'Moroccan Snacking Doughnut Recipe', '2 teaspoons yeast,1 tablespoon sugar,1 1/4 cups warm water & divided , 3 cups all purpose flour,1 teaspoon salt,cinnamon sugar for dusting if desired', '', 'First off: The dough is extremely sticky with a high hydration. The dough comes together quickly, easily . Yeast is activated with a bit of warm water and sugar, then stirred into flour with a bit of salt.  Use trusty Kitchen Aid to do the heavy kneading and then it was just a question of letting the dough rise for four hours. Yup, four hours. The long rise produces lots of air bubbles and a more complex flavor.\r\nAfter the rise, you lightly oil your hands squeeze off a plum sized piece of dough, shape it into a ball, then poke a hole in it, kind of how bagels are made. I donâ€™t think you could cut out this dough even if you wanted to. The results of hand shaping are quirky and rustic. A quick deep fry with a bit of time for cooling and youâ€™ll want to devour these babies right away. Theyâ€™re golden and crispy on the ouside and chewy, hole-y, and fluffy on the insides. We forgot to snap a photo of the insides, but they had a beautiful crumb. They kind of reminded me a bit of the texture of mochi doughnuts but even more chewy.\r\n\r\nI donâ€™t know if Iâ€™m doing a good job describing these guys but I will say that they were SO GOOD. And dangerous because Mike and I ate entirely too many doughnuts. I liked mine with cinnamon-sugar (completely inauthentic) and Mike liked them plain with a bit of extra salt. He thought they were kind of like Chinese doughnuts, but not as crispy. Theyâ€™re more of a snacking doughnut, not a sweet dessert doughnut and Iâ€™m kind of in love. Donuts all day everyday!', '', 'Mix the yeast and sugar with 1/4 cup of warm water and let sit for 15 minutes. The yeast mixture should be nice and frothy.\r\n\r\nIn the bowl of a stand mixer, stir together the flour and salt. Add the yeast mixture and the remaining 1 cup of water. Stir until everything comes together to form a shaggy ball and then use the dough hook to knead on medium-low, for about 10 minutes, until the dough reaches the windowpane stage â€“ take a piece of dough about the size of a golf ball and stretch it out between your fingers and thumbs. If you can stretch it without the dough breaking and you can see through the stretched dough, youâ€™re good to go. If the dough doesnâ€™t windowpane, knead a bit longer.\r\n\r\nTransfer to a large lightly oiled bowl and cover. Let rise for 2-4 hours.\r\n\r\nWith generously oiled hands (this is key â€“ you need oiled hands to work with this dough otherwise it is too sticky), portion off a small plum sized amount of dough. Shape each portion into a ball: bring the edges towards the center and tucking into balls. Place the balls on a lightly oiled baking sheet and cover and let rest for 30 minutes.', '', 'When the 30 minutes are up, heat up a deep sided pot of 1-2 inches of neutral oil (I prefer grapeseed) over medium high heat until it reaches 350Â°F.\r\n\r\nI found that it was best to shape the doughnuts and fry them right away as opposed to assembly-line shaping them. Have the baking sheet of dough balls next to your stove. With lightly oiled hands, use your thumb to poke a hole into the center of a ball of dough. Use your fingers to expand the hole â€“ you want it to be fairly large or it will disappear when you fry. Immediately drop the doughnut into the oil and cook until golden and brown, flipping once. Remove from the oil and drain on wire racks or paper towels. Repeat with the remaining doughnuts.\r\n\r\nToss in cinnamon sugar while still hot, if desired. Otherwise, enjoy these guys hot as they donâ€™t taste nearly as good when theyâ€™ve cooled to room temperature. Iâ€™d even say that itâ€™s best to just fry them and eat them as needed. You can keep the dough in the fridge and just fry off one or two doughnuts as needed. You just need to let the dough have the 30 minute rest as balls. Enjoy!', 'IAM_0309.jpg', '14-May-2018'),
(2, 'Admin', 'Heart Shaped Roasted Potatoes', '4 potatoes of choice, coarse salt,freshly ground black pepper,2 tablespoons oil plus extra', '', 'Preheat the oven to 375Â°F.\r\n\r\nPeel the potatoes and slice into even 1-inch rounds. Use a heart cookie cutter to cut out heart shapes. Use the leftover potato cutouts for mashed potatoes or regular roasted potatoes. Rinse the potatoes and place in a large pot covered with cold water. Bring to a boil and cook for 5 minutes until just parboiled. Pour into a colander and let drain.\r\n\r\nHeat up 1-2 tablespoons of oil a cast iron skillet over medium high heat and add the hearts, lightly browning each side, about 5 minutes per side. Season generously with salt and pepper.\r\n\r\nRoast the potatoes in the skillet in the oven for 20 minutes. Carefully flip the potatoes. Bake for another 30 minutes or until deeply brown and extra crispy. Enjoy!', '', '', '', '', 'valentines-day-steak-and-potatoes-recipe_6929.jpg', '14-May-2018'),
(3, 'Admin', 'Creamy Pumpkin Mac and Cheese Recipe', '3 1/2 tablespoons butter, 3 tablespoons flour,2 cups milk,2 1/2 cups water,1/2 teaspoon dry mustard powder,1/2 teaspoon garlic powder,1/4 teaspoon onion powder,dash of nutmeg if desired,\r\n2 1/2 cups macaroni or noodle of choice (250 grams),2 1/4 cups shredded cheese combo of choice,1/2 cup pure pumpkin puree,salt and pepper to taste', '', 'In a large sauce pan, melt the butter over medium heat. Stir in the flour and cook, stirring, until smooth, 1-2 minutes. Pour in 1 cup of the milk in a thin stream while whisking â€“ it will be quite thick. Whisk in the rest of the milk and 2 1/2 cups of water, mustard, garlic, and onion powder. Add in the nutmeg (if using). Add in the macaroni, stirring occasionally, until wisps of steam come up as you stir. Turn the heat down to medium low.\r\n\r\nStir occasionally as the pasta bubbles away, gently, for about 9-10 minutes, or until the macaroni is tender and the sauce starts to thicken. It should be quite liquid/saucy at this point as adding in the cheese will thicken it up.\r\n\r\nRemove the pan from the heat and stir in the cheese and pumpkin quickly. Season with salt and pepper and let stand for a couple of minutes. The sauce will thicken as it rests. Enjoy!', '', '', '', '', 'pumpkin-mac-n-cheese-9911.jpg', '14-May-2018');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pic` varchar(500) DEFAULT NULL,
  `createdon` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `pic`, `createdon`) VALUES
(1, 'Dessert', 'dessert.jpg', '10-May-2018'),
(2, 'Veg Food', 'veggies.jpg', '13-May-2018'),
(4, 'Pizza', '2-ingredient-pizza-dough-weight-watchers-9.jpg', '13-May-2018'),
(5, 'Chinese', 'pastaveg_640x480.jpg', '13-May-2018'),
(6, 'Drinks', 'a21f689bb16e49828f950b66852bf6bf.jpg', '13-May-2018');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` varchar(5000) DEFAULT NULL,
  `sentdate` varchar(20) DEFAULT NULL,
  `senttime` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`, `sentdate`, `senttime`) VALUES
(1, 'Armaan Sandhu', 'armaan_sandhu@gmail.com', 'The design of the application is so nice.', '04-Apr-2018', '11:21:22 am '),
(3, 'Gurpreet Singh Maan', 'gurpreet_12@hotmail.com', 'The app is running very smoothly. Please enhance video section.', '20-May-2018', '15:43:41 pm ');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `qualification` varchar(200) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `jobof` varchar(20) DEFAULT NULL,
  `registerdate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `email`, `age`, `qualification`, `address`, `gender`, `mobile`, `jobof`, `registerdate`) VALUES
(2, 'Navjeet Singh', 'idnavi03@gmail.com', 25, 'Post Graduate', 'Jalandhar', 'Male', '7898569874', 'IT', '20/May/2018');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `pic` varchar(1000) DEFAULT NULL,
  `createdon` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `category`, `price`, `pic`, `createdon`) VALUES
(1, 'Cheese Cake', 'Dessert', 1500, '1387411272847.jpeg.jpg', '13-May-2018'),
(2, 'Chocolate Brownie', 'Dessert', 1300, '7753a030-b7d2-48a6-8950-a08187df4782.jpg', '13-May-2018'),
(8, 'Layered Chocolate Espresso', 'Dessert', 1800, 'Layered-Chocolate-Espresso-Cheesecake-Dessert-No-Bake.jpg', '20-May-2018');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `dish_name` varchar(200) NOT NULL,
  `dish_price` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_mobile` varchar(50) NOT NULL,
  `order_date` varchar(20) DEFAULT NULL,
  `order_time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `dish_id`, `dish_name`, `dish_price`, `category`, `customer_name`, `customer_email`, `customer_mobile`, `order_date`, `order_time`) VALUES
(1, 1, 'Cheese Cake', 1500, 'Dessert', 'Navjeet Singh', 'idnavi03@gmail.com', 'Mobile Number Not Given', '20-May-2018', '09:25:01am'),
(3, 2, 'Chocolate Brownie', 1300, 'Dessert', 'Navjeet Singh', 'idnavi03@gmail.com', 'Mobile Number Not Given', '20-May-2018', '12:56:39pm'),
(5, 7, 'Chocolate Cake', 1200, 'Dessert', 'Armaan Sandhu', 'armaan_sandhu@gmail.com', 'Mobile Number Not Given', '20-May-2018', '02:56:22pm');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `qualification` varchar(200) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `trainingof` varchar(20) DEFAULT NULL,
  `startdate` varchar(50) DEFAULT NULL,
  `registerdate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `name`, `email`, `age`, `qualification`, `address`, `gender`, `mobile`, `trainingof`, `startdate`, `registerdate`) VALUES
(2, 'Gurtez Singh', 'gurtez_singh@live.com', 24, 'POST GRADUATE', 'Ludhiana', 'Male', '8798654589', 'Catering', '07/Apr/2018', '07/Apr/2018'),
(5, 'Gurpreet Singh', 'gurpreetsingh_maan@hotmail.cm', 24, 'Diploma in Hotel Management', 'Patiala', 'Male', '6878986598', 'Chef', '25/May/2018', '20/May/2018');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `uname` varchar(15) NOT NULL,
  `upass` varchar(20) NOT NULL,
  `umail` varchar(100) NOT NULL,
  `ufullname` varchar(100) NOT NULL,
  `profilepic` varchar(200) DEFAULT NULL,
  `ugender` varchar(10) DEFAULT NULL,
  `umobile` varchar(15) DEFAULT NULL,
  `ques` varchar(500) NOT NULL,
  `ans` varchar(500) NOT NULL,
  `regdate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`uname`, `upass`, `umail`, `ufullname`, `profilepic`, `ugender`, `umobile`, `ques`, `ans`, `regdate`) VALUES
('armaan_sandhu11', 'armaan11', 'armaan_sandhu@gmail.com', 'Armaan Sandhu', 'img/smart-profile-picture.jpg', 'Male', '', 'q2', 'Ludhiana', '24-Mar-2018'),
('idnavi03', 'navisaab', 'idnavi03@gmail.com', 'Navjeet Singh', 'img/11220081_908830732545279_3086318213650328231_n.jpg', 'Male', NULL, 'q1', 'Sheru', '10-03-2018');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `video` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video`) VALUES
(51, '9b9b2e27ee0c3aec970b0e149c25a9711526564235.mp4'),
(53, '775293c8774f360a0b5ff3e6ced5ff671526564236.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`uname`),
  ADD UNIQUE KEY `umail` (`umail`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
