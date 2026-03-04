# 📄 Week 02 — HTML Exercises

## 📋 Overview

This week's exercises focus exclusively on **HTML5** — semantic markup, document structure, tables, forms, and accessibility. No CSS or JavaScript yet; the goal is to master the structure layer of the web.

---

## Exercises

| # | Title | Key Concepts | Status |
|---|---|---|---|
| 1 | Online Newspaper | Semantic HTML, sections, forms, nav | ✅ Done |
| 2 | Complex Table | `colspan`, `rowspan`, tabular data | ✅ Done |
| 3 | Form | Inputs, labels, datalist, GET vs POST | ✅ Done |


---

## Exercise Details

### 1.  Online Newspaper

Build a multi-page prototype of an online newspaper using only HTML5.

**Pages to create:**

| File | Description |
|---|---|
| `index.html` | Main page — list of abbreviated news items |
| `article.html` | Full news article + reader comments + comment form |
| `section.html` | Section page (e.g., Sports, Politics) — filtered news |

**Key elements used:**
- `<header>`, `<nav>`, `<main>`, `<article>`, `<section>`, `<footer>` — semantic structure
- `<ul>` with `<li>` for navigation links
- `<figure>` / `<figcaption>` for images
- `<time>` for dates
- `<form>` with `<input>`, `<textarea>` for the comment form
- `&copy;` character entity for the copyright symbol

![alt text](/Y2-S2-LTW-25-26/exercicios/Semana_2//HTML_exercices/AllPrint.png)
![alt text](/Y2-S2-LTW-25-26/exercicios/Semana_2//HTML_exercices/article_print.png)
---

### 2. Complex Table

Recreate a complex table using `colspan` and `rowspan` to merge cells across rows and columns.

**Key elements used:**
- `<table>`, `<thead>`, `<tbody>`, `<tfoot>`
- `<tr>`, `<th>`, `<td>`
- `colspan` and `rowspan` attributes
- HTML5 badge embedded in the page

![alt text](/Y2-S2-LTW-25-26/exercicios/Semana_2/Complex_table/table_print.png)

---

### 3.  Form

Create a user input form with multiple field types, validation, and accessibility.

**Fields:**

| Field | Type |
|---|---|
| Name | Text (required) |
| Age | Radio buttons (`<18`, `19-35`, `36-48`, `>49`) |
| Profession | Text + `<datalist>` suggestions |
| Country | `<select>` dropdown (required) |
| Interests | Checkboxes |
| How did you find us | `<textarea>` |

**Key elements used:**
- `<label>` for every field (accessibility)
- `required` attribute on Name and Country
- `<datalist>` for Profession suggestions
- `<button type="submit">` for submission
- Tested with both `method="GET"` and `method="POST"`

![alt text](/Y2-S2-LTW-25-26/exercicios/Semana_2/Form/Screenshot%202026-03-04%20152919.png)

---

## 🔗 Resources

- [W3C HTML Validator](https://validator.w3.org/)
- [HTML5 Badge](https://www.w3.org/html/logo/)

---

*Back to [course root](../../README.md)*