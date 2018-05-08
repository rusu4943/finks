create database if not exists finksTest;
use finksTest;

create table if not exists images(
	title varchar(40),
	votes int(10),
	userid int(10),
	url varchar(2048) not null,
	imageid int(10) primary key not null
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

create table if not exists users(
	username varchar(40),
	password varchar(40),
	email varchar(40),
	userid int(10) primary key not null
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


create table if not exists leaderboard(
	id int(1) not null auto_increment,
	url varchar(2048) not null,
	primary key (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
