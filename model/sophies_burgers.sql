CREATE DATABASE IF NOT EXISTS sophies_burgers;
USE sophies_burgers;

CREATE TABLE IF NOT EXISTS products (
id INT PRIMARY KEY auto_increment,
product VARCHAR(60) NOT NULL,
price FLOAT NOT NULL
);

CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(80) NOT NULL
);

CREATE TABLE IF NOT EXISTS tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    customer_id INT,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    total FLOAT NOT NULL
);

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ticket_id INT,
    FOREIGN KEY (ticket_id) REFERENCES tickets(id),
    product_id INT,
    FOREIGN KEY (product_id) REFERENCES products(id),
    quantity INT NOT NULL
);

INSERT INTO products (product, price) VALUES
    ('Hamburguesa Clásica', 5.99),
    ('Hamburguesa con Queso', 6.99),
    ('Hamburguesa Doble', 7.99),
    ('Hamburguesa de Pollo', 5.49),
    ('Hamburguesa Vegetariana', 6.49),
    ('Papas Fritas', 2.99),
    ('Papas kebab', 3.95),
    ('Refresco Pequeño', 1.99),
    ('Refresco Mediano', 2.49),
    ('Refresco Grande', 2.99),
    ('Cerveza', 2.49),
    ('Pizza mediana', 12.99),  
    ('Ensalada de la Casa', 4.99),
    ('Hamburguesa de Ternera Premium', 8.99),
    ('Hamburguesa con Bacon', 7.49),
    ('Hamburguesa Vegana', 6.99),
    ('Hamburguesa de Pavo', 6.49),
    ('Batido de Chocolate', 3.99),
    ('Batido de Fresa', 3.99),
    ('Batido de Vainilla', 3.99),
    ('Perrito Caliente', 4.99),
    ('Aros de Cebolla', 3.49);

INSERT INTO items (ticket_id, product_id, quantity) VALUES
	(1,1,1),
    (1,6,2),
    (1,7,1),
    (1,8,1),
    (2,11,2);
    
INSERT INTO tickets (date, customer_id, total) VALUES
	('2023-09-25', 4, 17.91),
    ('2023-09-28',1, 4.98);