# Outils (Tools) : analyse et choix (octobre 2026)

Analyse faite avant de construire `/tools/` et chaque outil. Captures
ordinateur (1440 px) et téléphone (390 px) du 17 octobre 2026, plus celles du
14 octobre (RHS, Missouri Botanical Garden). Monrovia bloque les navigateurs
automatisés.

## Pages étudiées

| Site | Outil | Ce qui marche | Ce qui gêne |
| --- | --- | --- | --- |
| **RHS** | Find a plant | Lumière en grandes vignettes (plein soleil, mi-ombre, ombre), boutons « Find a plant » et « Reset all » en haut et en bas | Formulaire très long (sol, couleur, saison, taille…) pensé pour le jardin, pas pour les pots |
| **Gardenia** | Plant Finder | Filtres à gauche (type, zone, lumière, eau), cartes avec lumière, entretien, taille | 10 000 plantes, filtres repliés sur téléphone, cartes chargées |
| **Missouri Botanical Garden** | Plant Finder | Recherche par nom ou par caractéristiques | Formulaire de 15 champs, mise en page datée, inutilisable au téléphone |
| **Hicks Nurseries** | Plant Finder (herbes) | Liste avec lumière, hauteur, étalement | Catalogue de jardinerie |
| **Old Farmer's Almanac** | Soil Calculator, Plant Problem ID, Frost Dates | Calcul en 2 champs (diamètre, profondeur) et nombre de sacs ; diagnostic en 3 étapes (plante, partie touchée, symptôme) | Fenêtre d'inscription plein écran avant l'outil, publicité dans l'outil ; dates de gel seulement pour les États-Unis |
| **Omni Calculator** | Potting Soil Calculator | Trois formes de pot (rectangle, rond, pot évasé) | Grande publicité au-dessus, vidéo flottante |
| **Empress of Dirt** | Soil calculator | Conseil utile : prévoir un peu plus, le terreau se tasse | Calculateur noyé dans un long article |
| **lastfrostdate.co.uk** | Last frost date | Code postal britannique, gel d'air et gel au sol, données Met Office | Une seule fonction ; beaucoup de texte promotionnel |
| **UC IPM** | Plant problem diagnostic tool | Plante → partie touchée → dégâts : la méthode de référence | Pensé pour la Californie et les professionnels |
| **Maquette Stitch du site** | Tools directory | Outils rangés en 3 groupes (identifier, choisir, calculer), carte avec « Requires : … » | Chiffres inventés (« 140+ conditions », « 850+ cultivars ») : non repris |

## Ce que Natura retient

1. **L'outil d'abord** : ni fenêtre d'inscription ni publicité au-dessus.
   Une seule annonce, sous l'outil, avec son interrupteur (Ads → Tools ad).
2. **Les réponses viennent des fiches du site**, jamais de chiffres inventés.
   Un choix n'est proposé que si au moins une fiche y répond.
3. **Pensé pour le téléphone** : une question par bloc, réponses en grosses
   pastilles (44 px de haut), « Any » partout pour ne rien imposer.
4. **Marche sans JavaScript** quand c'est possible : le Plant finder est un
   simple formulaire. Les réponses restent dans l'adresse, donc on peut
   partager le résultat, et le bouton Retour fonctionne.
5. Page Tools en **groupes** (Stitch) : « Choose and plan », « Calculate and
   care », « Check and fix ». Chaque carte dit ce qu'il faut savoir avant de
   commencer (« You need: … »). Un outil désactivé disparaît de la page et
   son adresse renvoie « Page not found ».
6. **Référencement** : chaque outil a son titre, sa description, son adresse
   canonique et des données `WebApplication`. Un Plant finder filtré
   (`?light=full-sun…`) est en `noindex, follow` : ce sont les listes
   `/plants/sun/…` et `/plants/space/…` qui portent ces recherches dans
   Google.

## Plant finder (`/tools/plant-finder/`) : fait

Cinq questions, chacune facultative :

| Question | Réponses | D'où elles viennent |
| --- | --- | --- |
| How much direct sun does your spot get? | Full sun, Part shade, Shade | Case **Sun** des fiches |
| Where will the pots go? | Windowsill, Balcony, Patio | Case **Growing spaces** |
| What would you like to grow? | Vegetables, Herbs, Fruit | **Plant types** |
| How much experience do you have? | Easy only, ou Easy et Moderate | Champ **Difficulty** |
| When do you want to start? | This month | **Planting calendar** (semis ou plantation ce mois-ci) |

Le résultat reprend les cartes des listes de plantes. Sans réponse, la page
montre toutes les plantes.

## Les autres outils : plan

Ordre de construction, chacun avec la même méthode :

1. **Symptom checker** (`/tools/guided-diagnosis/`) : plante, puis ce qu'on
   voit. Les réponses viennent des fiches problèmes (« Plants affected » et
   « What you see » de chaque cause), comme la méthode UC IPM.
2. **Pot size calculator** (`/tools/pot-size-calculator/`) : volume du pot
   (rond, carré, jardinière ; cm ou pouces) et nombre de sacs de terreau,
   calcul exact ; plus la taille de pot conseillée par chaque fiche.
3. **Frost risk check** (`/tools/frost-risk/`) : la température minimale
   annoncée, et les plantes du site qui craignent le gel. Demande un nouveau
   champ de fiche, « Frost tolerance » (tender, half-hardy, hardy), rempli
   d'après des sources.
4. **Watering routine** (`/tools/watering-calculator/`) : quand vérifier le
   terreau selon la taille et la matière du pot, le soleil et la chaleur.
   Règles tirées de sources citées (RHS, extensions universitaires), sans
   fréquence inventée.
5. **Garden planner** (`/tools/garden-planner/`) : à décider avec la
   propriétaire du site. Un vrai plan demande les dimensions de chaque pot
   et beaucoup de JavaScript ; il pourrait être remplacé par un guide des
   dispositions pour petits espaces.

## Écarté

- **Dates de gel par code postal** : sans données météo fiables par lieu,
  le site donnerait une fausse précision. Le contrôle du gel part de la
  prévision que le lecteur lit lui-même.
- **Compte et favoris** (Gardenia) : demande des comptes lecteurs, une base
  de données et une politique de confidentialité plus lourde, pour peu
  d'usage sur un site de cette taille.
