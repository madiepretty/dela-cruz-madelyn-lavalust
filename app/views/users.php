<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= site_url('/assets/css/style.css') ?>">
    <style>
        /* ============================================================
   Product Management — design tokens
   Palette: sky blue + pink, warm neutral ink
   Type: Poppins (headings) / Inter (body)
   ============================================================ */

:root {
  --sky: #38bdf8;
  --sky-deep: #0284c7;
  --sky-tint: #e6f6fe;
  --pink: #f472b6;
  --pink-deep: #db2777;
  --pink-tint: #fdeef6;
  --bg: #f5fafd;
  --surface: #ffffff;
  --ink: #1e2a38;
  --ink-muted: #64748b;
  --line: #dfeef7;
  --radius-lg: 18px;
  --radius-md: 12px;
  --radius-sm: 8px;
  --shadow: 0 12px 28px -16px rgba(14, 116, 168, 0.28);
}

* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
  background: var(--bg);
  color: var(--ink);
  line-height: 1.5;
}

h1, h2, h3 {
  font-family: "Poppins", "Inter", sans-serif;
  font-weight: 600;
  margin: 0 0 0.4em;
  letter-spacing: -0.01em;
}

a {
  color: var(--sky-deep);
  text-decoration: none;
}

a:hover,
a:focus-visible {
  text-decoration: underline;
}

a:focus-visible,
button:focus-visible,
input:focus-visible,
select:focus-visible,
textarea:focus-visible {
  outline: 2px solid var(--pink-deep);
  outline-offset: 2px;
}

/* ---------- Auth pages (login / register) ---------- */

.auth-shell {
  min-height: 100vh;
  display: grid;
  grid-template-columns: minmax(260px, 1fr) minmax(320px, 1.1fr);
}

@media (max-width: 760px) {
  .auth-shell {
    grid-template-columns: 1fr;
  }
}

.auth-hero {
  background: linear-gradient(155deg, var(--sky) 0%, var(--sky-deep) 46%, var(--pink) 100%);
  color: #fff;
  padding: 56px 48px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 220px;
}

.auth-hero .mark {
  font-family: "Poppins", sans-serif;
  font-weight: 700;
  font-size: 1.4rem;
}

.auth-hero .pitch h2 {
  color: #fff;
  font-size: clamp(1.6rem, 3vw, 2.2rem);
  max-width: 18ch;
}

.auth-hero .pitch p {
  color: rgba(255, 255, 255, 0.86);
  max-width: 34ch;
}

.auth-panel {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 48px 24px;
}

.auth-card {
  width: 100%;
  max-width: 380px;
}

.auth-card h1 {
  font-size: 1.6rem;
  color: var(--ink);
}

.auth-card .subtitle {
  color: var(--ink-muted);
  margin-bottom: 28px;
}

.field {
  display: block;
  margin-bottom: 18px;
  font-size: 0.9rem;
  color: var(--ink);
  font-weight: 500;
}

.field input,
.field select,
.field textarea {
  display: block;
  width: 100%;
  margin-top: 6px;
  padding: 11px 13px;
  border: 1px solid var(--line);
  border-radius: var(--radius-sm);
  font-size: 0.95rem;
  font-family: inherit;
  color: var(--ink);
  background: var(--surface);
  transition: border-color 0.15s ease, box-shadow 0.15s ease;
}

.field textarea {
  min-height: 90px;
  resize: vertical;
}

.field input:focus,
.field select:focus,
.field textarea:focus {
  border-color: var(--sky);
  box-shadow: 0 0 0 3px var(--sky-tint);
  outline: none;
}

.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 12px 20px;
  border-radius: var(--radius-sm);
  border: none;
  font-family: inherit;
  font-size: 0.95rem;
  font-weight: 600;
  cursor: pointer;
  text-decoration: none;
}

.btn-primary {
  background: linear-gradient(120deg, var(--sky-deep), var(--pink-deep));
  color: #fff;
  width: 100%;
}

.btn-primary:hover {
  filter: brightness(1.05);
  text-decoration: none;
}

.form-note {
  margin-top: 22px;
  font-size: 0.9rem;
  color: var(--ink-muted);
  text-align: center;
}

.error-banner {
  background: var(--pink-tint);
  border: 1px solid #f8c9de;
  color: var(--pink-deep);
  padding: 10px 14px;
  border-radius: var(--radius-sm);
  font-size: 0.9rem;
  margin-bottom: 18px;
}

/* ---------- App shell (products / users) ---------- */

.app-shell {
  max-width: 1040px;
  margin: 0 auto;
  padding: 32px 24px 64px;
}

.topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  padding-bottom: 20px;
  border-bottom: 1px solid var(--line);
  margin-bottom: 28px;
}

.topbar .mark {
  font-family: "Poppins", sans-serif;
  font-weight: 700;
  font-size: 1.15rem;
  color: var(--ink);
}

.topbar .mark span {
  color: var(--pink-deep);
}

.identity {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 0.9rem;
}

.identity .chip {
  background: var(--sky-tint);
  color: var(--sky-deep);
  border-radius: 999px;
  padding: 4px 12px;
  font-weight: 600;
  font-size: 0.78rem;
  text-transform: capitalize;
}

.page-head {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 12px;
  margin-bottom: 20px;
}

.page-head h1 {
  font-size: 1.5rem;
}

.page-head .count {
  color: var(--ink-muted);
  font-size: 0.9rem;
}

.table-card {
  background: var(--surface);
  border: 1px solid var(--line);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow);
  overflow: hidden;
}

table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
}

thead th {
  background: var(--pink-tint);
  color: var(--pink-deep);
  text-align: left;
  font-weight: 600;
  font-size: 0.78rem;
  padding: 14px 18px;
  border-bottom: 1px solid var(--line);
}

tbody td {
  padding: 14px 18px;
  border-bottom: 1px solid var(--line);
  color: var(--ink);
  vertical-align: top;
}

tbody tr:last-child td {
  border-bottom: none;
}

tbody tr:hover {
  background: var(--sky-tint);
}

.actions a {
  margin-right: 12px;
  font-weight: 600;
  font-size: 0.86rem;
}

.actions a.delete {
  color: var(--pink-deep);
}

.actions a.delete:hover {
  color: #b91c5c;
}

/* ---------- Product form ---------- */

.form-card {
  background: var(--surface);
  border: 1px solid var(--line);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow);
  padding: 32px;
  max-width: 520px;
}

.form-card .btn-primary {
  width: auto;
  padding: 12px 28px;
  margin-top: 6px;
}

.back-link {
  display: inline-block;
  margin-top: 20px;
  font-size: 0.9rem;
  color: var(--ink-muted);
}
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
            <?php
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>{$user['id']}</td>";
                echo "<td>{$user['firstname']}</td>";
                echo "<td>{$user['lastname']}</td>";
                echo "<td>{$user['email']}</td>";
                echo "<td>{$user['username']}</td>";
                echo "</tr>";
                
            }
            ?>
        </thead>
        <tbody>
        </tbody>
</body>
</html>
