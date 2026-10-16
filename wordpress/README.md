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
   difficulté, saison, et l'image verticale pour Pinterest.
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
    « In October: harvest » sous le titre, et dans le bloc du mois de
    l'accueil.

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
6. **Texte** (facultatif) : ce qui ne rentre pas dans les causes, par exemple
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
| Home page | Photo d'ouverture, titre, introduction, sections de l'accueil, travaux du mois |
| Who writes Natura | Nom, rôle, bio, photo, lien ; encadré auteur des fiches |
| Guides | « At a glance », sommaire, questions-réponses, « Read next », fiches liées, **sources** (affichées par défaut ; continuez à les remplir même masquées) |
| Pages & lists | Choix des pages À propos, politique éditoriale, contact, **confidentialité**, mentions légales, **affiliation** ; textes des listes, de la page 404 et de la recherche vide ; blocs de la page Plant Care |
| Pinterest | Profil, code de vérification du site, les boutons « Save » et « Follow » |
| Affiliate products | **Our picks** et « What you need » : à masquer tant que vous n'avez pas de produits |
| Ads | Identifiants AdSense, et chaque emplacement de publicité |
| Newsletter | Formulaire et texte |
| Footer & social | Texte du pied de page ; Instagram, YouTube, Facebook, TikTok (aussi déclarés à Google) |
| SEO & Google | Vérification **Search Console** et **Bing** (collez la balise entière ou le code) ; **Google Analytics 4** avec le mode consentement de Google (pas de cookie avant accord en Europe, éditeurs connectés non comptés) |
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
- **This month: extra items** : ce qu'il y a à faire ce mois-ci en plus des
  fiches, une ligne par élément, avec un lien facultatif après une barre
  verticale (`Garlic | /plants/garlic/`) ;
- l'adresse de votre profil Pinterest (bouton « Follow ») et le code de votre
  formulaire de newsletter.

Le bloc **This month** se remplit seul à partir du **Planting calendar** de
chaque fiche plante (cases à cocher Sow / Plant out / Harvest par mois, sous le
texte de la fiche) : pensez à le remplir pour chaque nouvelle fiche, ainsi que
le **Short name** (« Cherry tomato ») dans Quick facts.

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

## Ce qui reste à faire

Fait : page d'accueil, fiches plantes (`/plants/cherry-tomato/`), liste des
plantes (`/plants/`), pages par type (`/plants/herbs/`), et la rubrique Plant
Care (fiches problèmes, articles par thème).

À venir : DIY Projects, Tools, Gear, puis le tableau de bord. Ces liens du menu
mènent encore à une page « Page not found ».
