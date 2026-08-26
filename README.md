# Natura

Plateforme anglophone de jardinage pratique pour les balcons, patios, contenants et petits espaces.

## État actuel

- direction visuelle premium responsive ;
- accueil éditorial et bibliothèque de plantes ;
- trois fiches complètes : tomate cerise, basilic Genovese et fraisier de balcon ;
- recherche PostgreSQL plein texte sur tous les contenus publiés, avec pertinence, suggestions et filtres ;
- sept outils publics : Plant Finder, calendrier mensuel, risque de gel, planner de petit espace, guide d’observation, calculateur de pot et routine d’observation pour l’arrosage, avec calculs PostgreSQL et hypothèses visibles ;
- métadonnées SEO, sitemap, robots.txt et données structurées ;
- Supabase local avec PostgreSQL, Auth et Storage ;
- studio éditorial privé avec dashboard, bibliothèque de contenus, édition explicite des articles publiés, rapport SEO et mots-clés avant publication, éditeur de plantes structuré, médiathèque avancée avec brouillons privés, droits d’usage, remplacement, recadrage et suppression protégée, calendrier, réglages et création de brouillons ;
- politiques RLS actives et vérification du rôle administrateur dans PostgreSQL.

## Démarrage de l’interface

```bash
pnpm install
pnpm dev
```

Puis ouvrir `http://localhost:3000`.

## Base locale

Docker Desktop doit être démarré, puis :

```bash
pnpm supabase:start
pnpm supabase:reset
pnpm db:test
pnpm db:types
```

L’interface Supabase Studio est disponible sur `http://127.0.0.1:54323` lorsque les services locaux sont actifs.

## Administration locale

L’interface privée est disponible sur `http://localhost:3000/admin`. Elle comprend la bibliothèque filtrable, l’éditeur relié aux taxonomies publiques, l’aperçu privé, les statuts de workflow, les révisions et le journal éditorial. Les identifiants temporaires sont enregistrés uniquement dans le fichier local ignoré `.env.local`.

Pour recréer ou resynchroniser le compte après une nouvelle installation :

```bash
pnpm admin:bootstrap
```

## Contrôles

```bash
pnpm lint
pnpm typecheck
pnpm build
```

La feuille de route complète se trouve dans `Natura_Plan_Detaille_Realisation.docx`.
