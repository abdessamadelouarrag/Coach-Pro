# 🏋️‍♂️ Coach-Pro

> Une plateforme web moderne facilitant la communication entre athlètes et entraîneurs professionnels
> 

[GitHub Stars](https://img.shields.io/github/stars/abdessamadelouarrag/Coach-Pro?style=social)

[GitHub Forks](https://img.shields.io/github/forks/abdessamadelouarrag/Coach-Pro?style=social)

[PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue)

---

## 📋 Table des matières

- [À propos](https://claude.ai/chat/8e098541-2420-4a77-b424-1dbc56819db3#-%C3%A0-propos)
- [Fonctionnalités](https://claude.ai/chat/8e098541-2420-4a77-b424-1dbc56819db3#-fonctionnalit%C3%A9s)
- [Technologies utilisées](https://claude.ai/chat/8e098541-2420-4a77-b424-1dbc56819db3#-technologies-utilis%C3%A9es)
- [Prérequis](https://claude.ai/chat/8e098541-2420-4a77-b424-1dbc56819db3#-pr%C3%A9requis)
- [Installation](https://claude.ai/chat/8e098541-2420-4a77-b424-1dbc56819db3#-installation)
- [Structure du projet](https://claude.ai/chat/8e098541-2420-4a77-b424-1dbc56819db3#-structure-du-projet)
- [Configuration](https://claude.ai/chat/8e098541-2420-4a77-b424-1dbc56819db3#-configuration)
- [Utilisation](https://claude.ai/chat/8e098541-2420-4a77-b424-1dbc56819db3#-utilisation)
- [Diagrammes UML](https://claude.ai/chat/8e098541-2420-4a77-b424-1dbc56819db3#-diagrammes-uml)
- [Contribution](https://claude.ai/chat/8e098541-2420-4a77-b424-1dbc56819db3#-contribution)
- [Auteur](https://claude.ai/chat/8e098541-2420-4a77-b424-1dbc56819db3#-auteur)
- [Licence](https://claude.ai/chat/8e098541-2420-4a77-b424-1dbc56819db3#-licence)

---

## 🎯 À propos

**Coach-Pro** est une plateforme web innovante qui connecte les sportifs en quête de soutien personnalisé avec des entraîneurs professionnels qualifiés. La plateforme propose un système complet de gestion des profils, de recherche de coachs par spécialité, et un système de prise de rendez-vous intégré pour faciliter la réservation de séances sportives.

### Objectifs du projet

- **Faciliter l'accès** au coaching sportif professionnel
- **Simplifier la recherche** de coachs spécialisés
- **Optimiser la gestion** des disponibilités et réservations
- **Offrir une expérience** utilisateur fluide et intuitive

---

## ✨ Fonctionnalités

### 👥 Pour les Sportifs

- ✅ Création de compte et authentification sécurisée
- 🔍 Recherche avancée de coachs par spécialité
- 👤 Consultation détaillée des profils de coachs
- 📅 Visualisation des disponibilités en temps réel
- 📝 Réservation simplifiée de séances sportives
- 📊 Tableau de bord personnel avec historique des réservations

### 🧑‍🏫 Pour les Coachs

- 👨‍💼 Gestion complète du profil professionnel
- 🏆 Mise en avant des spécialités et certifications
- 📸 Upload de photos et portfolio
- 🗓️ Gestion flexible des disponibilités
- 📋 Consultation et suivi des réservations
- 💬 Communication avec les clients

### 🔐 Système d'authentification

- 🔒 Connexion sécurisée avec hashage des mots de passe
- 🎭 Gestion des rôles (Sportif / Coach)
- 🔄 Système de sessions utilisateur
- 🚪 Déconnexion sécurisée

---

## 🛠️ Technologies utilisées

### Frontend

[HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)

[CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

[TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)

[JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

### Backend

[PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

[MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

### Outils & Méthodologie

- **UML** - Modélisation (Diagrammes de cas d'utilisation, diagrammes de classes)
- **ERD** - Modèle entité-relation pour la base de données
- **Git & GitHub** - Contrôle de version
- **XAMPP/WAMP** - Environnement de développement local

---

## 📦 Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- **PHP** >= 7.4
- **MySQL** >= 5.7 ou **MariaDB** >= 10.2
- **Apache** ou tout autre serveur web
- **Composer** (recommandé pour la gestion des dépendances)
- **XAMPP** ou **WAMP** (pour un environnement de développement local)

---

## 🚀 Installation

### 1. Cloner le dépôt

```bash
git clone https://github.com/abdessamadelouarrag/Coach-Pro.git
cd Coach-Pro

```

### 2. Configuration du serveur local

**Pour XAMPP:**

```bash
# Déplacer le projet dans le dossier htdocs
mv Coach-Pro /Applications/XAMPP/htdocs/
# ou sur Windows
move Coach-Pro C:\xampp\htdocs\

```

**Pour WAMP:**

```bash
# Déplacer le projet dans le dossier www
mv Coach-Pro /wamp/www/
# ou sur Windows
move Coach-Pro C:\wamp\www\

```

### 3. Configuration de la base de données

1. Démarrer **Apache** et **MySQL** depuis XAMPP/WAMP
2. Ouvrir **phpMyAdmin** dans votre navigateur : `http://localhost/phpmyadmin`
3. Créer une nouvelle base de données :
    
    ```sql
    CREATE DATABASE coach_pro CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
    
    ```
    
4. Importer le fichier SQL :
    - Cliquer sur la base de données `coach_pro`
    - Aller dans l'onglet **Importer**
    - Sélectionner le fichier `database/coach_pro.sql`
    - Cliquer sur **Exécuter**

### 4. Configuration de l'application

Créer un fichier de configuration ou modifier le fichier existant :

```php
// config/database.php
<?php
$connect = mysqli_connect($host, $user, $password, $dbname);
?>

```

### 5. Lancement de l'application

Ouvrir votre navigateur et accéder à :

```
http://localhost/Coach-Pro

```

ou

```
http://localhost:8000

```

---

## 📂 Structure du projet

```
Coach-Pro/
│
├── 📁 Diagrammes/              # Diagrammes UML et ERD
│   ├── use_case.png
│   ├── class_diagram.png
│   └── erd.png
│
├── 📁 Pages/                   # Pages de l'application
│   ├── login.php
│   ├── register.php
│   ├── dashboard.php
│   ├── coaches.php
│   └── booking.php
│
├── 📁 Public/                  # Ressources publiques
│   ├── 📁 css/
│   │   ├── style.css
│   │   └── tailwind.css
│   ├── 📁 js/
│   │   ├── main.js
│   │   └── booking.js
│   └── 📁 images/
│       └── coaches/
│
├── 📁 database/                # Base de données
│   ├── coach_pro.sql
│   └── migrations/
│
├── 📁 includes/                # Fichiers PHP réutilisables
│   ├── config.php
│   ├── functions.php
│   └── db_connect.php
│
├── 📄 .gitignore
├── 📄 README.md
└── 📄 index.php                # Point d'entrée principal

```

---

## 💻 Utilisation

### Inscription et Connexion

1. Accéder à la page d'accueil
2. Cliquer sur **S'inscrire** ou **Se connecter**
3. Remplir le formulaire avec vos informations
4. Choisir votre rôle (Sportif ou Coach)

### Pour les Sportifs

1. **Rechercher un coach** : Utilisez la barre de recherche ou les filtres par spécialité
2. **Consulter le profil** : Cliquez sur un coach pour voir ses détails
3. **Réserver une séance** : Sélectionnez une date et heure disponible
4. **Gérer vos réservations** : Accédez à votre tableau de bord

### Pour les Coachs

1. **Compléter votre profil** : Ajoutez vos spécialités, photos et description
2. **Gérer vos disponibilités** : Définissez vos créneaux horaires
3. **Consulter les réservations** : Suivez vos rendez-vous depuis votre dashboard
4. **Communiquer** : Échangez avec vos clients

---

## 📊 Diagrammes UML

Le projet inclut plusieurs diagrammes de modélisation dans le dossier `Diagrammes/` :

### Diagramme de cas d'utilisation

Représente les interactions entre les acteurs (Sportifs et Coachs) et le système.

### Diagramme de classes

Illustre la structure orientée objet de l'application.

### Diagramme ERD (Entity-Relationship Diagram)

Montre le modèle de données et les relations entre les entités.

---

## 🤝 Contribution

Les contributions sont les bienvenues ! Pour contribuer :

1. **Fork** le projet
2. Créer une branche pour votre fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. Commit vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une **Pull Request**

### Directives de contribution

- Respecter les conventions de codage PHP PSR-12
- Commenter le code de manière appropriée
- Tester les nouvelles fonctionnalités
- Mettre à jour la documentation si nécessaire

---

## 👨‍💻 Auteur

**Abdessamad Elouarrag**

- GitHub: [@abdessamadelouarrag](https://github.com/abdessamadelouarrag)
- LinkedIn: [Votre profil LinkedIn](https://linkedin.com/in/votreprofil)
- Email: votre.email@exemple.com

---

## 📝 Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

---

<div align="center">

**⭐ Si ce projet vous a été utile, n'hésitez pas à lui donner une étoile ! ⭐**

Made with ❤️ by [Abdessamad Elouarrag](https://github.com/abdessamadelouarrag)

</div>
