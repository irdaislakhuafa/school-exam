DROP DATABASE IF EXISTS `school_exam`;
CREATE DATABASE `school_exam`;
USE `school_exam`;

-- start schema
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
  `code` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL
);

CREATE TABLE `subtema` (
  `id` varchar(255) PRIMARY KEY,
  `name` varchar(255) UNIQUE NOT NULL
);

CREATE TABLE `materi` (
  `id` varchar(255) PRIMARY KEY,  
  `subtemaId` varchar(255),
  `title` text NOT NULL,
  `content` text NOT NULL
);

CREATE TABLE `images` (
  `id` varchar(255) PRIMARY KEY,
  `materiId` varchar(255) NOT NULL,
  `name` text,
  `description` text
);

CREATE TABLE `soal` (
  `id` varchar(255) PRIMARY KEY,
  `materiId` varchar(255) NOT NULL,
  `question` text NOT NULL
);

CREATE TABLE `scores` (
  `id` varchar(255) PRIMARY KEY,
  `subtemaId` varchar(255) NOT NULL,
  `materiId` varchar(255) NOT NULL,
  `studentId` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
);

-- end schema

-- done remove this
INSERT INTO `subtema` (`id`, `name`) VALUES
  ('488f93d8-86ca-4452-90df-b9271f9cb490', '1'),
  ('87e274de-f8cd-4192-bc33-a8b8687f9ff4', '2'),
  ('7f24a407-181b-4247-8698-27d75b7fe1da', '3'),
  ('1ec9e921-2842-44e2-9220-3dcf75414003', '4'),
  ('a0064714-cf3d-476f-8126-6ec530d292dc', '5'),
  ('19522abd-5fd2-454d-9f08-927e76e9a53d', '6')
;

-- TODO: maybe remove this
-- example teacher
INSERT INTO `teacher` (`id`, `name`, `email`, `password`) VALUES 
  ('ad2712f7-e998-4358-abf0-42a844766125', 'Admin', 'admin@example.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918') -- admin
;

-- example class data
INSERT INTO `classData` (`id`, `teacherId`, `name`, `code`, `tema`) VALUES
  ('cf1765b0-7355-42a0-b028-dc37c1f690da', 'ad2712f7-e998-4358-abf0-42a844766125', 'class dummy', 'xxx', 'tema dummy')
;

-- example student data
INSERT INTO `student` (`id`, `name`, `noAbsen`, `classId`) VALUES
  ('88fc0ea7-57f5-4e71-89db-d79771daaa39', "student dummy 1", "12345","cf1765b0-7355-42a0-b028-dc37c1f690da"),
  ('e7f0154e-8444-4b5e-bb74-1c061b9959e7', "student dummy 2", "67890","cf1765b0-7355-42a0-b028-dc37c1f690da")
;

