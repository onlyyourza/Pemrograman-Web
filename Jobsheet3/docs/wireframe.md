# Wireframe & User Flow — SIMPUS-Mini

Sub-CPMK: Design the UI/UX of the application (project).

The existing pages (Home, Add/List Books, Add/List Members — Jobsheets 1-3) don't yet include Login, Officer Dashboard, and Borrowing/Return features. This document designs wireframes for those pages before implementation starting in Jobsheet 5 and onwards.

## Actors
- **Guest**: can only view the book catalog (Home, Book List) without signing in.
- **Officer**: signs in to access all CRUD features and borrowing transactions.

## User Flow — Borrow Book

```
[Officer Sign In] -> [Dashboard] -> [Select "New Borrowing" menu]
        -> [Select Member] -> [Select Book (stock > 0)]
        -> [Save] -> [Book stock decreases by 1] -> [Back to Dashboard]
```

## User Flow — Return Book

```
[Dashboard] -> [Select "Return" menu] -> [Search active transaction (member/book)]
        -> [Mark "Returned"] -> [Book stock increases by 1]
        -> [Back to Dashboard]
```

## Wireframe: Login Page

```
+--------------------------------------+
|              SIMPUS-Mini             |
|--------------------------------------|
|                                      |
|        [ Officer Sign In ]          |
|                                      |
|   Username : [______________]       |
|   Password : [______________]       |
|                                      |
|          [   Sign In   ]            |
|                                      |
|   Don't have an account? Sign up    |
+--------------------------------------+
```

## Wireframe: Officer Dashboard

```
+-----------------------------------------------------+
| SIMPUS-Mini      Home | Books | Members | Borrowing | (Officer Name) Logout |
|-------------------------------------------------------|
|  [Total Books]   [Total Members]   [Currently Borrowed]    |
|                                                         |
|  Quick Actions:                                        |
|  [ + New Borrowing ]   [ + Return ]                    |
|                                                         |
|  Recent Transactions                                  |
|  --------------------------------------------------    |
|  Member | Book | Borrow Date | Status                  |
+-----------------------------------------------------+
```

## Wireframe: Book Borrowing Form

```
+--------------------------------------+
|  Book Borrowing Form                 |
|--------------------------------------|
|  Member : [ dropdown select member ] |
|  Book    : [ dropdown, stock > 0 ]   |
|  Borrow Date : [ auto: today ]       |
|                                      |
|          [  Save Borrowing  ]       |
+--------------------------------------+
```

## Wireframe: Book Return Form

```
+--------------------------------------+
|  Book Return                         |
|--------------------------------------|
|  Search active transaction:          |
|  [ member name / book title ______] |
|                                      |
|  Member | Book | Borrow Date | [Return] |
+--------------------------------------+
```

## Wireframe: Member Borrow History

```
+--------------------------------------+
|  Borrow History — Siti Aminah        |
|--------------------------------------|
|  Book            | Borrow   | Return | Status      |
|  Laskar Pelangi   | 01/07    | 10/07   | Completed   |
|  Bumi Manusia     | 15/07    | -       | Borrowed    |
+--------------------------------------+
```

## Consistency with Existing Design
- Accent colors, navbar typography, and table/card styles follow `assets/css/style.css` built in Jobsheets 2-3.
- Navbar will add a **Borrowing** menu and login status indicator (officer name / Logout button) starting implementation in Jobsheet 10.
- Edge cases to handle during implementation: books with zero stock cannot be selected in borrowing forms; members with overdue fees are validated in Jobsheet 12 (independent assignment).

## Exercise 6.4 no. 1 — Wireframe: Register New Member (Guest)

A Guest who wants to join the library fills in this form without signing in.
The Member ID is not typed by the Guest: it is given by the system, so two
people can never pick the same number (`member_id` is `UNIQUE`).

```
+--------------------------------------------------+
| SIMPUS-Mini        Home | Book List | Register   |
|--------------------------------------------------|
|                                                  |
|          [ Register New Member ]                 |
|                                                  |
|   Full Name : [________________________]         |
|   Address   : [________________________]         |
|   Phone No. : [________________________]         |
|   Email     : [________________________]         |
|                                                  |
|   Member ID : (given by the system, e.g. AGT-013)|
|                                                  |
|              [   Register   ]                    |
|                                                  |
|   Already a member? See the Book List            |
+--------------------------------------------------+
```

After Register is pressed:

```
+--------------------------------------------------+
| SIMPUS-Mini        Home | Book List | Register   |
|--------------------------------------------------|
|   Registration received.                         |
|   Your Member ID : AGT-013                       |
|   Show this ID to the officer at the desk        |
|   when you borrow your first book.               |
|                                                  |
|              [ Back to Home ]                    |
+--------------------------------------------------+
```

HTML translation: Full Name, Address and Email become `<label>` + `<input>`
(Email uses `type="email"`, Phone uses `type="tel"`), Register becomes
`<button type="submit">`, and the "(given by the system)" line is plain text,
not an input.
