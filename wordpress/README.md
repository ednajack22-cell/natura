# Natura pour WordPress

Ce dossier contient la version WordPress de Natura.

- `natura/` : le thème (présentation : en-tête, menu, pied de page, gabarits).
- `blueprint.json` : la recette qui installe le thème dans WordPress Playground.

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

1. Téléchargez le dossier `natura/` en zip (ou demandez le zip prêt à l'emploi).
2. WordPress → Apparence → Thèmes → Ajouter → Téléverser un thème.
3. Activez « Natura ».

À l'activation, le thème crée trois menus modifiables dans
Apparence → Menus : « Main menu », « Footer columns » et « Legal links ».
Un emplacement qui a déjà un menu n'est jamais modifié.

## Modifier le menu

Apparence → Menus :

- un élément de premier niveau avec des sous-éléments devient un menu déroulant
  sur ordinateur et un accordéon sur téléphone ;
- le champ « Description » d'un élément (à activer dans « Options de l'écran »)
  devient la petite ligne sous le titre ;
- dans « Footer columns », chaque élément de premier niveau devient un titre de
  colonne, et ses sous-éléments les liens de la colonne.

## Ce qui reste à faire

Les liens Plants, Problems, Projects, Articles, Tools et Gear mènent pour l'instant à une
page « Page not found » : ces sections seront créées aux étapes suivantes
(types de contenu, gabarits de pages, puis tableau de bord).
