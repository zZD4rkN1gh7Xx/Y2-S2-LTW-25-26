# Week 06 — PHP Exercises

## Overview

This week's exercises focus on **PHP**. Server-side scripting, database integration with SQLite, session management, and MVC-style code organization. The goal is to build a fully functional dynamic web application with authentication, CRUD operations, and clean separation of concerns.

---

## Exercises

| # | Title | Key Concepts |
|---|---|---|
| 0 | Environment Setup | PHP CLI, SQLite3, WSL, dev server |
| 1 | HTTP Parameters | `$_GET`, forms, HTML output |
| 2 | SQLite Database Creation | SQL scripts, `sqlite3`, schema design |
| 3 | Listing Data from SQLite | PDO, `prepare`, `execute`, `fetchAll` |
| 4 | Complete Page | Joins, date formatting, `explode`, article detail |
| 5 | Data Layer Separation | Functions, `require_once`, database abstraction |
| 6 | Presentation Layer Separation | Template functions, folder structure |
| 7 | Editing Data | Forms, hidden inputs, UPDATE queries, redirects |
| 8 | Authentication | Sessions, `session_start`, login/logout flow |
| 9 | Insert and Delete | Full CRUD, comment actions |

---

## Exercise Details

### 0. Environment Setup

Install and configure PHP and SQLite for local development.

**Installation steps by OS:**

| OS | Steps |
|---|---|
| Windows | Install WSL (`wsl --install -d Ubuntu`), then install packages via `apt-get` |

**Verification commands:**
```bash
php --version        # >= 7.4 required
sqlite3 --version    # any version
php -S localhost:9000  # starts local dev server
```

---

### 1. HTTP Parameters

Create a PHP script that reads GET parameters and performs arithmetic, plus an HTML form to submit values.

**Files to create:**

| File | Description |
|---|---|
| `sum2.php` | Reads `num1` and `num2` from `$_GET`, prints the sum |
| `form2.html` | HTML form that sends two numbers to `sum2.php` |

**Key concepts used:**
- `$_GET` superglobal to access URL query parameters
- HTML `<form>` with `method="GET"` and `action` pointing to the script
- PHP embedded in valid HTML output
- Link from `sum2.php` back to `form2.html`

**Test URL:** `http://localhost:9000/sum2.php?num1=2&num2=5`


https://github.com/user-attachments/assets/9bcee1a5-5dfb-4395-9680-6a1b3ca92c7e


---

### 2. SQLite Database Creation

Set up a SQLite database using a provided SQL script and explore it via the SQLite CLI.

**Key commands:**
```bash
sqlite3 -init news.sql news.db   # create and populate the database
sqlite3 news.db                  # open the database interactively
.exit                            # quit the SQLite interface
```

**Example queries to verify the database:**
```sql
SELECT * FROM news WHERE id = 4;
SELECT * FROM comments WHERE news_id = 4;
```

---

### 3. Listing Data from SQLite

Connect to the SQLite database from PHP and display all news articles dynamically.

**Key concepts used:**
- `PDO` class for database connection: `new PDO('sqlite:news.db')`
- `$db->prepare()` + `$stmt->execute()` to safely run queries
- `fetchAll()` to retrieve all rows as an associative array
- `foreach` loop to iterate and output HTML

**Always use `prepare` + `execute` — never interpolate user input directly into SQL.**


### 4. Complete Page
 
Build a fully styled `index.php` and `article.php` using data from the database.
 
**Files to create:**
 
| File | Description |
|---|---|
| `index.php` | Lists all articles with author, tags, comment count |
| `article.php` | Shows a single article and its comments, received via `?id=` |
 
**Key SQL query for the index:**
```sql
SELECT news.*, users.*, COUNT(comments.id) AS comments
FROM news JOIN
     users USING (username) LEFT JOIN
     comments ON comments.news_id = news.id
GROUP BY news.id, users.username
ORDER BY published DESC
```
 
**Useful PHP functions:**
```php
$date = date('F j', $article['published']);  // format epoch timestamp
$tags = explode(',', $article['tags']);       // split comma-separated tags
```
 
---

### 5. Data Layer Separation
 
Move all database logic into dedicated files inside a `database/` folder so pages only handle presentation.
 
**Folder structure after this exercise:**
```
database/
  connection.php   # getDatabaseConnection()
  news.php         # getAllNews(), getNewsById()
  comments.php     # getCommentsByNewsId()
```
 
**`index.php` should now start with:**
```php
<?php
  require_once('database/connection.php');
  require_once('database/news.php');
 
  $db = getDatabaseConnection();
  $articles = getAllNews($db);
?>
```
 
**Key principle:** Pages never write SQL directly, they call functions. Functions never output HTML, they return data.
 
---

### 6. Presentation Layer Separation
 
Move all HTML output into template functions inside a `templates/` folder. Move CSS files into a `css/` folder.
 
**Folder structure after this exercise:**
```
css/
  style.css
  layout.css
  responsive.css
  comments.css
  forms.css
templates/
  common.php    # output_header(), output_footer()
  news.php      # output_article_list(), output_article(), output_full_article()
  comments.php  # output_comments()
```
 
**`index.php` should now look like:**
```php
<?php
  require_once('database/connection.php');
  require_once('database/news.php');
  require_once('templates/common.php');
  require_once('templates/news.php');
 
  $db = getDatabaseConnection();
  $articles = getAllNews($db);
 
  output_header();
  output_aside($articles);
  output_article_list($articles);
  output_footer();
?>
```
 
**Key principle:** Template functions only output HTML. They never query the database.
 
---

### 7. Editing Data
 
Add the ability to edit existing articles using a form that submits to an action page, which updates the database and redirects back.
 
**Files to create:**
 
| File | Description |
|---|---|
| `edit_article.php` | Form pre-filled with article data, received via `?id=` |
| `action_edit_news.php` | Receives POST data, runs UPDATE query, redirects |
 
**Flow:**
```
article.php → edit_article.php → action_edit_news.php → article.php
 (view)           (form)              (process)            (result)
  GET               GET                  POST                GET
```
 
**Function to add to `database/news.php`:**
```php
function updateNews($db, $id, $title, $introduction, $body) {
    $stmt = $db->prepare('UPDATE news SET title = ?, introduction = ?, fulltext = ? WHERE id = ?');
    $stmt->execute(array($title, $introduction, $body, $id));
}
```
 
**Why a separate action page?** This follows the POST/Redirect/GET pattern. It prevents duplicate form submissions if the user refreshes the browser after saving.
 
---

### 8. Authentication
 
Add login/logout functionality using PHP sessions. Protect edit pages from unauthenticated access.
 
**Files to create:**
 
| File | Description |
|---|---|
| `login.php` | Form asking for username and password |
| `action_login.php` | Verifies credentials, stores username in session, redirects |
| `action_logout.php` | Destroys session, redirects back |
| `database/users.php` | `userExists()` function checking username + SHA-1 password |
 
**Session flow:**
```
login.php → action_login.php → previous page
              (sets $_SESSION['username'])
 
any page → action_logout.php → previous page
              (destroys session)
```
 
**Key rules:**
- Call `session_start()` at the top of every page
- Show the Edit link only when `isset($_SESSION['username'])`
- Redirect to `index.php` at the top of `edit_article.php` and `action_edit_news.php` if not logged in
 
**Passwords** are stored as SHA-1 hashes in the database — use `sha1()` when comparing:
```php
function userExists($db, $username, $password) {
    $stmt = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    $stmt->execute(array($username, sha1($password)));
    return $stmt->fetch() !== false;
}
```
 
---

### 9. Insert and Delete
 
Complete the full CRUD cycle by adding the ability to create and delete articles, and to post comments.
 
**Files to create:**
 
| File | Description |
|---|---|
| `insert_article.php` | Form with title, introduction, and fulltext fields |
| `action_insert_news.php` | Inserts new article, redirects to `index.php` |
| `action_delete_news.php` | Deletes article and its comments, redirects to `index.php` |
| `action_insert_comment.php` | Inserts comment linked to article, redirects back to article |
 
**Functions to add to `database/news.php`:**
```php
function insertNews($db, $title, $introduction, $fulltext, $username) {
    $stmt = $db->prepare('INSERT INTO news VALUES (NULL, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($title, time(), '', $username, $introduction, $fulltext));
}
 
function deleteNews($db, $id) {
    $stmt = $db->prepare('DELETE FROM comments WHERE news_id = ?');
    $stmt->execute(array($id));
    $stmt = $db->prepare('DELETE FROM news WHERE id = ?');
    $stmt->execute(array($id));
}
```
 
**Function to add to `database/comments.php`:**
```php
function insertComment($db, $news_id, $username, $text) {
    $stmt = $db->prepare('INSERT INTO comments VALUES (NULL, ?, ?, ?, ?)');
    $stmt->execute(array($news_id, $username, time(), $text));
}
```
 
**Why delete comments before the article?** The `comments` table has a foreign key referencing `news`. Deleting the article first would leave orphaned comment records and cause a constraint error — comments must be removed first.
 
**All insert/delete actions require the user to be logged in**. Session check at the top of each action file.
 
---

*Back to [course root](../../README.md)*
