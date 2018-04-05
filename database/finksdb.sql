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
	firstname varchar(40),
	lastname varchar(40),
	email varchar(40),
	tags varchar(120),
	userid int(10) primary key not null
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


insert into images (title, votes, url) values
('image1', 2, "https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350"),
('image2', 10, "https://wallpaperbrowse.com/media/images/soap-bubble-1958650_960_720.jpg"),
('image3', 1, "https://www.gettyimages.ie/gi-resources/images/Homepage/Hero/UK/CMS_Creative_164657191_Kingfisher.jpg"),
('image4', 30, "https://wallpaperbrowse.com/media/images/cat-1285634_960_720.png"),
('image5', 4, "https://media.istockphoto.com/photos/plant-growing-picture-id510222832?k=6&m=510222832&s=612x612&w=0&h=Pzjkj2hf9IZiLAiXcgVE1FbCNFVmKzhdcT98dcHSdSk=");

create table if not exists leaderboard(
id int(1) not null auto_increment,
url varchar(2048) not null,
primary key (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
