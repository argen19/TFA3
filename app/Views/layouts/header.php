<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'POSarce') ?></title>
    <style>
        :root { --wine: #6f1d35; --wine-dark: #4c1024; --rose: #f5e9e8; --ivory: #fffdf9; --ink: #34302e; --muted: #746b68; --line: #eadfda; }
        * { box-sizing: border-box; }
        body { margin: 0; background: #fff; color: var(--ink); font-family: "Segoe UI", Arial, sans-serif; line-height: 1.65; }
        header { border-top: 5px solid var(--wine); border-bottom: 1px solid var(--line); background: #fff; padding: 1.2rem 5%; }
        .brand { color: var(--wine); font-family: Georgia, "Times New Roman", serif; font-size: 1.6rem; font-weight: bold; letter-spacing: .04em; }
        .brand::after { content: ""; display: block; width: 2.5rem; margin-top: .35rem; border-bottom: 2px solid #c59682; }
        nav { display: flex; flex-wrap: wrap; gap: .2rem 1.1rem; margin-top: 1rem; }
        nav a { color: var(--muted); font-size: .8rem; font-weight: 700; letter-spacing: .08em; padding: .35rem 0; text-decoration: none; text-transform: uppercase; }
        nav a:hover, nav a:focus, nav a.active { color: var(--wine); }
        nav a.active { border-bottom: 2px solid var(--wine); }
        main { max-width: 980px; margin: 4.5rem auto; padding: 0 1.25rem; }
        .card { background: var(--ivory); border: 1px solid var(--line); box-shadow: 0 10px 30px rgba(85, 42, 48, .07); padding: clamp(1.8rem, 5vw, 3.5rem); }
        .eyebrow { color: var(--wine); font-size: .73rem; font-weight: 700; letter-spacing: .18em; margin: 0 0 .7rem; text-transform: uppercase; }
        h1 { color: var(--wine); font-family: Georgia, "Times New Roman", serif; font-size: clamp(2rem, 5vw, 3.4rem); font-weight: 400; line-height: 1.15; margin: 0 0 1rem; }
        .intro { color: var(--muted); font-size: 1.08rem; max-width: 42rem; }
        .action-buttons { display: flex; flex-wrap: wrap; gap: .75rem; margin-top: 1.8rem; }
        .button { background: var(--wine); border: 1px solid var(--wine); color: #fff; display: inline-block; font-size: .78rem; font-weight: 700; letter-spacing: .08em; padding: .7rem 1rem; text-decoration: none; text-transform: uppercase; transition: background .2s ease, color .2s ease; }
        .button:hover, .button:focus { background: var(--wine-dark); border-color: var(--wine-dark); }
        .button--secondary { background: transparent; color: var(--wine); }
        .button--secondary:hover, .button--secondary:focus { color: #fff; }
        .ornament { align-items: center; color: #ba8573; display: flex; gap: .7rem; margin: 1.5rem 0; }
        .ornament::before, .ornament::after { border-top: 1px solid var(--line); content: ""; width: 3.5rem; }
        table { background: #fff; border: 1px solid var(--line); border-collapse: collapse; margin-top: 1.8rem; width: 100%; }
        th, td { border-bottom: 1px solid var(--line); padding: .95rem 1rem; text-align: left; }
        th { background: var(--wine); color: #fff; font-size: .75rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
        tbody tr:nth-child(even) { background: #fffaf7; }
        tbody tr:hover { background: var(--rose); }
        td { color: #4d4542; }
        footer { border-top: 1px solid var(--line); color: var(--muted); font-size: .82rem; letter-spacing: .05em; padding: 1.5rem; text-align: center; }
        @media (max-width: 600px) { main { margin: 2.5rem auto; } th, td { padding: .7rem; font-size: .83rem; } table { display: block; overflow-x: auto; } }
    </style>
</head>
<body>
    <header>
        <div class="brand">POSarce</div>
        <nav aria-label="Main navigation">
            <a class="<?= ($active ?? '') === 'home' ? 'active' : '' ?>" href="<?= base_url() ?>">Home</a>
            <a class="<?= ($active ?? '') === 'about' ? 'active' : '' ?>" href="<?= base_url('about') ?>">About</a>
            <a class="<?= ($active ?? '') === 'customers' ? 'active' : '' ?>" href="<?= base_url('customers') ?>">Customer Accounts</a>
            <a class="<?= ($active ?? '') === 'users' ? 'active' : '' ?>" href="<?= base_url('users') ?>">User Accounts</a>
        </nav>
    </header>
    <main>
