COMP.3100 Database II
Final Project Phase 2
David Nguyen, Karamel Quitayen
READ-ME.txt


----HOW TO SET UP AND TEST OUT DATABASE AND WEB APPLICATION----

1. Run sql files to build and populate database
      mysql -u root db2 < DB2.sql
      mysql -u root db2 < DB2-populate.sql


2. Set file location in header.php
     - header.php -> line 8 -> $_SESSION['path'] = '[YOUR DIRECTORY PATH]/';


3. Main admin account
    Email: admin@mail.com
    Password: password


4. To test parent and student accounts
     Emails:    [first initial of first name][full last name]@mail.com
     Passwords: password1

     Examples:
          Parent -> Karamel Quitayen      Student -> Donald Trump
             Email: kquitayen@mail.com        Email: dtrump@mail.com
          Password: password1              Password: password1

5. Any questions?
    Email karamela_quitayen@student.uml.edu or quitayenka16@gmail.com