# Audit UX / UI et monétisation de Natura (13 octobre 2026)

Objectif : vérifier si les pages publiques sont bien conçues, si elles sont trop chargées
(informations ou éléments de design inutiles) et si elles sont prêtes pour un modèle
**AdSense + affiliation + trafic gratuit Pinterest**.

## Méthode

- Build de production (`pnpm build`, OK) servi en local avec Supabase local et le contenu des migrations.
- 17 pages types capturées en **mobile (390 px)** et **desktop (1440 px)** avec Playwright.
- Mesures automatiques par page : hauteur en écrans, nombre de mots, position du H1 et du premier
  paragraphe, emplacements publicitaires, taille de police réelle de chaque mot, débordement horizontal.
- Lecture du code des templates (`app/**/page.tsx`, `components/*`, `app/globals.css`).

Le trafic Pinterest est majoritairement mobile : **le mobile est la référence de cet audit.**

## Verdict en une phrase

La direction visuelle est belle et cohérente (desktop surtout), mais les pages sont **longues en
design et courtes en contenu**, le texte est **trop petit sur mobile**, et le site **ne contient
presque aucun point de monétisation** là où arrivera le trafic Pinterest (fiches plantes,
problèmes, projets).

---

## 1. Bugs à corriger tout de suite (P0)

| # | Problème | Où | Preuve |
|---|----------|----|--------|
| 1 | **Flèche SVG géante** (300 px et plus) dans les liens « Problems connected / Projects / Seasonal timing ». Le label et le titre sont aussi collés (« wateringYellow leaves… »). | Fiches plantes | `fiche-plante-fleche-geante-mobile.jpg`. Cause : `.related-problem-links a` n'a pas de règle `svg { width }` (`app/globals.css:887`). |
| 2 | **Toute la page déborde horizontalement sur mobile** (749 px de large pour un écran de 390 px). | Comparatifs `/reviews/*` | `comparatif-debordement-mobile.jpg`. Le tableau a `min-width: 760px` et la media query remplace `minmax(0,1fr)` par `1fr` sur `.review-detail-layout`. Corriger en `grid-template-columns: minmax(0, 1fr)`. |
| 3 | **11 fiches plantes sur 15 utilisent la même photo générique** (balcon), avec un `alt` qui ne correspond pas à la plante. | `/grow`, accueil, fiches | `lib/plant-content.ts:55`, image de repli `natura-balcony-hero.jpg`. Mauvais pour Pinterest, Google Images et l'accessibilité. |
| 4 | **L'épingle Pinterest générée utilise toujours la même photo**, quelle que soit la page, avec un titre fin et la moitié inférieure vide. | `/social/pin` | `epingle-pinterest-actuelle.jpg` |
| 5 | **« Start here », 1er lien du menu, ne mène nulle part** : 6 cartes, toutes « Collection in development », 0 lien. | `/start-here` | Même chose sur `/plant-care` et `/small-space-gardening` (10 cartes « en développement » sur 14). |
| 6 | **« Articles » est dans le menu, mais `/learn` est vide** (75 mots, aucun article publié dans les données). | `/learn` | Les emplacements AdSense et les encarts d'affiliation des articles ne s'affichent donc jamais. |

## 2. Lisibilité : le texte est trop petit

Part des mots affichés **sous 14 px** et **sous 12 px** sur mobile :

| Page | < 14 px | < 12 px |
|------|--------:|--------:|
| Accueil | 64 % | 17 % |
| Bibliothèque `/grow` | 84 % | 17 % |
| Fiche plante | 47 % | 38 % |
| Problème | 65 % | 59 % |
| Projet (guide) | 67 % | 41 % |
| Comparatif | 67 % | **63 %** |
| Calendrier | 70 % | **70 %** |
| Plant Finder | 71 % | 40 % |

La feuille de style contient plus de 250 déclarations entre `.6rem` et `.72rem` (9,6 à 11,5 px).
Les étapes de soin, causes, actions, avantages et inconvénients (le contenu utile) sont justement
en 10 à 12 px, en gris clair (#65756d) sur fond crème.

**Recommandation** : texte courant à 16–18 px minimum, métadonnées à 13–14 px minimum, contraste
4,5:1. C'est le gain UX le plus important et le moins coûteux, et il augmente aussi la durée de
session, ce qui compte pour les revenus AdSense.

## 3. Pages trop chargées : ce qui est inutile

### Constat global : beaucoup de design, peu de contenu

| Page (mobile) | Hauteur | Mots | Remarque |
|---------------|--------:|-----:|----------|
| Accueil | **11,9 écrans** | 546 | ≈ 46 mots par écran |
| `/grow` | **15,2 écrans** | 668 | 1 carte à grande photo par écran |
| Fiche plante | 7,9 écrans | 355 | Le H1 n'apparaît qu'à 684 px, après la photo |
| Comparatif | 8,4 écrans | 567 | |

Chaque section empile 3 niveaux de titres : *eyebrow* en majuscules + gros titre serif + phrase
d'intro (5 à 8 *eyebrows* par page). Visuellement élégant, mais le lecteur fait défiler beaucoup
avant d'arriver à une information concrète.

### Éléments à supprimer ou à réduire

**Global**
- **Barre d'annonce** au-dessus du header (« Explore the first plant collection ») : en double avec
  le menu, et elle prend 34 px de hauteur sur mobile sur chaque page. → Supprimer.
- **Bloc pied de page « Useful ideas, timed to the season »** : un gros bloc sombre sans newsletter.
  → Le remplacer par une inscription email (utile pour la rétention) ou le supprimer.
- **Lien « Editorial team sign-in » dans le footer public** → à retirer (inutile pour les lecteurs,
  et il signale l'URL d'administration).

**Accueil**
- Chiffres du hero « 100 % small-space focused » et « 0 miracle claims » : ce sont des slogans
  déguisés en statistiques. → Supprimer.
- Bandeau « Field-tested structure · Source-aware advice… » : du remplissage. → Supprimer.
- Texte sur l'anonymat du classement (« The order is based on anonymous, aggregate searches… »)
  et « Search activity is still building… » : ce sont des notes internes. → Supprimer.
- Les sections « Start with the decision in front of you », « Seasonal guidance… » et le bloc
  final « Build a garden that fits your life » répètent la même invitation trois fois.
  → Garder **une seule** section « Par où commencer » avec 3 liens.
- Accueil recommandé : hero court → plantes populaires (avec de vraies photos) → « Ce qu'il faut
  faire ce mois-ci » → derniers guides/épingles. Objectif : 4 à 5 écrans sur mobile.

**Fiche plante (page d'arrivée Pinterest n°1)**
- Phrase « Named contributor profiles are still being verified for public launch » (aussi sur
  problèmes, guides et comparatifs) : elle donne l'impression d'un site inachevé. → La retirer.
- Panneau « Calendar priorities for this growing context » : environ 1 écran de vert foncé
  **avant** la méthode de culture, avec un avertissement de 45 mots et des tâches en double
  (« Reduce watering frequency » apparaît 2 fois). → Le placer après la méthode, en 2 ou 3 lignes.
- Bloc sombre « Observation is your best gardening tool » : générique, identique sur toutes les
  fiches. → Supprimer.
- Le contenu lui-même est **mince** : la méthode de la tomate cerise tient en 2 étapes d'une phrase
  chacune. Pour un lecteur qui vient de Pinterest comme pour Google, c'est la partie à enrichir
  (semis, rempotage, tuteurage, arrosage, engrais, taille, récolte, erreurs fréquentes, FAQ).

**Problème / guide**
- Encadré « Before you act » : le même texte générique sur chaque page de problème. → Une ligne,
  ou rien.
- Les symptômes sont dans des boîtes bordées de 10–12 px. → Une simple liste à puces en 16 px.

**Comparatif**
- Les mêmes informations reviennent 3 fois : tags du hero (« Research-based »), encadré
  « Commercial disclosure » et colonne « Evidence record ». → Une seule mention, claire, en haut.
- Tableau en 9,6 px : illisible sur mobile. → Sur mobile, des cartes produit plutôt qu'un tableau.

## 4. Monétisation

### AdSense : les emplacements ne sont pas là où arrive le trafic

| Gabarit | Emplacements `AdSlot` |
|---------|----------------------:|
| Articles `/learn/*` | 3 (mais aucun article publié) |
| Comparatifs `/reviews/*` | 2 |
| Calendriers | présents |
| **Fiches plantes** | **0** |
| **Problèmes** | **0** |
| **Projets (guides)** | **0** |

Les fiches plantes, problèmes et projets sont exactement les pages qu'on épingle sur Pinterest.
Le composant `AdSlot` est bien fait (hauteur réservée, donc pas de CLS) : il suffit de le placer.

**Placement recommandé** (sans gêner la lecture) :
- jamais au-dessus du H1 ni avant la première réponse utile ;
- 1 emplacement après la fiche d'identité / les faits essentiels ;
- 1 emplacement au milieu du contenu (après environ 40 % du texte) ;
- 1 emplacement avant les liens connexes ;
- sur desktop, une colonne latérale *sticky* (la mise en page en 2 colonnes existe déjà).

Il faut d'abord **plus de contenu par page** : avec 300 mots, 3 annonces pèseraient trop, et
Google AdSense refuse souvent les sites jugés « contenu à faible valeur ».

### Affiliation : actuellement, presque zéro revenu possible

- Les 3 comparatifs sont déclarés **« no affiliate link »** et comparent des **catégories**
  (« Built-in reservoir planter ») et non des produits achetables : aucun bouton « Check price »
  ne s'affiche.
- Les encarts `GearCallout` n'existent que dans les articles, qui sont vides.
- Les meilleurs emplacements naturels ne sont pas exploités :
  - **Fiche plante** → encart « Ce qu'il vous faut » : pot de 20–30 L, tuteur, terreau, engrais
    tomate, graines (c'est déjà dans les données : `potSize`, `care`).
  - **Projet (guide)** → la liste « Materials » est du texte brut : c'est l'endroit idéal pour des
    liens d'affiliation.
  - **Problème** → humidimètre, savon noir, filet anti-insectes, etc.
- Garder la transparence (c'est un point fort du site), mais en **une ligne** près des liens,
  pas en trois blocs.

### Pinterest : le site n'est pas encore conçu pour les épingles

- Bouton « Save to Pinterest » présent **seulement sur les fiches plantes**, et en bandeau rouge
  qui coupe la page juste après l'auteur. → Le mettre aussi sur problèmes, projets et calendriers,
  et en survol des images (bouton discret).
- Épingle générée : même photo partout, titre fin, moitié vide. Une épingle qui marche sur
  Pinterest a une **photo propre à la plante**, un **titre très gros et contrasté** sur l'image,
  une **promesse concrète** (« 7 erreurs qui tuent votre basilic », « Tomates en pot : le guide
  semaine par semaine ») et le nom du site.
- Prévoir **2 ou 3 visuels verticaux (2:3) par page** (infographie de soin, calendrier,
  avant/après) : un lecteur Pinterest arrive pour l'image, il doit la retrouver dans la page.
- Le lecteur Pinterest survole la page : il lui faut, en haut, un **résumé « En bref »** (lumière,
  pot, arrosage, récolte). La grille `profile-facts` existe déjà : la placer juste sous le titre
  et la rendre plus visible.
- Les métadonnées Open Graph / Article sont déjà là (bonne base pour les Rich Pins) : valider le
  domaine sur Pinterest une fois en production.

## 5. Ce qui est déjà bien (à garder)

- Identité visuelle cohérente et haut de gamme, belle typographie de titres, bonnes photos là où
  elles existent (tomate, basilic, fraisier, radis).
- Header et navigation clairs sur desktop ; menu organisé selon les besoins du lecteur.
- `AdSlot` avec hauteur réservée (pas de décalage de mise en page).
- Données structurées, fil d'Ariane, sources visibles, transparence commerciale.
- Pas de pop-up ni de bannière intrusive.

## 6. Plan d'action par priorité

**Semaine 1 : corrections rapides (surtout du CSS)**
1. Corriger la flèche géante et le débordement mobile du comparatif (P0 n° 1 et 2).
2. Augmenter la taille de base du texte : passer les `.6–.72rem` du contenu à `1rem`, les
   métadonnées à `.82–.875rem`.
3. Retirer la barre d'annonce, les phrases internes (« still being verified », « still
   building »), le bloc « Observation is your best gardening tool », les slogans du hero.
4. Retirer du menu les pages vides (« Start here », « Articles ») tant qu'elles n'ont pas de contenu.

**Semaines 2 à 4 : contenu et images**
5. Une vraie photo par plante (verticale + horizontale).
6. Enrichir chaque fiche plante à environ 1 200–1 800 mots utiles, avec FAQ.
7. Refaire le modèle d'épingle (photo de la page, gros titre, promesse) et ajouter le bouton
   d'enregistrement sur tous les gabarits de contenu.

**Mois 2 : monétisation**
8. Ajouter `AdSlot` aux fiches plantes, problèmes et projets (2–3 par page + colonne latérale desktop).
9. Encart « Ce qu'il vous faut » avec liens d'affiliation sur fiches et projets ; comparatifs de
   **produits réels** (marques et modèles) avec boutons « Voir le prix ».
10. Simplifier l'accueil à 4–5 écrans sur mobile.

## Annexes

Captures dans `docs/audit-ux-2026-10-13/` :
- `fiche-plante-fleche-geante-mobile.jpg`
- `comparatif-debordement-mobile.jpg`
- `accueil-mobile-12-ecrans.jpg` (accueil mobile complet, en 4 colonnes)
- `epingle-pinterest-actuelle.jpg`
