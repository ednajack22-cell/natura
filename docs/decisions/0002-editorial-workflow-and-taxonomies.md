# 0002 — Workflow éditorial et taxonomies partagées

Date: 2 août 2026  
Statut: accepté

## Contexte

La première administration créait des brouillons mais ne les ouvrait pas dans un éditeur et ne les reliait pas au menu public. Les sous-rubriques du plan Word étaient absentes du site. Aucune révision ni action éditoriale n’était conservée.

## Décision

- Définir le menu public et ses sous-rubriques dans une source TypeScript partagée.
- Utiliser cette source dans l’en-tête public, les taxonomies admin et les formulaires de contenu.
- Après création, rediriger vers `/admin/content/[id]/edit`.
- Séparer identité, contenu, distribution, SEO et sources dans l’éditeur.
- Fournir un aperçu privé protégé avant publication.
- Enregistrer chaque mise à jour dans `content_revisions` et chaque action dans `editorial_events`.
- Protéger l’historique par RLS et accès administrateur uniquement.

## Conséquences

Le parcours éditorial est cohérent et traçable. La prochaine verticale doit remplacer les données plante statiques par un modèle PostgreSQL typé et rendre les pages publiques depuis les contenus publiés.
