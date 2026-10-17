# Calendrier et listes par lumière et par lieu (octobre 2026)

Ce document résume l'analyse des concurrents faite avant de construire
`/calendar/`, `/calendar/[mois]/`, `/plants/sun/…` et `/plants/space/…`, puis
ce que Natura en retient.

## Pages étudiées (17 octobre 2026)

Captures ordinateur (1440 px) et téléphone (390 px), faites le 17 octobre 2026.
Quatre sites (Thompson & Morgan, GrowVeg, Gerbeaud, Sarah Raven) bloquent les
navigateurs automatisés ou ont changé leurs adresses. Pour Gerbeaud et Au
jardin, les captures du 14 octobre ont été reprises.

| Site | Page | Ce qui marche | Ce qui gêne |
| --- | --- | --- | --- |
| **RHS** | Gardening in October | Bande des 12 mois en haut, qui défile sur téléphone ; 3 travaux principaux en grand, puis la suite en liste numérotée ; page courte (~4 000 px) | Parle du jardin en général, rien sur les pots |
| **BBC Gardeners' World** | What to plant in October | Pour chaque plante : photo, « When to harvest », « How to grow », lien vers la fiche | Page de 25 000 px, une fenêtre d'inscription et beaucoup de publicités avant la réponse |
| **Gardeningetc / Homes & Gardens** | Vegetables to plant in October | Mention d'affiliation en haut, auteur et date | Liste rédigée de 7 à 12 plantes ; publicité avant la première plante |
| **Promesse de Fleurs** | Vegetable garden calendar – October | Classement par geste (sous abri, en pleine terre, à planter, autres travaux), sommaire collant à gauche, tableau de l'année en bas | Long texte, liens commerciaux partout |
| **Au jardin** | Conseils d'octobre | Tuiles par lieu (balcon, potager, verger) | Très chargé, publicités entre chaque bloc |
| **Gerbeaud** | Que faire en octobre | « L'essentiel en un coup d'œil » par catégorie, avec icône | Vidéo flottante qui cache le texte sur téléphone |
| **Roots Plants** | Vegetable Planting Calendar UK | Toute l'année sur une page, sauts vers chaque mois, « What to harvest » par mois | Un seul long article ; grandes photos sans information |
| **Old Farmer's Almanac** | Planting Calendar | Outil : dates selon le lieu, les plantes hors saison sont grisées | Américain, demande un code postal |
| **Bonnie Plants** | Vegetables that grow in the shade | Définit les seuils en heures (mi-ombre 3 à 6 h, ombre moins de 3 h), apprend à mesurer sa lumière avant de choisir | Produits en vente à la fin |
| **Back to the Roots / Tiny Garden Habit** | Shade, balcony | Titres clairs (« even on a balcony ») | Listes rédigées, rien de comparable d'une plante à l'autre |
| **Epic Gardening** | Good for Containers | Grille filtrable (lumière, taille…) | Boutique : prix et « Add to cart » partout |

## Ce qui revient partout, et ce qui manque

1. **Une bande des mois** pour passer d'un mois à l'autre (RHS, Promesse de
   Fleurs, Roots).
2. **Classement par geste** : semer, planter, récolter (Promesse de Fleurs,
   Gerbeaud, Gardeners' World).
3. **Un tableau de l'année** quelque part (Promesse de Fleurs, Roots).
4. Des **seuils de lumière en heures** pour l'ombre et la mi-ombre (Bonnie,
   extensions universitaires).

Personne ne donne, pour chaque plante du mois, **la taille du pot et la
lumière**, les deux choses qu'on vérifie avant de semer sur un balcon. Les
pages sont longues, rédigées, et la réponse arrive après plusieurs écrans et
publicités. C'est la place de Natura.

## Ce que Natura en retient

### Page du mois (`/calendar/october/`)

1. Fil d'Ariane, puis **bande des 12 mois** (et « Year ») qui défile sur
   téléphone ; le mois affiché est ramené à l'écran, le mois en cours porte un
   point (RHS).
2. Titre « What to sow, plant and harvest in pots in October », note sur le
   climat en petit.
3. **Compteurs Sow · Plant out · Harvest** qui mènent à chaque section, s'il y
   en a au moins deux (Gerbeaud).
4. Une section par geste ; chaque plante en carte compacte : photo, nom
   court, **lumière, taille du pot**, lien vers la fiche.
5. **Une seule publicité**, entre la 1re et la 2e section : jamais avant la
   réponse.
6. **Travaux du mois pour les pots**, écrits par la propriétaire du site dans
   Natura Options (rien n'est inventé : le bloc reste vide sans texte).
7. Mois précédent, toute l'année, mois suivant.

### Page de l'année (`/calendar/`)

Introduction, bouton vers le mois en cours, **tableau de toutes les
plantes sur 12 mois** (trois traits : semer, planter, récolter ; le mois en
cours encadré), puis les 12 mois avec le nombre de plantes.

### Listes par lumière et par lieu (`/plants/sun/full-sun/`, `/plants/space/balcony/`)

Même présentation que les autres listes de plantes (cartes avec soleil, pot,
arrosage, difficulté). Le texte sous le titre donne le seuil en heures de
soleil (Bonnie). Les boutons « By light » et « By space » relient les listes
entre elles et à la liste des plantes. Sur chaque fiche, une ligne
« Suits: Full sun · Balcony » mène à ces listes.

### Référencement

- Titres et descriptions propres à chaque page, adresse canonique, fil
  d'Ariane et liste des fiches (`ItemList`) en données structurées.
- **Moins de 6 plantes : `noindex, follow`** et absence du plan du site
  (règle d'AGENTS.md). La page y entre seule quand elle se remplit.
- Le plan du site (`/wp-sitemap.xml`) liste les mois qui comptent assez de
  plantes.

### Écarté, et pourquoi

- **Dates selon le code postal** (Almanac) : demande des données de gel par
  lieu qu'on n'a pas ; une note sur le climat (Royaume-Uni et Europe du Nord,
  plus tôt au chaud, plus tard au froid) reste honnête.
- **Long article par mois** (Gardeners' World, Gardeningetc) : la page se
  remplit avec les fiches, donc elle reste juste et à jour sans réécriture.
- **Calendrier lunaire** : aucune base scientifique solide.
