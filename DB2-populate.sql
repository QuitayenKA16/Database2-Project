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
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Grade 6', '', 9, null);
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Grade 7', '', 10, null);
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Grade 8', '', 11, null);
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Grade 9', '', 12, 6);
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Grade 10', '', null, 7);
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Grade 11', '', null, 8);
INSERT INTO `groups` (`name`, `description`, `mentor_grade_req`, `mentee_grade_req`) VALUES ('Grade 12', '', null, 9);

	
-- time_slot (time_slot_id, day_of_the_week, start_time, end_time)
insert into time_slot (day_of_the_week, start_time, end_time) values ("Saturday", "16:00:00", "17:00:00"); -- 4pm-5pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Sunday", "16:00:00", "17:00:00"); -- 4pm-5pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Saturday", "17:00:00", "18:00:00"); -- 5pm-6pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Sunday", "17:00:00", "18:00:00"); -- 5pm-6pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Saturday", "18:00:00", "19:00:00"); -- 6pm-7pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Sunday", "18:00:00", "19:00:00"); -- 6pm-7pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Saturday", "19:00:00", "20:00:00"); -- 7pm-8pm
insert into time_slot (day_of_the_week, start_time, end_time) values ("Sunday", "19:00:00", "20:00:00"); -- 7pm-8pm
	
-- meetings (meet_id, meet_name, date, time_slot_id, capacity, announcement, group_id)
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("6th grade Study Meeting 1", "2020-09-05", 1+6, 0, "", 1);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("7th grade Study Meeting 1", "2020-09-05", 2+6, 0, "", 2);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("8th grade Study Meeting 1", "2020-09-05", 3+6, 0, "", 3);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("9th grade Study Meeting 1", "2020-09-05", 4+6, 0, "", 4);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("6th grade Study Meeting 2", "2020-09-06", 5+6, 0, "", 1);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("7th grade Study Meeting 2", "2020-09-06", 6+6, 0, "", 2);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("8th grade Study Meeting 2", "2020-09-06", 7+6, 0, "", 3);
insert into meetings (meet_name, date, time_slot_id, capacity, announcement, group_id) values ("9th grade Study Meeting 2", "2020-09-06", 8+6, 0, "", 4);

-- set mentors (mentor_id) and mentees (mentee_id)
insert into mentors (mentor_id) SELECT student_id FROM students WHERE grade >= 9;
insert into mentees (mentee_id) SELECT student_id FROM students WHERE grade <= 9;

-- enroll (meet_id, mentee_id)
insert into enroll values (100, 42); -- 6th grade saturday
insert into enroll values (100, 35);
insert into enroll values (104, 49); -- 6th grade sunday
insert into enroll values (104, 28);
insert into enroll values (101, 43); -- 7th grade saturday
insert into enroll values (101, 36);
insert into enroll values (105, 50); -- 7th grade sunday
insert into enroll values (105, 29);
insert into enroll values (102, 23); -- 8th grade saturday
insert into enroll values (102, 44);
insert into enroll values (106, 37); -- 8th grade sunday
insert into enroll values (106, 30);
insert into enroll values (103, 52); -- 9th grade saturday
insert into enroll values (103, 38);
insert into enroll values (107, 45); -- 9th grade sunday
insert into enroll values (107, 31);

-- enroll2 (meet_id, mentor_id)
insert into enroll2 values (100, 38); -- 6th grade saturday
insert into enroll2 values (100, 31);
insert into enroll2 values (104, 45); -- 6th grade sunday
insert into enroll2 values (104, 24);
insert into enroll2 values (101, 53); -- 7th grade saturday
insert into enroll2 values (101, 46);
insert into enroll2 values (105, 25); -- 7th grade sunday
insert into enroll2 values (105, 32);
insert into enroll2 values (102, 33); -- 8th grade saturday
insert into enroll2 values (102, 40);
insert into enroll2 values (106, 47); -- 8th grade sunday
insert into enroll2 values (106, 26);
insert into enroll2 values (103, 41); -- 9th grade saturday
insert into enroll2 values (103, 48);
insert into enroll2 values (107, 34); -- 9th grade sunday
insert into enroll2 values (107, 27);

update meetings set capacity = capacity + 4;


-- create study material (material_id, title, author, type, url, assigned_date, notes)
insert into material (title, author, type, url, assigned_date, notes) values ("Fantasy Fiction", "English Author1", "English", "N/A", "2020-09-05", "CH1"); --6th grade
insert into material (title, author, type, url, assigned_date, notes) values ("Pre-Algebra", "Math Author1", "Math", "N/A", "2020-09-06", "CH1");
insert into material (title, author, type, url, assigned_date, notes) values ("Autobiographies", "English Author2", "English", "N/A", "2020-09-05", "CH1"); --7th grade
insert into material (title, author, type, url, assigned_date, notes) values ("Geometry", "Math Author2", "Math", "N/A", "2020-09-06", "CH1");
insert into material (title, author, type, url, assigned_date, notes) values ("Shakespearan Literature", "English Author3", "English", "N/A", "2020-09-05", "CH1"); --8th grade
insert into material (title, author, type, url, assigned_date, notes) values ("Algebra", "Math Author3", "Math", "N/A", "2020-09-06", "CH1");
insert into material (title, author, type, url, assigned_date, notes) values ("Dystopian Fiction", "English Author41", "English", "N/A", "2020-09-05", "CH1"); --9th grade
insert into material (title, author, type, url, assigned_date, notes) values ("Pre-Calculus", "Math Author4", "Math", "N/A", "2020-09-06", "CH1");

insert into material (title, author, type, url, assigned_date, notes) values ("Fantasy Fiction", "English Author1", "English", "N/A", "2020-09-05", "CH2"); --6th grade
insert into material (title, author, type, url, assigned_date, notes) values ("Pre-Algebra", "Math Author1", "Math", "N/A", "2020-09-06", "CH2");
insert into material (title, author, type, url, assigned_date, notes) values ("Autobiographies", "English Author2", "English", "N/A", "2020-09-05", "CH2"); --7th grade
insert into material (title, author, type, url, assigned_date, notes) values ("Geometry", "Math Author2", "Math", "N/A", "2020-09-06", "CH2");
insert into material (title, author, type, url, assigned_date, notes) values ("Shakespearan Literature", "English Author3", "English", "N/A", "2020-09-05", "CH2"); --8th grade
insert into material (title, author, type, url, assigned_date, notes) values ("Algebra", "Math Author3", "Math", "N/A", "2020-09-06", "CH2");
insert into material (title, author, type, url, assigned_date, notes) values ("Dystopian Fiction", "English Author41", "English", "N/A", "2020-09-05", "CH2"); --9th grade
insert into material (title, author, type, url, assigned_date, notes) values ("Pre-Calculus", "Math Author4", "Math", "N/A", "2020-09-06", "CH2");


-- assign material (meet_id, material_id)
insert into assign values (100, 12);
insert into assign values (101, 13);
insert into assign values (102, 14);
insert into assign values (103, 15);
insert into assign values (104, 16);
insert into assign values (105, 17);
insert into assign values (106, 18);
insert into assign values (107, 19);
insert into assign values (100, 20);
insert into assign values (101, 21);
insert into assign values (102, 22);
insert into assign values (103, 23);
insert into assign values (104, 24);
insert into assign values (105, 25);
insert into assign values (106, 26);
insert into assign values (107, 27);