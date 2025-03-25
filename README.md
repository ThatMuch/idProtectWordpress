# Thème WordPress idProtect - Documentation

Ce document fournit une vue d'ensemble et un guide pour le thème `idProtectWordpress`, un thème WordPress personnalisé construit avec SCSS pour la mise en forme.

## Table des matières

1.  Présentation du projet
2.  Installation
3.  Structure des fichiers
4.  Variables SCSS (`_vars.scss`)
5.  Mixins SCSS (`_mixins.scss`)
6.  Design responsive
7.  Comment personnaliser
8.  Licence

## Présentation du projet

Le thème `idProtectWordpress` est un thème WordPress personnalisé conçu pour le projet idProtect. Il utilise SCSS pour une mise en forme efficace et maintenable. Le thème suit une approche modulaire, tirant parti des principes du design atomique pour organiser ses composants CSS.Comment

## Installation

Voici les instructions pour installer et compiler le thème `idProtectWordpress`.

1.  **Téléchargement :** Clonez le repo dans : `/app/public/wp-content/themes/`
    ```bash
    git clone https://github.com/ThatMuch/idProtectWordpress.git
    ```
2.  **Télécharger les dépendances :** Naviguez jusqu'au répertoire du thème et exécutez la commande suivante pour installer les dépendances :
    ```bash
    npm install
    ```
3.  **Activation du thème :** Connectez-vous à votre tableau de bord WordPress. Allez dans "Apparence" > "Thèmes".
4.  **Sélection du thème :** Trouvez le thème `idProtectWordpress` dans la liste des thèmes disponibles et cliquez sur "Activer".
5.  **Compilation des fichiers SCSS en CSS :** Le thème utilise SCSS, qui doit être compilé en CSS pour que les styles soient appliqués correctement. Voici comment procéder :

    -   **Installation de Gulp (globalement) :** Ouvrez votre terminal et exécutez la commande suivante pour installer Gulp globalement sur votre machine :
        ```bash
        npm install -g gulp-cli
        ```
    -   **Exécution de Gulp :** Exécutez la commande `gulp` dans votre terminal (toujours dans le répertoire racine du thème) pour compiler vos fichiers SCSS en CSS et lancer la surveillance des fichiers.
        ```bash
        gulp
        ```
        Cela va créer un fichier `style.css` et un fichier `style.css.map` dans le dossier `/assets/styles/`.

## Structure des fichiers

Les fichiers de style principaux sont situés dans :

`/app/public/wp-content/themes/idProtectWordpress/assets/styles/`

Fichiers clés et leur objectif :

-   `style.scss` : Le point d'entrée principal pour tous les fichiers SCSS. Il importe tous les autres partiels dans l'ordre souhaité.
-   `_mixins.scss` : Contient des mixins SCSS réutilisables pour le design responsive, le dimensionnement des polices, les transitions, etc.
-   `_fonts.scss` : Emplacement pour les déclarations de polices.
-   `_vars.scss` : Définit toutes les variables SCSS (couleurs, tailles, points de rupture, etc.).
-   `_states.scss` : Emplacement pour les styles liés aux états des éléments (survol, actif, etc.).
-   `_base.scss` : Emplacement pour les styles de base.
-   `atoms/` : Contient les fichiers SCSS pour les éléments de design atomique (boutons, titres, images).
-   `molecules/` : Contient les fichiers SCSS pour les composants moléculaires (cartes, formulaires, navigation).
-   `organisms/` : Contient les fichiers SCSS pour les composants organiques (en-tête, pied de page).
-   `templates/` : Contient les fichiers SCSS pour les templates de page (produit, blog).

## Variables SCSS (`_vars.scss`)

Ce fichier définit toutes les variables réutilisables utilisées dans le thème.

-   **Échelle :**
    -   `$base_size` : Taille de police de base pour la mise à l'échelle `rem`.
    -   `$header_height` : Hauteur de l'en-tête.
    -   `$element_width` : Largeur par défaut des éléments internes.
    -   `$element_maxwidth` : Largeur maximale des éléments internes.
    -   `$element_width_mobile` : Largeur par défaut des éléments internes sur mobile.
-   **Couleurs :**
    -   `$color-primary` : Couleur bleue principale.
    -   `$color-primary-darker` : Nuance plus foncée de `$color-primary`.
    -   `$color-primary-lighter` : Nuance plus claire de `$color-primary`.
    -   `$color-secondary` : Couleur orange principale.
    -   `$color-secondary-darker` : Nuance plus foncée de `$color-secondary`.
    -   `$color-tertiary` : Autre couleur bleue.
    -   `$color-tertiary-darker` : Nuance plus foncée de `$color-tertiary`.
    -   `$color-black`, `$color-dark`, `$color-grey2`, `$color-grey1`, `$color-grey`, `$color-light` : Diverses nuances de gris et de couleurs claires.
-   **Polices :**
    -   `$text-fz` : Taille de police de base.
    -   `$text-scale-ratio` : Ratio de mise à l'échelle pour les tailles de police.
    -   `$text-ff` : Famille de police par défaut (Raleway).
    -   `$text-c` : Couleur de texte par défaut.
    -   `$text-fw` : Graisse de police par défaut.
    -   `$text-lh` : Hauteur de ligne par défaut.
    -   `$text-xs`, `$text-sm`, `$text-md`, `$text-lg`, `$text-xl`, `$text-xxl`, `$text-xxxl` : Tailles de police mises à l'échelle.
-   **Espace :**
    -   `$space-xxxs`, `$space-xxs`, `$space-xs`, `$space-sm`, `$space-md`, `$space-lg`, `$space-xl`, `$space-xxl`, `$space-xxxl` : Valeurs d'espacement.
-   **Valeurs par défaut :**
    -   `$html__bgcolor` : Couleur de fond pour la balise `html`.
    -   `$nav__linkcolor`, `$nav__hovercolor`, `$nav__activecolor`, `$nav__spacercolor` : Couleurs pour les liens de navigation.
    -   `$a__linkcolor`, `$a__hovercolor`, `$a__textdecoration` : Couleurs et décoration pour les liens d'ancrage.
-   **Transitions :**
    -   `$transition_fast`, `$transition_slow` : Durées de transition.
-   **Ombres :**
    -   `$shadow`, `$shadow__soft` : Valeurs d'ombre de boîte.

## Mixins SCSS (`_mixins.scss`)

Ce fichier contient des mixins SCSS réutilisables.

-   **`breakpoint($device)` :** Crée des media queries pour différentes tailles d'écran (desktop, laptop, tablet, phablet, mobile).
-   **`responsive-font-size($size, $line-height: null, $weight: null)` :** Génère des tailles de police responsives basées sur des valeurs en pixels, avec une hauteur de ligne et une graisse de police optionnelles.
-   **`transform($transform)` :** Applique des transformations CSS avec des préfixes vendeurs.
-   **`transition($transition)` :** Applique des transitions CSS avec des préfixes vendeurs.
-   **`transition-delay($transition-delay)` :** Applique des délais de transition CSS avec des préfixes vendeurs.

## Design responsive

Le thème est conçu pour être responsive, en utilisant des media queries définies dans `_mixins.scss` et des variables dans `_vars.scss`.

-   La variable `$base_size` permet de mettre à l'échelle tous les éléments basés sur `rem`.
-   Le mixin `breakpoint()` est utilisé pour appliquer des styles à différentes tailles d'écran.
-   Le mixin `responsive-font-size()` est utilisé pour ajuster les tailles de police en fonction de la taille de l'écran.

## Comment personnaliser

1.  **Variables :** Modifiez les valeurs dans `_vars.scss` pour changer les couleurs, les tailles et autres paramètres globaux.
2.  **Mixins :** Ajoutez ou modifiez des mixins dans `_mixins.scss` pour créer des modèles de style réutilisables.
3.  **Design atomique :** Créez ou modifiez des styles dans les dossiers `atoms/`, `molecules/`, `organisms/` et `templates/`.
4.  **CSS personnalisé :** Ajoutez des classes CSS personnalisées et des styles directement dans `style.scss` ou créez de nouveaux partiels et importez-les.
5.  **Polices:** Ajouter vos polices dans `_fonts.scss`

## Licence

MIT
