CREATE DATABASE IF NOT EXISTS sophies_burgers;
USE SB_prices;

CREATE TABLE IF NOT EXISTS products (
id INT PRIMARY KEY auto_increment,
product VARCHAR(60) NOT NULL,
price FLOAT NOT NULL
);

CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstame VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    address VARCHAR(255),
    phone VARCHAR(15),
    email VARCHAR(80)
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

INSERT INTO customers (firstname, surname, address, phone, email) VALUES
    ('Juan', 'Pérez', 'Calle 123, Málaga', '+1234567890', 'juan.perez@email.com'),
    ('María', 'González', 'Avenida 456, Calella', '+9876543210', 'maria.gonzalez@email.com'),
    ('Pedro', 'López', 'Calle 789, Colmenar', '+5555555555', 'pedro.lopez@email.com'),
    ('Ana', 'Martínez', 'Calle 234, Barcelona', '+7777777777', 'ana.martinez@email.com'),
    ('Luis', 'Hernández', 'Avenida 567, Sevilla', '+9999999999', 'luis.hernandez@email.com'),
    ('Laura', 'Sánchez', 'Avenida 890, Madrid', '+1111111111', 'laura.sanchez@email.com'),
    ('Carlos', 'Ramírez', 'Calle 678, Gerona', '+2222222222', 'carlos.ramirez@email.com'),
    ('Sofía', 'Díaz', 'Avenida 123, Granada', '+3333333333', 'sofia.diaz@email.com'),
    ('Eduardo', 'Torres', 'Calle 345, Cádiz', '+4444444444', 'eduardo.torres@email.com'),
    ('Isabel', 'López', 'Avenida 678, Marbella', '+8888888888', 'isabel.lopez@email.com');
    
INSERT INTO items (ticket_id, product_id, quantity) VALUES
	(1,1,1),
    (1,6,2),
    (1,7,1),
    (1,8,1),
    (2,11,2);
    
INSERT INTO tickets (date, customer_id, total) VALUES
	('2023-09-25', 4, 17.91,
    ('2023-09-28',1, 4.98);