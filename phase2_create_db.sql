-- usage: mysql -u root db2 < phase2_create_db.sql

-- David Nguyen
-- Karamel Quitayen
-- COMP.3100 Database II
-- Project - Part 2

-- Dat Relational Database Management System

-- reset database

drop table if exists admins;
drop table if exists studyMaterials;
drop table if exists membership;
drop table if exists studies;
drop table if exists mentors;
drop table if exists mentees;
drop table if exists meetings;
drop table if exists groups;
drop table if exists students;
drop table if exists parents;
drop table if exists users;

-- create tables
/*
create table users (
    uid int AUTO_INCREMENT,
    firstName varchar(10) NOT NULL,
	lastName varchar(10)NOT NULL,
    email varchar(30),
    phoneNum char(10),
    username varchar (20) UNIQUE,
    password varchar (25) NOT NULL,
	PRIMARY KEY (uid)
);

create table admins (
    uid int PRIMARY KEY,
    constraint FOREIGN KEY (uid) references users(uid)
		ON DELETE CASCADE ON UPDATE CASCADE
);

create table parents (
    uid int PRIMARY KEY,
    constraint FOREIGN KEY (uid) references users(uid)
		ON DELETE CASCADE ON UPDATE CASCADE
);

create table students (
    uid int PRIMARY KEY,
    pid int,
    grade int,
    constraint FOREIGN KEY (uid) references users(uid)
		ON DELETE CASCADE ON UPDATE CASCADE,
    constraint FOREIGN KEY (pid) references users(uid)
		ON DELETE CASCADE ON UPDATE CASCADE,
    constraint studentGradeCheck CHECK (grade >= 6 and grade <= 12)
);

create table groups (
    gid int AUTO_INCREMENT,
    name varchar(50),
    description varchar(100),
    gradeLvl int,
    minMentorGrade int,
	PRIMARY KEY (gid),
	constraint gradeLvlCheck CHECK (gradeLvl >= 6 and gradeLvl <= 12),
	constraint minMentorGradeCheck CHECK (minMentorGrade >= 6 and minMentorGrade <= 12)
);

create table meetings (
    meetingID int AUTO_INCREMENT,
    gid int,
    dayOfWeek int,
    startTime char(8),
    endTime char(8),
    announcement varchar(50),
    url varchar(20),
	PRIMARY KEY (meetingID),
    constraint FOREIGN KEY (gid) references groups(gid)
		ON DELETE CASCADE ON UPDATE CASCADE
);

create table studyMaterials (
	bid int AUTO_INCREMENT,
	name varchar(20),
	author varchar(20),
	url varchar(20),
	notes varchar(30),
	assignedDate datetime,
	PRIMARY KEY (bid)
);

create table membership (
	studentID int,
	gid int,
	PRIMARY KEY (studentID, gid),
	constraint FOREIGN KEY (studentId) references students (uid)
		ON DELETE CASCADE ON UPDATE CASCADE,
	constraint FOREIGN KEY (gid) references groups (gid)
		ON DELETE CASCADE ON UPDATE CASCADE
);

create table studies (
	meetingID int,
	bid int,
	PRIMARY KEY (meetingID, bid),
	constraint FOREIGN KEY (meetingID) references meetings (meetingID)
		ON DELETE CASCADE ON UPDATE CASCADE
);

create table mentors (
	studentID int,
	meetingID int,
	PRIMARY KEY (studentID, meetingID),
	
	constraint FOREIGN KEY (studentID) references students (uid)
		ON DELETE CASCADE ON UPDATE CASCADE,
	constraint FOREIGN KEY (meetingID) references meetings (meetingID)
		ON DELETE CASCADE ON UPDATE CASCADE
);

create table mentees (
	studentId int,
	grade int,
	meetingID int,
	PRIMARY KEY (studentId, meetingID),
	constraint FOREIGN KEY (studentId) references students (uid)
		ON DELETE CASCADE ON UPDATE CASCADE,
	constraint FOREIGN KEY (meetingID) references meetings (meetingID)
		ON DELETE CASCADE ON UPDATE CASCADE
);

insert into users (firstName, lastName, username, password)  values ("Mr.","Admin", "admin", "");
*/