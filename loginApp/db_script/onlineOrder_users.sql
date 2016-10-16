create table users(user_id varchar(30) primary key not null,
pwd varchar(30),first_name varchar(30) not null, 
last_name varchar(30) not null, dob date not null, 
sign_up_time timestamp default current_timestamp);

 
create table address(address_id int(30) primary key auto_increment not null,
customer_id varchar(30),
constraint fk_customer_id foreign key (customer_id) references users(user_id),
address varchar (150) not null
);

create table categories(category_id int(11) primary key auto_increment not null, 
category_name varchar (100) not null);

create table products(product_num int(11) auto_increment primary key not null,
category_num int(11),
constraint fk_category_num foreign key(category_num) references categories(category_id), 
product_name varchar(50),
price int(11) not null,
stock int(11) not null,
image varchar(100) not null);

create table orders(order_id int(11) not null primary key auto_increment,
customerId varchar(30),
product_number int(11),
order_date_time timestamp default current_timestamp,
constraint fk_customerId foreign key (customerId) references users(user_id),
constraint fk_product_number foreign key (product_number) references Products(product_num));

create database wordpress;
