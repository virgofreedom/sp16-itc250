/*
books.sql - part of nmCategories package 12/01/2010
*/


create table Categories(
CategoryID int unsigned not null auto_increment primary key,
Category varchar(120),
Description text
);
insert into Categories values(NULL, 'DotNet', 'Microsoft \'s flagship server technology.' );
insert into Categories values(NULL, 'PHP', 'The world\'s most popular open source technology.');
insert into Categories values(NULL, 'Programming', 'Books of general programming interest.');
insert into Categories values(NULL, 'HTML', 'Web page architecture.');
insert into Categories values(NULL, 'Networking', 'How networks connect us.');
insert into Categories values(NULL, 'ASP', 'Microsoft \'s classic server technology.');

create table Books(
BookID int unsigned not null auto_increment primary key,
BookTitle varchar(120),
Authors varchar(120),
CategoryID int DEFAULT 0,
ISBN varchar(30),
Edition varchar(20),
Description text,
Rating int,
Price float(6,2)
); 

insert into Books values(NULL, 'Professional ADO.NET','Smith',1,'568524456','2nd Edition','A great .NET book',8, 23.50);
insert into Books values(NULL, 'Apache Server Unleashed','Jones',2,'12345678','1st Edition','A great PHP book',7, 29.50);
insert into Books values(NULL, 'ASP.NET Unleashed','Doe',1,'345678976','1st Edition','A great .NET book',9, 39.95);
insert into Books values(NULL, 'Introducing .NET','Wilson',1,'67890567','3rd Edition','A great .NET book',8, 24.45);
insert into Books values(NULL, 'Professional C#','Jones',1,'568524456','1st Edition','A great .NET book',6, 38.45);
insert into Books values(NULL, 'Beginning C++','Jackson',3,'12345678','1st Edition','A great programming book',10, 41.40);
insert into Books values(NULL, 'Beginning J++','Johnson',3,'345678976','1st Edition','A great programming book',8,44.30);
insert into Books values(NULL, 'Beginning PHP','Smith',2,'345678976','2nd Edition','A great PHP book',7, 55.50);
insert into Books values(NULL, 'Beginning MySQL','McDonald',2,'67890567','1st Edition','A great PHP book',6, 98.20);
insert into Books values(NULL, 'Beginning Visual Basic','Cox',3,'12345678','1st Edition','A great .NET book',8, 58.95);
insert into Books values(NULL, 'Beginning XHTML','Jones',4,'12345678','1st Edition','A great HTML book',5, 39.95);
insert into Books values(NULL, 'Hacking Exposed','Evans',5,'12345678','2nd Edition','A great .NET book',9, 22.20);
insert into Books values(NULL, 'Effective Java','Franklin',3,'568524456','1st Edition','A great programming book',8, 91.20);
insert into Books values(NULL, 'JavaScript Bible','Jones',4,'12345678','1st Edition','A great HTML book',6, 33.55);
insert into Books values(NULL, 'Beginning PHP4 and XML','Doe',2,'12345678','2nd Edition','A great PHP book',7, 48.50);
insert into Books values(NULL, 'VBScript Regular Expressions','Smith',3,'12345678','1st Edition','A great programming book',7, 49.50);
insert into Books values(NULL, 'Programming ASP','Johnson',6,'67890567','4th Edition','A great ASP book',8, 49.50);
insert into Books values(NULL, 'Programming PHP','Doe',2,'345678976','1st Edition','A great PHP book',9, 49.50);
insert into Books values(NULL, 'Programming C#','Jones',1,'568524456','1st Edition','A great .NET book',7, 49.50);
insert into Books values(NULL, 'Programming Java','Smith',3,'56780765','5th Edition','A great programming book',6, 49.50);
insert into Books values(NULL, 'Introducing XML','Evans',4,'12345678','1st Edition','A great HTML book',8, 33.95);
