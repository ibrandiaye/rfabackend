-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 mars 2022 à 10:39
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rfa`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `rts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projet_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activites`
--

INSERT INTO `activites` (`id`, `nom`, `debut`, `fin`, `rts`, `responsable`, `email`, `projet_id`, `created_at`, `updated_at`, `etat`, `fs`) VALUES
(1, 'Suivi de la Plateforme Ytaxe', '2022-03-04', '2022-05-30', '<p>ceci est un test<br></p>', 'ibra Ndiaye', 'ibrandiaye@endaecopop.org', 1, '2021-12-18 20:52:31', '2022-02-28 11:04:53', 'non realise', NULL),
(2, 'qsdd', '2022-01-01', '2022-01-01', '<p>sdsd<br></p>', 'ibra Ndiaye', 'ibra93_3@live.com', 1, '2021-12-22 15:24:15', '2021-12-22 15:24:15', 'non realise', NULL),
(3, 'cjhbdfhj', '2022-03-14', '2022-03-16', '<p>qdq</p>', 'Khadim Rassoul Gueye', 'ibra93_3@live.fr', 1, '2022-03-06 23:38:14', '2022-03-06 23:38:14', 'non realise', NULL),
(4, '<kjxb<jhxdb', '2022-03-08', '2022-03-16', '<p>&lt;sxjbsjdhbsd<br></p>', '<wjkxns', 'ibrandiaye@endaecopop.org', 2, '2022-03-08 12:41:04', '2022-03-08 12:45:51', 'non realise', '1646743551.xlsx'),
(5, 'kjnjkjnkj', '2022-03-10', '2022-03-10', '<p>kjnjnkj<br></p>', 'kjnoijlk', 'ibrandiaye@endaecopop.org', 2, '2022-03-10 10:05:05', '2022-03-10 10:05:05', 'non realise', '1646906705.docx');

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE `communes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitudec` double NOT NULL,
  `longitudec` double NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `communes`
--

INSERT INTO `communes` (`id`, `nomc`, `latitudec`, `longitudec`, `departement_id`, `created_at`, `updated_at`) VALUES
(1, 'Kébémer', 15.3688735, -16.4429778, 4, '2021-12-16 11:39:53', '2021-12-16 11:39:53'),
(2, 'Tamba', 13.8301533, -13.0891759, 10, '2021-12-19 22:43:59', '2021-12-19 22:43:59');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latituded` double NOT NULL,
  `longituded` double NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `nomd`, `latituded`, `longituded`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'Louga', 15.2401304, -15.3441834, 1, '2021-09-10 12:41:48', '2021-09-10 12:41:48'),
(4, 'Kébémer', 15.3688735, -16.4429778, 1, '2021-09-20 11:00:32', '2021-09-20 11:00:32'),
(5, 'Thies', 14.7948093, -16.9529272, 2, '2021-09-20 11:02:06', '2021-09-20 11:02:06'),
(6, 'Mbour', 14.411794, -16.9657124, 2, '2021-09-20 11:02:54', '2021-09-20 11:02:54'),
(7, 'Tivaouane', 14.948452, -16.8139971, 2, '2021-09-20 11:03:44', '2021-09-20 11:03:44'),
(8, 'Matam', 14.7948093, -16.9529272, 3, '2021-09-20 11:04:46', '2021-09-20 11:04:46'),
(9, 'OUROSSOGUI', 15.606478, -13.3211029, 3, '2021-09-20 11:05:40', '2021-09-20 11:05:40'),
(10, 'Tambacounda', 13.8301533, -13.0891759, 4, '2021-09-20 11:06:35', '2021-09-20 11:06:35');

-- --------------------------------------------------------

--
-- Structure de la table `desagreges`
--

CREATE TABLE `desagreges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicateur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `desagreges`
--

INSERT INTO `desagreges` (`id`, `quantite`, `titre`, `indicateur_id`, `created_at`, `updated_at`) VALUES
(1, 400, 'femmes', 3, '2021-11-11 12:20:56', '2022-01-02 21:16:44'),
(2, 200, 'HOMMES', 3, '2021-11-11 12:20:56', '2022-01-02 21:16:44'),
(6, 190, 'activites', 4, '2022-01-02 18:29:25', '2022-01-02 18:29:25');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `indicateurs`
--

CREATE TABLE `indicateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `objectif` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicateur` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `donneeref` int(11) NOT NULL,
  `cible` int(11) NOT NULL,
  `methode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `frequence` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `projet_id` bigint(20) UNSIGNED NOT NULL,
  `unite` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `indicateurs`
--

INSERT INTO `indicateurs` (`id`, `objectif`, `indicateur`, `donneeref`, `cible`, `methode`, `frequence`, `responsable`, `projet_id`, `unite`, `created_at`, `updated_at`) VALUES
(3, 'Objectif général / Global objective : Contribuer à Renforcer la résilience économique des communautés locales de Joal Fadiouth à travers des', 'Nombre de femmes accompagnées dans le renforcement de la résilience économique', 600, 600, 'mission de suivi des indicateurs', 'Mensuelle', 'Djibril Mangane', 1, 'personnes', '2021-11-11 12:20:56', '2022-02-24 16:46:55'),
(4, 'Nombre de démonstrations culinaires organisées à l\'endroit des GPF', 'Nombre de démonstrations culinaires organisées à l\'endroit des GPF', 190, 190, 'mission de suivi des indicateurs', 'Mensuelle', 'Bureau Annexe', 1, 'Activités', '2021-12-30 17:18:03', '2022-01-02 18:29:25'),
(7, 'Objectif général / Global objective : Contribuer à Renforcer la résilience économique des communautés locales de Joal Fadiouth à travers des modèles de valorisation des ressources naturelles', 'Nombre d\'ateliers ou de sessions tenus', 9, 9, 'Mission de Suivi des indicateurs', 'Mensuelle', 'Djibril Mangane', 1, 'activite', '2022-01-05 10:49:21', '2022-02-24 16:47:29'),
(8, 'L\'objectif de l\'année 1 s\'applique à la mise en œuvre les 08 CT pilotes, En année 2, l\'objectif s\'applique dans 10 CT, en année 3, 15 CT; en année 4, 20 CT, en 5 ème année 30 CT.', 'Pourcentage de CT ciblées utilisant un processus de planification et de budgétisation participative (BP)', 2017, 65, 'Documents du projet de budgétisation participative', 'Annuelle', 'astoud@endaecopop.org', 2, '%', '2022-02-25 10:22:41', '2022-03-01 12:46:10'),
(9, 'Performance', 'Variation en pourcentage des capacités techniques des CT ciblées', 2017, 30, 'mission', 'Annuelle', 'astoud@endaecopop.org', 2, '%', '2022-02-25 10:51:56', '2022-02-25 10:51:56');

-- --------------------------------------------------------

--
-- Structure de la table `indicateur_activites`
--

CREATE TABLE `indicateur_activites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `indicateur_id` bigint(20) UNSIGNED NOT NULL,
  `activite_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `indicateur_activites`
--

INSERT INTO `indicateur_activites` (`id`, `indicateur_id`, `activite_id`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '2022-03-06 23:38:14', '2022-03-06 23:38:14'),
(2, 4, 3, '2022-03-06 23:38:14', '2022-03-06 23:38:14'),
(3, 8, 5, '2022-03-10 10:05:05', '2022-03-10 10:05:05');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_10_21_113637_create_projets_table', 2),
(10, '2021_10_21_125119_create_indicateurs_table', 3),
(11, '2021_10_21_125757_create_desagreges_table', 3),
(12, '2021_11_11_152756_update_tabe_projets_add_column', 4),
(13, '2021_11_12_112700_create_resultats_table', 5),
(14, '2021_11_22_124556_create_resultat_details_table', 5),
(15, '2021_12_14_104805_create_regions_table', 6),
(16, '2021_12_14_104822_create_departements_table', 6),
(17, '2021_12_14_104836_create_communes_table', 6),
(18, '2021_12_16_095556_create_zones_table', 6),
(19, '2021_12_16_171505_create_activites_table', 7),
(20, '2021_12_17_164059_update_table_activites_add_column_etat', 8),
(21, '2021_12_18_222513_update_table_resultats_add_column_commune_id', 9),
(22, '2021_12_22_163918_create_suivi_activites_table', 10),
(23, '2021_12_23_160825_update_table_add_columns_sv', 11),
(24, '2021_12_30_175107_update_table_resulats_add_observation', 12),
(25, '2021_12_31_160532_update_table__suivi_activités', 13),
(26, '2022_02_18_163836_update_table_suivi_activite', 14),
(27, '2022_02_24_163253_add_column_type_in_indicateurs', 15),
(28, '2022_02_24_234441_add_column_type_in_projets', 16),
(29, '2022_02_25_094248_update_table_resultats_add_colum_annee', 17),
(30, '2022_03_05_123757_create_indicateur_activites_table', 18),
(31, '2022_03_08_121734_update_table_add_column_fs_activite', 19),
(33, '2022_03_09_115115_update_table_suvi_activites_add_column', 20);

-- --------------------------------------------------------

--
-- Structure de la table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'Act63cM1UlmIRtMC4Oe4mIrL7b7isiYmWTdNnADl', NULL, 'http://localhost', 1, 0, 0, '2021-08-02 11:18:22', '2021-08-02 11:18:22'),
(2, NULL, 'Laravel Password Grant Client', 'LFnp36yQnezUPE8LMqtIizKfg6IMzVFAMiUfRhA2', 'users', 'http://localhost', 0, 1, 0, '2021-08-02 11:18:22', '2021-08-02 11:18:22');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-08-02 11:18:22', '2021-08-02 11:18:22');

-- --------------------------------------------------------

--
-- Structure de la table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `objectif` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `duree` int(11) NOT NULL,
  `typecadre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `nom`, `objectif`, `created_at`, `updated_at`, `duree`, `typecadre`) VALUES
(1, 'RFA', 'OJOI', '2021-10-21 12:28:44', '2022-02-24 23:27:53', 3, ''),
(2, 'GOLD', 'A Définir', '2021-12-16 15:32:44', '2022-02-25 10:08:43', 5, 'Cadre de  resultat'),
(4, 'PROMOVAL', 'neant', '2022-02-17 15:26:40', '2022-02-24 23:48:10', 3, 'Cadre logique');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Louga', 15.2401304, -15.3441834, '2021-09-10 12:24:26', '2021-09-10 12:24:26'),
(2, 'Thies', 14.7948093, -16.9529272, '2021-09-20 10:55:10', '2021-09-20 10:55:10'),
(3, 'Matam', 14.7948093, -16.9529272, '2021-09-20 10:56:36', '2021-09-20 10:56:36'),
(4, 'Tambacounda', 13.8301533, -13.0891759, '2021-09-20 10:57:39', '2021-09-20 10:57:39');

-- --------------------------------------------------------

--
-- Structure de la table `resultats`
--

CREATE TABLE `resultats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rts` double NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `indicateur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commune_id` bigint(20) UNSIGNED NOT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `resultats`
--

INSERT INTO `resultats` (`id`, `rts`, `debut`, `fin`, `indicateur_id`, `created_at`, `updated_at`, `commune_id`, `observation`, `annee`) VALUES
(2, 20, '2021-12-20', '2021-12-20', 3, '2021-12-20 17:21:45', '2022-01-05 11:20:37', 2, 'RAS', NULL),
(3, 100, '2021-12-30', '2021-12-30', 3, '2021-12-30 16:50:33', '2021-12-31 12:55:44', 2, 'test', NULL),
(6, 2, '2021-12-01', '2021-12-31', 7, '2022-01-05 11:16:41', '2022-01-05 11:16:41', 2, 'RAS', NULL),
(7, 10, '2022-02-21', '2022-02-21', 4, '2022-02-22 15:07:08', '2022-02-22 15:07:08', 2, 'QSDF', NULL),
(8, 10, '2020-02-01', '2020-02-01', 8, '2022-02-25 10:54:33', '2022-02-25 12:49:03', 2, 'RAS', '1'),
(9, 15, '2021-02-01', '2021-02-01', 9, '2022-02-25 11:10:41', '2022-02-25 11:10:41', 2, 'RAS', 'annee 2'),
(10, 100, '2022-03-08', '2022-03-08', 3, '2022-03-08 00:07:02', '2022-03-08 00:07:02', 2, 'DGFG', NULL),
(11, 20, '2022-03-08', '2022-03-08', 4, '2022-03-08 00:07:02', '2022-03-08 00:07:02', 2, 'ZER', NULL),
(12, 10, '2022-03-10', '2022-03-10', 8, '2022-03-10 10:08:28', '2022-03-10 10:08:28', 2, 'JHBJHB', '1'),
(13, 3, '2022-03-10', '2022-03-10', 8, '2022-03-10 10:28:39', '2022-03-10 10:28:39', 2, 'SDSF', '1'),
(14, 2, '2022-03-10', '2022-03-10', 8, '2022-03-10 10:29:57', '2022-03-10 10:29:57', 2, 'SDFSF', '1');

-- --------------------------------------------------------

--
-- Structure de la table `resultat_details`
--

CREATE TABLE `resultat_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `valeur` double NOT NULL,
  `resultat_id` bigint(20) UNSIGNED NOT NULL,
  `desagrege_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `resultat_details`
--

INSERT INTO `resultat_details` (`id`, `valeur`, `resultat_id`, `desagrege_id`, `created_at`, `updated_at`) VALUES
(15, 40, 3, 1, '2021-12-31 13:00:05', '2021-12-31 13:00:05'),
(16, 60, 3, 2, '2021-12-31 13:00:05', '2021-12-31 13:00:05'),
(17, 16, 2, 1, '2022-01-05 11:20:37', '2022-01-05 11:20:37'),
(18, 4, 2, 2, '2022-01-05 11:20:37', '2022-01-05 11:20:37'),
(19, 10, 7, 6, '2022-02-22 15:07:08', '2022-02-22 15:07:08'),
(20, 75, 10, 1, '2022-03-08 00:07:02', '2022-03-08 00:07:02'),
(21, 25, 10, 2, '2022-03-08 00:07:02', '2022-03-08 00:07:02'),
(22, 20, 11, 6, '2022-03-08 00:07:02', '2022-03-08 00:07:02');

-- --------------------------------------------------------

--
-- Structure de la table `suivi_activites`
--

CREATE TABLE `suivi_activites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `niveaur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resultat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activite_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dater` date NOT NULL,
  `commune_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rapport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projet` int(11) DEFAULT NULL,
  `activite` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `suivi_activites`
--

INSERT INTO `suivi_activites` (`id`, `niveaur`, `resultat`, `observation`, `activite_id`, `created_at`, `updated_at`, `dater`, `commune_id`, `rapport`, `projet`, `activite`, `etat`) VALUES
(1, 'realise', '<p>Augmentation des ressources de la commune<br></p>', '<p>Pas d\'observation<br></p>', 2, '2021-12-24 09:33:39', '2021-12-31 16:20:00', '2021-12-24', 2, '', NULL, NULL, NULL),
(2, 'realise', '<p>test<br></p>', '<p>Pas d\'observation...<br></p>', 2, '2021-12-24 09:42:57', '2022-01-02 21:39:28', '2021-12-25', 2, '', NULL, NULL, NULL),
(3, 'realise', '<p>.SDJNKSDHBQDHBQD</p>', NULL, 1, '2022-02-18 16:46:19', '2022-02-28 10:46:25', '2022-02-04', 2, '1645202779.pdf', NULL, NULL, NULL),
(4, 'realise', '<p>knbj<br></p>', NULL, 3, '2022-03-08 00:07:02', '2022-03-08 00:07:02', '2022-03-08', 2, '1646698022.docx', NULL, NULL, NULL),
(6, 'realise', '<p>jhbh<br></p>', NULL, 0, '2022-03-09 16:50:38', '2022-03-09 16:50:38', '2022-03-08', 2, '1646844638.pdf', 1, 'oiji', 'non prevu'),
(7, 'realise', '<p>kljnknkj<br></p>', NULL, 5, '2022-03-10 10:08:28', '2022-03-10 10:08:28', '2022-03-10', 2, '1646906908.docx', 2, NULL, 'prevu'),
(8, 'realise', '<p>jnoikjnkj<br></p>', NULL, 5, '2022-03-10 10:28:39', '2022-03-10 10:28:39', '2022-03-10', 2, '1646908119.docx', 2, NULL, 'prevu'),
(9, 'realise', '<p>jnoikjnkj<br></p>', NULL, 5, '2022-03-10 10:29:57', '2022-03-10 10:29:57', '2022-03-10', 2, '1646908197.docx', 2, NULL, 'prevu');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ibra Ndiaye', 'ibrandiaye@endaecopop.org', NULL, '$2y$10$tiMUFU8andYeeGI7sITD9etkckFRBL.zvMLbnB357h4lUXXYzD6Zi', NULL, '2021-10-21 11:29:59', '2021-10-21 11:29:59');

-- --------------------------------------------------------

--
-- Structure de la table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projet_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `zones`
--

INSERT INTO `zones` (`id`, `projet_id`, `region_id`, `created_at`, `updated_at`) VALUES
(24, 1, 2, '2022-02-24 23:27:53', '2022-02-24 23:27:53'),
(25, 1, 3, '2022-02-24 23:27:53', '2022-02-24 23:27:53'),
(26, 1, 4, '2022-02-24 23:27:53', '2022-02-24 23:27:53'),
(27, 4, 2, '2022-02-24 23:48:10', '2022-02-24 23:48:10'),
(28, 2, 2, '2022-02-25 10:08:43', '2022-02-25 10:08:43'),
(29, 2, 4, '2022-02-25 10:08:43', '2022-02-25 10:08:43');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activites_projet_id_foreign` (`projet_id`);

--
-- Index pour la table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communes_departement_id_foreign` (`departement_id`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departements_region_id_foreign` (`region_id`);

--
-- Index pour la table `desagreges`
--
ALTER TABLE `desagreges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desagreges_indicateur_id_foreign` (`indicateur_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `indicateurs`
--
ALTER TABLE `indicateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indicateurs_projet_id_foreign` (`projet_id`);

--
-- Index pour la table `indicateur_activites`
--
ALTER TABLE `indicateur_activites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indicateur_activites_indicateur_id_foreign` (`indicateur_id`),
  ADD KEY `indicateur_activites_activite_id_foreign` (`activite_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Index pour la table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `resultats`
--
ALTER TABLE `resultats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resultats_indicateur_id_foreign` (`indicateur_id`),
  ADD KEY `resultats_commune_id_foreign` (`commune_id`);

--
-- Index pour la table `resultat_details`
--
ALTER TABLE `resultat_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resultat_details_resultat_id_foreign` (`resultat_id`),
  ADD KEY `resultat_details_desagrege_id_foreign` (`desagrege_id`);

--
-- Index pour la table `suivi_activites`
--
ALTER TABLE `suivi_activites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suivi_activites_activite_id_foreign` (`activite_id`),
  ADD KEY `suivi_activites_commune_id_foreign` (`commune_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zones_projet_id_foreign` (`projet_id`),
  ADD KEY `zones_region_id_foreign` (`region_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `communes`
--
ALTER TABLE `communes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `desagreges`
--
ALTER TABLE `desagreges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `indicateurs`
--
ALTER TABLE `indicateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `indicateur_activites`
--
ALTER TABLE `indicateur_activites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `resultats`
--
ALTER TABLE `resultats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `resultat_details`
--
ALTER TABLE `resultat_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `suivi_activites`
--
ALTER TABLE `suivi_activites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activites`
--
ALTER TABLE `activites`
  ADD CONSTRAINT `activites_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`);

--
-- Contraintes pour la table `communes`
--
ALTER TABLE `communes`
  ADD CONSTRAINT `communes_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`);

--
-- Contraintes pour la table `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `departements_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Contraintes pour la table `desagreges`
--
ALTER TABLE `desagreges`
  ADD CONSTRAINT `desagreges_indicateur_id_foreign` FOREIGN KEY (`indicateur_id`) REFERENCES `indicateurs` (`id`);

--
-- Contraintes pour la table `indicateurs`
--
ALTER TABLE `indicateurs`
  ADD CONSTRAINT `indicateurs_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`);

--
-- Contraintes pour la table `indicateur_activites`
--
ALTER TABLE `indicateur_activites`
  ADD CONSTRAINT `indicateur_activites_activite_id_foreign` FOREIGN KEY (`activite_id`) REFERENCES `activites` (`id`),
  ADD CONSTRAINT `indicateur_activites_indicateur_id_foreign` FOREIGN KEY (`indicateur_id`) REFERENCES `indicateurs` (`id`);

--
-- Contraintes pour la table `resultats`
--
ALTER TABLE `resultats`
  ADD CONSTRAINT `resultats_commune_id_foreign` FOREIGN KEY (`commune_id`) REFERENCES `communes` (`id`),
  ADD CONSTRAINT `resultats_indicateur_id_foreign` FOREIGN KEY (`indicateur_id`) REFERENCES `indicateurs` (`id`);

--
-- Contraintes pour la table `resultat_details`
--
ALTER TABLE `resultat_details`
  ADD CONSTRAINT `resultat_details_desagrege_id_foreign` FOREIGN KEY (`desagrege_id`) REFERENCES `desagreges` (`id`),
  ADD CONSTRAINT `resultat_details_resultat_id_foreign` FOREIGN KEY (`resultat_id`) REFERENCES `resultats` (`id`);

--
-- Contraintes pour la table `suivi_activites`
--
ALTER TABLE `suivi_activites`
  ADD CONSTRAINT `suivi_activites_activite_id_foreign` FOREIGN KEY (`activite_id`) REFERENCES `activites` (`id`),
  ADD CONSTRAINT `suivi_activites_commune_id_foreign` FOREIGN KEY (`commune_id`) REFERENCES `communes` (`id`);

--
-- Contraintes pour la table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`),
  ADD CONSTRAINT `zones_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
