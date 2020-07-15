create Database WebProject
use WebProject

create table Account(
Username varchar(20) primary key not null,
Password varchar(20) not null,
Email varchar(30) not null,
role int not null,
Emri varchar(20) not null,
Mbiemri varchar(20) not null
)

Insert into Account values ('Titanshala','1234567','safas@gmail.com',1,'Titan','Shala')

create table Doktori(
Id int primary key identity(1,1),
Emri varchar(20) not null,
Mbiemri varchar(20) not null,
Specializimi varchar(30) not null,
Pervoja int not null,
Stafi varchar (20) ,
image varchar(200),
foreign key(Stafi) references Account(Username) on update cascade on delete set null
)

select Id from Doktori order by Id desc

create table Reparti(
Id int primary key identity(1,1),
Emri varchar(20) unique not null,
NrDhoma int not null,
Stafi varchar(20),
foreign key(Stafi) references Account(Username) on delete set null on update cascade
)
alter table Reparti add image varchar(200)


create table DoctorManage(
Id int primary key identity(1,1),
Stafi varchar(20),
Doctor int,
Aktiviteti varchar(20),
Data date,
foreign key(Stafi) references Account(Username)  ,
foreign key(Doctor) references Doktori(id) on delete cascade on update cascade
)
drop table DoctorManage


create table DepartmentManage(
Id int primary key identity(1,1),
Stafi varchar(20) ,
Reparti int ,
Aktiviteti varchar(20),
Data date,
foreign key(Stafi) references Account(Username) ,
foreign key(Reparti) references Reparti(id)  on delete cascade on update cascade 
)
drop table DepartmentManage




create table Contacts(
Id int primary key identity(1,1),
Data Date,
Name varchar (20),
Email varchar (50),
Message varchar(500)
)




create table HospitalInfo(
Id int primary key ,
HenePremteOrari varchar(20),
ShtuneOrari varchar(20),
DieleOrari varchar(20),
PushimOrari varchar(20),
EmergencyNumber varchar(20),
NumberForInfo varchar(20),
Email varchar(40),
HospitalName varchar(20),
StreetAdress varchar(40)
)

insert into HospitalInfo values (0,'8:00-16:00' , '9:00-12:00' , 'Closed' , '10:00-11:00', '+383-49-123-456', '+383-44-123-456','HPeja@gmail.com','Peja','Kosove & Peje Bill Clinton, 231')

create table Appointment(
Id int primary key identity(1,1),
Name varchar(30),
Username varchar(20),
Department int,
Data date,
Hour varchar(20),
foreign key(Username) references Account(Username) on delete cascade on update cascade,
foreign key(Department) references Reparti(Id) on delete cascade
)
