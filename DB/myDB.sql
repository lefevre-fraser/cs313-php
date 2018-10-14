-- --------------------------------------------------------------
-- Create Table To Keep Track Of All Table Names
-- --------------------------------------------------------------
create table table_names
(	table_name varchar(40) unique);


-- --------------------------------------------------------------
-- Create Admin User Table
--	then add the table name to table_names
-- --------------------------------------------------------------
create table admin_users
(	admin_user_id integer primary key
,	admin_user_name varchar(40) not null);
insert into table_names values
(	'ADMIN_USERS');

-- add SYSADMIN as the first admin user
insert into admin_users
(	admin_user_id
,	admin_user_name
)
values
(	0001
,	'SYSADMIN'
);


-- --------------------------------------------------------------
-- Create Hash Table
--	then add the table name to table_names
-- --------------------------------------------------------------
create table hashes
(	hash_id integer primary key
,	hash_value integer not null
,	last_changed_by integer references admin_users(admin_user_id)
,	last_changed_date date not null
,	created_by integer references admin_users(admin_user_id)
,	creation_date date not null);
insert into table_names values
(	'HASHES');


-- --------------------------------------------------------------
-- Create Salts Table
--	then add the table name to table_names
-- --------------------------------------------------------------
create table salts
(	salt_id integer primary key
,	salt_value integer not null
,	last_changed_by integer references admin_users(admin_user_id)
,	last_changed_date date not null
,	created_by integer references admin_users(admin_user_id)
,	creation_date date not null);
insert into table_names values
(	'SALTS');


-- --------------------------------------------------------------
-- Create Area Codes Table
--	then add the table name to table_names
-- --------------------------------------------------------------
create table area_codes
(	area_code_id integer primary key
,	area_code varchar(3) not null unique
,	last_changed_by integer references admin_users(admin_user_id)
,	last_changed_date date not null
,	created_by integer references admin_users(admin_user_id)
,	creation_date date not null);
insert into table_names values
(	'AREA_CODES');


-- --------------------------------------------------------------
-- Create User Table
--	then add the table name to table_names
-- --------------------------------------------------------------
create table users
(	user_id integer primary key
,	user_name varchar(40) not null unique
,	fname varchar(40) not null
,	mname varchar(40)
,	lname varchar(40) not null
,	area_code_id integer references area_codes(area_code_id)
,	phone_number varchar(8) not null
,	hash_id integer references hashes(hash_id)
,	salt_id integer references salts(salt_id)
,	hashed_password varchar(50) not null
,	last_changed_by integer references admin_users(admin_user_id)
,	last_changed_date date not null
,	created_by integer references admin_users(admin_user_id)
,	creation_date date not null);
insert into table_names values
(	'USERS');

-- user sequence for adding new users
create sequence users_s1 start with 1000;


-- --------------------------------------------------------------
-- Create Assets Table
--	then add the table name to table_names
-- --------------------------------------------------------------
create table assets
(	asset_id integer primary key
,	asset_name text not null unique
,	last_changed_by integer references admin_users(admin_user_id)
,	last_changed_date date not null
,	created_by integer references admin_users(admin_user_id)
,	creation_date date not null);
insert into table_names values
(	'ASSETS');

-- asset sequence for adding new users
create sequence assets_s1 start with 1000;


-- --------------------------------------------------------------
-- Create User's Asstes Table
--	then add the table name to table_names
-- --------------------------------------------------------------
create table user_assets
(	user_id integer references users(user_id)
,	asset_id integer references assets(asset_id)
,	quantity integer not null
,	asset_value money not null
,	last_changed_by integer references admin_users(admin_user_id)
,	last_changed_date date not null
,	created_by integer references admin_users(admin_user_id)
,	creation_date date not null);
insert into table_names values
(	'USER_ASSETS');


