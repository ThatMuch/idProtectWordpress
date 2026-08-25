# Instructions pour ce theme

## Contexte du projet

Le thème `idProtectWordpress` est en cours de refonte complète ("rebuild"). Détails utiles :

- **Nouveaux blocks Gutenberg/ACF : ne pas les créer dans ce thème.** Ils vont dans le plugin
  séparé `GuttenbergBlockTM` (`wp-content/plugins/GuttenbergBlockTM`, ACF PRO +
  `@wordpress/scripts`), pour que le contenu survive à une future refonte du thème. Les blocks
  existants dans `blocks/` (HeroSection, section, temoignage, service, Faq, Offers, Reviews...),
  enregistrés dans `functions/functions-blocks.php`, restent en place mais ne servent pas de
  modèle pour du nouveau code.
- Le design system V4 (Figma "Design System - ID Protect") est en cours de portage dans
  `assets/styles/atoms/` : classes `.btn` (`.btn--primary/secondary/light` ×
  `.btn--solid/outlined/link`, icône via `.btn__icon`) et `.input`
  (`.input__label`/`.input__field`/`.input__control`, modifiers `.input--error`/`.input--textarea`).
  Utiliser ces classes plutôt que des styles ad hoc, et préférer les tokens `$radius-*` /
  `$color-*` de `_vars.scss` même quand ils ne collent pas au pixel près à une maquette Figma
  ponctuelle.
- Contact Form 7 : dans un tag existant, si on ajoute une option `class:` à un tag qui a déjà
  `placeholder "..."` (ou toute autre option entre guillemets), l'option `class:` doit être
  placée **avant** l'option entre guillemets — sinon le tag entier disparaît silencieusement du
  scan CF7 (aucune erreur visible).

## Build SCSS

- Styles sources : `assets/styles/` (architecture atomic design — `atoms/`, `molecules/`,
  `organisms/`, `templates/`, voir `README.md` pour le détail des fichiers).
- Compilation via Gulp (`npm run styles`, ou `gulp` pour lancer aussi `watch`). Les fichiers
  compilés (`assets/styles/style.min.css`, `admin.min.css`, `login.min.css`) sont **versionnés
  dans git** : après toute modification de `.scss`, relancer la compilation et commiter le CSS
  généré avec la source, sinon le site en production ne reflète pas le changement.

## Accessibilité et SEO — à respecter systématiquement

Tout code produit ou modifié ici (markup PHP des `render.php` /
`template-parts`, SCSS, JS d'édition) doit être conforme aux normes
d'accessibilité (WCAG AA) et de bon référencement, **sans attendre qu'on le
demande explicitement** :

- HTML sémantique : le bon élément pour le bon contenu — titres hiérarchisés
  sans saut de niveau, `<blockquote>` pour une citation, `<ul>/<li>` pour une
  liste d'éléments répétés (cartes, cards...), `<article>`/`<section>` pour un
  contenu autonome — plutôt que des `<div>` génériques partout.
- Contraste de texte conforme AA (4.5:1 texte courant, 3:1 grand texte ≥ 18.66px
  bold ou ≥ 24px) : vérifier les couleurs `theme.json` utilisées ensemble
  (fond + texte), pas juste chacune isolément.
- Contenu décoratif (icônes, images de fond CSS) marqué `aria-hidden="true"`,
  jamais en `<img>` sans `alt` pertinent.
- Liens et boutons avec un texte explicite (pas de « cliquez ici »), et un
  indice `.screen-reader-text` (classe déjà définie côté thème) quand ils
  ouvrent un nouvel onglet.
- Landmarks (`<section aria-labelledby="...">`, etc.) correctement reliés à
  leur titre.
