create table account(
user_id int,
user_name varchar,
user_passwd varchar,
user_fname varchar,
user_lname varchar,
user_gender varchar,
user_tel int,
user_address varchar,
user_email varchar,
primary key (user_id)
);

create table card_info(
card_id int,
user_id int,
card_type varchar,
card_number int,
primary key (card_id)
);

create table transaction_info(
transaction_id int,
card_id int,
transaction_name varchar,
transaction_date int,
transaction_type varchar,
transaction_outflow int,
transaction_inflow int,
primary key (transaction_id)
);