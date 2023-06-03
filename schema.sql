CREATE TABLE `teacher` (
  `id` varchar(255) PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL
);

CREATE TABLE `student` (
  `id` varchar(255) PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `noAbsen` varchar(255) NOT NULL,
  `classId` varchar(255) NOT NULL
);

CREATE TABLE `classData` (
  `id` varchar(255) PRIMARY KEY,
  `teacherId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) UNIQUE NOT NULL,
  `tema` varchar(255) NOT NULL
);

CREATE TABLE `subtema` (
  `id` varchar(255) PRIMARY KEY,
  `name` varchar(255) UNIQUE NOT NULL
);

CREATE TABLE `question` (
  `id` varchar(255) PRIMARY KEY,
  `subtemaId` varchar(255),
  `content` text NOT NULL,
  `image1Url` text,
  `image2Url` text,
  `image3Url` text
);

CREATE TABLE `answer` (
  `id` varchar(255) PRIMARY KEY,
  `questionId` varchar(255) NOT NULL,
  `content` text NOT NULL
);
