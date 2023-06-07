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
  `number` INT NOT null,
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

-- example materi | subtema 1
INSERT INTO `materi` (`id`, `subtemaId`, `number`, `title`, `content`) VALUES
  ('27d7159f-05e1-4ae2-8af2-deba0fd3bdbb', '488f93d8-86ca-4452-90df-b9271f9cb490', 1, 'Pengantar Pemrograman Python', 'Pada materi ini, Anda akan diperkenalkan dengan bahasa pemrograman Python. Kami akan menjelaskan mengapa Python menjadi salah satu bahasa pemrograman yang populer dan memberikan gambaran umum tentang sintaks dasar Python. Anda juga akan mempelajari cara menginstal Python dan menjalankan program pertama menggunakan interpreter Python.'),
  ('73868718-9cd8-4c37-9b6f-c39c0d94b024', '488f93d8-86ca-4452-90df-b9271f9cb490', 2, 'Struktur Data dan Algoritma','Materi ini membahas struktur data dan algoritma yang merupakan dasar dalam pemrograman komputer. Kami akan membahas beberapa struktur data seperti array, linked list, stack, queue, dan tree. Selain itu, Anda juga akan mempelajari algoritma dasar seperti pengurutan, pencarian, dan traversal. Materi ini akan memberikan pemahaman yang kuat tentang cara mengelola data dalam program Anda.'),
  ('546f7833-7848-4cea-8e76-87dc84f002ce', '488f93d8-86ca-4452-90df-b9271f9cb490', 3, 'Pengembangan Web dengan HTML dan CSS','Pada materi ini, Anda akan belajar tentang pengembangan web menggunakan HTML (Hypertext Markup Language) dan CSS (Cascading Style Sheets). Kami akan menjelaskan konsep dasar HTML dan cara menggunakan tag-tag HTML untuk membuat struktur halaman web. Selain itu, Anda juga akan mempelajari CSS untuk mendesain tampilan visual halaman web, termasuk pengaturan warna, tata letak, dan gaya teks.'),
  ('272f1d06-7428-40a3-81f7-803df0d91017', '488f93d8-86ca-4452-90df-b9271f9cb490', 4, 'Pemrograman Berorientasi Objek dengan Java','Materi ini akan mengenalkan Anda pada konsep pemrograman berorientasi objek (OOP) menggunakan bahasa pemrograman Java. Kami akan menjelaskan konsep dasar OOP seperti class, objek, pewarisan, dan polimorfisme. Anda juga akan mempelajari cara membuat class, menginstansiasi objek, dan menggunakan fitur-fitur OOP lainnya dalam bahasa Java.'),
  ('22bf8f7e-b6d8-4ffd-a118-225a27bdbe3c', '488f93d8-86ca-4452-90df-b9271f9cb490', 5, 'Basis Data dan SQL','Materi ini akan membahas dasar-dasar basis data dan bahasa SQL (Structured Query Language). Anda akan mempelajari konsep dasar basis data, termasuk tabel, kolom, baris, dan hubungan antartabel. Selain itu, Anda juga akan belajar tentang SQL untuk mengakses, mengubah, dan mengelola data dalam basis data. Materi ini akan memberikan pemahaman tentang bagaimana mengelola data secara efisien dalam proyek pengembangan perangkat lunak.')
;
-- example materi | subtema 2
INSERT INTO `materi` (`id`, `subtemaId`, `number`, `title`, `content`) VALUES
  ('4f846b2d-d9d9-4b19-80e1-c0c455e3d396', '87e274de-f8cd-4192-bc33-a8b8687f9ff4', 1, 'Pengenalan HTML dan CSS', 'Materi ini akan memperkenalkan Anda pada HTML (Hypertext Markup Language) dan CSS (Cascading Style Sheets). HTML digunakan untuk membuat struktur dan konten halaman web, sedangkan CSS digunakan untuk mengatur tampilan dan gaya halaman web. Anda akan belajar tentang tag HTML, atribut, elemen, serta cara menggabungkan CSS dengan HTML untuk membuat tampilan yang menarik dan responsif.'),
  ('2a8d302f-3874-4cf6-a4e3-e9f3720553ab', '87e274de-f8cd-4192-bc33-a8b8687f9ff4', 2, 'Konsep Pemrograman Berorientasi Objek', 'Materi ini membahas konsep pemrograman berorientasi objek (OOP). Anda akan mempelajari konsep dasar OOP seperti kelas, objek, pewarisan, enkapsulasi, dan polimorfisme. Anda juga akan belajar bagaimana menerapkan konsep-konsep ini dalam bahasa pemrograman tertentu, seperti Python atau Java. Pemrograman berorientasi objek adalah paradigma yang kuat dan populer dalam pengembangan perangkat lunak modern.'),
  ('954345d6-ef93-4040-a3db-0e1192699102', '87e274de-f8cd-4192-bc33-a8b8687f9ff4', 3, 'Basis Data dan SQL', 'Materi ini akan membahas dasar-dasar basis data dan SQL (Structured Query Language). Anda akan belajar tentang konsep basis data, entitas, atribut, dan hubungan antar entitas. Selain itu, Anda akan dipandu dalam menggunakan SQL untuk membuat, mengambil, memperbarui, dan menghapus data dari basis data. Pemahaman tentang basis data dan SQL sangat penting dalam pengembangan aplikasi yang melibatkan penyimpanan dan pengelolaan data.'),
  ('ee2989a4-60d8-4651-a78e-1e6feb3b1ba6', '87e274de-f8cd-4192-bc33-a8b8687f9ff4', 4, 'Pengembangan Aplikasi Mobile dengan React Native', 'Materi ini akan memperkenalkan Anda pada pengembangan aplikasi mobile dengan menggunakan React Native. React Native adalah kerangka kerja JavaScript yang memungkinkan Anda membuat aplikasi mobile lintas platform dengan menggunakan kode JavaScript yang sama. Anda akan belajar tentang komponen, navigasi, manajemen state, dan integrasi dengan API eksternal dalam pengembangan aplikasi mobile dengan React Native.'),
  ('031f95be-4706-43a0-bb4c-3e1d6a199663', '87e274de-f8cd-4192-bc33-a8b8687f9ff4', 5, 'Pengujian Perangkat Lunak', 'Materi ini membahas pengujian perangkat lunak, yang merupakan proses penting dalam siklus pengembangan perangkat lunak. Anda akan mempelajari konsep pengujian perangkat lunak, jenis-jenis pengujian, dan teknik-teknik pengujian yang umum digunakan. Anda juga akan belajar tentang alat dan kerangka kerja yang dapat membantu dalam melakukan pengujian perangkat lunak secara efektif dan efisien.')
;
-- example materi | subtema 3
INSERT INTO `materi` (`id`, `subtemaId`, `number`, `title`, `content`) VALUES
  ('f65444c7-4b40-438d-96ac-f29f128054ee', '7f24a407-181b-4247-8698-27d75b7fe1da', 1, 'Pengenalan Jaringan Komputer', 'Materi ini akan mengenalkan Anda pada dasar-dasar jaringan komputer. Anda akan mempelajari tentang komponen jaringan seperti router, switch, dan modem. Selain itu, Anda akan memahami protokol jaringan seperti TCP/IP, DNS, dan DHCP. Materi ini juga akan membahas topologi jaringan, pengalamatan IP, dan konsep jaringan yang umum digunakan dalam lingkungan komputer.'),
  ('287e743d-0dd9-40a7-b54f-2370c94094b4', '7f24a407-181b-4247-8698-27d75b7fe1da', 2, 'Pengenalan Kecerdasan Buatan', 'Materi ini akan memberikan pengenalan tentang kecerdasan buatan (artificial intelligence/AI). Anda akan belajar tentang konsep dasar AI, termasuk pembelajaran mesin (machine learning), pengolahan bahasa alami (natural language processing), dan pengenalan pola (pattern recognition). Materi ini juga akan membahas penerapan AI dalam berbagai bidang, seperti pengenalan wajah, otomatisasi, dan pengambilan keputusan.'),
  ('d8531677-6a77-4502-8f92-9eb45144afd6', '7f24a407-181b-4247-8698-27d75b7fe1da', 3, 'Pengembangan Web dengan Framework Django', 'Materi ini akan membahas pengembangan web dengan menggunakan framework Django. Django adalah framework web yang berbasis Python yang memungkinkan Anda untuk dengan cepat membangun aplikasi web yang kuat dan skalabel. Anda akan belajar tentang model-view-controller (MVC) dalam Django, manajemen basis data, pembuatan tampilan (views), dan routing URL. Materi ini juga akan mencakup pembuatan formulir, autentikasi pengguna, dan pengujian aplikasi web dengan Django.'),
  ('518de72a-efb9-47ca-b27e-652dd1f80e1b', '7f24a407-181b-4247-8698-27d75b7fe1da', 4, 'Pemrograman Paralel dan Terdistribusi', 'Materi ini akan memperkenalkan konsep pemrograman paralel dan terdistribusi. Anda akan mempelajari bagaimana memanfaatkan kekuatan komputasi yang tersedia di beberapa prosesor atau komputer secara bersamaan untuk meningkatkan kinerja aplikasi. Materi ini akan mencakup paradigma pemrograman paralel, komunikasi antar proses, dan algoritme terdistribusi. Anda akan belajar tentang alat dan teknologi yang digunakan dalam pemrograman paralel dan terdistribusi, seperti MPI (Message Passing Interface) dan Apache Hadoop.'),
  ('a2815142-ae7e-442e-bf70-81383ee6b3f6', '7f24a407-181b-4247-8698-27d75b7fe1da', 5, 'Pengenalan Pengembangan Aplikasi Berbasis Cloud', 'Materi ini akan mengenalkan Anda pada pengembangan aplikasi berbasis cloud. Anda akan mempelajari konsep-konsep dasar cloud computing, seperti infrastruktur sebagai layanan (Infrastructure as a Service/IaaS), platform sebagai layanan (Platform as a Service/PaaS), dan perangkat lunak sebagai layanan (Software as a Service/SaaS). Materi ini juga akan membahas arsitektur aplikasi berbasis cloud, manajemen sumber daya, dan skala otomatis. Anda akan memahami bagaimana membangun dan menerapkan aplikasi yang dapat berjalan secara efisien di lingkungan cloud.')
;
-- example materi | subtema 4
INSERT INTO `materi` (`id`, `subtemaId`, `number`, `title`, `content`) VALUES
  ('acb69f7a-b5a7-4d4a-acd1-935b9fe25169', '1ec9e921-2842-44e2-9220-3dcf75414003', 1, 'Pengantar Pendidikan Dasar', 'Materi ini akan memberikan pemahaman dasar tentang pendidikan dasar dan peranannya dalam pembentukan generasi muda. Anda akan mempelajari konsep dasar dalam pendidikan, struktur sistem pendidikan dasar, kurikulum, metode pengajaran, dan evaluasi pendidikan dasar.'),
  ('34fb9a71-cf89-4f7f-b4d6-be8f2a8b36a4', '1ec9e921-2842-44e2-9220-3dcf75414003', 2, 'Psikologi Perkembangan Anak Usia Dini', 'Materi ini akan membahas tentang perkembangan anak usia dini dari segi psikologi. Anda akan mempelajari teori-teori perkembangan anak usia dini, seperti teori perkembangan kognitif, sosial, dan emosional. Materi ini juga akan membahas praktik-praktik terbaik dalam membantu perkembangan anak usia dini.'),
  ('c043db59-0c95-463c-bb0b-7e0544dde86d', '1ec9e921-2842-44e2-9220-3dcf75414003', 3, 'Strategi Pembelajaran di Pendidikan Dasar', 'Materi ini akan membahas strategi-strategi pembelajaran yang efektif dalam konteks pendidikan dasar. Anda akan mempelajari metode-metode pembelajaran aktif, kreatif, dan menyenangkan yang dapat meningkatkan partisipasi dan pemahaman siswa. Materi ini juga akan membahas penggunaan teknologi dalam pembelajaran.'),
  ('6170336e-722e-42ad-b3b1-47ee2ab71b7f', '1ec9e921-2842-44e2-9220-3dcf75414003', 4, 'Manajemen Kelas dalam Pendidikan Dasar', 'Materi ini akan membahas tentang manajemen kelas yang efektif dalam konteks pendidikan dasar. Anda akan mempelajari strategi-strategi untuk menciptakan lingkungan belajar yang kondusif, mengelola perilaku siswa, dan meningkatkan keterlibatan siswa dalam proses pembelajaran.'),
  ('db336258-3312-4e54-b771-8340168aa26c', '1ec9e921-2842-44e2-9220-3dcf75414003', 5, 'Evaluasi dan Penilaian di Pendidikan Dasar', 'Materi ini akan membahas tentang evaluasi dan penilaian dalam pendidikan dasar. Anda akan mempelajari berbagai metode evaluasi, teknik penilaian autentik, dan penggunaan hasil evaluasi untuk perbaikan pembelajaran. Materi ini juga akan membahas etika penilaian dan pelaporan hasil penilaian kepada siswa dan orang tua.')
;
-- example materi | subtema 5
INSERT INTO `materi` (`id`, `subtemaId`, `number`, `title`, `content`) VALUES
  ('6879b962-6813-4025-9c64-c050bf06a76f', 'a0064714-cf3d-476f-8126-6ec530d292dc', 1, 'Literasi Digital dalam Pendidikan Dasar', 'Materi ini akan membahas pentingnya literasi digital dalam konteks pendidikan dasar. Anda akan mempelajari tentang penggunaan teknologi informasi dan komunikasi (TIK) dalam pembelajaran, keamanan digital, pemanfaatan sumber daya digital, dan pengembangan keterampilan digital bagi siswa. Materi ini juga akan membahas tentang etika dan tanggung jawab dalam penggunaan teknologi.'),
  ('665baaad-9204-45f3-966c-81b8f74eaf47', 'a0064714-cf3d-476f-8126-6ec530d292dc', 2, 'Pembelajaran Berbasis Proyek di Pendidikan Dasar', 'Materi ini akan mengenalkan konsep pembelajaran berbasis proyek dalam pendidikan dasar. Anda akan mempelajari bagaimana merancang dan mengimplementasikan proyek-proyek pembelajaran yang relevan dengan konteks siswa. Materi ini juga akan membahas manfaat pembelajaran berbasis proyek dalam mengembangkan keterampilan kritis, kreatif, dan kolaboratif.'),
  ('0b079d79-73c6-45d4-adae-9b6769e8e354', 'a0064714-cf3d-476f-8126-6ec530d292dc', 3, 'Pembelajaran Inklusif di Pendidikan Dasar', 'Materi ini akan membahas tentang pentingnya pendekatan pembelajaran inklusif dalam pendidikan dasar. Anda akan mempelajari strategi dan teknik untuk mendorong partisipasi dan keberhasilan semua siswa, termasuk siswa dengan kebutuhan khusus. Materi ini juga akan membahas tentang lingkungan belajar yang inklusif dan peran guru dalam mendukung keberagaman.'),
  ('887f7a10-fad0-43c7-9d77-63c57c484b9b', 'a0064714-cf3d-476f-8126-6ec530d292dc', 4, 'Pengembangan Kreativitas dalam Pendidikan Dasar', 'Materi ini akan membahas tentang pentingnya pengembangan kreativitas dalam pendidikan dasar. Anda akan mempelajari strategi untuk merangsang kreativitas siswa, mengembangkan keterampilan berpikir kreatif, dan mendorong ekspresi kreatif dalam pembelajaran. Materi ini juga akan membahas tentang peran seni, musik, dan drama dalam mengembangkan kreativitas siswa.'),
  ('cf76c83b-2ead-46be-94d6-9f56444e4a86', 'a0064714-cf3d-476f-8126-6ec530d292dc', 5, 'Kolaborasi dan Komunikasi Efektif dalam Pendidikan Dasar', 'Materi ini akan membahas pentingnya kolaborasi dan komunikasi efektif dalam pendidikan dasar. Anda akan mempelajari strategi untuk mengembangkan keterampilan kolaborasi dan komunikasi siswa, baik dalam kerja kelompok maupun dalam berinteraksi dengan guru dan anggota komunitas lainnya. Materi ini juga akan membahas tentang pentingnya pemahaman lintas budaya dalam komunikasi.')
;
-- example materi | subtema 6
INSERT INTO `materi` (`id`, `subtemaId`, `number`, `title`, `content`) VALUES
  ('862c89e0-8129-4388-a313-ca0dcc8e6b95', '19522abd-5fd2-454d-9f08-927e76e9a53d', 1, 'Pembelajaran Berbasis Penemuan di Pendidikan Dasar', 'Materi ini akan membahas tentang pendekatan pembelajaran berbasis penemuan dalam pendidikan dasar. Anda akan mempelajari bagaimana merancang situasi pembelajaran yang mendorong siswa untuk menemukan dan membangun pengetahuan mereka sendiri melalui eksplorasi dan investigasi. Materi ini juga akan membahas strategi untuk memfasilitasi proses penemuan siswa dan mengembangkan keterampilan berpikir kritis.'),
  ('e6af4222-9844-4821-a5a0-9a4b48075902', '19522abd-5fd2-454d-9f08-927e76e9a53d', 2, 'Penggunaan Media dan Teknologi dalam Pembelajaran di Pendidikan Dasar', 'Materi ini akan membahas tentang penggunaan media dan teknologi dalam pembelajaran di pendidikan dasar. Anda akan mempelajari berbagai jenis media dan teknologi yang dapat digunakan untuk meningkatkan efektivitas pembelajaran, termasuk penggunaan multimedia, perangkat lunak pembelajaran, dan platform pembelajaran online. Materi ini juga akan membahas strategi penggunaan media dan teknologi yang tepat dan relevan dengan konteks pendidikan dasar.'),
  ('09e8a771-b29f-4662-8d62-a768684c4a92', '19522abd-5fd2-454d-9f08-927e76e9a53d', 3, 'Pendidikan Karakter di Pendidikan Dasar', 'Materi ini akan membahas tentang pendidikan karakter dalam konteks pendidikan dasar. Anda akan mempelajari nilai-nilai moral dan etika yang perlu ditanamkan pada siswa, termasuk kejujuran, tanggung jawab, kerjasama, dan empati. Materi ini juga akan membahas strategi untuk mengintegrasikan pendidikan karakter ke dalam kurikulum dan kegiatan sehari-hari di sekolah.'),
  ('cffba9f1-765a-40de-bd8b-d858c264a9e1', '19522abd-5fd2-454d-9f08-927e76e9a53d', 4, 'Pembelajaran Sains dan Matematika yang Menyenangkan di Pendidikan Dasar', 'Materi ini akan membahas strategi untuk membuat pembelajaran sains dan matematika menjadi menyenangkan dan menarik bagi siswa di pendidikan dasar. Anda akan mempelajari pendekatan pembelajaran aktif, eksperimen, permainan, dan aplikasi teknologi yang dapat digunakan untuk meningkatkan minat dan pemahaman siswa terhadap sains dan matematika. Materi ini juga akan membahas penerapan pembelajaran berbasis konteks dalam sains dan matematika.'),
  ('c4877770-12b7-459f-a3b2-8df05014e83c', '19522abd-5fd2-454d-9f08-927e76e9a53d', 5, 'Peningkatan Literasi Membaca di Pendidikan Dasar', 'Materi ini akan membahas tentang pentingnya peningkatan literasi membaca pada siswa pendidikan dasar. Anda akan mempelajari strategi dan pendekatan pembelajaran yang dapat meningkatkan kemampuan membaca siswa, termasuk pengembangan keterampilan membaca, pemahaman bacaan, dan apresiasi terhadap literatur. Materi ini juga akan membahas pentingnya membangun budaya membaca di lingkungan sekolah dan masyarakat.')
;

-- soal subtema 1
-- example soal 1 | materi 1
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('66256092-5e95-4325-ae78-d315ebabd8d9','27d7159f-05e1-4ae2-8af2-deba0fd3bdbb','question1'),
  ('b67b0488-fc39-4591-a97c-ddbfe13a66a1','27d7159f-05e1-4ae2-8af2-deba0fd3bdbb','question2')
;

-- example soal 1 | materi 2
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000003', '73868718-9cd8-4c37-9b6f-c39c0d94b024', 'question1'),
  ('00000000-0000-0000-0000-000000000004', '73868718-9cd8-4c37-9b6f-c39c0d94b024', 'question2')
;

-- example soal 1 | materi 3
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000007', '546f7833-7848-4cea-8e76-87dc84f002ce', 'question1'),
  ('00000000-0000-0000-0000-000000000008', '546f7833-7848-4cea-8e76-87dc84f002ce', 'question2')
;

-- example soal 1 | materi 4
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000011', '272f1d06-7428-40a3-81f7-803df0d91017', 'question1'),
  ('00000000-0000-0000-0000-000000000012', '272f1d06-7428-40a3-81f7-803df0d91017', 'question2')
;

-- example soal 1 | materi 5
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000015', '22bf8f7e-b6d8-4ffd-a118-225a27bdbe3c', 'question1'),
  ('00000000-0000-0000-0000-000000000016', '22bf8f7e-b6d8-4ffd-a118-225a27bdbe3c', 'question2')
;

-- soal subtema 2
-- example soal 1 | materi 1
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000019', '4f846b2d-d9d9-4b19-80e1-c0c455e3d396', 'question1'),
  ('00000000-0000-0000-0000-000000000020', '4f846b2d-d9d9-4b19-80e1-c0c455e3d396', 'question2')
;

-- example soal 1 | materi 2
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000023', '2a8d302f-3874-4cf6-a4e3-e9f3720553ab', 'question1'),
  ('00000000-0000-0000-0000-000000000024', '2a8d302f-3874-4cf6-a4e3-e9f3720553ab', 'question2')
;

-- example soal 1 | materi 3
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000027', '954345d6-ef93-4040-a3db-0e1192699102', 'question1'),
  ('00000000-0000-0000-0000-000000000028', '954345d6-ef93-4040-a3db-0e1192699102', 'question2')
;

-- example soal 1 | materi 4
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000031', 'ee2989a4-60d8-4651-a78e-1e6feb3b1ba6', 'question1'),
  ('00000000-0000-0000-0000-000000000032', 'ee2989a4-60d8-4651-a78e-1e6feb3b1ba6', 'question2')
;

-- example soal 1 | materi 5
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000035', '031f95be-4706-43a0-bb4c-3e1d6a199663', 'question1'),
  ('00000000-0000-0000-0000-000000000036', '031f95be-4706-43a0-bb4c-3e1d6a199663', 'question2')
;

-- soal subtema 3
-- example soal 1 | materi 1
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000039', 'f65444c7-4b40-438d-96ac-f29f128054ee', 'question1'),
  ('00000000-0000-0000-0000-000000000040', 'f65444c7-4b40-438d-96ac-f29f128054ee', 'question2')
;

-- example soal 1 | materi 2
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000043', '287e743d-0dd9-40a7-b54f-2370c94094b4', 'question1'),
  ('00000000-0000-0000-0000-000000000044', '287e743d-0dd9-40a7-b54f-2370c94094b4', 'question2')
;

-- example soal 1 | materi 3
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000047', 'd8531677-6a77-4502-8f92-9eb45144afd6', 'question1'),
  ('00000000-0000-0000-0000-000000000048', 'd8531677-6a77-4502-8f92-9eb45144afd6', 'question2')
;

-- example soal 1 | materi 4
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000051', '518de72a-efb9-47ca-b27e-652dd1f80e1b', 'question1'),
  ('00000000-0000-0000-0000-000000000052', '518de72a-efb9-47ca-b27e-652dd1f80e1b', 'question2')
;

-- example soal 1 | materi 5
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000055', 'a2815142-ae7e-442e-bf70-81383ee6b3f6', 'question1'),
  ('00000000-0000-0000-0000-000000000056', 'a2815142-ae7e-442e-bf70-81383ee6b3f6', 'question2')
;

-- soal subtema 4
-- example soal 1 | materi 1
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000059', 'acb69f7a-b5a7-4d4a-acd1-935b9fe25169', 'question1'),
  ('00000000-0000-0000-0000-000000000060', 'acb69f7a-b5a7-4d4a-acd1-935b9fe25169', 'question2')
;

-- example soal 1 | materi 2
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000063', '34fb9a71-cf89-4f7f-b4d6-be8f2a8b36a4', 'question1'),
  ('00000000-0000-0000-0000-000000000064', '34fb9a71-cf89-4f7f-b4d6-be8f2a8b36a4', 'question2')
;

-- example soal 1 | materi 3
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000067', 'c043db59-0c95-463c-bb0b-7e0544dde86d', 'question1'),
  ('00000000-0000-0000-0000-000000000068', 'c043db59-0c95-463c-bb0b-7e0544dde86d', 'question2')
;

-- example soal 1 | materi 4
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000071', '6170336e-722e-42ad-b3b1-47ee2ab71b7f', 'question1'),
  ('00000000-0000-0000-0000-000000000072', '6170336e-722e-42ad-b3b1-47ee2ab71b7f', 'question2')
;

-- example soal 1 | materi 5
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000075', 'db336258-3312-4e54-b771-8340168aa26c', 'question1'),
  ('00000000-0000-0000-0000-000000000076', 'db336258-3312-4e54-b771-8340168aa26c', 'question2')
;

-- soal subtema 5
-- example soal 1 | materi 1
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-000000000099', 'materiId1', 'question1'),
  ('00000000-0000-0000-0000-0000000000100', 'materiId1', 'question2')
;

-- example soal 1 | materi 2
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-0000000000103', 'materiId2', 'question1'),
  ('00000000-0000-0000-0000-0000000000104', 'materiId2', 'question2')
;

-- example soal 1 | materi 3
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-0000000000107', 'materiId3', 'question1'),
  ('00000000-0000-0000-0000-0000000000108', 'materiId3', 'question2')
;

-- example soal 1 | materi 4
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-0000000000111', 'materiId4', 'question1'),
  ('00000000-0000-0000-0000-0000000000112', 'materiId4', 'question2')
;

-- example soal 1 | materi 5
INSERT INTO `soal` (`id`, `materiId`, `question`) VALUES
  ('00000000-0000-0000-0000-0000000000115', 'materiId5', 'question1'),
  ('00000000-0000-0000-0000-0000000000116', 'materiId5', 'question2')
;


