drop table scriptures cascade;
drop table topic cascade;
drop table scripture_topics cascade;

create table scriptures
(	scripture_id serial primary key
,	book varchar(40) not null
,	chapter integer not null
,	verse integer not null
,	content text not null);

insert into scriptures
(	book
,	chapter
,	verse
,	content)
values
(	'John'
,	1
,	5
,	'And the light shineth in darkness; and the darkness comprehended it not.');


insert into scriptures
(	book
,	chapter
,	verse
,	content)
values
(	'Doctrine and Covenants'
,	88
,	49
,	'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

insert into scriptures
(	book
,	chapter
,	verse
,	content)
values
(	'Doctrine and Covenants'
,	93
,	28
,	'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

insert into scriptures
(	book
,	chapter
,	verse
,	content)
values
(	'Mosiah'
,	16
,	9
,	'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');


create table topic
(	topic_id serial primary key
,	name text);

insert into topic
(	name)
values
(	'Faith');

insert into topic
(	name)
values
(	'Sacrifice');

insert into topic
(	name)
values
(	'Charity');

create table scripture_topics
(	scripture_id serial references scriptures(scripture_id)
,	topic_id serial references topic(topic_id)
,	primary key (scripture_id, topic_id));

create or replace function insert_scripture
(	f_book varchar(40)
,	f_chapter integer
,	f_verse integer
,	f_content text)
returns integer as $$
BEGIN
	insert into scriptures
	(	book
	,	chapter
	,	verse
	,	content)
	values 
	(	f_book
	,	f_chapter
	,	f_verse
	,	f_content);

	return (select scripture_id
			from scriptures s
			where s.book = f_book
			and s.chapter = f_chapter
			and s.verse = f_verse
			and s.content = f_content);
END;
$$ language plpgsql;

create or replace function connect_to_topic
(	f_scripture_id integer
,	f_topic_id integer)
returns boolean as $$
BEGIN
	insert into scripture_topics
	(	scripture_id
	,	topic_id)
	values
	(	f_scripture_id
	,	f_topic_id);

	return 1;
EXCEPTION
	WHEN OTHERS THEN
	return 0;
END;
$$ language plpgsql;

create or replace function add_topic
(	f_name text)
returns integer as $$
BEGIN
	insert into topic
	(	name)
	values
	(	f_name);

	return (select topic_id from topic
			where name = f_name);
END;
$$ language plpgsql;