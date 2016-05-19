
#shows category and category id for book-categories.php page
Select DISTINCT Category, srv_Books.CategoryID
FROM srv_Books inner join srv_Categories ON
srv_Books.CategoryID = srv_Catergories.CategoryID
order by Category asc

#same SQL statement, with aliases
Select DISTINCT Category, b.CategoryID
FROM srv_Books b inner join srv_Categories c ON
b.CategoryID = c.CategoryID
order by Category asc