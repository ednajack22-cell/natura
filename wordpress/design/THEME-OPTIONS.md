# Natura Options : benchmark des panneaux d'options (octobre 2026)

Ce document compare les panneaux d'options des thèmes et outils les plus
utilisés aujourd'hui, en particulier ceux des sites éditoriaux financés par
la publicité et Pinterest, puis indique ce que Natura en retient.

Sources : documentation officielle quand elle existe (Mediavine Trellis,
Blocksy, Kadence, tagDiv Newspaper, Redux), sinon forums et tests publiés.
Les deux captures fournies (thèmes Vlog et Sciencex, panneaux Redux) ont
servi de modèle de présentation.

## Ce que font les autres

| Outil | Type | Ce qu'on y trouve | Ce qui manque ou gêne |
| --- | --- | --- | --- |
| **Mediavine Trellis** | Thème des éditeurs Mediavine (sites de recettes, jardin, DIY financés par la pub) | Onglets Display (couleurs principale et secondaire, largeur d'en-tête, recherche, commentaires, liens de pied de page) et MVP (densité des publicités dans les listes : Low / Normal / High / None ; publicités sur les pages oui/non). Pensé pour les Core Web Vitals. | Peu d'options de mise en page ; les boutons Pinterest viennent d'une extension (Grow Social Pro), pas du thème |
| **Feast Plugin** | Couche « moderne » des blogs de cuisine | Interrupteurs de modules : navigation moderne, accueil, index des recettes, pied de page, sommaire, fil d'Ariane, boutons d'abonnement, icônes sociales ; « réglages recommandés » en un clic ; audit des extensions | Payant, et pas pour tous les sites |
| **Newspaper (tagDiv)** | Thème magazine le plus vendu | Theme Panel avec onglets ; emplacements AdSense (en-tête, colonne, haut d'article, pied) ; Import / Export par texte à copier ; **les 10 dernières versions des réglages, restaurables** ; réinitialisation qui demande de **taper « reset »** | Très grand nombre d'options |
| **Redux Framework** | Base des panneaux de nombreux thèmes premium (Vlog, Sciencex) | Onglets verticaux, boutons Show / Hide, **Reset Section / Reset All**, Import / Export entre sites, validation avec erreurs par section, champs liés (un champ en masque un autre) | Extension à installer et à tenir à jour |
| **GeneratePress** | Thème léger | Tableau de bord avec **modules à activer / désactiver** (Blog, Elements, Disable Elements…) | Réglages visuels dans le Personnaliser, pas dans le tableau de bord |
| **Blocksy** | Thème moderne | Tableau de bord (accueil, extensions à activer, journal des changements) ; Export / Import / Reset des réglages | Personnaliser jugé très chargé par les clients non techniques |
| **Kadence** | Thème moderne | Constructeur d'en-tête ; onglet Performance : polices Google hébergées en local, préchargement CSS, microdonnées | Nombre d'options déroutant au début |
| **Astra** | Thème moderne | Tableau de bord refait (version 4) avec modules Pro activables | Modules Pro bloqués en version gratuite |

## Ce qui revient partout

1. Un **tableau de bord** qui dit quoi faire ensuite (Blocksy, Astra, Feast).
2. Des **modules ou blocs à afficher / masquer** sans toucher au code
   (GeneratePress, Feast, Redux).
3. **Import / Export** des réglages (Newspaper, Redux, Blocksy).
4. **Reset** par section et global (Redux), protégé (Newspaper).
5. **Couleurs de marque** (Trellis, Kadence, Blocksy).
6. Des **réglages publicitaires** par emplacement (Newspaper) ou par densité
   (Trellis).
7. Moins visible mais apprécié : la **recherche dans les réglages** (Redux),
   l'**historique des versions** (Newspaper).

## Ce que Natura Options en retient

| Fonction | Natura | Inspiré de |
| --- | --- | --- |
| Présentation : bandeau, onglets verticaux, Show / Hide, Save / Reset Section / Reset All en haut et en bas, sous-menus | Oui | Redux (Vlog, Sciencex) |
| Tableau de bord : réglages restants avec barre de progression, nombre de fiches | Oui | Blocksy, Astra, Feast |
| Afficher / masquer chaque bloc (accueil, fiches, listes, Pinterest, affiliation, publicités) | Oui, 25 blocs | GeneratePress, Feast |
| Recherche dans tous les réglages, avec mise en évidence du réglage trouvé | Oui | Redux |
| Les 10 dernières versions, restaurables en un clic (et la restauration se défait) | Oui | Newspaper |
| Reset All protégé : taper « reset » | Oui | Newspaper |
| Alerte en quittant une page avec des changements non enregistrés | Oui | Redux |
| Couleurs de marque, refusées si le texte blanc devient illisible | Oui (contrôle de contraste WCAG 4,5:1) | Trellis, Kadence |
| Import / Export, copie et téléchargement | Oui | Newspaper, Redux, Blocksy |
| Publicités emplacement par emplacement | Oui | Newspaper |
| Performance : polices locales, WebP, pas de script emoji | Intégré au thème, sans réglage | Kadence (en option chez eux) |
| Aperçu en direct | Via le Personnaliser, qui modifie les mêmes réglages | Kadence, Blocksy |

## Lecture du code de Newspaper 12.7.9 (à titre d'étude)

Le paquet d'installation de Newspaper a été lu pour comprendre comment son
administration est construite. Aucun code n'a été repris : seules les idées.
Le paquet ne contient que l'« enveloppe » du thème ; le Theme Panel complet
est dans l'extension tagDiv Composer, installée à part.

Ce qui est bien fait, et ce que Natura en a tiré :

| Dans Newspaper | Dans Natura Options |
| --- | --- |
| Page d'accueil en étapes numérotées (« 1. extensions », « 2. site prêt à l'emploi ») | Dashboard en 3 étapes : site prêt, réglages essentiels, 6 premières fiches |
| Encadré « System Status » : PHP, mémoire, temps d'exécution, en vert ou jaune avec conseil et lien | « Site status » adapté à Natura : extension Natura Core, adresses lisibles, HTTPS, WebP, extension SEO, PHP, mémoire, formulaire de newsletter, chacun avec un lien « Fix it » |
| Version et état (enregistré ou non) dans le bandeau | Version et pastille « Site ready » ou « N points to check » dans le bandeau |
| Sauvegardes des réglages à chaque enregistrement, seulement si quelque chose a changé, limite réglable | Les 10 dernières versions, sans doublon |
| Shortcodes d'extensions désactivées retirés du contenu | Le formulaire de newsletter est masqué si son extension n'est pas active (pas de « [shortcode] » affiché en clair), et le Dashboard le signale |
| Encadrés d'aide (forum, documentation, vidéos) | Encadré « Help » : guide du thème, Santé du site, AdSense, revendiquer le site sur Pinterest |
| Installation guidée des extensions requises (TGM) | Pas d'installateur : une seule extension requise, Natura Core, signalée dans Site status si elle est inactive |

Ce qui est à éviter et que Natura ne fait pas : du texte affiché sans
échappement, un menu ouvert aux contributeurs (droit `edit_posts`), des
appels réseau sans vérification du certificat, une alerte « UNREGISTERED »
permanente.

Avertissement : la copie étudiée était une version modifiée (« nulled ») qui
contourne la licence et télécharge des modèles depuis un site tiers sans
vérification du certificat. À ne jamais installer sur un site ; la licence
officielle s'achète sur ThemeForest.

## Écarté, et pourquoi

- **Constructeur d'en-tête et de pied de page** (Kadence, Astra, Blocksy) :
  beaucoup de code et de choix pour un site qui n'a qu'une mise en page ; les
  menus WordPress suffisent.
- **Typographie au choix** : changer de police coûte du poids de page et de
  la cohérence ; Newsreader et Inter sont hébergées en local.
- **Densité des publicités Low / Normal / High** (Trellis) : à reconsidérer
  quand les listes de fiches seront longues ; pour l'instant une seule annonce
  par liste, activable ou non.
- **Redux lui-même** : une extension de plus à installer et à mettre à jour ;
  le panneau intégré fait la même chose avec moins de code.
