# Week 04 & 05 — CSS Exercises

## Overview

These weeks' exercises focus exclusively on **CSS**: styling, layout, responsive design, cascading rules, and form design.

---

## Exercises

| # | Title | Key Concepts | Status |
|---|---|---|---|
| 1 | Online Newspaper | Selectors, flexbox, grid, media queries, transitions | ✅ Done |
| 2 | No Flexbox/Grid Design | Float, position, clear | ✅ Done |
| 3 | Cascading | Specificity, inheritance, rule resolution | ✅ Done |
| 4 | Form Design | Grid layout, CSS variables, pseudo-classes | ✅ Done |

---

## Exercise Details

### 1. Online Newspaper

Apply CSS to the multi-page newspaper prototype from Week 2, split across five focused stylesheets.

**Files structured:** inside /news

| File | Description |
|---|---|
| `style.css` | Main component styling |
| `layout.css` | Positioning and page structure |
| `responsive.css` | Responsive breakpoints and animations |
| `comments.css` | Comment section design |
| `register.css` | Login and register form design |

---

#### 1.1 Main Style (`style.css`)

Style the main components.

**Key concepts used:**
- CSS selectors to target specific HTML elements
- Custom fonts via Google Fonts (`Lora` and `Poppins`) using `@import`
- Pseudo-class `:hover` to change background and text color on nav links
- `display: none` to hide the hamburger menu checkbox and label

![alt text](/exercicios/Semana_4/screenshots/main_style_done.png)

---

#### 1.2 Positioning (`layout.css`)

Position all elements into their correct places on the page.

**Key concepts used:**
- CSS Grid for overall page layout
- Flexbox for the navigation menu
- Page width fixed at `60em`
- Sidebar occupying `1/5` of total width

![alt text](/exercicios/Semana_4_5/screenshots/positioning_done.png)

---

#### 1.3 Responsive Design (`responsive.css`)

Two breakpoints to adapt the layout to smaller screens.

**Breakpoints:**

| Width | Behaviour |
|---|---|
| `60em` | Sidebar disappears, page expands to `100%` width |
| `30em` | Menu collapses into hamburger, subtitle hidden, news titles move above images |

**Key concepts used:**
- `@media` queries for screen-width-based rules
- Hidden `<input type="checkbox">` to save menu open/close state in CSS
- `::after` pseudo-element to inject hamburger (`☰`) and close (`✕`) characters
- CSS `transition` on height for smooth menu animation


https://github.com/user-attachments/assets/95848ab5-45a0-4662-8347-ef3e71df57f4


---

#### 1.4 Comments Design (`comments.css`)

Style the comments section on `item.html`.

**Key concepts used:**
- CSS Grid for the comment form layout
- `::before` pseudo-element with `\201C` (`"`) as a decorative quote character per comment

![alt text](/exercicios/Semana_4_5/screenshots/comments_done.png)

---

#### 1.5 Register Design (`register.css`)

Style the register and login forms on `register.html` and `login.html`.

**Key concepts used:**
- CSS Grid for form field layout
- Generic selectors to avoid rule repetition
- Responsive adjustments so the form fills the content area on small screens

![alt text](/exercicios/Semana_4_5/screenshots/login-register_done.png)

---

### 2. No Flexbox/Grid Design

Recreate four different layouts using only classic CSS positioning — no flexbox or grid allowed.

**Key concepts used:**
- `float`, `clear`, and `position` to build complex layouts
- `display: inline-block` for horizontal element alignment

**Styles recreated:**

| Style | Image |
|---|---|
| Style 1 | ![alt text](/exercicios/Semana_4_5/screenshots/ex2-1_done.png) |
| Style 2 | ![alt text](/exercicios/Semana_4_5/screenshots/ex2-2_done.png) |
| Style 3 | ![alt text](/exercicios/Semana_4_5/screenshots/ex2-3_done.png) |


---

### 3. Cascading

Analyse CSS rule resolution, specificity, and inheritance on a fixed HTML snippet without running it in the browser.

**HTML snippet:**
```html
<section id="foo">
  <ul class="bar">
    <li class="first"><a href="#">A</a></li>
    <li class="second"><a href="#">B</a></li>
    <li><a href="#">C</a></li>
    <li><a href="#">D</a></li>
  </ul>
</section>
```

**CSS rules analysed:**

| Rule | Selector | Specificity |
|---|---|---|
| R1 | `section ul li` | 0-0-3 |
| R2 | `.bar .second` | 0-2-0 |
| R3 | `li a` | 0-0-2 |
| R4 | `section li:first-child ~ li` | 0-1-2 |
| R5 | `#foo .bar li :first-child` | 1-2-1 |
| R6 | `.bar li` | 0-1-1 |

![alt text](/exercicios/Semana_4_5/screenshots/cascading_done.png)

---

### 4. Form Design

Apply CSS to a registration form using grid layout and CSS custom properties.

**Fields covered:**

| Field | Type |
|---|---|
| Username | Text (required) |
| Password | Password (required) |
| First Name | Text |
| Last Name | Text |
| E-mail | Email (required) |
| Address | Text |
| Country | `<select>` dropdown |
| City | Text |
| ZIP Code | Text |
| Bio | `<textarea>` |

#### 4.1 Main Form Design (`style.css`)

**Key concepts used:**
- `display: grid` on the `<form>` to place each field in the correct position
- CSS custom properties (`--var`) for all colors
- `:invalid` pseudo-class to apply error styling to invalid inputs

![alt text](/exercicios/Semana_4_5/screenshots/form_style_done.png)

#### 4.2 Responsive Form Design (`responsive.css`)

**Key concepts used:**
- `@media` query to reflow the grid into a single-column layout on smaller screens
- Form expands to fill the full content area width on mobile

![alt text](/exercicios/Semana_4_5/screenshots/form_responsive_done.png)

---

*Back to [course root](../../README.md)*
