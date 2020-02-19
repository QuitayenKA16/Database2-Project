-- usage: mysql -u root db2 < phase2_create_db.sql

-- David Nguyen
-- Karamel Quitayen
-- COMP.3100 Database II
-- Project - Part 2

-- Dat Relational Database Management System

-- create users (uid, name, email, phoneNum, username, password)
insert into users (name, email, phoneNum, username, password)  values ("Principal Smith", "psmith@mail.com", "1234567890", "psmith", "password1");

-- parents (uid, name, email, phoneNum, username, password)
insert into users (name, email, phoneNum, username, password)  values ("Bob Jones", "bjones@mail.com", "1234567890", "bjones", "password1");
insert into users (name, email, phoneNum, username, password)  values ("Jessica Davis", "jdavis@mail.com", "1234567890", "jdavis", "password1");
insert into users (name, email, phoneNum, username, password)  values ("David Nguyen", "dnguyen@mail.com", "1234567890", "dnguyen", "password1");
insert into users (name, email, phoneNum, username, password)  values ("Karamel Quitayen", "kquitayen@mail.com", "1234567890", "kquitayen", "password1");

-- students (uid, name, email, phoneNum, username, password)
insert into users (name, email, phoneNum, username, password) values ("Sarah Brow", "sbrown@mail.com", "1234567890", "sbrown", "password1");
insert into users (name, email, phoneNum, username, password) values ("Peter Miller", "pmiller@mail.com", "1234567890", "pmiller", "password1");
insert into users (name, email, phoneNum, username, password) values ("Allan McCombs", "amccombs@mail.com", "1234567890", "amccombs", "password1");
insert into users (name, email, phoneNum, username, password) values ("Simon Barber", "sbarber@mail.com", "1234567890", "sbarber", "password1");
insert into users (name, email, phoneNum, username, password) values ("Justin LaGree", "jlagree@mail.com", "1234567890", "jlagree", "password1");
insert into users (name, email, phoneNum, username, password) values ("James Tan", "jtan@mail.com", "1234567890", "jtan", "password1");
insert into users (name, email, phoneNum, username, password) values ("James Tan", "jtan@mail.com", "1234567890", "jtan", "password1");
insert into users (name, email, phoneNum, username, password) values ("Fenim Patel", "fpatel@mail.com", "1234567890", "fpatel", "password1");
insert into users (name, email, phoneNum, username, password) values ("Cindy Chen", "cchen@mail.com", "1234567890", "cchen", "password1");
insert into users (name, email, phoneNum, username, password) values ("David Adams", "daddams@mail.com", "1234567890", "daddams", "password1");
insert into users (name, email, phoneNum, username, password) values ("Chris Goulart", "cgoulart@mail.com", "1234567890", "cgoulart", "password1");
insert into users (name, email, phoneNum, username, password) values ("Byung Kim", "bkim@mail.com", "1234567890", "bkim", "password1");
insert into users (name, email, phoneNum, username, password) values ("Bill Moloney", "bmoloney@mail.com", "1234567890", "bmoloney", "password1");
insert into users (name, email, phoneNum, username, password) values ("James Canning", "jcanning@mail.com", "1234567890", "jcanning", "password1");
insert into users (name, email, phoneNum, username, password) values ("Ethan McGuire", "ethanmcguire@mail.com", "1234567890", "emcguire", "password1");
insert into users (name, email, phoneNum, username, password) values ("Matthew Beliveau", "mbeliveau@mail.com", "1234567890", "mbeliveau", "password1");
insert into users (name, email, phoneNum, username, password) values ("Matt Galat", "mgalat@mail.com", "1234567890", "mgalat", "password1");
insert into users (name, email, phoneNum, username, password) values ("Evan Smith", "esmith@mail.com", "1234567890", "esmith", "password1");
insert into users (name, email, phoneNum, username, password) values ("Andrew Yaang", "ayaang@mail.com", "1234567890", "ayaang", "password1");
insert into users (name, email, phoneNum, username, password) values ("Donald Trump", "dtrump@mail.com", "1234567890", "dtrump", "password1");
insert into users (name, email, phoneNum, username, password) values ("Matthew Perry", "mperry@mail.com", "1234567890", "mperry", "password1");
insert into users (name, email, phoneNum, username, password) values ("Glen Coty", "gcoty@mail.com", "1234567890", "gcoty", "password1");
insert into users (name, email, phoneNum, username, password) values ("Steve Barna", "sbarna@mail.com", "1234567890", "sbarna", "password1");
insert into users (name, email, phoneNum, username, password) values ("Sarah Currier", "scurrier@mail.com", "1234567890", "scurrier", "password1");
insert into users (name, email, phoneNum, username, password) values ("Jeanne Phan", "jphan@mail.com", "1234567890", "jphan", "password1");
insert into users (name, email, phoneNum, username, password) values ("Jasen Ripley", "jripley@mail.com", "1234567890", "jripley", "password1");
insert into users (name, email, phoneNum, username, password) values ("Kristen Soiles", "ksoiles@mail.com", "1234567890", "ksoiles", "password1");
insert into users (name, email, phoneNum, username, password) values ("Penny Hamourgas", "phamourgas@mail.com", "1234567890", "phamourgas", "password1");
insert into users (name, email, phoneNum, username, password) values ("Ben Fine", "bfine@mail.com", "1234567890", "bfine", "password1");
insert into users (name, email, phoneNum, username, password) values ("Sean Cummings", "scummings@mail.com", "1234567890", "scummings", "password1");
insert into users (name, email, phoneNum, username, password) values ("Venkat Reddy", "vreddy@mail.com", "1234567890", "vreddy", "password1");
insert into users (name, email, phoneNum, username, password) values ("Cameron Napolitano", "cnapolitano@mail.com", "1234567890", "cnapolitano", "password1");
insert into users (name, email, phoneNum, username, password) values ("Mark Pierre", "mpierre@mail.com", "1234567890", "mpierre", "password1");
insert into users (name, email, phoneNum, username, password) values ("Mel Carignan", "mcarignan@mail.com", "1234567890", "mcarignan", "password1");
insert into users (name, email, phoneNum, username, password) values ("Justin Dom", "jdom@mail.com", "1234567890", "jdom", "password1");


-- insert users (name, email, phoneNum, username, password)  into type tables (admin, parents, students)
insert into admins values (1);

insert into parents values (2);
insert into parents values (3);
insert into parents values (4);
insert into parents values (5);

-- (uid, parentID, grade)
insert into students values (6,2,6);
insert into students values (7,3,7);
insert into students values (8,4,8);
insert into students values (9,5,9);
insert into students values (10,2,10);
insert into students values (11,3,11);
insert into students values (12,4,12);
insert into students values (13,5,6);
insert into students values (14,2,7);
insert into students values (15,3,8);
insert into students values (16,4,9);
insert into students values (17,5,10);
insert into students values (18,2,11);
insert into students values (19,3,12);
insert into students values (20,4,6);
insert into students values (21,5,7);
insert into students values (22,2,8);
insert into students values (23,3,9);
insert into students values (24,4,10);
insert into students values (25,5,11);
insert into students values (26,2,12);
insert into students values (27,3,6);
insert into students values (28,4,7);
insert into students values (29,5,8);
insert into students values (30,2,9);
insert into students values (31,3,10);
insert into students values (32,4,11);
insert into students values (33,5,12);
insert into students values (34,2,6);
insert into students values (35,3,7);
insert into students values (36,4,8);
insert into students values (37,5,9);
insert into students values (38,2,10);
insert into students values (39,3,11);
insert into students values (40,4,12);

-- create groups (gid, name, description, gradeLvl, minMentorGrade)
insert into groups (name, description, gradeLvl, minMentorGrade) values ("6th Grade Math", "6th graders study math", 6, 9);
insert into groups (name, description, gradeLvl, minMentorGrade) values ("7th Grade Math", "7th graders study math", 7, 9);
insert into groups (name, description, gradeLvl, minMentorGrade) values ("8th Grade Math", "8th graders study math", 8, 11);
insert into groups (name, description, gradeLvl, minMentorGrade) values ("9th Grade Math", "9th graders study math", 9, 12);

insert into groups (name, description, gradeLvl, minMentorGrade) values ("6th Grade English", "6th graders study English", 6, 9);
insert into groups (name, description, gradeLvl, minMentorGrade) values ("7th Grade English", "7th graders study English", 7, 9);
insert into groups (name, description, gradeLvl, minMentorGrade) values ("8th Grade English", "8th graders study English", 8, 11);
insert into groups (name, description, gradeLvl, minMentorGrade) values ("9th Grade English", "9th graders study English", 9, 12);

	
-- create meetings (gid, dayOfWeek, startTime, endTime, announcement, url)
insert into meetings (gid, dayOfWeek, startTime, endTime, announcement, url) values (1, 1, "14:00:00", "14:50:00", "6th grade Math Meeting @ 2pm", "????");
insert into meetings (gid, dayOfWeek, startTime, endTime, announcement, url) values (2, 2, "15:00:00", "15:50:00", "7th grade Math Meeting @ 3pm", "????");
insert into meetings (gid, dayOfWeek, startTime, endTime, announcement, url) values (3, 3, "16:00:00", "16:50:00", "8th grade Math Meeting @ 4pm", "????");
insert into meetings (gid, dayOfWeek, startTime, endTime, announcement, url) values (4, 4, "14:00:00", "14:50:00", "9th grade Math Meeting @ 2pm", "????");
insert into meetings (gid, dayOfWeek, startTime, endTime, announcement, url) values (5, 5, "15:00:00", "15:50:00", "6th grade English Meeting @ 3pm", "????");
insert into meetings (gid, dayOfWeek, startTime, endTime, announcement, url) values (6, 6, "16:00:00", "16:50:00", "7th grade English Meeting @ 4pm", "????");
insert into meetings (gid, dayOfWeek, startTime, endTime, announcement, url) values (7, 7, "14:00:00", "14:50:00", "8th grade English Meeting @ 2pm", "????");
insert into meetings (gid, dayOfWeek, startTime, endTime, announcement, url) values (8, 1, "15:00:00", "15:50:00", "9th grade English Meeting @ 3pm", "????");


-- set mentors (uid, mid)
insert into mentors values(9, 1);
insert into mentors values(10, 1);
insert into mentors values(16, 2);
insert into mentors values(17, 2);
insert into mentors values(23, 3);
insert into mentors values(24, 3);
insert into mentors values(12, 4);
insert into mentors values(19, 4);
insert into mentors values(30, 5);
insert into mentors values(38, 5);
insert into mentors values(24, 6);
insert into mentors values(31, 6);
insert into mentors values(25, 7);
insert into mentors values(32, 7);
insert into mentors values(26, 8);
insert into mentors values(33, 8);

-- set mentees (uid, mid)

-- create study material (bid, title, author, URL, notes, assignedDate, type)

-- add students to groups (name, email, phoneNum, username, password)  (studentID, gid)

-- add studymaterial to meeting (mid, bid)