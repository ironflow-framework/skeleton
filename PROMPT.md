# Prompt de publication Packagist pour `ironflow/skeleton`

Tu veux créer un starter officiel IronFlow installable en une ligne avec Composer. Ce dépôt Packagist doit contenir tout ce qu’il faut pour démarrer un projet avec IronFlow, sans config manuelle.

---

## 🎯 Objectif

Créer un dépôt GitHub packagé sous le nom :

```json
"name": "ironflow/skeleton"
```

Publier ce dépôt sur Packagist pour permettre :

```bash
composer create-project ironflow/skeleton nom-du-projet
```

---

## ✅ Contenu minimal du projet

Voici les dossiers et fichiers à inclure dans le dépôt :

```
ironflow-skeleton/
├── app/                    # Modules métiers (vide ou exemple)
├── bootstrap/
│   └── app.php            # Initialise le Kernel
├── config/                # Fichiers de configuration basique
├── public/
│   └── index.php          # Entrypoint (web)
├── routes/
│   └── web.php            # Routes de base
├── storage/               # Dossier pour logs et cache (peut être vide)
├── .gitignore
├── composer.json
├── README.md
```

---

## 🧠 Détails importants

### `composer.json` du skeleton

```json
{
  "name": "ironflow/skeleton",
  "description": "Squelette de projet officiel pour le framework IronFlow.",
  "type": "project",
  "license": "MIT",
  "require": {
    "php": ">=8.1",
    "ironflow/core": "^1.0"
  },
  "autoload": {
    "psr-4": {
      "App\\": "app/",
      "Modules\\": "app/Modules"
    }
  },
  "scripts": {
    "post-create-project-cmd": [
      "@php forge key:generate"
    ]
  },
  "minimum-stability": "dev",
  "prefer-stable": true
}
```

---

## 🚀 Étapes pour publication

1. Crée un nouveau dépôt GitHub : `ironflow-skeleton`
2. Pousse la structure ci-dessus
3. Va sur [packagist.org](https://packagist.org/packages/submit)
4. Ajoute l'URL du repo GitHub
5. Packagist indexera le package : test avec `composer create-project ironflow/skeleton nom-projet`

---

## 🛠 Bonus futur (non requis maintenant)

* Ajouter des presets (`--api`, `--auth`, etc.) via des tags Git ou branches
* Ajouter des modules exemples dans `app/`
* Pré-intégrer Docker et Vite

---

Prêt à publier 🔥
