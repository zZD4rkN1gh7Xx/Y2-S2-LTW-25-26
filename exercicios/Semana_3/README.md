# HTML / CSS Exercises

## 1. HTML

Using HTML5 only, recreate the structure of a recipe website mockup.

**Goals:**
- Focus purely on structure.

**Structure to follow:**
- Use a `<header>` for the recipe name and card (times and servings)
- Use `<section>` elements for the description, ingredients, and method
- Use a `<dl>`, `<dt>`, and `<dd>` for the times and servings card
- Use `<ul>` for ingredients and `<ol>` for the method steps
- Use `<figure>` and `<figcaption>` for the recipe image

![alt text](/Y2-S2-LTW-25-26/exercicios/Semana_3/semana_3_inicio.png)


---

## 2. CSS

Using CSS3, recreate the design of the mockup.

**Goals:**
- Import fonts using [Google Fonts](https://fonts.google.com/) (e.g. Imperial Script, Ruda, Crimson Pro)
- Try to match the mockup as closely as possible

**Key techniques used:**
- `font-family` with Google Fonts (Imperial Script for `h1`, Ruda for `h2`) and `font-weight`, `font-size`, `text-align` to style headings
- `border-bottom` on `h2` for an underline effect
- `width`, `margin: 0 auto`, `padding`, and `line-height` on `main` to center and space the content
- `@media` queries to make the layout responsive on smaller screens
- `background-color`, `opacity`, `text-transform`, and individual `border-*` properties on `.description` for a styled card with different borders on each side
- `border-radius` with per-corner values (e.g. `10px 0px 0px 10px`) for one-sided rounding
- `display: grid` on `dl` to align `dt` and `dd` side by side, with `margin-left: 0` on `dd` to remove the default indent
- `width: 100%` and `height: auto` on `img`, with `margin: 0` on `figure` to make images fill their container
- `font-weight: bold` and `color` on `dl` to style the times card text
- `:not(:last-child)` on `li` to add spacing between list items without affecting the last one
- `.highlighted` class with `color: cadetblue` applied via `<span>` to color specific words in the method steps

![alt text](/Y2-S2-LTW-25-26/exercicios/Semana_3/semana_3_done.png)
