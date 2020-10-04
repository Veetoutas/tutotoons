--
-- Create Database: `tuto_toons`
--

CREATE DATABASE IF NOT EXISTS tuto_toons
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Table structure for table `tuto_import_csv`
--

CREATE TABLE IF NOT EXISTS tuto_toons.tuto_import_csv (
  `id` int(8) NOT NULL,
  `first` text NOT NULL,
  `second` text NOT NULL,
  `third` text NOT NULL,
  `fourth` text NOT NULL,
  `import_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tuto_import_csv`
--

INSERT INTO tuto_toons.tuto_import_csv (`id`, `first`, `second`, `third`, `fourth`) VALUES
(1, 'aaaa', 'BBBB', 'CcC', 'ĄąąĄžžėų');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tuto_import_csv`
--
ALTER TABLE tuto_toons.tuto_import_csv
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tuto_import_csv`
--
ALTER TABLE tuto_toons.tuto_import_csv
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
