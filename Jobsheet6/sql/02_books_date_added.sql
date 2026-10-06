-- Jobsheet 8 exercise 7.4 no. 2: record when each book was added
-- Run this after 01_books_members.sql, e.g.:
--   psql -d simpus_mini -f sql/02_books_date_added.sql
--
-- TIMESTAMP stores a date + time (without a time zone).
-- DEFAULT NOW() fills the column automatically with the current date and time
-- whenever a new row is inserted without a value for date_added, so the INSERT
-- in books/process_add.php does not need to change.
-- Books that already exist when this runs also get NOW() as their value.

ALTER TABLE books
    ADD COLUMN IF NOT EXISTS date_added TIMESTAMP DEFAULT NOW();
