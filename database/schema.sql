CREATE TABLE IF NOT EXISTS admins (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS transactions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    transaction_code TEXT NOT NULL UNIQUE,
    transaction_date TEXT NOT NULL,
    customer TEXT NOT NULL,
    type TEXT NOT NULL CHECK (type IN ('Dine-In', 'Takeaway', 'Katering')),
    payment_method TEXT NOT NULL DEFAULT 'Tunai' CHECK (payment_method IN ('Tunai', 'Transfer')),
    amount INTEGER NOT NULL CHECK (amount > 0),
    status TEXT NOT NULL DEFAULT 'Lunas' CHECK (status IN ('Lunas', 'Menunggu', 'Dibatalkan')),
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS transaction_items (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    transaction_id INTEGER NOT NULL REFERENCES transactions(id) ON DELETE CASCADE,
    menu_id INTEGER NOT NULL,
    menu_name TEXT NOT NULL,
    quantity INTEGER NOT NULL CHECK (quantity > 0),
    unit_price INTEGER NOT NULL CHECK (unit_price > 0)
);
