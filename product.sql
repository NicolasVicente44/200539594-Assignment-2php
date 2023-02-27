create table product (
	id INT PRIMARY KEY AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    description varchar(200),
    value DECIMAL(10, 2) NOT NULL,
    ordered DATE NOT NULL
);

