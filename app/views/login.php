<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= site_url('/assets/css/style.css') ?>">
    <style>
        		/* Product Management — pink gradient theme
   Targets the existing markup as-is (no classes added to any view). */

:root {
  --pink-50: #fff3f8;
  --pink-100: #ffd9ec;
  --pink-200: #ffbdde;
  --pink-300: #ff9dc9;
  --pink-500: #ec4899;
  --pink-700: #b0206b;
  --ink: #191115;
  --ink-soft: #14080d;
  --white: #ffffff;
  --line: #060818;
  --shadow: 0 16px 40px -20px rgba(176, 32, 107, 0.35);
}

* { box-sizing: border-box; }

html, body { margin: 0; min-height: 100vh; }

body {
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
  font-size: 15px;
  line-height: 1.5;
  color: var(--ink);
  background: linear-gradient(155deg, var(--pink-50) 0%, #1b70a5 45%, var(--pink-100) 100%);
}

h1 {
  font-family: 'Poppins', 'Inter', sans-serif;
  font-weight: 600;
  color: var(--pink-700);
  margin: 0 0 6px;
}

a { color: var(--pink-700); text-decoration: none; }
a:hover { text-decoration: underline; }

/* ---- Card containers ----
   Pages whose <main> wraps a form directly (login, register, product add/edit)
   become a centered white card. */
main:has(> form) {
  max-width: 380px;
  margin: 64px auto;
  background: var(--white);
  padding: 40px 36px;
  border-radius: 20px;
  box-shadow: var(--shadow);
}
main:has(> form) h1 { text-align: center; }

/* Pages whose <main> wraps a table (products list) get a wider layout. */
main:has(table) {
  max-width: 1000px;
  margin: 48px auto;
  padding: 0 24px;
}
main:has(table) h1 { font-size: 26px; margin-bottom: 24px; }

/* Users page has no <main>; the table sits directly in <body>. */
body:has(> table) { padding: 48px 24px; }

/* ---- Form fields ---- */
label {
  display: block;
  margin-bottom: 16px;
  font-size: 13px;
  font-weight: 500;
  color: var(--ink-soft);
}

label input,
label select,
label textarea {
  display: block;
  width: 100%;
  margin-top: 6px;
  padding: 11px 14px;
  font-size: 14px;
  font-family: inherit;
  color: var(--ink);
  background: var(--pink-50);
  border: 1px solid var(--line);
  border-radius: 10px;
}

label input:focus,
label select:focus,
label textarea:focus {
  outline: 2px solid var(--pink-500);
  border-color: var(--pink-300);
}

label textarea { min-height: 90px; resize: vertical; }

button[type="submit"] {
  display: block;
  width: 100%;
  margin-top: 4px;
  padding: 12px 20px;
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  font-weight: 600;
  color: var(--white);
  background: linear-gradient(135deg, var(--pink-500), var(--pink-700));
  border: none;
  border-radius: 999px;
  cursor: pointer;
  transition: filter 0.15s ease;
}
button[type="submit"]:hover { filter: brightness(1.06); }
button[type="submit"]:focus-visible { outline: 2px solid var(--ink); outline-offset: 3px; }

/* Error message: a <p> immediately followed by the form (login/register). */
p:has(+ form) {
  background: #fdeaf2;
  color: var(--pink-700);
  border: 1px solid var(--pink-200);
  border-radius: 10px;
  padding: 10px 14px;
  font-size: 13px;
  margin: 0 0 20px;
}

/* Link line right after a form ("Back to products", "Register", "Back to login"). */
form + p {
  text-align: center;
  margin-top: 20px;
  font-size: 13px;
  color: var(--ink-soft);
}

/* Products list: identity line, then the add/logout link line. */
main:has(table) > p:first-of-type {
  color: var(--ink-soft);
  font-size: 13px;
  margin: 0 0 20px;
}

main:has(table) > p:nth-of-type(2) a {
  display: inline-block;
  padding: 8px 16px;
  margin-right: 8px;
  border: 1px solid var(--pink-300);
  border-radius: 999px;
  font-size: 13px;
  color: var(--pink-700);
}
main:has(table) > p:nth-of-type(2) a:last-child { margin-right: 0; }
main:has(table) > p:nth-of-type(2) a:hover { background: var(--pink-50); text-decoration: none; }

/* ---- Tables (products list + users list) ---- */
table {
  width: 100%;
  max-width: 1000px;
  margin: 0 auto;
  border-collapse: separate;
  border-spacing: 0;
  background: var(--white);
  border-radius: 16px;
  box-shadow: var(--shadow);
  overflow: hidden;
}

thead th {
  text-align: left;
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
  font-weight: 600;
  color: var(--pink-700);
  background: var(--pink-50);
  padding: 14px 18px;
  border-bottom: 1px solid var(--line);
}

thead td,
tbody td {
  padding: 14px 18px;
  border-bottom: 1px solid var(--line);
  font-size: 14px;
}

tbody tr:hover td,
thead tr:hover td { background: var(--pink-50); }

/* Row action links (Edit / Delete) in the products table. */
tbody td:last-child a {
  font-size: 13px;
  font-weight: 500;
  margin-right: 14px;
}
tbody td:last-child a:last-child { margin-right: 0; color: #b3325c; }
</style>
</head>
<body>
    <main>
        <h1>Product Management</h1>
        <?php if (!empty($error)): ?>
            <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>
        <form method="post" action="<?= site_url('/login') ?>">
            <label>Username <input name="username" required></label>
            <label>Password <input type="password" name="password" required></label>
            <button type="submit">Log in</button>
        </form>
        <p><a href="<?= site_url('/register') ?>">Register as a user</a></p>
    </main>
</body>
</html>