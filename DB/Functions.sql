create or replace function insert_user 
(	f_user_name varchar(40)
,	f_fname varchar(40)
,	f_lname varchar(40)
,	f_area_code varchar(3)
,	f_phone_number varchar(8)
,	f_hash_id integer
,	f_salt_id integer
,	f_hashed_password varchar(50)
,	f_mname varchar(40) default null
)
returns text as $$
BEGIN

	BEGIN
		insert into area_codes
		(	area_code_id
		,	area_code
		,	last_changed_by
		,	last_changed_date
		,	created_by
		,	creation_date)
		values
		(	nextval('area_codes_s1')
		,	f_area_code
		,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
		,	current_date
		,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
		,	current_date);
	EXCEPTION
		WHEN UNIQUE_VIOLATION
		THEN NULL;
	END;

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
	,	f_user_name
	,	f_fname
	,	f_mname
	,	f_lname
	,	(select area_code_id from area_codes where area_code = f_area_code)
	,	f_phone_number
	,	(select hash_id from hashes where hash_id = f_hash_id)
	,	(select salt_id from salts where salt_id = f_salt_id)
	,	f_hashed_password
	,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
	,	current_date
	,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
	,	current_date);

	return 'true';

END;
$$ language plpgsql;



create or replace function insert_asset
(	f_user_name varchar(40)
,	f_quantity integer
,	f_asset_value bigint
,	f_asset_name text
)
returns text as $$
BEGIN

	BEGIN
		insert into assets
		(	asset_id
		,	asset_name
		,	last_changed_by
		,	last_changed_date
		,	created_by
		,	creation_date)
		values
		(	nextval('assets_s1')
		,	f_asset_name
		,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
		,	current_date
		,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
		,	current_date);
	EXCEPTION
		WHEN UNIQUE_VIOLATION
		THEN NULL;
	END;


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
	(	(select user_id from users where user_name = f_user_name)
	,	(select asset_id from assets where asset_name = f_asset_name)
	,	f_quantity
	,	f_asset_value
	,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
	,	current_date
	,	(select admin_user_id from admin_users where admin_user_name = 'SYSADMIN')
	,	current_date);

	return 'true';

END;
$$ language plpgsql;

create or replace function change_quantity
(	f_user_name varchar(40)
,	f_asset_name text
,	f_asset_value bigint
,	f_quantity integer
)
returns text as $$
BEGIN
	
	UPDATE user_assets
		SET quantity = f_quantity
	WHERE user_id  = (select user_id  from users  where user_name  = f_user_name)
	AND   asset_id = (select asset_id from assets where asset_name = f_asset_name)
	AND   asset_value = f_asset_value;

	return 'true';

END;
$$ language plpgsql;