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
7. **Shopping list, FAQ, and sources** : la liste « What you need » (collez
   le lien affilié dans « Link » : un bouton « See price » apparaît), les
   questions-réponses et les sources.

Le thème place tout seul la liste d'achat après la 2e partie du guide, et les
publicités aux bons endroits.

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

## Régler la page d'accueil

Apparence → Personnaliser → **Natura: home page** : le titre, le texte
d'introduction, l'adresse de votre profil Pinterest (affiche un bloc « Follow
on Pinterest ») et le code de votre formulaire d'inscription email (affiche un
bloc « Monthly planting reminder »).

La page d'accueil se remplit seule : types de plantes, dernières fiches,
derniers articles. Une section sans contenu ne s'affiche pas.

## Activer les publicités

Apparence → Personnaliser → **Natura: ads** : collez votre identifiant
d'éditeur AdSense (`ca-pub-…`) et l'identifiant du bloc d'annonces.
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

## Concevoir avec Google Stitch

Voir `design/STITCH.md` : la méthode, et des prompts prêts à copier pour
chaque page.

## Ce qui reste à faire

Fait : page d'accueil, fiches plantes (`/plants/cherry-tomato/`), liste des
plantes (`/plants/`), pages par type (`/plants/herbs/`), et la rubrique Plant
Care (fiches problèmes, articles par thème).

À venir : DIY Projects, Tools, Gear, puis le tableau de bord. Ces liens du menu
mènent encore à une page « Page not found ».
