drop database if exists restaurantsite;
create database restaurantsite;
use restaurantsite;

create table restaurant(
	restaurantId serial primary key,
	location text,
	name text,
	phoneno text,
	email text,
	des text,
	MainImageFileName text,
	ThumbnailFileName text
	
);

create table restaurant_image(
	ImageId serial primary key,
	ImageFileName text,
	ImageAlt text,
	ImageCaption text,
	ImageDescription text,
	SHOPRef text
);

create table restaurant_comment(
	commentsId serial primary key,
	commentId int,
	title text,
	comments text,
	stars int,
	MainImageFileName text
	
);

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  -- `cardid` varchar(30) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `birthday` varchar(50) NOT NULL DEFAULT '',
  `check1` varchar(50) NOT NULL DEFAULT '',
  `sex` varchar(50) NOT NULL DEFAULT '',
  `introduce` varchar(50) NOT NULL DEFAULT '',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `updatetime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


--
--  `user`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `phone`, `birthday`, `check1`, `sex`, `introduce`, `createtime`, `updatetime`) VALUES
(1, 'user', '123456', '', '', '', '', '', '',  1494040247, 1494040247);

-- create table CATEGORY(
	
-- 	Bush Walking text,
-- 	City Visiting text,
-- 	Tracking text,
-- 	ImageDescription text,
-- 	Waterfalls
-- );