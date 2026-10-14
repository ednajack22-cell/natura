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
   largeur, jamais une colonne vide). Une liste « à côté » d'une grande carte
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
     2. **At a glance** : faits clés (plante), causes probables (problème) ;
     3. **In this guide** : sommaire numéroté sur deux colonnes ;
     4. sections numérotées « 01. », « 02. »… ;
     5. après la section 1 : annonce ;
     6. après la section 2 : **What you need**, cartes produit avec image ;
     7. après la section 3 : bloc Pinterest avec l'image verticale ;
     8. après la section 5 : annonce ;
     9. FAQ, sources, encadré auteur.
   - **Colonne de droite**, collante : bloc Pinterest, annonce 300×600,
     guides populaires (3, numérotés).
6. Pleine largeur : « Common problems » (plante), plantes concernées
   (problème), puis 4 fiches liées, puis bloc multiplex.

Sur téléphone, une seule colonne : la colonne de droite passe après le texte,
sans son annonce (le texte en a déjà deux).

## Liste de fiches (plantes, problèmes, thème)

1. Fil d'Ariane, titre, introduction, filtres.
2. Cartes « catalogue » : photo 4:3 avec étiquette, titre, nom botanique,
   2 lignes de résumé, grille soleil / pot / eau / difficulté, bouton.
   3 par ligne sur ordinateur, 1 sur téléphone.
3. Après la 1re ligne (3 cartes), annonce pleine largeur « in-feed ».
4. Bandeau vert foncé vers les problèmes (« Plant looking unwell? »).
5. Pagination.

## Accueil (refaite le 14 octobre 2026, version photo)

La première version, fidèle à l'écran Stitch « Mobile Homepage », était trop
pâle : beige sur beige, des encadrés de texte, peu de photos. Les sites qui
dominent la niche (Gardeners' World, RHS, Epic Gardening, Gardening Know How ;
captures dans `design/benchmark/`) font l'inverse : **une photo dans chaque
bloc, des bandes de couleur pleine largeur, des titres posés sur les photos**.
L'accueil suit maintenant cette logique, avec les couleurs Natura (en-tête et
pied de page vert forêt, boutons terre cuite).

1. **Photo d'ouverture** pleine largeur (Personnaliser → Opening photo), voile
   vert foncé à gauche : étiquette, titre H1, introduction, recherche, liens
   rapides vers les principales sections.
2. **Start with these guides** : mosaïque façon RHS, une grande tuile (avec le
   bouton Pinterest « Save ») et deux à côté, titres sur la photo.
3. **This month in your pots: [mois]** (bande vert sauge) : cartes photo des
   fiches à semer, planter ou récolter ce mois-ci, avec une pastille de
   couleur par action ; « Also now » à côté.
4. **Explore by topic** : 6 tuiles photo (types de plantes, problèmes, thèmes
   Plant Care), comme « Learn with Epic Gardening ».
5. « Popular growing guides » : les fiches qui ne sont pas dans la mosaïque
   (au moins 2, sinon la section n'apparaît pas).
6. **La seule annonce de la page.**
7. Bande vert foncé « Something wrong with a plant? » : chaque problème avec
   sa photo et sa cause la plus fréquente.
8. **Our picks** : 3 produits avec grande photo ; mention d'affiliation
   **avant** les cartes.
9. Bande « Save ideas for later » : les images Pinterest verticales.
10. Derniers articles Plant Care, avec photo.
11. Bande de fin : **Who writes Natura** et newsletter côte à côte, chacun
    seulement s'il est réglé. Pour l'administrateur, une ligne liste ce qui
    reste à régler (plus de grands cadres vides).

Données structurées : `WebSite` (avec la recherche du site) et
`Organization` (logo, profil Pinterest, fondateur si le bloc auteur est
rempli), sauf si une extension SEO les fournit déjà.

Ajouts prévus quand les pages correspondantes existeront :

- tuiles **Tools** (calendrier mensuel, Plant finder), lien du bloc « This
  month » vers la page du mois ;
- rangée de **guides d'achat** (section Gear), à la place ou à côté de
  « Our picks ».

## Ordre des pages suivantes

1. Fiche plante : frise des 12 mois, conditions cliquables (soleil, espace),
   « Similar plants » par conditions, `data-pin-media` pour Pinterest.
2. Calendrier mensuel `/calendar/[mois]/` et pages de conditions
   (`/plants/sun/full-sun/`, `/plants/space/balcony/`), non indexées tant
   qu'elles ont moins de 6 plantes.
3. Plant finder (filtres, non indexé).
4. Gear : guides d'achat avec critères, verdict et tableau comparatif.
5. DIY Projects, puis les autres outils.

## Plant Care

1. Titre, introduction, filtres par thème.
2. Panneau des problèmes, puis « Three checks » avant tout traitement.
3. Annonce.
4. Par thème : 3 derniers articles et lien vers la suite.
