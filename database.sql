-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 06:57 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `last_post_date` datetime DEFAULT NULL,
  `last_user_posted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_description`, `last_post_date`, `last_user_posted`) VALUES
(1, 'General', 'General purpose', '2017-12-30 02:07:34', 1),
(2, 'Windows', 'All About windows', '2017-11-29 02:30:46', 395),
(3, 'Microsoft Office', 'office', '2017-12-14 08:43:42', 1),
(5, 'Html', 'htm', '2016-04-14 04:03:05', 95),
(6, 'Css', 'css', '2016-02-17 09:17:08', 4),
(7, 'Php', 'php', '2017-07-15 01:47:30', 1),
(8, 'Sql/Mysql', 'Sql', '2016-03-31 01:44:19', 36),
(9, 'Photoshop', 'photoshop', '2017-11-28 08:46:40', 339),
(10, 'Vb.net', 'Vb', '2016-04-07 04:47:10', 30),
(11, 'Netwoking', 'Netwoking', '2016-04-14 02:47:02', 93),
(12, 'Accounting', 'Accounting', '2016-05-12 01:10:23', 36),
(13, 'Social network', 'Social network', '2016-03-28 03:33:43', 48),
(15, 'Joomla', 'Joomla', NULL, NULL),
(16, 'Wordpress', 'Wordpress', '2018-02-04 00:42:46', 1),
(17, 'ASP', 'ASP', NULL, NULL),
(18, 'C++', 'C++', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES
(1, 7, 1, 2, 'Waxaan rabaa in laiga caaiyo function isoo saaraysa taariikhda maanta \r\nAnoo isticmaalaya luuqada php.', '2016-05-20 06:48:52'),
(2, 7, 1, 1, 'walaal waxad isticmaalaysaa functionkaan  date(&quot;Y-m-d H:i:s&quot;);  ', '2016-05-28 23:32:44'),
(3, 7, 2, 2, 'Asc waxaan rabaa in layga caawiyo function soo saaraysaa qoraalkayga \r\nsii akhri.... sida websiteyada markaa inta hore akhrisid inta danbe ay ku dhahayaan sii akhri(readmore....).', '2016-05-28 23:49:27'),
(4, 7, 2, 1, 'Wcs wll aad baa u mahadsan tahay waxaad isticmalaysaaa \r\nphp functiontaaan \r\nsubstr ($string , $start ,$length ] );', '2016-06-10 10:25:47'),
(5, 2, 3, 12, 'Asc Dhamaan Bahda Somcoders waxan rabaa in layga caawiyo Sida ugu\r\nhaboon ee aan u kala jebin karo HDD una samaysan karo D:', '2016-09-07 02:01:26'),
(6, 2, 3, 1, 'Wll Daawo Videogan\r\nhttps://www.youtube.com/watch?v=rTByISaoy-c', '2016-09-27 07:38:41'),
(7, 7, 4, 17, 'ASC \r\nwaxaan la rabaa in layga caawiyo qaabka aan web application aan ku dhisey php ugu samayn lahaa cache , si webku u fududaado. waayo application ka aan sameeyey waxa uu ku xidhan yahay database waxaan doonayo inuu serverka dhow ka soo akhriyo markaa systemkaas cashar amaba casharo inaad inooga diyaarisaan amaba aad i tilmaantaan ayaan u baahanahay \r\nwaad mahadsantihiin webkan  waaan la dhacay', '2016-10-14 04:31:15'),
(8, 7, 4, 1, 'Mohamed aad baa u mahadsan tahay \r\nCachingka waa kala duwan yhy waxay ku xidhan tahay qaabka aad doonaysid in ay wax uso baxaan\r\nMarkaaa insha Allah muuqaal ayaan kasoo samayn doonaa bro\r\nwada shaqayn wacan masuul.', '2016-10-15 06:17:01'),
(9, 7, 5, 18, 'Marka Hore Aad baan kuu salaamay Runtiina  aad baan ugu farxay horomarka aad halkan ka sameeyasay macalin daadaalkaana ilaahay hakaa abaalmariyo intaa ka dib waxaan kaa codsanlahaa  dadka ama ardayda badankoodu  Waxaa laga yaabaa in fikir guud ka haystaan php lkn how to create  full project  qaabaysan  aad bay u yartahay inta  fahamsan  markaa waxaan kaa codsan lahaa inaad noo samayso  project bilow ah Sida School Management system   Ama Sales Management system iwm  By Step by Step  Runtii  Waxaan qabaa  dadbadani way ka faaidsanlahayeen \n\nthanks \n', '2016-10-26 05:02:56'),
(10, 7, 5, 1, 'Wcs wr wb  aad baan kaaga qaadney walaal ,waa fikir aad u wanaagsan oo lagu hormarin karo bulshada iyo ardayda \r\nwaxan ka cudur daaranayaa inaan si habsan ah uga soo jawaabney fikirkaaga ,Insha Allah waanu wadnaa wayna nagu jirtaa inaanu soo samayno casharo project u badan sanadkan 2017 .\r\nMahadsanid mar 2aad .', '2016-11-26 05:32:24'),
(11, 7, 6, 72, 'waxaan idinka codsanaa inaad noo dhameystirtaan online projects-ka ee aad dhahdeen wxaan soo deyn doonaa 2017, aad ayd umahadsantihiin insha allah', '2017-02-04 01:05:03'),
(12, 7, 6, 1, 'Walaal Mahadsanid Insha Allah waxan soo gelin doonaa casharo kusaabsan online exam.\r\n', '2017-03-31 04:33:26'),
(13, 7, 1, 1, '&lt;code&gt; date&lt;/code&gt;', '2017-05-13 04:29:33'),
(14, 1, 7, 93, 'gmail ayaa cilad igahay download ka buu didayaa \r\nYou need permission\r\n\r\nWant in? Ask for access, or switch to an account with permission. ', '2017-05-15 01:51:17'),
(15, 7, 8, 93, 'waxan rabaa inad iga cawisan sidan usameny lahaa post form kakoban qoral ,image button video button font format , mahad sanidin', '2017-05-17 11:50:44'),
(16, 7, 8, 1, 'Walaal Marka hore Textarea ayaa sameyneysaan kedibna waxad siineysaan ID kedib ayaa java script codekan xaga hoose ee pagekaasi ku dhamaado ku sameyneysaan .\n<pre><code>\ntextarea name=\"content\"; id=\"area\"; rows=\"7\" cols=\"65\" maxlength=\"1000\" class=\"form-control\" </textarea>\n\n</code></pre>', '2017-05-17 13:33:58'),
(17, 7, 8, 1, 'Tusaalahan fiiri google chrome ku dhici \r\nhttps://www.sendspace.com/file/no7mi2', '2017-05-17 13:53:13'),
(18, 7, 8, 1, 'https://www.sendspace.com/file/bo59yz', '2017-05-17 13:54:37'),
(19, 7, 9, 96, 'Asc Dhammaan Ardayda iyo macalinkeena sharafta Mudan \r\nwaxaanu kaaga Mahad celinaynaa waqtigaaga qaaliga ah dedaalkaaga iyo Soomaali jeceylka ; ILAAHAY ajar iyo xasanaad hakugu bedelo Insha alaah\r\nINTAA KA DIB :\r\nmacalin waxaanu si sharaf iyo karaamo ku dheehantahay kaaga codsanaynaa inaad Noo bilowda course advanced ah oo lagu dhisayo project ( php , msqli HTML , CSS .) etc  si aanu u samayno project ah School Managment System \r\nay ku jiraan : Studensts in class , teachers with Titles , Exams with Grades , attendencess , search ....... iyo wixii kale ee muhiim ah kolay ani aqoon uma lihi inaad dhiso project noocaas ah lkn aad baan ugu xasaasi ahy inaan barto waa hadi aad macalin nagu garab istaagto aqoontaada , maskaxdaada iyo fekerkaaga  adigu \r\n\r\nMarlabaad waan idin salaamay guud ahaan Gaaar ahaan Macalin Abdifataah Abdifatah Abdilahi Guul baan kuu rajaynayaa Macalin INSHAA ALAAAAH', '2017-06-27 11:09:32'),
(20, 7, 9, 1, 'Wcs wr wb Aaad baa u Mahadsan tahay walal\r\nInsha Allah waxaan qorshaha noogu jirta oo aan hada wadnaaaa sidaan usamayn lahayn casharo Advanced ah\r\noo lagu Dabakhayo Projects sida Website dhamaystiran iyo System School oo dhameystiran\r\nWixii Faahfaahin ah waxad nagala socon doontaa boggaaan .\r\nMahadsanid.', '2017-06-27 14:42:58'),
(21, 7, 9, 96, 'Insha alaaah macalin waan sugaynaa course kaaa isaga ah \r\nfarxad baanu ku filaynaaa', '2017-06-28 08:33:26'),
(22, 7, 10, 96, 'asc macalinka iyo dhamaan ardayda waan idin salaamay waxaa dhib iga haysataa sidaan browserka uga soo saari lahaa sawir anigoo isticmaalaya file php ah maaha HTML\r\nSawirka laba siyood baa loosoo bandhigaa baa la yiri \r\n1 mar waa iyadoo laga soo qaadayo sawir kuugu jira database // kaas iminka kama hadlayo insha alaah markkedaaan ka hadli doonaaa\r\n2 kan labaadna waa iyada oo loo tilmaamayo browserka meesha uu sawirku ku jiro // tan ayaan iminka u baahanahay inaad iga caawisaaaan dhammaan asxaabta somalicoders \r\n\r\n\r\nwaan idiin salaamayaa mar labaad ', '2017-07-11 09:22:23'),
(29, 1, 12, 1, '&lt;p&gt;Asc wr wb Dhamaan ardayda iyo macalimiinta soomaaliyeed kusoo dhawaada &lt;b&gt;Madasha(forum)&lt;b&gt; somcoders.com&lt;p&gt;\r\n&lt;h3&gt;Hadaba qaabkee u isticmaali kartaa Madashan ama forumka&lt;/h3&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Ugu horayn waa inaad ciwaan ku leedahay bogga Somcoders.com&lt;/li&gt;\r\n&lt;li&gt;Userka aad madasha ku isticmaalayso waa Userkaaga somcoders&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h3&gt;Qaabkee Madasha(forum) wax usoo gelin kartaa&lt;/h3&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Ugu horays ciwaankaaga(user) waa inuu furan yahay&lt;/li&gt;\r\n&lt;li&gt;Marka labaad eeg in mawduucan hore looga hadlay adoo isticmaalaya search&lt;/li&gt;\r\n&lt;li&gt;hadii aad waydid wax mawduucaas ka hadlay ku dhufo  Waydii Su-aal&lt;/li&gt;\r\n&lt;li&gt;Dooro qaybta waydiintaadu quseyso sida html ,css general IWM&lt;/li&gt;\r\n&lt;li&gt;Qaybta ciwaanka ku qor qoraal kooban oo turjumaya waydiintaada 100 eray&lt;/li&gt;\r\n&lt;li&gt;Haga hoosena waydiintaada oo faahfaahsan ku qor&lt;/li&gt;\r\n&lt;li&gt;wixii code ah ka horaysii &lt;xmp&gt;&lt;pre&gt;code&gt;  e.g. halkan geli code &lt;/code&gt;&lt;/pre&gt;&lt;/xmp&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h3&gt;Mahadsanidiin&lt;/h3&gt;', '2017-07-13 05:52:28'),
(30, 7, 10, 1, 'Asc wr wb walaal sawir marka la yiraahdo laba haba waa la isticmaaalaa  waa tan 1aade:-\r\n&lt;ul&gt;\r\n              &lt;li&gt;In aad databaseka ku save garaysid file nameka oo ka danbeyso BLOB&lt;/li&gt;\r\n&lt;li&gt;Inaad folder ku ridid magaca sawirka kedibna databasekana aad nameka sawirka kus savegaraysid tusalae 123.jpg&lt;/li&gt;\r\n&lt;/ul&gt;\r\nHadii aad dooneysid tan danbe isticmaaal code kan oo wata macal Validationkiiisa.\r\n&lt;pre&gt;&lt;code&gt;\r\n  // kooras image\r\n                        $file               = $_FILES[&quot;fileUpload&quot;][&quot;name&quot;];\r\n                        $file_type      = $_FILES[&quot;fileUpload&quot;][&quot;type&quot;];\r\n                        $file_size       = $_FILES[&quot;fileUpload&quot;][&quot;size&quot;];\r\n                        $file_tmp       = $_FILES[&quot;fileUpload&quot;][&quot;tmp_name&quot;];\r\n\r\n//codekan hoose waa xog sixid wuxuuna hubinayaa in wuxu sawir yahay isla arkaa cabirka la rabo yhy\r\n                        $file_ext=strtolower(end(explode(\'.\',$_FILES[\'fileUpload\'][\'name\'])));\r\n                        $expensions= array(&quot;jpeg&quot;,&quot;jpg&quot;,&quot;png&quot;);\r\n                         if(in_array($file_ext,$expensions)=== false){\r\n                            $message = &quot;extension not allowed, please choose a JPEG or PNG file.&quot;;\r\n                        }elseif($file_size &gt; 2097152) {\r\n                            $message .=\'File size must be excately 2 MB\'; \r\n                        }else{\r\n\r\n                        // codekan  hoose sawirka wuxuu u save garaysid magacyo isxulid ah ama Ramdom\r\n\r\n                        $ramdom_name    = rand();\r\n                        move_uploaded_file($file_tmp, \'Magaca_Foldeerrka/\'.$ramdom_name.\'.jpg\');\r\n                        $imgurl       = $ramdom_name.\'.jpg\';\r\n        }\r\n    }\r\n&lt;/code&gt;&lt;/pre&gt;\r\nMahadsanid.', '2017-07-15 01:47:30'),
(31, 1, 7, 97, 'waxay u muuqataa inaad hal moobil 2 gmail ku wada isticmaalaysid, isku day mid inaad &quot;sign out&quot; tidhaahdid, isla markaana hal gmail kusoo reebtid.', '2017-07-17 01:17:14'),
(33, 1, 14, 149, 'wllo sidee ula soo dagi karaaa videoga aad soo dhigtaan', '2017-07-28 09:47:54'),
(34, 1, 14, 1, 'walaal waxaad computerkaaga ku duubataa IDM ama Internet Download Manager \r\nmarkaa Videoga daarto toos ayuu kuuugu soo baxayaaa.\r\nMahadsanid', '2017-07-28 10:49:18'),
(35, 9, 15, 161, 'Asc \r\n walaal Abdifatah Actualy aad ban uga helay program aad bulshda somaliyeed si mutawcnimo ah aad uGu barkeysid xqiiqtan feildkan photoshopka waan u baahnaa markaa wlaal soo badi cashsrda intan uun hanagu deyne \r\n waad mahadsan thy ', '2017-07-28 17:23:34'),
(36, 1, 16, 164, 'Iiga jawaba su asha', '2017-07-28 19:04:20'),
(37, 9, 15, 1, 'Walaal @abyan waa kaa gidooney taladaadan wax ku oolka ah insha Allah waa soo badin doonaa.\r\n&lt;p&gt;Nagu xidhnow&lt;/p&gt;', '2017-07-29 01:51:10'),
(38, 9, 15, 161, 'waan ku xidhnaan doona insha allah wlaalo\r\n', '2017-07-29 15:22:40'),
(39, 1, 17, 295, 'No', '2017-08-08 18:51:26'),
(40, 1, 17, 1, 'Walaal waxaad ku duubaneysaa  pc gaaga Internet Download Manager(IDM) Barnaajumka la dhaho kedibna videga markaa daartid toos buu kuugu soo qaban downloadka.\r\nMahadsanid', '2017-08-10 06:58:12'),
(41, 9, 18, 339, 'Waxaan ubaahanahay inaad iga caawisaan sida loo soo dajinayo Videoga ama aan uga daawan karo Chanel kiina Youtube ka Mahadsanidiin', '2017-10-17 02:46:53'),
(42, 9, 18, 1, 'Wcs wr wb walaal adoo halkaan ku jira ayaad ka dejisan kartaaa \r\nadoo isticmaalayaa IDM ama barnaamujyada kale ee wax lagusoo dejisto.\r\nMahadsanid', '2017-10-18 09:39:22'),
(43, 9, 19, 339, 'Mahadsanid , Maariya', '2017-11-25 09:17:11'),
(44, 9, 19, 1, 'Wcs wr wb walaal  waa saxney dib u fiiri.\r\n&lt;pre&gt;&lt;code&gt;\r\nhttp://www.somcoders.com/muuqaal.php?courseid=33&amp;e=V2JELVdQV29tLVU%3D\r\n&lt;/pre&gt;&lt;/code&gt;\r\nMahadsanid.', '2017-11-28 06:04:14'),
(45, 9, 19, 1, 'Fadlan walaal wixii cilado aad aragtid sidaas oo kale noogusoo gudbi\r\nwaxaan isku dayi doonaa inaan waxka qabano.', '2017-11-28 07:13:15'),
(46, 9, 19, 339, 'haye wll inshallh ', '2017-11-28 08:46:40'),
(47, 2, 3, 395, 'walaal waxaad samaysaa marka hore waxaad tagtaa my computer kadibna rigth click kadibna dooro manage kadibna dooro disk management kadibna rigth click ku dheh c kadibna dooro shrink volume kadibna dheh next next next ok ', '2017-11-29 02:30:46'),
(48, 3, 20, 433, 'cashirada aad sida free ah u bixisaaan hal qeeb lee ka arkaaa oo cashirka ma dhameeys tirno kuwa kale waxa ku xiran qofil marka see ugu faaideeysan karaa cashirada free ah ', '2017-12-14 06:50:33'),
(49, 3, 20, 1, 'Walaal waa Mahadsan tahay \r\nAlaaba dhawr kooras oo iskugu jira Officer,Web Development,Graphic design ayaa ku jira bogga kuwo kale oo badana waa lasoo wada ,Inta ku jirta bogga walaal dhamaantood way dhamestiran yihiin .\r\nMuuqaalkan daawo qaabka aad kooras u arki kartid waxyaaba ku dhex jira.\r\n&lt;code&gt;https://www.facebook.com/somcoders/videos/1352498644878763/&lt;/code&gt;', '2017-12-14 08:43:42'),
(50, 1, 21, 441, 'asc magacaygu waa abdulhakim sharif jooga bangldesh , waan kufaraxsanahay inaan ardaydiina kamid noqdo howshiinana sii wada insha allah .\r\nhadaan udhaadhaco su\'aasheyda ( Online orojectska aad soo wadaan goormaad soo bandhigidoontaan ? hadii uu soo bandhigmase lacag miyaad kadhigidoontaan sidaan u aragnayba websites badan oo idinka horeeyay?)\r\n Wabillaahi towiq.', '2017-12-27 16:20:58'),
(51, 1, 21, 1, 'Wcs wr wb walaal Projects-ka labo qaybood ayey noqon insha Allah\r\nkuwo Free ah oo ardayda casharada Free ga ah daawata la degi karaaan iyo \r\nkuwo Ardayda Koorsooyin-ka laagta(Premium) ah kadiwan gashan ay la degi karaan.\r\nwaa ku mahadsan tahay Dhiirigelintaada ,Soo dhawaw.', '2017-12-30 02:07:34'),
(52, 16, 22, 485, 'macalin waxan rabay wordpress website news ah sida caasimada online  okale marka maxa laygaga bahan yhy component inan diyaarsada jwb wacan teacher', '2018-02-02 04:24:30'),
(53, 16, 22, 1, 'Walaal hadii aad dooneysid inaad noqotid wordpress developer,waxaa u baahan tahay inaad taqaanid HTML,CSS,Js iyo PHP oo ah luuqadaha Programming-ka.\r\nHadiise aad dooneysid inaad noqotid qof Webka uu rabo Theme (Qolof)  ama Design saaranaya waxaa u baahan yahay inaad taqaanid Wordpress basics oo aanu kooras kooban ka duubney,Kooraska waxaa ka heli kartaa mareegtan hoose.\r\n&lt;pre&gt;&lt;code&gt;http://www.somcoders.com/kooras.php?name=baro-aasaasiga-wordpress&amp;courseid=31&lt;/code&gt;&lt;/pre&gt;', '2018-02-04 00:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `topic_title` varchar(255) NOT NULL,
  `topic_creator` int(11) NOT NULL,
  `topic_last_user` int(11) NOT NULL DEFAULT '0',
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`) VALUES
(1, 7, 'php taariikhda maanta', 2, 1, '2016-05-20 06:48:52', '2017-05-13 04:29:33', 384),
(2, 7, 'Sidee ugu samayn karaa php qoraal readmore ah ama sii akhri', 2, 1, '2016-05-28 23:49:27', '2016-06-10 10:25:47', 394),
(3, 2, 'Sidee u Kala Jebin karaa Partionka Hard Diskgayga ', 12, 395, '2016-09-07 02:01:26', '2017-11-29 02:30:46', 358),
(4, 7, 'php cache system', 17, 1, '2016-10-14 04:31:15', '2016-10-15 06:17:01', 326),
(5, 7, 'Dhisid project bilow ah ', 18, 1, '2016-10-26 05:02:56', '2016-11-26 05:32:24', 440),
(6, 7, 'sidee loo sameeya online exam result project dhameystiran oo php ah', 72, 1, '2017-02-04 01:05:03', '2017-03-31 04:33:26', 233),
(7, 1, 'sidee loo cilad saraa gmail acount', 93, 97, '2017-05-15 01:51:17', '2017-07-17 01:17:14', 133),
(8, 7, 'post form', 93, 1, '2017-05-17 11:50:44', '2017-05-17 13:54:37', 168),
(9, 7, 'CODSI full php mysqli Html CSS , Advanced ah aad banu u sugaynaa o u sadaalinaynaa School ,Managment', 96, 1, '2017-06-27 11:09:32', '2017-07-13 05:09:51', 134),
(10, 7, 'Sidee sawir loosoo display gareeyaa iyada oo laga soo qaadayo directoryga ama folderka HTTDOCS ', 96, 1, '2017-07-11 09:22:23', '2017-07-15 01:47:30', 157),
(12, 1, 'Sidee u isticmaali kartaa somcoders forum', 1, 0, '2017-07-13 05:52:28', '2017-07-13 05:52:28', 193),
(14, 1, 'wllo sidee ula soo dagi karaaa videoga aad soo dhigtaan', 149, 1, '2017-07-28 09:47:54', '2017-07-28 10:49:18', 174),
(15, 9, 'Fariin Taydan dhugo walaalo !', 161, 161, '2017-07-28 17:23:34', '2017-07-29 15:22:40', 176),
(16, 1, 'What is agriculture and crops and environment', 164, 0, '2017-07-28 19:04:20', '2017-07-28 19:04:20', 149),
(17, 1, 'Sideen vifioga aad soo dhigtaan ulasoo dagaa', 295, 1, '2017-08-08 18:51:26', '2017-08-10 06:58:12', 226),
(18, 9, 'Asc wll ', 339, 1, '2017-10-17 02:46:53', '2017-10-18 09:39:22', 137),
(19, 9, 'Asc wll waxaan idinka codsanayaa shabakada Somcoders inaad dib u eegtaan Videoga Labaad Spot Healing', 339, 339, '2017-11-25 09:17:11', '2017-11-28 08:46:40', 133),
(20, 3, 'cashirada free ah', 433, 1, '2017-12-14 06:50:33', '2017-12-14 08:43:42', 86),
(21, 1, 'Oline Projects-ka', 441, 1, '2017-12-27 16:20:58', '2017-12-30 02:07:34', 83),
(22, 16, 'wordpress news website', 485, 1, '2018-02-02 04:24:30', '2018-02-04 00:42:46', 32);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Abdifatah', '121212'),
(2, 'fahad', 'fahad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `post_creator` (`post_creator`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `topic_creator` (`topic_creator`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
