drop table if exists Booking;
drop table if exists Admin;
drop table if exists Training;
drop table if exists User;

CREATE TABLE IF NOT EXISTS User (
  id int(11) NOT NULL AUTO_INCREMENT,
  firstName varchar(100) NOT NULL,
  lastName varchar(100) NOT NULL,
  email varchar(500) NOT NULL,
  password varchar(20) NOT NULL,
  cardNumber varchar(20) NOT NULL,
  hasPaid int(11) NOT NULL,
  phone varchar(15) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS Training (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  nbPlace int(11) NOT NULL DEFAULT '20',
  date date NOT NULL,
  duration int(11) NOT NULL,
  type varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS Admin (
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(500) NOT NULL,
  password varchar(20) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS Booking (
  id int(11) NOT NULL AUTO_INCREMENT,
  idUser int(11) NOT NULL,
  idTraining int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
