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

-- hashes sequence for adding new hashes
create sequence hashes_s1 start with 1000;


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

-- salts sequence for adding new salts
create sequence salts_s1 start with 1000;


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

-- area code sequence for adding new area codes
create sequence area_codes_s1 start with 1000;


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
,	asset_value bigint not null
,	last_changed_by integer references admin_users(admin_user_id)
,	last_changed_date date not null
,	created_by integer references admin_users(admin_user_id)
,	creation_date date not null);
insert into table_names values
(	'USER_ASSETS');


-- --------------------------------------------------------------
-- Insert In Testing Data
-- --------------------------------------------------------------
insert into area_codes
(	area_code_id
,	area_code
,	last_changed_by
,	last_changed_date
,	created_by
,	creation_date)
values
(	nextval('area_codes_s1')
,	'702'
,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
,	current_date
,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
,	current_date);

insert into hashes
(	hash_id
,	hash_value
,	last_changed_by
,	last_changed_date
,	created_by
,	creation_date)
values
(	nextval('hashes_s1')
,	20
,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
,	current_date
,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
,	current_date);

insert into salts
(	salt_id
,	salt_value
,	last_changed_by
,	last_changed_date
,	created_by
,	creation_date)
values
(	nextval('salts_s1')
,	5
,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
,	current_date
,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
,	current_date);

insert into users
(	user_id
,	user_name
,	fname
,	mname
,	lname
,	area_code_id
,	phone_number
,	hash_id
,	salt_id
,	hashed_password
,	last_changed_by
,	last_changed_date
,	created_by
,	creation_date)
values
(	nextval('users_s1')
,	'lefeve'
,	'Fraser'
,	'A'
,	'LeFevre'
,	(select area_code_id from area_codes where area_code = '702')
,	'960-3038'
,	(select hash_id from hashes where hash_value = 20)
,	(select salt_id from salts where salt_value = 5)
,	'SomeJunk'
,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
,	current_date
,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
,	current_date);

insert into assets
(	asset_id
,	asset_name
,	last_changed_by
,	last_changed_date
,	created_by
,	creation_date)
values
(	nextval('assets_s1')
,	'Lap Top'
,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
,	current_date
,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
,	current_date);

insert into user_assets
(	user_id
,	asset_id
,	quantity
,	asset_value
,	last_changed_by
,	last_changed_date
,	created_by
,	creation_date)
values
(	(select user_id from users where user_name = 'lefeve')
,	(select asset_id from assets where asset_name = 'Lap Top')
,	4
,	500
,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
,	current_date
,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
,	current_date);