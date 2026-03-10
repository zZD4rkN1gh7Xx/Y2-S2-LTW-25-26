# Week 06 — PHP Exercises

## Overview

This week's exercises focus on **PHP** — server-side scripting, database integration with SQLite, session management, and MVC-style code organization. The goal is to build a fully functional dynamic web application with authentication, CRUD operations, and clean separation of concerns.

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

**⚠️ Always use `prepare` + `execute` — never interpolate user input directly into SQL.**

---

*Back to [course root](../../README.md)*