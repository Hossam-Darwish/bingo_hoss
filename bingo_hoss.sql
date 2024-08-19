-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 07:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bingo_hoss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `admin_username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_email`) VALUES
(1, 'admin', 'a837', 'hossamd512@gmail.com'),
(2, 'admin2', 'a837', 'omarhossam200018@gma');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Mobiles and Tablets'),
(2, 'Computers'),
(3, 'TVs &amp; Projectors'),
(4, 'Women Clothing'),
(5, 'Men Clothing'),
(6, 'Perfumes for Him'),
(7, 'Perfumes for Her');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(6) NOT NULL,
  `product_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_category_id` int(2) NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_category_id`, `product_price`, `product_desc`, `product_image`) VALUES
(1, 'Samsung Galaxy A52s ', 1, 6999, 'Model name	Samsung A52s Dual Sim , 5G\r\nWireless carrier	Unlocked\r\nBrand	SAMSUNG\r\nForm factor	Foldable Screen\r\nMemory storage capacity	8 GB\r\nOS	Android 11.0\r\nColour	Violet\r\nCellular technology	LTE\r\nDisplay type	AMOLED\r\nManufacturer	Samsung\r\nSee more\r\nAbout this item\r\n6.5&quot; 1080x2400 pixels 64MP 2160p 8GB RAM Snapdragon 778G 5G 4500mAh Li-Po', '163801835761VzZozPuxL._AC_UL480_QL65_.jpg'),
(2, 'Samsung Galaxy A12 D', 1, 2600, 'Wireless carrier	Unlocked for All Carriers\r\nBrand	SAMSUNG\r\nMemory storage capacity	64 GB\r\nOS	Android\r\nColour	Black\r\nModel year	2021\r\nScreen size	6.5 Inches\r\nManufacturer	Samsung', '163801924181A3nwwKt2S._AC_UL480_QL65_.jpg'),
(3, 'New 2021 Apple iPad ', 1, 11699, 'Brand	Apple\r\nScreen size	8.3\r\nMemory storage capacity	64 GB\r\nColour	Space Grey\r\nConnectivity Type	Wi-Fi\r\nItem dimensions LxWxH	6 x 135 x 195 millimeters\r\nItem weight	0.65 Kilograms\r\nMaximum webcam image resolution	12 MP\r\nHardware interface	USB Type C\r\nSee less\r\nAbout this item\r\n8.3-inch Liquid Retina display with True Tone and wide color\r\nA15 Bionic chip with Neural Engine\r\nTouch ID for secure authentication and Apple Pay\r\n12MP Wide back camera, 12MP Ultra Wide front camera with Center Stage\r\nAvailable in purple, starlight, pink, and space gray&quot;\r\nAvailable in purple, starlight, pink, and space gray', '163801943771ey-9D8yDL._AC_UL480_QL65_.jpg'),
(4, 'Huawei MatePad T10s ', 1, 4480, 'Brand	HUAWEI\r\nScreen size	10.1 Inches\r\nOperating System	Android\r\nMemory storage capacity	64 GB\r\nColour	Deepsea Blue\r\nItem dimensions LxWxH	8 x 159 x 240 millimeters\r\nItem weight	450 Grams\r\nCellular technology	4G\r\nHardware interface	USB\r\nSee less\r\nAbout this item\r\nIdeal Children Companion: HUAWEI MatePad T 10s allows your kids to explore freely with age-appropriate content via exclusive access to Kids Corner. It also goes further with six-layered protection to preserve their precious sight.\r\nHUAWEI MatePad T 10s combine EMUI 10.1 octa-core chipset and advanced algorithm\r\n10.1 inch 1920x1200 (FHD) display', '163801953751wqPVJamLL._AC_UL480_QL65_.jpg'),
(5, 'Lenovo IdeaPad 3 Lap', 2, 10499, 'Lenovo IdeaPad 3 Laptop - 10th Generation Intel Core i5-1035G1, 8GB RAM, 1TB HDD, Intel UHD Graphics, 14 Inch FHD (1920x1080) 220nits Anti-glare, Fingerprint Reader, Dos - Cherry Red\r\nTechnical Details\r\nBrand	‎Lenovo\r\nPackage Dimensions	‎48.6 x 31 x 7.4 cm; 2.21 Kilograms\r\nManufacturer	‎Lenovo\r\nStanding screen display size	‎14 Inches\r\nItem Weight	‎2.21 kg', '163801991841pvNpP6pVS._AC_SX184_.jpg'),
(6, 'Lenovo IdeaPad L340 ', 2, 7950, 'Lenovo IdeaPad L340 Laptop - AMD Ryzen 3 3200U, 4GB RAM, 1TB HDD, 15.6 inch HD, Integrated AMD Radeon Vega 3 Graphics, DOS - Black.\r\nBrand : LenovoVideo Controller Manufacturer : AMDGraphics Card Capacity : Shared - Built inMemory Card Reader : YesKeyboard Languages : English and ArabicTouch screen : NoUsage : Multi', '163802014151kBSHsvmsS._AC_SX184_.jpg'),
(7, 'JAC 39 Inch HD LED T', 3, 2695, 'Screen size	39 Inches\r\nConnectivity technology	USB\r\nBrand	Jac\r\nResolution	768p\r\nDisplay technology	LED\r\nRefresh rate	240\r\nModel year	2021\r\nColour	Black\r\nItem weight	5 Kilograms\r\nHardware interface	USB 2.0\r\nSee more\r\nAbout this item\r\nJAC 39 Inch HD LED TV - 39N\r\nAngle: 178×178\r\nResolution: 1366×768\r\nMade in Egypt\r\nColor -BLACK\r\nAspect Ratio: 16:09\r\nDimensions without holder: 84 × 43 × 73 cm Contrast: 1200:1\r\nBrightness: 200 Degree Response time: 8m/s\r\n2 x HDMI 2 x USB 1 x AV IN 1 x VGA 1 x Component IN 1 x TV Tuner: (RF) 1 x speaker port', '163802032661fVIupv6nL._AC_UL480_QL65_.jpg'),
(8, 'Jac 158T 58 Inch 4K', 3, 6400, 'Smart Android TV\r\nViewing angle: 178 x 178\r\nResolution: 3840 x 2160 4K\r\nAspect ratio: 16:09\r\nDimensions without stand: 134 x 20 x 86 cm\r\nContrast: 1200:01:00\r\nBrightness: 230 degrees Response speed: 8 ms Resolution: 3840 x 2160', '163802272141rv7JYR-xS._AC_UL480_QL65_.jpg'),
(9, 'DOCKLAND WOMEN T-SHI', 4, 312, 'DOCKLAND WOMEN T-SHIRT P-PRINT-ROSE-XXL\r\n\r\nProduct details:\r\nPackage Dimensions ‏ : ‎ 38 x 32.5 x 1.25 cm; 300 Grams\r\nDate First Available ‏ : ‎ 12 October 2021\r\nManufacturer ‏ : ‎ Dockland\r\nASIN ‏ : ‎ B09J8WXTQ3\r\nItem model number ‏ : ‎ WS20TS35\r\nDepartment ‏ : ‎ Womens\r\nBest Sellers Rank: #1,586 in Fashion', '163802063461vgoMImcpL._AC_UL480_QL65_.jpg'),
(10, 'Coup - Slim Fit Grap', 5, 299, 'Add more fashionable basics to your wardrobe with this stylish hoodie. Highlighted with a bold print, this trendy pick with long sleeves and pockets is made of cotton blend fabric and will keep your warm and comfortable for long hours. Style : Hoodies Sleeve Length : Long Sleeves Fit : Regular Neckline : Hooded Neck Design : Printed Occasion : Casual Material : Cotton Blend', '1638020833618dLo8A3zL._AC_UL480_QL65_.jpg'),
(12, 'Team Force By Adidas', 6, 94, 'Brand	Adidas\r\nItem weight	100 Grams\r\nItem volume	100 Milliliters\r\nAbout this item\r\nUrban, young &amp; masculine fragranceUnique sensation of fresh energyLong-lasting fragrance up to 24hErgonomic shape to fit in handDeveloped with athletes', '1638021734619TG0x2heL._AC_UL480_QL65_.jpg'),
(15, 'Arden Beauty by Eliz', 7, 313, 'Brand	Elizabeth Arden\r\nItem weight	0.34 Kilograms\r\nItem volume	100 Milliliters\r\n\r\nBrand	Elizabeth Arden\r\nItem weight	0.34 Kilograms\r\nItem volume	100 Milliliters\r\nAbout this item\r\nBrand: Elizabeth ArdenManufacturer Number: 85805785345.0Fragrance Type: Eau de ParfumSize: 100mlTargeted Group: WomenFragrance Family: FloralName: Arden', '1638037720616-zV92GVL._AC_UL480_QL65_.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
