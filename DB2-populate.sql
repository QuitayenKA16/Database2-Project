-- usage: mysql -u root db2 < phase2_create_db.sql

-- David Nguyen
-- Karamel Quitayen
-- COMP.3100 Database II
-- Project - Part 2

-- Dat Relational Database Management System


-- users (id, email, password, name, phone)

insert into users (name, email, phone, password) values ("Admin", "admin@mail.com", "1234567890", "");
insert into users (name, email, phone, password) values ("Principal Smith", "psmith@mail.com", "1234567890", "password1");

-- parents (name, email, phone, password)
insert into users (name, email, phone, password) values ("Bob Jones", "bjones@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Jessica Davis", "jdavis@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("David Nguyen", "dnguyen@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Karamel Quitayen", "kquitayen@mail.com", "1234567890", "password1");

-- students (name, email, phone, password)
insert into users (name, email, phone, password) values ("Sarah Brown", "sbrown@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Peter Miller", "pmiller@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Allan McCombs", "amccombs@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Simon Barber", "sbarber@mail.com", "1234567890","password1");
insert into users (name, email, phone, password) values ("Justin LaGree", "jlagree@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("James Tan", "jtan@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Zack Charlie", "zcharlie@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Fenim Patel", "fpatel@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Cindy Chen", "cchen@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("David Adams", "daddams@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Chris Goulart", "cgoulart@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Byung Kim", "bkim@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Bill Moloney", "bmoloney@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("James Canning", "jcanning@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Ethan McGuire", "ethanmcguire@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Matthew Beliveau", "mbeliveau@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Matt Galat", "mgalat@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Evan Smith", "esmith@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Andrew Yaang", "ayaang@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Donald Trump", "dtrump@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Matthew Perry", "mperry@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Glen Coty", "gcoty@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Steve Barna", "sbarna@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Sarah Currier", "scurrier@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Jeanne Phan", "jphan@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Jasen Ripley", "jripley@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Kristen Soiles", "ksoiles@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Penny Hamourgas", "phamourgas@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Ben Fine", "bfine@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Sean Cummings", "scummings@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Venkat Reddy", "vreddy@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Cameron Napolitano", "cnapolitano@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Mark Pierre", "mpierre@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Mel Carignan", "mcarignan@mail.com", "1234567890", "password1");
insert into users (name, email, phone, password) values ("Justin Dom", "jdom@mail.com", "1234567890", "password1");


-- admins (admin_id)
insert into admins values (1+15);
insert into admins values (2+15);

-- parent (parent_id)
insert into parents values (3+15);
insert into parents values (4+15);
insert into parents values (5+15);
insert into parents values (6+15);

-- (student_id, parent_id, grade)
insert into students (student_id, parent_id, grade) values (7+15,3+15,7);
insert into students (student_id, parent_id, grade) values (8+15,4+15,8);
insert into students (student_id, parent_id, grade) values (9+15,5+15,9);
insert into students (student_id, parent_id, grade) values (10+15,6+15,10);
insert into students (student_id, parent_id, grade) values (11+15,3+15,11);
insert into students (student_id, parent_id, grade) values (12+15,4+15,12);
insert into students (student_id, parent_id, grade) values (13+15,5+15,6);
insert into students (student_id, parent_id, grade) values (14+15,6+15,7);
insert into students (student_id, parent_id, grade) values (15+15,3+15,8);
insert into students (student_id, parent_id, grade) values (16+15,4+15,9);
insert into students (student_id, parent_id, grade) values (17+15,5+15,10);
insert into students (student_id, parent_id, grade) values (18+15,6+15,11);
insert into students (student_id, parent_id, grade) values (19+15,3+15,12);
insert into students (student_id, parent_id, grade) values (20+15,4+15,6);
insert into students (student_id, parent_id, grade) values (21+15,5+15,7);
insert into students (student_id, parent_id, grade) values (22+15,6+15,8);
insert into students (student_id, parent_id, grade) values (23+15,3+15,9);
insert into students (student_id, parent_id, grade) values (24+15,4+15,10);
insert into students (student_id, parent_id, grade) values (25+15,5+15,11);
insert into students (student_id, parent_id, grade) values (26+15,6+15,12);
insert into students (student_id, parent_id, grade) values (27+15,3+15,6);
insert into students (student_id, parent_id, grade) values (28+15,4+15,7);
insert into students (student_id, parent_id, grade) values (29+15,5+15,8);
insert into students (student_id, parent_id, grade) values (30+15,6+15,9);
insert into students (student_id, parent_id, grade) values (31+15,3+15,10);
insert into students (student_id, parent_id, grade) values (32+15,4+15,11);
insert into students (student_id, parent_id, grade) values (33+15,5+15,12);
insert into students (student_id, parent_id, grade) values (34+15,6+15,6);
insert into students (student_id, parent_id, grade) values (35+15,3+15,7);
insert into students (student_id, parent_id, grade) values (36+15,4+15,8);
insert into students (student_id, parent_id, grade) values (37+15,5+15,9);
insert into students (student_id, parent_id, grade) values (38+15,6+15,10);
insert into students (student_id, parent_id, grade) values (39+15,3+15,11);
insert into students (student_id, parent_id, grade) values (40+15,4+15,12);


-- create groups (group_id, name, description, mentee_grade_req, mentor_grade_req)
insert into groups (name, description, mentee_grade_req, mentor_grade_req) values ("6th Grade Math", "6th graders study math", 6, 9);
insert into groups (name, description, mentee_grade_req, mentor_grade_req) values ("7th Grade Math", "7th graders study math", 7, 9);
insert into groups (name, description, mentee_grade_req, mentor_grade_req) values ("8th Grade Math", "8th graders study math", 8, 11);
insert into groups (name, description, mentee_grade_req, mentor_grade_req) values ("9th Grade Math", "9th graders study math", 9, 12);

insert into groups (name, description, mentee_grade_req, mentor_grade_req) values ("6th Grade English", "6th graders study English", 6, 9);
insert into groups (name, description, mentee_grade_req, mentor_grade_req) values ("7th Grade English", "7th graders study English", 7, 9);
insert into groups (name, description, mentee_grade_req, mentor_grade_req) values ("8th Grade English", "8th graders study English", 8, 11);
insert into groups (name, description, mentee_grade_req, mentor_grade_req) values ("9th Grade English", "9th graders study English", 9, 12);

-- Chris and Fenim's crap
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Group 6', 'Grade 6', 9, null);
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Group 7', 'Grade 7', 10, null);
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Group 8', 'Grade 8', 11, null);
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Group 9', 'Grade 9', 12, 6);
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Group 10', 'Grade 10', null, 7);
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Group 11', 'Grade 11', null, 8);
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Group 12', 'Grade 12', null, 9);

	
-- time_slot (time_slot_id, day_of_the_week, start_time, end_time)
insert into time_slot (day_of_the_week, start_time, end_time) values ("Saturday", "16:00:00", "17:00:00"); -- 4pm-5pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Saturday", "17:00:00", "18:00:00"); -- 5pm-6pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Saturday", "18:00:00", "19:00:00"); -- 6pm-7pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Saturday", "19:00:00", "20:00:00"); -- 7pm-8pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Sunday", "16:00:00", "17:00:00"); -- 4pm-5pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Sunday", "17:00:00", "18:00:00"); -- 5pm-6pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Sunday", "18:00:00", "19:00:00"); -- 6pm-7pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Sunday", "19:00:00", "20:00:00"); -- 7pm-8pm
	
-- meetings (meet_id, meet_name, date, time_slot_id, capacity, announcement, group_id)
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("6th grade Math Meeting", "2020-03-07", 1+6, 0, "", 1);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("7th grade Math Meeting", "2020-03-07", 2+6, 0, "", 2);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("8th grade Math Meeting", "2020-03-07", 3+6, 0, "", 3);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("9th grade Math Meeting", "2020-03-07", 4+6, 0, "", 4);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("6th grade English Meeting", "2020-03-08", 5+6, 0, "", 5);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("7th grade English Meeting", "2020-03-08", 6+6, 0, "", 6);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("8th grade English Meeting", "2020-03-08", 7+6, 0, "", 7);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("9th grade English Meeting", "2020-03-08", 8+6, 0, "", 8);


-- set mentors (uid, mid)

-- set mentees (uid, mid)

-- create study matd, title, author, URL, notes, assignedDate, tyerial (bipe)

-- add studymaterial to meeting (mid, bid)