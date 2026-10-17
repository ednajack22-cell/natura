# Gear : guides d'achat (octobre 2026)

Analyse faite avant de construire `/gear/` et les guides d'achat. Captures
ordinateur et téléphone du 17 octobre 2026 ; Gardeners' World repris des
captures du 14 octobre. Wirecutter et Talk of the House bloquent les
navigateurs automatisés.

## Pages étudiées

| Site | Page | Ce qui marche | Ce qui gêne |
| --- | --- | --- | --- |
| **BBC Gardeners' World** | The best compost bins | Mention d'affiliation tout en haut ; « at a glance » avec le meilleur choix par usage ; « Reasons to buy / to avoid » ; paragraphe « Our expertise » | Prix écrits en dur (RRP), notes en étoiles, publicité et fenêtre d'inscription avant la réponse |
| **Which?** | Best compost 2026 | Méthode d'essai expliquée (« How we tested »), produits à éviter (« Don't Buy ») | Tableau des résultats réservé aux abonnés |
| **Bob Vila** | Best self-watering planters | Trois cartes « Best overall / Best for the buck / Best window box » avant le texte ; « What we like / don't like » ; specs | Notes « 5/5 » partout, plusieurs boutons d'achat par produit, page de 17 000 px |
| **Reviewed** | Best gardening tools | Mention claire « chosen independently », numérotation | Énorme image avant le premier produit sur téléphone |
| **Maquette Stitch « Gear & Reviews Hub »** | Page Gear du site | Mention d'affiliation en tête, catégories en boutons, guide mis en avant, section « How Natura evaluates » | Chiffres inventés (« 1,840+ hours », « Hands-on tested », prix) : non repris |

## Ce que Natura retient

1. **La réponse d'abord** : « Our picks at a glance », chaque choix avec
   pour qui il est le meilleur (« Best for… ») et un bouton « Check price ».
2. **La méthode dite franchement** : « Tested by us » seulement si chaque
   produit a été utilisé, sinon « Researched, not tested », avec une phrase
   d'explication sous la photo. C'est ce que les concurrents brouillent le
   plus (« tested by experts » sur des fiches de fabricant).
3. **What to look for** : les critères qui décident, chacun avec pourquoi il
   compte en pot ou sur un balcon.
4. **Tableau comparatif** construit à partir des caractéristiques de chaque
   choix (une ligne « Label: value » par caractéristique). Sur téléphone, il
   défile dans sa boîte, la première colonne reste visible.
5. **Une section par choix** : verdict, « Good / Watch out », caractéristiques,
   « Check price » (`rel="sponsored nofollow"`).
6. **Pas de prix, pas d'étoiles, pas de « Best Buy »** : rien qui ne soit
   mesuré. Données structurées : une simple liste (`ItemList`) des choix,
   pas de `Product` ni de `Review` sans note réelle.
7. **Publicité** : une après le tableau, une seconde seulement après le 3e
   choix d'un long guide (au plus deux dans le texte, règle du site).
8. **Page Gear** : mention d'affiliation, catégories avec leur nombre de
   guides, le guide le plus récent en grand (à partir de trois guides),
   cartes avec « Top pick » et la méthode, puis « How we choose products »
   dont les engagements par défaut sont ceux que le thème garantit lui-même.
9. Une catégorie de moins de 6 guides est en `noindex, follow`.

## Contenu de démonstration

Un seul guide, « The Best Compost for Pots: Which Type to Buy » : il compare
des **types** de terreau, pas des marques, et chaque phrase vient des conseils
RHS déjà cités dans l'article sur le terreau. Méthode : « Researched, not
tested ». Aucun lien de boutique.
