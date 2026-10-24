# Natura pour WordPress

Ce dossier contient la version WordPress de Natura.

- `natura/` : le thème (présentation : en-tête, menu, pied de page, gabarits).
- `natura-core/` : l'extension qui gère le contenu (fiches plantes, types de
  plantes, fiches problèmes, rubriques Plant Care, champs). Le contenu est
  séparé du thème : changer ou mettre à jour le thème ne fait jamais disparaître
  vos fiches.
- `blueprint.json` : la recette qui installe le thème, l'extension et le contenu
  de démonstration (trois fiches plantes, deux fiches problèmes, deux articles)
  dans WordPress Playground.

## Voir le thème sans rien installer

Ouvrez ce lien dans votre navigateur (ordinateur ou téléphone). Un vrai
WordPress démarre dans la page, avec la dernière version du thème poussée sur la
branche de travail :

https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/ednajack22-cell/natura/claude/site-design-ux-analysis-2hwbga/wordpress/blueprint.json

- Vous êtes connecté comme administrateur : `/wp-admin` est accessible.
- Rien n'est conservé : chaque ouverture repart de zéro, avec la dernière
  version du thème. C'est fait pour regarder et tester, pas pour publier.
- Après chaque étape, rechargez simplement le lien.

## Installer le thème sur un vrai WordPress

1. Récupérez `natura.zip` (le thème) et `natura-core.zip` (l'extension).
   Pour les fabriquer depuis ce dossier : `./build-zips.sh` (ils arrivent dans
   `dist/`).
2. WordPress → Apparence → Thèmes → Ajouter → Téléverser un thème : `natura`.
3. WordPress → Extensions → Ajouter → Téléverser une extension : `natura-core`.
4. Activez les deux.

À l'activation, le thème crée trois menus modifiables dans
Apparence → Menus : « Main menu », « Footer columns » et « Legal links ».
Un emplacement qui a déjà un menu n'est jamais modifié.

## Travailler depuis un autre ordinateur

Tout le travail est enregistré sur GitHub, dans le dépôt
`ednajack22-cell/natura`, branche `claude/site-design-ux-analysis-2hwbga`.
Rien n'est stocké seulement sur un ordinateur.

- **Continuer avec Claude** : ouvrez https://claude.ai/code depuis n'importe
  quel ordinateur ou téléphone, avec le même compte. La conversation et la
  session sont dans la liste à gauche. Pour une nouvelle session, choisissez le
  dépôt `natura` et demandez de travailler sur la branche ci-dessus.
- **Voir le thème** : le lien Playground ci-dessus marche partout.
- **Avoir les fichiers sur l'ordinateur** :
  `git clone https://github.com/ednajack22-cell/natura.git`, puis
  `git checkout claude/site-design-ux-analysis-2hwbga`. Sans Git : sur GitHub,
  choisissez la branche, puis Code → Download ZIP.

## Ajouter une fiche plante

Administration → **Plants** → **Add plant guide** :

1. **Titre** : la question que les gens cherchent, par exemple
   « How to Grow Cherry Tomatoes in Pots ».
2. **Texte** : le guide complet, découpé en intertitres (titre de niveau 2).
   Chaque intertitre apparaît automatiquement dans « In this guide ».
3. **Extrait** (panneau de droite) : le résumé de 2 phrases sous le titre.
4. **Image mise en avant** : la photo principale.
5. **Plant types** : Vegetables, Herbs ou Fruit.
6. **Quick facts** (sous le texte) : soleil, pot, arrosage, récolte,
   difficulté, saison, l'image verticale pour Pinterest, et la **note de
   rusticité RHS** (H1a à H7, sur la page RHS de la plante : tomate H1c,
   fraisier H6…), utilisée par le Frost risk check.
7. **Shopping list, FAQ, and sources** : la liste « What you need », en
   cartes produit. Pour chaque produit : le nom, une étiquette facultative
   (« Best for small balconies »), une ligne d'explication, le lien affilié
   (un bouton « Check price » apparaît) et une photo. N'écrivez pas de prix :
   ils changent. Puis les questions-réponses et les sources.
8. **Image Pinterest** (dans Quick facts) : une image verticale 2:3 avec le
   titre dessus. Elle apparaît au milieu de la fiche avec un bouton « Save »,
   et sert quand un lecteur épingle la page.
9. **In short, and varieties to try** :
   - **In short** : 3 à 5 phrases courtes, l'essentiel de la fiche (affiché
     sous la photo, la réponse que Google reprend souvent). Uniquement ce que
     le texte explique ;
   - **Varieties to try** : les variétés qui réussissent en pot, chacune avec
     une ligne d'explication, un lien facultatif vers des graines ou des
     plants (lien affilié possible : la mention d'affiliation s'affiche) et
     une photo facultative.
10. **Planting calendar** : cochez les mois pour semer, planter et récolter.
    Ils s'affichent dans le tableau sur 12 mois de la fiche, dans la ligne
    « In October: harvest » sous le titre, dans le bloc du mois de
    l'accueil et sur les pages du calendrier (`/calendar/october/`).
11. **Sun** et **Growing spaces** (colonne de droite) : cochez la lumière
    (Full sun, Part shade, Shade) et les lieux (Windowsill, Balcony, Patio)
    qui conviennent, d'après ce que dit la fiche. La plante apparaît alors
    dans les listes `/plants/sun/full-sun/`, `/plants/space/balcony/`…, et la
    fiche affiche « Suits: Full sun · Balcony ».

Le thème place tout seul chaque bloc, selon `design/BLUEPRINT.md` : la liste
d'achat après la 2e partie, le bloc Pinterest après la 3e, les publicités après
la 1re et la 5e, et la colonne de droite (Pinterest, publicité 300×600, « Read
next »). Une mention d'affiliation s'affiche en haut de toute fiche qui contient
des liens affiliés.

Les fiches problèmes et les articles ont aussi une case **Pinterest image**,
dans la colonne de droite de l'éditeur.

## Plant Care : problèmes et articles

La rubrique Plant Care (`/plant-care/`) se remplit seule : d'abord les fiches
problèmes, puis, pour chaque thème, les 3 derniers articles. Un thème sans
article ne s'affiche pas.

| Adresse | Contenu |
| --- | --- |
| `/plant-care/` | la rubrique |
| `/problems/` | toutes les fiches problèmes |
| `/problems/yellow-leaves-container-plants/` | une fiche problème |
| `/plant-care/watering/` | les articles d'un thème |
| `/how-often-to-water-container-plants/` | un article |

**Ajouter une fiche problème** : Administration → **Plant problems** → **Add
problem guide**.

1. **Titre** : la question telle que les gens la tapent, par exemple
   « Why Are My Tomato Leaves Turning Yellow? ».
2. **Extrait** : la réponse courte, en 2 ou 3 phrases.
3. **Image mise en avant** : une photo du symptôme.
4. **Likely causes** : une ligne par cause, la plus probable d'abord.
   « What you see » est l'indice qui mène à cette cause ; il apparaît dans
   l'encadré « Most likely causes » en haut de la page. Puis « How to confirm
   it », « What to do » et « Recovery time ».
5. **Plants affected** (colonne de droite) : cochez les plantes concernées.
   La fiche plante affiche alors « Common problems », et la fiche problème
   « Plants this often affects ».
6. **Where it shows** (colonne de droite) : où se voit le problème
   (feuilles, fleurs ou fruits, tiges, racines ou terreau, toute la plante).
   Le Symptom checker pose cette question après celle de la plante.
7. **Texte** (facultatif) : ce qui ne rentre pas dans les causes, par exemple
   « How to prevent it ». Puis le matériel utile, la FAQ et les sources.

**Ajouter un article** : Articles → Ajouter. Choisissez **une** catégorie :
Watering, Soil & feeding, Light & position ou Seasonal care. Ce sont les thèmes
du menu. L'extrait sert de résumé sous le titre. Sous le texte, la case
« Shopping list, FAQ, and sources » marche comme pour les fiches plantes.

À l'activation, l'extension crée ces quatre catégories et règle le préfixe des
catégories sur `plant-care` (Réglages → Permaliens → Préfixe des catégories),
seulement s'il était vide. Les articles gardent des adresses courtes
(`/titre-de-l-article/`) : les mettre aussi sous `/plant-care/` entrerait en
conflit avec les adresses des thèmes.

## Natura Options (le panneau d'options du thème)

Menu **Natura Options** dans l'administration, réservé aux administrateurs.
Même présentation que les panneaux des thèmes premium (Redux) : bandeau vert
avec le nom et la version, onglets verticaux avec icônes, un sous-menu par
onglet dans la barre de gauche, boutons **Save Changes**, **Reset Section** et
**Reset All** en haut et en bas.

| Onglet | Contenu |
| --- | --- |
| Dashboard | Ce qui reste à régler avant le lancement, et le nombre de fiches |
| General | Logo, recherche de l'en-tête |
| Colours | Couleur principale et couleur d'accent ; une couleur trop claire pour du texte blanc est refusée |
| Home page | Photo d'ouverture, titre, introduction, sections de l'accueil, bloc « What to plant now » |
| Who writes Natura | Nom, rôle, bio, photo, lien ; encadré auteur des fiches |
| Guides | « At a glance », sommaire, questions-réponses, « Read next », fiches liées, **sources** (affichées par défaut ; continuez à les remplir même masquées) |
| Pages & lists | Choix des pages À propos, politique éditoriale, contact, **confidentialité**, mentions légales, **affiliation** ; textes des listes, de la page 404 et de la recherche vide ; blocs de la page Plant Care |
| DIY Projects | Texte de la page DIY Projects et les blocs des projets (en bref, méthode, avant de commencer, matériel et outils, plantes) |
| Gear | Texte de la page Gear, « How we choose products », et les blocs des guides d'achat (méthode, choix en bref, critères, tableau) |
| Tools | Texte de la page Tools ; interrupteur et texte de chaque outil (Plant finder…) |
| Calendar & lists | Introduction du calendrier, note sur le climat, bande des mois, compteurs, tableau de l'année, **travaux du mois** (un champ par mois) ; boutons « By light / By space » des listes et « Suits » des fiches |
| Pinterest & sharing | Profil, code de vérification du site, les boutons « Save » et « Follow », les bandeaux **Share** (fiches, outils, calendrier, listes) et l'image Pinterest de chaque outil |
| Affiliate products | **Our picks** et « What you need » : à masquer tant que vous n'avez pas de produits |
| Ads | Identifiants AdSense, et chaque emplacement de publicité |
| Newsletter | Formulaire et texte |
| Footer & social | Texte du pied de page ; Instagram, YouTube, Facebook, TikTok (aussi déclarés à Google) |
| SEO & Google | Vérification **Search Console** et **Bing** (collez la balise entière ou le code) ; **Google Analytics 4** avec le mode consentement de Google (pas de cookie avant accord en Europe, éditeurs connectés non comptés) |
| Content health | Le bilan du contenu : ce qui manque à chaque fiche (résumé, photo, image Pinterest, sources, liens vers d'autres fiches dans le texte, longueur, données des listes et des outils), et le nombre de fiches par thème, en signalant ceux qui en ont moins de 6 |
| Import / Export | Copier ou télécharger tous les réglages, les recharger ici ou sur un autre site ; les **10 dernières versions**, restaurables en un clic |

Une **recherche** en haut du panneau trouve n'importe quel réglage et y
emmène directement. Quitter une page avec des changements non enregistrés
demande confirmation ; **Reset All** demande de taper « reset ».

Le comparatif des panneaux actuels (Trellis de Mediavine, Feast, Newspaper,
Redux, GeneratePress, Blocksy, Kadence, Astra) qui a guidé ces choix est dans
`design/THEME-OPTIONS.md`.

Chaque bloc a un bouton **Show / Hide** (tout est sur Show par défaut) ; un
bloc reste aussi masqué tant qu'il n'a rien à montrer. Les valeurs sont les
mêmes que dans Apparence → Personnaliser, qui reste disponible pour l'aperçu
en direct (lien « Live preview » du bandeau).

## Régler la page d'accueil

Apparence → Personnaliser → **Natura: home page** :

- **Opening photo** : la photo à droite du titre, en haut. Prenez une vraie
  photo (au moins 1200 px de large) de votre balcon ou de vos pots ; sans
  elle, la photo de la fiche la plus récente est utilisée ;
- le titre et le texte d'introduction ;
- **Who writes Natura** : votre nom, votre rôle (« Grows vegetables on a 4 m²
  balcony since 2019 »), une courte bio et une photo. Le bloc s'affiche dès
  que le nom et la bio sont remplis. N'écrivez que des faits vrais : c'est ce
  que Google et les lecteurs vérifient ;
- **What to plant now** : le titre, l'introduction et le lien où le lecteur
  trouve ses dates de gel (par défaut, les normales climatiques de la NOAA) ;
- l'adresse de votre profil Pinterest (bouton « Follow ») et le code de votre
  formulaire de newsletter.

Le bloc **What to plant now** est fait pour les États-Unis. Le lecteur tape
la date moyenne de son dernier gel de printemps (et, s'il veut, celle du
premier gel d'automne). Le bloc affiche alors les plantes à semer à
l'intérieur, à semer dehors ou à planter dehors cette semaine, d'après la
partie **When to plant** de chaque fiche plante (semaines avant ou après le
gel, tirées des services d'extension américains). 6 cartes au plus, puis un
bouton « Show more » ; jamais une carte seule sur une ligne. Le navigateur
du lecteur garde ses dates pour sa prochaine visite. Pensez à remplir
**When to plant** et le **Short name** (« Cherry tomato ») de chaque nouvelle
fiche.

Le reste de la page d'accueil se remplit seul, à partir de vos fiches : la
fiche plante la plus récente en grand avec la liste des suivantes, la barre des
thèmes (types de plantes, problèmes, thèmes Plant Care), les problèmes avec
leur photo, « Our picks » (produits de vos listes d'achat qui ont un lien),
images Pinterest de vos fiches. **Chaque fiche a besoin d'une image mise en
avant.** Une section sans contenu ne s'affiche pas ; l'administrateur voit en
bas de page une ligne qui liste les réglages encore vides. Le détail, et
l'analyse des 12 pages d'accueil concurrentes, est dans `design/BLUEPRINT.md`.

## Pinterest

Le site est prêt pour le trafic Pinterest, sans script Pinterest (aucun code
tiers ni suivi avant le clic) :

- chaque fiche peut avoir une **image verticale 2:3** (case Pinterest image) ;
  le bouton « Save » l'utilise, avec le titre et le résumé de la fiche comme
  description ;
- les photos des fiches portent `data-pin-media` : si un lecteur enregistre la
  photo avec l'extension Pinterest ou le « Save » au survol, c'est l'image
  verticale qui part, avec le lien vers la fiche. Les petites images
  (vignettes, produits, portrait) portent `data-pin-nopin` ;
- **Rich Pins** : balises Open Graph sur chaque fiche (titre, résumé, photo,
  date de publication et de mise à jour, auteur) et sur la page d'accueil.
  Une fois le site en ligne, validez une fiche dans l'outil Rich Pins de
  Pinterest ; si une extension SEO (Yoast, Rank Math…) est active, c'est elle
  qui écrit ces balises ;
- **revendiquer le site** : Pinterest → Paramètres → Comptes revendiqués →
  Sites web → « Ajouter une balise HTML » ; collez le code dans Apparence →
  Personnaliser → Natura: home page → *Pinterest site verification code*.
  Votre profil s'affiche alors sur toutes les épingles du site et vous avez
  les statistiques du site ;
- l'adresse de votre profil Pinterest affiche le bouton « Follow » sur
  l'accueil et dans le pied de page.

## Partage (Pinterest, WhatsApp, Facebook, e-mail)

Un bandeau **Share** apparaît sur les fiches (plantes, problèmes, articles),
sous chaque outil, sur le calendrier et sur les listes de plantes :

- **Share** : le menu de partage du téléphone (WhatsApp, Instagram, SMS,
  Messenger…), seulement sur les téléphones et navigateurs qui en ont un ;
- **Pinterest**, **WhatsApp**, **Facebook**, **Email** et **Copy link**.

Ce sont de simples liens : aucun script ni cookie de ces réseaux. Un
**résultat d'outil se partage avec ses réponses** (« 3 plants for pots: Full
sun · Balcony », « Frost check at −3 °C: 2 plants to protect »), alors que
Google ne garde que la page de l'outil. Chaque page partagée a son aperçu :
titre, texte et image (la photo d'origine en JPEG, que tous les réseaux
lisent, plutôt que la copie WebP des pages). Chaque outil a une image
horizontale (aperçu WhatsApp et Facebook) et une image verticale (Pinterest)
fournies avec le thème ; vous pouvez remplacer l'image verticale dans Natura
Options → **Pinterest & sharing**, où se trouve aussi l'interrupteur de chaque
bandeau.

## Activer les publicités

Apparence → Personnaliser → **Natura: ads** : collez votre identifiant
d'éditeur AdSense (`ca-pub-…`) et l'identifiant du bloc d'annonces « dans le
texte ». Deux blocs facultatifs en plus, à créer dans AdSense :

- **Sidebar** (300×600, vertical) : la colonne de droite des fiches, sur
  ordinateur. Sans lui, le bloc « dans le texte » sert aussi là.
- **Multiplex** : la grille d'annonces en fin de fiche. Sans lui, rien ne
  s'affiche à cet endroit.

Sur une fiche : 2 annonces dans le texte au plus, 1 dans la colonne de droite,
1 multiplex à la fin. Dans les listes : 1 annonce après la première ligne, et
seulement s'il y a plus de 3 fiches.
Tant que ces champs sont vides, les visiteurs ne voient aucune publicité ;
vous, connecté en administrateur, voyez un cadre pointillé à chaque futur
emplacement. Avant d'activer les annonces pour l'Europe, configurez le message
de consentement de Google (AdSense → Confidentialité et messages).

## Modifier le menu

Apparence → Menus :

- un élément de premier niveau avec des sous-éléments devient un menu déroulant
  sur ordinateur et un accordéon sur téléphone ;
- le champ « Description » d'un élément (à activer dans « Options de l'écran »)
  devient la petite ligne sous le titre ;
- dans « Footer columns », chaque élément de premier niveau devient un titre de
  colonne, et ses sous-éléments les liens de la colonne.

## Publier les fiches prêtes (Outils → Natura starter guides)

L'extension contient des fiches terminées, écrites en anglais à partir de
sources citées : la RHS, et les livres décrits dans `design/sources/`.

1. Mettez à jour l'extension `natura-core` (téléversez le nouveau zip).
2. WordPress → Outils → **Natura starter guides** : la liste montre chaque
   fiche et si elle est déjà sur votre site.
3. Cliquez **Import as draft** sur une fiche, ou importez toutes les fiches
   manquantes en une fois. Chaque fiche arrive en **brouillon**.
4. Chaque brouillon reçoit des **images provisoires** dessinées par
   l'extension (voir ci-dessous). Ouvrez le brouillon et ajoutez vos liens
   affiliés dans « What you need ».
5. Relisez le texte, puis cliquez **Publier**.

### Images provisoires

En attendant vos vraies photos, chaque fiche sans image reçoit :

- une **photo principale provisoire** (1200 × 800) : un motif de feuilles aux
  couleurs de la rubrique, avec un médaillon « natura » et le nom de la
  rubrique (vert foncé pour les plantes, terre cuite pour les problèmes, vert
  sauge pour Plant Care, ocre pour les projets DIY, vert très foncé pour le
  matériel) ;
- une **image Pinterest provisoire** (1000 × 1500) : le même motif, puis le
  vrai titre de la fiche et le nom du site.

Ce sont des illustrations, pas de fausses photos. Elles sont dessinées sur
votre serveur (extension PHP GD, présente chez presque tous les hébergeurs).
Les lettres viennent de planches de caractères tirées des polices du site
(Newsreader et Inter), fournies dans l'extension : elles s'affichent même
sur un serveur sans FreeType, comme WordPress Playground. Pour refaire ces
planches : `python3 wordpress/tools/make-cover-glyphs.py`.

- Les fiches importées depuis cet écran les reçoivent automatiquement.
- Pour les fiches déjà sur le site sans image, cliquez **Add stand-in images**
  en haut de l'écran (15 fiches par clic ; recliquez jusqu'à ce que le bouton
  disparaisse).
- Pour remplacer une image : dans la fiche, changez l'image mise en avant ou
  la case Pinterest image. Une image que vous avez ajoutée n'est jamais
  remplacée.
- L'onglet Content health signale « Your own main photo » et « Your own
  Pinterest image » tant qu'une fiche garde une image provisoire : c'est
  votre liste de photos à faire. Les prompts sont dans
  `design/IMAGE-PROMPTS.md`.

Une fiche déjà présente sur le site, en brouillon ou publiée, n'est jamais
modifiée. Seuls les éditeurs et les administrateurs voient cet écran.
L'onglet Content health de Natura Options montre ce qu'il manque encore à
chaque fiche.

Nouvelles fiches : chaque lot est un fichier dans
`natura-core/includes/starter/`. Les fiches de démonstration (tomate,
basilic, fraisier, etc.) en font aussi partie. Elles arrivent sans les
photos de démonstration (avec des images provisoires) et sans les liens
`example.com`.

## Contenu de démonstration

Les liens affiliés de démonstration pointent vers `example.com` : ils servent
seulement à montrer les boutons « Check price ». Les photos produit viennent du
projet Stitch ; les images Pinterest ont été faites pour le site (titre et
points clés de chaque fiche). Remplacez tout cela par vos vrais produits, vos
liens et vos images.

## Concevoir avec Google Stitch

Voir `design/STITCH.md` : la méthode, et des prompts prêts à copier pour
chaque page. La structure de chaque type de page (ordre des blocs, publicités,
Pinterest, affiliation, règles de densité) est dans `design/BLUEPRINT.md`.

## Calendrier et listes par lumière et par lieu

Ces pages se remplissent seules avec les fiches plantes (points 10 et 11
ci-dessus) :

| Adresse | Contenu |
| --- | --- |
| `/calendar/` | toute l'année : chaque plante sur 12 mois, puis les mois |
| `/calendar/october/` | ce qu'on sème, plante et récolte en pot ce mois-là |
| `/plants/sun/full-sun/` | les plantes pour le plein soleil (aussi `part-shade`, `shade`) |
| `/plants/space/balcony/` | les plantes pour un balcon (aussi `windowsill`, `patio`) |

Une page qui liste **moins de 6 plantes** reste hors de Google (`noindex`) et
hors du plan du site ; elle y entre toute seule quand elle se remplit. Les
textes (introduction, note sur le climat) et les **travaux du mois** (une ligne
par travail, mois par mois) se règlent dans Natura Options → **Calendar &
lists**. Vous pouvez ajouter d'autres lieux ou niveaux de lumière dans Plants →
Sun ou Plants → Growing spaces.

## DIY Projects : projets pas à pas

| Adresse | Contenu |
| --- | --- |
| `/diy-projects/` | tous les projets, par catégorie |
| `/diy-projects/category/watering/` | une catégorie (Planters & boxes, Watering, Supports & trellis, Vertical & hanging) |
| `/diy-projects/self-watering-pot/` | un projet |

**Ajouter un projet** : Administration → **DIY projects** → **Add project**.
Titre, extrait, photo du projet fini, catégorie, puis la case **Project** :

1. **At a glance** : d'où viennent les instructions (« Built by us »
   seulement si vous l'avez construit vous-même, sinon « Adapted from a
   source » et citez-la), difficulté, durée, coût (un niveau, pas un prix),
   taille finie.
2. **Before you start** : ce qu'il faut vérifier sur un balcon (poids,
   écoulement de l'eau, vent, sécurité).
3. **Materials** (avec quantités) et **Tools** ; lien de boutique facultatif.
4. **Steps** : titre, ce qu'il faut faire, astuce et photo facultatives.
5. **FAQ** et **sources**. Dans la colonne de droite : **Plants to grow in
   it**.

Natura Options → **DIY Projects** : texte de la page et interrupteurs de
chaque bloc ; Ads → **DIY project ads**.

## Gear : guides d'achat

| Adresse | Contenu |
| --- | --- |
| `/gear/` | tous les guides d'achat, par catégorie |
| `/gear/category/compost-feed/` | une catégorie (Pots & planters, Compost & feed, Watering, Tools & supports) |
| `/gear/best-compost-for-pots/` | un guide d'achat |

**Ajouter un guide** : Administration → **Buying guides** → **Add buying
guide**. Titre, extrait (la réponse courte), photo, catégorie, puis la case
**Buying guide** :

1. **How the picks were chosen** : « Tested by us » seulement si vous avez
   utilisé chaque produit ; sinon « Researched, not tested ». C'est affiché
   aux lecteurs.
2. **What to look for** : les critères, chacun avec pourquoi il compte.
3. **Picks** : un produit par ligne, le meilleur d'abord : « Best for… »,
   verdict, points forts et faibles (un par ligne), caractéristiques au
   format `Label: value` (elles remplissent le tableau comparatif), lien de
   boutique (affilié possible) et photo. **Pas de prix.**
4. **FAQ** et **sources**.

Le texte de l'éditeur s'affiche après les choix (« How we chose », conseils).
Natura Options → **Gear** : textes de la page Gear et interrupteurs de chaque
bloc ; Ads → **Buying guide ads**.

## Outils (Tools)

| Adresse | Contenu |
| --- | --- |
| `/tools/` | la page des outils, rangés par groupe |
| `/tools/plant-finder/` | le Plant finder : lumière, lieu, type, expérience, ce mois-ci |
| `/tools/pot-size-calculator/` | le Pot size calculator : volume d'un pot rond, carré ou d'une jardinière (droit ou évasé), sacs de terreau à acheter, et taille de pot de chaque fiche |
| `/tools/watering-calculator/` | le Watering routine : saison, taille et matière des pots, soleil, chaleur, pluie ; la routine suit les conseils de la RHS (sources affichées) |
| `/tools/frost-risk/` | le Frost risk check : la température minimale annoncée cette nuit, comparée à la note de rusticité RHS de chaque fiche |
| `/tools/guided-diagnosis/` | le Symptom checker : la plante, puis où se voit le problème ; il répond avec les fiches problèmes et le « What you see » de chaque cause |

Le Plant finder répond avec vos fiches : remplissez **Sun**, **Growing
spaces**, **Plant types**, **Difficulty** et le **Planting calendar** de
chaque fiche. Natura Options → **Tools** : texte de la page, interrupteur et
texte de chaque outil. La publicité des outils (sous l'outil, jamais
au-dessus) a son interrupteur dans **Ads**. Les autres outils arrivent un par
un (voir `design/TOOLS.md`).

## Ce qui reste à faire

Fait : page d'accueil, fiches plantes (`/plants/cherry-tomato/`), liste des
plantes (`/plants/`), pages par type (`/plants/herbs/`), la rubrique Plant
Care (fiches problèmes, articles par thème), le calendrier (`/calendar/`) et
les listes par lumière et par lieu, la page Tools, le Plant finder, le Symptom checker, le Pot size calculator, le Frost risk check et le Watering routine, la section Gear (guides d'achat) et DIY Projects.

Toutes les pages du plan sont construites. À faire ensuite : le contenu (voir
Natura Options → Content health) et les retouches que vous avez notées. Le Garden planner est remplacé par un guide « How
to arrange pots in a small space » (à rédiger, avec ses sources). Ces liens du menu
mènent encore à une page « Page not found ».
