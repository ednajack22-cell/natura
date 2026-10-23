# Structure des pages Natura

Ce document fixe, pour chaque type de page, l'ordre des blocs et la place des
revenus : AdSense, Pinterest, affiliation. Il vient de l'analyse des 17 écrans
du projet Stitch « Garden Website AdSense Integration », en particulier
« Monetized Garden Article », « Pinterest-Optimized Diagnostic Guide »,
« Plant Library Directory », « Soil Hub with Native In-Feed AdSense Grid » et
« AdSense Revenue & Placement Performance Hub ».

## Règles communes : l'équilibre entre qualité et quantité

1. **Une page, un but.** Une fiche répond à une question ; une liste aide à
   choisir ; l'accueil oriente. Chaque bloc doit servir ce but.
2. **Une section n'apparaît qu'avec assez de contenu.** Grilles : au moins
   2 éléments, et la grille s'adapte au nombre (2 éléments prennent toute la
   largeur, jamais une colonne vide). **Jamais une carte seule sur sa ligne**
   (demande du 21 octobre 2026) : les listes
   montrent 12 fiches par page (4 lignes de 3, 6 lignes de 2) ; quand le
   nombre ne tombe pas juste, les dernières cartes passent à 2 par ligne,
   plus larges ; une carte seule sur tablette ou une liste d'une seule
   fiche devient une carte large, photo à côté du texte. Une liste « à côté » d'une grande carte
   demande au moins 2 éléments, sinon les cartes passent côte à côte.
3. **La réponse avant la publicité.** Aucune annonce au-dessus du titre ni
   avant le premier encadré utile (« At a glance »).
4. **Densité publicitaire.** Sur une fiche : 2 annonces dans le texte au plus
   (après la section 1, après la section 5), 1 annonce collante dans la colonne
   de droite (300×600, la plus rentable selon l'écran AdSense de Stitch),
   1 bloc « multiplex » en fin de page. Les annonces restent sous 30 % de
   l'écran. Hauteur réservée pour chaque emplacement (pas de saut de page).
   Chaque annonce porte la mention « Advertisement ».
5. **Affiliation honnête.** Mention d'affiliation **en haut** de toute page qui
   contient des liens affiliés, avant le premier lien. Pas de prix écrits en
   dur (ils changent ; Amazon l'interdit hors API) : bouton « Check price ».
   Liens en `rel="sponsored nofollow"`.
6. **Pinterest à trois endroits** : bouton « Save » sur la photo principale,
   bloc « Save this guide » avec l'image verticale au milieu du texte, et
   rappel dans la colonne de droite.
7. **Rien d'inventé** : pas de statistiques, notes, badges « lab tested »,
   experts ou nombres d'enregistrements qui n'existent pas.

## Fiche (plante, problème, article)

Ordre, de haut en bas :

1. Fil d'Ariane.
2. Étiquette (« Growing guide · Vegetables », « Plant problem », thème).
3. Titre H1, résumé (l'extrait), ligne auteur et date, bouton Pinterest.
4. Mention d'affiliation, si la fiche contient des liens affiliés.
5. Deux colonnes sur ordinateur (8 + 4 sur une grille de 12) :
   - **Colonne principale** :
     1. photo principale avec légende ;
     2. **In short** (plante) : 3 à 5 points, la réponse en quelques lignes
        (« À retenir » d'Au Jardin) ;
     3. **At a glance** : faits clés avec icônes (plante, comme Gardeners'
        World), causes probables (problème) ;
     4. **Planting calendar** (plante) : tableau sur 12 mois, semer / planter
        / récolter, mois en cours encadré (RHS « Month by month »,
        Gardeners' World) ; sous le titre, la ligne « In October: harvest » ;
     5. **In this guide** : sommaire numéroté sur deux colonnes ;
     4. sections numérotées « 01. », « 02. »… ;
     5. après la section 1 : annonce ;
     6. après la section 2 : **What you need**, cartes produit avec image ;
     7. après la section 3 : bloc Pinterest avec l'image verticale ;
     8. après la section 5 : annonce ;
     9. **Varieties to try** (plante) : cartes variété (RHS « Recommended
        varieties », Gardening Know How) ;
     10. FAQ, sources, encadré auteur ;
     11. **Read next** : liste numérotée de 1 à 5 fiches du même type, titres
         seuls avec une ligne grise (type, thème), même terme d'abord
         (type de plante, partie touchée puis plantes, thème, catégorie),
         puis les plus récentes. Affichée à partir de 2 fiches. Elle remplace
         l'ancienne liste « Read next » de la colonne de droite et les
         grilles « More plants / Other problems / More on… » : une seule
         liste, jamais deux fois sur téléphone (BENCH-PRESSE, point 9).
   - **Colonne de droite**, collante : bloc Pinterest, annonce 300×600.
6. Pleine largeur : « Common problems » (plante), plantes concernées
   (problème), puis bloc multiplex.

Lecture (octobre 2026, BENCH-PRESSE, points 3 et 4) : barre de progression
de 3 px en haut de l'écran sur les fiches ; en-tête qui se cache en
descendant et revient en remontant sous 1024 px. Chaque point a son
interrupteur dans Natura Options. La colonne de texte limitée à 50ch a été
retirée le 23 octobre 2026 (demande du site) : le texte prend toute la
largeur de la colonne, comme la photo.

Sur téléphone, une seule colonne : la colonne de droite passe après le texte,
sans son annonce (le texte en a déjà deux).

## Liste de fiches (plantes, problèmes, thème)

1. Fil d'Ariane, titre, introduction, filtres.
2. Cartes « catalogue » : photo 4:3 avec étiquette, titre, nom botanique,
   2 lignes de résumé, grille soleil / pot / eau / difficulté, bouton.
   3 par ligne sur ordinateur, 1 sur téléphone.
3. Après la 1re ligne (3 cartes), annonce pleine largeur « in-feed »,
   seulement sur les pages d'au moins 6 fiches.
4. Pagination, centrée, juste sous les cartes (boutons de 44 px).
5. Bandeau vert foncé vers les problèmes (« Plant looking unwell? »).

## Accueil (version du 14 octobre 2026, d'après les 12 pages d'accueil)

### Ce que montrent les captures (`design/benchmark/`)

Les 12 pages d'accueil ont été relues, sur ordinateur et sur téléphone.

| Site | Ce qu'il fait | Ce que Natura en retient |
| --- | --- | --- |
| Gerbeaud | Un article à la une avec grande photo, à côté le mot de l'auteur avec sa photo ; puis des rangées de 3 cartes (photo au-dessus, titre dessous) ; listes texte « Dernières parutions », « Les plus » ; bandes de couleur pleines (orange, turquoise) | Une seule grande photo, des listes texte entre les cartes, des bandes de couleur |
| Gardening Know How | Article à la une, puis 4 cartes ; bandeau « Trending: Seeds to plant in October » sous le menu ; « Meet the experts » | Le bloc du mois, la page auteur |
| GrowVeg | Grande photo à la une + 4 petites cartes, deux fois ; thèmes en **boutons texte avec icône** (Plant Guides, Pest Guides) | Thèmes en boutons, pas en photos |
| Balcony Garden Web | Mosaïque en haut ; sections « une rangée de 3 cartes » ; colonne « Gardening Ideas » en **liste à petites vignettes** à côté d'une grille | La liste à vignettes à côté de l'article principal |
| Au Jardin | Une grande photo, puis une grille dense de cartes ; « Plantes de saison » en ronds sur bande sombre | Le bloc de saison sur bande de couleur |
| Gardeners' World | Carrousel à la une, rangées de 4 cartes, bandes « Reviews », bloc magazine | Les guides d'achat (plus tard, section Gear) |
| RHS | Texte de présentation + petites tuiles ; « Gardening tasks for October » ; grandes photos pour les portes d'entrée | Le bloc du mois, la promesse en haut |
| Epic Gardening | Boutique : bandeaux produits, grandes tuiles photo « Learn with Epic » | Seule à mettre des tuiles photo partout : à ne pas suivre pour un site de conseils |
| Crocus, Promesse de fleurs | Boutiques : grandes photos promotionnelles, prix, réassurance | Peu utile pour un site de conseils |
| Missouri Botanical Garden, SNHF | Institutions : actualités, horaires, agenda | Peu utile |

**Règles qui en sortent :**

1. **Une seule grande photo par section** (l'article à la une). Ailleurs, des
   cartes moyennes (photo au-dessus, titre dessous) ou des **listes à petites
   vignettes**. Jamais la même photo deux fois en haut de page.
2. **Thèmes en boutons texte** avec icône et nombre de fiches.
3. **Pas de grands vides** : marges de section de 2,5 à 3,5 rem, colonnes qui
   se remplissent quel que soit le nombre d'éléments (un texte d'introduction
   prend la place libre à côté des épingles ou du bloc du mois).
4. Les **bandes de couleur** séparent les sections ; deux bandes qui se
   suivent se touchent.

### Ordre des blocs

1. **Bande d'ouverture** : promesse, titre H1, recherche à gauche sur vert
   forêt ; photo réelle à droite, dans la largeur de la page, aux coins
   arrondis et avec de l'air autour (Personnaliser → Opening photo). La
   recherche de l'en-tête est masquée sur l'accueil : une seule barre de
   recherche par écran.
2. **Barre des thèmes** : boutons texte (types de plantes, problèmes, thèmes
   Plant Care) avec le nombre de fiches.
3. **New on Natura** : la fiche plante la plus récente en grand (bouton
   Pinterest « Save » sur la photo), à côté la liste à vignettes des 4 fiches
   et articles suivants.
4. **What to plant now** (bande vert sauge), version américaine du
   21 octobre 2026 : le lecteur tape ses dates de gel ; une carte par plante
   à semer ou planter cette semaine (photo, action en couleur, soleil et
   taille de pot), d'après les semaines « When to plant » de chaque fiche.
   6 cartes au plus, lignes toujours pleines. Remplace l'ancien bloc par
   mois, qui suivait le calendrier britannique.
5. « More growing guides » : cartes moyennes, seulement pour les fiches que la
   liste n'a pas montrées (au moins 2).
6. **La seule annonce de la page.**
7. Bande vert foncé des problèmes, avec petite photo et cause la plus
   fréquente.
8. **Our picks** : 3 cartes compactes (photo à gauche), bouton « Check
   price » sur toute la largeur de la carte, mention d'affiliation **avant**
   les cartes.
9. Bande Pinterest : texte à gauche, épingles verticales à droite ; sur
   téléphone, deux épingles par ligne, toutes visibles. Un espace la sépare
   du pied de page.
10. « More from Plant Care » : articles que la liste n'a pas montrés.
11. **Who writes Natura** et newsletter, chacun seulement s'il est réglé ;
    pour l'administrateur, une ligne liste ce qui reste à régler.

Données structurées : `WebSite` (avec la recherche du site) et
`Organization` (logo, profil Pinterest, fondateur si le bloc auteur est
rempli), sauf si une extension SEO les fournit déjà.

Ajouts prévus quand les pages correspondantes existeront :

- tuiles **Tools** (calendrier mensuel, Plant finder) ; le lien du bloc
  « What to plant now » vers les fiches est fait ;
- rangée de **guides d'achat** (section Gear), à la place ou à côté de
  « Our picks ».

## Ordre des pages suivantes

1. ~~Fiche plante : frise des 12 mois, conditions cliquables (soleil,
   espace), `data-pin-media` pour Pinterest.~~ Fait. Reste « Similar
   plants » par conditions, quand il y aura assez de fiches.
2. ~~Calendrier mensuel `/calendar/[mois]/` et pages de conditions
   (`/plants/sun/full-sun/`, `/plants/space/balcony/`), non indexées tant
   qu'elles ont moins de 6 plantes.~~ Fait : voir `CALENDAR.md`.
3. ~~Plant finder (filtres, non indexé).~~ Fait, avec la page Tools : voir
   `TOOLS.md`, qui donne aussi l'ordre des autres outils.
4. ~~Gear : guides d'achat avec critères, verdict et tableau comparatif.~~
   Fait : voir `GEAR.md`.
5. ~~DIY Projects, puis les autres outils.~~ Fait : voir `DIY.md` et
   `TOOLS.md`.

## Plant Care

1. Titre, introduction, filtres par thème.
2. Panneau des problèmes, puis « Three checks » avant tout traitement.
3. Annonce.
4. Par thème : 3 derniers articles et lien vers la suite.
