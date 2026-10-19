# Banc d'essai presse : Le Figaro et BFMTV (mobile puis ordinateur)

Relevé du 19 octobre 2026, vers 20 h (heure de Paris). Ce jour-là, l'actualité
était dominée par les violences du 17 octobre : les deux accueils ouvraient sur
un direct (« EN DIRECT » / « LIVE EN COURS »).

## Méthode et limites

- Outil : Playwright (Node) avec Chromium (`/opt/pw-browsers/chromium`), sans
  limitation de débit ni de processeur. Les temps (LCP) sont donc des temps de
  laboratoire sur une bonne connexion, pas des temps 4G réels.
- Mobile : 375 × 812, `deviceScaleFactor` 2, `isMobile`, tactile, agent
  utilisateur iPhone Safari (moteur Chromium). Ordinateur : 1366 × 900.
- Pour chaque site : l'accueil, puis un article ouvert depuis l'accueil. Le
  premier lien de chaque accueil menait à un **direct** (page de live). Nous
  avons pris le premier article classique qui suivait :
  - Le Figaro : « “Wallah, merci Paname” : les pilleurs qui s'affichent sur les
    réseaux sociaux peuvent-ils être identifiés et poursuivis ? » (rubrique
    Économie › Social, **réservé aux abonnés**).
  - BFMTV : « “Si c'est nécessaire, évidemment que nous pourrions le faire” :
    que permet l'état d'urgence… » (Politique › Gouvernement, gratuit).
- Bandeau cookies : accepté (« Accepter et continuer » / « Tout accepter »)
  avant toute mesure de mise en page.
- Poids : somme des `encodedDataLength` (CDP) de toutes les réponses, après
  défilement complet de la page. « Tiers » = domaines enregistrables distincts
  autres que le domaine du site (les CDN maison `f1g.fr` et `nextradiotv.com`
  sont comptés dedans).
- CLS : `PerformanceObserver('layout-shift')` depuis le début du chargement.
  Trois valeurs : avant tout défilement ; pire fenêtre de session (règle
  Web Vitals, 1 s d'écart / 5 s max) en incluant un défilement automatique de
  toute la page ; somme brute.
- Publicité : beaucoup d'emplacements sont restés vides (fond gris
  « Publicité ») dans notre session automatisée. Le nombre d'emplacements est
  fiable, le contenu réel des annonces ne l'est pas.
- Captures : `/tmp/claude-0/-home-user-natura/6048a22e-1476-5ac6-a848-dc2700673111/scratchpad/news/`
  (`*-consent.png`, `*-first.png` premier écran, `*-full.jpg` page entière,
  `*-scrolled.png` et `*-scrollup.png` après défilement, `*-menu.png` menu
  mobile, et un fichier `.json` de mesures par page).

## Tableau de synthèse

| Page | Poids | Requêtes | Tiers | CLS avant défilement | CLS pire fenêtre | LCP (élément) | Hauteur |
|---|---|---|---|---|---|---|---|
| Le Figaro accueil, mobile | 7,2 Mo (5,0 avant défilement) | 626 | 60 | 0,132 | 0,328 | 1,67 s (photo de une) | 41 300 px |
| Le Figaro accueil, ordinateur | 8,2 Mo | 652 | 54 | 0,034 | 0,283 | 1,79 s (photo de une) | 36 281 px |
| Le Figaro article, mobile | 4,9 Mo | 379 | 60 | 0,000 | **1,122** | 1,16 s (titre H1) | 14 090 px |
| Le Figaro article, ordinateur | 4,3 Mo | 346 | 50 | 0,014 | 0,014 | 0,90 s (titre H1) | 11 542 px |
| BFMTV accueil, mobile | 8,7 Mo (8,0 avant défilement) | 358 | 44 | 0,002 | 0,002 | 2,15 s (photo de une) | 27 437 px |
| BFMTV accueil, ordinateur | 6,0 Mo | 356 | 47 | 0,002 | 0,002 | 2,07 s (photo de une) | 14 753 px |
| BFMTV article, mobile | 3,3 Mo | 159 | 36 | 0,003 | 0,002 | 3,37 s (texte du bandeau cookies) | 4 504 px* |
| BFMTV article, ordinateur | 3,8 Mo | 190 | 41 | 0,002 | 0,012 | 3,21 s (texte du bandeau cookies) | 9 369 px |

\* Article BFMTV mobile tronqué par un bouton « Lire la suite » (voir plus bas).

---

## 1. Le Figaro (lefigaro.fr)

### 1.1 Mobile (375 × 812)

**Bandeau cookies**
- Fenêtre modale centrée sur fond assombri qui couvre **100 % de l'écran**
  (carte blanche d'environ 343 × 720 px). Rien n'est lisible derrière.
- De haut en bas : lien « Refuser et s'abonner » (le refus passe par un
  abonnement payant), logo, titre « Nos 500 journalistes s'engagent… », texte
  sur « Nos 251 partenaires », puis deux gros boutons bleu marine
  « PERSONNALISER VOTRE CHOIX » et « ACCEPTER ET CONTINUER », et « Déjà abonné ?
  Connectez-vous ».
- La barre d'onglets du bas reste visible sous la modale.

**En-tête**
- Au-dessus de l'en-tête, sur l'accueil : bandeau d'application de 69 px
  (« Le Figaro – Suivez les dernières actualités – INSTALLER », avec croix).
- En-tête de **88 px** :
  - à gauche, une icône menu + recherche combinée et une loupe ;
  - au centre, le logo ;
  - à droite, une cloche (notifications) et une icône compte.
- Sous le logo, une rangée d'onglets de rubriques qui défile à l'horizontale
  (3 545 px de large) : « Violences du 17 octobre », « Guerre en Ukraine »,
  « Présidentielle 2027 », puis Politique, International, Économie, etc.
- Sur un article, le logo est remplacé par « F / Économie » et les onglets
  deviennent les sous-rubriques (Économie ▾, Entreprises, Conso…).
- **Masqué au défilement vers le bas, réaffiché au défilement vers le haut**
  (même hauteur, pas de version réduite).

**Navigation**
- Menu : tiroir à gauche d'environ 320 px. Il contient :
  - le bouton jaune « OFFRE ANNIVERSAIRE 2€/mois pendant 200 semaines » ;
  - un gros bouton « RECHERCHER » ;
  - un bloc « Notre application » ;
  - la liste « Rubriques et services du Figaro », soit 66 liens d'un seul
    niveau, séparés par des filets (Politique, International, Économie,
    Société, Vox, Sport, Culture, Madame… Maison et Jardin, Guide Achat…).
- **Barre de navigation fixe en bas, 52 px** :
  - sur l'accueil : « À la Une », « Le Flash », « TV & Vidéos », « Audio »,
    « Actu locale » ;
  - sur un article, elle devient une barre d'actions : « S'ABONNER »,
    sauvegarder, partager, bulle de commentaires « 142 », menu « ••• ». Une
    fine barre jaune de progression de lecture est collée au-dessus.
- Fil d'Ariane visible sur l'article (« Accueil › Économie › Social »), mais
  aucun `BreadcrumbList` dans le JSON-LD (seulement Organization, WebSite,
  WebPage, NewsArticle).
- Pas de bouton « retour en haut ».

**Accueil : ordre des blocs (mobile)**
1. Bandeau d'application (69 px), en-tête (88 px), puis un emplacement
   publicitaire de 375 × 100 px réservé sous l'en-tête (logo gris +
   « Publicité »).
2. Bandeau « L'ÉVÉNEMENT », titre du direct en H1 (gros serif, 4 lignes),
   photo pleine largeur 16:9, puis mini-fil du direct (heures « 19:43 », etc.).
3. Carrousel horizontal de 3 cartes liées (photo 16:9 + titre + « Publié le
   19/10/2026 à 19h03 »).
4. Longue liste d'articles. Type de carte :
   - photo 16:9 pleine largeur (343 × 193), titre en serif gras, date ;
   - puis 2 ou 3 liens secondaires précédés d'une flèche « → ».
5. Pavé publicitaire (320 × 352).
6. « La sélection du Figaro » sur fond bleu clair, avec des surtitres
   (« L'ÉDITORIAL DU FIGARO », « REPORTAGE »).
7. Lecteur Le Figaro Radio, puis Le Figaro TV.
8. Sondage « Emmanuel Macron doit-il instaurer l'état d'urgence ? Oui / Non ».
9. Bloc natif sponsorisé.
10. « L'actualité en vidéo » (cartes verticales en carrousel), puis
    « Programme TV ce soir ».
11. « Nos éditions locales », « Les articles préférés des abonnés »,
    « Tout le sport ».
12. Recommandations Taboola, puis le kiosque « Le Figaro et ses magazines »,
    les jeux (mots fléchés, sudoku…) et la suite.

Au total : **41 300 px de haut**, 120 titres H1-H3, dont un seul H1 (le
direct). Chaque titre de carte est un H2.

**Cartes de l'accueil**
- Sur 24 cartes mesurées, les titres font **111 caractères en moyenne** (de 63
  à 148), sans troncature.
- Formats d'image :
  - 16:9 pleine largeur (343 × 193) ;
  - vignettes 16:9 à droite (120 × 68 ou 104 × 59) ;
  - carré 134 × 134 pour les tribunes.
- Horodatage : « Publié le 19/10/2026 à 19h10 ».
- Une petite icône jaune « F » marque les articles réservés aux abonnés.
- Pas de temps de lecture.

**Article (mobile)**
- Ordre de haut en bas :
  1. emplacement publicitaire de 100 px ;
  2. bandeau bleu clair « Suivez l'actu en temps réel avec l'application
     Le Figaro » ;
  3. fil d'Ariane ;
  4. étiquette « Réservé aux abonnés » ;
  5. titre H1 en serif 28 px / 38 px, 7 lignes sur mobile ;
  6. « Par Emma Confrère » et un bouton « SUIVRE » ;
  7. « Publié le 19/10/2026 à 14h49, mis à jour le 19/10/2026 à 19h03 » ;
  8. « Suivre Le Figaro sur : Google, Google Discover, Google News » ;
  9. barre de partage : Lire dans l'app, Sauvegarder, Copier le lien,
     e-mail, Facebook, X, LinkedIn ;
  10. photo 16:9 avec légende et crédit (« SAMEER AL-DOUMY / AFP ») ;
  11. chapô en gras précédé d'un surtitre (« DÉCRYPTAGE - … ») ;
  12. pavé publicitaire de 320 × 250 ;
  13. corps du texte.
- Premier paragraphe visible vers **y = 1 200 px**, soit après 1,5 écran.
- Corps : Noto Serif **18 px**, interligne 28 px, bleu marine. Colonne de
  343 px, environ **35 caractères par ligne**.
- Liens dans le texte : 2 liens soulignés vers d'anciens articles du site.
- **Mur payant** après 2 paragraphes : le texte s'estompe, puis « Cet article
  est réservé aux abonnés. Il vous reste 77 % à découvrir » et le bloc bleu
  « Le Figaro célèbre ses 200 ans – 2€/mois – J'EN PROFITE ».
- Ensuite :
  1. un flux Taboola d'environ **5 750 px** (contenus sponsorisés « En savoir
     plus » mêlés à des articles du Figaro) ;
  2. « 142 commentaires », dont 3 affichés, et le bouton « LIRE LES 142
     COMMENTAIRES » ;
  3. « À lire aussi » (3 articles), « Sur le même thème » (une dizaine) ;
  4. « Plus de services » en accordéons, puis le pied de page.
- Pas de sommaire et aucun encart « Lire aussi » dans le texte (le texte
  visible est court à cause du mur payant).

**Publicité (mobile)**
- Accueil :
  - 1 emplacement au premier écran (375 × 100 sous l'en-tête) ;
  - **8 emplacements** sur la page : bannière haute, pavé 320 × 352
    (`min-height` 282 px), natif, 2 bannières de milieu, bannière basse
    375 × 50, Taboola, plus un emplacement réservé resté vide.
- Article réservé aux abonnés : 2 emplacements (100 px en haut, 320 × 250
  après le chapô) et le flux Taboola.
- Libellé : « Publicité » sous un logo F gris tant que l'annonce n'est pas
  chargée. Lien d'évitement « PASSER LA PUBLICITÉ » pour le clavier.
- Hauteur réservée : oui, en haut (100 px) et pour le pavé (250 à 282 px).
- Pas d'interstitiel ni de publicité collante en bas. En revanche, le bas de
  l'écran d'accueil est occupé par :
  - une **bannière d'abonnement collante de 104 px** (« Le Figaro célèbre ses
    200 ans – J'EN PROFITE », avec croix) ;
  - et la barre d'onglets (52 px).

**Calcul du premier écran de l'accueil mobile**
- En haut : bandeau d'application (69 px), en-tête (88 px) et publicité
  (100 px), soit 257 px.
- En bas : promotion d'abonnement (104 px) et barre d'onglets (52 px), soit
  156 px.
- Total : **413 px sur 812 (51 %)** qui ne sont pas de l'information.

**Stabilité et performance (mobile)**
- Accueil : CLS de 0,132 avant tout défilement. Les décalages viennent de
  l'en-tête et du bloc de une (`fig-event-une`).
- Accueil, en défilant : pire fenêtre 0,328, dont un saut de 0,306 sur une
  section `fig-ensemble`.
- Article : 0,000 au chargement, mais **1,122 en défilant**. Le bas de page
  (`fig-zone-bottom`, `fig-seo-footer`) saute trois fois de 0,91 à 0,93 pendant
  que le flux Taboola et les commentaires se chargent.
- LCP : photo de une à 1,67 s (accueil), titre H1 à 1,16 s (article).
- 626 requêtes et 60 domaines tiers sur l'accueil. Ce sont surtout des
  enchères publicitaires (Criteo, Rubicon, PubMatic, AppNexus, Amazon,
  Smart, Ozone…), des pixels (TikTok, Snapchat, Pinterest, Facebook,
  LinkedIn, X, Bing), JW Player, AB Tasty, Taboola et Outbrain.

### 1.2 Ordinateur (1366 × 900)

**Bandeau cookies** : même modale centrée, sur fond assombri plein écran.

**En-tête : 173 px en trois étages**
1. Pré-en-tête de 40 px :
   - à gauche, « Menu » et « Rechercher » ;
   - au centre, « TV & Vidéos », « Audio », « Jeux », « Le Figaro in
     English », « Newsletters », « Actu locale » ;
   - à droite, notifications et « Se connecter ».
2. Bandeau du titre :
   - à gauche, la vignette « Lire le journal » ;
   - au centre, le logo « LE FIGARO 200 ans » ;
   - à droite, le bouton jaune « OFFRE ANNIVERSAIRE ».
3. Ligne de rubriques : les 3 sujets chauds en gras, un séparateur, puis
   Politique… Madame et un bouton « voir plus ».

Comportement au défilement :
- sur l'accueil, l'en-tête **reste fixé en haut**, sans réduction ;
- sur l'article, il disparaît. Il est remplacé en bas par une **barre fixe de
  52 px** : titre de l'article tronqué, sauvegarder, e-mail, Facebook, X,
  « 142 commentaires », « ••• », « S'ABONNER ». La barre jaune de progression
  de lecture est au-dessus.

**Accueil**
- Emplacement de 1000 × 220 px réservé sous l'en-tête.
- Bloc « L'ÉVÉNEMENT » : titre et mini-fil du direct à gauche (environ
  410 px), photo à droite (environ 790 px).
- Puis 3 cartes en ligne, puis une grille de **3 colonnes** dans un conteneur
  de 1000 px :
  - colonne étroite d'environ 190 px avec surtitres (REPORTAGE, RÉCIT…) ;
  - colonne centrale d'environ 375 px ;
  - colonne droite de 300 px avec « Le Flash » (fil horodaté) et la pub.
- **Habillage publicitaire** : une image de fond occupe les marges autour du
  conteneur de 1000 px.
- 10 emplacements sur la page :
  - bannières de 1000 × 232 et 1000 × 260 ;
  - 4 pavés « infinite » en colonne droite, dont un **collant**
    (`position: sticky`) ;
  - un natif et Taboola.
- La promotion d'abonnement collante en bas fait 52 px.
- CLS : 0,034 au chargement, pire fenêtre 0,283 en défilant (saut de 0,166 sur
  le bas de page `#bottom` et de 0,161 sur `main`).

**Article**
- Colonne centrée unique : titre et métadonnées sur 704 px, corps du texte
  sur **616 px** à 18 px, soit environ **62 à 67 caractères par ligne**.
- Pas de colonne latérale au premier écran.
- La carte d'abonnement interrompt le texte. Le flux Taboola est disposé en
  grille de 3 colonnes, puis viennent les commentaires, « À lire aussi » et
  « Sur le même thème » (vignettes à droite).
- CLS de 0,014 : stable sur ordinateur, contrairement au mobile.

---

## 2. BFMTV (bfmtv.com)

### 2.1 Mobile (375 × 812)

**Bandeau cookies**
- Fenêtre Didomi sur fond assombri **plein écran**, avec une carte blanche
  d'environ 338 × 650 px.
- En haut, le lien souligné « Continuer sans accepter ». Puis le logo
  « RMC BFM » et un texte justifié : « ses 154 partenaires IAB et ses 19 autres
  partenaires », « Vos choix s'appliquent pendant 13 mois », plus un
  paragraphe sur le suivi Utiq fourni par l'opérateur télécom.
- Deux boutons noirs arrondis : « Tout accepter » et « Paramétrer vos choix ».
- Le texte de ce bandeau est l'**élément LCP** de l'article (3,4 s) : la
  modale s'affiche avant la photo.

**En-tête**
- **108 px**, fond bleu nuit, en deux étages :
  - barre de 62 px : burger « MENU », logo « BFM », boutons ronds « Radio » et
    « Direct » (rouge) ;
  - rangée d'onglets de 46 px qui défile à l'horizontale (1 295 px de large) :
    « ● Violences en France », « Casse du Louvre », un séparateur, puis
    International, Politique, etc.
- Sur l'accueil, l'en-tête est **collant** (`position: sticky`) et reste
  affiché pendant tout le défilement.
- Sur l'article, il disparaît au défilement. Une barre fixe de 62 px le
  remplace : burger, boutons ronds Facebook et X, « ••• », avec une **barre
  bleue de progression de lecture**. Le texte reste visible à travers cette
  barre en partie transparente.

**Navigation**
- Menu en tiroir (150 liens), organisé en blocs titrés :
  - « En ce moment » (puces : Violences en France, Casse du Louvre) ;
  - « Tous les directs BFMTV » (Direct TV, Direct Radio) ;
  - « Tous les formats » (puces : Vidéos, Longs formats, Newsletters,
    Émissions, Podcasts) ;
  - « Univers BFM » (logos des chaînes locales) ;
  - « Toutes les rubriques » (accordéons avec sous-rubriques) ;
  - « Tous les sites du groupe ».
- Fil d'Ariane sur l'article : « BFM - Politique - Gouvernement », avec un
  `BreadcrumbList` dans le JSON-LD.
- Pas de barre de navigation en bas. Un **mini-lecteur vidéo replié de 59 px**
  est fixé en bas (vide pendant notre capture).
- Pas de bouton « retour en haut ».

**Accueil : ordre des blocs (mobile)**
1. En-tête de 108 px, puis directement la une. **Aucune publicité au premier
   écran.**
2. Une carrée pleine largeur (375 × 375) :
   - étiquette rouge « LIVE EN COURS » ;
   - titre blanc posé sur la photo assombrie ;
   - puis 3 dernières entrées du direct (« 19h32 », en rouge).
3. Cartes « fleuve » :
   - surtitre de rubrique en bleu (« Gouvernement », « Police-Justice ») ;
   - titre de 4 lignes au plus, **coupé par « … »** ;
   - vignette 16:9 de 120 × 68 à droite ;
   - « Aujourd'hui à 17h00 » ;
   - parfois un lien secondaire « → ».
4. Encart « Témoins BFMTV – Vous êtes témoin d'un événement ? – Envoyez votre
   témoignage ».
5. Pavé publicitaire 327 × 250, réservé, libellé « Publicité ».
6. Cartes « ALERTE INFO » (étiquette rouge).
7. « Fil actu » : carrousel horizontal de cartes horodatées (« 19h48 »).
8. Second pavé publicitaire, puis l'encart newsletter « Recevez votre Récap
   Actu – Chaque soir, les informations essentielles… ».
9. « Sélection de la rédaction » : carrousel avec points, étiquette « Long
   format » et durée « 7 min ».
10. « Shorts » (vidéos verticales avec durée), puis « Les plus lus » (liste
    numérotée de 1 à 5, gros chiffres bleus).
11. Sections thématiques (Présidentielle 2027, Sport, Politique, Économie…) :
    grande image avec titre en surimpression, puis 4 titres sans image et un
    lien gris « Tout le sport ».
12. « Vidéos » (fond bleu nuit, carrousel), « Podcasts », « Contenus
    sponsorisés » Outbrain, « Longs-formats »…

Hauteur totale : 27 437 px.

**Article (mobile)**
- Ordre de haut en bas :
  1. fil d'Ariane ;
  2. titre H1 en Inter 24 px / 28,8 px (7 lignes) ;
  3. « Publié aujourd'hui à 17h00 » et le bouton « Lire dans l'app » ;
  4. auteur (« BFM › Jade Garnier ») et « Partager » ;
  5. image d'en-tête vidéo 16:9 ;
  6. bouton « Ajouter BFM à vos sources préférées sur Google » ;
  7. chapô en gras de 18 px ;
  8. pavé publicitaire 375 × 250 libellé « Publicité » ;
  9. corps du texte.
- Corps : Inter **16 px**, interligne 24 px, noir. Colonne de 335 px, environ
  **38 à 40 caractères par ligne**.
- **Intertitres H2** (« Un régime d'exception créé en 1955 », « Une durée
  initiale limitée à douze jours »…), citations en exergue (italique gras avec
  filet bleu à gauche) et lecteur de podcast intégré.
- **13 liens dans le texte**, dont un vers Légifrance.
- **« Lire la suite »** : sur 2 chargements mobiles sur 3, l'article était
  coupé après environ 2 paragraphes par un dégradé et un bouton « Lire la
  suite » (`#ob-readmore-button`, Outbrain). Sur le troisième, il était
  complet.
- En fin d'article : « Sujets liés » en puces, « Top Articles » (liste
  numérotée de 1 à 5), recommandations sponsorisées, puis un grand pied de
  page bleu nuit.
- Pas de commentaires, pas de sommaire, pas de mur payant.

**Publicité (mobile)**
- Accueil : **0 au premier écran**, 2 pavés 327 × 250 (`min-height` 250 px,
  « Publicité » en `::before`) et 1 bloc Outbrain.
- Article : 0 au premier écran, 2 pavés 375 × 250 et Outbrain.
- Pas d'interstitiel, pas de publicité collante.
- En revanche, après un peu de défilement sur l'accueil, une **demande de
  notifications** maison (« Souhaitez-vous recevoir les notifications de
  BFMTV ? S'abonner / Non merci ») couvre le haut de l'écran sur **203 px**.

**Stabilité et performance (mobile)**
- CLS de **0,002** sur l'accueil et l'article : quasi parfait.
- Accueil lourd : 8,7 Mo, dont 8,0 Mo avant tout défilement, et 358 requêtes.
- Article : 3,3 Mo et 159 requêtes.
- 44 domaines tiers (Smart AdServer, Criteo, Teads, Seedtag, Outbrain,
  Utiq, Chartbeat, Batch…).
- LCP : photo de une à 2,15 s sur l'accueil. Sur l'article, l'élément LCP est
  le texte du bandeau cookies.

### 2.2 Ordinateur (1366 × 900)

**En-tête : 130 px**
- Barre de 84 px : burger, logo, boutons « Replay », « Radio » et « Direct »
  (rouge).
- Ligne de rubriques de 46 px (« Shopping » et « Code promo » en gris clair).
- **Masqué au défilement vers le bas, réaffiché au défilement vers le haut.**

**Accueil**
- Emplacement de **1000 × 200 px réservé et vide** sous l'en-tête (deux points
  de chargement gris).
- Puis 2 colonnes :
  - principale de 798 px : une 16:9 avec titre en surimpression, puis une
    grille de cartes sur **2 colonnes** (vignette à droite, surtitre bleu) ;
  - latérale de 377 px : « LE DIRECT » (vidéo et « En ce moment : … »),
    Témoins BFMTV, « FIL ACTU » horodaté, pavés publicitaires.
- « Sélection de la rédaction » sur 5 colonnes en carrousel, « Shorts » et
  « Les plus lus » sur 5 colonnes, puis les sections thématiques : grande
  image à gauche et 4 titres à droite.
- Publicités : masthead 1000 × 200, 2 pavés en colonne latérale, Outbrain.
- Mini-lecteur fixe en bas de 80 px.
- CLS de 0,002.

**Article**
- Colonne de 798 px et colonne latérale de 377 px (« A LA UNE », puis
  « Top Articles » et Outbrain plus bas).
- Corps de 16 px sur 798 px : **87 à 96 caractères par ligne**, une ligne
  trop longue pour bien lire.
- **3 pavés « Publicité » insérés dans le texte**, plus le masthead.
- Bloc « A VOIR AUSSI » (Outbrain) en grille de 3 colonnes en fin d'article.
- CLS de 0,012.

---

## Ce qui est transposable à un site de guides (jardinage en pots)

1. **Réserver la place de chaque publicité.** BFMTV donne une `min-height` de
   250 px à ses pavés, avec le libellé « Publicité » en `::before`, et reste à
   un CLS de 0,002 même quand l'annonce ne se charge pas. C'est exactement la
   règle « Reserve space for ads » d'AGENTS.md. Notre libellé reste
   « Advertisement ».
2. **Aucune publicité au premier écran sur mobile.** BFMTV commence par
   l'en-tête puis le contenu, et place sa première pub après la une. Pour un
   guide, cela veut dire : titre, réponse courte et image d'abord, première
   pub ensuite. C'est déjà la règle Natura « pas de pub avant la première
   réponse utile ».
3. **En-tête qui se cache en descendant et revient en remontant**
   (Le Figaro mobile, BFMTV sur ordinateur). Il libère tout l'écran pour la
   lecture et garde la navigation à un geste. C'est faisable en CSS et en
   quelques lignes de JavaScript, sans bibliothèque.
4. **Barre de progression de lecture** de 2 à 4 px (Le Figaro en jaune
   au-dessus de la barre d'actions, BFMTV en bleu sous sa barre collante).
   C'est utile sur un guide long, et cela ne coûte presque rien.
5. **Onglets de rubriques qui défilent à l'horizontale sous le logo**, avec
   les sujets du moment en tête. Pour Natura, cela donnerait par exemple
   « Tomatoes · Herbs · Peppers · Pests · Calendar ». Il faut une seule ligne
   et des zones tactiles de 44 px.
6. **Menu organisé en blocs titrés** (BFMTV : « En ce moment », « Tous les
   formats », « Toutes les rubriques » en accordéons). C'est plus lisible
   qu'une liste plate de 66 liens.
7. **Intertitres H2 réguliers et citations mises en exergue** (BFMTV). Un
   guide se parcourt en diagonale : il faut un H2 par étape ou par question.
8. **Liens dans le texte vers les autres pages du site et vers une source
   officielle** (BFMTV : 13 liens, dont Légifrance). Pour nous : liens vers
   les fiches plantes et vers les sources citées (RHS, extensions
   universitaires).
9. **Liste numérotée « Les plus lus » / « Top Articles »** en fin d'article,
   avec de gros chiffres et des titres seuls : compacte, sans images, donc
   légère. Attention, le classement doit être réel. Sans mesure d'audience
   fiable, mieux vaut afficher une sélection éditoriale et ne pas parler de
   « plus lus ».
10. **Cartes avec vignette 16:9 à droite, surtitre de rubrique en couleur et
    titre limité à 3 ou 4 lignes** (BFMTV) : bonne densité sur mobile. Une
    carte pleine largeur en tête de section, puis 3 ou 4 titres sans image
    (sections thématiques BFMTV).
11. **Chapô en gras juste sous l'image**, avant la première pub (les deux
    sites). Pour nous, c'est l'endroit du résumé « en bref » du guide.
12. **Ligne de texte bornée sur ordinateur.** Le Figaro limite le corps à
    616 px (environ 65 caractères par ligne). C'est le bon repère, alors que
    BFMTV monte à environ 95 caractères. Sur mobile, prévoir 16 à 18 px avec
    un interligne de 1,5 à 1,55.
13. **Encart newsletter discret dans le flux** (BFMTV, « Recevez votre Récap
    Actu » : image, une phrase, un lien) plutôt qu'une fenêtre surgissante.
14. **Fil d'Ariane visible ET dans le JSON-LD** (BFMTV). Le Figaro affiche le
    fil d'Ariane sans `BreadcrumbList`, ce qui est un manque à éviter.

## Ce qu'il ne faut pas copier

1. **Le flux de recommandations sponsorisées sans fin** sous l'article
   (Le Figaro mobile : Taboola sur environ 5 750 px, avec des contenus du type
   « Un plombier révèle… » ou « Lifting des seins… »). Il fait sauter la mise
   en page (CLS de 1,12 sur mobile), il dégrade la confiance et il pousse les
   vraies suggestions très loin vers le bas.
2. **L'empilement d'éléments fixes et de promotions sur mobile.** Sur
   l'accueil du Figaro, 51 % du premier écran n'est pas du contenu (bandeau
   d'application, publicité, promotion d'abonnement de 104 px, barre de
   52 px). Chez Natura, une seule barre fixe au plus.
3. **Les demandes intrusives après l'arrivée** : la demande de notifications
   BFMTV (203 px en haut de l'écran), le bandeau « installer l'application »,
   « Lire dans l'app », « Ajouter à vos sources Google ». Chaque demande
   repousse la réponse.
4. **« Lire la suite » qui tronque l'article** (BFMTV mobile, 2 chargements
   sur 3). C'est un clic de plus pour lire un texte déjà chargé. Un guide doit
   être lisible en entier sans action.
5. **Les emplacements publicitaires placés au-dessus du titre** (Le Figaro :
   100 px sur mobile, 220 px sur ordinateur ; BFMTV : 200 px sur ordinateur,
   restés vides dans nos captures). C'est interdit par nos règles, et cela
   repousse le premier paragraphe du Figaro à y = 1 200 px sur mobile.
6. **Trois pavés dans le texte d'un article court** (BFMTV ordinateur). Notre
   plafond reste de 2 dans le contenu, 1 collant en colonne et 1 en fin de
   page.
7. **Le poids et le nombre de tiers** : 600 à 650 requêtes et 50 à 60
   domaines tiers sur l'accueil du Figaro, et 8,7 Mo sur l'accueil mobile de
   BFMTV. Natura vise une page légère, mise en cache, sans pixels de réseaux
   sociaux.
8. **Les titres coupés par « … »** sur les cartes (BFMTV). Ils masquent
   l'information. Mieux vaut des titres courts écrits pour tenir.
9. **Un H2 pour chaque titre de carte** sur l'accueil (Le Figaro : 120 titres
   H1 à H3). La hiérarchie des titres perd son sens. Gardons des H2 pour les
   sections et des H3 pour les cartes.
10. **Le « payer ou accepter »** (« Refuser et s'abonner ») et le bandeau
    cookies qui devient l'élément LCP (BFMTV). Natura n'a pas d'abonnement.
    Si une fenêtre de consentement est nécessaire pour AdSense, elle doit
    rester compacte, en bas de l'écran, et ne pas devenir l'élément LCP.
11. **Les sondages, jeux, programme TV et kiosque** sur l'accueil : ce sont
    des services de média généraliste, sans rapport avec un site de guides.
