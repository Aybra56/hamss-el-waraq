-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 juil. 2026 à 22:29
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hamsselwaraq`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminPass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `adminName`, `adminEmail`, `adminPass`) VALUES
(1, 'admin', 'admin@', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bookTitle` varchar(100) NOT NULL,
  `bookAuthor` varchar(100) NOT NULL,
  `bookCat` varchar(100) NOT NULL,
  `bookCover` varchar(200) NOT NULL,
  `book` varchar(200) NOT NULL,
  `bookContent` varchar(10000) NOT NULL,
  `bookDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `bookTitle`, `bookAuthor`, `bookCat`, `bookCover`, `book`, `bookContent`, `bookDate`) VALUES
(1, 'الخبز الحافي', 'محمد شكري', 'سيرة ذاتية', '9145_الخبز الحافي.jpg', '9246_الخبز الحافي.pdf', 'رواية سيرة ذاتية للكاتب المغربي محمد شكري، تصور طفولة قاسية في المغرب الاستعماري. تتناول الرواية الفقر، العنف، والجريمة، وتكشف عن قوة الإرادة البشرية في مواجهة الصعوبات.', '2024-12-19'),
(4, 'ارض زيكولا', 'عمرو عبد الحميد', 'رواية خيالية', '5807_همس _الورق_ارض زيكولا.png', '8126_همس _الورق_أرض زيكولا.pdf', '\"أرض زيكولا\" هي رواية خيالية من تأليف الكاتب المصري عمرو عبد الحميد. تدور أحداثها حول شاب يدعى خالد يعيش في قرية صغيرة ويحلم بالتميز والخروج من حياة الرتابة. يجد نفسه بعد سلسلة من الأحداث في عالم خيالي يُدعى \"أرض زيكولا\"، حيث يتم التعامل بالذكاء بدلًا من المال. كل فرد يمتلك رصيدًا من الذكاء يتم تداوله، وإذا نفد هذا الرصيد، يتم التضحية به في يوم زيكولا السنوي. الرواية تعكس صراع الإنسان مع المجتمع والقدرة على التكيف مع بيئات غير مألوفة.', '2024-12-29'),
(5, 'اماريتا ', 'عمرو عبد الحميد', 'رواية خيالية', '5518_همس الورق_اماريتا.png', '7298_همس الورق_أماريتا.pdf', '\"أماريتا\" هي الجزء الثاني من \"أرض زيكولا\"، وتكمل فيها القصة بأسلوب أكثر تعمقًا وتشويقًا. يركز الكاتب على مملكة أخرى تُدعى \"أماريتا\"، حيث تتقاطع القيم والأحداث مع عالم زيكولا. الرواية تستكشف جوانب جديدة من الصراعات البشرية والاجتماعية، وتستعرض التحالفات والمؤامرات داخل هذه العوالم. يتناول الكاتب بشكل جذاب معاني الوفاء والخيانة والقوة السياسية، مما يجعل القارئ مشدوهًا حتى النهاية. ', '2024-12-29'),
(6, 'الليالي البيضاء', 'فيودور دوستويفسكي', 'أدب روسي', '4427_همس الورق_الليالي اليبضاء.png', '5641_همس الورق_الليالي البيضاء.pdf', 'اكتشف رواية \"الليالي البيضاء\"، واحدة من أعظم أعمال الأدب الروسي التي كتبها الكاتب العبقري فيودور دوستويفسكي. تعكس هذه الرواية قصة رومانسية مليئة بالمشاعر والتأملات الفلسفية العميقة، حيث يروي الكاتب حياة شاب حالم يعيش بين الخيال والواقع خلال أربع ليالٍ بيضاء مليئة بالأحداث المشوقة.\r\n\r\nتمتاز \"الليالي البيضاء\" بأسلوب سردي فريد يلمس القلوب ويُبرز عمق الروح الإنسانية. انغمس في عالم من المشاعر والعواطف التي لن تنساها أبدًا. الكتاب متاح الآن للتنزيل مجانًا من مكتبة همس الورق.', '2024-12-29'),
(7, 'الاخوة كارامازوف_الجزء الأول', 'فيودور دوستويفسكي', 'أدب روسي', '6579_همس الورق_الاخوة_كارامازوف_الجزء_الاول.png', '8741_همس الورق_الاخوة_كارامازوف_الجزء_الاول.pdf', 'استمتع بقراءة الجزء الأول من رائعة \"الأخوة كارامازوف\"، التحفة الأدبية الخالدة التي كتبها فيودور دوستويفسكي، أحد أعظم الأدباء في التاريخ. يتناول الكتاب قضايا فلسفية وأخلاقية عميقة من خلال قصة أخوين يعكسان صراعات الحب، الكراهية، والعدالة في إطار درامي مشوق.\r\n\r\nيجمع الجزء الأول بين أسلوب سردي فريد وحبكة مثيرة تجذب القارئ من الصفحة الأولى. إذا كنت من عشاق الأدب الكلاسيكي الروسي، فهذا الكتاب هو الخيار الأمثل لك. حمل الآن كتاب \"الأخوة كارامازوف - الجزء الأول\" مجانًا من مكتبة همس الورق واستمتع بتجربة قراءة لا تُنسى.', '2024-12-29'),
(8, 'الاخوة كارامازوف_الجزء الثاني', 'فيودور دوستويفسكي', 'أدب روسي', '7799_همس الورق_الاخوة_كارامازوف_الجزء_الثاني.png', '9892_همس الورق_الاخوة كارامازوف ج2.pdf', 'استكمل رحلتك مع رواية الإخوة كارامازوف الجزء الثاني بصيغة PDF مجانًا. في هذا الجزء، يأخذك فيودور دوستويفسكي إلى أعماق العلاقات الإنسانية، حيث تتشابك المشاعر والصراعات العائلية مع التساؤلات الفلسفية العميقة. تجربة أدبية مميزة تنتظرك، فقط في مكتبة همس الورق.', '2024-12-30'),
(9, 'الاخوة كارامازوف_الجزء الثالث', 'فيودور دوستويفسكي', 'أدب روسي', '6327_همس الورق_الاخوة_كارامازوف_الجزء_3.png', '3679_همس الورق_الإخوة_كارامازوف_الجزء 3.pdf', 'تحميل كتاب الإخوة كارامازوف الجزء الثالث PDF مجانًا، واستعد للغوص في ذروة الأحداث والتوترات الدرامية. يكشف دوستويفسكي ببراعة عن تعقيدات النفس البشرية من خلال شخصياته التي تبحث عن العدالة والخلاص. هذا الجزء يقدم تجربة قراءة فريدة من نوعها في مكتبة همس الورق.', '2024-12-30'),
(10, 'الاخوة كارامازوف_الجزء الرابع', 'فيودور دوستويفسكي', 'أدب روسي', '4771_همس الورق_الاخوة_كارامازوف_الجزء_4.png', '266_همس الورق_الاخوه كارامازوف ج4.pdf', 'اكتشف خاتمة التحفة الأدبية مع رواية الإخوة كارامازوف الجزء الرابع بصيغة PDF مجانًا. دوستويفسكي يختتم روايته بطريقة عميقة ومؤثرة، حيث تجد الإجابات على التساؤلات الكبرى حول الإيمان، الأخلاق، والمعنى. لا تفوت هذه الفرصة للحصول على هذا العمل الخالد من مكتبة همس الورق.', '2024-12-30'),
(11, 'موت صغير', 'محمد حسن علوان', 'كتب صوفية', '7868_همس الورق_موت صغير.png', '1031_همس الورق_موت صغير.pdf', 'تحميل رواية موت صغير PDF مجانًا من مكتبة همس الورق. استعد للغوص في تحفة روائية رائعة للأديب محمد حسن علوان، حيث تأخذك القصة عبر حياة صوفية ملهمة مليئة بالتجارب الروحية والفلسفية العميقة. استمتع بقراءة هذا العمل الأدبي الحائز على جائزة البوكر.', '2024-12-31'),
(12, 'الجريمة والعقاب_الجزء الأول', 'فيودور دوستويفسكي', 'أدب روسي', '8818_همس الورق_الجريمة والعقاب الجزء 1.png', '613_همس الورق_الجريمة والعقاب الجزء 1.pdf', 'تحميل رواية الجريمة والعقاب الجزء الأول PDF مجانًا من مكتبة همس الورق. اكتشف أعماق النفس البشرية في رائعة الأدب الروسي لفيودور دوستويفسكي، حيث يتناول الصراع الداخلي لبطل الرواية وعواقب اختياراته الأخلاقية. استمتع برحلة فلسفية شيقة تجمع بين الدراما والغموض.', '2024-12-31');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(200) NOT NULL,
  `categoryDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `categoryDate`) VALUES
(1, 'سياسة', '2024-12-09'),
(3, 'كتب ثقافية', '2024-12-09'),
(4, 'كتب الخيال العلمي', '2024-12-10'),
(5, 'سيرة ذاتية', '2024-12-10'),
(6, 'كتب أدبية', '2024-12-10'),
(7, 'أدب روسي', '2024-12-10'),
(8, 'قصة قصيرة', '2024-12-14'),
(9, 'مذكرات', '2024-12-14'),
(10, 'سينما', '2024-12-14'),
(11, 'تاريخ', '2024-12-14'),
(12, 'رواية خيالية', '2024-12-24'),
(13, 'كتب صوفية', '2024-12-31');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'aa', 'aaa@aa', 'aaaaa', '2024-12-28 16:30:04'),
(3, 'تلاهلاه', 'jjjjj@oo', 'jjjjjjjjjjjjjjjjjjjjjjjjj', '2025-01-10 21:13:11');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
