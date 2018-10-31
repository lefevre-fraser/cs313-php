create table users_1
(	user_id serial primary key
,	user_name varchar(40) not null unique
,	hashed_password text not null);

