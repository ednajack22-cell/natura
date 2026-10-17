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

1. **Symptom checker** (`/tools/guided-diagnosis/`) : **fait**. La plante,
   puis où se voit le problème (nouvelle case « Where it shows » des fiches
   problèmes), comme la méthode UC IPM. Chaque fiche trouvée affiche ses
   causes sous la forme « If you see … → Likely cause », avec un lien vers
   la cause dans la fiche. Rien n'est deviné : le lecteur compare.
2. **Pot size calculator** (`/tools/pot-size-calculator/`) : **fait**. Pot
   rond, carré ou jardinière, droit ou évasé (cône ou pyramide tronqués),
   en cm ou en pouces ; volume en litres et en gallons US, nombre de sacs
   (10 à 70 L, ou 1 à 2 cu ft), pots remplis par sac ; puis la taille de pot
   donnée par chaque fiche. Calcul fait sur le serveur : marche sans
   JavaScript. Conseil repris d'Empress of Dirt : prévoir un peu plus, le
   terreau se tasse.
3. **Frost risk check** (`/tools/frost-risk/`) : **fait**. La température
   minimale annoncée (°C ou °F) est comparée à la limite basse de la **note
   de rusticité RHS** de chaque fiche (nouveau champ « RHS hardiness
   rating », H1a à H7, rempli d'après la page RHS de la plante). Aucune
   marge inventée : l'outil explique pourquoi un pot peut être plus froid
   que la prévision (gel au sol, Met Office) et cite ses deux sources.
4. **Watering routine** (`/tools/watering-calculator/`) : **fait**. Six
   réponses (saison, taille et matière des pots, soleil, chaleur, pots à
   l'abri de la pluie) donnent une routine en 4 étapes : quand vérifier,
   comment savoir, comment arroser, pourquoi ces pots sèchent ainsi. Chaque
   phrase vient des pages RHS « Watering » et « Growing plants in
   containers », citées sous la routine (vérifier chaque jour du printemps à
   l'automne, arroser quand le terreau est sec à 2–3 cm, jusqu'à deux fois
   par jour par forte chaleur, terre cuite plus rapide que le plastique,
   arroser le matin, pas de routine fixe « une fois par semaine »).
5. **Garden planner** : **remplacé par un guide**, décision de la
   propriétaire du site (17 octobre 2026). Un vrai plan demandait les
   dimensions de chaque pot et beaucoup de JavaScript pour un usage
   incertain ; un article « How to arrange pots in a small space » (Plant
   Care → Light & position), avec ses sources, sert mieux les lecteurs et le
   référencement. Retiré du menu par défaut.

## Partage des résultats

Chaque outil se partage avec ses réponses : l'adresse partagée contient les
réponses, et l'aperçu (WhatsApp, Facebook, Pinterest, X) dit ce qu'est le
résultat : « 3 plants for pots: Full sun · Balcony », « This pot holds about
20 litres of compost », « Frost check at −3 °C: 2 plants to protect ». Google
garde, lui, la page de l'outil sans réponses (adresse canonique et
`noindex`), pour éviter des centaines de pages presque identiques. Chaque
outil a une image horizontale (1200 × 630) et une image verticale (1000 ×
1500) dans `natura/assets/images/share/`, faites avec les photos et les
polices du site ; l'image verticale se remplace dans Natura Options.

## Écarté

- **Dates de gel par code postal** : sans données météo fiables par lieu,
  le site donnerait une fausse précision. Le contrôle du gel part de la
  prévision que le lecteur lit lui-même.
- **Compte et favoris** (Gardenia) : demande des comptes lecteurs, une base
  de données et une politique de confidentialité plus lourde, pour peu
  d'usage sur un site de cette taille.
