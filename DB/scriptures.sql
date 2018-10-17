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


