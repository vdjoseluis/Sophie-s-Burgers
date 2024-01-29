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
    email VARCHAR(80) NOT NULL,
    deliveryEnabled TINYINT(1) NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS tables (
    id INT AUTO_INCREMENT PRIMARY KEY,
    people INT NOT NULL,
    reserved TINYINT(1) NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    table_id INT,
    date DATE NOT NULL,
    time TIME NOT NULL,
    people INT NOT NULL,
    CONSTRAINT fk_customer
        FOREIGN KEY (customer_id) 
        REFERENCES customers(id),
    CONSTRAINT fk_table
        FOREIGN KEY (table_id)
        REFERENCES tables(id)
);

CREATE TABLE IF NOT EXISTS tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    time TIME NOT NULL,
    customer_id INT,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    total FLOAT NOT NULL,
    delivery_option VARCHAR(20) NOT NULL
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

INSERT INTO tables (people) VALUES
(8), (8), (8),
(6), (6), (6),
(4), (4), (4), (4),
(2), (2), (2), (2);


-- EVENTO QUE ELIMINA LA RESERVA PASADAS 2 HORAS DESDE SU CITA
DELIMITER //

CREATE EVENT IF NOT EXISTS delete_old_bookings
ON SCHEDULE EVERY 1 HOUR
DO
BEGIN
    SET @bookingIdToDelete = NULL;

    -- Obtener el ID de las reservas que han pasado más de 2 horas
    SELECT id INTO @bookingIdToDelete
    FROM bookings
    WHERE TIMESTAMP(CONCAT(date, ' ', time)) < NOW() - INTERVAL 2 HOUR
    LIMIT 1;

    IF @bookingIdToDelete IS NOT NULL THEN
        DELETE FROM bookings WHERE id = @bookingIdToDelete;

        -- Obtener el table_id asociado a la reserva eliminada
        SET @tableIdToFree = NULL;
        SELECT table_id INTO @tableIdToFree
        FROM bookings
        WHERE id = @bookingIdToDelete;

        -- Liberar la mesa estableciendo reserved en 0
        UPDATE tables SET reserved = FALSE WHERE id = @tableIdToFree;
    END IF;
END;
//

DELIMITER ;


-- EVENTO QUE ELIMINA LOS PEDIDOS PASADAS 2 HORAS DESDE SU CREACION
DELIMITER //

CREATE EVENT IF NOT EXISTS delete_old_tickets
ON SCHEDULE EVERY 1 HOUR
DO
BEGIN
  SET @current_time = CURRENT_TIME();
  SET @delete_time = SUBTIME(@current_time, '02:00:00');

  -- Comprueba si la hora actual está entre 12:00 y 23:00
  IF TIME(@current_time) BETWEEN '12:00:00' AND '23:00:00' THEN
    DELETE FROM tickets
    WHERE `time` <= @delete_time;
  END IF;
END;

//

DELIMITER ;