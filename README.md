# Programme de Formation Développeur Fullstack PHP
> Formation intensive de 15 jours pour développeur Fullstack PHP/Symfony/React

## 🚀 Installation de l'environnement de développement

### Prérequis système
```bash
# Vérification des versions installées
php -v        # PHP 8.2 minimum requis
node -v       # Node.js 18+ recommandé
docker -v     # Docker 24+ recommandé
git --version # Git 2.35+ recommandé
```

### Installation des outils de base
```bash
# Installation de Composer (macOS avec Homebrew)
brew install composer

# Installation de Composer (Linux)
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Installation de Node.js via NVM
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.0/install.sh | bash
nvm install 18
nvm use 18

# Installation de Docker
# macOS
brew install docker
# Ubuntu
sudo apt-get update
sudo apt-get install docker-ce docker-ce-cli containerd.io
```

### Configuration de l'environnement PHP
```bash
# Installation des extensions PHP requises
sudo apt-get install php8.2-xml php8.2-mysql php8.2-pgsql php8.2-curl

# Installation des outils globaux
composer global require symfony/cli
npm install -g @vue/cli
npm install -g @vitejs/create-vite
```

## 📚 Structure du projet de formation

```bash
# Création de la structure du projet
mkdir formation-fullstack
cd formation-fullstack

# Initialisation du repo Git
git init
git flow init

# Création des dossiers principaux
mkdir backend frontend docker docs projets-test
```

### Backend (Jours 1-4)
```bash
# Installation de Symfony
symfony new backend --webapp
cd backend

# Installation des dépendances Symfony
composer require api
composer require symfony/maker-bundle --dev
composer require doctrine/doctrine-fixtures-bundle --dev
composer require symfony/test-pack --dev

# Configuration de la base de données
# Éditer le .env:
DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=15&charset=utf8"
```

### Frontend (Jours 8-10)
```bash
# Création du projet React avec Vite
npm create vite@latest frontend -- --template react-ts
cd frontend

# Installation des dépendances
npm install
npm install @reduxjs/toolkit react-redux
npm install react-router-dom
npm install axios
npm install @tanstack/react-query
```

### Docker (Jours 5-7)
```bash
# Création des fichiers Docker
touch docker-compose.yml
mkdir docker/nginx
mkdir docker/php
touch docker/nginx/nginx.conf
touch docker/php/Dockerfile
```

Contenu du `docker-compose.yml`:
```yaml
version: '3.8'

services:
  php:
    build:
      context: ./docker/php
    volumes:
      - ./backend:/var/www/html
    
  nginx:
    image: nginx:alpine
    ports:
      - "8080:80"
    volumes:
      - ./backend:/var/www/html
      - ./docker/nginx/nginx.conf:/etc/nginx/conf.d/default.conf
    
  postgres:
    image: postgres:15-alpine
    environment:
      POSTGRES_USER: app
      POSTGRES_PASSWORD: !ChangeMe!
      POSTGRES_DB: app
    ports:
      - "5432:5432"
```

## 📝 Projets pratiques

### Projet 1: API RESTful (Jours 1-2)
```bash
# Création des entités
php bin/console make:entity
php bin/console make:migration
php bin/console doctrine:migrations:migrate

# Création des contrôleurs
php bin/console make:controller
```

### Projet 2: API Platform (Jours 3-4)
```bash
# Configuration API Platform
composer require api

# Création des ressources API
# Ajouter les annotations dans les entités:
# #[ApiResource]
```

### Projet 3: Frontend React (Jours 8-10)
```bash
# Démarrage du serveur de développement
cd frontend
npm run dev

# Build pour production
npm run build
```

## 🔧 Tests

```bash
# Tests Backend
cd backend
php bin/phpunit

# Tests Frontend
cd frontend
npm run test
```

## 🚦 CI/CD (Jour 5-7)

Créer un fichier `.gitlab-ci.yml`:
```yaml
stages:
  - test
  - build
  - deploy

test:
  stage: test
  script:
    - composer install
    - php bin/phpunit

build:
  stage: build
  script:
    - docker-compose build

deploy:
  stage: deploy
  script:
    - docker-compose up -d
```

## 📖 Stack secondaire (Jours 11-12)

### Go
```bash
# Installation de Go
wget https://golang.org/dl/go1.21.linux-amd64.tar.gz
sudo tar -C /usr/local -xzf go1.21.linux-amd64.tar.gz

# Création d'un projet Go
mkdir go-project
cd go-project
go mod init example/go-project
```

### Python
```bash
# Installation de Python et virtualenv
sudo apt-get install python3-venv
python3 -m venv venv
source venv/bin/activate

# Installation de Django
pip install django
django-admin startproject myproject
```

## 📊 Suivi de progression

Créez un fichier `PROGRESS.md` à la racine du projet:
```markdown
# Journal de progression

## Jour 1
- [ ] Installation de l'environnement
- [ ] Concepts PHP 8
- [ ] Bases Symfony

[etc...]
```

## 🔍 Ressources supplémentaires

- Documentation Symfony: https://symfony.com/doc/current/index.html
- Documentation API Platform: https://api-platform.com/docs/
- Documentation React: https://react.dev/
- Documentation Docker: https://docs.docker.com/
- Documentation PostgreSQL: https://www.postgresql.org/docs/

## 🤝 Contribution

1. Fork le projet
2. Créer une branche feature (`git checkout -b feature/AmazingFeature`)
3. Commit les changements (`git commit -m 'Add some AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrir une Pull Request

## 📝 License

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.