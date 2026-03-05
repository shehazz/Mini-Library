📚 Mini Library Management System

A lightweight, efficient database-driven application to manage book inventories, track unique copies, and handle automated overdue fine calculations.

🚀 Features
  - Granular Inventory Tracking: Manages individual book copies rather than just titles, allowing for precise tracking of damaged or lost items.
  - Dynamic Fine System: Librarians can customize the daily fine rate through an admin dashboard.
  - Automated Calculations: System automatically determines overdue days and total fines using SQL logic.
  - User-Book Mapping: Robust foreign key relationships between users (nic), books (isbn), and physical copies.

User Data: Stores member details with nic as a unique identifier.
- user(id(PK, INT, AI, NN), username(VARCHAR 45, NN), password(VARCHAR 12, NN), name(VARCHAR 45, NN), nic(INT 12, NN), email(VARCHAR 45, NN), roleid(INT 1, NN))

Book Inventory: Contains bibliographic metadata (Title, Author, ISBN).
- book(id(PK, INT, AI, NN), bookname(VARCHAR 45, NN), isbn(INT 13, NN), category(VARCHAR 45, NN), author(VARCHAR 45, NN), coverimg(MEDIUMBLOB, NN))

Book Copies: The physical instances of books, each with a unique ID and status (Available, Out, Damaged).
- bookcopies(id(PK, INT, AI, NN), isbn(INT 13, NN), copyid(INT 11, NN), availability(VARCHAR 45, NN))

Borrow Details: A configuration table where the librarian sets the daily_rate.
- borrowdetails(id(PK, INT, NN, UN, AI), nic(INT 12, NN, UQ), isbn(INT 13, NN, UQ), duedate(DATE, NN), returndate(DATE, NN), fineamount(VARCHAR 45, NN), paymentstatus(VARCHAR 45, NN))

Overdue Fines: Daily rates.
- fines(id(PK, INT, NN), dailyrate(INT 11, NN))

Role definition table.
- role(roleid(PK, INT 1, NN), role(VARCHAR 10, NN))
