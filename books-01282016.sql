/*
books-01282016.sql

A place to store SQL commands for our app

*/

select BookTitle,Category from 
srv_Books inner join srv_Categories on
srv_Books.CategoryID = srv_Categories.CategoryID