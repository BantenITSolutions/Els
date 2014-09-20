-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2011 at 06:11 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `els_redesign2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE IF NOT EXISTS `admin_list` (
  `id_admin` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `password` char(40) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `art_work`
--

CREATE TABLE IF NOT EXISTS `art_work` (
  `id_art_work` int(5) NOT NULL AUTO_INCREMENT,
  `id_member` int(5) NOT NULL,
  `foto_kecil_art` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `foto_besar_art` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `title` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `caption` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_art_work`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `art_work`
--

INSERT INTO `art_work` (`id_art_work`, `id_member`, `foto_kecil_art`, `foto_besar_art`, `title`, `caption`) VALUES
(1, 30, 'sml_4-power.jpg', '4-power.jpg', 'Teman Teman Seperjuangan On Besakih', 'Inilah jeneng`2 jeleme 3.MM.1, yang pacul-pacul nan culun. Semoga sukses selalu untuk semua teman-teman 3.MM.1.'),
(4, 30, 'sml_Koala.jpg', 'Koala.jpg', 'Koala The Symbol Of Linux Ubuntu 9.10', 'Tampang seekor koala, menjadi maskot ubuntu 9.10. Kebetulan gue juga make Ubuntu 9.10'),
(3, 19, 'sml_Tulips.jpg', 'Tulips.jpg', 'Bunga Di Tepi Jalan', 'Ini adalah contoh bunga yang lagi kesepian. dan menunggu seseorang untuk menjemputnya.');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(5) NOT NULL,
  `judul` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_berita` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=105 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `judul`, `judul_seo`, `isi_berita`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(76, 23, 'Laskar Pelangi Pecahkan Rekor', 'laskar-pelangi-pecahkan-rekor', 'Sukses film Laskar Pelangi dalam memecahkan rekor jumlah penonton memberi pembelajaran bahwa penonton film Indonesia bisa menerima inovasi. Mira Lesmana dari Miles Films yang memproduksi film ini mengatakan, sampai Rabu (12/11), pemutaran Laskar Pelangi di 100 layar bioskop di 25 kota menyedot lebih dari 4,4 juta penonton. Padahal, Kamis kemarin, jumlah kota yang memutar film itu bertambah dengan Padang, Tasikmalaya, dan Ambon. Sebelumnya, Ayat-ayat Cinta ditonton 3,7 juta penonton (Kompas, 26/10).<br><br>Jumlah penonton itu belum termasuk penonton layar tancap untuk menjangkau penonton di daerah yang belum memiliki gedung bioskop.<br><br>Menurut Mira, layar tancap di tiga lokasi di Belitung, tempat cerita berlokasi, menyedot penonton lebih dari 60.000 penonton dan di Bangka sekitar 80.000-an orang. Pemutaran layar tancap juga dilakukan di Rantau (Sumatera Utara) dan akan dilakukan di Natuna, Aceh (enam lokasi), Lombok, serta Papua di Timika, Sorong, dan Jayapura.<br><br>Kabar gembira lainnya, film ini menjadi salah satu film yang terpilih untuk menjadi bagian dari Berlin International Film Festival atau Berlinale 2009. Festival ini adalah sebuah peristiwa budaya terpenting di Jerman yang juga adalah salah satu festival film internasional paling bergengsi di dunia.<br><br>Film Laskar Pelangi diangkat dari novel berjudul sama karya Andrea Hirata. Film ini mengangkat realitas sosial masyarakat Belitung, tentang persahabatan, kegigihan dan harapan, dalam bingkai kemiskinan dan ketimpangan kelas sosial.<br><br>"Jumlah penonton dan panjangnya masa pemutaran film sejak 25 September memperlihatkan penonton butuh sesuatu yang baru, yang inovatif, walau yang ditampilkan realitas tidak gemerlap," papar Mira.<br><br>Selama ini, kebanyakan film Indonesia bertema drama cinta, horor, dan komedi, sementara Miles Films dalam empat film terakhirnya menggarap tema realisme sosial-politik.<br><br>Mira mengakui, inovasi itu tidak selalu berhasil secara komersial. Contohnya Gie, juga produksi Miles Films. Meskipun dari sisi kritik film dan kreativitas bagus, tetapi tidak sesukses Laskar Pelangi dalam pemasaran.<br><br>Produksi film ini menghabiskan biaya Rp 9 miliar dan 90 persen dikerjakan di dalam negeri. "Sound mixing dengan sistem Dolby dan transfer optis untuk suara belum bisa dikerjakan di dalam negeri," ujar Mira.<br><br>Miles Films dan para investor, antara lain Mizan Publishing, kini bersiap memproduksi lanjutan Laskar Pelangi. Sang Pemimpi adalah bagian novel tetralogi Andrea Hirata. (sumber: kompas.com)<br>', '2009-02-01', '14:31:58', '76laskarpelangi.jpg', 70, 'laskar-pelangi'),
(69, 22, 'Gelombang Solidaritas untuk Palestina', 'gelombang-solidaritas-untuk-palestina', 'Serangan Israel kepada Palestina yang terjadi mulai akhir Desember 2008 silam telah menewaskan hampir seribu nyawa manusia. Warga sipil yang kebanyakan perempuan dan anak-anak menjadi korban keganasan tentara Israel. Warga dunia pun marah. Saat ini, hampir setiap hari sejumlah unjuk rasa mengecam kebiadaban Israel terjadi di seluruh belahan dunia. Kejahatan Israel adalah kejahatan kemanusiaan dan sudah menjadi isu bersama umat manusia.<br><br>Kecaman tidak hanya datang dari umat Islam, tapi juga dari umat agama lain. Lihat saja sejumlah biksu yang tergabung dalam Perwakilan Umat Buddha Indonesia (Walubi), kemudian Persatuan Tionghoa Indonesia serta Dewan Pemuda Kristen Indonesia.<br><br>Mereka semua ikut berpatisipasi dalam aksi solidaritas untuk Palestina yang dilaksanakan di lapangan Monas, Jakarta Ahad (11/1/2009) lalu. Mereka mengutuk kebiadaban Israel. (sumber: sabili.co.id)<br>', '2009-01-31', '14:34:18', '11solidaritas.jpg', 10, 'gaza,israel,palestina'),
(78, 20, 'Cristiano Ronaldo Pemain Sepakbola Terbaik 2008', 'cristiano-ronaldo-pemain-sepakbola-terbaik-2008', 'Cristiano Ronaldo akhirnya terpilih sebagai Pemain Terbaik Dunia versi FIFA, mengalahkan Lionel Messi (Barcelona), dan Fernando Torres (Liverpool). Penetapan itu diumumkan di Zurich, Swiss, Senin atau Selasa (13/1) dini hari. Ronaldo menjadi pemain pertama dari Premier League yang menerima penghargaan itu. Sebelumnya, dia juga terpilih sebagai Pemain Terbaik Eropa (Ballon d''Or) dan baru saja dinobatkan sebagai Pemain Terbaik Dunia versi suporter.<br><br>Pemain Manchester United (MU) asal Portugal itu meraih 935 pemilih dari poling yang disebar ke seluruh dunia. Pemilihnya hanya dibatasi kapten tim dan pelatih. Hasil itu diumumkan oleh pemain legendaris Brasil, Pele.<br><br>Sementara itu, Lionel Messi berada di tempat kedua. Pemain Barcelona asal Argentina itu meraih 678 suara. Adapun striker Liverpool asal Spanyol, Fernando Torres, berada di tempat ketiga dengan 203 suara.<br><br>Musim lalu, Ronaldo memang tampil bagus. Dia mencetak 42 gol dan membawa Manchester United merebut gelar Premier League dan Liga Champions.<br><br>"Ini momen yang sangat indah buatku. Momen spesial dalam hidupku. Aku ingin mengatakan kepada ibu dan saudara perempuanku bahwa kembang api sudah saatnya disulut," kata Ronaldo seusai menerima penghargaan itu. (sumber: detiksport.com)<br>', '2009-02-02', '14:36:34', '92cristianoronaldo.jpg', 46, 'sepakbola'),
(71, 20, 'Ronaldo "CR7" Pecahkan Transfer Termahal', 'ronaldo-cr7-pecahkan-transfer-termahal', 'Cristiano Ronaldo segera menjadi pemain termahal dunia, menumbangkan rekor Zinedine Zidane. Agen Ronaldo menyebut bahwa kliennya terikat pra kontrak 91 juta poundsterling dengan Real Madrid. Dengan transfer senilai Rp 1,5 triliun itu, maka CR7 dipastikan akan menjadi pemain termahal dunia. Tapi, itu mungkin baru terealisasi musim depan alias musim panas nanti.<br><br>Sport melansir bahwa Pemain Terbaik Dunia 2008 itu terikat kontrak dengan Madrid untuk jangka panjang. Bahkan, juga disebutkan bahwa agen Ronaldo, Jorge Mendes, akan terkena klausul penalti (penalty clause) 20 juta euro (18 juta pounds) jika Ronaldo tak hadir di Santiago Bernabeu, musim depan.<br><br>Sebelumnya, pemain berusia 23 tahun ini dikabarkan juga terikat kontrak dengan mantan presiden Madrid, Florentino Perez. Ronaldo akan menjadi alat kampanye Perez dalam pemilihan presiden Madrid, pertengahan Juli 2009.<br><br>Rekor pemain termahal dunia kini masih dipegang Zinedine Zidane dengan 46 juta poundsterling pada 2001. Perez juga menjadi aktor di balik kedatangan maestro asal Prancis itu dari Juventus ke Madrid.<br><br>Demikian juga runner up pemain termahal dunia, Luis Figo. Perez membajaknya dari rival bebuyutan Barcelona pada 2000 dengan nilai 38,7 juta pounds. Saat itu, Figo juga jadi alat kampanye Perez. (sumber: vivanews.com)<br>', '2009-01-31', '14:41:25', '97cristiano-ronaldo.jpg', 32, 'sepakbola'),
(72, 21, 'Belajar Dari Krisis Amerika', 'belajar-dari-krisis-amerika', 'Ibarat karena nila setitik, rusak susu sebelanga. Dan di kolam susu inilah tampaknya warga dunia tengah menunggu kapan giliran nila itu datang yang akan benar-benar melumpuhkan sendi perekonomian di negaranya masing-masing, tak terkecuali kita di Indonesia.<br><br>Dan kini kita paham bahwa kondisi yang cukup serius kali ini memang awalnya bermula dari krisis nasional di AS, yang kemudian menyebar dengan cepat ke seluruh dunia. Namun jelas bahwa ia bukanlah penyebab utamanya seperti yang dituding oleh sejumlah media (lihat ''Runtuhnya Pusat Kapitalisme'', Editorial Harian Radar Bogor, 27/09/08).<br><br>Yang menjadi benang merah dari rentetan krisis ini justru adalah penerapan globalisasi dimana roda perekonomian banyak negara di dunia digantungkan. Sebab dalam sistem ekonomi global yang tengah dipraktikkan banyak negara saat ini, krisis yang dialami suatu negara akan menular bak virus ke negara-negara lain, khususnya bila krisis itu bermula dari negara-negara maju dan yang punya otoritas dalam peta perkonomian dunia.<br><br>Meski belum memiliki definisi yang mapan, istilah globalisasi banyak dihubungkan dengan peningkatan keterkaitan dan ketergantungan antarbangsa dan antarmanusia di seluruh dunia dunia melalui perdagangan, investasi, perjalanan, budaya populer, dan bentuk-bentuk interaksi yang lain sehingga batas-batas suatu negara menjadi bias (wikipedia.com).<br><br>Di alam globalisasi inilah, kesalingbergantungan antara negara satu dengan negara lain terjalin begitu kuat. Dengan begitu, sebuah negara yang telah maju diharapkan akan merangsang perekonomian negara-negara yang sedang berkembang lewat sistem pasar bebas yang saling terhubung dan kompetitif. Tak heran bila globalisasi dipercaya akan mampu membawa kemaslahatan pada segenap umat manusia di dunia.<br><br>Sebuah niat yang kedengarannya cukup mulia memang. Dan sejak diterapkan pada era 80-an, globalisasi menjadi sistem ekonomi (mencakup juga aspek sosial, budaya, dan komunikasi) yang populer di banyak negara. Tak terkecuali bagi negara kita tercinta yang kala itu berada di bawah rezim Orde Baru.<br><br>Tapi dengan adanya krisis global ini, untuk pertama kalinya kita disadarkan, betapa sistem globalisasi yang tengah dipraktikkan kebanyakan negara saat ini, ternyata juga berpotensi membawa umat manusia pada krisis berkepanjangan. Ditambah lagi betapa globalisasi ekonomi dunia kian hari kita lihat semu dan banal, yakni di mana triliunan dollar AS diperjualbelikan dan dipermainkan di pasar modal, tetapi hanya sebagian saja diantaranya yang benar-benar menyentuh sektor riil.<br><br>Dengan kondisi kesalingterhubungan dan kesalingbergantungan inilah globalisasi ekonomi menciptakan budaya ekonomi sebagai jaringan terbuka (open network) yang rawan terhadap kemacetan di suatu titik jaringan dan serangan virus ke seluruh jaringan. Serangan virus (semisal kemacetan likuiditas) di sebuah titik jaringan (seperti AS) dengan cepat menjalar ke seluruh jejaring global tanpa ada yang tersisa.<br><br>Maka di titik ini pulalah kita sadar betapa Indonesia sebagai salah satu peserta yang turut serta dalam sistem ekonomi global, cukup rentan terkena dampak krisis ini.<br><br>Sejatinya, krisis global ini memang lebih banyak berpengaruh pada industri keuangan, khususnya pasar modal. Ruang gerak pasar modal itu sendiri belum meluas bagi usaha dan bisnis yang dijalankan bagi kebanyakan masyarakat Indonesia.<br><br>Bisa disimak bahwa roda perekonomian di Kota Bogor sendiri lebih banyak digerakkan oleh sektor riil dan usaha kecil menengah (UKM). Kebanyakan dari mereka menjalankan usaha yang tak memiliki persinggungan langsung dengan investor, juga dikerjakan oleh SDM dari dalam negeri sendiri.<br><br>Karenanya, kita selaku warga Bogor patut menjadikan peristiwa krisis global saat ini sebagai momentum dalam mendukung segenap pelaku bisnis dan UKM kota Bogor. Sebab, sejarah negeri ini telah membuktikan bahwa para pelaku bisnis dan UKM-lah yang mampu bertahan ketika krisis menerpa Indonesia di tahun 1998.<br><br>Dan kepada merekalah kita bisa berharap krisis global kali ini takkan mampir ke Indonesia. (sumber: http://prys3107.blogspot.com/)<br>', '2009-01-31', '14:48:09', '44amerika.jpg', 12, 'amerika'),
(74, 19, 'Google Chrome Susupi Microsoft', 'google-chrome-susupi-microsoft', 'Browser Microsoft, Internet Explorer (IE), bisa mendominasi karena tersedia secara default pada banyak komputer di pasaran. Google Chrome akan menggoyang dengan menyusup di lahan yang sama. Google rupanya sudah bersiap-siap menawarkan Google Chrome secara default pada komputer-komputer baru. Pichai juga menjanjikan Chrome akan keluar dari versi Beta (uji coba) pada awal 2009. \r\n\r\nJika Google berhasil menyusupkan Chrome dalam lahan yang selama ini jadi ''mainan'' Microsoft, lanskap perang browser akan mengalami perubahan. Saat ini Microsoft masih mendominasi pada kisaran 70 persen lewat Internet Explorer-nya, sedangkan Firefox menguasai sekitar 20 persen. (sumber: <a target="_blank" title="" href="http://detikinet.com">detikinet.com</a>)<br><br>Browser Microsoft, Internet Explorer (IE), Browser Microsoft, Internet Explorer (IE), Browser Microsoft, Internet Explorer (IE), ', '2009-01-31', '13:34:25', '25chrome.jpg', 62, 'browser'),
(60, 19, 'Digerus Firefox, IE Makin Melempem', 'digerus-firefox-ie-makin-melempem', 'Browser Mozilla Firefox sepertinya makin berkibar. Berdasarkan data terbaru dari biro penelitian Net Applications, Firefox menapak naik dengan menguasai 20,78 persen pangsa pasar browser pada bulan November, naik dari angka 19,97 persen di bulan Oktober.<br><br>Dikutip detikINET dari Afterdawn, Selasa (2/1/2/2008), Firefox kemungkinan sukses menggaet user yang sebelumnya mengandalkan browser Internet Explorer (IE) besutan Microsoft. Pasalnya, masih menurut data Net Applications, pangsa pasar IE kini menurun di bawah 70 persen untuk kali pertama sejak tahun 1998. IE sekarang menguasai 69,8 persen pangsa pasar dari sebelumnya 71,3 persen di bulan Oktober.<br><br>Padahal di masa jayanya di tahun 2003, IE pernah begitu dominan dengan menguasai 95 persen pasaran browser. Penurunan pangsa pasar IE ini disinyalir juga terkait musim liburan di AS di mana banyak perusahaan libur. Padahal browser IE banyak dipakai oleh kalangan perusahaan.<br><br>Adapun produk browser lainnya menunjukkan tren peningkatan. Apple Safari kini punya pangsa 7,13 persen dan Google Chrome sebesar 0,83 persen dari yang sebelumnya 0,74 persen. Sementara pangsa pasar Opera mengalami penurunan dari yang sebelumnya 0,75 persen menjadi 0,71 persen saja. (sumber: <a target="_blank" title="http://detikinet.com" href="http://detikinet.com">detikinet.com</a>)<br>', '2009-01-31', '13:58:31', '47firefox.jpg', 25, 'browser'),
(61, 22, 'Sepatu Melayang Saat Bush Berpidato di Irak', 'sepatu-melayang-saat-bush-berpidato-di-irak', 'Apakah pemerintah AS sakit hati karena Presiden Bush ditimpuk sepatu? Sudah pasti. Tapi di Irak, sepatu melayang itu sebagai pamitan terindah untuk Bush. Muntazer Al Zaidi dieluk-elukkan di Irak. Tuntutan masyarakat agar dia dibebaskan juga semakin kencang. Mereka menilai tindakan Al Zaidi menimpuk Bush dengan sepatunya sebagai tindakan paling berani.<br><br>Sahabat Al Zaidi di stasiun TV Al Baghdadia, mengungkapkan betapa bencinya Al Zaidi pada Bush. Dia menganggap Bush sebagai tokoh yang memerintahkan perang di Irak.<br><br>"Melempari sepatu pada Bush merupakan ciuman pamitan terbaik hingga sejauh ini ... itu merupakan ungkapan bagaimana rakyat Irak dan bangsa Arab lainnya membenci Bush," tulis Musa Barhoumeh, editor koran independen Yordania, Al-Gahd, Selasa (16/12).<br><br>Di Washington, Al Zaidi dicap sebagai orang yang cuma mencari perhatian.<br><br>"Tak diketahui apa motivasi orang itu, ia tampaknya jelas hanya berusaha mendapatkan perhatian atas dirinya," kata Jurubicara Deplu AS, Roberet Wood, kepada para wartawan.<br><br>Pemerintah Irak mencap tindakan Zaidi sebagai ''memalukan'' dan menuntut permintaan maaf dari pemimpin redaksinya yang berkerdudukan di Kairo. Namun Bos Al Zaidi malah menuntut pembebasan reporternya itu. (sumber: <a target="_blank" title="http://inilah.com" href="http://inilah.com">inilah.com</a>)<br>', '2009-01-31', '14:04:27', '38bush.jpg', 48, 'amerika,george-bush'),
(62, 22, 'Monumen Menghormati Pelempar Sepatu Bush', 'monumen-menghormati-pelempar-sepatu-bush', 'Wartawan pelempar sepatu ke arah mantan Presiden Amerika Serikat George W Bush Desember lalu, benar-benar menjadi pahlawan. Sebuah kota di Irak bahkan membuatkan monumen sepatu untuk menghormatinya. Seperti diberitakan Reuters, Jumat (30/1/2009), monumen sepatu yang terletak di kota Tikrit Irak tersebut diresmikan Kamis kemarin. Sepatu sepanjang dua meter itu dilapis material berwarna perunggu.<br><br>"Muntazar: Puasa (bicara) hingga pedang menyayat kebisuan dengan darah. Sunyi hingga mulut kami menyuarakan kebenaran," demikian tertulis di monument itu. Saat melemparkan sepatunya ke Bush dalam sebuah konferensi pers di Baghdad, wartawan televisi Al Baghdadia itu mengucapkan bahwa Bush merupakan orang yang bertangung jawab atas kematian ribuan warga Irak. Zaidi juga menyebut Bush dengan kata "anjing".<br><br>Sejak insiden itu Zaidi medekam di penjara Baghdad. Dia menghadapi tuntutan penyerangan terhadap tamu negara dengan ancaman hukuman penjara hingga 15 tahun.<br><br>Pimpinan rumah yatim piatu dan organisasi kesejahteraan anak Tikrit Fatin Abdul Qader mengatakan monumen itu didesain oleh Laith Al Amiri dengan bobot keseluruhan sekira 1,2 ton. Tema monumen tersebut adalah "Patung Semangat dan Kedermawanan".<br><br>"Monumen ini merupakan ekspresi penghargaan dan apresiasi kami untuk Muntazhar Zaidi akrena hati orang-orang Irak akan tenang dengan leparan sepatunya," kata Fatin. (sumber: <a target="_blank" title="http://sabili.co..id" href="http://sabili.co..id">sabili.co.id</a>)<br>', '2009-01-31', '14:11:28', '91bushet.jpg', 19, 'amerika,george-bush'),
(75, 21, 'Krisis Ekonomi Amerika, Bukti Kegagalan Kapitalisme', 'krisis-ekonomi-amerika-bukti-kegagalan-kapitalisme', 'Presiden Ekuador, Rafael Correa menilai krisis yang terjadi di Amerika menjadi bukti kegagalan sistem kapitalis dan periode Kapitalisme telah berakhir serta ekonomi Amerika sebagai pasar terbesar dunia telah dililit krisis. (Kantor Berita Fars Prensa Latina Kuba).\r\n\r\nCorrea menambahkan, apa yang terjadi di Amerika tidak terbatas pada krisis keuangan, namun bukti kebuntuan sebuah sistem yang dibangun tanpa dicermati secara serius. Menurut Correa, solusi krisis sistem keuangan Amerika tidak akan bisa selesai dengan menyuntikkan dana 700 miliar dolar kepada bank-bank yang telah bangkrut, namun yang lebih penting lagi adalah Amerika harus melakukan perubahan fundamental. (sumber: hidayatullah.com)', '2009-01-31', '14:13:52', '54RafelKarera.jpg', 24, 'amerika'),
(79, 22, 'Ahmadinejad: Gaza Akan Jadi Kuburan Israel', 'ahmadinejad-gaza-akan-jadi-kuburan-israel', 'Iran dan Israel tampaknya tidak akan pernah melakukan genjatan senjata. Presiden Iran Mahmoud Ahmadinejad melontarkan kata-kata serangan terhadap Israel dengan menyebut negara Yahudi itu akan segera lenyap dari bumi. "<span style="font-weight: bold; font-style: italic;">Kejahatan yang dilakukan rejim Zionis (Israel) terjadi karena mereka sadar sudah sampai di akhir dan segera lenyap dari muka bumi</span>," kata Ahmadinejad dalam pawai anti-Israel yang berlangsung di Teheran, seperti dilaporkan kantor berita Mehr dan dikutip DPA, Sabtu (13/12).<br><br>Dia mengatakan Israel sudah kehilangan arah dan kian sadar bahwa kelompok negara-negara kuat makin ragu untuk menunjukkan dukungan untuk negara Yahudi itu.<br><br>Ahmadinejad juga mengatakan bahwa kejahatan Israel di Gaza bertujuan mengganti pemimpin politik di wilayah itu agar sesuai dengan kepentingan politik Israel. (sumber: <a target="_blank" title="Situs Berita Inilah.com" href="http://inilah.com">inilah.com</a>)<br>', '2009-02-02', '14:23:39', '22ahmadinejad.jpg', 96, 'gaza,israel,palestina'),
(65, 23, 'Michael Heart "Song for Gaza"', 'michael-heart-song-for-gaza', 'Banyak cara untuk men-support perjuangan rakyat Palestina di Gaza, salah satunya dengan lagu. Seorang penyanyi di Los Angeles Amerika Serikat - Michael Heart yang bernama asli Annas Allaf kelahiran Syiria, membuat sebuah lagu khusus yang dia tujukan untuk rakyat Gaza yang sampai saat ini masih jadi sasaran pembantaian oleh Zionis Israel.<br><br>Sejak dia merilis lagu yang berjudul "We will not go down" (Song for Gaza), lagu tersebut mendapat banyak respon, berupa komentar dukungan, sampai ia sendiri kewalahan menjawab dan membalas berbagai email yang masuk.<br><br>Michael Heart menggambarkan kondisi rakyat Gaza akan gempuran Zionis Israel dalam lagunya itu membuat kita merasa tersindir dan sedih akan nasib rakyat Gaza. Walaupun lagu itu baru di rilis, namun telah ratusan ribu orang melihatnya di youtube dan mendownload MP3 nya.<br><br>Awalnya dia berencana dengan menjual CD lagu MP3 nya itu dan hasil penjualannya akan dia donasikan untuk kepentingan amal kemanusiaan untuk penduduk Gaza, tapi karena dia merasa sulit kalau harus sendiri mendonasikan hasil penjualan CD MP3 nya, akhirnya dia memutuskan semua orang bisa mendownload gratis lagu tersebut. Dan dia berharap, setelah mendengarkan lagu itu, orang-orang akan tergerak hatinya untuk membantu rakyat Palestina di Gaza dengan mendonasikan uangnya ke lembaga-lembaga kemanusiaan yang ada atau organisasi yang didedikasikan untuk meringankan penderitaan rakyat Palestina.<br><br>Sebagai musisi Michael Heart sangat berterima kasih atas dukungan yang diberikan kepada dia atas lagu tersebut. Dan dia berharap setiap orang yang masih mempunyai hati nurani, mendukung perjuangan rakyat Palestina dan membantu mereka walau hanya dengan berupa doa.<br><br><br><span style="font-weight: bold;">WE WILL NOT GO DOWN (Song for Gaza)</span><br style="font-weight: bold;"><br style="font-style: italic;"><span style="font-style: italic;">A blinding flash of white light</span><br style="font-style: italic;"><span style="font-style: italic;">Lit up the sky over Gaza tonight</span><br style="font-style: italic;"><span style="font-style: italic;">People running for cover</span><br style="font-style: italic;"><span style="font-style: italic;">Not knowing whether they''re dead or alive</span><br style="font-style: italic;"><br style="font-style: italic;"><span style="font-style: italic;">They came with their tanks and their planes</span><br style="font-style: italic;"><span style="font-style: italic;">With ravaging fiery flames</span><br style="font-style: italic;"><span style="font-style: italic;">And nothing remains</span><br style="font-style: italic;"><span style="font-style: italic;">Just a voice rising up in the smoky haze</span><br style="font-style: italic;"><br style="font-style: italic;"><span style="font-style: italic;">We will not go down</span><br style="font-style: italic;"><span style="font-style: italic;">In the night, without a fight</span><br style="font-style: italic;"><span style="font-style: italic;">You can burn up our mosques and our homes and our schools</span><br style="font-style: italic;"><span style="font-style: italic;">But our spirit will never die</span><br style="font-style: italic;"><span style="font-style: italic;">We will not go down</span><br style="font-style: italic;"><span style="font-style: italic;">In Gaza tonight</span><br style="font-style: italic;"><br style="font-style: italic;"><span style="font-style: italic;">Women and children alike</span><br style="font-style: italic;"><span style="font-style: italic;">Murdered and massacred night after night</span><br style="font-style: italic;"><span style="font-style: italic;">While the so-called leaders of countries afar</span><br style="font-style: italic;"><span style="font-style: italic;">Debated on who''s wrong or right</span><br style="font-style: italic;"><br style="font-style: italic;"><span style="font-style: italic;">But their powerless words were in vain</span><br style="font-style: italic;"><span style="font-style: italic;">And the bombs fell down like acid rain</span><br style="font-style: italic;"><span style="font-style: italic;">But through the tears and the blood and the pain</span><br style="font-style: italic;"><span style="font-style: italic;">You can still hear that voice through the smoky haze</span><br style="font-style: italic;"><br style="font-style: italic;"><span style="font-style: italic;">We will not go down</span><br style="font-style: italic;"><span style="font-style: italic;">In the night, without a fight</span><br style="font-style: italic;"><span style="font-style: italic;">You can burn up our mosques and our homes and our schools</span><br style="font-style: italic;"><span style="font-style: italic;">But our spirit will never die</span><br style="font-style: italic;"><span style="font-style: italic;">We will not go down</span><br style="font-style: italic;"><span style="font-style: italic;">In Gaza tonight </span><br><br>(sumber: detik.com)<br>', '2009-01-31', '14:26:40', '24michaelheart.jpg', 34, 'gaza,israel,palestina'),
(66, 22, 'Demo Kecam Israel Warnai Ibukota', 'demo-kecam-israel-warnai-ibukota', 'Aksi unjuk rasa menentang agresi militer Israel ke Jalur Gaza, Palestina kembali mewarnai Jakarta. Unjuk rasa kali ini dilakukan oleh Ormas Islam Hizbut Thahrir di kawasan Silang Monas, Jakarta. Sejak Minggu (4/1) pagi, para pengunjuk rasa nampak berbondong-bondong membawa karton besar bertuliskan ''Save Palestine'' dan foto anak-anak serta perempuan Palestina yang menjadi korban tak berdosa dari serangan biadab militer Israel.<br><br>Kepada warga Jakarta yang berolahraga di sekitar kawasan Monas, para pengunjuk rasa juga mengedarkan kotak sumbangan untuk didonasikan kepada korban warga Palestina.<br><br>Aksi unjuk rasa dan banyaknya warga Jakarta yang rutin berolahraga di kawasan Silang Monas setiap Minggu pagi, membuat kawasan itu cukup padat untuk dilalui kendaraan bermotor.<br><br>Serangan udara Israel yang dimulai pada 27 Desember 2008 sudah terjadi selama sepekan di Jalur Gaza dan menewaskan lebih 420 orang.<br><br>Meski mendapat kutukan keras dari dunia Internasional, termasuk Indonesia, Israel sampai saat ini belum menunjukkan tanda-tanda akan menghentikan aksi militernya. (sumber: inilah.com)<br>', '2009-01-31', '14:29:16', '32demo.jpg', 36, 'gaza,israel,palestina'),
(67, 20, 'Ana Ivanovic Dinobatkan Sebagai Ratu Tenis 2008', 'ana-ivanovic-dinobatkan-sebagai-ratu-tenis-2008', 'Ana Ivanovic, dara kelahiran Belgrade pada tanggal 6 November 1987 sudah mulai bermain tenis sejak umur 5 tahun sesudah menonton Monica Seles di TV, mengingat nomor telpon sekolah tenis lokal dan memohon kepada orang tuanya untuk mengajak pergi ke sekolah itu. Kemudian di acara ulang tahunnnya yang ke-5, orang tuanya memberi hadiah berupa raket tenis dan sejak itu dia mulai jatuh cinta dengan dunia tenis. Kemudian Ana mulai berlatih tenis secara intens dengan Scott Byrnes pada bulan juli 2006.<br><br>Dragana, ibunya adalah seorang pengacara, sedangkan Miroslav bapaknya adalah seorang pebisnis, Milos kakaknya adalah seorang pemain basket dan seluruh keluarganya menyukai olahraga, tetapi tidak ada yang menyukai tenis seperti ana.<br><br>Senjata utamanya di tenis adalah pukulan forehand-nya, dan dia bisa main di segala jenis lapangan. Hobinya adalah menonton film di bioskop atau menonton DVD di rumah. Ana juga suka membaca, khususnya tentang Mitologi dan Sejarah Yunani. Ana juga senang sekali mendengarkan musik.<br><br>Pada tahun 2008 ini, setelah menjuarai Roland Garros prancis dengan mengalahkan Dinara safina dari rusia di final, maka saat ini peringkat Ana Ivanovic naik menjadi peringkat 1 dunia untuk petenis putri.<br>', '2009-01-31', '14:30:48', '20anaivanovic.jpg', 13, 'tenis'),
(73, 20, 'Maria Kirilenko, Petenis Terseksi Versi WTA', 'maria-kirilenko-petenis-terseksi-versi-wta', 'Pesona kecantikan Maria Sharapova dan Ana Ivanovic sepertinya sudah mendapat saingan baru. Tidak jauh-jauh, nama Maria Kirilenko tiba-tiba menyeruak di daftar petenis terseksi pilihan responden WTA. Artinya, Maria sukses merengkuh gelar yang musim lalu diraih Maria Sharapova.<br><br>Setengah dari 7 ribu responden yang masuk ke WTA menyebut, kalau Maria adalah sosok petenis ideal dan paling proporsional di level bentuk tubuh. Meski hanya berperingkat 18 dunia, namun pesonanya di atas lapangan tenis menjadi daya tarik tersendiri.<br><br>"Tubuhnya sangat indah, siluetnya membuat setiap pria pasti penasaran ingin melihat lebih dekat. Yang jelas, ia memiliki kepribadian baik yang makin menyempurnakan pesona fisiknya," tulis seorang responden. Di kalangan petenis putri sendiri, sudah lama Maria menjadi saingan berat Masha dan Ana ivanovic.<br><br>Di situs pribadinya, petenis bernama asli Maria Yuryevna Kirilenko ini mengaku selalu menjaga proporsi tubuh dengan senam dan renang, selain tentu berlatih fisik tenis. "Olahraga adalah cermin hidupku, jika tak olahraga sehari saja, kadang membuat tubuhku terasa lemas dan tak bergairah," ujar Maria.&nbsp; (persda network/bud)<br><br>Meksi bersaing di lapangan dan dunia mode, namun ternyata sosok Maria Kirilenko adalah sobat sejati Maria Sharapova. Bukan hanya karena sama-sama berasal dari Rusia, namun gaya hidup mereka berdualah yang membuat Maria-Masha banyak memiliki kecocokan.<br>Selain suka fotografi, mereka berdua juga memiliki hobi berbelanja, terutama fashion dan perhiasan. Bukan untuk pamer memang, tapi mereka melakukan itu untuk tabungan dan investasi.<br><br>Di beberapa turnamen, Masha dan Maria memang tampak bersama tatkala berada di luar lapangan. Mereka biasanya menyingkir dari rombongan pemain lain, dan memilih berburu barang kesukaan mereka dengan menyisir bagian kota tempat mereka tengah bertanding. "Aku dan Masha seperti kakak beradik, bagiku dia lebih dari sekedar sahabat, dia begitu dewasa, apalagi saat kami berdua saling curhat," sebut Maria, di tennisnews. <br><br>Daftar petenis terseksi WTA:<br><ol><li>Maria Kirilenko (Russia)</li><li>Maria Sharapova (Russia)</li><li>Ana Ivanovic (Serbian)</li><li>Caroline Wozniacki (Danish)</li><li>Nicole Vaidisova (Czech)</li><li>Sania Mirza (Indian)</li><li>Ashley Harkleroad (American)</li><li>Gisela Dulko (Argentinian)</li><li>Samantha Stosur (Australian)<br></li></ol>', '2009-01-31', '15:01:49', '14mariakirilenko.jpg', 39, 'tenis'),
(77, 20, 'Sharapova, Petenis Wanita Berpenghasilan Tertinggi', 'sharapova-petenis-wanita-berpenghasilan-tertinggi', 'Petenis asal Rusia, Maria Sharapova dengan penghasilan 26 juta dolar AS merupakan petenis wanita berpenghasilan tertinggi. Ia pernah menempati peringkat satu dunia, pasca mundurnya Justine Henin. Ia juga memiliki prestasi dengan menjuarai turnamen grand slam Australia Terbuka dan AS Terbuka. Namun, sebagian besar penghasilannya didapat dari kontrak iklannya bersama Pepsi, Colgate-Palmolive, Nike dan Motorola.<br><br>Berikutnya disusul Williams bersaudara dari Amerika, yaitu Serena Williams dengan penghasilan 14 juta dolar AS. Ia meraih tiga gelar juara tiap tahunnya semenjak tahun 2005. Ia juga merupakan model dari produk Hawlett-Packard, Nike, dan Kraft. Sedangkan kakak kandungnya, yaitu Venus Williams berpenghasilan 13 juta dolar AS. Ia mengalahkan adiknya di final Wimbledon tahun 2008. Ia memiliki dan menjalankan sendiri usaha fashion Eleven.<br><br>Di peringkat ke empat dan kelima adalah petenis Belgia yaitu Justine Henin dengan penghasilan 12,5 juta dolar AS. Dan petenis asal Serbia, yaitu Ana Ivanovic dengan penghasilan 6,5 juta dolar AS.<br>', '2009-02-01', '19:58:16', '89sharapova.jpg', 16, 'tenis'),
(68, 20, 'Roger Federer, Petenis Legenda Abad Ini', 'roger-federer-petenis-legenda-abad-ini', 'Siapa yang tak kenal dengan Roger Federer saat ini? Masih muda, ganteng, namun sudah jadi legenda. Bayangkan, dalam usia belum menginjak 26 tahun, ia sudah memecahkan rekor bertahan sebagai peringkat pertama dunia tenis selama 161 pekan berturut-turut. Ia memecahkan rekor Jimmy Connor yang sudah bertahan puluhan tahun. <br><br>Itu baru satu rekor. Sebelumnya, ia juga mendapat penghargaan Bagel Award, yakni penghargaan sebagai petenis paling banyak memenangkan set tenis dengan angka sempurna 6-0. "Saya hanya berusaha melakukan yang terbaik dan tidak berhenti memperbaiki kesalahan-kesalahan saya,"sebut Federer merendah tentang prestasinya itu.<br><br>Dengan kerendahhatian dan semangat untuk terus memperbaiki diri, pria keturunan campuran Swiss, German, dan Afrika Selatan ini sepertinya akan terus mengukir prestasi. Sebab, mengingat usia yang masih muda dan jarak nilai ATP dengan peringkat kedua dunia Rafael Nadal, cukup jauh, ia akan bisa terus bertahan di rangking satu dunia. Apalagi jika ia nantinya bisa memenangkan satu-satunya gelar tenis Grand Slam yang belum diraih, Perancis Terbuka. Ia akan jadi satu-satunya petenis pria yang bisa mengawinkan semua gelar tenis Grand Slam.<br><br>Roger Federer memang sepertinya terlahir untuk jadi legenda. Bahkan, menurut pengakuannya, sejak kecil ia sudah disebut banyak orang punya bakat gemilang di bidang olahraga. Tapi, menurut dirinya, bukan bakat yang membuatnya seperti sekarang. Kerja keras, ketekunan berlatih, dan keuletan di lapangan lah yang membuat dia bisa jadi juara sejati. "Saya terus berlatih untuk meningkatkan teknik permainan saya dan menambah kekuatan saya. Proses ini saya jalani sampai hari ini dan bahkan makin saya tingkatkan sejak saya jadi juara. Ini saya lakukan karena saya yakin masih banyak perbaikan yang harus terus dilakukan."<br><br>Dengan tekad untuk terus melakukan perbaikan itu, Roger Federer terus meretas jalan untuk mengukir rekor-rekor lainnya. Namun, semua rekor dan kemenangan yang diperolehnya, ternyata bukan hanya untuk kebanggaan dirinya. Melalui sebuah yayasan yang diberi nama seperti dirinya, Roger Federer Foundation, ia membantu anak-anak kurang beruntung di dunia terutama di Afrika Selatan. Sebagian hadiah yang diperoleh dari kemenangannya di kejuaraan tenis, digunakan untuk membantu anak-anak itu. Ia juga berperan banyak saat terjadi tsunami akhir tahun 2005. Saat itu, ia terpilih menjadi duta UNICEF, untuk membantu anak-anak yang jadi korban tsunami di Tamil Nadu, India. Ia juga berjanji untuk mengukir lebih banyak kemenangan guna mengumpulkan lebih banyak dana untuk yayasannya. Ia juga merelakan beberapa raketnya untuk dilelang guna disumbangkan melalui UNICEF. Roger Federer telah membuktikan, dengan kerja keras, semangat pantang menyerah, tekad kuat, dan kepedulian terhadap sesama, telah menjadikannya sebagai juara sejati.<br><br>Dari kisah sukses Roger Federer ini, kita dapat mengambil pelajaran bahwa dengan kerja keras disertai semangat pantang menyerahlah kita bisa mewujudkan cita-cita. Selain itu, kepedulian kepada sesama juga selayaknya dapat mendorong semangat kita untuk terus mengukir prestasi. (sumber: andriewongso.com)<br>', '2009-01-31', '18:59:14', '33federer.jpg', 18, 'tenis'),
(70, 19, 'Kisah Sukses Google', 'kisah-sukses-google', 'Dalam daftar orang terkaya di Amerika baru-baru ini, terselip dua nama yang cukup fenomenal. Masih muda, usianya baru di awal 30-an, namun kekayaannya mencapai miliaran dolar. Nama kedua orang itu adalah Larry Page dan Sergey Brin. Mereka adalah pendiri Google, situs pencari data di internet paling terkenal saat ini.<br><br>Terlepas dari jumlah kekayaan mereka, ada beberapa hal yang perlu dicontoh dari kisah sukses mereka. Satu hal yang pertama, yang disebut Sergey Brin, yang kini menjabat sebagai Presiden Teknologi Google, yakni tentang kekuatan kesederhanaan. Menurutnya, simplicity web adalah hal yang disukai penjelajah internet. Dan, Google berhasil karena menggunakan filosofi tersebut, menghadirkan web yang bukan saja mudah untuk mencari informasi, namun juga menyenangkan orang.<br><br>Kunci sukses kedua adalah integritas mereka dalam mewujudkan impiannya. Mereka rela drop out dari program doktor mereka di Stanford University untuk mengembangkan google. Mereka pun pada awalnya tidak mencari keuntungan dari proyek tersebut. Malah, kedua orang itu berangkat dari sebuah ide sederhana. Yakni, bagaimana membantu banyak orang untuk mempermudah mencari sumber informasi dan data di dunia maya. Mereka sangat yakin, ide mereka akan sangat berguna bagi banyak orang untuk mempermudah mencari data apa saja di internet.<br><br>Kunci sukses lainnya yaitu mereka tidak melupakan jasa orang-orang yang mendukung kesuksesan mereka. Larry dan Sergey sangat memerhatikan kesejahteraan SDM di Google. Kantornya yang diberi nama Googleplex dinobatkan sebagai tempat bekerja terbaik di Amerika tahun 2007 oleh majalah Fortune. Di sana suasananya sangat kekeluargaan, ada makanan gratis tiga kali sehari, ada tempat perawatan bagi bayi ibu muda, bahkan sampai kursi pijat elektronik pun tersedia. Mereka sadar, di balik sukses inovasi yang dilakukan Google, ada banyak doktor matematika dan lulusan terbaik dari berbagai universitas yang membantu mereka.<br><br>Larry dan Sergey memang tak pernah menduga Google akan sesukses sekarang. Kedua orang yang terlahir dari keluarga ilmuwan – ayah Sergey adalah doktor matematika, sedangkan Larry adalah putra almarhum doktor pertama komputer di Amerika – ini memang hanya berangkat dari sebuah masalah sederhana. Mereka berusaha memecahkan masalah tersebut, dan berbagi dengan orang lain. Namun, justru dengan kesederhanaan dan integritas mereka, mampu membuat Google saat ini menjadi mesin pencari terdepan, dikunjungi lebih dari 300 juta orang perhari. Diterjemahkan dalam 88 bahasa dengan nilai saham mencapai lebih dari 500 dolar AS per lembar, membuat sebuah kesederhanaan menjelma menjadi kekuatan yang luar biasa.<br><br>Sebuah niat mulia, meski sesederhana apapun, jika dilandasi kerja keras dan integritas yang tinggi, akan menghasilkan sesuatu yang istimewa. Hal tersebut nampak dari contoh kisah sukses Larry Page dan Sergey Brin di atas. Google yang mereka dirikan terbukti telah membantu banyak orang untuk bisa mendapatkan apa saja dari internet. Dan kini, mereka pun mendapatkan imbalan yang bahkan tak diduga mereka sebelumnya. Kesuksesan sejati memang akan terasa saat kita bisa berbagi. Dan, Larry serta Sergey membuktikannya sendiri. (sumber: andriewongso.com)<br>', '2009-01-25', '20:26:26', '73google.jpg', 22, 'google'),
(64, 19, 'Browser Safari Diklaim Paling Handal di Windows', 'browser-safari-diklaim-paling-handal-di-windows', 'Dibandingkan browser Internet lainnya, Apple mengklaim browser web Safari buatannya adalah yang paling handal digunakan jika digunkan di atas sistem operasi Windows. Hal tersebut disampaikan CEO Apple Steve Jobs saat mengumumkan versi terbaru Safari yang dapat berjalan di Windows.<br><br>"Kami kira para pengguna Windows akan benar-benar terkejut saat melihat begitu cepat dan menariknya berselancar di Internet menggunakan Safari," ujar Steve Jobs di acara Worldwide Developer Conference Apple di San Fransisco, AS, Senin (11/6). Ia mengklaim browser Safari dapat membuka sebuah halaman web dua kali lebih cepat dibandingkan Internet Explorer 7 di Windows dan masih lebih cepat dibandingkan Opera maupun Firefox.<br><br>Kehadiran Safari untuk para pengguna Windows akan semakin menyemarakkan persaingan browser web. Steve Jobs berharap peluncuran ini akan meningkatkan popularitas Safari yang baru mencapai 4,9 persen pangsa pasar browser web. Persaingan browser web saat ini masih didominasi IE dengan pangsa pasar 78 persen menyusul Firefox. Versi tes Safari 3 untuk Windows XP, Vista, dan Apple Macs OSX sudah dapat di-download dari situs Apple sejak Senin (11/6). (sumber: bbc.co.uk)<br>', '2009-01-25', '20:35:26', '18safari.jpg', 26, 'browser'),
(58, 23, 'Pelajaran Moral dari Film Laskar Pelangi', 'pelajaran-moral-dari-film-laskar-pelangi', '"Kalau Nak Pintar, Belajar! Kalau Nak Berhasil, Usaha!" Itulah mantra yang diberikan Tuk Bayan Tula kepada anak-anak laskar pelangi saat mau menghadapi ujian. Berikut beberapa fakta mengapa saya sangat menyukai film Laskar Pelangi (Petik hikmahnya ya):<br><br>1. Pelajaran itu bisa didapatkan dimana saja<br><br>Para Laskar Pelangi menimba ilmu di sekolah reot yang sangat tidak layak, kegigihan untuk menimba ilmu dan mengubah sejarah hidup membuat mereka mampu bangkit dan membuktikan bahwa mereka bisa menjadi yang terbaik. Sebagai blogger, belajarlah dari siapapun, baik master ataupun newbie, anda tidak akan rugi. Saya selalu senang belajar dari semua orang :)<br><br>2. Keinginan untuk memberi.<br><br>Keinginan untuk memberi akan membuat kita kuat dan bahagia. Berbagi itu Indah (seperti paman gober yang berbagi PR dengan saya). Semangat untuk memberikan yang terbaik akan membuat kita berusaha sekuat mungkin. Dari apa yang kita berikan pada orang lain, kitapun akan memetik hasilnya. Jangan takut kehilangan karena berbagi.<br><br>3. Semangat komunitas, lihat bagaimana mereka membangun tim.<br>Team building, walaupun saya seorang blogger, di BlogicThink saya bekerja bersama. Ada perbedaan sikap dalam menghadapi suatu masalah, dan tim yang baik akan menemukan jalan keluarnya. Saksikan bagaimana Laskar Pelangi memenangkan karnaval dan cerdas cermat. Terima kasih kepada Mas Ary yang mau berbagi dengan saya.<br><br>4. Kalau Nak Pintar, Belajar! Kalau Nak Berhasil, Usaha!<br>Saya suka bagian ini. Laskar pelangi mendatangi dukun untuk lulus dalam ujian. Sang Dukun yang bertempat di pilau terpencil mengngatkan untuk membaca mantra itu dipagi hari. Para Laskar pelangipun menurutinya. Dibawalah selembar mantra tersebut, dibaca didepan sekolah bersama keras-keras : Kalau Nak Pintar, Belajar! Kalau Nak Berhasil, Usaha!<br><br>Yups, suatu pelajaran bagi kita untuk tidak pendek akal ketika ingin menjadi blogger sukses. Saya memilih mewawancara Mas Jimmy, ketimbang membeli resep kebut semalam. Terima kasih untuk Mas Jimmy atas PRnya.<br><br>5. Gunakan waktu, mumpung masih muda<br><br>Ketika saya menonton Laskar Pelangi, saya ingat umur. Saya mengagumi mereka yang memiliki tekad belajar yang kuat, cerita tentang anak-anak kelas 5 SD ini memang mengagumkan. Saya jadi teringat Kawan Blogger saya Ruzdee yang mengenal internet saat kelas 5 SD, suatu kesempatan yang hebat. Semoga sukses kawan :)<br><br>6. Buku kucel mereka, adalah awal dari masa depan.<br><br>9 Laskar pelangi berkumpul dikelas saat sekolah mau dibuka, masih kurang 1 anak. Dalam suasana menunggu Ditampilkan buku kucel yang membuat haru penonton, efek dramatis berhasil dimunculkan. Melihat buku itu saya teringat buku catatan saya, saya memiliki buku catatan yang selalu habis dalam waktu kurang dari satu bulan, isinya adalah ide-ide bisnis.<br><br>Saya jadi ingat spydeey yang menjadikan blognya sebagai oret-oretan catatan belajar komputer dan internet, thanks atas PRnya Bro :)<br><br>7. Lintang, sang jenius yang tak berhenti bermimpi<br><br>Melihat lintang membuat saya melakukan refleksi. Saya tau rasanya putus sekolah. Dan saya tahu rasanya kehilangan kesempatan kuliah karena masalah biaya. Bagi saya itu bukan hambatan. Saya tahu saya akan berhasi. walau kadang dunia tak adil, sekarang saya coba menjawabn setiap permasalahan, dan saya bahagia.<br><br>8. Sekolah kecil itu mengalahkan sekolah dengan modal besar<br><br>Karena sekolah memang bukan soal modal. Pendidikan sejatinya bukan masalah hitung-hitungan material. Ini masalah nilai-nilai. SD Para Laskar Pelangi mengalahkan SD berfasilitas lengkap, karena mereka memiliki cita-cita, semangat, harapan dan kebijaksanaan seorang pendidik.<br><br>Saya adalah seorang trainer di organisasi saya dulu ketika mahasiswa. Anehnya, saya tidak suka sekolah, saya menganggapnya mengungkung pemikiran saya. Ada terlalu banyak pemikiran kaku dan tertinggal disana yang saya tidak sukai.<br><br>9. Ajari saya bermimpi<br><br>Seandainya kondisi membuat saya mundur, maka saya telah tertinggal sejak lama. Banting setir ke dunia bisnis adalah pilihan dari kesulitan ekonomi dan ketidakmampuan untuk melanjutkan kuliah. Awalnya saya down, namun saya tidak mau berlama-lama. Saya coba berusaha bangkit. Hari ini, saya dapat bangga akan ilmu manajemen pemasaran yang saya miliki. Bahkan ketika bertemu dengan kawan-kawan saya dibangku kuliah dulu. Beruntung, walaupun tidak bekerja seperti mereka, saya bangga menjadi seorang blogger dan bukan buruh orang lain. Btw, Om jadul ngasih PR ( Blognya kok suspend Om?)<br><br>10. Seperti Ikal saya berniat sekolah di Perancis<br><br>Jika Ikal pergi ke sorbonne dan berkeliling dunia saya berniat untuk belajar di Universitas Frankfurt, mungkinkah? kita tunggu saja nanti. (sumber: blogicthink.com)<br>', '2009-01-25', '21:10:44', '46laskar.jpg', 15, 'laskar-pelangi');
INSERT INTO `berita` (`id_berita`, `id_kategori`, `judul`, `judul_seo`, `isi_berita`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(86, 19, 'Apa bedanya Intel Core Duo dan Core 2 Duo ?', 'apa-bedanya-Intel-Core-Duo-dan-Core-2-Duo', 'Intel benar-benar aneh juga dalam pemberian nama produknya. Perbedaannya cuma terletak pada penggunaan angka “2? di tengah-tengah produk tersebut. Kedua produk tersebut sebenarnya berbeda, meskipun memiliki kemiripan penamaan. Setelah googling sana-sini, ternyata saya mendapatkan referensi mengenainya.\r\nCore Duo (sering dikenal juga dengan istilah dual core) merupakan generasi ke-8 dari jajaran processor dari Intel yang sudah memakai microprocessor dengan arsitektur x86. Arsitektur tersebut oleh Intel dinamakan dengan Intel Core Microarchitecture, di mana arsitektur tersebut menggantikan arsitektur lama dari Intel yang disebut dengan NetBurst sejak tahun 2000 yang lalu. Penggunaan Core 2 ini juga menandai era processor Intel yang baru, di mana brand Intel Pentium yang sudah digunakan sejak tahun 1993 diganti menjadi Intel Core.\r\n\r\nPada desain kali ini Core 2 sangat berbeda dengan NetBurst. Pada NetBurst yang diaplikasikan dalam Pentium 4 dan Pentium D, Intel lebih mengedepankan clock speed yang sangat tinggi. Sedangkan pada arsitektur Core 2 yang baru tersebut, Intel lebih menekankan peningkatan dari fitur-fitur dari CPU tersebut, seperti cache size dan jumlah dari core yang ada dalam processor Core 2. Pihak Intel mengklaim, konsumsi daya dari arsitektur yang baru tersebut hanya memerlukan sangat sedikit daya jika dibandingkan dengan jajaran processor Pentium sebelumnya.\r\n\r\nProcessor Intel Core 2 mempunyai fitur antara lain EM64T, Virtualization Technology, Execute Disable Bit, dan SSE4. Sedangkan, teknologi terbaru yang diusung adalah LaGrande Technology, Enhanced SpeedStep Technology, dan Intel Active Management Technology (iAMT2).\r\n\r\nCore Processor Intel Core 2 Saat kali pertama diluncurkan pada Juli 2006 yang lalu, ada beberapa jenis core processor yang sekaligus dilemparkan ke pasaran oleh pihak Intel. Seperti kebiasaan dari Intel, pembedaan dari beberapa processor didasarkan pada pemberian codenamed pada tiap core processor tersebut.\r\n\r\nBerikut adalah beberapa codenamed dari core processor yang terdapat pada produk processor Intel Core 2, tentunya codenamed tersebut mempunyai perbedaan antara satu dengan yang lainnya.\r\n\r\nCONROE\r\nCore processor dari Intel Core 2 Duo yang pertama diberi kode nama Conroe. Processor ini dibangun dengan menggunakan teknologi 65 nm dan ditujukan untuk penggunaan desktop menggantikan jajaran Pentium 4 dan Pentium D. Bahkan pihak Intel mengklaim bahwa Conroe mempunyai performa 40% lebih baik dibandingkan dengan Pentium D yang tentunya sudah menggunakan dual core juga. Core 2 Duo hanya membutuhkan daya yang lebih kecil 40% dibandingkan dengan Pentium D untuk menghasilkan performa yang sudah disebutkan di atas.\r\n\r\nProcessor yang sudah menggunakan core Conroe diberi label dengan “E6×00”. Beberapa jenis Conroe yang sudah beredar di pasaran adalah tipe E6300 dengan clock speed sebesar1.86 GHz, tipe E6400 dengan clock speed sebesar 2.13 GHz, tipe E6600 dengan clock speed sebesar 2.4 GHz, dan tipe E6700 dengan clock speed sebesar 2.67 GHz. Untuk processor dengan tipe E6300 dan E6400 mempunyai Shared L2 Cache sebesar 2 MB, sedangkan tipe yang lainnya mempunyai L2 cache sebesar 4 MB. Jajaran dari processor ini memiliki FSB (Front Side BUS) sebesar 1066 MT/s (Megatransfer) dan daya yang dibutuhkan hanya sebesar 65 Watt TDP (Thermal Design Power).\r\n\r\nCONROE XE\r\nCore processor berikutnya adalah Conroe XE yang saat ini banyak menjadi bahan perbincangan. Conroe XE sendiri adalah core processor dari Intel Core 2 Extreme yang diluncurkan bersamaan dengan Intel Core 2 Duo pada 27 Juli 2006. Conroe XE mempunyai tenaga lebih dibandingkan dengan Conroe. Tipe pertama dan satusatunya yang dikeluarkan oleh Intel untuk jajaran processor Core 2 Extreme adalah X6800 dan sudah beredar di pasaran saat ini meskipun jumlahnya sangat terbatas.\r\n\r\nProcessor Intel Core 2 yang sudah memakai Intel Core 2 Extreme dengan core Conroe XE ini akan menggantikan posisi dari Processor Pentium 4 EE (Extreme Edition) dan Dual Core Extreme Edition. Core 2 Extreme mempunyai clock speed sebesar 2.93 GHz dan FSB sebesar 1066 MT/s. Keluarga dari Conroe XE memerlukan TDP hanya sebesar 75 sampai 80 Watt. Dalam keadaan full load temperature processor dari X6800 yang dihasilkan tidak akan melebihi 450C. Lain lagi jika fungsi SpeedStep-nya berada dalam keadaan aktif. Jika aktif, maka temperatur processor saat keadaan idle yang dihasilkan oleh X6800 hanya berkisar sekitar 250C. Cukup mengesankan, mengingat pada generasi sebelumnya processor Intel Pentium 4 Extreme Edition menghasilkan panas yang bisa dikatakan sangat tinggi.\r\n\r\nHampir sama seperti Core 2 Duo, Core 2 Extreme memiliki shared L2 cache sebesar 4 MB hanya saja perbedaan yang paling terlihat dari kedua Conroe tersebut adalah kecepatan dari masing-masing clock speednya saja. Sebenarnya untuk sebuah processor sekelas “Extreme Edition”, perbedaan seharusnya bisa lebih banyak lagi, bukan hanya didasarkan pada besar kecilnya clock speed-nya saja. Selain perbedaan clock speed tersebut, Core 2 Extreme mempunyai fitur untuk merubah multipliers sampai 11x (step) untuk mendapatkan hasil overclocking yang maksimal. Fitur-fitur unik lain yang disertakan juga pada Core 2 Extreme Edition kali ini adalah FSB yang lebih besar, L2 cache lebih besar, dan adanya L3 cache.\r\n\r\nALLENDALE\r\nCore processor ini dipakai oleh processor Core 2 Duo dengan core Conroe yang hanya memiliki 2 MB L2 Cache. Beberapa Core 2 Duo yang memakai Allendale sebagai core processornya adalah E6300 dengan clock speed sebesar 1.86 GHz dan E6400 dengan clock speed 2.13 GHz, keduanya memiliki FSB sebesar 1066 MT/s.\r\n\r\nMEROM\r\nMerom adalah core processor Intel Core 2 versi mobile pertama yang diluncurkan secara bersamaan dengan Conroe, Conroe XE, dan Allendale. Pada dasarnya, Merom mempunyai spesifikasi dan fitur yang sama dengan Conroe namun Merom mempunyai kelebihan, yaitu ia hanya membutuhkan daya yang sedikit. Pihak Intel sendiri mengklaim bahwa Merom mampu mendongkrak kinerja dari notebook sebesar 20%, namun dengan menggunakan resource daya yang sama dengan processor core duo yang memakai core processor Yonah. Selain itu, Merom adalah processor mobile Intel pertama yang telah mengintegrasikan teknologi EM64T 64-bit di dalamnya. Merom sendiri mempunyai FSB sebesar 667 MT/s sama persis dengan jajaran processor sebelumnya yaitu Intel Core Duo.\r\n\r\nProcessor Core 2 yang menggunakan core processor Merom diberi label dengan “T5×00” dan “T7×00”. Keduanya mempunyai besar shared L2 cache yang berbeda. Pada T5×00 L2 cache yang diusung adalah sebesar 2 MB, sedangkan pada T7×00 L2 cache-nya adalah sebesar 4 MB.\r\n\r\nBeberapa jenis dari Merom adalah T5500 dengan clock speed sebesar 1.66 GHz, T5600 dengan clock speed sebesar 1.83 GHz, T7200 dengan closk speed sebesar 2.00 GHz, T7400 dengan clock speed sebesar 2.16 GHz, dan T7600 dengan clock speed sebesar 2.33 GHz.\r\n\r\nSesuai dengan jenisnya, processor ini didesain oleh intel untuk diaplikasikan ke dalam notebook, karena kelebihannya yang hanya membutuhkan sedikit resource daya dari sebuah baterai notebook untuk bisa bekerja secara maksimal. Sehingga dengan begitu, tidak saja baterai notebook Anda yang akan tahan lebih lama, namun tentu kinerja yang akan Anda dapatkan akan lebih maksimal dibandingkan dengan processor core duo dengan core processor Yonah.\r\n\r\nPerbedaan Core Duo dgn Core 2 Duo\r\n\r\nDual core\r\n\r\nProsesor yang mempunyai dua inti. Setiap procie tu ada inti procienya,sering disebut dgn sebutan core. Jadi benernya procie yg kita bayangkan itu intinya nggak sebesar yg kita bayangkan. Paling hanya sebesar kuku kita aja. Nah,jika inti dari procie itu ada dua,maka procie tersebut bisa disebut sebagai procie dual core. Tidak memandang bahwa itu buatan intel atau AMD. Sering kali ini disalah artikan dengan procie Pentium Dual Core dari Intel. Contoh: Intel Pentium Dual Core E2140,2160,2180\r\n\r\nCore 2 Duo\r\nProcie ini sudah berarsitektur Core. Sama seperti E2xxx. Untuk seri E4xxx cachenya sebesar 2 MB. Sedangkan E6xxx sebesar 4 MB. Core yang digunakan biasanya adalah Conroe yang seharusnya mempunyai cache 4 MB. Jadi Core2Duo yg “asli” adalah Core2Duo E6xxx. Kinerjanya sangat baik. Clock Speed 1,8 GHz dari procie ini sanggup mengalahkan Pentium D 3 GHz dengan mudah. Procie ini juga mempunyai kelebihan yang sama dengan saudaranya yaitu gampang banget dioverclock. Jangan heran procie ini bisa ditarik sampe 3 GHz ke atas dengan gampang.\r\n\r\nSo Intel mengeluarkan intel core 2 duo untuk dua jenis, yang pertama untuk mobile (notebook) dan untuk desktop (PC). Untuk desktop terbagi dalam 2 seri, yaitu CONROE untuk kelas premium dan ALLANDEE…\r\n\r\nKarena penjualan intel melemah dan pasar termasuk semu, maka intel pada pertengahan tahun 2007 mengeluarkan intel dual core….\r\n\r\nTahukah anda apa sebenarnya INTEL DUAL CORE?\r\n\r\nIntel dual core sebenarnya adalah produk lama yaitu INTEL CORE 2 seri ALLANDEE, dengan penurunan kapasitas agar mampu menurunkan harga jual…. L2 cache diperkecil dan spek nilai lainnya\r\n\r\nJadi Intel core 2 dan dual core…. ya sama sama aja namun beda kapasitas…', '2009-10-23', '14:31:58', 'coreduo.jpg', 50, 'intel,processor,xp'),
(87, 19, 'Google "Panas", Microsoft Beli Yahoo???', 'google-panas-microsoft-beli-yahoo', 'Google menolak keras atas tindakan Microsoft yang mau membeli Yahoo. "Ini bukan hanya sekedar transaksi jual beli yang sederhana, suatu perusahaan mengambil perusahaan lainnya. Ini mengenai esensi dari internet yaitu keterbukaan dan inovasi". Komentar David Drummond (Google''s senior vice president for corporate development and chief legal officer).\r\n\r\nYahoo adalah salah satu perusahaan terbesar di internet, belakangan ini Yahoo mulai kehabisan akal untuk mengalahkan pendapatan Google. Google memulai karir di Internet melalui search-engine nya, kesukseskan teknologi tersebut membuat Google terus melakukan inovasi dan mengajak para developer untuk memajukan teknologi Internet, sampai akhirnya Yahoo pun membuat halaman khusus untuk para developer. David Drummond juga menuding kalau Microsoft ingin mengambil keuntungan yang tidak pantas dan melakukan tindakan ilegal melalui Internet. Microsoft mengumumkan pada hari jum''at kemarin (1 februari 2008) penawarannya kepada Yahoo sebesar USD 44.6 Milyar.\r\n\r\nKomite kongres akan melakukan sesi ''hearing'' pada minggu ini untuk menimbang apakah penawaran Microsoft terhadap Yahoo termasuk implikasi Antitrust.', '2009-10-23', '14:31:58', 'yahoo.jpg', 64, 'microsoft-windows'),
(88, 19, 'Install Windows XP pada eeePC versi Linux', 'install-windows-xp-pada-eeepc-versi-linux', 'Setelah berhasil senang mendapatkan eeePC versi linux saya jadi penasaran bagaimana kalo eeePC saya menjalankan versi Windows XP. Saya coba cari2 di Internet maka saya dapat artikel untuk merubah eeePC Linux jadi eeePC Windows. Saya sudah mencobanya dan berhasil. Jika anda penasaran silakan ikutin langkah-langkahnya :<br><br>Persiapan<br><br>* DVDROM / CDROM External<br>* Sebuah USB thumb drive / SDCard<br>* CD Installasi Windows XP<br>* Program nlite dapat di download disitu<br>* Sebuah PC untuk tahap persiapan Membuat Disk Installasi XP lite<br><br>Dengan membuat instalasi XP menjadi lite kita dapat menghemat kapasitas ruang penyimpanan karna kita dapat membuang driver dan fitur XP yang tidak dibutuhkan. Dalam kasus saya bisa menghemat sekitar 600 MB lumayan.<br><br>Berikut langkah2 untuk melakukan perampingan CD installasi XP<br><br>* Buat sebuah folder dan copy file dari CD installasi XP asli kedalamnya<br>* Install dan jalankan program nlite anda<br>* untuk langkah selanjutnya anda dapat menirukan pada gambar2 disitu<br><br>Download Driver XP<br>Anda dapat download driver eeePC untuk window XP disitu; Setelah semua driver lengkap anda copy ke dalam thumbdrive atau SDCard anda;<br><br>Mulai menginstall XP<br>Setelah anda mempunyai sebuah CD XP lite Bootable dan sebuah Driver XP thumb drive sekarang saatnya memulai installasi pada eeePC anda.<br><br>* Masukan SDCard dan Thumbdrive anda pada slot masing-masing di eeePC<br>* Hidupkan eeePC dan tekan "F2" untuk masuk ke BIOS<br>* Pada bios pilih "OS Installation = Start" dan "1st Boot Device = "DVDROM" kemudian tekan F10 untuk simpan dan keluar<br>* Selanjutnya sistem akan restart dan lakukan installasi XP seperti biasa<br>* Setelah instalasi selesai kembalikanlah setting BIOS seperti semula...<br>* Lalu semua driver yang ada pada thumbdrive dapat di install<br>', '2009-10-23', '14:29:16', 'asuseeepc.gif', 144, 'microsoft-windows');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `to` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `message` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=225 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `sent`, `recd`) VALUES
(1, 'sumawijaya', 'edigunawan', 'ggon...', '2009-11-13 13:35:59', 1),
(2, 'sumawijaya', 'edigunawan', 'woi....jancuuukkk', '2009-11-14 10:18:47', 1),
(3, 'edigunawan', 'sumawijaya', 'ape???', '2009-11-14 10:19:05', 1),
(4, 'sumawijaya', 'melody', 'oey...', '2009-11-16 18:48:51', 1),
(5, 'sumawijaya', 'edigunawan', 'lengaaarrr...', '2009-11-16 18:49:02', 1),
(6, 'sumawijaya', 'sumawijaya', 'oi...', '2009-11-16 18:58:01', 1),
(7, 'edigunawan', 'sumawijaya', 'jancuuuukkkkk.....', '2009-11-17 13:31:32', 1),
(8, 'sumawijaya', 'edigunawan', 'ape joooggg...', '2009-11-17 13:31:42', 1),
(9, 'sumawijaya', 'melody', 'hei melody...', '2009-11-19 20:13:00', 1),
(10, 'sumawijaya', 'agus', 'halo boom...', '2009-11-19 20:13:13', 1),
(11, 'agus', 'sumawijaya', 'ape???', '2009-11-19 20:15:45', 1),
(12, 'sumawijaya', 'agus', 'be meju ci??', '2009-11-19 20:15:57', 1),
(13, 'agus', 'sumawijaya', 'naskeleng ci....', '2009-11-19 20:16:21', 1),
(14, 'sumawijaya', 'agus', 'hahahaaaa....', '2009-11-19 20:16:34', 1),
(15, 'edigunawan', 'arik_sasmita', 'oi....', '2009-11-20 00:11:16', 1),
(16, 'edigunawan', 'melody', 'helo cantik...', '2009-11-20 00:11:24', 1),
(17, 'edigunawan', 'melody', 'Wayan Gede Suma Wijaya, atau biasa dipanggil Suma Wijaya. Suma Wijaya adalah seorang freelance web designer dan web programer, dengan skill PHP, CSS, dan HTML.', '2009-11-20 00:14:44', 1),
(18, 'edigunawan', 'arik_sasmita', 'Mendapat uang satu juta', '2009-11-20 00:14:54', 1),
(19, 'sumawijaya', 'edigunawan', 'jaannnccuuuukkkk.....', '2009-11-20 07:18:20', 1),
(20, 'sumawijaya', 'melody', 'oi...', '2009-11-20 09:00:30', 1),
(21, 'melody', 'edigunawan', 'apa??/', '2009-11-20 09:02:10', 1),
(22, 'sumawijaya', 'edigunawan', 'bojog............', '2009-11-23 22:36:13', 1),
(23, 'edigunawan', 'sumawijaya', 'ape???', '2009-11-23 22:36:27', 1),
(24, 'sumawijaya', 'edigunawan', 'jancuuulkkk...', '2009-11-26 10:28:34', 1),
(25, 'sumawijaya', 'candra', 'kuuluk katuk...', '2009-11-26 10:28:43', 1),
(26, 'edigunawan', 'sumawijaya', 'enken???', '2009-11-26 10:29:43', 1),
(27, 'sumawijaya', 'edigunawan', 'be meju ci...???', '2009-11-26 10:30:17', 1),
(28, 'de_lumbung', 'RaRa', 'oi...', '2009-11-27 09:35:08', 1),
(29, 'de_lumbung', 'candra', 'woi...', '2009-11-27 09:37:18', 1),
(30, 'sumawijaya', 'de_lumbung', 'oi....', '2009-11-27 09:51:13', 1),
(31, 'de_lumbung', 'sumawijaya', 'ape???', '2009-11-27 09:51:21', 1),
(32, 'sumawijaya', 'de_lumbung', 'uyut gen ci...', '2009-11-27 09:51:45', 1),
(33, 'de_lumbung', 'RaRa', 'halo rara....', '2009-11-27 09:55:55', 1),
(34, 'de_lumbung', 'RaRa', 'gmn kabar`ny??', '2009-11-27 09:55:59', 1),
(35, 'de_lumbung', 'RaRa', 'oi...', '2009-11-27 11:24:15', 1),
(36, 'de_lumbung', 'candra', 'oi...', '2009-11-27 19:26:56', 1),
(37, 'candra', 'de_lumbung', 'ape??', '2009-11-27 19:27:55', 1),
(38, 'RaRa', 'de_lumbung', 'baik kak...', '2009-11-27 23:02:37', 1),
(39, 'RaRa', 'de_lumbung', 'kakak gmn???', '2009-11-27 23:02:45', 1),
(40, 'RaRa', 'de_lumbung', 'udah dpt cew banyuwangi???', '2009-11-27 23:02:53', 1),
(41, 'RaRa', 'de_lumbung', 'heheheee.....', '2009-11-27 23:02:56', 1),
(42, 'de_lumbung', 'RaRa', 'udah donk....', '2009-11-27 23:05:41', 1),
(43, 'de_lumbung', 'RaRa', 'Ra gmn???', '2009-11-27 23:05:46', 1),
(44, 'de_lumbung', 'RaRa', 'udah punya pacar???', '2009-11-27 23:05:52', 1),
(45, 'paloed', 'paloed', 'oi...', '2009-11-27 23:08:33', 1),
(46, 'paloed', 'arik_sasmita', 'alouw rik...', '2009-11-27 23:09:28', 1),
(47, 'arik_sasmita', 'paloed', 'alouuw jg...', '2009-11-27 23:10:23', 1),
(48, 'de_lumbung', 'paloed', 'jog...', '2009-11-28 11:49:21', 1),
(49, 'de_lumbung', 'paloed', 'woi...', '2009-11-28 12:27:19', 1),
(50, 'paloed', 'arik_sasmita', 'halo brooowww....', '2009-11-28 19:42:39', 1),
(51, 'paloed', 'arik_sasmita', 'kenken kabare???', '2009-11-28 19:43:00', 1),
(52, 'melody', 'de_lumbung', 'hei...', '2009-11-28 21:30:07', 1),
(53, 'de_lumbung', 'melody', 'kenapa??', '2009-11-28 21:30:27', 1),
(54, 'melody', 'de_lumbung', 'bleh kenelan gak???', '2009-11-28 21:30:56', 1),
(55, 'de_lumbung', 'melody', 'bleh....', '2009-11-28 21:31:31', 1),
(56, 'de_lumbung', 'melody', 'nama km sapa???', '2009-11-28 21:31:34', 1),
(57, 'melody', 'de_lumbung', 'nama aku melody prima...', '2009-11-28 21:31:44', 1),
(58, 'melody', 'de_lumbung', 'km???', '2009-11-28 21:31:47', 1),
(59, 'de_lumbung', 'melody', 'aku gede lumbung...', '2009-11-28 21:32:05', 1),
(60, 'de_lumbung', 'melody', 'km asl`ny drimana??', '2009-11-28 21:32:10', 1),
(61, 'melody', 'de_lumbung', 'aku asl`ny dri jakarta...', '2009-11-28 21:32:24', 1),
(62, 'melody', 'de_lumbung', 'dulu sie pernah tinggal di bali...', '2009-11-28 21:32:32', 1),
(63, 'melody', 'de_lumbung', 'klo km??', '2009-11-28 21:32:37', 1),
(64, 'de_lumbung', 'melody', 'aku asli bali...', '2009-11-28 21:32:50', 1),
(65, 'de_lumbung', 'melody', 'wah...', '2009-11-28 21:32:54', 1),
(66, 'de_lumbung', 'melody', 'tinggal di bali mana???', '2009-11-28 21:32:59', 1),
(67, 'de_lumbung', 'melody', 'kok gk aQ taw ya, pernah ada cew cntik kyk km prnah tinggal d bali...', '2009-11-28 21:33:31', 1),
(68, 'de_lumbung', 'melody', 'heheheee...', '2009-11-28 21:34:22', 1),
(69, 'imydcc', 'imydcc', 'woi...', '2009-11-29 09:13:09', 1),
(70, 'imydcc', 'imydcc', 'jancuuukkk....', '2009-11-29 09:13:15', 1),
(71, 'arik_sasmita', 'paloed', 'becik`2...', '2009-11-29 09:48:04', 1),
(72, 'arik_sasmita', 'paloed', 'km enken??', '2009-11-29 09:48:11', 1),
(73, 'paloed', 'arik_sasmita', 'apik`2 wae..', '2009-11-29 09:51:45', 1),
(74, 'paloed', 'arik_sasmita', 'dje megae jani rik???', '2009-11-29 09:52:12', 1),
(75, 'arik_sasmita', 'paloed', 'rage tetepo megae di taksu...', '2009-11-29 09:52:31', 1),
(76, 'paloed', 'arik_sasmita', 'sink med megae ditu??', '2009-11-29 09:53:04', 1),
(77, 'paloed', 'arik_sasmita', 'rage gen med nepukin jeneng bos ne...', '2009-11-29 09:53:14', 1),
(78, 'paloed', 'arik_sasmita', 'hehhee...', '2009-11-29 09:53:17', 1),
(79, 'arik_sasmita', 'paloed', 'sante gen...', '2009-11-29 09:53:39', 1),
(80, 'arik_sasmita', 'paloed', 'jeg jalani gen...', '2009-11-29 09:53:46', 1),
(81, 'paloed', 'arik_sasmita', 'ae je...', '2009-11-29 09:53:54', 1),
(82, 'paloed', 'arik_sasmita', 'sink kuliah??', '2009-11-29 09:53:59', 1),
(83, 'arik_sasmita', 'paloed', 'kuliah malem...', '2009-11-29 09:56:32', 1),
(84, 'arik_sasmita', 'paloed', 'kanggoang...', '2009-11-29 09:56:34', 1),
(85, 'paloed', 'arik_sasmita', 'ae...', '2009-11-29 09:56:44', 1),
(86, 'paloed', 'arik_sasmita', 'pang ade gen kegiatan...', '2009-11-29 09:56:58', 1),
(87, 'de_lumbung', 'arik_sasmita', 'halo rik....', '2009-11-29 19:00:26', 1),
(88, 'de_lumbung', 'arik_sasmita', 'punapi gatra ne???', '2009-11-29 19:00:32', 1),
(89, 'arik_sasmita', 'de_lumbung', 'becik`2 gen brow...', '2009-11-29 19:01:19', 1),
(90, 'arik_sasmita', 'de_lumbung', 'enken kabar di jawe??', '2009-11-29 19:01:51', 1),
(91, 'de_lumbung', 'arik_sasmita', 'baek`2 gen...', '2009-11-29 19:02:26', 1),
(92, 'de_lumbung', 'arik_sasmita', 'monto`2an gen...', '2009-11-29 19:02:34', 1),
(93, 'de_lumbung', 'arik_sasmita', 'sink ade beda ne...', '2009-11-29 19:02:47', 1),
(94, 'johndoe', 'edigunawan', 'oi...', '2009-12-02 17:42:52', 1),
(95, 'edigunawan', 'edigunawan', 'knpa???', '2009-12-02 17:52:46', 1),
(96, 'de_lumbung', 'edigunawan', 'teli...', '2009-12-02 17:53:57', 1),
(97, 'edigunawan', 'de_lumbung', 'ape??/', '2009-12-02 17:54:12', 1),
(98, 'de_lumbung', 'edigunawan', 'be meju???', '2009-12-02 17:54:44', 1),
(99, 'de_lumbung', 'paloed', 'cuk...', '2009-12-06 18:04:06', 1),
(100, 'de_lumbung', 'edigunawan', 'bojog.....', '2009-12-06 18:04:12', 1),
(101, 'de_lumbung', 'edigunawan', 'ngujang to??', '2009-12-06 18:04:17', 1),
(102, 'de_lumbung', 'de_lumbung', 'dffdfdfd', '2009-12-07 00:45:53', 1),
(103, 'de_lumbung', 'paloed', 'loed...', '2009-12-07 00:46:50', 1),
(104, 'paloed', 'de_lumbung', 'ape??', '2009-12-07 00:47:41', 1),
(105, 'de_lumbung', 'paloed', 'sink enken....', '2009-12-07 00:48:17', 1),
(106, 'paloed', 'de_lumbung', 'jeneng ci...\nbe maan cew jawe ci???', '2009-12-07 00:48:43', 1),
(107, 'paloed', 'de_lumbung', 'baang cannk besik...', '2009-12-07 00:48:52', 1),
(108, 'de_lumbung', 'de_lumbung', 'oi...', '2009-12-07 00:50:55', 1),
(109, 'de_lumbung', 'paloed', 'oi...', '2009-12-07 09:47:54', 1),
(110, 'paloed', 'de_lumbung', 'apa???', '2009-12-07 09:48:36', 1),
(111, 'de_lumbung', 'paloed', 'oi...', '2009-12-07 19:56:45', 1),
(112, 'paloed', 'de_lumbung', 'apa??', '2009-12-07 19:57:49', 1),
(113, 'edigunawan', 'de_lumbung', 'meju..', '2009-12-08 23:33:32', 1),
(114, 'edigunawan', 'de_lumbung', 'ci be meju???', '2009-12-08 23:33:37', 1),
(115, 'edigunawan', 'edigunawan', 'oi..', '2009-12-10 17:01:14', 1),
(116, 'de_lumbung', 'agus', 'bom..', '2009-12-10 23:09:11', 1),
(117, 'de_lumbung', 'agus', 'bin pidan payu manggang??', '2009-12-10 23:09:19', 1),
(118, 'de_lumbung', 'agus', 'kude mesuang pis???', '2009-12-10 23:09:25', 1),
(119, 'de_lumbung', 'agus', 'dije acara manggang ne???', '2009-12-10 23:09:38', 1),
(120, 'sumawijaya', 'candra', 'jancuuukkk...', '2009-12-11 23:02:40', 1),
(121, 'sumawijaya', 'agus', 'woey...', '2009-12-11 23:02:46', 1),
(122, 'candra', 'sumawijaya', 'ape??', '2009-12-11 23:06:08', 1),
(123, 'sumawijaya', 'candra', 'be meju....', '2009-12-11 23:06:23', 1),
(124, 'candra', 'sumawijaya', 'konden....\nci be?????', '2009-12-11 23:06:43', 1),
(125, 'edigunawan', 'agus', 'oi...', '2009-12-14 22:15:24', 1),
(126, 'edigunawan', 'edigunawan', 'woi..', '2009-12-14 22:15:32', 1),
(127, 'edigunawan', 'edigunawan', 'kleng...', '2009-12-14 22:15:41', 1),
(128, 'edigunawan', 'edigunawan', 'naskeeleng...', '2009-12-14 22:15:53', 1),
(129, 'edigunawan', 'edigunawan', 'amah...', '2009-12-14 22:16:03', 1),
(130, 'edigunawan', 'edigunawan', 'juang be...', '2009-12-14 22:16:07', 1),
(131, 'sumawijaya', 'edigunawan', 'amahh...', '2009-12-14 22:22:15', 1),
(132, 'sumawijaya', 'edigunawan', 'ci dje ne???', '2009-12-14 22:22:29', 1),
(133, '', 'agus', 'jbhhg', '2009-12-15 22:28:48', 1),
(134, '', 'agus', 'dsds', '2009-12-15 22:28:55', 1),
(135, 'de_lumbung', 'agus', 'aloouw bom...', '2009-12-21 17:41:12', 1),
(136, 'de_lumbung', 'agus', 'ape kel menu manggang ne??', '2009-12-21 17:41:25', 1),
(137, 'de_lumbung', 'agus', 'patuh care e pidan??/', '2009-12-21 17:41:33', 1),
(138, 'de_lumbung', 'agus', 'oi...', '2009-12-21 18:52:59', 1),
(139, 'de_lumbung', 'agus', 'dje ne??', '2009-12-21 18:53:03', 1),
(140, 'de_lumbung', 'agus', 'bin pidan nak mayah pis manggang ne bom??', '2009-12-21 18:53:17', 1),
(141, 'Asan', 'Asan', 'o', '2009-12-21 19:18:24', 1),
(142, 'Asan', 'Asan', 'kleng', '2009-12-21 19:18:37', 1),
(143, 'sumawijaya', 'Asan', 'jancuuk ci....', '2009-12-21 19:18:52', 1),
(144, 'Asan', 'sumawijaya', 'teli cai...', '2009-12-21 19:19:09', 1),
(145, 'sumawijaya', 'Asan', 'nawang ci teli???', '2009-12-21 19:19:27', 1),
(146, 'Asan', 'sumawijaya', 'ci nawang???', '2009-12-21 19:19:57', 1),
(147, 'sumawijaya', 'Asan', 'nawang....', '2009-12-21 19:20:09', 1),
(148, 'sumawijaya', 'Asan', 'maka ne...', '2009-12-21 19:20:14', 1),
(149, 'sumawijaya', 'Asan', 'MELALI CEPOK K KOMPLEK...', '2009-12-21 19:20:29', 1),
(150, 'Asan', 'sumawijaya', 'ach....\nliu penyakit....', '2009-12-21 19:20:52', 1),
(151, 'Asan', 'sumawijaya', 'penyakit dagang...', '2009-12-21 19:21:00', 1),
(152, 'Asan', 'sumawijaya', 'Sepi Lais...', '2009-12-21 19:21:04', 1),
(153, 'sumawijaya', 'Asan', 'Beh...', '2009-12-21 19:21:20', 1),
(154, 'sumawijaya', 'Asan', 'Ci sink nawang surga dunia mule...', '2009-12-21 19:21:28', 1),
(155, 'sumawijaya', 'Asan', 'sajan gak gaul ci nuokzzzz.....', '2009-12-21 19:21:38', 1),
(156, 'Asan', 'sumawijaya', 'Ae...', '2009-12-21 19:22:29', 1),
(157, 'Asan', 'sumawijaya', 'Maklum na`e...', '2009-12-21 19:22:34', 1),
(158, 'Asan', 'sumawijaya', 'cank sink taen menggauli soal ne...', '2009-12-21 19:22:42', 1),
(159, 'sumawijaya', 'Asan', 'to tunangan cai enken....', '2009-12-21 19:24:33', 1),
(160, 'sumawijaya', 'Asan', 'sink taen gauli ci???\ncank baang menggauli neh...', '2009-12-21 19:24:53', 1),
(161, 'sumawijaya', 'Asan', 'daripada nganggur...', '2009-12-21 19:25:01', 1),
(162, 'sumawijaya', 'Asan', 'hahahhaaa....', '2009-12-21 19:25:03', 1),
(163, 'Asan', 'sumawijaya', 'jeneng ci`e...', '2009-12-21 19:25:31', 1),
(164, 'Asan', 'sumawijaya', 'Enak di Elo gak enak di Gue...', '2009-12-21 19:25:41', 1),
(165, 'de_lumbung', 'Asan', 'jancuuk...', '2009-12-24 21:46:11', 1),
(166, 'de_lumbung', 'sumawijaya', 'woi...', '2009-12-24 22:12:57', 1),
(167, 'de_lumbung', 'sumawijaya', 'jancuuuukkk...', '2009-12-24 22:13:01', 1),
(168, 'de_lumbung', 'sumawijaya', 'dje ci??', '2009-12-24 22:13:03', 1),
(169, 'de_lumbung', 'candra', 'aloouuww cuk...', '2009-12-24 22:13:13', 0),
(170, 'de_lumbung', 'candra', 'sugih ci jani ae??', '2009-12-24 22:13:19', 0),
(171, 'de_lumbung', 'imydcc', 'woi...', '2009-12-27 09:10:55', 1),
(172, 'de_lumbung', 'edigunawan', 'woiii...', '2010-01-08 18:12:25', 1),
(173, 'de_lumbung', 'edigunawan', 'be meju??', '2010-01-08 18:12:29', 1),
(174, 'de_lumbung', 'edigunawan', '<!DOCTYPE html PUBLIC \\"-//W3C//DTD XHTML 1.0 Transitional//EN\\" \\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\\">\n<html xmlns=\\"http://www.w3.org/1999/xhtml\\">\n<head>\n<meta http-equiv=\\"Content-Type\\" content=\\"text/html; charset=utf-8\\" ', '2010-01-08 18:12:39', 1),
(175, 'arik_sasmita', 'arik_sasmita', 'oi..', '2010-01-09 23:55:42', 1),
(176, 'de_lumbung', 'edigunawan', 'oi....', '2010-01-27 12:40:58', 1),
(177, 'imydcc', 'de_lumbung', 'ape??', '2010-01-28 01:22:10', 1),
(178, 'imydcc', 'Asan', 'oi...', '2010-01-30 13:09:31', 1),
(179, 'imydcc', 'Asan', 'enken kabar ci`e??', '2010-01-30 13:09:38', 1),
(180, 'imydcc', 'Asan', 'be meju??', '2010-01-30 13:09:41', 1),
(181, 'sumawijaya', 'Asan', 'oi...', '2010-01-30 19:38:32', 1),
(182, 'sumawijaya', 'agus', 'cicing..', '2010-01-30 19:38:55', 1),
(183, 'de_lumbung', 'sumawijaya', 'woi...', '2010-02-12 16:39:36', 1),
(184, 'de_lumbung', 'candra', 'woi...', '2010-02-12 19:22:15', 0),
(185, 'de_lumbung', 'de_lumbung', 'woi....', '2010-02-18 00:38:44', 1),
(186, 'de_lumbung', 'de_lumbung', 'ape cuk???', '2010-02-18 00:39:15', 1),
(187, 'de_lumbung', 'Asan', 'oi...', '2010-02-18 22:53:32', 1),
(188, 'de_lumbung', 'Asan', 'WOI SAN..', '2010-02-20 21:21:09', 1),
(189, 'de_lumbung', 'Asan', 'ci dij ne??', '2010-02-20 21:21:13', 1),
(190, 'de_lumbung', 'Asan', 'silih jep modem CDMA ci`e..', '2010-02-20 21:21:26', 1),
(191, 'de_lumbung', 'Asan', 'ade perlu dik ne..', '2010-02-20 21:21:36', 1),
(192, 'de_lumbung', 'Asan', 'oi..', '2010-02-20 21:22:15', 1),
(193, 'de_lumbung', 'Asan', 'dije ne??', '2010-02-20 21:22:20', 1),
(194, 'Asan', 'de_lumbung', 'anggon ape??', '2010-02-20 21:23:28', 1),
(195, 'de_lumbung', 'Asan', 'nah....\nsilih jep gen...', '2010-02-20 21:23:50', 1),
(196, 'de_lumbung', 'agus', 'woi..', '2010-02-21 12:22:50', 1),
(197, 'de_lumbung', 'agus', 'we,,,', '2010-03-08 20:09:44', 0),
(198, 'de_lumbung', 'agus', 'dije ne bom???', '2010-03-08 20:09:49', 0),
(199, 'de_lumbung', 'agus', 'cank di Bali ne...', '2010-03-08 20:09:58', 0),
(200, 'de_lumbung', 'agus', 'dsd', '2010-03-12 20:28:12', 0),
(201, 'sumawijaya', 'de_lumbung', 'jancuuukk....', '2010-04-14 09:26:51', 1),
(202, 'de_lumbung', 'sumawijaya', 'kenapa cuk.....????', '2010-04-14 09:27:09', 1),
(203, 'edigunawan', 'de_lumbung', 'dije ne cuk....', '2010-04-17 19:44:41', 1),
(204, 'de_lumbung', 'edigunawan', 'jumah,,', '2010-04-17 19:45:05', 1),
(205, 'de_lumbung', 'edigunawan', 'enken???', '2010-04-17 19:45:08', 1),
(206, 'de_lumbung', 'edigunawan', 'ke aQuarium ae??', '2010-04-17 19:45:13', 1),
(207, 'edigunawan', 'de_lumbung', 'ae..', '2010-04-17 19:45:51', 1),
(208, 'de_lumbung', 'edigunawan', 'ci mayahin nah..', '2010-04-17 19:46:09', 1),
(209, 'RaRa', 'de_lumbung', 'halo kakak...', '2010-04-17 19:48:29', 1),
(210, 'RaRa', 'de_lumbung', 'gmn kabar??', '2010-04-17 19:48:34', 1),
(211, 'RaRa', 'edigunawan', 'hei kakak...', '2010-04-17 19:48:44', 1),
(212, 'RaRa', 'edigunawan', 'gmn kabar`ny??', '2010-04-17 19:48:52', 1),
(213, 'de_lumbung', 'RaRa', 'halo jg rara..', '2010-04-17 19:49:11', 1),
(214, 'de_lumbung', 'RaRa', 'kabar`ku baik kok..', '2010-04-17 19:49:18', 1),
(215, 'de_lumbung', 'RaRa', 'rara gmmn??', '2010-04-17 19:49:22', 1),
(216, 'edigunawan', 'RaRa', 'hei jug rara..', '2010-04-17 19:49:49', 1),
(217, 'RaRa', 'de_lumbung', 'rara baik`2 aja kok..', '2010-04-17 19:50:02', 1),
(218, 'RaRa', 'de_lumbung', 'Welcome On Everyday Like Sunday Official Website\nWebsite Everydaylikesunday kini hadir dengan format baru. Dengan fitur Update Status dan Chatting website ini terlihat lebih interaktif. Join trus yaw..!!!! Untuk ELS Family 3.MM.1, sukses selalu untuk', '2010-04-17 19:50:36', 1),
(219, 'de_lumbung', 'RaRa', 'Udah mulai kuliah lagi,,,, Bakal kembali diuber-uber tugas yang bejibun banyaknya...', '2010-04-17 19:51:10', 1),
(220, 'de_lumbung', 'edigunawan', 'woi..', '2010-04-23 17:33:10', 0),
(221, 'de_lumbung', 'sumawijaya', 'woi,,', '2010-04-30 12:14:50', 1),
(222, 'de_lumbung', 'sumawijaya', 'woi..', '2010-09-21 22:44:04', 0),
(223, 'de_lumbung', 'sumawijaya', 'dije ne??', '2010-09-21 22:44:07', 0),
(224, 'de_lumbung', 'edigunawan', 'woet', '2011-04-14 11:07:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `demo_twitter_timeline`
--

CREATE TABLE IF NOT EXISTS `demo_twitter_timeline` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tweet` varchar(140) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_member` int(5) NOT NULL,
  `nama_pengirim` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `foto_pengirim` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

--
-- Dumping data for table `demo_twitter_timeline`
--

INSERT INTO `demo_twitter_timeline` (`id`, `tweet`, `dt`, `id_member`, `nama_pengirim`, `foto_pengirim`) VALUES
(1, 'Kenapa Keringat rasanya asin????', '2009-11-19 18:22:34', 1, 'Gede Suma Wijaya', 'sml_sumawijaya.jpg'),
(2, 'Kenapa yaw aQ selalu disakiti sam cowok???', '2009-11-19 18:22:59', 10, 'nDa CeMangaD "ToRo"', 'sml_ndacemangad.jpg'),
(3, 'Waduuuhhh...Pusing nie,, Banyak Tugas...', '2009-11-19 18:23:43', 20, 'Ari Sopyan', 'sml_aris.jpg'),
(4, 'Nonton Soundrenaline yuk....', '2009-11-19 18:35:07', 19, 'imyDcC', 'sml_imyDcC.jpg'),
(62, 'Untuk ELS Family 3.MM.1, sukses selalu untuk Qta semua. Dimanapun dan kapanpun Qta tetap 1 kesatuan yang utuh....... ', '2009-12-10 22:58:29', 4, 'Wayan Edi Gunawan', 'sml_edigunawan.jpg'),
(64, 'Mata Ngantuk.....\nTapi masih pengen ngelanjutin bwt Web`ny ELS....\nGimana nie???\nAda yg bisa bantu gak???', '2009-12-10 23:34:49', 30, 'Gede Lumbung', 'sml_de_lumbung.jpg'),
(65, 'Ntar k kampus...\nRapat lagi,,,Mau ada pelantikan anggota BEM....\nAsikkkk....\nDapet juga gue ngerasain jd anggota BEM....\nhihihiiii.......', '2009-12-11 17:34:53', 1, 'Gede Suma Wijaya', 'sml_sumawijaya.jpg'),
(66, 'Lagi Males bgt...\nBaru keluar nie capek`ny yg kemaren, perjalanan dari Denpasar ke Banyuwangi...\nHuffttt....\nNtar Tidur dulu aacchhhh....', '2009-12-21 17:40:30', 30, 'Gede Lumbung', 'sml_de_lumbung.jpg'),
(33, 'Website Everydaylikesunday kini hadir dengan format baru. Dengan fitur Update Status dan Chatting website ini terlihat lebih interaktif.....', '2009-11-19 23:49:02', 1, 'Gede Suma Wijaya', 'sml_sumawijaya.jpg'),
(67, 'Wah...\nTempat apa ini....\naQ tersesat...\nTolong aQ....', '2009-12-21 18:56:35', 12, 'Mr As Lapendos', 'sml_asan.jpg'),
(41, 'Oitzzz....\nKeren web ne nuok....\nMisi Chat + Update Status....\nhwehehehe.....\nJaya trus ELS....', '2009-11-29 09:58:28', 7, 'Arik Sasmita', 'sml_arik_sasmita.jpg'),
(70, 'Liburan udah berakhir....\nSaatnya bayar Uang semesteran....\nAbis deh uang gue....\nck..ck..ck...', '2010-01-30 12:53:29', 19, 'imyDcC', 'sml_imydcc.jpg'),
(71, 'Lg nonton TV sama si Ndut...\nMalem minggu yang klabu...\nck...ck...ck...', '2010-01-30 19:41:07', 1, 'Gede Suma Wijaya', 'sml_sumawijaya.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(5) NOT NULL AUTO_INCREMENT,
  `foto_kecil` varchar(160) NOT NULL,
  `title` varchar(75) NOT NULL,
  `foto_besar` varchar(150) NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `foto_kecil`, `title`, `foto_besar`) VALUES
(1, '_20090408024003kecil.jpg', 'Hang out di bedugul, minjem mobil orang...ck..ck..ck..', '_20090408024003besar.jpg'),
(2, '_20090408024048kecil.jpg', 'Hang out di bedugul, minjem mobil orang...ck..ck..ck..', '_20090408024048besar.jpg'),
(3, '_20090408024107kecil.jpg', 'Kenangan Tirta Yatra ke besakih pas kelas 2..', '_20090408024107besar.jpg'),
(4, '_20090408024116kecil.jpg', 'Kenangan Tirta Yatra ke besakih pas kelas 2..', '_20090408024116besar.jpg'),
(5, '_20090408024143kecil.jpg', 'Hang out di kelas, padahal udah mau ujian...stay cool', '_20090408024143besar.jpg'),
(6, '_20090408024206kecil.jpg', 'Abis manggang di rumahnya rai...foto2 dulu sebelum pulang', '_20090408024206besar.jpg'),
(7, '_20090408024225kecil.jpg', 'Makan dulu sebelum kumpul bareng yang lainnya...', '_20090408024225besar.jpg'),
(33, 'thumb_1241613841.jpg', 'Koyo, Jernat, Alit, Yudik hang out,,,,,', '1241613841.jpg'),
(32, 'thumb_1241613763.jpg', 'Hang Out di kelas, foto`2 pake laptop..maklum..:D', '1241613763.jpg'),
(31, 'thumb_1241613689.jpg', 'Nie namanya Tiwi`x....', '1241613689.jpg'),
(13, '_20090408024901kecil.jpg', 'Bergaya dulu,,,sebelum lulus...', '_20090408024901besar.jpg'),
(34, 'thumb_1241613885.jpg', 'Tiwi`x ajak tunanganne....:D', '1241613885.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
  `id_guestbook` int(5) NOT NULL AUTO_INCREMENT,
  `nama_komentar` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email_komentar` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `ip_komentar` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_guestbook`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id_guestbook`, `nama_komentar`, `email_komentar`, `isi_komentar`, `tanggal`, `jam`, `ip_komentar`) VALUES
(1, 'Suma Wijaya', 'go_blind_32@yahoo.com', 'Mari bersama-sama menciptakan, budaya berkomentar tanpa SPAM. OK brotha....!!!!', '2009-11-13', '10:10:11', '127.0.0.1 '),
(2, 'Edi Gunawan', 'koplar.13@yahoo.com', 'ika anda mengirimkan SPAM, selamanya anda tidak akan diterima di berbagai komunitas internet. Mari bersama-sama menciptakan, budaya berkomentar tanpa SPAM. OK brotha....!!!!', '2009-11-13', '00:00:11', '127.0.0.1'),
(3, 'Agus Bawa Nadi', 'agus_bom_bom@yahoo.com', 'Silahkan tinggalkan kesan, pesan, kritik bahkan saran untuk kemajuan website Everyday Like Sunday ini. \r\n\r\nDengan etika yang baik dan benar, dan yang terpenting ANTI SPAM. ', '2009-11-13', '13:13:07', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`) VALUES
(19, 'Teknologi', 'teknologi'),
(20, 'Olahraga', 'olahraga'),
(21, 'Ekonomi', 'ekonomi'),
(22, 'Politik', 'politik'),
(23, 'Hiburan', 'hiburan');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi_foto`
--

CREATE TABLE IF NOT EXISTS `koleksi_foto` (
  `id_foto` int(5) NOT NULL AUTO_INCREMENT,
  `id_member` int(5) NOT NULL,
  `foto_kecil` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `foto_besar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `koleksi_foto`
--

INSERT INTO `koleksi_foto` (`id_foto`, `id_member`, `foto_kecil`, `foto_besar`) VALUES
(42, 1, 'sml_pemulung.jpg', 'pemulung.jpg'),
(41, 1, 'sml_jongos-with-me.jpg', 'jongos-with-me.jpg'),
(5, 30, 'sml_melody.jpg', 'melody.jpg'),
(6, 30, 'sml_DSC00020.JPG', 'DSC00020.JPG'),
(7, 14, 'sml_DSC00020.JPG', 'DSC00020.JPG'),
(8, 14, 'sml_DSC00020.JPG', 'DSC00020.JPG'),
(9, 11, 'sml_zie_of_die.jpg', 'zie_of_die.jpg'),
(16, 4, 'sml_DSC000005.jpg', 'DSC000005.jpg'),
(22, 4, 'sml_607.jpg', '607.jpg'),
(24, 7, 'sml_DSC00581.jpg', 'DSC00581.jpg'),
(21, 4, 'sml_614.jpg', '614.jpg'),
(18, 4, 'sml_Alah_kulux._5.jpg', 'Alah_kulux._5.jpg'),
(19, 4, 'sml_589.jpg', '589.jpg'),
(20, 4, 'sml_610.jpg', '610.jpg'),
(25, 19, 'sml_DSC00581.jpg', 'DSC00581.jpg'),
(26, 19, 'sml__boxster_s.jpg', '_boxster_s.jpg'),
(27, 19, 'sml_BR-olwp1.jpg', 'BR-olwp1.jpg'),
(28, 19, 'sml_avatar_01.jpg', 'avatar_01.jpg'),
(29, 19, 'sml_avatar_05.jpg', 'avatar_05.jpg'),
(30, 12, 'sml__panamera_turbo.jpg', '_panamera_turbo.jpg'),
(31, 13, 'sml_pepsi_ms desktop 1-01[1][2][5].jpg', 'pepsi_ms desktop 1-01[1][2][5].jpg'),
(32, 30, 'sml_627.jpg', '627.jpg'),
(33, 11, 'sml_584.jpg', '584.jpg'),
(34, 11, 'sml_597.jpg', '597.jpg'),
(35, 14, 'sml_602.jpg', '602.jpg'),
(36, 4, 'sml_DSCS000035.jpg', 'DSCS000035.jpg'),
(37, 30, 'sml_In buyan.jpg', 'In buyan.jpg'),
(38, 30, 'sml_come-on-coy.jpg', 'come-on-coy.jpg'),
(39, 30, 'sml_uluwatu.jpg', 'uluwatu.jpg'),
(40, 30, 'sml_4-power.jpg', '4-power.jpg'),
(43, 1, 'sml_alah-kuluk.jpg', 'alah-kuluk.jpg'),
(44, 12, 'sml_Chrysanthemum.jpg', 'Chrysanthemum.jpg'),
(45, 12, 'sml_Desert.jpg', 'Desert.jpg'),
(46, 12, 'sml_Hydrangeas.jpg', 'Hydrangeas.jpg'),
(47, 12, 'sml_Penguins.jpg', 'Penguins.jpg'),
(48, 30, 'sml_DSC02240.JPG', 'DSC02240.JPG'),
(49, 7, 'sml_DSC02189.JPG', 'DSC02189.JPG'),
(50, 7, 'sml_DSC02186.JPG', 'DSC02186.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(5) NOT NULL AUTO_INCREMENT,
  `id_berita` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `ip_pengirim` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`, `ip_pengirim`) VALUES
(12, 71, 'lukman', 'http://bukulokomedia.com', 'pertamax', '2009-02-02', '08:10:23', 'Y', ''),
(13, 71, 'Andi', 'http://detik.com', 'CR 7 emang idola gua, melesat terus ya prestasinya.', '2009-02-02', '09:06:01', 'Y', ''),
(14, 79, 'hakim', 'http://bukulokomedia.com', 'Keberanian ahmadinejad perlu ditiru tuh sama pemimpin-pemimpin negara yang masih bermental pengecut.', '2009-02-02', '10:01:10', 'Y', ''),
(15, 79, 'Aan', 'http://detik.com', 'Ahmadinejad emang idolaku', '2009-02-03', '10:05:20', 'Y', ''),
(17, 74, 'Lukman', 'http://hakim.com', 'Apakah browser google secanggih search enginenya?', '2009-02-21', '10:12:23', 'Y', ''),
(18, 65, 'Suma Wijaya', 'www.everydaylikesunday.co.cc', 'Bagus...\r\nBut their powerless words were in vain\r\nAnd the bombs fell down like acid rain\r\nBut through the tears and the blood and the pain\r\nYou can still hear that voice through the smoky haze', '2009-10-17', '22:25:27', 'Y', ''),
(19, 65, 'Suma Wijaya', 'everydaylikesunday.co.cc', 'But their powerless words were in vain\r\nAnd the bombs fell down like acid rain\r\nBut through the tears and the blood and the pain\r\nYou can still hear that voice through the smoky haze', '2009-10-17', '22:25:56', 'Y', ''),
(20, 76, 'Suma Wijaya', 'everydaylikesunday.co.cc', 'Laskar pelangi memang film yang bagus.\r\nPantas untuk ditonton.', '2009-10-21', '22:15:19', 'Y', ''),
(23, 64, 'Suma Wijaya', 'everydaylikesunday.co.cc', 'Tapi browser Safari katanya gampang juga untuk di`hack...\r\nLebih baik pake Mozilla Firefox aja...\r\nLebih stabil `n Enak dipake...', '2009-10-23', '06:04:26', 'Y', ''),
(24, 60, 'Suma Wijaya', 'everydaylikesunday.co.cc', 'IE gak bisa berkutik...\r\nfungsi menu `n akses koneksi`ny lelet banget....\r\nJelas aja ketinggalan jauh dari Firefox...', '2009-10-23', '06:06:30', 'Y', ''),
(25, 88, 'Suma Wijaya', 'everydaylikesunday.co.cc', 'Wah....\r\nBoleh juga nie tutorial`ny...\r\nLumayan bwat ditaruh di netbook....\r\nBtw, kalo pake program bsa gak yaw???\r\nkayak Daemon gtu...\r\nThank`s pencerahan`ny...\r\nMaju terus ELS...\r\nheheheee....', '2009-10-26', '00:08:16', 'Y', ''),
(26, 74, 'Suma Wijaya', 'everydaylikesunday.co.cc', 'Wah...\r\nBahaya nie...\r\nBisa`2 Microsoft kalah saingan sama Google...\r\nMaklum, IE`ny Microsoft kan lambat banget....', '2009-10-26', '14:39:57', 'Y', ''),
(27, 77, 'Suma Wijaya', 'everydaylikesunday.co.cc', 'Ini dia cew tangguh nama`ny...\r\nUdah cantik, pinter maen tennis lagi....\r\nKereeeennnn.....', '2009-10-26', '16:18:57', 'Y', ''),
(28, 67, 'Suma Wijaya', 'everydaylikesunday.co.cc', 'wah...\r\nKalah nie Maria Sarapova....', '2009-10-26', '16:19:53', 'Y', ''),
(29, 62, 'Suma Wijaya', 'facebook.com', 'epatu Melayang Saat Bush Berpidato di Irak', '2009-10-27', '19:52:01', 'Y', ''),
(30, 87, 'Suma Wijaya', 'everydaylikesunday.co.cc', 'Google takut saingan sama raksasa Microsoft..\r\nMaklum dana`ny google masih dikit....\r\nMaka`ny takut....\r\nkekekekekkkk.....', '2009-10-27', '19:53:36', 'Y', ''),
(31, 86, 'Suma Wijaya', 'everydaylikesunday.co.cc', 'Ada`2 aja si Intel ini...', '2009-10-28', '16:44:24', 'Y', ''),
(32, 16, 'AS', 'SA', 'SA', '2009-10-29', '19:39:35', 'Y', ''),
(33, 5, 'Suma Wijaya', 'everydaylikesunday.co.cc', 'Hello Melody....\r\nBoleh kenalan gak???', '2009-10-29', '19:53:19', 'Y', ''),
(34, 61, 'Suma Wijaya', 'www.everydaylikesunday.co.cc', 'Pantesan aja semua marah, Wong Bush biang kerok`ny...\r\nBush bangsat.....', '2009-11-03', '22:07:56', 'Y', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_artwork`
--

CREATE TABLE IF NOT EXISTS `komentar_artwork` (
  `id_komentar_foto` int(5) NOT NULL AUTO_INCREMENT,
  `id_member` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `id_pengirim` int(5) NOT NULL,
  `foto_pengirim` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ip_pengirim` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_komentar_foto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `komentar_artwork`
--

INSERT INTO `komentar_artwork` (`id_komentar_foto`, `id_member`, `nama_komentar`, `isi_komentar`, `tgl`, `jam_komentar`, `id_pengirim`, `foto_pengirim`, `ip_pengirim`) VALUES
(1, 19, 'imyDcC', 'Okelah kalo begitu....', '2010-01-28', '12:00:26', 19, 'sml_imydcc.jpg', '127.0.0.1'),
(2, 19, 'Gede Lumbung', 'ape ne???\r\nmaan nasi...', '2010-01-28', '12:01:13', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(3, 19, 'imyDcC', 'mann...\r\nalih di dagang nasi ne...', '2010-01-28', '12:02:31', 19, 'sml_imydcc.jpg', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_foto`
--

CREATE TABLE IF NOT EXISTS `komentar_foto` (
  `id_komentar_foto` int(5) NOT NULL AUTO_INCREMENT,
  `id_member` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `id_pengirim` int(5) NOT NULL,
  `foto_pengirim` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ip_pengirim` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_komentar_foto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `komentar_foto`
--

INSERT INTO `komentar_foto` (`id_komentar_foto`, `id_member`, `nama_komentar`, `isi_komentar`, `tgl`, `jam_komentar`, `id_pengirim`, `foto_pengirim`, `ip_pengirim`) VALUES
(1, 30, 'Gede Lumbung', 'Inilah Foto Gede Becing`2 yg sebenarnya....\r\nhwahahahaa.....\r\nwalopun Kritink, yg pentink dueg cank....\r\nhahahahaa.....', '2009-12-08', '18:07:05', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(5, 14, 'Gede Lumbung', 'Woitz....\r\nadi jeg foto cank upload`2 ci`e??\r\nng`fans ci ae ajak cank???\r\njangan terlalu memuji....\r\nhahahahaa.....', '2009-12-08', '19:14:51', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(6, 14, 'MIB (Man In Black)', 'cank nyoba ngupload foto...\r\nkaden cank sink nyak...\r\ntau ne nyak....\r\nnah,, selamet gen...', '2009-12-08', '19:15:58', 14, 'sml_paloed.jpg', '127.0.0.1'),
(7, 30, 'Wayan Edi Gunawan', 'Ae...\r\nGede Becing`2 demen ngelangi k aQuarium....\r\ninget pake pelampung....', '2009-12-08', '23:35:19', 4, 'sml_edigunawan.jpg', '127.0.0.1'),
(8, 4, 'Gede Lumbung', 'Kleng....\r\nupload ci masih foto jadul to nuok...\r\njaman gak enak to...\r\nmengenang masa lalu + nostalgila...\r\nhahahaaa.....', '2009-12-08', '23:57:01', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(9, 30, 'Gede Lumbung', 'Kan cai masih demen k aQuarium....\r\ntapi cai sink bani ngelangi....\r\nmelahang karatan senjata ci`e...\r\nhahahaa.....\r\nCok Lak Lu gon.,...', '2009-12-09', '13:17:01', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(10, 12, 'Gede Lumbung', 'Woi...\r\nFoto ape upload ci to???\r\nPalingan mobil maan nyilih....', '2009-12-09', '13:20:43', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(12, 19, 'Gede Lumbung', 'Resem sajan foto ne upload ci nuok....\r\ngak kreatif....\r\nCok Lak Lu yo...\r\nhahahaha....', '2009-12-14', '17:59:26', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(14, 19, 'imyDcC', 'Nah...\r\nkanggoang mo...\r\nCank nu nyoba to...\r\nkaden cank sink nyak....', '2009-12-14', '18:05:34', 19, 'sml_imydcc.jpg', '127.0.0.1'),
(15, 4, 'Gede Suma Wijaya', 'sink mejeng jeleme....\r\ncare kuluk jeneng ci gon...\r\nmatiang ibe,,,,', '2009-12-14', '22:17:20', 1, 'sml_sumawijaya.jpg', '127.0.0.1'),
(16, 19, 'Gede Lumbung', 'Nah...\r\nNe Luung na`e upload....\r\nbiar gmn gtu...\r\nkekekekekkk....\r\n\r\nBtw, cen no hp cew buleleng sik??/\r\npang taen cank ngelah tunangan nak buleleng...\r\nhahahah.....', '2009-12-15', '22:24:29', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(17, 19, 'imyDcC', 'Nah...\r\nOkelah kalo begitu....\r\nantosin gen...\r\nnyanan pasti kirimin cank...\r\n\r\nTukar masih ajak no cew banyuwangi nah...\r\nhwahahahaa....', '2009-12-15', '22:27:01', 19, 'sml_imydcc.jpg', '127.0.0.1'),
(18, 19, 'Gede Lumbung', 'Okeh...\r\nSaya tukar jg nanti...\r\nHidup Perawan...\r\nwkwkwkwkkk.....', '2009-12-15', '22:28:36', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(19, 20, 'Gede Lumbung', 'Kok masih kosong...\r\nUpload donk foto`2ny...\r\nbiar keren gitu...', '2009-12-15', '23:23:59', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(20, 7, 'Gede Lumbung', 'Woits...\r\nDije maan duren to rik..???\r\nIdih dik neh...\r\nHewhehhe...', '2010-01-09', '23:53:36', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(21, 7, 'Arik Sasmita', 'Kanggoang maan maling to me...\r\nHwahahaa....', '2010-01-09', '23:54:26', 7, 'sml_arik_sasmita.jpg', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_member`
--

CREATE TABLE IF NOT EXISTS `komentar_member` (
  `id_komentar` int(5) NOT NULL AUTO_INCREMENT,
  `id_member` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `id_pengirim` int(5) NOT NULL,
  `foto_pengirim` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ip_pengirim` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=81 ;

--
-- Dumping data for table `komentar_member`
--

INSERT INTO `komentar_member` (`id_komentar`, `id_member`, `nama_komentar`, `isi_komentar`, `tgl`, `jam_komentar`, `id_pengirim`, `foto_pengirim`, `ip_pengirim`) VALUES
(16, 19, 'Wayan Edi Gunawan', 'Woey....\r\nIbi hujan trus nuok....\r\nsink Redha-redha.....\r\naQ lalu meMUJI nama Tuhan....\r\nhahahaa....', '2009-11-02', '16:52:20', 4, 'sml_edigunawan.jpg', ''),
(20, 12, 'imyDcC', 'Woey....\r\nInget Meju....\r\nhahahaa.....', '2009-11-02', '18:23:30', 19, 'sml_imyDcC.jpg', ''),
(15, 1, 'Wayan Edi Gunawan', 'Woey....\r\nAas Becing`2 cai ne......', '2009-11-02', '16:18:38', 4, 'sml_edigunawan.jpg', ''),
(17, 19, 'Gede Suma Wijaya', 'Woey...\r\nEnken kabar di Undiksha???\r\nBe nyak sugih ci????\r\nInget traktir cank mie ayam di tempat ne pidan....', '2009-11-02', '17:00:50', 1, 'sml_sumawijaya.jpg', ''),
(21, 16, 'imyDcC', 'Halo rara...\r\nGimana kabar STM??\r\nterutama Lab MM??\r\nMasih ancur gak...??\r\nhahhahaa....', '2009-11-02', '18:24:25', 19, 'sml_imyDcC.jpg', ''),
(18, 19, 'imyDcC', '@suma : baik`2 gen...\r\ndi banyuwangi kenken???\r\nkonden sugih cank....\r\nOk, pasti traktir cank....\r\n\r\n@gogon : Ech...\r\nSuyasa ci....\r\nhahahahaii...', '2009-11-02', '17:11:26', 19, 'sml_imyDcC.jpg', ''),
(19, 11, 'imyDcC', 'MUsleehhh....\r\nEnken kabar di Gianyar????\r\nnyak Sugih be ci jani???\r\nhehehehheee......', '2009-11-02', '17:18:08', 19, 'sml_imyDcC.jpg', ''),
(22, 15, 'Gede Suma Wijaya', 'Woi Jancuuukkk....\r\nSugih ci jani ae....\r\nkleng,,,sink bagi`2 ci nuok.....', '2009-11-02', '20:17:40', 1, 'sml_sumawijaya.jpg', ''),
(23, 14, 'Mr As Lapendos', 'We...\r\nNu idup ci???\r\nSuji Sehat???', '2009-11-03', '21:41:21', 12, 'sml_asan.jpg', ''),
(24, 14, 'Gede Suma Wijaya', 'Yeh...ada Mr. Paloed di http://www.everydaylikesunday.co.cc .......\r\nenken kabar ci Loed??\r\nPak Suji apakah Sehat???', '2009-11-03', '21:42:39', 1, 'sml_sumawijaya.jpg', ''),
(25, 18, 'Gede Suma Wijaya', 'Wooey jancuuukkkkkkkkkkkkk............\r\nMasih idup qe.......????????', '2009-11-03', '22:10:23', 1, 'sml_sumawijaya.jpg', '127.0.0.1'),
(26, 20, 'Wayan Edi Gunawan', 'Ech.,..\r\nkemaren aQ beli permen GULALI lho...\r\nhahahaa.,....', '2009-11-07', '17:03:41', 4, 'sml_edigunawan.jpg', '127.0.0.1'),
(27, 20, 'Arik Sasmita', 'Halo brow....\r\ngmn kabar`ny...???\r\njadi kuliah dmn????', '2009-11-07', '17:04:44', 7, 'sml_arik_sasmita.jpg', '127.0.0.1'),
(28, 12, 'Gede Suma Wijaya', 'Muditha + Misliyani = Asan.....\r\nMuditha + Misliyani + Asan = DAM Indah', '2009-11-12', '17:50:41', 1, 'sml_sumawijaya.jpg', '127.0.0.1'),
(29, 1, 'Gede Suma Wijaya', 'Ae..\r\nBes Liunan Ngelangi.....\r\nCi aas koplar ci`e...', '2009-11-12', '17:51:28', 1, 'sml_sumawijaya.jpg', '127.0.0.1'),
(30, 17, 'Gede Suma Wijaya', 'Supriyadiiii.....\r\nPiye kabar`e...???\r\nhahahaaa......', '2009-11-13', '11:19:09', 1, 'sml_sumawijaya.jpg', '127.0.0.1'),
(31, 5, 'Gede Suma Wijaya', 'Halo Melody...\r\nKamu cantik banget....\r\nBoleh kenalan gak..????', '2009-11-13', '13:25:06', 1, 'sml_sumawijaya.jpg', '127.0.0.1'),
(32, 4, 'Gede Suma Wijaya', 'Woi Bojoooggg....\r\nCen film Harry Potter ne....???\r\nCai glagat-glagat buung gen....', '2009-11-17', '11:25:47', 1, 'sml_sumawijaya.jpg', '127.0.0.1'),
(33, 4, 'Wayan Edi Gunawan', 'Cank sibuk...\r\ntukar film Harry Potter ne ajak bokep nah...\r\npang adil....', '2009-11-17', '11:28:26', 4, 'sml_edigunawan.jpg', '127.0.0.1'),
(34, 1, 'Wayan Edi Gunawan', 'Woi....\r\nJeneng ci care kuluk me`foto ajak kuluk....\r\nAlah Kuuulllluukkkk,,,,', '2009-11-20', '00:12:13', 4, 'sml_edigunawan.jpg', '127.0.0.1'),
(35, 12, 'Mr As Lapendos', '@koyo : pete gen cai Reda....\r\nNu idup ci????\r\n\r\n@suma : Let`s Dance With Tari.....\r\nhahahahaa.....', '2009-11-29', '09:38:30', 12, 'sml_asan.jpg', '127.0.0.1'),
(36, 30, 'Wayan Edi Gunawan', 'Woi...\r\nAdi upload2 ci foto tunang cank e?\r\nGak kreatif ci nukz...\r\n\r\nPadahal selera ci e sekelas marshanda...\r\nhehe..', '2009-11-29', '13:02:01', 4, 'sml_edigunawan.jpg', '127.0.0.1'),
(37, 11, 'OZ GOMEZ', 'Uyut gen cai kirun....\r\nReda nu idup??\r\nReda = nama goup band..\r\nRedho Rhoma...', '2009-12-08', '18:22:32', 11, 'sml_zie_of_die.jpg', '127.0.0.1'),
(79, 1, 'Gede Lumbung', 'woi,,,,', '2010-04-30', '13:16:21', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(71, 1, 'Gede Suma Wijaya', 'Nah...\r\nTengkyu Gen....\r\nAget nu mejeneng, daripada ci...\r\nSink mejeneng....\r\nBadan Kurus, Kepala Koplar....\r\nkekekekekkk.....', '2009-12-11', '17:37:10', 1, 'sml_sumawijaya.jpg', '127.0.0.1'),
(69, 30, 'Gede Lumbung', 'Jeg uyut gen cai gon....\r\nSink ci ne demen ajak marshanda???\r\n\r\nDemen cai memutarbalikkan fakta ae...\r\nMisi sink ngaku biin ci??', '2009-12-10', '00:10:29', 30, 'sml_de_lumbung.jpg', '127.0.0.1'),
(72, 16, 'Arik Sasmita', 'Ech...\r\nAda Rara join d website ELS....\r\ngmn kbr`ny???\r\nkpn ujian TA`ny???', '2009-12-11', '17:49:14', 7, 'sml_arik_sasmita.jpg', '127.0.0.1'),
(73, 15, 'Terios_MM', 'Beh...\r\nbiase gen...\r\nCen no hp cew sik..??\r\npang nawang cank asane cew banyuwangi alias wong konok.....', '2009-12-11', '22:41:47', 15, 'sml_candra.jpg', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_tutorial`
--

CREATE TABLE IF NOT EXISTS `komentar_tutorial` (
  `id_komentar` int(5) NOT NULL AUTO_INCREMENT,
  `id_berita` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `ip_pengirim` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `komentar_tutorial`
--

INSERT INTO `komentar_tutorial` (`id_komentar`, `id_berita`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`, `ip_pengirim`) VALUES
(1, 1, 'Suma Wijaya', 'everydaylikesunday.co.cc', 'Wah...\r\nLumayan lah....\r\nkalo boleh, langsung kasi source kode`ny yaw...\r\nbiar gampang gtu melajarin`ny...\r\nhehehe....', '2009-12-12', '23:27:48', 'Y', '127.0.0.1'),
(2, 3, 'Gede Lumbung', 'everydaylikesunday.co.cc', 'Efek samping dari overclock motherboard apa yaw??\r\ntakut`ny nantti motherboard`ny berjalan gk normal seperti semula lg....\r\nMohon pencerahan`ny...\r\nhehehe....', '2009-12-15', '22:36:13', 'Y', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `password` char(40) COLLATE latin1_general_ci NOT NULL,
  `nama_member` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `alamat_member` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `email_member` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `agama_member` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hobi_member` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tanggal_lahir` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `password_visible` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `foto_kecil` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `foto_besar` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `musik_member` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `buku_favorit` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `film_favorit` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pekerjaan_member` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tempat_kerja_member` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `about_member` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `status_member` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=47 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `nama_member`, `alamat_member`, `email_member`, `agama_member`, `hobi_member`, `tanggal_lahir`, `password_visible`, `foto_kecil`, `foto_besar`, `musik_member`, `buku_favorit`, `film_favorit`, `pekerjaan_member`, `tempat_kerja_member`, `about_member`, `status_member`) VALUES
(1, 'sumawijaya', 'dce704fd8aa775365f1168c59dc4d9ad', 'Gede Suma Wijaya', 'Renon, Tanjung Bungkak, Denpasar Timur', 'go_blind_32@yahoo.com', 'Hindu', 'Coding PHP, Tidur, Makan, de el el....', '-', 'suma', 'sml_sumawijaya.jpg', 'sumawijaya.jpg', 'Pop, Rock, Metal, Skinhead, Techno...', 'Kamasutra', 'Action, Horor, Komedi, Adventure, Bokep...hihihiiiii...', 'Web Desainer, Flasher, Teknisi', 'Freelancers', 'Wayan Gede Suma Wijaya, atau biasa dipanggil Suma Wijaya. Suma Wijaya adalah seorang freelance web designer dan web programer, dengan skill PHP, CSS, dan HTML.', 'online'),
(5, 'melody', '3eec74195b2a97082e831f855c5d4532', 'Melody Prima', 'Pondok Ibu, Fatmawati, Jakarta Selatan', 'melody_ananda@yahoo.com', 'Hindu', 'Sing, Dance, and Model', '-', '260645', 'sml_melody.jpg', 'melody.jpg', 'AjepZ', 'Novels Drama', 'Harry Potter', '-', '-', 'Hmm .. Tergantung pendapat orang .. Karna cuma orang lain yg bisa menilai kita ....', 'offline'),
(4, 'edigunawan', '3a511a756f8f5dbaf92b0f23ebb26c4d', 'Wayan Edi Gunawan', 'Batubulan, Gianyar', 'lord_lucky13@yahoo.com', 'Hindu', 'Memasak', '-', 'motomoto', 'sml_edigunawan.jpg', 'edigunawan.jpg', 'Kungpow chikens', 'Sink twng', 'Lord of the Rings', '-', '-', 'Asep menyan majagau, nakep lengar aji kau. \r\nBangbang dadua ken cen ceburin, bajang dadua ken anggurin', 'online'),
(6, 'criztha', 'a62d6d2818e6e660e6e9105252ae350e', 'Criztha Lliyani', 'Abiansemal', 'crizthaliyani@ymail.com', 'hindu tulen.....', 'dengerin musik', '-', 'sedang', 'sml_criztha.jpg', 'criztha.jpg', 'pop', 'ga tw tuch....', 'ga da', '-', '-', 'taw ndri lah........', 'offline'),
(7, 'arik_sasmita', 'f762f93016799ddd550d8173dde43afc', 'Arik Sasmita', 'Br. Pempatan Munggu', 'pt_arik_sasmita@yahoo.com', 'Hindu', 'Internetan', '-', '545m1t4', 'sml_arik_sasmita.jpg', 'arik_sasmita.jpg', 'POP, sama ROCK (tp tetep slow...)', 'Harry Potter', 'Sama kayak di atas...', '-', '-', 'Ya, gitu deh pokoknya.....', 'offline'),
(9, 'goes_to', 'fb0b4274829dd53d1545ee667c67d4f9', 'Goes To', 'g andakasa', 'goes_to@yahoo.com', 'Hindu', 'mgutak-atik computer', '-', 'goesto', 'sml_goes_to.jpg', 'goes_to.jpg', 'greenday', 'mencari duit diinternet', 'mr.bean', '-', '-', 'cooming soon', ''),
(10, 'ndacemangad', '938b4263f09b8b1dae8f027d06681ec9', 'nDa CeMangaD "ToRo"', 'mM "MudiNg MekaR"', 'theswetestcandy@yahoo.com', 'isLam', 'BaCa CeRita MaLem...', '-', 'bandung', 'sml_ndacemangad.jpg', 'ndacemangad.jpg', 'R n B', 'HaRRy PotteR', 'HaRRy PotteR', '-', '-', 'nDa itHu.... : CemaNgaD, HiDup, LuChu, Galak, Sexy (Kata oRang), Bayek, Ramah, Rajin Menabung, Tidak Sombong, paLing CenenG aMa FisiKa, aSyik, seRu, MenanTang,', 'offline'),
(11, 'ZIE_of_DIE', '15b94b4d1d997d082020e2480fea162f', 'OZ GOMEZ', 'Jl. Jalan', 'blackoz_id@yahoo.co.id', 'Islam', 'Hang Out', '19 Maret 1991', '190391', 'sml_zie_of_die.jpg', 'zie_of_die.jpg', 'Keroncong', 'The Akuarium in Sanur', 'AADT (Ada Apa Dengan Danau Tempe)', '-', '-', 'Saya Ganteng, Saya Cakep, Saya Tampan', 'offline'),
(12, 'Asan', '25f9e794323b453885f5181f1b624d0b', 'Mr As Lapendos', 'Bali', 'mr.as1991@gmail.com', 'hindu', 'pulez', '-', '123456789', 'sml_asan.jpg', 'asan.jpg', '`Consulttan', 'Kolor ijo', '26', '-', '-', 'ganteng, baik, rajin menabung', 'offline'),
(13, 'agus', 'f6a24dd452d74417b81eb62a95255f27', 'Agus Bombom', 'Jl. Muding Tengah Gang Surya No.2', 'agusbawa2@gmail.com', 'Hindu', 'Mendapat uang satu juta', '-', 'gexlinda', 'sml_agus.jpg', 'agus.jpg', 'sid', 'bali simbar', 'kecurut', '-', '-', '- ganteng - bagus ', 'online'),
(14, 'paloed', 'b920647fdfa96e1d68ded3223351529a', 'MIB (Man In Black)', 'Bali', 'paloed_id@yahoo.com', 'Hindoe', 'Melalung (melah lan Luung)', '-', '144614', 'sml_paloed.jpg', 'paloed.jpg', 'aLLL', 'hikayat', 'sing kene sing keto', '-', '-', 'masih Hidup.....', 'offline'),
(15, 'candra', '2614ae3c375c3095dc536283672548bd', 'Terios_MM', 'Jl. Raya', 'Teriosmm@yahoo.co.id', '100% Hindu', 'Mancing', '-', 'candra', 'sml_candra.jpg', 'candra.jpg', 'semua', '-The secret-', '.::bOkep::.', '-', '-', 'me just me', 'online'),
(16, 'RaRa', 'c1ac6154745672a7811f658db6ecacc9', 'RaRa', 'Jalan sebelah Jalan', 'rara_163@yahoo.com', 'Hindu', 'Denger Lagu, Baca, de eL eL', '-', 'raenta', 'sml_RaRa.jpg', 'RaRa.jpg', 'cmuwa..kecuali dangdut n keroncong!!', 'Psikologi - Novel - Humor', 'Mr. Bean..', '-', '-', 'simple, asiik, ramme..hehhoww', 'online'),
(17, 'ree_a', 'd4388c4d4b47c6655b16fe5b13184b32', 'Maria Ulfah', 'Denpasar', 'chocho_uchiban@yahoo.com', 'Islam', 'Baca', '-', 'doraemon', 'sml_ree_a.jpg', 'ree_a.jpg', 'jazz', 'CAS', 'doraemon', '-', '-', 'hmn......apa yah???he"', 'offline'),
(18, 'Nightkids', '94331dbf112a13618512737d2665162c', 'NightKids', 'Daloenk Rock City', 'nightkids41@yahoo.com', '100% islam', 'nongkrong ma tmen"', '-', 'unnamed16', 'sml_Nightkids.jpg', 'Nightkids.jpg', 'Buuaaanyaaakkk..', 'The Luckiest Man', 'Transformer', '-', '-', 'kecil...item...idup...wakakkakaka', 'offline'),
(19, 'imydcc', '4e0500e5260fbfddec166ce571b71d61', 'imyDcC', 'Kuwum Rock City..pkok ne cang ing pindah uli ditu,...', 'imydcc@yahoo.com free2qbis@yahoo.com', 'hindu dunx..', 'maen,,', '-', 'kuwumanyar', 'sml_imydcc.jpg', 'imydcc.jpg', 'blakanagn nie sneng dngerin RR..ehe', 'cerita malam dunx,education tu...', 'hmN..tw dech...ehe,kyk chika bandung pkok na,,huehehehehe', 'Mahasiswa dunkzz...', '-', 'Saya adalah anak kedua dari pasangan bapak I Made Reda dan Ni Made Muji... lahir dengan selamat pada 3 Mei 1990... ah,,monto gen,... med nux..', 'offline'),
(20, 'aris', 'a94954af501c9bc551512dd53cf4b3aa', 'Ari Sopyan', 'Tabanan', '4ris@yahoo.co.id', 'isLam', 'olahraga dll', '4 April 1990', '040490', 'sml_aris.jpg', 'aris.jpg', 'pop, rock slow', 'mengejar matahari', 'ga tau', '-', '-', 'aku suka lw kamu suka..', 'offline'),
(30, 'de_lumbung', 'a88b71d35a8350e1f7aa1b79d91671c3', 'Gede Lumbung', 'Renon, Denpasar Timur', 'gedesumawijaya@gmail.com', 'Hindu', 'Ng`net Gratis sampe mampus, buat website, buat program', '4 Februari 1991', 'lumbung', 'sml_de_lumbung.jpg', 'de_lumbung.jpg', 'Pop, Rock, Tekno, Slow, Metal', 'Handybook, Cerita Malam', 'Bokep', 'Freelances Web Desainer', 'Dimana-mana tergantung panggilan ( hahahahaa....)', 'Gue Jelek...\r\nDan item..\r\nJarang cewek yg mau sama gue....\r\nTapi gue orangnya pinter...\r\nYaw gtu deh....', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `noti`
--

CREATE TABLE IF NOT EXISTS `noti` (
  `id_notifications` int(5) NOT NULL AUTO_INCREMENT,
  `id_member_milik` int(5) NOT NULL,
  `id_member_terkait` int(5) NOT NULL,
  `notifications` text COLLATE latin1_general_ci NOT NULL,
  `id_pengirim` int(5) NOT NULL,
  `nama_pengirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` char(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_notifications`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=119 ;

--
-- Dumping data for table `noti`
--

INSERT INTO `noti` (`id_notifications`, `id_member_milik`, `id_member_terkait`, `notifications`, `id_pengirim`, `nama_pengirim`, `status`) VALUES
(13, 15, 15, '<a href=member-everydaylikesunday-200915-9002.html>Terios_MM</a> mengomentari profil <a href=member-everydaylikesunday-200915-9002.html#komentar>Member ini</a>', 15, 'Terios_MM', 'not'),
(74, 1, 4, '<a href=member-everydaylikesunday-200919-9002.html>imyDcC</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 19, 'imyDcC', 'not'),
(71, 1, 4, '<a href=member-everydaylikesunday-200919-9002.html>imyDcC</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 19, 'imyDcC', 'not'),
(69, 1, 4, '<a href=member-everydaylikesunday-200919-9002.html>imyDcC</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 19, 'imyDcC', 'not'),
(66, 1, 4, '<a href=member-everydaylikesunday-200919-9002.html>imyDcC</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 19, 'imyDcC', 'not'),
(64, 1, 4, '<a href=member-everydaylikesunday-200919-9002.html>imyDcC</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 19, 'imyDcC', 'not'),
(117, 1, 4, '<a href=member-everydaylikesunday-20091-9002.html>Gede Suma Wijaya</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 1, 'Gede Suma Wijaya', 'not'),
(76, 1, 4, '<a href=member-everydaylikesunday-200919-9002.html>imyDcC</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 19, 'imyDcC', 'not'),
(79, 1, 4, '<a href=member-everydaylikesunday-200919-9002.html>imyDcC</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 19, 'imyDcC', 'not'),
(116, 1, 4, '<a href=member-everydaylikesunday-20091-9002.html>Gede Suma Wijaya</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 1, 'Gede Suma Wijaya', 'not'),
(81, 1, 4, '<a href=member-everydaylikesunday-200919-9002.html>imyDcC</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 19, 'imyDcC', 'not'),
(113, 1, 4, '<a href=member-everydaylikesunday-200930-9002.html>Gede Lumbung</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 30, 'Gede Lumbung', 'not'),
(85, 30, 4, '<a href=member-everydaylikesunday-200919-9002.html>imyDcC</a>  mengomentari koleksi foto <a href=koleksi-foto-member-30.html>Member ini</a>', 19, 'imyDcC', 'not'),
(110, 1, 1, '<a href=member-everydaylikesunday-200930-9002.html>Gede Lumbung</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 30, 'Gede Lumbung', 'not'),
(111, 1, 4, '<a href=member-everydaylikesunday-200930-9002.html>Gede Lumbung</a> mengomentari profil <a href=member-everydaylikesunday-20091-9002.html#komentar>Member ini</a>', 30, 'Gede Lumbung', 'not');

-- --------------------------------------------------------

--
-- Table structure for table `page_counter`
--

CREATE TABLE IF NOT EXISTS `page_counter` (
  `id_counter` int(5) NOT NULL AUTO_INCREMENT,
  `counter` int(10) NOT NULL,
  PRIMARY KEY (`id_counter`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `page_counter`
--

INSERT INTO `page_counter` (`id_counter`, `counter`) VALUES
(1, 448);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_polling`
--

CREATE TABLE IF NOT EXISTS `pertanyaan_polling` (
  `id_pertanyaan` int(5) NOT NULL AUTO_INCREMENT,
  `pertanyaan_polling` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_pertanyaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pertanyaan_polling`
--

INSERT INTO `pertanyaan_polling` (`id_pertanyaan`, `pertanyaan_polling`, `aktif`) VALUES
(1, 'Apakah Browser Favorit dan Unggulan Anda?', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `poling`
--

CREATE TABLE IF NOT EXISTS `poling` (
  `id_poling` int(5) NOT NULL AUTO_INCREMENT,
  `pilihan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `rating` int(5) NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_poling`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `poling`
--

INSERT INTO `poling` (`id_poling`, `pilihan`, `rating`, `aktif`) VALUES
(1, 'Internet Explorer', 18, 'Y'),
(2, 'Mozilla Firefox', 76, 'Y'),
(3, 'Google Chrome', 19, 'Y'),
(4, 'Opera', 21, 'Y'),
(7, 'Safari', 17, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int(5) NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`, `tag_seo`, `count`) VALUES
(1, 'Palestina', 'palestina', 4),
(2, 'Gaza', 'gaza', 4),
(9, 'Tenis', 'tenis', 5),
(10, 'Sepakbola', 'sepakbola', 2),
(8, 'Laskar Pelangi', 'laskar-pelangi', 2),
(11, 'Amerika', 'amerika', 9),
(12, 'George Bush', 'george-bush', 2),
(13, 'Browser', 'browser', 6),
(14, 'Google', 'google', 2),
(15, 'Israel', 'israel', 4),
(16, 'Microsoft Windows', 'microsoft-windows', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topik_forum`
--

CREATE TABLE IF NOT EXISTS `topik_forum` (
  `id_topik` int(5) NOT NULL AUTO_INCREMENT,
  `id_member` int(5) NOT NULL,
  `judul_topik` varchar(75) COLLATE latin1_general_ci NOT NULL,
  `pengirim` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `foto_pengirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_topik`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `topik_forum`
--

INSERT INTO `topik_forum` (`id_topik`, `id_member`, `judul_topik`, `pengirim`, `foto_pengirim`, `jam`, `tanggal`) VALUES
(1, 1, 'Everyday Like Sunday siap Launching', 'Suma Wijaya', 'sml_sumawijaya.jpg', '00:00:00', '2009-04-05'),
(2, 1, 'Kerja dulu, baru gelar.......', 'Suma Wijaya', 'sml_sumawijaya.jpg', '00:00:00', '2009-04-05'),
(3, 2, 'Enaknya kuliah dimana yaw???', 'Edi Gunawan', 'sml_edigunawan.jpg', '01:43:49', '2009-04-07'),
(7, 1, 'Forum sebagai media sharing dan berbagi', 'Gede Suma Wijaya', 'sml_sumawijaya.jpg', '08:00:54', '2009-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `topik_post`
--

CREATE TABLE IF NOT EXISTS `topik_post` (
  `id_post` int(5) NOT NULL AUTO_INCREMENT,
  `id_topik` int(5) NOT NULL,
  `id_member` int(5) NOT NULL,
  `posting` tinytext COLLATE latin1_general_ci NOT NULL,
  `pengirim_posting` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `foto_pengirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jam_posting` time NOT NULL,
  `tanggal_posting` date NOT NULL,
  `ip_pengirim` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `status` char(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `topik_post`
--

INSERT INTO `topik_post` (`id_post`, `id_topik`, `id_member`, `posting`, `pengirim_posting`, `foto_pengirim`, `jam_posting`, `tanggal_posting`, `ip_pengirim`, `status`) VALUES
(1, 1, 1, 'Setelah berhasil senang mendapatkan eeePC versi linux saya jadi. Setelah berhasil senang mendapatkan eeePC versi linux saya jadi. Setelah berhasil senang mendapatkan eeePC versi linux saya jadi.', 'Suma Wijaya', 'sml_sumawijaya.jpg', '00:00:00', '0000-00-00', '', 'thread'),
(42, 7, 30, 'Saya juga minta...\r\ntoloong dikirimkan juga yaw....\r\nkanggoang be lewat email...\r\ntapi yg cantik yaw...\r\nhehehe....', 'Gede Lumbung', 'sml_de_lumbung.jpg', '22:19:11', '2009-12-14', '127.0.0.1', ''),
(34, 7, 4, 'Nah....\r\nuyut gen cai....\r\nBaank cank sik cew jawe....\r\nkirimin cank no hape ne sik....\r\nbecing`2 mu mengekspresikan diriku....', 'Wayan Edi Gunawan', 'sml_edigunawan.jpg', '17:03:11', '2009-11-22', '127.0.0.1', ''),
(33, 7, 1, 'Forum sebagai media sharing dan berbagi, kini telah hadir di website ini. Keluarkan semua masalahmu disini, siapa tau teman yang lainnya bisa membantu. Gak usah malu, ragu, ataupun takut karena kita adalah satu kesatuan yang utuh dan kompak :D. Dengan mem', 'Gede Suma Wijaya', 'sml_sumawijaya.jpg', '08:00:54', '2009-11-20', '', 'thread'),
(16, 3, 2, 'Teman-teman bantu aku donk, untuk ngasik saran untuk kuliah dimana. aku bingung nie maw kuliah dimana. duit gak punya, biaya kuliah mahal, kepalaku tambah koplar nuokz......\r\n\r\nhe..he..he..:D\r\n\r\nbantu aku yaw teman-teman.....', 'Edi Gunawan', 'sml_edigunawan.jpg', '01:43:49', '2009-04-07', '', 'thread'),
(29, 1, 4, 'Silih Jep neh....\r\nPang Taen cank nawang ape ane madan Linux....', 'Wayan Edi Gunawan', 'sml_edigunawan.jpg', '18:32:05', '2009-11-17', '127.0.0.1', ''),
(12, 2, 1, 'Dengan memilih Bali sebagai fokus utama, tidak berarti kami melupakan daerah lainnya di Indonesia. Ka', 'Suma Wijaya', 'sml_sumawijaya.jpg', '14:03:59', '2009-04-06', '', 'thread'),
(28, 3, 1, 'Sebeng gen ci misi kuliah,,,,\r\nSampi Jumah kanggoang pecil,.,,\r\nsink keto, jumah cank kanggoang dadi pembantu...\r\nhahahaaa....\r\npang sink enggal lengar cai....', 'Gede Suma Wijaya', 'sml_sumawijaya.jpg', '12:28:02', '2009-11-17', '127.0.0.1', ''),
(41, 7, 1, 'Nah...\r\nSante gen...\r\nTunggu tanggal main`ny....\r\nNantikan gede becing`2 beraksi dengan rayuan maut`ny...\r\nHwahahahaa.....', 'Gede Suma Wijaya', 'sml_sumawijaya.jpg', '22:13:16', '2009-12-14', '127.0.0.1', ''),
(43, 2, 30, 'Okelah Kalo Begitu...\r\nHwahahaha....', 'Gede Lumbung', 'sml_de_lumbung.jpg', '22:37:41', '2009-12-14', '127.0.0.1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial_trik`
--

CREATE TABLE IF NOT EXISTS `tutorial_trik` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_berita` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tutorial_trik`
--

INSERT INTO `tutorial_trik` (`id_berita`, `judul`, `judul_seo`, `isi_berita`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(1, 'Membuat Hit Counter Dengan PHP', 'membuat-hit-counter-dengan-php', 'Pada artikel kali ini, aku akan men-share sedikit script PHP untuk membuat counter sederhana seperti yang terdapat di bagian footer website ini. Bagi kamu yang udah ngerasa expert, sebaiknya berhenti membaca sekarang juga, karna dari judulnya, kamu seharusnya tau bahwa kita cuma mo bikin counter simple. Cara kerja counter ini kurang lebih kayak gini: halaman utama dibuka->input ke database->Output berupa jumlah records dari table yang dijadikan counter. OK, lets do this... \r\n\r\nPertama, buatlah table dengan nama counter pada database MySQL kamu dengan field sebagai berikut: \r\n\r\nip\r\nuser_agent\r\ntanggal\r\n\r\nSekarang, tambahkan script berikut pada halaman utama website kamu. Ingat, tempatkan script ini di bagian paling atas sebelum tag\r\n\r\n<blockquote>\r\n$ip=getenv(remote_addr);\r\n$date=getdate(date("U"));\r\n$day=$date[mday];\r\n$month=$date[month];\r\n$year=$date[year];\r\n\r\nif (!isset($_COOKIE["visitor"]))\r\n{\r\nsetcookie("visitor", "$ip", time() +3600);\r\nmysql_connect("localhost", "user", "password"); //sesuaikan host, user, dan password-nya !\r\nmysql_select_db("nama_db") or die(mysql_error()); //sesuaikan nama database-nya\r\n\r\nmysql_query("INSERT INTO counter(ip, user_agent, tanggal) VALUES(''$ip'', ''$_SERVER[HTTP_USER_AGENT]'', ''$day/$month/$year'')");\r\n}\r\n</font>\r\n</blockquote>\r\n\r\nPada code di atas, saat pertama kalo diakses halaman website kita akan membuat cookies dengan nama visitor yang isinya IP address dari visitor kita. Kalo cookies belom diset, maka record table Counter akan ditambah satu.\r\nUntuk mendapatkan jumlah pengunjung, kita tinggal menghitung berapa jumlah records dari table Counter, gunakan code berikut:\r\n\r\n<blockquote>\r\n$qhit=mysql_query("SELECT * FROM counter");\r\n$hit=mysql_num_rows($qhit);\r\n\r\necho "\r\n\r\nKamu adalah pengunjung ke: $hit\r\n";\r\n</blockquote>\r\nSekarang, kamu tinggal meletakkan code di atas untuk menampilkan berapa jumlah pengunjung website kamu.\r\n\r\nSemoga bermanfaat dan mohon dimaafkan kalo ada kesalahan.', '2009-12-12', '14:29:16', 'php-logo.jpg', 32, 'tutorial-php'),
(2, 'Membuat Pilihan Tanggal Dengan Combo Box Pada PHP ', 'membuat-pilihan-tanggal-dengan-combo-box-pada-php', 'Biasanya ketika kita membuat suatu web, pastinya terdapat unsur taanggal bukan? Nah, disini saya akan menuliskan bagaimana cara membuatnya dengan bahasa PHP. Salah satu cara untuk memilih tanggal adalah menggunakan ComboBox. Tujuan dengan menggunakan ComboBox adalah untuk mempermudah user dalam memilih pilihan yang sudah disediakan.\r\nHal ini juga menghindari kesalahan user dalam penulisan suatu format tanggal yang telah disediakan. Untuk lebih jelasnya, lihat pelajari dan coba script berikut ini:\r\n\r\n//array yang digunakan pada ComboBox bulan\r\n$bln=array(1=>"Januari","Februari","Maret","April","Mei",\r\n"Juni","July","Agustus","September","Oktober",\r\n"November","Desember");\r\n\r\n//membuat tanggal 1-31 pada ComboBox\r\necho "Tanggal:<select name=tanggal>\r\n<option value=01 selected>01</option>";\r\nfor($tgl=2; $tgl<=31; $tgl++){\r\n$tgl_leng=strlen($tgl);\r\nif ($tgl_leng==1)\r\n$i="0".$tgl;\r\nelse\r\n$i=$tgl;\r\necho "<option value=$i>$i</option>";}\r\necho "</select>";\r\n\r\n//membuat bulan ComboBox\r\necho "<select name=bulan>\r\n<option value=Januari selected>Januari</option>";\r\nfor($bulan=2; $bulan<=12; $bulan++){\r\necho "<option value=$bulan>$bln[$bulan]</option>";}\r\necho "</select>";\r\n\r\n//Membuat tahun 1900 sampai sekarang pada ComboBox\r\n$now=date("Y");\r\necho "<select name=tahun>\r\n<option value=1900 selected>1900</option>";\r\nfor($thn=1901; $thn<=$now; $thn++){\r\necho "<option value=$thn>$thn</option>";}\r\necho "</select>";\r\n\r\n', '2009-12-13', '14:29:16', 'php-logo.jpg', 24, 'tutorial-php'),
(3, 'Mempercepat Dan Mengoptimalkan Proses Komputer Kita', 'mempercepat-dan-mengoptimalkan-proses-komputer-kita', 'Tidak ada salahnya menggunakan komputer apa adanya. Tentu saja, ada risikonya. Misalnya, komputer kian hari kian lambat. Padahal perawatan sudah dijalankan. Baik meng-update driver, menghapus file sampah, dan beragam perawatan rutin lain.Atau mungkin komputer berjalan stabil, namun suara yang ditimbulkannya sangat mengganggu. Masalah burn CD kadang juga membuat jengkel. Apalagi misalnya, CD tersebut hendak digunakan pada audio di mobil.Sebel memang jika PC tidak menuruti kemauan kita sebagai pemiliknya. Semua masalah yang mungkin timbul seperti di atas disebabkan PC yang liar. Seperti kuda dari padang rumput, sebelum digunakan harus dijinakkan terlebih dahulu. Agar kita terhindar dari ketidaknyamanan menungganginya.Berikut ini akan dijelaskan bagaimana cara menanggulangi berbagai permasalahan saat menggunakan PC, baik di rumah maupun di tempat kerja. Kami juga menambahkan cara penyelamatan data e-mail. Selamat mencoba!.\r\n<font color="red"><b>\r\n1. Percepat Booting dan Ringankan beban CPU</font>\r\n</b>Seiring dengan waktu, lama kelamaan PC terasa makin lambat dan ‘berat’. Apa saja yang dapat dilakukan untuk menanggulanginya?\r\nLangkah pertama mempercepat boot via BIOS. Untuk keterangan selengkapnya, Anda dapat melihatnya pada “Menguak Tabir BIOS” di PC Media 04/2004 yang lalu.• Selanjutnya mulai ke area operating system. Untuk Windows XP, mulai dengan membuka System Configuration Utility. Pada tab BOOT.INI, beri tanda (P) pada “/NOGUIBOOT”. Ini akan mempersingkat waktu boot dengan menghilangkan Windows startup screen. Pada tab Startup, seleksi ulang seminimal mungkin item yang sangat dibutuhkan. Hal yang sama juga dilakukan pada service yang dijalankan. Usahakan jumlah service yang ter-load tidak lebih dari 25.\r\n\r\n• Windows XP memang tampak begitu memukau pada tampilannya. Jika kebutuhan utama Anda adalah kecepatan dan bukan keindahan, setting ulang interface ini dapat menambah kecepatan. Masuk ke System Properties, pilih tab Advanced. Setting ulang pada pilihan Performance. Kemudian pilih “Adjust for Best Performance” pada tab Visual Effects.• Menghilangkan wallpaper dan minimalisasi jumlah desktop icon juga dapat mempercepat PC Anda. Kurangi jumlah desktop icon sampai maksimal lima buah.• Menghilangkan bunyi pada event Start Windows juga akan mempercepat proses boot. Mau lebih cepat lagi? Pilih “No Sounds” pada sound scheme.\r\n\r\n• Berapa jumlah font yang terinstal pada Windows Anda? Makin banyak jumlah font yang terinstal akan menambah berat beban kerja PC Anda. Windows secara default menyertakan sejumlah kurang dari 100 font. Usahakan jumlah font yang terinstal pada kisaran 150 font.\r\n\r\n• Anda rajin meng-update driver? Bagus. Namun tahukah Anda, file-file yang digunakan driver lama Anda dapat memperlambat PC. Cara paling mudah menggunakan utility tambahan seperti Driver Cleaner. Utility ini membersihkan driver nVidia dan ATI terdahulu. Driver Cleaner 3.0, juga dapat membersihkan driver lama beberapa chipset motherboard, sound card, dan lain-lain.\r\n<font color="red"><b>\r\n2. Overclock\r\n</b></font>Ini bagian yang paling menarik. Pada bagian ini kami akan memandu overclocking, dengan mengandalkan beberapa software yang bisa di-download gratis dari internet.\r\n\r\nOverclock Video Card\r\nOverclocking pada video card, relatif mudah apalagi dengan Powerstrip.\r\n\r\n• Anda bisa menggunakan Powerstrip dengan men-download dari www.entechtaiwan.net.\r\n\r\n• Atur konfigurasi dari Performace profile, dengan klik kanan di tray icon.\r\n\r\n• Anda akan melihat dua buah vertical slider. Slider kiri, control untuk core speed video card. Slider kanan merupakan control dari kecepatan memory video card.\r\n\r\n• Tambahkan core speed video card secara bertahap (maksimal 2 Mhz). Lakukan tes stabilitas dengan memainkan game 3D atau menjalankan benchmark. Ulangi hal tersebut sampai core speed maksimal dari video card. Lakukan hal yang sama untuk memory clock. Kini Anda bisa menikmati frame rates baru yang lebih cepat secara gratis.\r\n\r\nOverclock Motheboard\r\nUntuk melakukan overclock terhadap motherboard sedikit berbeda. Anda harus menyesuaikan aplikasi sesuai dengan chipset motherboard. Di sini kami mengambil contoh overclocking dua buah motherboard. Pertama adalah motherboard dengan chipset nForce2.\r\n\r\nUntuk motherboard dengan chipset nVidia, Anda bisa memanfaatkan aplikasi NV system utilities dari www.nvidia.com.\r\n\r\nPada aplikasi ini, tinggal menggeser slider kearah kanan pada bagian Bus speeds. Ini akan menyesuaikan clock FSB juga memory bus. Untuk AGP bus, tersedia pada slider yang terpisah.\r\n\r\nTersedia juga setting untuk memory control timing. Setting memory yang lebih agresif akan menguntungkan untuk sistem AMD.\r\n\r\n• Sama seperti pada video card, Anda harus menambahkan secara bertahap FSB dan AGP bus. Jalankan tes stabilitas. Setelah selesai, Anda bisa mengakhiri dengan mengklik tombol (OK). Catatan: ketika OC yang Anda lakukan tidak sesuai, maka komputer akan otomatis hang dan terpaksa me-restart komputer.\r\n• Motherboard kedua adalah Intel D875PBZ. Menggunakan Intel Desktop Control Center, sayangnya utiliti ini hanya berjalan pada motherboard keluaran Intel.\r\n\r\n• Untuk melakukan OC, Anda bisa melakukannya dengan otomatis.\r\n\r\n• Bisa juga secara manual. Pada menu Tune yang terdapat di bagian atas, pilih option Burn-in, enable burn-in mode.\r\n\r\n• Terdapat Host I/O mode dan AGP/PCI mode. Pada Host I/O mode, OC dilakukan berdasarkan persentase hingga 4 %. Sedangkan pada AGP/PCI mode, menaikkan bus clock AGP yang otomatis akan meningkatkan clock PCI.\r\n\r\n• Setelah melakukan penambahan, Anda bisa mengukur stabilitas. Dengan melakukan stress-it pada bagian kiri bawah aplikasi yang bertanda centang.\r\n<font color="red"><b>\r\n3. Upgrade Processor\r\n</b></font>Sebelum membeli sebuah processor baru, pastikan bahwa motherboard yang Anda miliki mampu mendukung calon processor baru Anda (lihat tabel “Chipset dan Processor Support”). Selain itu, pastikan juga maksimum FSB untuk processor yang mampu didukung motherboard Anda. Hal ini juga berhubungan banyak dengan chipset yang digunakan pada motherboard Anda.\r\n\r\nSebagai contoh untuk processor Intel. Chipset Intel seri 845 hanya memiliki bus maksimal 533 MHz. Berbeda dengan chipset Intel 848 ataupun 875P yang sudah mampu bekerja dengan processor dengan bus 800 MHz.\r\n\r\nHal ini juga berlaku untuk processor AMD. Seperti VIA KT400 yang belum bisa bekerja dengan bus processor 400 MHz. Berbeda dengan KT600 yang sudah mampu bekerja pada bus processor 400 MHz.\r\n\r\nAda baiknya juga untuk memastikan produsen motherboard yang Anda gunakan menyediakan update BIOS pada situsnya. Terutama update BIOS untuk kecepatan processor yang terbaru. Update BIOS diperlukan sekiranya BIOS lama motherboard Anda belum mendukung (biasanya) multiplier processor terbaru.', '2009-12-14', '14:29:16', 'hardware-logo.jpg', 18, 'hardware'),
(4, 'Membuat Script Program Posting ke Twitter dengan PHP', 'membuat-script-program-posting-ke-twitter-dengan-php', 'Kamu punya account di Twitter dan kebetulan seorang programming? Anda baca di artikel yang tepat. Sebenarnya walaupun kamu bukan seorang programmer pun, kamu pasti akan mengerti beberapa potong baris kode PHP ini karena sangat mudah dimengerti dan diterapkan.\r\n\r\nSyarat untuk menjalankan program ini hanya cukup mempunyai satu server, baik server gratisan maupun server milik pribadi ataupun localhost asalkan ada Apache / IIS. Di bawah ini, saya akan berikan script php program untuk memposting / mengupdate aktivitas anda ke Twitter dengan PHP, gantikan saja username dan password serta message sesuai dengan apa yang kamu kehendaki:\r\n<blockquote>\r\n    <?\r\n\r\n    $username = ‘username‘;\r\n    $password = ‘password‘;\r\n\r\n    $message = ‘Belajar posting TWITTER menggunakan PHP, kunjungi http://www.everydaylikesunday.co.cc‘;\r\n\r\n    $url = ‘http://twitter.com/statuses/update.xml’;\r\n\r\n    $curl_handle = curl_init();\r\n    curl_setopt($curl_handle, CURLOPT_URL, “$url”);\r\n    curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);\r\n    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);\r\n    curl_setopt($curl_handle, CURLOPT_POST, 1);\r\n    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, “status=$message”);\r\n    curl_setopt($curl_handle, CURLOPT_USERPWD, “$username:$password”);\r\n    $buffer = curl_exec($curl_handle);\r\n    curl_close($curl_handle);\r\n    // check for success or failure\r\n    if (empty($buffer)) {\r\n    echo ‘message’;\r\n    } else {\r\n    echo ’success’;\r\n    }\r\n    ?>\r\n</blockquote>\r\nJika program ini berhasil dijalankan, maka postingan anda akan tampil di timeline Twitter kamu dan akan muncul pesan success, dan jika gagal, akan muncul pesan kesalahan. Hati-hati jika kamu mengcopy baris program php ini, terutama pada bagian quote (”). Jika ingin copy paste kode php ini, setelah kamu copy, periksa tanda tersebut, biasanya akan muncul kesalahan, jadi lebih baik untuk ketik ulang sesuai dengan baris diatas. Silahkan coba dijalankan atau dimodifikasi sehingga program ini akan lebih fleksibel dan mudah dipakai. Cara ini akan membuka wawasanmu betapa mudahnya bikin program untuk akses ke Twitter karena Twitter memang menyediakan API yang memudahkan user untuk melakukan login ke account secara gampang.', '2009-12-24', '14:29:16', 'php-logo.jpg', 47, 'tutorial-php');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `vis_ip` int(10) NOT NULL DEFAULT '0',
  `vis_time` int(10) NOT NULL DEFAULT '0',
  KEY `vis_time` (`vis_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`vis_ip`, `vis_time`) VALUES
(2130706433, 1273114797),
(0, 1285079614),
(0, 1285080047),
(0, 1285080075),
(0, 1285080077),
(0, 1285080077),
(0, 1285080078),
(0, 1285080085),
(0, 1285080106),
(0, 1285080126),
(0, 1285080202),
(0, 1285080206),
(0, 1285080210),
(0, 1285080226),
(0, 1285080231),
(0, 1285080241),
(0, 1285080243),
(0, 1285080245),
(0, 1285080256),
(0, 1285080259),
(0, 1285080259),
(0, 1285080263),
(0, 1285080560),
(0, 1285080560),
(0, 1285080565),
(0, 1285080565),
(0, 1285080811),
(0, 1285080825),
(0, 1285080827),
(0, 1285080832),
(0, 1285080835),
(0, 1285080837),
(0, 1285080839),
(0, 1285080847),
(0, 1285080850),
(0, 1285080860),
(0, 1285080935),
(0, 1285080942),
(0, 1285081129),
(0, 1285081138),
(0, 1285081144),
(0, 1285081144),
(0, 1302804476),
(0, 1302804488),
(0, 1302804510),
(0, 1302804529),
(0, 1302804532),
(0, 1302804533),
(0, 1302804544),
(0, 1302804603),
(0, 1302804637),
(0, 1302804651),
(0, 1302804658),
(0, 1302804715),
(0, 1302804740),
(0, 1302804747),
(0, 1302804762),
(0, 1302804777),
(0, 1302804794),
(0, 1302804797);
