# Natura — audit senior frontend/backend et benchmark

Date: 2 août 2026  
Périmètre: application locale Next.js + Supabase, site public, studio éditorial et schéma PostgreSQL.

## Verdict

La fondation technique est cohérente, mais l’application n’était pas encore un CMS professionnel complet. Les principaux écarts étaient le menu public sans sous-rubriques, la création de contenu qui quittait le workflow après l’insertion, l’absence d’éditeur relié à l’inventaire, l’absence d’aperçu privé et l’absence d’historique éditorial.

Le lot du 2 août corrige ces écarts de structure. La prochaine priorité est de supprimer la duplication entre les fiches statiques dans le code et les contenus PostgreSQL en construisant une verticale plante réellement pilotée par la base.

## Diagnostic de l’erreur d’hydratation

La trace fournie contient `bis_register`, `bis_skin_checked` et un identifiant d’extension injecté dans le DOM. Ces attributs ne viennent pas de Natura. Next.js cite explicitement les extensions de navigateur qui modifient le HTML parmi les causes connues de mismatch d’hydratation.

Actions:

- les racines HTML tolèrent désormais les attributs externes inévitables;
- aucune branche `window`, valeur aléatoire ou structure HTML invalide n’a été trouvée dans le dashboard;
- la compilation de production et TypeScript restent les contrôles de référence;
- si l’extension continue à ajouter des attributs à chaque `div`, elle doit être désactivée pour `localhost` afin d’éliminer le bruit de développement. Il ne faut pas masquer globalement toutes les vraies erreurs React.

Source: [Next.js — React hydration error](https://nextjs.org/docs/messages/react-hydration-error).

## Benchmark de référence

### Sanity Studio

Sanity sépare les outils de haut niveau — structure, dashboard et présentation — et permet d’organiser les documents en listes, vues, menus et panneaux adaptés au modèle éditorial. Les releases regroupent des changements, offrent validation, aperçu et programmation.

Application à Natura:

- navigation admin groupée par workflow et domaine;
- éditeur distinct du dashboard;
- aperçu privé;
- future gestion des versions, tâches et publications programmées.

Sources: [Studio tools](https://www.sanity.io/docs/studio/studio-tools), [Structure tool](https://www.sanity.io/docs/studio/structure-introduction), [Content releases](https://www.sanity.io/docs/studio/content-releases).

### Directus

Directus traite la liste de contenus comme un module métier: recherche, tri, import/export, layouts configurables, pages collection et pages item. Les Content Versions sont des copies non publiées promouvables lorsque prêtes.

Application à Natura:

- bibliothèque filtrable;
- page d’édition par contenu;
- historique PostgreSQL;
- prochaine étape: pagination, sélection multiple, duplication, export et restauration d’une révision.

Sources: [Content module](https://docs.directus.io/user-guide/content-module/content), [Content versions](https://docs.directus.io/reference/system/versions).

### Contentful

Contentful propose un aperçu dans l’éditeur ou dans un nouvel onglet, pour brouillons et contenus publiés, avec séparation entre API de diffusion et API d’aperçu.

Application à Natura:

- route d’aperçu privée distincte;
- aucun contenu brouillon exposé publiquement;
- prochaine étape: aperçu côte à côte et sélecteur mobile/desktop.

Source: [Content preview](https://www.contentful.com/developers/docs/tutorials/preview/content-preview/).

### Supabase/PostgreSQL

Supabase Storage s’appuie sur RLS pour contrôler les fichiers; les uploads ne sont pas autorisés sans politiques explicites. PostgreSQL fournit une recherche plein texte indexable.

Application à Natura:

- buckets locaux limités aux images et aux types MIME prévus;
- politiques RLS pour contenus, médias, révisions et événements;
- index administrateur ajouté;
- prochaine étape: médiathèque d’upload complète puis recherche publique via index FTS.

Sources: [Storage](https://supabase.com/docs/guides/storage), [Storage access control](https://supabase.com/docs/guides/storage/security/access-control), [Full Text Search](https://supabase.com/docs/guides/database/full-text-search).

## Écarts constatés avant correction

### Frontend

- Les sous-menus du document Word n’étaient pas présents.
- Les pages de rubrique ne représentaient qu’une partie des sous-rubriques prévues.
- La navigation mobile ne permettait pas d’explorer la hiérarchie complète.
- Le dashboard n’exposait pas les statuts et types comme navigation opérationnelle.
- La bibliothèque présentait les lignes sans ouvrir un éditeur.
- Aucun aperçu de brouillon n’existait.

### Backend

- La création redirigeait vers `/admin` au lieu d’ouvrir le contenu créé.
- Le contenu n’était pas rattaché à une section/sous-section publique.
- Aucune révision ni action éditoriale n’était enregistrée.
- Le champ `updated_at` n’était pas systématiquement piloté par un workflow complet.
- Les autres verticales éditoriales (guides, problèmes, calendriers et avis) n’ont pas encore leur gabarit public dynamique.
- La recherche publique ne consulte pas encore l’index PostgreSQL.
- La médiathèque affiche les actifs mais l’upload, le crédit, la licence et la sélection depuis l’éditeur restent à réaliser.

## Améliorations réalisées

- Méga-menus publics et navigation mobile avec toutes les sous-rubriques du plan.
- Rubriques publiques complétées et ancres stables.
- Sidebar admin groupée: workflow, knowledge base et opérations.
- Filtres directs: brouillons, révision, publiés et types.
- Taxonomies partagées entre site public et administration.
- Création reliée au menu public.
- Redirection immédiate vers l’éditeur du contenu créé.
- Éditeur avec identité, contenu, distribution, SEO, sources et contrôles de préparation.
- Aperçu privé protégé.
- Actions sauvegarder, soumettre en révision, publier et archiver.
- Révisions et journal éditorial enregistrés dans PostgreSQL.
- Index de filtrage administrateur.
- En-têtes HTTP de sécurité et formats d’images modernes.
- Actions explicites « Edit published » et « SEO report » dans la bibliothèque.
- Rapport SEO avant publication avec note sur 100, erreurs bloquantes et recommandations.
- Publication refusée côté serveur si les exigences SEO obligatoires ne sont pas satisfaites.
- Dérogation éditoriale explicite: l’administrateur peut conserver le brouillon ou confirmer « Publish anyway »; le choix, la note et les contrôles non résolus sont enregistrés avec le contenu.
- Éditeur de plante structuré: botanique, catégorie, lumière, pot, arrosage, saison, image, accessibilité, espaces adaptés, méthode et problèmes.
- Accueil, bibliothèque, recherche, sitemap et fiches de plantes alimentés par les contenus publiés dans PostgreSQL.
- URL canonique et JSON-LD sécurisé sur les fiches de plantes.
- Stratégie de mots-clés par article: requête principale, requêtes secondaires, intention et détection de répétition excessive.
- Médiathèque Supabase avec import validé, dimensions, MIME, poids, texte alternatif, crédit et licence.
- Sélection directe d’une image de la médiathèque depuis l’éditeur plante.

## Architecture prioritaire restante

### P0 — Verticale plante pilotée par PostgreSQL — réalisée le 3 août 2026

1. Les champs structurés sont enregistrés en JSONB dans `content_items.body` pour cette première verticale.
2. L’éditeur typé et les contrôles de publication sont opérationnels.
3. Les pages publiques lisent PostgreSQL avec un repli local sûr vers les données historiques.
4. La revalidation est exécutée après chaque sauvegarde ou changement de statut.
5. La suppression définitive du repli `lib/plants.ts` interviendra après validation éditoriale des trois fiches migrées.
6. Dix-sept tests PostgreSQL ainsi que le parcours navigateur principal sont validés.

### P1 — Médiathèque et workflow éditorial

1. Upload sécurisé vers le bucket brouillon.
2. Validation MIME, poids, dimensions et nom de fichier.
3. Alt text, crédit, licence et recadrage.
4. Sélection d’image depuis l’éditeur.
5. Promotion vers le bucket public lors de la publication.
6. Restauration d’une révision et comparaison des versions.
7. Publication programmée et calendrier réel.

### P1 — Bibliothèque professionnelle

1. Pagination serveur et filtres PostgreSQL.
2. Tri, colonnes configurables et vues enregistrées.
3. Sélection multiple, archivage et duplication.
4. Compléter les alertes déjà présentes (SEO, sources et image) par les liens cassés et la fraîcheur.
5. États vides, chargement et erreur dédiés.

### P2 — Recherche et qualité publique

1. Recherche PostgreSQL FTS avec classement et suggestions.
2. Pages publiques issues des contenus publiés.
3. Breadcrumbs, JSON-LD et canonical par contenu.
4. Tests de navigation, accessibilité et performance.
5. Error tracking et métriques en préproduction.

## Décision

La verticale plante prouve désormais le parcours de bout en bout. Le prochain lot recommandé est la médiathèque professionnelle (upload, crédit, licence et sélection dans l’éditeur), puis le gabarit dynamique des guides et problèmes de plantes.
